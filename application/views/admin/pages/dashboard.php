 <div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-car icon-gradient bg-mean-fruit">

						</i>

					</div>

					<div>RentSmallSmall Dashboard

						<!--<div class="page-title-subheading">This is an example dashboard created using build-in elements and components.

						</div>-->

					</div>

				</div>

				<div class="page-title-actions">

					<!--<button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">

						<i class="fa fa-star"></i>

					</button>-->

					<div class="d-inline-block dropdown">

						<!--<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">

							<span class="btn-icon-wrapper pr-2 opacity-7">

								<i class="fa fa-business-time fa-w-20"></i>

							</span>

							Buttons

						</button>-->

						<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">

							<ul class="nav flex-column">

								<li class="nav-item">

									<a href="javascript:void(0);" class="nav-link">

										<i class="nav-link-icon lnr-inbox"></i>

										<span>

											Inbox

										</span>

										<div class="ml-auto badge badge-pill badge-secondary">86</div>

									</a>

								</li>

								<li class="nav-item">

									<a href="javascript:void(0);" class="nav-link">

										<i class="nav-link-icon lnr-book"></i>

										<span>

											Book

										</span>

										<div class="ml-auto badge badge-pill badge-danger">5</div>

									</a>

								</li>

								<li class="nav-item">

									<a href="javascript:void(0);" class="nav-link">

										<i class="nav-link-icon lnr-picture"></i>

										<span>

											Picture

										</span>

									</a>

								</li>

								<li class="nav-item">

									<a disabled href="javascript:void(0);" class="nav-link disabled">

										<i class="nav-link-icon lnr-file-empty"></i>

										<span>

											File Disabled

										</span>

									</a>

								</li>

							</ul>

						</div>

					</div>

				</div>    </div>

		</div>            <div class="row">

			<div class="col-md-6 col-xl-4">

				<div class="card mb-3 widget-content bg-midnight-bloom">

					<div class="widget-content-wrapper text-white">

						<div class="widget-content-left">

							<div class="widget-heading">Total Users</div>

							<div class="widget-subheading">Registered Users</div>

						</div>

						<div class="widget-content-right">

							<div class="widget-numbers text-white"><span><?php echo $user_count; ?></span></div>

						</div>

					</div>

				</div>

			</div>

			<div class="col-md-6 col-xl-4">

				<div class="card mb-3 widget-content bg-arielle-smile">

					<div class="widget-content-wrapper text-white">

						<div class="widget-content-left">

							<div class="widget-heading">All Properties</div>

							<div class="widget-subheading">RentSmallSmall Properties</div>

						</div>

						<div class="widget-content-right">

							<div class="widget-numbers text-white"><span><?php echo $prop_count; ?></span></div>

						</div>

					</div>

				</div>

			</div>

			<div class="col-md-6 col-xl-4">

				<div class="card mb-3 widget-content bg-grow-early">

					<div class="widget-content-wrapper text-white">

						<div class="widget-content-left">

							<div class="widget-heading">All Properties</div>

							<div class="widget-subheading">Buy2Let Properties</div>

						</div>

						<div class="widget-content-right">

							<div class="widget-numbers text-white"><span><?php echo $btl_prop_count; ?></span></div>

						</div>

					</div>

				</div>

			</div>

			<div class="d-xl-none d-lg-block col-md-6 col-xl-4">

				<div class="card mb-3 widget-content bg-premium-dark">

					<div class="widget-content-wrapper text-white">

						<div class="widget-content-left">

							<div class="widget-heading">Products Sold</div>

							<div class="widget-subheading">Revenue streams</div>

						</div>

						<div class="widget-content-right">

							<div class="widget-numbers text-warning"><span>$14M</span></div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="col-md-12">

				<div class="main-card mb-3 card">

					<div class="card-header">Recently Uploaded Apartments

						<div class="btn-actions-pane-right">

							

						</div>

					</div>

					<div class="table-responsive">  

						<table class="align-middle mb-0 table table-borderless table-striped table-hover">

							<thead>

							<tr>

								<th class="text-left">#</th>

								<th>Name</th>


								<th class="text-left">Views</th>

								<th class="text-left">Actions</th>

							</tr>

							</thead>

							<tbody>

							<?php

								if (isset($snippet_properties) && !empty($snippet_properties)) {

									foreach($snippet_properties as $snippet_propertie => $value) {

							?>	



							<tr>

								<td class="text-left text-muted"><?php echo $value['propertyID']; ?></td>

								<td>
									<div class="widget-content p-0">

										<div class="widget-content-wrapper">

											<div class="widget-content-left mr-3">

												<div class="widget-content-left">

													<img width="40" height="40px" class="rounded-circle" src="<?php echo base_url()."/uploads/properties/".$value['imageFolder'].'/'.$value['featuredImg']; ?>" /> 

												</div>

											</div>

											<div class="widget-content-left flex2">

												<div class="widget-heading"><?php echo $value['propertyTitle']; ?></div>

												<div class="widget-subheading opacity-7">

													<?php echo $value['type']; ?>

												</div>

											</div>

										</div>

									</div>

								</td>
								<td class="text-left">
									<div class="badge badge-<?php //echo $statColor; ?>"><?php echo $value['views'] ?></div>

								</td>

								<td class="text-left">

									<button type="button" id="sitter-det-<?php //echo $value['profileID']; ?>" class="btn btn-primary btn-sm sitter-detail">Details</button>

								</td>

							</tr>

							<?php 

									}

							

								}else{

								

									echo "<div style='font-size:14px;font-family:opensans-bold;color:#292929;'>No Sitter Profile in Database yet. </div>";

						

								

								}

						

							?>

							

							</tbody>

						</table>

					</div>

					<div class="d-block text-center card-footer">

						<button class="btn-wide btn btn-success">View All</button>

					</div>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="col-md-6 col-xl-4">

				<div class="card mb-3 widget-content">

					<div class="widget-content-outer">

						<div class="widget-content-wrapper">

							<div class="widget-content-left">

								<div class="widget-heading">Total Products</div>

								<div class="widget-subheading">All Products</div>

							</div>

							<div class="widget-content-right">

								<div class="widget-numbers text-success"><?php //echo $jobCount; ?></div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="col-md-6 col-xl-4">

				<div class="card mb-3 widget-content">

					<div class="widget-content-outer">

						<div class="widget-content-wrapper">

							<div class="widget-content-left">

								<div class="widget-heading">Total Messages</div>

								<div class="widget-subheading">All Messages Exchanged</div>

							</div>

							<div class="widget-content-right">

								<div class="widget-numbers text-warning"><?php //echo $msgCount; ?></div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="col-md-6 col-xl-4">

				<div class="card mb-3 widget-content">

					<div class="widget-content-outer">

						<div class="widget-content-wrapper">

							<div class="widget-content-left">

								<div class="widget-heading">Blog Posts</div>

								<div class="widget-subheading">Total Blog Posts</div>

							</div>

							<div class="widget-content-right">

								<div class="widget-numbers text-danger"><?php //echo $blogCount; ?></div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!--<div class="d-xl-none d-lg-block col-md-6 col-xl-4">

				<div class="card mb-3 widget-content">

					<div class="widget-content-outer">

						<div class="widget-content-wrapper">

							<div class="widget-content-left">

								<div class="widget-heading">Income</div>

								<div class="widget-subheading">Expected totals</div>

							</div>

							<div class="widget-content-right">

								<div class="widget-numbers text-focus">$147</div>

							</div>

						</div>

						<div class="widget-progress-wrapper">

							<div class="progress-bar-sm progress-bar-animated-alt progress">

								<div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>

							</div>

							<div class="progress-sub-label">

								<div class="sub-label-left">Expenses</div>

								<div class="sub-label-right">100%</div>

							</div>

						</div>

					</div>

				</div>

			</div>-->

		</div>

	

		<div class="row">

			<div class="col-md-12">

				<div class="main-card mb-3 card">

					<div class="card-header">Recently Registered Users

						<div class="btn-actions-pane-right">

							<div role="group" class="btn-group-sm btn-group">

							</div>

						</div>

					</div>

					<div class="table-responsive">

						<table class="align-middle mb-0 table table-borderless table-striped table-hover">

							<thead>

							<tr>

								<th class="text-center">#</th>

								<th>Name</th>

								<th class="text-center">City</th>

								<th class="text-center">State</th>

								<th class="text-center">Actions</th>

							</tr>

							</thead>

							<tbody>

							<?php

								//if (isset($parentSnippets) && !empty($parentSnippets)) {

									//foreach($parentSnippets as $parentSnippet => $value) {

							?>	



							<tr>

								<td class="text-center text-muted"><?php //echo $value['parentID']; ?></td>

								<td>

									<?php

										/*if($value['profilePic'] == NULL){

											$pic = 'uploads/default-img.png';

										}else{

											$pic = $value['profilePic'];

										}*/

									?>

									<div class="widget-content p-0">

										<div class="widget-content-wrapper">

											<div class="widget-content-left mr-3">

												<div class="widget-content-left">

													<img width="40" class="rounded-circle" src="<?php //echo base_url(); ?><?php //echo $pic; ?>" />

												</div>

											</div>

											<div class="widget-content-left flex2">

												<div class="widget-heading"><?php //echo $value['firstName'].' '.$value['lastName']; ?></div>

												<div class="widget-subheading opacity-7">

													<?php //echo $value['occupation']; ?>

												</div>

											</div>

										</div>

									</div>

								</td>

								<td class="text-center"><?php //echo $value['city'] ?></td>

								<td class="text-center">

									<?php 

										/*if($value['status'] == 'Active'){

											$statColor = 'success';

										}elseif($value['status'] == 'Pending'){

											$statColor = 'warning';

										}elseif($value['status'] == 'Inactive'){

											$statColor = 'danger';

										}elseif($value['status'] == 'Suspended'){

											$statColor = 'info';

										}*/	

									?>

									<div class="badge badge-<?php //echo $statColor; ?>"><?php //echo $value['status'] ?></div>

								</td>

								<td class="text-center">

									<button type="button" id="parent-det-<?php //echo $value['parentID']; ?>" class="btn btn-primary btn-sm parent-detail">Details</button>

								</td>

							</tr>

							<?php 

									//}

							

								//}else{

								

									//echo "<div style='font-size:14px;font-family:opensans-bold;color:#292929;'>No Parent Profile in Database yet. </div>";

						

								

							//	}

						

							?>

							

							</tbody>

						</table>

					</div>

					<div class="d-block text-center card-footer">						

						<button class="btn-wide btn btn-success">View All</button>

					</div>

				</div>

			</div>

		</div>

	</div>