@extends('layout.frontend.main')

@section('title')
    Register
@endsection

@section('content')
    <div class="row justify-content-center mb-4">
          <div class="col-6 text-center">
                <h1>Register</h1>
          </div>
    </div>

    <div class="row justify-content-center">
          <div class="col col-md-6">
           <form action="" method="post">
                 @csrf
            <div class="card shadow-sm rounded-0">
                  <div class="card-body p-5">
                        <div class="mb-3">
                              <label for="">Name</label>
                              <input type="text" value="{{ old('name') }}" name="name"  class="form-control   @error('name') is-invalid @enderror">
                              @error('name')<span class="invalid-feedback"> {{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                              <label for="">Username</label>
                              <input type="text" value="{{ old('username') }}" name="username" class="form-control @error('username') is-invalid @enderror">
                              @error('username')<span class="invalid-feedback"> {{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                              <label for="">Email</label>
                              <input type="text" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror">
                              @error('email')<span class="invalid-feedback"> {{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                              <label for="">Password</label>
                              <input type="text"  name="password" class="form-control @error('password') is-invalid @enderror">
                              @error('password')<span class="invalid-feedback"> {{ $message }}</span>@enderror

                        </div>
                        <div class="mb-3">
                              <label for="">Confirm Password </label>
                              <input type="text"  name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                              @error('password_confirmation')<span class="invalid-feedback"> {{ $message }}</span>@enderror

                        </div>
                        <div class="mb-0">
                              <button type="submit" class="btn btn-danger rounded-0 w-100 mb-2">Register</button>
                              <small>Have account before ? <a href="{{ route('login') }}" class="nav-link p-0 text-danger d-inline-block">Login</a></small>
                        </div>
                  </div>
            </div>
           </form>
          </div>
    </div>
@endsection