<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function home()
    {
        $pages = $this->page->published()->notHidden()->inRandomOrder()->paginate(100);
        return view('guest-home-page', ['pages' => $pages, 'q' => '']);
    }

    public function showPage($slug)
    {
        $slug = $this->clean($slug);

        //this is because short letter m is used to prefix spa
        if (strlen($slug)<3) {
            return redirect()->route('home');
        }

        $page = $this->page->where('slug', $slug)->published()->firstOrFail();

        //redirect to other sites from backend. dont give redirect_url write access to others
        if ($page->redirect_url) {
            return redirect()->to($page->redirect_url);
        }

        return view('guest-show-page', ['page' => $page]);
    }

    protected function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    public function search(Request $request)
    {
        $q = preg_replace('/[^A-Za-z0-9\-]/', ' ', $request->q);

        if ($q) {
            $words = explode(' ', $q);
            $pages = $this->page->published()->notHidden();

            $pages = $pages->where(function($query) use ($words) {
                foreach ($words as $word) {
                    $query = $query->orWhere('title', 'LIKE', "%$word%");
                    $query = $query->orWhere('tags', 'LIKE', "%$word%");
                }
             });


            // $pages = $pages->where(function($query) use ($words) {
            //     $query->whereIn('tags', $words)
            //         ->orWhere(function($query2) use ($words) {
            //             foreach ($words as $word) {
            //                 $query2 = $query2->orWhere('title', 'LIKE', "%$word%");
            //             }
            //         });
            //  });
        } else {
            $pages = $this->page->published()->notHidden();
        }

        $pages = $pages = $pages->inRandomOrder()->paginate(100);

        return view('guest-home-page', ['pages' => $pages, 'q' => $q]);
    }
}
