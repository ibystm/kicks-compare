@extends('layouts.master')
@section('content')
<div class="first-card pt-4 pb-4 bg-secondary">
    <div class="container">
    <div class="row">
        <div class="col-md-5 ml-auto mr-auto my-auto">
            <div class="card-image big">
                <div class="image-box">
                    <a href=""><img src="{{ asset('images/adidas_Yeezy_Boost_350_V2_black.png') }}" alt=""></a>
                </div>
            </div>
            <div class="card-status big">
                <div class="good-btn">
                    <a href="#"><span style="font-size: 1em; color: #f44336;"><i class="far fa-heart">100k</i></span></a>
                </div>
                <div class="comments-btn">
                    <a href="#"><span style="font-size: 1em; color: #c0c0c0;"><i class="far fa-comment-alt">33</i></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-7 ml-auto mr-auto d-flex align-item-center d-flex align-items-center">
            <div class="card-description">
                <p class="top-kicks-name">Yeezy boost 350 v2</p>
                <p class="kicks-comp">adidas</p>
                <p class="top-text">ムーディーな"オールブラック"仕様が発売予定！
                    ミュージシャン、ファッションデザイナー、音楽プロデューサーら様々なジャンルでマルチな才能を発揮する"KANYE WEST(カニエ・ウェスト)"。ナイキとのコラボレーションライン"YEEZY"の発売後、"禁断"とも言えるアディダスへの移籍を発表。2015年2月には自らがディレクションした"YEEZY 750 BOOST(イージー 750 ブースト)"をリリース。</p>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="second-card">
    <div class="wrapper">
        <div class="container">
        <main>
            <article>
                <div class="row">
                    @foreach($shoes as $shoe)
                        <div class="col-md-6 col-lg-3 col-6">
                            <div class="card">
                                <div class="image-box">
                                    <div class="card-image">
                                        <a href="view/{{ $shoe->id }}"><img src="storage/{{ $shoe->image_url }}" alt="{{ $shoe->name }}の画像"></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <p class="kicks-name">{{ $shoe->name }}</p>
                                        <p class="comp-name">{{ $shoe->manufacturer->name }}</p>
                                        <div class="card-status">
                                            <div class="good-btn">
                                                <a href="#"><span style="font-size: 1em; color: #f44336;"><i class="far fa-heart"></i></span></a>
                                            </div>
                                            <div class="comments-btn">
                                                <a href="#"><span style="font-size: 1em; color: dimgray;"><i class="far fa-comment-alt"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
        </main>
        </div>
    </div>
</div>
@endsection