<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InquiryPost;
use App\Http\Requests\OpinionPost;
use App\Inquiry;
use App\Opinion;
use App\Event;
use App\User;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except([
            'index',
            'about',
            'guideline',
            'privacy',
            'help',
            'termsOfService',
        ]);
    }

    public function index(){
        $events = Event::orderBy('created_at', 'desc')
                    ->with('user:id,name')
                    ->limit(5)->get();
        return view('home.index', ['events' => $events]);
    }

    public function about(){
        $eventCount = Event::count();
        $userCount = User::count();
        return view('home.about', ['eventCount' => $eventCount, 'userCount' => $userCount]);
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

    public function opinion(){
        return view('home.opinion');
    }

    public function storeOpinion(OpinionPost $request){
        $validated = $request->validated();

        $opinion = new Opinion($validated);
        $opinion->user_id = Auth::id();
        $opinion->save();

        return redirect()->route('events.index');
    }
}
