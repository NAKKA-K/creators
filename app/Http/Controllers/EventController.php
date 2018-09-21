<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventParticipant;
use Illuminate\Http\Request;
use App\Http\Requests\EventPost;
use Validator;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->with('user:id,name')->get();
        return view('events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EventPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventPost $request)
    {
        $validated = $request->validated();

        $event = new Event($validated->all());
        $event->user_id = Auth::id();
        $event->published = true;
        $event->save();

        return redirect()->route('events.show', ['event' => $event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $num = EventParticipant::where('event_id', $event->id)->count();
        return view('events.show', ['event' => $event, 'participantNum' => $num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EventPost  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventPost $request, Event $event)
    {
        $validated = $request->validated();

        Event::where('id', $event->id)->update($validated->all());
        return redirect()->route('events.show', ['event' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}
