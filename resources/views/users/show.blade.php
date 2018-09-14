@extends('layouts.app')

@section('style')
<link href="{{ asset('/css/user_profile_fonts.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mt-4 mb-4 mr-2 user-font">{{ $user->name }}</h1>

            <!-- tab -->
            <ul class="nav nav-tabs mb-4">
                <li class="nav-item">
                    <a href="#create_tab" class="nav-link tab-font" data-toggle="tab">Create</a>
                </li>
                <li class="nav-item">
                    <a href="#join_tab" class="nav-link tab-font" data-toggle="tab">Join</a>
                </li>
            </ul>

            <!-- tab content -->
            <div class="tab-content">
                <!-- create events tab -->
                <div id="create_tab" class="tab-pane active">
                    <h4>作成イベント</h4>
                    @foreach($user->events as $event)
                        <div class="card mb-2">
                            <a href="{{ route('events.show', ['event' => $event]) }}">
                                <h4 class="card-header">{{ $event->name }}</h4>
                            </a>
                            <p class="card-body">{{ $event->description }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- join events tab -->
                <div id="join_tab" class="tab-pane">
                    <h4> 参加イベント</h4>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

