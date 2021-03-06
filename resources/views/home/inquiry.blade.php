@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="mb-4 ml-2">お問い合わせ</h1>
            <form action="{{ route('home.store_inquiry') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-sm-12">
                        タイトル
                        <input type="text" name="title"
                            placeholder=""
                            value="{{ old('title') }}"
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
                            required>{{ old('body') }}</textarea>
                        @errorsBlock($errors->get('body'))
                    </label>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg m-1">送信</button>
                    <a href="{{ route('events.index') }}" class="btn btn-secondary btn-lg m-1">戻る</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
