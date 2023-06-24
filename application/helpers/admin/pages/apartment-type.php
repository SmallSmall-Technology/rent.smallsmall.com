 <div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-home icon-gradient bg-mean-fruit">

						</i>

					</div>

					<div>Apartment Type

						<!--<div class="page-title-subheading">This is an example dashboard created using build-in elements and components.

						</div>-->

					</div>

				</div>

			</div>

		</div>            

		

		<div class="row">

			<div class="col-md-12">

				<div class="main-card mb-3 card">

					<div class="card-header">All Types

						<div class="btn-actions-pane-right">

							<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">

                            <li class="nav-item">

                                <a role="tab" class="nav-link active" data-toggle="modal" data-target="#exampleModalLong">

                                    <span>Add Type <i style="font-size:14px;marginleft:5px;" class="fa fa-plus"></i></span>

                                </a>

                            </li> 	

                        </ul>

						</div>

					</div>

					<div class="table-responsive">

						<table class="align-middle mb-0 table table-borderless table-striped table-hover">

							<thead>

							<tr>

								<th class="text-left">Type</th>

								<th class="text-left">Slug</th>

								<th class="text-left">Actions</th>

							</tr>

							</thead>

							<tbody>

							<?php

								if (isset($types) && !empty($types)) {

									foreach($types as $type => $value) {

							?>	



							<tr>

						

								<td class="text-left"><?php echo $value['type'] ?></td>

								<td class="text-left"><?php echo $value['slug'] ?></td>

								<td class="text-left">

									<button type="button" id="delete-<?php echo $value['id']; ?>" class="btn btn-primary btn-sm delete-type">Delete</button>
									
									<!--<button type="button" id="edit-<?php //echo $value['id']; ?>" class="btn btn-primary btn-sm edit-type">Edit</button>-->

								</td>

							</tr>

							<?php 

									}

								}

						

							?>

							

							</tbody>

						</table>

					</div>

					<div class="d-block text-center card-footer">

						<div class="paginated"><?php echo $this->pagination->create_links(); ?></div>

					</div>

				</div>

			</div>

		</div>

	</div>