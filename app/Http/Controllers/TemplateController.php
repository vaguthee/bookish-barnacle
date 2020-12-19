<?php

namespace App\Http\Controllers;

use App\Template;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class TemplateController extends Controller
{
    public function __construct(Template $template)
    {
        $this->middleware('auth');
        $this->template = $template;
    }


    public function index(Request $request)
    {

        $templates = $this->getTemplates($request->q);

        return view('index-template', ['templates' => $templates, 'q' => $request->q]);
    }

    protected function getTemplates($q = null)
    {
        $user = request()->user();

        $templates = ($q) ? $this->template->where('title', 'LIKE', "%$q%") : $this->template;

        if (!$this->isAsAdmin()) {
            $templates = $templates->where('profile_id', $user->acting_profile_id);
        }

        return $templates->orderBy('updated_at', 'desc')->get();
    }


    public function show($template)
    {
        $template = $this->template->published()->where('id', $template)->firstOrFail();

        return view('show-template', ['template' => $template]);
    }

    public function edit($template)
    {
        $template = $this->getTemplate($template);

        return view('edit-template', ['template' => $template]);
    }

    public function create()
    {
        $template = $this->template->create([
            'title' => (string) Str::uuid(),
            'body' => 'write here....',
            'profile_id' => request()->user()->acting_profile_id,
        ]);

        return view('create-template', ['template' => $template]);
    }

    public function store(Request $request)
    {
        $template = $this->getTemplate($request->template_id);

        $template = tap($template)->update([
            // "body" => $request->body,
            "body" => Purifier::clean($request->body),
        ]);

        return $template;
    }

    public function publish($template)
    {
        $template = $this->getTemplate($template);

        $template = tap($template)->update(['published' => true, 'publish_date' => Carbon::now()->format('Y-m-d H:i:s')]);

        return redirect()->route('templates.edit', $template->id);
    }

    public function unpublish($template)
    {
        $template = $this->getTemplate($template);

        $template = tap($template)->update(['published' => false]);

        return redirect()->route('templates.edit', $template->id);
    }

    public function destroy($template)
    {
        $template = $this->getTemplate($template);
        dd("destroy",$template);
    }


    public function editMeta($template)
    {
        $template = $this->getTemplate($template);

        return view('edit-template-meta', ['template' => $template]);
    }

    public function updateMeta(Request $request, $template)
    {
        $template = $this->getTemplate($template);
        
        $request->validate([
            'title' => 'required|max:100',
            'tags' => 'max:255',
            'keywords' => 'max:255',
            'excerpt' => 'max:255',
            'feature_image_url' => '',
        ]);

        $template = tap($template)->update([
            'title' => $request->title,
            'tags' => $request->tags,
            'keywords' => $request->keywords,
            'excerpt' => $request->excerpt,
            'feature_image_url' => $request->feature_image_url,
        ]);

        return redirect()->route('templates.metaEdit', $template->id);
    }

    protected function getTemplate($templateId)
    {
        if ($this->isAsAdmin()) {
            $template = $this->template->findOrFail($templateId);
        } else {
            $template = $this->template
                ->where('id', $templateId)
                ->where('profile_id', request()->user()->acting_profile_id)
                ->firstOrFail();
        }

        return $template;
    }

    public function editHtml(Template $template)
    {
        if (!$this->isAsAdmin()) {
            return response()->json([
                'message' => 'you are not allowed to update this resource.'
            ], 403 );
        }

        return view('edit-template-html', ['template' => $template]);
    }

    public function updateHtml(Request $request, Template $template)
    {
        if (!$this->isAsAdmin()) {
            return response()->json([
                'message' => 'you are not allowed to update this resource.'
            ], 403 );
        }

        $template = tap($template)->update([
            'body' => $request->body,
        ]);

        return redirect()->route('templates.editHtml', $template->id);
    }

}
