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
    {{-- Bundle App.js (jQuery, Bootstrap Js et script de l'application) --}}
    <script type="text/javascript" src="/js/app.js"></script>
    {{-- DateTime Picker Js --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/js/bootstrap-datetimepicker.min.js"></script>
  </head>

  <body>
    {{-- Header du site --}}
    <header>
      <nav class="navbar navbar-default navbar-fixed-top nav-css">
        <div class="container">
          <span class="nav-text">Todo List</span>
        </div>
      </nav>
    </header>
    {{-- Conteneur du site --}}
    <div class="content">
      <div class="container">
        <div class="row">
          @yield('content')
        </div>
      </div>
    </div>

    {{-- Pied de page du site --}}
    <footer>
      @yield('footer')
    </footer>
    @yield('javascript')
  </body>
</html>
