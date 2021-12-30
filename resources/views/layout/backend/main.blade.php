
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Admin | @yield('title','Dashboard')</title>
    @include('layout.backend.part.style')
    @stack('css')
  </head>
  <body>
    
    @include('layout.backend.part.navbar')

<div class="container-fluid">
  <div class="row">
    @include('layout.backend.part.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@yield('title','Dashboard')</h1>
        @section('btn-action')@show
      </div>
        
      @yield('content')

    </main>
  </div>
</div>

  @include('layout.backend.part.script')
  @stack('js')
  </body>
</html>
