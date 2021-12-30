@extends('layout.frontend.main')

@section('title')
    Login
@endsection

@section('content')



    <div class="row justify-content-center mb-4">
          <div class="col col-md-6 text-center">
                <h1>Login</h1>
          </div>
    </div>

    @if (session('status'))
<div class="row justify-content-center mb-4">
      <div class="col col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('status') }}, </strong> Login and write something here!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
      </div>
</div>
@endif

    @if (session('loginErrors'))
<div class="row justify-content-center mb-4">
      <div class="col col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong> {{ session('loginErrors') }} </strong> 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
      </div>
</div>
@endif

    <div class="row justify-content-center">
          <div class="col col-md-6">
              <form action="" method="post">
                    @csrf
                  <div class="card shadow-sm rounded-0">
                        <div class="card-body p-5">
                              <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="text" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror"> 
                                    @error('email')<span class="invalid-feedback"> {{ $message }}</span>@enderror

                              </div>
                              <div class="mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control">
                              </div>
                              <div class="mb-0">
                                    <button type="submit" class="btn btn-danger rounded-0 w-100 mb-2">Login</button>
                                    <small>Don't have account ? <a href="{{ route('register') }}" class="nav-link p-0 text-danger d-inline-block">Register</a></small>
  
                              </div>
                        </div>
                  </div>
              </form>
          </div>
    </div>
@endsection