			

	<div class="item-pane">

		<div class="top-form">

			<div class="top-form-inner">

				<div class="sort-boxes">
					
				   <select name="search_categories" id="soflow">

					  	<option value="1" selected="selected">Price</option>

					</select>

				</div>

				<div class="sort-boxes">

					<select name="search_categories" id="soflow">

					  	<option value="1" selected="selected">Filter</option>

					</select>		

				</div>

				<div class="sort-boxes">

				   	<select name="search_categories" id="soflow">

					  	<option value="1" selected="selected">Category</option>

					</select>
		

				</div>

				<div class="sort-boxes">

					<select name="search_categories" id="soflow">

					  <option value="1" selected="selected">Sort By</option>

					</select>			

				</div>				

			</div>

		</div>

		<div class="page-inner">

			<ul class="prop-holder">

				<?php //print_r($furnitures); ?>

				<?php if(isset($furnitures) && !empty($furnitures)){ ?>

					<?php foreach($furnitures as $furniture => $value){ ?>

						<li>

							<a style="text-decoration:none" href="<?php echo base_url()."furnisure/item/".$value['applianceID']; ?>">

								<div class="prop-container">

									<div class="prop-img"><img src="<?php echo base_url()."uploads/furnisure/".$value['folderName'].'/'.$value['featuredImg']; ?>" /></div>					

									<div class="prop-info">

										<div class="prop-title"><?php echo $value['applianceName'] ?></div>

										<div class="prop-price">
                                            <div class="f-price">
    										    As low as <span style="font-family:helvetica;">&#x20A6;</span><SPAN><?php echo number_format($value['cost'] * 0.4); ?></span> per Month
    										</div>
    
    									</div>

									</div>

								</div>

							</a>

						</li>

					<?php } ?>

				<?php } ?>

				

			</ul>	

			<div class="pagination">

				<?php echo $this->pagination->create_links(); ?>

			</div>

		</div>

	</div>

