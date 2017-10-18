@extends('base')
@section('content')
  <h1>Todo List</h1>
  <h2 class="sub-h1">Developped by
    <a href="https://github.com/VenrogMegu">Venrog Megu <i class="fa fa-github" aria-hidden="true"></i></a>
    with <a href="https://laravel.com/">Laravel</a>
  </h2>

  {{-- Todo List Panel --}}
  <div class="col-md-8 col-md-offset-2 block-todo">
    <div class="row menu-todo">

      <a href="#" id="createTask" class="btn btn-info btn-sm">Create Task</a>
      <a href="#" id="createRemind" class="btn btn-warning btn-sm">Create Remind</a>
      @if (session()->has('success'))
        <div class="alert alert-success">
          <p>{{session()->get('success')}}</p>
        </div>
      @endif
    </div>
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
                <a href="#"
                data-id="{{$event->id}}"
                data-title="{{$event->title}}"
                data-begin="{{$event->begin}}"
                data-end="{{$event->end}}"
                data-toggle="modal"
                data-target="taskEditModal"
                class="editTask btn btn-xs btn-success btn-align"
                title="Edit">
                Edit</a>
                <a href="#" class="btn btn-xs btn-danger deleteTask" data-toggle="modal" data-target="#taskDeleteModal" data-id='{{$event->id}}'>Delete</a>
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
                <a href="#"
                data-id="{{$event->id}}"
                data-title="{{$event->title}}"
                data-day="{{$event->day}}"
                data-toggle="modal"
                data-target="remindEditModal"
                class="editRemind btn btn-xs btn-success btn-align"
                title="Edit">
                Edit</a>
                <a href="#" class="btn btn-xs btn-danger deleteRemind" data-id='{{$event->id}}'>Delete</a>
              </div>
            </li>
          @endif
          {{-- <hr> --}}
        @endforeach
      </ul>
    </div>

  </div>
  {{-- Modals --}}
  @include('modals.taskModal')
  @include('modals.remindModal')
  @if (isset($event))
    @include('modals.taskEditModal')
    @include('modals.taskDeleteModal')
    @include('modals.remindEditModal')
  @endif
@endsection
@section('javascript')
@endsection
