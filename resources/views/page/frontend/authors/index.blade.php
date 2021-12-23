@extends('layout.frontend.main')

@section('title')
    Categories
@endsection

@section('content')
<div class="row mb-3">
      <div class="col">
            <h1>Authors</h1>
      </div>
</div>
    <div class="row">
          <div class="col">
                <ul class="list-group list-group-flush ">
                 @foreach ($authors as $author)
                 <li class="list-group-item border-0 border-bottom border-danger">
                  <a href="{{ route('authors.show', $author->username) }}" class="nav-link p-0 text-secondary">
                      <h5>
                        {{ $author->name }}
                      </h5>
                  </a>
            </li>
                 @endforeach
                   
                </ul>
          </div>
    </div>
@endsection