<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function isAsAdmin()
    {
        return Profile::where('id', request()->user()->acting_profile_id)->where('type', 'admin')->exists();
    }
}
