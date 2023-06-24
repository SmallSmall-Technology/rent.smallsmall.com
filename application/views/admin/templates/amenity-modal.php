	<!-- Modal Starts-->
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Amenity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--- For errors ---->
                <div class="form-result" style="width:100%;line-height:30px;"></div>
                <!--- Ends Here --->
                <form id="amenityFloat" method="POST" enctype="multipart/form-data">
                   	<div class="position-relative form-group"><label for="productName">Title</label>
    					<input name="title" id="title" type="text" class="form-control float-txt">
    				</div>
    				    				
    				<div class="position-relative form-group"><label for="amenityType" class="">Type</label><select name="select" id="amenityType" class="float-txt form-control">
						<option value="countable">Countable</option>
						<option value="toggleable">Toggleable</option>
					</select></div>
    				
    				
    				<div class="position-relative form-group image-bar"><label for="userfile" class="">Upload Image</label>
    					<input name="userfile" id="userfile" type="file" class="form-control-file">
    				</div>
    				
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary amenity-but" value="Upload Amenity">
                </div>
            </form>
        </div>
    </div>
</div>
<!--- Modal Ends ---->