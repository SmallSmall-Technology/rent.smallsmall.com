	<div class="pane">
		<div class="pane-inner">
			<h1>Upcoming Properties</h1>
			<h5>Be the first to sign up to our upcoming properties, Please click on any of the location below to see the units available.</h5>
		</div>
	</div>
	<div class="item-pane">
		<div class="page-inner">
		    <?php if(isset($upcomingProps) && !empty($upcomingProps)){ ?>
		        <?php foreach($upcomingProps as $upcomingProp => $value){ ?>
        			<div class="upcoming-location-item">
        				<div class="up-container">
        					<div class="upcoming-city"><?php echo $value['name']; ?></div>
        					<?php

								$CI =& get_instance();

								$results = $CI->get_upcoming_streets($value['city_id']); 
    						?>
    						<?php foreach($results as $result => $val){ ?>
            					<div class="upcoming-street"><a target="_blank" href="<?php echo $val['airtable_url']; ?>"><?php echo $val['address']; ?></a></div>
        					<?php } ?>
        				</div>
        			</div>
			    <?php } ?>
			<?php }else{ ?>
			           <p><b>No upcoming property yet. Check later.</b></p>
			<?php } ?>
			
		</div>
	</div>
<script src="<?php echo base_url().'assets/js/verification.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>