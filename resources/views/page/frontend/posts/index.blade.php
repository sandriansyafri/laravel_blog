@extends('layout.frontend.main')

@section('title')
    Posts
@endsection

@section('content')
    <div class="row">
          <div class="col">
                <h1>
                      Posts
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
                                    <h5 class="text-capitalize">{{ $post->title }}</h5>
                                    <div>
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