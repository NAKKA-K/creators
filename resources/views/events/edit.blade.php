@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="mt-4 mb-4 ml-2">イベント更新</h1>

            <form action="{{ route('events.update', ['event' => $event]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="col-sm-12">
                        タイトル
                        <input type="text" name="name"
                            placeholder="Creatorの作成をしよう！"
                            value="{{ $event->name }}"
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
                            required>{{ $event->description }}</textarea>
                        @errorsBlock($errors->get('description'))
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">
                        README
                        <textarea name="readme"
                            placeholder="使用する言語は自由です。各自いろんな言語でCreatorサービスを作成し、情報共有しましょう。"
                            class="form-control form-control-lg @if($errors->has('readme')) is-invalid @endif"
                            required>{{ $event->readme }}</textarea>
                        @errorsBlock($errors->get('readme'))
                    </label>
                </div>

                <div class="float-right">
                    <button type="submit" class="btn btn-primary btn-lg">更新</button>
                    <a href="{{ route('events.show', ['event' => $event]) }}" class="btn btn-secondary btn-lg">戻る</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

