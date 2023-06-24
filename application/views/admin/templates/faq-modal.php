    	<!-- Modal Starts-->
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">FAQ Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--- For errors ---->
                <div class="form-result" style="width:100%;line-height:30px;"></div>
                <!--- Ends Here --->
                <form id="faqForm" method="POST" >
                   	<div class="position-relative form-group"><label for="distance">Question</label>
    					<input name="question" id="question" type="text" class="form-control float-txt txt-f">
    				</div>
    				<div class="position-relative form-group"><label for="distance">Answer</label>
    					<textarea name="answer" id="answer" class="form-control float-txt txt-f"></textarea>
    				</div>
    				<div class="position-relative form-group"><label for="distance">Order</label>
    					<input name="faq-order" id="faq-order" type="text" class="form-control txt-f">
    				</div>
    				<input type="hidden" class="faq-id txt-f" id="faq-id" value="" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary faq-but" value="Upload Entry">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--- Modal Ends ---->