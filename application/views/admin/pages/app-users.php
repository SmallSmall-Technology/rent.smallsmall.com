 <div class="app-main__outer">

 	<div class="app-main__inner">

 		<div class="app-page-title">

 			<div class="page-title-wrapper">

 				<div class="page-title-heading">

 					<div class="page-title-icon">

 						<i class="pe-7s-users icon-gradient bg-mean-fruit">

 						</i>

 					</div>

 					<div>
 						Lead Source
 					</div>

 				</div>

 			</div>

 		</div>


 		<div class="row">

 			<div class="col-md-12">

			 <div class="main-card mb-3 card">

<div class="card-header">All Source - <?php echo count($referrals) . " of " . $total_count; ?>
	<form action="<?php echo base_url('admin/search-users'); ?>" method="POST">
		<div class="input-group mb-3">
			<input name="searchDate" type="date" class="form-control" placeholder="Search by date">
			<div class="input-group-append">
				<button class="btn btn-outline-secondary" type="submit">Search</button>
			</div>
		</div>
	</form>

	<div class="btn-actions-pane-right">
		<table>
			<tr>
				<td width="200px">
					<select class="form-control action" id="action">
						<option value="">Select Option</option>
						<option value="delete">Delete</option>
						<option value="deactivate">Deactivate</option>
						<option value="activate">Activate</option>
						<option value="verify">Verify</option>
					</select>
				</td>
				<td>
					<button type="button" id="" class="btn btn-primary btn-sm process-action">Submit</button>
				</td>
			</tr>
		</table>

	</div>

</div>

<div class="table-responsive">

	<!-- new -->
	<table class="align-middle mb-0 table table-borderless table-striped table-hover">
		<thead>
			<tr>
				<th class="text-left">Year</th>
				<th class="text-left">Week Number</th>
				<th class="text-left">Week Date</th>
				<th class="text-left">Referral</th>
				<th class="text-left">Referral Count</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($referrals as $referral) : ?>
				<tr>
					<td class="text-left"><?php echo $referral['year']; ?></td>
					<td class="text-left"><?php echo $referral['week_number']; ?></td>
					<td class="text-left"><?php echo $referral['week_dates']; ?></td>
					<td class="text-left"><?php echo $referral['referral']; ?></td>
					<td class="text-left"><?php echo $referral['referral_count']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>

	</table>

	<!-- end new -->

</div>

<div class="d-block text-center card-footer">

	<div class="paginated"><?php echo $this->pagination->create_links(); ?></div>

</div>

</div>


 			</div>

 		</div>

 	</div>