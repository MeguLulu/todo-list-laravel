<!-- Modal Create-->
<div class="modal fade" id="remindModal" tabindex="-1" role="dialog" aria-labelledby="remindModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Create new remind</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(array('route' => 'remind.store', 'class' => 'form-group row')) !!}
                  {{ Form::label('title', 'Title:') }}
                  {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Enter your title'))}}
                  {{ Form::label('day', 'Date:') }}
                  {{ Form::date('day', \Carbon\Carbon::now()) }}
                  {{ Form::submit('Create new remind', array('class' => 'btn btn-primary btn-form')) }}

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
