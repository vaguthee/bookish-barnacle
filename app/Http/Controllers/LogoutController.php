<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout() {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
}
