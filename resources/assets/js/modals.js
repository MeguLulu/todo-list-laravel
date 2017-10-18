// Js pour afficher les modals
$('#createTask').click(function() {
  $('#taskModal').modal();
});

$('#createRemind').click(function() {
  $('#remindModal').modal();
});

$('.deleteTaskBtnModal').click(function() {
  var data_id = $(this).attr('data-id');
  console.log(data_id);
  $('#taskDeleteModal').modal();
  $('.deleteTask').unbind('click');
  $('.deleteTask').click(function(e) {
    var token = $('meta[name="csrf-token"]').attr('content');
    var data_id = $('.deleteTaskBtnModal').attr('data-id');
    $.ajax({
      url: '/task/'+ data_id +'/delete',
      type: "post",
      data: {
        "_token": token,
        "_method":"DELETE"
      },
      success: function( msg ) {
        $("[data-type='task'][data-id="+data_id+"]").remove();
        $('.menu-todo').append('<div class="alert alert-success"><p>Your task has been deleted with success.</p></div>');
        $('#taskDeleteModal').modal('toggle');
      },
      error: function( data ) {
        $('.menu-todo').append('<div class="alert alert-danger"><p>Cannot delete your task. (error)</p></div>');
      }
    });
  });

  return false;
});

$('.editTask').click(function() {
  $('#taskEditModal').modal();
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
  $('#remindEditModal').modal();
  var $id = $(this).attr('data-id');
  var $title = $(this).attr('data-title');
  var $date = $(this).attr('data-date');
  $('.modal-form').attr('action', '/remind/'+$id+'/update');
  $('input[name=title]').attr('value', $title);
  $('input[name=date]').attr('value', $date);
});
