@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <h1 class="pb-4">お問い合わせ</h1>
    <form action="{{ route('home.store_inquiry') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="col-sm-12">
                タイトル
                <input type="text" name="title"
                    placeholder=""
                    value="{{ old('name') }}"
                    class="form-control @if($errors->has('title'))is-invalid @endif"
                    required>
                @errorsBlock($errors->get('title'))
            </label>
        </div>
        <div class="form-group">
            <label class="col-sm-12">
                本文
                <textarea name="body"
                    placeholder=""
                    class="form-control @if($errors->has('body'))is-invalid @endif"
                    required>{{ old('name') }}</textarea>
                @errorsBlock($errors->get('body'))
            </label>
        </div>

        <div class="float-right">
            <button type="submit" class="btn btn-primary btn-lg">送信</button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary btn-lg">戻る</a>
        </div>
    </form>
</div>
@endsection
