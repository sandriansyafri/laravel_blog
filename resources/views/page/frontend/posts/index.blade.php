@extends('layout.frontend.main') @section('title') Posts @endsection
@section('content')
<div class="row ">
    <div class="col text-center">
        @isset($title)
        <h1>{{ $title }}</h1>
        @endisset
    </div>
</div>

<div class="row justify-content-center my-4">
      <div class="col-8">
           <form action="{{ route('posts.index') }}">
            <div class="input-group">
                @if (request('category'))
                <input type="hidden"  name="category" value="{{ request('category') }}" >
                @elseif(request('author'))
                <input type="hidden"  name="author" value="{{ request('author') }}" >
                @endif
                  <input type="text" class="form-control rounded-0 border border-danger" name="search" value="{{ request('search') }}" placeholder="keywords : title">
                  <button type="submit" class="btn btn-outline-danger rounded-0">Search</button>
            </div>
           </form>
      </div>
</div>

@if ($posts->count())
<div class="row mb-4">
    <div class="col">
        @if ($posts[0]->image)
            <img class="card-img-top" height="350" src="{{ asset('assets/images/posts/' . $posts[0]->image) }}" alt="">
            @else
            <img class="card-img-top" height="350" src="{{ asset('assets/images/posts/blank.jpg') }}" alt="">
        @endif
        <div class="card rounded-0 border border-danger">
            <div class="card-body p-4">
                <small class="fw-bold d-inline-block mb-3">
                    Author :
                    <span class="ms-2">
                        <a
                            href="{{ url('posts?author=' . $posts[0]->author->username) }}"
                            class="text-decoration-none fw-normal text-danger"
                        >
                            {{ $posts[0]->author->name }}
                        </a>
                    </span>
                </small>
                <h4 class="text-capitalize text-danger">
                    @if (strlen($posts[0]->title) > 15)
                    {{ Str::substr($posts[0]->title, 0, 10) }} ... @else
                    {{ $posts[0]->title }}
                    @endif
                </h4>

                <div class="fs-6 mb-3">
                    {!! Str::substr($posts[0]->excerpt, 0, 100) !!}
                </div>

                <small class="fw-bold d-inline-block mb-3">
                    Category :
                    <span class="ms-2">
                        <a
                            href="{{ url('posts?category=' . $posts[0]->category->slug)  }}"
                            class="text-decoration-none fw-normal text-danger"
                        >
                            {{ $posts[0]->category->name }}
                        </a>
                    </span>
                </small>

                <a
                    href="{{ route('posts.show',$posts[0]->slug) }}"
                    class="btn btn-danger rounded-0 btn-sm w-100"
                    >Read</a
                >
            </div>
        </div>
    </div>
</div>
@else
<div class="row mt-5">
    <div class="col text-center">
        <p class="lead fs-4">(empty)</p>
    </div>
</div>
@endif

<div class="row justify-content-center">
    <div class="col-12">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-12 col-md-4 mb-4">
                <div class="card rounded-0 border border-danger">
                    @if ($post->image)
                        <img class="card-img-top" height="200" src="{{ asset('assets/images/posts/' . $post->image) }}" alt="">
                        @else
                        <img class="card-img-top" height="200" src="{{ asset('assets/images/posts/blank.jpg') }}" alt="">
                    @endif
                    <div class="card-body p-4">
                        <small class="fw-bold d-inline-block mb-3">
                            Author :
                            <span class="ms-2">
                                <a
                                    href="{{ url('posts?author=' . $post->author->username) }}"
                                    class="
                                        text-decoration-none
                                        fw-normal
                                        text-danger
                                    "
                                >
                                    {{ $post->author->name }}
                                </a>
                            </span>
                        </small>
                        <h4 class="text-capitalize text-danger">
                            @if (strlen($post->title) > 15)
                            {{ Str::substr($post->title, 0, 10) }} ...
                             @else
                            {{ $post->title }}
                            @endif
                        </h4>

                        <div class="fs-6 mb-3">
                              @if (strlen($post->excerpt) > 80)
                                  {!! substr($post->excerpt,0,80) !!}
                              @else 
                                    {!! $post->excerpt !!}
                              @endif
                        </div>

                        <small class="fw-bold d-inline-block mb-3">
                            Category :
                            <span class="ms-2">
                                <a
                                    href="{{ url('posts?category=' . $post->category->slug) }}"
                                    class="
                                        text-decoration-none
                                        fw-normal
                                        text-danger
                                    "
                                >
                                    {{ $post->category->name }}
                                </a>
                            </span>
                        </small>

                        <a
                            href="{{ route('posts.show',$post->slug) }}"
                            class="btn btn-danger rounded-0 btn-sm w-100"
                            >Read</a
                        >
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>

@endsection
