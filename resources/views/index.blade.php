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
          @if ($event instanceof App\Models\Task)
            <li class="li-item li-task" data-type='task' data-id="{{$event->id}}">
              {{$event->title}}
              <span class="label label-info pull-right">Task</span>
              <div class="row">
                <span class="col-md-4">Date : {{ (date("l d F Y", strtotime($event->date()) ) ) }}</span>
                <span class="col-md-4">Start at : {{ (date("g a", strtotime($event->date()) ) ) }}</span>
                <span class="col-md-4">End at : {{ (date("g a", strtotime($event->end) ) ) }}</span>
              </div>
              <div class="row btn-action-group">
                <a href="#" class="btn btn-xs btn-success btn-align">Edit</a>
                <a href="#" class="btn btn-xs btn-danger deleteTask" data-id='{{$event->id}}'>Delete</a>
              </div>
            </li>
          @elseif ($event instanceof App\Models\Remind)
            <li class="li-item li-remind" data-type='remind' data-id="{{$event->id}}">
              {{$event->title}}
              <span class="label label-warning pull-right">Remind</span>
              <div class="row">
                <span class="col-md-4">Date : {{ (date("l d F Y", strtotime($event->date()) ) ) }}</span>
              </div>
              <div class="row btn-action-group">
                <a href="#" class="btn btn-xs btn-success btn-align">Edit</a>
                <a href="#" class="btn btn-xs btn-danger deleteRemind" data-id='{{$event->id}}'>Delete</a>
              </div>
            </li>
          @endif
          {{-- <hr> --}}
        @endforeach
      </ul>
    </div>

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

    $('.deleteTask').on('click', function(e) {
      var $token = $('meta[name="csrf-token"]').attr('content');
      var $data_id = $('.deleteTask').attr('data-id');
      // alert('ok');
      $.ajax({
        url: '{{ url('/task') }}'+'/'+ $data_id +'/delete',
        type: "post",
        // data: { _method:"DELETE" },
        data: {
            "_token": $token,
            "_method":"DELETE"
        },
        success: function( msg ) {
          $('[data-type=task][data-id='+$data_id+']').remove();
        },
        error: function( data ) {
          if ( data.status === 422 ) {
            toastr.error('Cannot delete the category');
          }
        }
      });

      return false;
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
