@extends('layout.frontend.main') 

@section('title')
    Categories
@endsection

@section('content')
<div class="row mb-3">
    <div class="col text-center">
        <h1>Categories</h1>
    </div>
</div>

<div class="row justify-content-center"> 
      <div class="col col-md-6">
            <ul class="list-group">
                  @foreach ($categories as $category)
                  <li class="list-group-item border border-danger p-3">
                        <a href="{{ url('posts?category=' . $category->slug) }}" class="nav-link p-0 text-danger">{{ $category->name }}</a>
                  </li>
                  @endforeach
            </ul>
      </div>
</div>
@endsection