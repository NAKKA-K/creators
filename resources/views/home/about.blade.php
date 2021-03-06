@extends('layouts.base')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
<header id="services" class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1><strong>With any Zeal</strong></h1>
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5">
                    WaZは、何か熱意をもって物事に取り組むことを応援するためのサービスです
                </p>
            </div>
            <div class="col-lg-12 mx-auto">
                <hr class="primary my-4">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-12 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-newspaper-o text-primary mv-3 sr-icons"></i>
                    <h3 class="mb-3">イベント</h3>
                    <p class="mb-0">
                        イベントを作成して公開することで、自分のモチベーションを上げましょう
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-diamond text-primary mv-3 sr-icons"></i>
                    <h3 class="mb-3">スキル</h3>
                    <p class="mb-0">
                        使用したスキルを書くことで、スキルを通じた繋がりを得ましょう
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-heart text-primary mv-3 sr-icons"></i>
                    <h3 class="mb-3">グループ</h3>
                    <p class="mb-0">
                        みんなで同じイベントに取り組むことで、もくもく会のようなモチベーションアップを体感しましょう
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="about" class="bg-beige">
    <div class="container">
        <h4 class="text-center">
            <strong>WaZ</strong>の様々な利点やクリエイターのための仕組み
        </h4>
        <div class="row">
            <div class="col-lg-2 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-angle-double-up text-primary mb-3 sr-icons"></i>
                    <p>モチベーションUP</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-globe text-primary mb-3 sr-icons"></i>
                    <p>場所にとらわれず</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-users text-primary mb-3 sr-icons"></i>
                    <p>グループ</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-address-card text-primary mb-3 sr-icons"></i>
                    <p>アカウント</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-file text-primary mb-3 sr-icons"></i>
                    <p>イベントの紹介</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-tags text-primary mb-3 sr-icons"></i>
                    <p>スキルタグ</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-0">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <h1>{{ $eventCount }}</h1>
                <p>件のイベントが建てられました</p>
            </div>
            <div class="col-lg-6 col-md-12">
                <h1>{{ $userCount }}</h1>
                <p>人のユーザーが登録しています</p>
            </div>
        </div>
    </div>
</section>
@endsection
