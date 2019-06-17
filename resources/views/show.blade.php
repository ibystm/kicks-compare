@extends('layouts.master')
@section('content')
<div class="first-card pt-4 pb-4 bg-secondary">
    <div class="container">
    <div class="row">
        <div class="col-md-5 ml-auto mr-auto my-auto">
            <div class="card-image big">
                <div class="image-box">
                    <a href=""><img src="../storage/{{ $shoe->image_url }}" alt="{{ $shoe->name }}の画像"></a>
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
                <p class="top-kicks-name">{{ $shoe->name }}</p>
                <p class="kicks-comp">{{ $shoe->manufacturer->name }}</p>
                <p class="top-text">ムーディーな"オールブラック"仕様が発売予定！
                    ミュージシャン、ファッションデザイナー、音楽プロデューサーら様々なジャンルでマルチな才能を発揮する"KANYE WEST(カニエ・ウェスト)"。ナイキとのコラボレーションライン"YEEZY"の発売後、"禁断"とも言えるアディダスへの移籍を発表。2015年2月には自らがディレクションした"YEEZY 750 BOOST(イージー 750 ブースト)"をリリース。</p>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="container">
    <div class="commmnet-wrapper">
        <div class="comment-title">
            <p> comments about {{ $shoe->name }}</p>
        </div>
        <div class="comment-list">
            @foreach($comments as $comment)
                <div class="baloon">
                    <p class="chatting">{{ $comment->comment }}</p>
                </div>
            @endforeach
        </div>
        <div class="comment-area">
            <p>レビュ-を書く</p>
            <form action="{{ route('shoes.comment', $shoe->id) }}" method="post">
                @csrf
                <textarea class="form-control" name="comments" placeholder="write your comments about this kicks..." cols="40" rows="10"></textarea>
                <button type="submit" class="btn btn-primary comment-btn" value="送信">送信</button>
            </form>
        </div>
    </div>
</div>

@endsection