@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mt-4 mb-4 mr-2">イベント一覧</h1>

            @foreach($events as $event)
                <div class="card border-secondary mb-2">
                    <div class="card-header">
                        <a href="#"><h4>{{ $event->name }}</h4></a>
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
