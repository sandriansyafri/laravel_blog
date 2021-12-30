@extends('layout.backend.main')

@section('title')
    Categories
@endsection

@section('content')
    <div class="row mt-4">
          <div class="col col-md-6">
                <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary btn-sm mb-3">
                      <i data-feather="plus"></i> Add New Categories
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
                              <th class="text-center" >Category</th>
                              <th class="text-center" >Action</th>
                        </tr>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td class="text-center">{{ $category->name }}</td>
                              <td class="text-center">
                                          <a href="{{ route('dashboard.categories.edit',$category->slug) }}" class="badge bg-warning">
                                                <i data-feather="edit"></i>
                                          </a>
                                          <form action="" method="category" class="d-inline">
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