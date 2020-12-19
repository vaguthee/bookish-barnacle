<?php

namespace App\Http\Controllers;

use App\Page;
use App\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Setting $settings, Page $page)
    {
        $this->middleware('auth');
        $this->settings = $settings;
        $this->page = $page;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ($profileSetting = $this->settings->where('key', 'home_page_id')->first()) {
            $page = $this->page->find($profileSetting->value);

            return view('home', ['page' => $page]);
        }

        return view('home', ['page' => null]);
    }
}
