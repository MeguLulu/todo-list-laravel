@extends('base')

@section('content')
<div class="row">
  {{-- {!! Form::model($task, ['route' => ['task.update', $task->id], 'method' => 'PUT']) !!}
    <div class="col-md-8">
      {{ Form::label('Title', 'text:') }}
      {{ Form::text('text', null, ["class" => 'form-control'])}}
      {{ Form::label('Body', 'Body text:') }}
      {{ Form::textarea('body', null, ["class" => 'form-control'])}}

    </div>

{{ Form::submit('Save'), ['class' => 'btn btn-success btn-block'] }}
{!! Html::linkRoute('index', 'Cancel', null, array('class' => 'btn btn-danger btn-block')) !!}
  {!! Form::close() !!} --}}

  {!! Form::model($task, ['route' => ['task.update', $task->id], 'method' => 'PUT']) !!}
    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Enter your title'))}}
    {{-- Champ date de début --}}
      {{ Form::label('begin', 'Start:') }}
        <div class="input-append date form_datetime input-group date-form col-md-5" data-date="">
          {{ Form::text('begin', null, array('class' => 'form-control ', 'placeholder' => 'Select a date please')) }}
          <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
          <span class="add-on input-group-addon"><i class="fa fa-times"></i></span>
        </div>
        {{-- Champ date de fin --}}
        {{ Form::label('end', 'End:') }}
        <div class="input-append date form_datetime input-group date-form col-md-5" data-date="">
          {{ Form::text('end', null, array('class' => 'form-control ', 'placeholder' => 'Select a date please')) }}
          <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
          <span class="add-on input-group-addon"><i class="fa fa-times"></i></span>
        </div>
    {{ Form::submit('Update task', array('class' => 'btn btn-primary btn-form')) }}

  {!! Form::close() !!}
</div>
@endsection
@section('javascript')
  <script>

  $(function(){
    // Js pour afficher le dateTime Picker
    $(".form_datetime").datetimepicker({
      autoclose: true,
      todayBtn: true,
      minuteStep: 10
    });
  })
  </script>
@endsection
