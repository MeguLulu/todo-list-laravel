@extends('base')
@section('content')
  <h1>Todo List</h1>
  <h2 class="sub-h1">Developped by
    <a href="https://github.com/VenrogMegu">Venrog Megu <i class="fa fa-github" aria-hidden="true"></i></a>
    with <a href="https://laravel.com/">Laravel</a>
  </h2>

  {{-- Todo List Panel --}}
  <div class="col-md-8 col-md-offset-2 block-todo">

    <a href="#" id="createTask" class="btn btn-info btn-sm">Create Task</a>
    <a href="#" id="createRemind" class="btn btn-warning btn-sm">Create Remind</a>
    {{-- Todo Final Edition --}}
    <div class="content-event">
      <ul class="list-event">
        @foreach ($to_do_list as $event)
          <li
          class="li-item
          @if ($event instanceof App\Models\Task) li-task
          @elseif ($event instanceof App\Models\Remind) li-remind @endif">
            {{$event->title}}

            @if ($event instanceof App\Models\Task)
              <span class="label label-info pull-right">Task</span>
            @elseif ($event instanceof App\Models\Remind)
              <span class="label label-warning pull-right">Remind</span>
            @endif
            <br>
            <div class="row">
            <span class="col-md-4">Date : {{ (date("l d F Y", strtotime($event->date()) ) ) }}</span>
            @if ($event instanceof App\Models\Task)
              <span class="col-md-4">Start at : {{ (date("g a", strtotime($event->date()) ) ) }}</span>
              <span class="col-md-4">End at : {{ (date("g a", strtotime($event->end) ) ) }}</span>
            @endif
          </div>
          <div class="row btn-action-group">
            <a href="#" class="btn btn-xs btn-success btn-align">Edit</a>
            <a href="#" class="btn btn-xs btn-danger">Delete</a>
          </div>
          </li>
          {{-- <hr> --}}
        @endforeach
      </ul>
    </div>
    @foreach ($to_do_list as $event)

      <div class="panel panel-primary">
        <div class="panel-heading">
          @if ($event instanceof App\Models\Task)
            <span class="label label-info">Task</span>
          @elseif ($event instanceof App\Models\Remind)
            <span class="label label-warning">Remind</span>
          @endif
          <h4>{{$event->title}}</h4>
          <h4>{{ (date("l d F Y", strtotime($event->date()) ) ) }}</h4>

        </div>
        <div class="panel-body panel-fix">

        </div>
        <div class="panel-footer">
          {{-- {{route('task.edit', $event->id)}} --}}
          @if ($event instanceof App\Models\Task)
            <a href="#"
            {{-- data-hover="tooltip" --}}
            data-id="{{$event->id}}"
            data-title="{{$event->title}}"
            data-begin="{{$event->begin}}"
            data-end="{{$event->end}}"
            data-toggle="modal"
            class="editTask btn btn-warning btn-sm"
            title="Edit">
            Edit</a>
          @elseif ($event instanceof App\Models\Remind)
            <a href="#"
            data-hover="tooltip"
            {{-- data-placement="top" --}}
            data-id="{{$event->id}}"
            data-title="{{$event->title}}"
            data-day="{{$event->day}}"
            data-toggle="modal"
            class="editRemind btn btn-warning btn-sm"
            title="Edit">
            Edit</a>
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
@if (isset($event))
  @include('modals.taskEditModal')
  @include('modals.remindEditModal')
@endif
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

    $('.editTask').click(function() {
      $('.taskEditModal').modal();
      var $id = $(this).attr('data-id');
      var $title = $(this).attr('data-title');
      var $begin = $(this).attr('data-begin');
      var $end = $(this).attr('data-end');
      $('.modal-form').attr('action', '/task/'+$id+'/update');
      $('input[name=title]').attr('value', $title);
      $('input[name=begin]').attr('value', $begin);
      $('input[name=end]').attr('value', $end);
    });

    $('.editRemind').click(function() {
      $('.remindEditModal').modal();
      var $id = $(this).attr('data-id');
      var $title = $(this).attr('data-title');
      var $date = $(this).attr('data-date');
      $('.modal-form').attr('action', '/remind/'+$id+'/update');
      $('input[name=title]').attr('value', $title);
      $('input[name=date]').attr('value', $date);
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
