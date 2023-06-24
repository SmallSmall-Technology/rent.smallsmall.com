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
						<form id="aboutUsFormBuytolet">
							<div class="form-result"></div>
							
							<div class="position-relative form-group"><label for="storyOne" class="">Who we are</label>
								<textarea rows="10" name="text" id="exampleText" class="storyOne form-control verify-field"><?php echo $content['what_we_do']; ?></textarea>
								<!--<textarea style="width:100%;" name="text" class="storyOne" id="exampleText" class="form-control verify-field" rows="8"></textarea>-->
							</div>
							
							<div class="position-relative form-group"><label for="storyTwo" class="">Our Story</label>
								
								<textarea rows="10" name="text" id="exampleText" class="storyTwo form-control verify-field"><?php echo $content['our_story']; ?></textarea>
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