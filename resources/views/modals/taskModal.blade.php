<!-- Modal Create-->
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Create new task</h4>
            </div>
            <div class="modal-body">

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
        </div>
    </div>
</div>
