	<!-- Modal Starts-->
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Distance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--- For errors ---->
                <div class="form-result" style="width:100%;line-height:30px;"></div>
                <!--- Ends Here --->
                <form id="nDFloat" method="POST" >
                   	<div class="position-relative form-group"><label for="distance">Distance</label>
    					<input name="distance" id="distance" type="text" class="form-control float-txt">
    				</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary amenity-but" value="Upload Distance">
                </div>
            </form>
        </div>
    </div>
</div>
<!--- Modal Ends ---->