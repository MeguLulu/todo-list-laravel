@extends('base')
@section('content')
  <h1>Todo List</h1>
  <h2 class="sub-h1">Developped by
    <a href="https://github.com/VenrogMegu">Venrog Megu <i class="fa fa-github" aria-hidden="true"></i></a>
    with <a href="https://laravel.com/">Laravel</a>
  </h2>

  {{-- Todo List Panel --}}
  <div class="col-md-8 col-md-offset-2 block-todo">
    {{-- Header/menu du todo list --}}
    <div class="row menu-todo">
      <a href="#" id="createTask" class="btn btn-info btn-sm"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Create Task</a>
      <a href="#" id="createRemind" class="btn btn-warning btn-sm"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Create Remind</a>
      @if (session()->has('success'))
        <div class="alert alert-success">
          <p>{{session()->get('success')}}</p>
        </div>
      @endif
      @if (session()->has('errors'))
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </div>
      @endif
    </div>
    {{-- Todo Final Edition --}}
    <div class="content-event">
      <ul class="list-event">
        {{-- Creation des <li> en fonction du type de l'événement --}}
        @foreach ($to_do_list as $event)
          {{-- <li> pour les Tâches --}}
          @if ($event instanceof App\Models\Task)
            <li class="li-item li-task" data-type='task' data-id="{{$event->id}}">
              <strong>{{$event->title}}</strong>
              <span class="label label-info pull-right"><i class="fa fa-flag" aria-hidden="true"></i> Task</span>
              <div class="row">
                <span class="col-xs-12"><strong>Date :</strong> {{ (date("l d F Y", strtotime($event->date()) ) ) }}</span>
                <span class="col-xs-6"><strong>Start at :</strong> {{ (date("g a", strtotime($event->date()) ) ) }}</span>
                <span class="col-xs-6"><strong>End the :</strong> {{ (date("d/m/y", strtotime($event->end) ) ) }} at {{ (date("g a", strtotime($event->end) ) ) }} </span>
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
                <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                <a href="#" class="btn btn-xs btn-danger deleteTaskBtnModal" data-id='{{$event->id}}'><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
              </div>
            </li>
            {{-- <li> pour les Rappels --}}
          @elseif ($event instanceof App\Models\Remind)
            <li class="li-item li-remind" data-type='remind' data-id="{{$event->id}}">
              <strong>{{$event->title}}</strong>
              <span class="label label-warning pull-right"><i class="fa fa-exclamation" aria-hidden="true"></i> Remind</span>
              <div class="row">
                <span class="col-md-8"><strong>Date :</strong> {{ (date("l d F Y", strtotime($event->date()) ) ) }}</span>
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
                <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                <a href="#" class="btn btn-xs btn-danger deleteRemindBtnModal" data-id='{{$event->id}}'><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
              </div>
            </li>
          @endif
        @endforeach
      </ul>
    </div>

  </div>
  {{-- Insertion des Modals --}}
  @include('modals.taskModal')
  @include('modals.remindModal')
  @if (isset($event))
    @include('modals.taskEditModal')
    @include('modals.taskDeleteModal')
    @include('modals.remindEditModal')
    @include('modals.remindDeleteModal')
  @endif
@endsection
{{-- Footer --}}
@section('footer')
  <div class="col-sm-offset-1 col-md-offset-2">
  <p class="text-center footer-text">Feel free to ask me anything !</p>
</div>
@endsection
