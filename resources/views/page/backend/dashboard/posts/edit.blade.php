@extends('layout.backend.main') @section('title') Edit @endsection
@push('css')
<link rel="stylesheet" href="{{ asset('template/backend/assets/dist/css/trix.css') }}">
<script src="{{ asset('template/backend/assets/dist/js/trix.js') }}"></script>

<style>
    trix-toolbar [data-trix-button-group="file-tools"]  {
        display: none
    }
</style>

@endpush
@section('content')
<div class="row">
    <div class="col">
        <form action="{{ route('dashboard.posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Title</label>
                            <input
                                type="text"
                                class="form-control rounded-0 @error('title') is-invalid @enderror"
                                name="title"
                                value="{{ old('title', $post->title) }}"
                                placeholder="Title"
                            />
                            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Slug (Auto)</label>
                            <input
                                type="text"
                                class="form-control rounded-0 @error('slug') is-invalid @enderror"
                                name="slug"
                                placeholder="Slug"
                                value="{{ old('slug', $post->slug) }}"
                            />
                            @error('slug')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                          <div class="col">
                              <label for="">Category</label>
                                <select name="category_id" id="" class="form-select rounded-0">
                                      <option value="">Open this select category</option>
                                      @foreach ($categories as $category_id => $category)
                                        <option value="{{ $category_id }}" {{ $post->category_id === $category_id ? 'selected' : '' }}>{{ $category }}</option>
                                      @endforeach
                                </select>
                          </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="hidden" name="oldImage" value="{{ $post->image }}" >
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
                            <input type="hidden" id="body" name="body" value="{{ $post->body }}"  >
                            <trix-editor class="@error('body') is-invalid @enderror" input="body"></trix-editor>
                            @error('body')
                            <small class="invalid-feedback">
                                {{ $message }}
                            </small>
                        
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="col">
                    @if ($post->image)
                    <img src="{{ asset('assets/images/posts/' . $post->image ) }}" class="img-fluid image-preview" alt="" />
                    @else
                    <img src="" class="img-fluid image-preview" alt="" />
                    @endif
                </div>
            </div>
           <div class="row">
               <div class="col-6">
                   <div class="row">
                       <div class="col">
                        <button class="btn btn-primary btn" type="submit">Submit</button>
                       </div>
                       <div class="col text-end">
                        <a href="{{ route('dashboard.posts.show',$post->slug) }}" class="btn btn-outline-primary px-5">Back</a>
                       </div>
                   </div>
               </div>
           </div>
        </form>
    </div>
</div>
@endsection 
@push('js')
<script>
    let title = document.querySelector("input[name=title]");
    let slug = document.querySelector("input[name=slug]");

    title.addEventListener("change", function (e) {
        let data = e.target.value;
        fetch(`http://stormy-hamlet-57258.herokuapp.com/dashboard/posts/check-slug?title=${data}`)
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

