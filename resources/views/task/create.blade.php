@extends('base')

@section('content')
  <div class="col-sm-8 col-sm-offset-2 col-xs-offset-1 col-xs-10" >
    <h1>Create new task</h1>
    <hr>
    {!! Form::open(array('route' => 'task.store', 'class' => 'form-group row')) !!}
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
      {{ Form::submit('Create new task', array('class' => 'btn btn-primary btn-form')) }}

    {!! Form::close() !!}
  </div>
@endsection
@section('javascript')
  <script type="text/javascript">


  $(function() {
    $(".form_datetime").datetimepicker({
      //  format: "dd MM yyyy - hh:ii",
      autoclose: true,
      todayBtn: true,
      minuteStep: 10
    });
  });
  </script>

@endsection
