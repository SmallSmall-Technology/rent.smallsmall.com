	<!-- Modal Starts-->

	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Request</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <!--- For errors ---->

                <div class="form-result" style="width:100%;line-height:30px;"></div>

                <!--- Ends Here --->

                <form id="requestFloat" method="POST" enctype="multipart/form-data"> 
					<table width="100%">
						<tr>
							<td><b>Request By</b></td>
							<td>
								<span class="request-by"></span>
							</td>
						</tr>
						<tr>
							<td><b>Request Date</b></td>
							<td>
								<span class="request-date"></span>
							</td>
						</tr>
						<tr>
							<td><b>Inspection Type</b></td>
							<td>
								<span class="inspection-type"></span>
							</td>
						</tr>
					</table>
					<input type="hidden" class="user_id" value="" />
					<input type="hidden" class="msg_id" value="" />
                   	<div class="position-relative form-group"><label for="request-msg"><b>Message</b></label>
						
						<div style="padding:10px;border-radius:5px;background:#f2f2f2;margin-top:10px;margin-bottom:10px;" name="request-msg" id="request-msg" class="request-msg" style="">
						 
						</div>
    				</div>    				    				

    				<div class="position-relative form-group"><label for="reply" >Reply</label>
						<textarea class="form-control reply-msg"></textarea>
					</div>
   				

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <input type="submit" class="btn btn-primary reply-but" value="Send Reply">

                </div>

            </form>

        </div>

    </div>

</div>

<!--- Modal Ends ---->