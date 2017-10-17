@extends('base')
@section('content')
  <h1>Todo List</h1>
  <h2 class="sub-h1">Developped by
    <a href="https://github.com/VenrogMegu">Venrog Megu <i class="fa fa-github" aria-hidden="true"></i></a>
    with <a href="https://laravel.com/">Laravel</a>
  </h2>
  {{-- Todo List Panel --}}
  <div class="col-md-8 col-md-offset-2 block-todo">



    <a href="#" id="createTask"><button type="button" class="btn btn-success">Create Task</button></a>
    <a href="#" id="createRemind"><button type="button" class="btn btn-warning">Create Remind</button></a>
    @foreach ($to_do_list as $event)
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4>{{$event->title}}</h4>
          <h4>{{$event->date()}}</h4>
        </div>
        <div class="panel-body panel-fix">

        </div>
        <div class="panel-footer">
            @if ($event instanceof App\Models\Task)
              <a href="{{route('task.edit', $event->id)}}" data-hover="tooltip" data-placement="top" data-target="#modal-edit-posts{{ $event->id }}" data-toggle="modal" id="modal-edit" title="Edit"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
            @elseif ($event instanceof App\Models\Remind)
              <a href="{{route('remind.edit', $event->id)}}" data-hover="tooltip" data-placement="top" data-target="#modal-edit-posts{{ $event->id }}" data-toggle="modal" id="modal-edit" title="Edit"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
            @endif
          </button>
        </div>
      </div>
    @endforeach
  </div>
@endsection
{{-- Modals --}}
@include('modals.taskModal')
@include('modals.remindModal')

@section('javascript')
  <script>

  $(function(){
    // Js pour afficher les modals
    
    $('#createTask').click(function() {
      $('#taskModal').modal();
    });

    $('#createRemind').click(function() {
      $('#remindModal').modal();
    });

    // Js pour afficher le dateTime Picker
    $(".form_datetime").datetimepicker({
      autoclose: true,
      todayBtn: true,
      minuteStep: 10
    });
  })
  </script>
@endsection
