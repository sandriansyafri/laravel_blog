@extends('layout.backend.main')

@section('title')
    Hello , {{ Auth::user()->username }}
@endsection

@section('content')
    <div class="row my-4">
        <div class="col-md-3" >
                <div class="card bg-success shadow-sm ">
                    <div class="card-body">
                        <h1 class="display-3 text-center text-white mb-0">
                            {{ $count['post'] }}
                        </h1>
                        <h4 class="text-center text-white">
                           Post
                        </h4>
                    </div>
                    <div class="card-footer bg-success p-0">
                        <a href="{{ route('dashboard.posts.index') }}" class="btn bg-white rounded-0 w-100 border-0 ">
                            <strong>More detail</strong>
                        </a>
                    </div>
                </div>
        </div>
    </div>
@endsection

