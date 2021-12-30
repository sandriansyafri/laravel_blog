@extends('layout.backend.main')

@section('title')
   Detail Post | {{ $post->title }}
@endsection

@section('btn-action')
    @parent
  <div>
      <a href="{{ route('dashboard.posts.index') }}" class="btn btn-sm btn-primary">
            <i data-feather="arrow-left"></i> Back
      </a>
      <a href="{{ route('dashboard.posts.edit', $post->slug) }}" class="btn btn-sm btn-warning">
            <i data-feather="edit"></i> Edit
      </a>
  <form action="{{ route('dashboard.posts.destory',$post->id) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('delete?')" class="btn btn-sm btn-danger border-0 ">
            <i data-feather="trash"></i> Delete
      </button>
  </form>
  </div>
@endsection

@section('content')

<div class="row justify-content-center ">
      <div class="col-12 rounded-0">
            <img src="{{ asset('assets/images/posts/' . $post->image) }}" width="500" alt="">
          <p class="mb-3">
              <span class="fw-bold">Category : </span> 
              <a href="{{ url('posts?category=' . $post->category->slug) }}" class="nav-link d-inline p-0 text-secondary">
                {{ $post->category->name }}
              </a>
            </p>
            <h4>{{ $post->title }}</h4>
            <div class="mb-3 lead fs-6">
                  {!! $post->body !!}
            </div>
      </div>
</div>

@endsection