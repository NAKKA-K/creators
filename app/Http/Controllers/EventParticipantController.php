<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventParticipant;
use Illuminate\Support\Facades\Auth;

class EventParticipantController extends Controller
{
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
        $joined = $participants->where('user_id', $authUser->id)->first();
        return view('event_participants.index', [
            'authUser' => $authUser,
            'event' => $event,
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
        //
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
        //
    }
}
