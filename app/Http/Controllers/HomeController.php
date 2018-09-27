<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InquiryPost;
use App\Inquiry;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only(['inquiry', 'storeInquiry']);
    }

    public function index(){
        return view('home.index');
    }

    public function about(){
        return view('home.about');
    }

    public function guideline(){
        return view('home.guideline');
    }

    public function privacy(){
        return view('home.privacy');
    }

    public function help(){
        return view('home.help');
    }

    public function termsOfService(){
        return view('home.terms_of_service');
    }

    public function inquiry(){
        return view('home.inquiry');
    }

    public function storeInquiry(InquiryPost $request){
        $validated = $request->validated();

        $inquiry = new Inquiry($validated);
        $inquiry->user_id = Auth::id();
        $inquiry->save();

        return redirect()->route('events.index');
    }
}
