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
        <form id="searchForm" action="<?php echo base_url('admin/lead-source'); ?>" method="POST">
            <div class="input-group mb-3">
                <input name="searchDate" type="date" class="form-control" placeholder="Search by date">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
        <!-- Button group for actions -->
        <div class="btn-actions-pane-right">
            <select class="form-control action" id="action">
                <option value="">Select Option</option>
                <option value="delete">Delete</option>
                <option value="deactivate">Deactivate</option>
                <option value="activate">Activate</option>
                <option value="verify">Verify</option>
            </select>
            <button type="button" id="" class="btn btn-primary btn-sm process-action">Submit</button>
        </div>
    </div>
    <div class="table-responsive">
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
    </div>
    <div class="d-block text-center card-footer">
        <div class="paginated"><?php echo $this->pagination->create_links(); ?></div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#searchForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    $('.table-responsive').html(response);
                }
            });
        });
    });
</script>



 			</div>

 		</div>

 	</div>