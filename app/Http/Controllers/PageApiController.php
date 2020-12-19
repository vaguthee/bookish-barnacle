<?php

namespace App\Http\Controllers;

use App\Page;
use App\PageLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;
use  App\Helpers\ImageManager;

class PageApiController extends Controller
{
    public function __construct(Page $page, PageLink $pageLink)
    {
        $this->middleware('auth');
        $this->page = $page;
        $this->pageLink = $pageLink;
    }

    public function store(Request $request)
    {

        $request->validate([
            // 'slug' => '',
            'title' => 'required|max:100',
            'tags' => 'max:255',
            // // 'keywords' => 'max:255',
            'excerpt' => 'max:500',
            'feature_image_url' => 'required|max:255',
            // "image" => "required|image|max:6000",
            'own_page_url' => 'required|max:255',
            'link_website' => 'required|max:255',
        ]);

        $page = $this->page->create([
            'feature_image_url' => $request->feature_image_url,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'own_page_url' => $request->own_page_url,
            'tags' => $request->tags,
            'slug' => (string) Str::uuid(),
            'keywords' => $request->keywords,
            'body' => "",
            'published' => false,
            'profile_id' => $request->user()->acting_profile_id,
        ]);

        $this->pageLink->create([
            'url' => $request->own_page_url,
            'website' => $request->link_website,
            'page_id' => $page->id
        ]);

        $page = $page->load('links');

        return $page->toArray();
    }
}
