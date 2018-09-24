<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('home.about');
    }

    public function guideline()
    {
        return view('home.guideline');
    }

    public function privacy()
    {
        return view('home.privacy');
    }

    public function help()
    {
        return view('home.help');
    }

    public function termsOfService()
    {
        return view('home.terms_of_service');
    }
}
