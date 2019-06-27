@extends('layouts.master_admin')

@section('content')

@if(empty($inputs) && isset($pickup))
    <div class="first-card pt-4 pb-4">
        <div class="container">
        <div class="row">
            <div class="col-md-5 ml-auto mr-auto my-auto">
                <div class="card-image big">
                    <div class="image-box">
                        <a href="show/{{ $pickup->id }}">
                            <img
                            src="../storage/{{ $pickup->image_url }}"
                            alt="{{ $pickup->name }}"
                            style="max-width: 500px; max-height: 500px"
                            >
                        </a>
                    </div>
                    <div class="newest">
                        <span>NEW</span>
                    </div>
                </div>
            </div>
            <div
            class="col-md-7 ml-auto mr-auto d-flex align-item-center d-flex align-items-center"
            >
                <div class="card-description">
                    <p class="top-kicks-name">
                        {{ $pickup->name }}
                    </p>
                    <p class="kicks-comp">
                        {{ $pickup->manufacturer->name }}
                    </p>
                    <p class="top-text">
                        {{ $pickup->description }}
                    </p>
                </div>
            </div>
        </div>
        </div>
    </div>
@endif
<div class="second-card">
    <div class="wrapper">
        <div class="container">
            <main>
                <article>
                    <div class="row">
                        @foreach($shoes as $shoe)
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="image-box">
                                        <div class="card-image all">
                                            <a href="show/{{ $shoe->id }}">
                                                <img
                                                src="../storage/{{ $shoe->image_url }}"
                                                alt="{{ $shoe->name }}の画像"
                                                style="max-width: 300px; max-height: 300px"
                                                >
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p class="kicks-name">
                                                {{ $shoe->name }}
                                            </p>
                                            <p class="comp-name">
                                                {{ $shoe->manufacturer->name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if(count($shoes) == 0)
                            <div class="no-search">
                                NO SERACH RESULTS...
                            </div>
                        @endif
                    </div>
                </article>
            </main>
        </div>
    </div>
</div>

<div class="container" style="text-align: center;">
    {{ $shoes->links() }}
</div>
@endsection

