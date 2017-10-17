<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Todo List</title>
    {{-- Bootstrap Css --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{-- Main Css --}}
    <link rel="stylesheet" href="/css/styles.css">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    {{-- Bootstrap Js --}}
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @section('stylesheet')
    @endsection
  </head>
  <body>
    <header>
      <nav class="navbar navbar-default navbar-fixed-top nav-css">
        <div class="container">
          <span class="nav-text">Todo List</span>
        </div>
      </nav>
    </header>

    <div class="content">
      @yield('content')
    </div>

    <footer>

    </footer>
  </body>
</html>
