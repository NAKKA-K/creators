@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mt-4 mb-4 mr-2">MyPage</h1>

            <div class="h5 font-weight-bold mt-5">ユーザー名</div>
            <input type="text" value="{{ $user->name }}" disabled>

            <div class="h5 font-weight-bold mt-5">Email</div>
            <input type="text" value="{{ $user->email }}" disabled>
        </div>
    </div>
</div>
@endsection


