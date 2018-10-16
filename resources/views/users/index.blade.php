@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mt-4 mb-4 mr-2">ユーザー一覧</h1>

            @foreach($users as $user)
                <div class="card border-secondary mb-2">
                    <div class="card-body d-flex">
                        @if(isset($user->avatar))
                            <img src="{{ $user->avatar }}" height="40" />
                        @endif
                        <div class="ml-2">
                            <a href="{{ route('users.show', ['user' => $user]) }}">{{ $user->name }}</a>
                            <div class="small text-muted">
                                {{ $user->created_at }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

