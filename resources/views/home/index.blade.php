@extends('layouts.app')

@section('content')
<header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1><strong>With any Zeal</strong></h1>
                <hr class="primary">
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5">WaZは、何か熱意をもって物事に取り組むことを応援するためのサービスです</p>
                <a href="#about" class="btn btn-primary btn-xl js-scroll-trigger">もっと情報を見る</a>
            </div>
        </div>
    </div>
</header>

<section id="about" class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading text-white">イベントを作成しましょう</h2>
                <hr class="primary-light my-4">
                <p class="text-faded mb-4">
                    日々の勉強や制作などをイベントとして作成し公開しましょう。
                    作成したイベントはみんなが見ることができ、参加することができます。
                    イベントを共有することで、モチベーションの維持や作ったものをみんなに見てもらうことができます。
                </p>
                <a href="{{ route('register') }}" class="btn btn-light btn-xl">アカウントを登録</a>
            </div>
        </div>
    </div>
</section>

<div class="container mt-4 mb-4">
    <h1 class="mt-4 mb-4 ml-2 mr-2 no-float text-center">最近のイベント</h1>
    {{--
    @foreach($events as $event)
        <div class="card border-secondary mv-2">
            <a href="{{ route('events.show', ['event' => $event]) }}">
                <h4 class="card-header">
                    {{ $event->name }}
                </h4>
            </a>
            <div class="card-body">
                {{ $event->description }}
            </div>
        </div>
    @endforeach
     --}}
</div>
@endsection

