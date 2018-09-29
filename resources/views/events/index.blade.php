@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mt-4 mb-4 mr-2">イベント一覧
                <a href="{{ route('events.create') }}" class="float-right btn btn-primary">イベント作成</a>
            </h1>

            @foreach($events as $event)
                @include('shared/event_card', ['event' => $event])
            @endforeach
        </div>
    </div>
</div>
@endsection
