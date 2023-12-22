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

						<div class="card-body">
							<h5 class="card-title">New Notification</h5>
							<div class="form-report"></div>
							<form id="notificationForm" enctype="multipart/form-data">

								<div class="position-relative form-group"><label for="notificationTitle" class="col-form-label">Notification</label>

									<input name="notificationTitle" id="notificationTitle" placeholder="Title" type="subject" class="form-control verify-txt">
								</div>

								<div class="position-relative form-group"><label for="notificationTitle" class="col-form-label">Notification Link</label>

									<input name="notificationTitle" id="notificationLink" placeholder="https://www.link.com" type="subject" class="form-control verify-txt">
								</div>

								<!-- Select Dropdown for Site -->
								<div class="position-relative form-group">

									<label for="selectSite" class="col-form-label">Select Site</label>
									<select name="selectSite" id="selectSite" class="form-control">
										<option value="RSS">RSS</option>
										<option value="BSS">BSS</option>
										<option value="All">All</option>
									</select>

								</div>

								<div class="position-relative form-group">
									<label for="startFrom" class="">Start From</label>
									<div class="position-relative input-group">

										<input name="startFrom" id="startFrom" type="date" class="form-control">
										<div class="input-group-prepend">
											<span class="input-group-text">YYYY-MM-DD</span>
										</div>

									</div>
								</div>

								<div class="position-relative form-group">
									<label for="ends" class="">Ends</label>
									<div class="position-relative input-group">

										<input name="ends" id="ends" type="date" class="form-control">
										<div class="input-group-prepend">
											<span class="input-group-text">YYYY-MM-DD</span>
										</div>

									</div>
								</div>

								<div class="position-relative form-group">

									<div class="position-relative input-group">

										<button class="submit-but btn btn-primary">Submit</button>

									</div>

								</div>



							</form>

						</div>

					</div>

				</div>

			</div>

		</div>