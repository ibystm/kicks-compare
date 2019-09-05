@extends('layouts.master')
@section('content')
<div class="first-card pt-4 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-5 ml-auto mr-auto my-auto">
                <div class="card-image big">
                    <div class="image-box">
                        <a href="">
                            <img
                            src="{{ url($shoe->image_url) }}"
                            alt="{{ $shoe->name }}の画像"
                            class="kicks-img"
                            >
                        </a>
                    </div>
                </div>
                <div class="card-status big">
                    <div class="like">
                        <form
                        action="{{ route('like', $shoe->id) }}"
                        method="post"
                        >
                            @csrf
                            <input
                            type="hidden"
                            name="shoes_id"
                            value="{{ $shoe->id }}"
                            >
                            @auth
                                <input
                                type="hidden"
                                name="user_id"
                                value="{{ Auth::user()->id }}"
                                >
                            @endauth
                            <button type="submit" class="like-btn">
                                <span style="font-size: 1em; color: #f44336;">
                                @if (($shoe->likes->where('user_id', Auth::id())->first()))
                                    <i class="fas fa-heart"></i>
                                @else
                                    <i class="far fa-heart"></i>
                                @endif
                                    {{ count($shoe->likes) }}
                                </span>
                            </button>
                        </form>

                    </div>
                    <div class="comments-btn">
                        <a href="#">
                            <span style="font-size: 1em; color: #c0c0c0;">
                                <i class="far fa-comment-alt"></i>
                                {{ count($shoe->comments) }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div
            class="col-md-7ml-auto mr-auto d-flex align-item-center d-flex align-items-center"
            >
                <div class="card-description">
                    <p class="top-kicks-name">{{ $shoe->name }}</p>
                    <p class="kicks-comp">{{ $shoe->manufacturer->name }}</p>
                    <p class="top-text">{{ $shoe->description }}</p>
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
            <form
            action="{{ route('shoes.comment', $shoe->id) }}"
            method="post"
            >
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="hidden" name="shoes_id" value="{{ $shoe->id }}">
                <textarea
                class="form-control"
                name="comment"
                placeholder="write your comments about this kicks..."
                cols="40"
                rows="10"
                ></textarea>
                <button
                type="submit"
                class="btn btn-primary comment-btn"
                value="送信"
                >送信</button>
            </form>
        </div>
    </div>
</div>

@endsection