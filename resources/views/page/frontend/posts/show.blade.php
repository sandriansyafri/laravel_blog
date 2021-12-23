@extends('layout.frontend.main')

@section('title')
    Post
@endsection

@section('content')
<div class="row">
      <div class="col">
            <h1>Post</h1>
      </div>
</div>
    <div class="row">
          <div class="col p-0">
            <ul class="list-group">
                  <li class="list-group-item border-0 mb-3">
                     <div class="card border border-danger shadow-sm p-3">
                           <div class="card-body ">
                              <h5 class="text-capitalize mb-2">{{ $post->title }}</h5>
                              <small class="mb-3 d-block">Category : {{ $post->category->name }}</small>
                              <div class="mb-3">
                                    {!! $post->body !!}
                              </div>
                                 <div class="mb-3">
                                       <a href="{{ route('posts.index') }}" class="btn btn-danger shadow-sm py-2 px-5">Back</a>
                                 </div>
                           </div>
                     </div>
               </li>
             </ul>
          </div>
    </div>
@endsection