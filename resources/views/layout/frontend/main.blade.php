<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      @include('layout.frontend.part.style')
    <title> {{ env('APP_NAME') }} | @yield('title','Home') </title>
  </head>
  <body>
      @include('layout.frontend.part.navbar')
      <div class="container">
            @yield('content')
      </div>
</body>
@include('layout.frontend.part.script')
</html>