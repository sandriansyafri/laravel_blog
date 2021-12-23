@extends('layout.frontend.main')

@section('title')
    Posts
@endsection

@section('content')
    <div class="row mb-3">
          <div class="col">
                <h1>
                      @isset($data['title'])
                          Category | {{ $data['title'] }}
                          @else
                          All Posts
                      @endisset
                </h1>
          </div>
    </div>

    <div class="row">
          <div class="col p-0">
                <ul class="list-group">
                     @foreach ($posts as $post)
                     <li class="list-group-item border-0 mb-3">
                        <div class="card border border-danger shadow-sm p-3">
                              <div class="card-body ">
                                    <h5 class="text-capitalize mb-2">{{ $post->title }}</h5>
                                    <small class="mb-3 d-block">Category : {{ $post->category->name }} | by : {{ $post->user->name }}</small>
                                    <div class="mb-3">
                                          {!! $post->excerpt !!}
                                    </div>
                                    <div class="mb-3">
                                          <a href="{{ route('posts.show',$post->slug) }}" class="btn btn-danger shadow-sm py-2 px-5">Read more</a>
                                    </div>
                              </div>
                        </div>
                  </li>
                     @endforeach
                </ul>
          </div>
    </div>

@endsection