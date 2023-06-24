<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-config text-success">
						</i>
					</div>
					<div>
						How it works						
					</div>
				</div>
				</div>
		</div> 
		<div class="tab-content">
			<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Page Details</h5>
						<form id="hiwFormBtl">
							<div class="form-result"></div>
							
							<div class="position-relative form-group"><label for="search" class="">Search</label>
								<textarea rows="10" name="text" id="exampleText" class="search form-control verify-field"><?php echo $content['search']; ?></textarea>
								<!--<textarea style="width:100%;" name="text" class="storyOne" id="exampleText" class="form-control verify-field" rows="8"></textarea>-->
							</div>
							
							<div class="position-relative form-group"><label for="storyOne" class="">Analyze</label>
								<textarea rows="10" name="text" id="exampleText" class="analyze form-control verify-field"><?php echo $content['analyze_']; ?></textarea>
								<!--<textarea style="width:100%;" name="text" class="storyOne" id="exampleText" class="form-control verify-field" rows="8"></textarea>-->
							</div>
							
							<div class="position-relative form-group"><label for="qualify" class="">Quality</label>
								<textarea rows="10" name="text" id="exampleText" class="qualify form-control verify-field"><?php echo $content['qualify']; ?></textarea>
								<!--<textarea style="width:100%;" name="text" class="storyOne" id="exampleText" class="form-control verify-field" rows="8"></textarea>-->
							</div>
							
							<div class="position-relative form-group"><label for="checkout" class="">Checkout</label>
								
								<textarea rows="10" name="text" id="exampleText" class="checkout form-control verify-field"><?php echo $content['checkout']; ?></textarea>
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