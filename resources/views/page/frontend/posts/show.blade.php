@extends('layout.frontend.main') 

@section('title')
    Post
@endsection

@section('content')
<div class="row mb-4 justify-content-center ">
    <div class="col-12 p-0 ">
        <div class="row align-items-center">
            <div class="col">
                <h1>Post</h1>
              </div>
              <div class="col text-end">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-danger py-2 px-5 rounded-0">Kembali</a>
              </div>
        </div>
    </div>
</div>


<div class="row justify-content-center ">
      <div class="col-12 border border-danger p-5 rounded-0">
          <p class="mb-3">
              <span class="fw-bold">Category : </span> 
              <a href="{{ url('posts?category=' . $post->category->slug) }}" class="nav-link d-inline p-0 text-danger">
                {{ $post->category->name }}
              </a>
            </p>
            <h4>{{ $post->title }}</h4>
            <div class="mb-3">
                  {!! $post->body !!}
            </div>
      </div>
</div>

@endsection
