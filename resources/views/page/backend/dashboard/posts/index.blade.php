@extends('layout.backend.main')

@section('title')
    Posts
@endsection

@section('content')
    <div class="row mt-4">
          <div class="col">
                <a href="{{ route('dashboard.posts.create') }}" class="btn btn-primary btn-sm mb-3">
                      <i data-feather="plus"></i> Add New Posts
                </a>

                @if (session('status'))
                <div class="row  mb-2">
                      <div class="col col-md">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>{{ session('status') }}, </strong>
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                      </div>
                </div>
                @endif

            <table class="table table-hover ">
                  <thead>
                        <tr>
                              <th class="text-center" style="width: 10px">#</th>
                              <th class="text-center" style="width: 50%">Title</th>
                              <th class="text-center" style="width: 20%">Category</th>
                              <th class="text-center" style="width: 20%">Action</th>
                        </tr>
                        <tbody>
                            @forelse ($posts as $post)
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td class="text-center">{{ $post->title }}</td>
                              <td class="text-center">{{ $post->category->name }}</td>
                              <td class="text-center">
                                          <a href="{{ route('dashboard.posts.show',$post->slug) }}" class="badge bg-primary">
                                                <i data-feather="eye"></i>
                                          </a>
                                          <a href="{{ route('dashboard.posts.edit',$post->slug) }}" class="badge bg-warning">
                                                <i data-feather="edit"></i>
                                          </a>
                                          <form action="{{ route('dashboard.posts.destory',$post->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class=" badge bg-danger border-0">
                                                      <i data-feather="trash"></i>
                                                </button>
                                          </form>
                              </td>
                        </tr>
                            @empty
                            <tr>
                                  <td colspan="4" class="text-center">
                                        (empty)
                                  </td>
                            </tr>
                            @endforelse
                        </tbody>
                  </thead>
                </table>
          </div>
    </div>
@endsection