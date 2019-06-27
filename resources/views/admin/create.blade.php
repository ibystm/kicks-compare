@extends('layouts.master_admin')

@section('content')
    <div class="container">
        <h2 class="newkicks-title">
            new KICKS...
        </h2>
        <form
        action="{{ route('admin.create') }}"
        method="post"
        enctype="multipart/form-data"
        >
            @csrf
            <div class="form-group">
                <label>
                    name
                </label>
                <input
                type="text"
                name="name"
                class="form-control"
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
                        >
                    </span>
                </label>
                <div class="preview">
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
                ></textarea>
                <button class="btn btn-primary btn-wide create-btn">
                    送信
                </button>

            </div>
        </form>
    </div>
@endsection
