<!-- Task Delete Modal -->
<div class="modal fade" id="taskDeleteModal" tabindex="-1" role="dialog" aria-labelledby="taskDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="taskDeleteModalLabel">Delete Task</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this task ?
      </div>
      <div class="modal-footer">
        <a href='#' class='btn btn btn-danger deleteTask' data-id='{{$event->id}}'>Delete</a>
      </div>
    </div>
  </div>
</div>
