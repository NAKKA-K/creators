<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventParticipant;
use Illuminate\Support\Facades\Auth;

class EventParticipantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        $authUser = Auth::user();
        $participants = EventParticipant::where('event_id', $event->id)
            ->with('user')->get();
        $participantNum = $participants->count();

        $joined = null;
        if($authUser){
            $joined = $participants->where('user_id', $authUser->id)->first();
        }
        $eventTags = $event->skillTags;

        return view('event_participants.index', [
            'authUser' => $authUser,
            'event' => $event,
            'eventTags' => $eventTags,
            'participants' => $participants,
            'participantNum' => $participantNum,
            'joined' => $joined,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Event  $event
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event, Request $request)
    {
        $userID = Auth::id();
        $participant = EventParticipant::firstOrCreate(['event_id' => $event->id, 'user_id' => $userID]);
        return redirect()->route('events.event_participants.index', ['event' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, $id)
    {
        EventParticipant::destroy($id);
        return redirect()->route('events.event_participants.index', ['event' => $event]);
    }
}
