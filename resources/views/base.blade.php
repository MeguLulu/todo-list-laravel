<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Todo List</title>
    {{-- Bootstrap Css --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{-- DateTime Picker Bootstrap --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/css/bootstrap-datetimepicker.min.css">
    {{-- Main Css --}}
    <link rel="stylesheet" href="/css/styles.css">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- jQuery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> --}}
    {{-- Bootstrap Js --}}
    <script type="text/javascript" src="/js/app.js"></script>
    {{-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    {{-- DateTime Picker Js --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/js/bootstrap-datetimepicker.min.js"></script>
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
      <div class="container">
        <div class="row">
          @yield('content')
        </div>
      </div>

    </div>

    <footer>

    </footer>
      @yield('javascript')
  </body>
</html>
