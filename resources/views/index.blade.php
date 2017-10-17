@extends('base')
@section('content')
  <h1>Todo List</h1>
  <h2 class="sub-h1">developped by
    <a href="https://github.com/VenrogMegu">Venrog Megu <i class="fa fa-github" aria-hidden="true"></i></a>
     with <a href="https://laravel.com/">Laravel</a>
  </h2>
  {{-- Todo List Panel --}}
  <div class="col-md-8 col-md-offset-2 block-todo">
    <a href="#" id="createTask">Create Task</a>
    <a href="#" id="createRemind">Create Remind</a>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4>Ma liste todo</h4>
      </div>
      <div class="panel-body">
        Mon contenu
      </div>
      <div class="panel-footer">
        Mon footer
      </div>
    </div>
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
        // alert('ok');
    });
    $('#createRemind').click(function() {
        $('#remindModal').modal();
        // alert('ok');
    });

    // Js pour afficher le dateTime Picker
    $(".form_datetime").datetimepicker({
      autoclose: true,
      todayBtn: true,
      minuteStep: 10
    });

    $(document).on('submit', '#formRegister', function(e) {
        e.preventDefault();

        $('input+small').text('');
        $('input').parent().removeClass('has-error');

        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json"
        })
        .done(function(data) {
            $('.alert-success').removeClass('hidden');
            $('#myModal').modal('hide');
        })
        .fail(function(data) {
            $.each(data.responseJSON, function (key, value) {
                var input = '#formRegister input[name=' + key + ']';
                $(input + '+small').text(value);
                $(input).parent().addClass('has-error');
            });
        });
    });
})
</script>
@endsection
