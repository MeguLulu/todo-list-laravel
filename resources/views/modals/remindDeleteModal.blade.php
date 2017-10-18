<!-- Remind Delete Modal -->
<div class="modal fade" id="remindDeleteModal" tabindex="-1" role="dialog" aria-labelledby="remindDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="remindDeleteModalLabel">Delete Remind</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this remind ?
      </div>
      <div class="modal-footer">
        <a href='#' class='btn btn btn-danger deleteRemind' data-id='{{$event->id}}'>Delete</a>
      </div>
    </div>
  </div>
</div>
