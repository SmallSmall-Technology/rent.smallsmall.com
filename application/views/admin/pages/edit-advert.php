<div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-chat text-success">

						</i>

					</div>

					<div>

						Notification						

					</div>

				</div>

				</div>

		</div> 

		<div class="tab-content">			

			<div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">

				<div class="main-card mb-3 card">

					<div class="card-body"><h5 class="card-title">Edit Advert</h5>
					<div class="form-report"></div>
					
                    <?php echo form_open_multipart('admin/edit_adverts');?>

						<div class="position-relative form-group"><label for="notificationTitle" class="col-form-label">Advert</label>

							<input name="title" id="notificationTitle" placeholder="Title" type="subject" value="<?php echo $notification['title']; ?>" class="form-control verify-txt">
						</div>

                        <input type="hidden" name = "adv_id" value = "<?php echo $notification['id'] ?>">
						
						<div class="position-relative form-group"><label for="notificationTitle" class="col-form-label">Notification Link</label>

							<input name="link" id="notificationLink" placeholder="https://www.link.com" type="subject" value="<?php echo $notification['link']; ?>" class="form-control verify-txt">
						</div>

                        <div class="position-relative  form-group">
                            <label for="debt-note" class="">Upload Image</label>
                            <input type="file" name="imgName[]" multiple required/>
                        </div>

						<div class="position-relative form-group">
							<label for="startFrom" class="">Date</label>
							<div class="position-relative input-group">
								
								<input name="date" id="startFrom" type="date" value="<?php echo $notification['date']; ?>" class="form-control">
								<div class="input-group-prepend">
									<span class="input-group-text">YYYY-MM-DD</span>
								</div>

							</div>
						</div>
						
						<div class="position-relative form-group">

							<div class="position-relative input-group">

								<button class="submit-but btn btn-primary">Save</button>

							</div>

						</div>

					</form>

					</div>

				</div>

			</div>

		</div>

	</div>