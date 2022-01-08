@extends('layout.frontend.main') 

@section('title')
    Authors
@endsection

@section('content')
<div class="row mb-2">
    <div class="col text-center">
        <h1>Authors</h1>
    </div>
</div>

<div class="row justify-content-center pb-5"> 
      <div class="col col-md-6">
            <ul class="list-group">
                  @foreach ($authors as $author)
                  <li class="list-group-item border border-danger p-3">
                        <a href="{{ url('posts?author=' . $author->username) }}" class="nav-link p-0 text-danger">{{ $author->name }}</a>
                  </li>
                  @endforeach
            </ul>
      </div>
</div>
@endsection 