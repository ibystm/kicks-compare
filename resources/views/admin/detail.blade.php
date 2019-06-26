@extends('layouts.master_admin')

@section('content')
<div class="first-card pt-4 pb-4">
    <div class="container">
        <h3 class="detail-title">Edit view </h3>
        <div class="row detail-box">
                <div class="col-md-5">
                    <div class="card-image big">
                        <div class="image-box">
                            <img
                            src="../../storage/{{ $shoe->image_url }}"
                            alt="{{ $shoe->name }}の写真"
                            >
                        </div>
                    </div>
                </div>
                <div
                class="col-md-7"
                >
                <div class="card-description">
                    <p class="top-kicks-name">
                        {{ $shoe->name }}
                    </p>
                    <p class="kicks-comp">
                        {{ $shoe->manufacturer->name }}
                    </p>
                    <p class="top-text">
                        {{ $shoe->description }}
                    </p>
                    <form action="{{ route('admin.delete', $shoe->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $shoe->id }}">
                        <button type="submit" class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
