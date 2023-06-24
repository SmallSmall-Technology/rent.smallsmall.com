		<div class="item-pane">
		<div class="page-inner">
			<div class="mainbar">
				<div class="reportage" id="reportage">
				 	<span><i class="fa fa-check"></i></span> Successfully added to cart
				</div>
				<div class="main-img">
					<img src="<?php echo base_url().'uploads/furnisure/'.$furniture['folderName'].'/'.$furniture['featuredImg']; ?>" />
				</div>
				<div class="thumbs">
					<?php
						$dir = './uploads/furnisure/'.$furniture['folderName'].'/';
						if (file_exists($dir) == false) {
							echo 'Directory \'', $dir, '\' not found!';
						} else {
							$dir_contents = scandir($dir);
							
							foreach ($dir_contents as $file) {
								//$file_type = strtolower(end(explode('.', $file)));

								if ($file !== '.' && $file !== '..') {
						?>
									<div class="thumb-item" id="<?php echo base_url().''.$dir.''.$file; ?>">
										<!--<div class="thumb-overlay"></div>-->
										<img src="<?php echo base_url().''.$dir.''.$file; ?>" />
									</div>
					<?php			
								}
							}
						}
					?>
				</div>
				<div class="mainTitle">
					<span class="title-text"><?php echo $furniture['applianceName']; ?></span>
					<div class="user-actions">
						<span class="share actions"><span class="action-text">Share</span> <i class="share-icn"></i></span>
						<span class="favorites actions"><span class="action-text">Add to favorites</span> <i class="favorite-icn"></i></span>
					</div>
					<!--<div class="mainAddress">Jide Alakija street, Ikate, Lekki Phase 1</div>-->
				</div>
				<div class="mainPrice-Veri">
					<div class="mainPrice">
						<span class="figures" style="color:#03100D">₦ <?php echo number_format($furniture['cost']); ?></span>/mth* 12 Months
					</div>
				</div>
				
				<div class="sub-content">
					<div class="sub-title">Payment Info</div>
					<div class="sub-note">
						<?php echo nl2br(html_entity_decode($furniture['paymentInfo'])); ?>
					</div>
				</div>
				<div class="sub-content">
					<div class="sub-title">Description</div>
					<div class="sub-note">
						<?php echo nl2br(html_entity_decode($furniture['description'])); ?>

					</div>
				</div>
				<div class="sub-content">
					<div class="sub-title">Specs</div>
					<div class="sub-note">
						<?php echo nl2br(html_entity_decode($furniture['specification'])); ?>

					</div>
				</div>
				<div class="sub-content">
					<div class="sub-title">Delivery</div>
					<div class="sub-note">
						<?php echo nl2br(html_entity_decode($furniture['description'])); ?>

					</div>
				</div>
				<div class="sub-content">
					<div class="sub-title">Terms and Conditions</div>
					<div class="sub-note">
						<?php echo nl2br(html_entity_decode($furniture['tandc'])); ?>

					</div>
				</div>
				
			</div>
			<div class="sidebar">
				<div class="sidePrice">
					<span class="figures">₦ <?php echo number_format($furniture['cost']); ?></span>/mth* 12 Months
				</div>
				<div class="security-deposit">
					Security deposit: <span class="figures">₦ <?php echo number_format($furniture['securityDeposit']); ?></span>
				</div>
				<div class="disclaimer">
					Note: Choose plan that best fits your budget.
				</div>
				<div class="norm-txt">Choose Ownership Plan</div>
				<table width="100%" cellpadding="5">
					<tr>
						<!--<td width="50%">
							<label>Duration</label>
							<div class="search_categories">
								<div class="select">
								   <select name="search_categories" id="search_categories">
									  <option value="1" selected="selected">12 Months</option>
									  <option value="2">6 Months</option>
									  <option value="3">3 Months</option>
									</select>
								 </div>
							 </div>
						</td>-->
						<td width="100%">
							<label>Payment Plan</label>
							<div class="search_categories">
								<div class="select">
								   <select name="search_categories" class="payment-plan-d" id="payment-plan-d">
									  <option value="12" selected="selected">Upfront</option>
									  <option value="6">Bi Annual</option>
									  <option value="3">Quarterly</option>
									  <option selected value="1">Monthly</option>
									</select>
								 </div>
							 </div>
						</td>
					</tr>
				</table>
				<div class="seperator"></div>
				<table width="100%">
					<tr>
						<td width="50%" style="font-family:avenir-regular;font-size:14px;" valign="top">Monthly Payment -</td>
						<td style="text-align:right;color:#00CDA4;font-family:avenir-demi">₦ <?php echo number_format($furniture['cost']); ?><br /><span style="color:#03100D;font-size:12px;">/Mo* 12 months</span></td>
					</tr>
					<tr>
						<td width="50%" style="font-family:avenir-regular;font-size:14px;" valign="top">Security Deposit -</td>
						<td style="text-align:right;color:#00CDA4;font-family:avenir-demi">₦ <?php echo number_format($furniture['securityDeposit']); ?></td>
					</tr>
				</table>
				<div class="total-price">₦ <span class="totalDisplay"><?php echo number_format($furniture['cost'] + $furniture['securityDeposit']); ?></span></div>
				<div class="price-breakdown"><span class=""></span></div>
				<div class="side-form-button" id="add-to-cart">Add to Cart</div>
				<input type="hidden" id="amount-due" class="amount-due" value="<?php echo $furniture['cost'] + $furniture['securityDeposit']; ?>" />
				<input type="hidden" id="monthly-cost" class="monthly-cost" value="<?php echo $furniture['cost']; ?>" />
				<input type="hidden" id="sec-dep-cost" class="sec-dep-cost" value="<?php echo $furniture['securityDeposit']; ?>" />
				<input type="hidden" id="productID" value="<?php echo $furniture['applianceID']; ?>" />
				<input type="hidden" id="productName" value="<?php echo $furniture['applianceName']; ?>" />
				<input type="hidden" id="imageLink" value="<?php echo base_url().'uploads/furnisure/'.$furniture['folderName'].'/'.$furniture['featuredImg']; ?>" />
				
			</div>
			<div class="side-contact">
				Help - <b>070 - 8778 9815</b><br /><br />
				<b>070 - 8778 9815</b>
			</div>
			<!----   Properties by location  ------>
			<div class="related-content">
			
				<div class="sub-title">Top picks for you</div>
				<ul class="prop-holder">
				
				<?php if(isset($related_furnitures) && !empty($related_furnitures)){ ?>
					<?php foreach($related_furnitures as $related_furniture => $related){ ?>
							<li>
								<div class="prop-container">
									<div class="prop-img"><img src="<?php echo base_url().'uploads/furnisure/'.$related['folderName'].'/'.$related['featuredImg']; ?>" /></div>					
									<div class="prop-info">
										<div class="prop-title"><?php echo $related['applianceName']; ?></div>
										<div class="prop-price">
											<div class="f-price">₦ <?php echo number_format($furniture['cost']); ?>/mth* 12 Months</div>
										</div>
									</div>
								</div>
							</li>
					<?php } ?>
				<?php } ?>
					
					<!--<li>
						<div class="prop-container">
							<div class="prop-img"><img src="images/furnisure-assets/coffee-table.jpg" /></div>
							<div class="prop-info">
								<div class="prop-title">Coffee Table</div>
								<div class="prop-price">
									<div class="f-price">N6,000/mth* 12 Months</div>
								</div>
							</div>					
						</div>
					</li>
					<li>
						<div class="prop-container">
							<div class="prop-img"><img src="images/furnisure-assets/two_seater.jpg" /></div>
							<div class="prop-info">
								<div class="prop-title">2 Seater Sofa</div>
								<div class="prop-price">
									<div class="f-price">N5,000/mth* 12 Months</div>
								</div>
							</div>	
						</div>
					</li>
					<li>
						<div class="prop-container">
							<div class="prop-img"><img src="images/furnisure-assets/single_bed.jpg" /></div>
							<div class="prop-info">
								<div class="prop-title">Single Bed</div>
								<div class="prop-price">
									<div class="f-price">N7,000/mth* 12 Months</div>
								</div>
							</div>	
						</div>
					</li>-->
				</ul>
			</div>
			<!---- Random furniture picks ---------->
		</div>
	</div>
<script src="<?php echo base_url(); ?>assets/js/image-swap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/furnisure-calculator.js"></script>
<script src="<?php echo base_url(); ?>assets/js/add-to-cart.js"></script>