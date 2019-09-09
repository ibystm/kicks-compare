@extends('layouts.master_admin')

@section('content')
    <div class="container">
        <h2 class="newkicks-title">
            Edit view
        </h2>
        <form
        action="{{ route('admin.update', $shoe->id) }}"
        method="post"
        enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>
                    name
                </label>
                <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $shoe->name) }}"
                required
                >
            </div>
            <div class="form-group">
                <label>
                    manufacturer
                </label>
                <select
                name="manufacturer_id"
                class="form-control select-primary select-block"
                style="padding: 0;"
                >
                    <option selected>
                        select manufacturer
                    </option>
                    @foreach($manufacturer as $manufacture)
                        <option
                        value="{{ $manufacture->id }}"
                        >
                            {{ $manufacture->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label style="margin-right: 2rem;">
                    image
                </label>
                <label>
                    <span class="btn btn-inverse">
                        Choose file
                        <input
                        type="file"
                        name="image_url"
                        class="form-control"
                        required
                        style="display: none;"
                        value="{{ old('image_url', $shoe->image_url) }}"
                        >
                    </span>
                </label>
                <div class="preview">
                    <img src="" alt="">
                </div>
            </div>
            <div class="form-group">
                <label>
                    description
            </label>
                <textarea
                name="description"
                class="form-control"
                cols="30"
                rows="10"
                required
                >
                    {{ old('description', $shoe->description) }}
                </textarea>
                <button class="btn btn-primary btn-wide create-btn">
                    送信
                </button>
            </div>
        </form>
    </div>
@endsection
