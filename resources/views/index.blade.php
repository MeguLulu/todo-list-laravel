@extends('base')
@section('content')
  <h1>Todo List</h1>
  <h2 class="sub-h1">developped by
    <a href="https://github.com/VenrogMegu">Venrog Megu <i class="fa fa-github" aria-hidden="true"></i></a>
     with <a href="https://laravel.com/">Laravel</a>
  </h2>
  {{-- Todo List Panel --}}
  <div class="col-md-8 col-md-offset-2 block-todo">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4>Ma liste todo</h4>
      </div>
      <div class="panel-body">
        Mon contenu
      </div>
      <div class="panel-footer">
        Mon footer
      </div>
    </div>
  </div>
@endsection
