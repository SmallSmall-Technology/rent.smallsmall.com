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

					<div class="card-body"><h5 class="card-title">Edit Notification</h5>
					<div class="form-report"></div>
					<form id="editNotificationForm" enctype="multipart/form-data">

						<div class="position-relative form-group"><label for="notificationTitle" class="col-form-label">Notification</label>

							<input name="notificationTitle" id="notificationTitle" placeholder="Title" type="subject" value="<?php echo $notification['message']; ?>" class="form-control verify-txt">
						</div>
						
						<div class="position-relative form-group"><label for="notificationTitle" class="col-form-label">Notification Link</label>

							<input name="notificationTitle" id="notificationLink" placeholder="https://www.link.com" type="subject" value="<?php echo $notification['notification_link']; ?>" class="form-control verify-txt">
						</div>

						<div class="position-relative form-group">
							<label for="startFrom" class="">Start From</label>
							<div class="position-relative input-group">
								
								<input name="startFrom" id="startFrom" type="date" value="<?php echo $notification['start_date']; ?>" class="form-control">
								<div class="input-group-prepend">
									<span class="input-group-text">YYYY-MM-DD</span>
								</div>

							</div>
						</div>
						
						<div class="position-relative form-group">
							<label for="ends" class="">Ends</label>
							<div class="position-relative input-group">
								
								<input name="ends" value="<?php echo $notification['end_date']; ?>" id="ends" type="date" class="form-control">
								<div class="input-group-prepend">
									<span class="input-group-text">YYYY-MM-DD</span>
								</div>
                                <input type="hidden" id="notification-id" value="<?php echo $notification['id']; ?>" />
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