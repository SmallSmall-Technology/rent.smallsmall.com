<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-home text-success">
						</i>
					</div>
					<div>
						About Us						
					</div>
				</div>
				</div>
		</div> 
		<div class="tab-content">
			<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Page Details</h5>
						<form id="aboutUsForm">
							<div class="form-result"></div>
							<div class="position-relative form-group"><label for="pageTitle" class="">Page Title</label><input name="pageTitle" id="pageTitle" placeholder="Title" type="text" value="<?php echo $content['title']; ?>" class="form-control verify-field"></div>
							
														
							<div class="position-relative form-group"><label for="pageDesc" class="">Page Content</label>
								<textarea name="pageDesc" class="pageDesc" id="txtDefaultHtmlArea" class="form-control verify-field" rows="8"><?php echo $content['content']; ?></textarea>
							</div>
							
							<div class="position-relative form-group"><label for="storyOne" class="">Story One</label>
								<textarea name="text" id="exampleText" class="storyOne form-control verify-field"><?php echo $content['story_1']; ?></textarea>
								<!--<textarea style="width:100%;" name="text" class="storyOne" id="exampleText" class="form-control verify-field" rows="8"></textarea>-->
							</div>
							
							<div class="position-relative form-group"><label for="storyTwo" class="">Story Two</label>
								
								<textarea name="text" id="exampleText" class="storyTwo form-control verify-field"><?php echo $content['story_2']; ?></textarea>
							</div>
							
							<input type="hidden" class="id" value="<?php echo $content['id'] ?>" />
				
							<button type="submit" id="newPropBut" class="mt-2 btn btn-primary">Post Page</button>
						</form>
						</div>
				</div>
					</div>
				</div>
			</div>

		</div>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>assets/js/drag-drop-buytolet-image.js"></script>
<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>