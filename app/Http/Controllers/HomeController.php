<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InquiryPost;
use App\Inquiry;
use App\Event;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only(['inquiry', 'storeInquiry']);
    }

    public function index(){
        $events = Event::orderBy('created_at', 'desc')
                    ->with('user:id,name')
                    ->limit(5)->get();
        return view('home.index', ['events' => $events]);
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
