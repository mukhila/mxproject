<input type="hidden" name="selectedid" id="selectedid" value="0">

<div class="row">
<div class="modal fade modal-dialog-centered statusModal animated slideInUp custo-slideInUp" tabindex="-1" role="dialog" aria-labelledby="myStatusModalLabel" aria-hidden="true" style="display:none">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
           
        <h4 class="modal-title">Are you sure?</h4>
		<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>   
      </div>
      <div class="modal-body">
        <p>Do you really want to change the status? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light-dark" data-bs-dismiss="modal" id="cancelstatus">No</button>
        <button type="button" class="btn btn-success" id="confirmstatus">Yes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-dialog-centered" id ="delModal"  role="dialog" aria-hidden="true" tabindex="-1" style="display:none">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
         
        <h4 class="modal-title">Are you sure?</h4>
		 <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>    
      </div>
      <div class="modal-body">
        <p>Do you really want to delete these record? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal" id="canceldelete">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmdelete">Delete</button>
      </div>
    </div>
  </div>
</div>
</div>