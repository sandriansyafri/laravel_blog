@extends('layout.backend.main') @section('title') Create @endsection
@push('css')
<link
    rel="stylesheet"
    href="{{ asset('template/backend/assets/dist/css/trix.css') }}"
/>
<script src="{{ asset('template/backend/assets/dist/js/trix.js') }}"></script>

<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
</style>

@endpush @section('content')
<div class="row">
    <div class="col">
        <form
            action="{{ route('dashboard.posts.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="row">
                <div class="col">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Title</label>
                            <input
                                type="text"
                                class="
                                    form-control
                                    rounded-0
                                    @error('title')
                                    is-invalid
                                    @enderror
                                "
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="Title"
                            />
                            @error('title')<span class="invalid-feedback">{{
                                $message
                            }}</span
                            >@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Slug (Auto)</label>
                            <input
                                type="text"
                                class="
                                    form-control
                                    rounded-0
                                    @error('slug')
                                    is-invalid
                                    @enderror
                                "
                                name="slug"
                                placeholder="Slug"
                                value="{{ old('slug') }}"
                            />
                            @error('slug')<span class="invalid-feedback">{{
                                $message
                            }}</span
                            >@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Category</label>
                            <select
                                name="category_id"
                                id=""
                                class="form-select rounded-0"
                            >
                                <option value="">
                                    Open this select category
                                </option>
                                @foreach ($categories as $category_id =>
                                $category) @if (old('category_id') ==
                                $category_id )
                                <option value="{{ $category_id }}" selected>
                                    {{ $category }}
                                </option>
                                @endif
                                <option value="{{ $category_id }}">
                                    {{ $category }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input
                                type="file"
                                class="form-control"
                                name="image"
                                onchange="previewImage()"
                            />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md">
                            <input type="hidden" id="body" name="body" />
                            <trix-editor
                                class="@error('body') is-invalid @enderror"
                                input="body"
                            ></trix-editor>
                            @error('body')
                            <small class="invalid-feedback">
                                {{ $message }}
                            </small>

                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col">
                    <img src="" class="img-fluid image-preview" alt="" />
                </div>
            </div>
            <button class="btn btn-primary btn" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection @push('js')
<script>
    let title = document.querySelector("input[name=title]");
    let slug = document.querySelector("input[name=slug]");

    title.addEventListener("change", function (e) {
        let data = e.target.value;
        fetch(`http://127.0.0.1:8000/dashboard/posts/check-slug?title=${data}`)
            .then((res) => res.json())
            .then((res) => (slug.value = res.slug));
    });

    document.addEventListener("trix-file-accept", function (e) {
        e.preventDefault();
    });

    function previewImage() {
        let file = document.querySelector("input[name=image]").files[0];
        let imagePreview = document.querySelector(".image-preview");
        let readerFile = new FileReader();
        readerFile.readAsDataURL(file);
        readerFile.onload = function (e) {
            imagePreview.src = e.target.result;
        };
    }
</script>
@endpush
