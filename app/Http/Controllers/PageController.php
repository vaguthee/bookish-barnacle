<?php

namespace App\Http\Controllers;

use App\Page;
use App\Template;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;
use  App\Helpers\ImageManager;

class PageController extends Controller
{
    public function __construct(Page $page, Template $template)
    {
        $this->middleware('auth');
        $this->page = $page;
        $this->template = $template;
    }

    public function createCard(Request $request)
    {

        return view('create-card');
    }

    public function storeCard(Request $request)
    {
        $request->validate([
            // 'slug' => '',
            'title' => 'required|max:100',
            'tags' => 'max:255',
            // 'keywords' => 'max:255',
            'excerpt' => 'max:500',
            // 'feature_image_url' => 'required|max:255',
            "image" => "required|image|max:6000",
            'own_page_url' => 'required|max:255',
        ]);

        $image = (new ImageManager())->upload($request, 'card-' . Str::slug($request->title, '-') );

        $page = $this->page->createCard($request, $request->user(), $image->url);

        return redirect()->route('pages.editCard', $page->id);
    }

    public function editCard($page)
    {
        $page = $this->getPage($page);

        return view('edit-card', ['page' => $page]);
    }

    public function updateCard(Request $request, $page)
    {
        $page = $this->getPage($page);

        $request->validate([
            // 'slug' => '',
            'title' => 'required|max:100',
            'tags' => 'max:255',
            // 'keywords' => 'max:255',
            'excerpt' => 'max:500',
            // 'feature_image_url' => 'required|max:255',
            "image" => "nullable|mimes:jpeg,jpg,png|max:6000",
            'own_page_url' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = (new ImageManager())->upload($request, 'card-' . Str::slug($request->title, '-') );
            $featureImageUrl = $image->url;
        } else {
            $featureImageUrl = $page->feature_image_url;
        }

        $page = tap($page)->updateCard($request, $featureImageUrl);

        return redirect()->back();
    }

    public function index(Request $request)
    {

        $pages = $this->getPages($request->q);

        return view('index-page', ['pages' => $pages, 'q' => $request->q]);
    }

    protected function getPages($q = null)
    {
        $user = request()->user();

        $pages = ($q) ? $this->page->where('title', 'LIKE', "%$q%") : $this->page;

        if (!$this->isAsAdmin()) {
            $pages = $pages->where('profile_id', $user->acting_profile_id);
        }

        return $pages->orderBy('updated_at', 'desc')->get();
    }


    public function show($page)
    {
        $page = $this->getPage($page);

        return view('show-page', ['page' => $page]);
    }

    public function edit($page)
    {
        $page = $this->getPage($page);

        return view('edit-page', ['page' => $page]);
    }

    public function new(Request $request)
    {
        $q = preg_replace('/[^A-Za-z0-9\-]/', ' ', $request->q);

        if ($q) {
            $words = explode(' ', $q);
            $templates = $this->template->published();

            $templates = $templates->where(function($query) use ($words) {
                foreach ($words as $word) {
                    $query = $query->orWhere('title', 'LIKE', "%$word%");
                    $query = $query->orWhere('tags', 'LIKE', "%$word%");
                }
             });


            // $templates = $templates->where(function($query) use ($words) {
            //     $query->whereIn('tags', $words)
            //         ->orWhere(function($query2) use ($words) {
            //             foreach ($words as $word) {
            //                 $query2 = $query2->orWhere('title', 'LIKE', "%$word%");
            //             }
            //         });
            //  });
        } else {
            $templates = $this->template->published();
        }

        $templates = $templates->paginate();
        return view('new-page', ['templates' => $templates, 'q' => $request->q]);
    }

    public function fromTemplate($template)
    {
        $template = $this->template->where('id', $template)->published()->firstOrFail();

        $page = $this->page->createFromTemplate($template, request()->user());

        return redirect()->route('pages.edit', $page->id);
    }

    public function create()
    {
        $page = $this->page->createNew(request()->user());

        // return view('create-page', ['page' => $page]);
        return redirect()->route('pages.edit', $page->id);
    }

    public function store(Request $request)
    {
        $page = $this->getPage($request->page_id);

        $page = tap($page)->update([
            // "body" => $request->body,
            "body" => Purifier::clean($request->body),
        ]);

        return $page;
    }

    public function publish($page)
    {
        $page = $this->getPage($page);

        $page = tap($page)->update(['published' => true, 'publish_date' => Carbon::now()->format('Y-m-d H:i:s')]);

        return redirect()->back();
    }

    public function unpublish($page)
    {
        $page = $this->getPage($page);

        $page = tap($page)->update(['published' => false]);

        return redirect()->back();
    }

    public function destroy($page)
    {
        $page = $this->getPage($page);
        dd("destroy",$page);
    }


    public function editMeta($page)
    {
        $page = $this->getPage($page);

        return view('edit-page-meta', ['page' => $page]);
    }

    public function updateMeta(Request $request, $page)
    {
        $page = $this->getPage($page);

        $request->validate([
            'slug' => '',
            'title' => 'required|max:100',
            'tags' => 'max:255',
            'keywords' => 'max:255',
            'excerpt' => 'max:500',
            'feature_image_url' => '',
            'as_template' => '',
            'own_page_url' => '',
        ]);

        $page = tap($page)->updateMeta($request);

        if ($template = $this->template->where('page_id', $page->id)->first()) {
            if (!$page->as_template) {
                $template->delete();
            } else {
                // $this->updateTemplateFromPage($template, $page);
            }
        } else {
            if ($page->as_template) {
                 $this->template->createFromPage($page);
            }
        }

        return redirect()->route('pages.metaEdit', $page->id);
    }

/*    protected function updateTemplateFromPage($template, $page)
    {
        $template->update([
            'body' => $page->body,
            'published' => false
        ]);
    }*/

    protected function getPage($pageId)
    {
        if ($this->isAsAdmin()) {
            $page = $this->page->findOrFail($pageId);
        } else {
            $page = $this->page
                ->where('id', $pageId)
                ->where('profile_id', request()->user()->acting_profile_id)
                ->firstOrFail();
        }

        return $page;
    }

    public function editHtml(Page $page)
    {
        if (!$this->isAsAdmin()) {
            return response()->json([
                'message' => 'you are not allowed to update this resource.'
            ], 403 );
        }

        return view('edit-page-html', ['page' => $page]);
    }

    public function updateHtml(Request $request, Page $page)
    {
        if (!$this->isAsAdmin()) {
            return response()->json([
                'message' => 'you are not allowed to update this resource.'
            ], 403 );
        }

        $page = tap($page)->update([
            'body' => $request->body,
        ]);

        return redirect()->route('pages.editHtml', $page->id);
    }

}
