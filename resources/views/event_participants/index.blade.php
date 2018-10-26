@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="{{ route('events.index') }}" class="btn btn-outline-secondary btn-sm">戻る</a>
            <hr>

            <div class="mt-4 d-flex">
                <p class="h6 mr-auto">
                    作成者:&nbsp;<a href="{{ route('users.show', ['user' => $event->user]) }}">{{ $event->user->name }}</a>
                    &nbsp;&nbsp;
                    {{ $event->created_at }}作成
                </p>
                @if (Auth::check() && Auth::user() == $event->user)
                    <a href="{{ route('events.edit', ['event' => $event]) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-edit fa-lg"></i>
                    </a>
                    <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete_modal">
                        <i class="fa fa-trash fa-lg"></i>
                    </button>
                @endif
            </div>

            <div class="mt-2 mb-2 d-flex flex-row">
                <h1 class="inline mr-2">{{ $event->name }}</h1>

                @if ($event->published)
                    <div class="published-status badge badge-primary align-self-center text-white">公開</div>
                @else
                    <div class="published-status badge badge-secondary align-self-center">未公開</div>
                @endif
            </div>

            <ul class="list-inline event-tag-list">
                @foreach ($eventTags as $tag)
                    <li class="list-inline-item">
                        <a href="#" class="badge badge-secondary">{{ $tag->name }}</a>
                    </li>
                @endforeach
            </ul>

            @if ($event->published)
                <p class="text-muted">最終更新日:{{ $event->updated_at }}</p>
            @endif

            <ul class="nav nav-tabs mt-4">
                <li class="nav-item">
                    <a href="{{ route('events.show', ['event' => $event]) }}" class="nav-link tab-font">Detail</a>
                </li>
                <li class="nav-item">
                    <a href="#participants_tab" class="nav-link active tab-font">
                      Members <span class="badge badge-secondary">{{ $participantNum }}</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content mt-4">
                <div id="participants_tab" class="tab-pane active">

                    <p>
                        参加メンバー&nbsp;&nbsp;{{ $participantNum }}人
                        @if ($event->user != $authUser && $joined)
                            <form action="{{ route('events.event_participants.destroy', ['event' => $event, 'event_participant' => $joined]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary btn-sm">離脱</button>
                            </form>
                        @elseif ($event->user != $authUser)
                            <form action="{{ route('events.event_participants.store', ['event' => $event]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">参加</button>
                            </form>
                        @endif
                    </p>

                    <ul>
                        @foreach($participants as $par)
                            @if ($par->user == $authUser)
                                <li><strong>{{ $par->user->name }}</strong></li>
                            @else
                                <li>{{ $par->user->name }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

@include('shared.event_delete_modal')
@endsection
