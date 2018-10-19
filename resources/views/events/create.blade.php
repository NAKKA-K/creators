@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="mb-4 ml-2">イベント作成</h1>

            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-sm-12">
                        タイトル
                        <input type="text" name="name"
                            placeholder="Creatorの作成をしよう！"
                            value="{{ old('name') }}"
                            class="form-control form-control-lg @if($errors->has('name')) is-invalid @endif" required>
                        @errorsBlock($errors->get('name'))
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">
                        イベント概要
                        <textarea name="description"
                            placeholder="いろんな言語を使って、Creatorの作成を体験してみましょう"
                            class="form-control form-control-lg @if($errors->has('description')) is-invalid @endif"
                            required>{{ old('description') }}</textarea>
                        @errorsBlock($errors->get('description'))
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">
                        README
                        <textarea name="readme"
                            placeholder="使用する言語は自由です。各自いろんな言語でCreatorサービスを作成し、情報共有しましょう。"
                            class="form-control form-control-lg @if($errors->has('readme')) is-invalid @endif"
                            required>{{ old('readme') }}</textarea>
                        @errorsBlock($errors->get('readme'))
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">
                        公開
                        <input type="checkbox" name="published"
                            class="form-control form-control-lg"
                            value="true">
                    </label>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg m-1">作成</button>
                    <a href="{{ route('events.index') }}" class="btn btn-secondary btn-lg m-1">戻る</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
