@extends('base')

@section('content')
  <div class="col-sm-8 col-sm-offset-2 col-xs-offset-1 col-xs-10" >
    <h1>Create new remind</h1>
    <hr>
    {!! Form::open(array('route' => 'remind.store', 'class' => 'form-group row')) !!}
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Enter your title'))}}
      {{ Form::label('day', 'Date:') }}
      {{ Form::date('day', \Carbon\Carbon::now()) }}
      {{ Form::submit('Create new remind', array('class' => 'btn btn-primary btn-form')) }}

    {!! Form::close() !!}
  </div>
@endsection
