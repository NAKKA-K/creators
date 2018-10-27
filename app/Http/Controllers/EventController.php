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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:destructive,event')->except(['index', 'show', 'create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->with('user:id,name')->paginate(10);
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

        // limitをeventに付与できるタグの最大個数+1にする事で、無駄な配列を生成しないようにする
        $textTags = explode(' ', $request->tags, \App\EventSkillTag::EVENT_TAGS_MAX + 1);
        if(count($textTags) > \App\EventSkillTag::EVENT_TAGS_MAX) {
            return redirect()->route('events.create')
                ->with('error', 'イベントに付けられるタグは' . \App\EventSkillTag::EVENT_TAGS_MAX . 'までです');
        }

        $event = new Event($validated);
        $event->user_id = Auth::id();
        $event->published = $request->input('published', false);
        $event->save();

        // event created user join the event.
        EventParticipant::create([
            'event_id' => $event->id,
            'user_id' => Auth::id()
        ]);

        foreach($textTags as $textTag) {
            $tag = \App\SkillTag::firstOrCreate(['name' => $textTag]);
            $event->skillTags()->attach($tag);
        }

        return redirect()->route('events.show', ['event' => $event])->with('イベントを作成しました');
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
        $eventTags = $event->skillTags;
        return view('events.show', [
            'event' => $event,
            'eventTags' => $eventTags,
            'participantNum' => $num
        ]);
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

        Event::where('id', $event->id)
            ->update($validated + ['published' => $request->input('published', false)]);
        return redirect()->route('events.show', ['event' => $event])->with('イベントを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        \App\EventSkillTag::where('event_id', $event->id)->delete();
        $event->delete();
        return redirect()->route('events.index')->with('イベントを削除しました');
    }
}
