@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="{{ route('events.index') }}" class="btn btn-outline-secondary btn-sm">戻る</a>
            <hr>

            <h6 class="mt-4">
                作成者: <a href="{{ route('users.show', ['user' => $event->user]) }}">{{ $event->user->name }}</a>
                &nbsp;&nbsp;
                {{ $event->created_at }}作成
            </h6>

            <div class="mt-2 mb-2 d-flex flex-row">
                <h1 class="inline mr-2">{{ $event->name }}</h1>

                @if ($event->published)
                    <div class="published-status badge badge-primary align-self-center text-white">公開</div>
                @else
                    <div class="published-status badge badge-secondary align-self-center">未公開</div>
                @endif
            </div>

            <ul class="list-inline">
                @foreach ($eventTags as $tag)
                    <li class="list-inline-item">
                        <a href="#" class="badge badge-primary">{{ $tag->name }}</a>
                    </li>
                @endforeach
            </ul>

            @if ($event->published)
                <p class="text-muted">最終更新日:{{ $event->updated_at }}</p>
            @endif

            @if (Auth::check() && Auth::user() == $event->user)
                <a href="{{ route('events.edit', ['event' => $event]) }}" class="btn btn-primary btn-sm">更新</a>
                <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_modal">削除</button>
            @endif

            <ul class="nav nav-tabs mt-4">
                <li class="nav-item">
                    <a href="#detail_tab" class="nav-link tab-font active">Detail</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('events.event_participants.index', ['event' => $event]) }}" class="nav-link tab-font">
                      Members <span class="badge badge-secondary">{{ $participantNum }}</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content mt-4">
                <div id="detail_tab" class="tab-pane active">
                    <p>{{ $event->description }}</p>
                    <hr>

                    <div class="card mt-4">
                        <h4 class="card-header">README</h4>
                        <div class="card-text">
                            <p class="m-2">{{ $event->readme }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('shared.event_delete_modal')
@endsection

