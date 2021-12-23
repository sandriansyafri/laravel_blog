<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function home()
    {
        return view('page.frontend.home');
    }
    public function about()
    {
        return view('page.frontend.about');
    }
}
