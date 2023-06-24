	<div class="top-banner">
		<img src="<?php echo base_url(); ?>assets/images/top-banner-furnisure.jpg" />
		<div class="banner-form">

			<div class="banner-slogan">Dont break the bank to own an appliance or furniture.</div>

			<div class="banner-slogan-small">Pay for your home appliances & furniture in affordable installments.</div>

			

		</div>

	</div>

	<!--<div class="pane">

		<div class="pane-inner">

			<h1>Rent Small Small piece of mind</h1>

			<h5>Lorem ipsumdolor sit amet, consectetur adipiscing elit, sec do</h5>

		</div>

	</div>-->

	<div class="item-pane">

		<div class="item-pane-inner">

			<ul class="category-container">

				<li class="category-item">

					<div class="container">

						<div class="cat-img"><img src="<?php echo base_url(); ?>assets/images/furnisure-assets/bedroom.jpg" /></div>

						<div class="cat-title">Bedroom</div>

					</div>

				</li>

				<li class="category-item">

					<div class="container">

						<div class="cat-img"><img src="<?php echo base_url(); ?>assets/images/furnisure-assets/sofa.jpg" /></div>

						<div class="cat-title">Sofa</div>

					</div>

				</li>

				<li class="category-item">

					<div class="container">

						<div class="cat-img"><img src="<?php echo base_url(); ?>assets/images/furnisure-assets/coffee-table.jpg" /></div>

						<div class="cat-title">Coffee table</div>

					</div>

				</li>

				<li class="category-item">

					<div class="container">

						<div class="cat-img"><img src="<?php echo base_url(); ?>assets/images/furnisure-assets/bunk-bed.jpg" /></div>

						<div class="cat-title">Kids Bed</div>

					</div>

				</li>

				<li class="category-item">

					<div class="container">

						<div class="cat-img"><img src="<?php echo base_url(); ?>assets/images/furnisure-assets/television.jpg" /></div>

						<div class="cat-title">TV</div>

					</div>

				</li>

				<li class="category-item">

					<div class="container">

						<div class="cat-img"><img src="<?php echo base_url(); ?>assets/images/furnisure-assets/fridge.png" /></div>

						<div class="cat-title">Fridge</div>

					</div>

				</li>

			</ul>

		</div>

	</div>

	<div class="pane">

		<div class="pane-inner">

			<h1>Shop by category</h1>

			<div class="home-options">

				<div class="mobile-opener"><span>Select Option</span><i class="fa fa-angle-down"></i></div>

				<ul class="options">

					<?php 

						$typeIds = [];

						if(isset($types) && !empty($types)){

							

							foreach($types as $type => $thetype){

					?>

								

								<li class="option-item" id="<?php echo $thetype['id']; ?>"><?php echo $thetype['type']; ?></li>

								<?php array_push($typeIds, $thetype['id']); ?>

						<?php } ?>

					<?php } ?>

					<?php //print_r($typeIds); ?>

				</ul>

				<!--<div class="all-prop-but"><a href="">see all properties</a></div>-->

			</div>

		</div>

	</div>

	<div class="item-pane">

		<div class="item-pane-inner">

			<?php $showable = "show"; ?>

			<?php for($i = 0; $i < count($typeIds); $i++){

	

					if($i > 0){

						$showable = "hide";

					}

								

					echo '<ul class="prop-holder '.$showable.'" id="furnisure-'.$typeIds[$i].'">';

					$CI =& get_instance();

					$furnitures = $CI->get_furniture_by_type($typeIds[$i]);

					foreach($furnitures as $furniture => $key){

						echo '<li><a style="text-decoration:none" href="'.base_url().'furnisure/item/'.$key['applianceID'].'">

							<div class="prop-container">

								<div class="prop-img"><img src="'.base_url().'uploads/furnisure/'.$key['folderName'].'/'.$key['featuredImg'].'" /></div>					

								<div class="prop-info">

									<div class="prop-title">'.$key['applianceName'].'</div>

									<div class="prop-price">
                                        <div class="f-price">
										    As low as <span style="font-family:helvetica;">&#x20A6;</span><SPAN>'.number_format($key['cost'] * 0.4).'</SPAN> per Month
										</div>

									</div>

								</div>

							</div>

						</a></li>';

						

					}

					echo '</ul>';

					 

			?>		

			<?php } ?>

			

		</div>

	</div>

	<div class="pane" style="background:#00CDA6">

		<div class="pane-inner">

			<div class="small-title">What is rent to own?</div>

			<div class="note">
			    <p>Furnisure by Rentsmallsmall is a Rent-to-Own service where you can rent furniture and appliances, and pay a very subsidized fee for 12months or less after which they become yours.</p> 
			    <p>With furnisure, your home will never be left unfurnished; get access to a variety of household items just at your fingertips. Furnisure means furnishing with ease.</p>

                <p>Pay monthly with no hidden fees and walk away with your items and no more to pay! </p>
			    
			</div>

		</div>

	</div>

	<div class="f-benefits-pane">

		<div class="pane">

			<div class="pane-inner">

				<h1>Benefits of shopping with Furnisure</h1>

			</div>

		</div>

		<div class="item-pane-inner">

			<ul class="benefits-container">

				<li class="benefits-item">

					<table class="benefit-table" width="100%" cellpadding="10">

						<tr>

							<td valign="top">

								<div class="benefits-icn hidden-fees">



								</div>

							</td>

							<td>

								<div class="benefits-title">No hidden fees</div>

								<div class="benefits-note">

									No unpleasant surprises here. We hate hidden charges just as much as the next person! No other extra charges and costs that is why we continuously strive to offer the most competitive prices. 

								</div>

							</td>

						</tr>

					</table>

				</li>

				<li class="benefits-item">

					<table width="100%" cellpadding="10">

						<tr>

							<td valign="top">

								<div class="benefits-icn new-items">



								</div>

							</td>

							<td>

								<div class="benefits-title">All new items</div>

								<div class="benefits-note">									

									Furnisure is committed to providing you with quality products. All our furniture and appliances are new.
									
								</div>

							</td>

						</tr>

					</table>

				</li>

				<li class="benefits-item">

					<table width="100%" cellpadding="10">						

						<tr>

							<td valign="top">

								<div class="benefits-icn pay-conveniently">



								</div>

							</td>

							<td>

								<div class="benefits-title">Pay conveniently</div>

								<div class="benefits-note">

									Convenience is the name of the game for us. Right from the products you pick to the monthly plan you choose, every part of the subscription is flexible and convenient enough to suit your need. 

								</div>

							</td>

						</tr>

					</table>

				</li>

				<li class="benefits-item">

					<table width="100%" cellpadding="10">

						<tr>

							<td valign="top">

								<div class="benefits-icn quick-delivery">



								</div>

							</td>

							<td>

								<div class="benefits-title">Quick delivery</div>

								<div class="benefits-note">

									Place your order and leave the delivery to us! We ensure that the products reach your doorstep safe and sound. 

								</div>

							</td>

						</tr>

					</table>

				</li>

			</ul>

		</div>

	</div>	

	

	<div class="pane" style="background:#00CDA6">

		<div class="pane-inner">
		    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
			<style type="text/css">
				#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
				/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
				   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
			</style>
			<form action="https://bestmangames.us19.list-manage.com/subscribe/post?u=89f70ead6695a6003a177a737&amp;id=bdc944be07" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

			<table width="100%">
			    <tr>
			        <td valign="top" width="20%">
			            <span class="mc-spc"><i class="fa fa-envelope"></i></span>
			            
			            <span class="mc-spc">Get the latest deals and more</span>
			            
			        </td>
			        <td valign="top" width="65%"><input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL"></td>
			        <td valign="top" width="15%"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe-but" class="button"></td>
			    </tr>
			</table>
                <div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_89f70ead6695a6003a177a737_bdc944be07" tabindex="-1" value=""></div>
				
			</form>
			<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
		</div>

	</div>
	<!---<div class="pane" style="background:#00CDA6">

		<div class="pane-inner">

			<h1>Want to learn more about<br />Rent to own?</h1>

			<span class="pane-link"><a href="">Learn more <i class="fa fa-arrow-right"></i></a></span>

		</div>

	</div>--->

<script src="<?php base_url(); ?>assets/js/furnisure_type_toggle.js"></script>