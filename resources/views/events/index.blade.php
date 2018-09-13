@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mt-4 mb-4 mr-2">イベント一覧
                <a href="{{ route('events.create') }}" class="float-right btn btn-primary">イベント作成</a>
            </h1>

            @foreach($events as $event)
                <div class="card border-secondary mb-2">
                    <div class="card-header">
                        <a href="#"><h4>{{ $event->name }}</h4></a>
                        <div class="small text-muted">
                            <a href="#" class="text-secondary">{{ $event->user->name }}</a>
                            &nbsp;&nbsp;
                            {{ $event->created_at }}
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $event->description }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
