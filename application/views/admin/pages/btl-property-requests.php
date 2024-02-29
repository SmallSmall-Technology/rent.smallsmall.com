 <div class="app-main__outer">
 	<div class="app-main__inner">
 		<div class="app-page-title">
 			<div class="page-title-wrapper">
 				<div class="page-title-heading">
 					<div class="page-title-icon">
 						<i class="pe-7s-home icon-gradient bg-mean-fruit">
 						</i>
 					</div>
 					<div>
 						Requests
 					</div>
 				</div>
 			</div>
 		</div>

 		<!-- // Added -->

 		<!-- // -->

 		<div class="row">
 			<div class="col-md-12">

			 <div class="main-card mb-3 card">

<div class="card-header">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="true">Payment completed</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending Payment</a>
		</li>
	</ul>

	<form id="searchForm" action="<?php echo base_url('admin/search-requests'); ?>" method="POST">
		<div class="search-wrapper active">
			<div class="input-holder">
				<input name="search-input" type="text" class="search-input" placeholder="Type to search">
				<button class="search-icon"><span></span></button>
			</div>
			<button class="close"></button>
		</div>
	</form>
</div>

<div class="table-responsive">
	<table class="align-middle mb-0 table table-borderless table-striped table-hover">
		<thead>
			<tr>
				<th class="text-left">&nbsp;</th>
				<th class="text-left">Name</th>
				<!---<th class="text-left">Property</th>--->
				<th class="text-left">Purchase Type</th>
				<th class="text-left">Request Date</th>
				<th class="text-left">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stat = '';
			if (isset($requests) && !empty($requests)) {
				foreach ($requests as $request => $value) {
					$payment_status = $value['status'];
					if (($tab === 'completed' && $payment_status !== "Completed") || ($tab === 'pending' && $payment_status !== "Pending")) {
						continue;
					}
			?>

						<tr id="booking-<?php echo $value['refID']; ?>">
							<td class="text-left"><?php if ($value['status']) { ?>
									<i style="color:green" class="fa fa-lock"></i>
								<?php } else { ?>
									<i style="color:red" class="fa fa-unlock"></i>
								<?php } ?>
							</td>
							<td>
								<div class="widget-content p-0">

									<div class="widget-content-wrapper">

										<div class="widget-content-left mr-3">

											<div class="widget-content-left">
												<div class="widget-heading"><?php echo ucfirst($value['firstName']) . ' ' . ucfirst($value['lastName']); ?></div>
												<div class="widget-subheading"><b>Reference ID:</b><?php echo $value['refID']; ?> </div>
												<div class="widget-subheading"><span style="display:block;font-size:12px;color:#e3e3e3"><?php echo "<a href='https://buy.smallsmall/property/" . $value['propertyID'] . "' />" . $value['property_name'] . "</a>" ?></span></div>
											</div>

										</div>

									</div>

								</div>
							</td>
							<td class="text-left">
								<span class="badge badge-success"><?php echo ucfirst($value['plan']); ?></span>
							</td>
							<td class="text-left"><?php echo date("M d, Y", strtotime($value['request_date'])); ?></td>
							<td class="text-left">
								<div class="action-container">
									<a href="<?php echo base_url() . "admin/request-details/" . $value['refID']; ?>" type="button" class="btn btn-primary btn-sm article-detail">Details</a>

									<button type="button" id="delete-<?php echo $value['refID']; ?>" class="btn btn-primary btn-sm delete-request">Delete</button>
								</div>
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

<!-- Added script to switch base on payment tab -->
<script>
$(document).ready(function() {
	$('#myTab a').on('click', function(e) {
		e.preventDefault();
		$(this).tab('show');
		var tab = $(this).attr('href').substring(1);
		$('#searchForm').attr('action', "<?php echo base_url('admin/search-requests'); ?>?tab=" + tab);
	});
});
</script>


<!-- Added script to switch base on payment tab -->
<script>
$(document).ready(function() {
	$('#myTab a').on('click', function(e) {
		e.preventDefault();
		$(this).tab('show');
		var tab = $(this).attr('href').substring(1);
		$('#searchForm').attr('action', "<?php echo base_url('admin/search-requests'); ?>?tab=" + tab);
	});
});
</script>

 			</div>
 		</div>
 	</div>