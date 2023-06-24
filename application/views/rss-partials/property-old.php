        <?php
            
            //Get The Eviction Security Deposit
            
            $propertyPrice = $property['price'];
            
            // get the eviction deposit value
            
           if (empty($propertyPrice) || is_null($propertyPrice)) {

			$evictionDeposit = 0; // set default

		    } elseif ($propertyPrice < 200000) {

			$evictionDeposit = 200000;

		    } else {

			$evictionDeposit = $propertyPrice;

		    }
            

            
            //Multiply the security deposit term by security deposit amount
            if($property['securityDepositTerm'] == 1)
            {
                $sec_dep = $property['securityDeposit'] * $property['securityDepositTerm'];
            }

            else
            {
                $sec_dep = $property['securityDeposit'] * $property['securityDepositTerm'];
                $sec_dep = 0.75 * $sec_dep;
            }
            
            $srlz = $property['intervals'];
            $srlz = unserialize($srlz);
            $yrnt = $property['price'] * 12;

            if($srlz[0] == 'Upfront')
            {
                $mnth = 'Upfront';
                $vmnth = 'Upfront';

                if($property['price'] > 999999)
                { 
                    $prc = (($property['price']/1000000) * 12).'M'; 
                }
                else
                { 
                    $prc = number_format($property['price'] * 12);
                }

                if($yrnt <= 2000000)
                {
                    $sec_dep = 0.25 * $yrnt;
                }

                else
                {
                    $sec_dep = 0.3 * $yrnt;
                }
                
                $total =  ($property['price'] * 12) + $sec_dep;
                
                $total = number_format($total);
            }

            else
            {
                $mnth = "/Month";
                $vmnth = "Monthly";
                
                if($property['price'] > 999999)
                { 
                    $prc = ($property['price']/1000000).'M'; 
                }
                
                else
                { 
                    $prc = number_format($property['price']); 
                }
                
                $serviceCharge = $property['serviceCharge'] * $property['serviceChargeTerm'];
                
                $total =  $property['price'] + $sec_dep + $evictionDeposit + $serviceCharge;
                
                $total = number_format($total);
            }
        ?>
        
        <div class="other-content">
            <div class="property-container">
                <!-- Slider main container -->
                <div class="swiper web-disp">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php 
                        
                            $mobile_images = '';
 
        					$dir = './uploads/properties/'.$property['imageFolder'].'/';
        
        					if (file_exists($dir) == false) {
        
        						echo 'Directory \'', $dir, '\' not found!'; 
        
        					} else {
        
        						$dir_contents = scandir($dir); 
        
        						$count = 0;
        																
        						$content_size = count($dir_contents);
        						    
        						$files = array();
        
        						foreach ($dir_contents as $file) {
        
        							//$file_type = strtolower(end(explode('.', $file)));
        
        							if ( $file !== '.' && $file !== '..'&& $count <= ($content_size - 2) ){ 
        							    
        							    echo '<div class="swiper-slide"><img src="'.base_url().''.$dir.''.$file.'" alt="property image" /></div>';
        							    
        							    $mobile_images .= '<div class="image-container-item image-disp"><img src="'.base_url().''.$dir.''.$file.'" alt="property image" /></div>';
        
        							}  
        							$count++;
        
        						}
        
        					}
        
        				?>
                        <!---<div class="swiper-slide"><img src="assets/images/apt-show.png" alt="property image" /></div>
                        <div class="swiper-slide"><img src="assets/images/apt-show.png" alt="property image" /></div>
                        <div class="swiper-slide"><img src="assets/images/apt-show.png" alt="property image" /></div>--->
                
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>

                <!-- Display images in mobile view -->
                <div class="mobile-property-image-container mobile-disp">
                    <?php echo $mobile_images; ?>
                </div>
                <!-- Display images in mobile view -->
                
                <div class="property-details-container">
                    <div class="property-details">
                        <div class="property-title-large"><?php echo $property['propertyTitle']; ?></div>
                        <div class="property-address-large"><?php echo $property['address'].' '.$property['city'].' '.$property['name']; ?></div>
                        <span class="payment-desc mobile-disp">Subscription Price</span>
                        <span class="rent-cost mobile-disp"><span style="font-family:helvetica;">&#x20A6;</span><?php echo $prc.' '.$mnth; ?></span>
                        <div class="security-deposit-line mobile-disp"><span>Security deposit Fund</span><span><span style="font-family:helvetica;">&#x20A6;</span><?php if($sec_dep > 999999){ echo (($sec_dep/1000000) + $evictionDeposit).'M'; }else{ echo number_format($sec_dep + $evictionDeposit); } ?></span></span></div>
                        <div class="verification-tag"><span class="verification-icn"></span><span class="verification-text">Verified property</span></div>
                        
                        <div class="amenities-box">
                            <div class="amenities-item">
                                <span class="amenities-icn bedroom"></span>
                                <span class="amenities-txt"><?php echo $property['bed']; ?> Bedroom</span>
                            </div>
                            <div class="amenities-item">
                                <span class="amenities-icn bathroom"></span>
                                <span class="amenities-txt"><?php echo $property['bath']; ?> Bathroom</span>
                            </div>
                            <div class="amenities-item">
                                <span class="amenities-icn toilet"></span>
                                <span class="amenities-txt"><?php echo $property['toilet']; ?> Toilet</span>
                            </div>
                            <!---<div class="amenities-item">
                                <span class="amenities-icn furniture"></span>
                                <span class="amenities-txt">Furnished</span>
                            </div>
                            <div class="amenities-item">
                                <span class="amenities-icn generator"></span>
                                <span class="amenities-txt">Generator</span>
                            </div--->
                        </div>
                        <div class="management-line">Managed by <span><?php echo $property['manager']; ?></span></div>

                        <div class="switch-container mobile-disp">
                            <div class="switch-txt">Like this property? Book to see it & subscribe.</div>
                            <div class="btn-container">
                                <input type="radio" name="form-overlay" id="inspection-overlay" value="inspection" hidden/>
                                <label for="inspection-overlay">Schedule a visit</label>  
                                <input type="radio" name="form-overlay" id="subscribe-overlay" value="subscription" hidden/>
                                <label for="subscribe-overlay">Subscribe now</label> 
                            </div>
                        </div>

                        <div class="prop-sub-detail">
                            <div class="sub-detail-head">About this property</div>                            
                            <div class="sub-detail-note">
                                <?php echo nl2br(html_entity_decode($property['propertyDescription'])); ?>
                            </div>
                        </div>
                        <div class="prop-sub-detail">
                            <div class="sub-detail-head">Amenities</div>                            
                            <div class="sub-detail-note">
                                <?php 

            						$amenity = unserialize($property['amenities']);
            
            						$amenity_list = "";
            
            					?>
            					<?php $amenity_count = count($amenity); ?>
            					<?php if(in_array('prepaid',$amenity)){ ?>
                                     <div class="amenities-item-blank">
                                        <span class="amenities-icn meter"></span>
                                        <span class="amenities-txt">Prepaid meter</span>
                                    </div>
                                 <?php } ?>
                                 <?php if(in_array('water',$amenity)){ ?>
                                     <div class="amenities-item-blank">
                                        <span class="amenities-icn water"></span>
                                        <span class="amenities-txt">Water</span>
                                    </div>
                                 <?php } ?>
                                 <?php if(in_array('waste-disposal',$amenity)){ ?>
                                     <div class="amenities-item-blank">
                                        <span class="amenities-icn lawma"></span>
                                        <span class="amenities-txt">Waste Disposal</span>
                                    </div>
                                 <?php } ?>
                            </div>
                            <div class="col-lg-4">
                                <?php if(in_array('kitchen',$amenity)){ ?>
                                     <div class="amenities-item-blank">
                                        <span class="amenities-icn kitchen"></span>
                                        <span class="amenities-txt">Kitchen</span>
                                    </div>
                                <?php } ?>
                                <?php if(in_array('wardrobe',$amenity)){ ?>
                                     <div class="amenities-item-blank">
                                        <span class="amenities-icn wardrobe"></span>
                                        <span class="amenities-txt">Wardrobe</span>
                                    </div>
                                <?php } ?>
                                <?php if(in_array('dining',$amenity)){ ?>
                                     <div class="amenities-item-blank">
                                        <span class="amenities-icn dining"></span>
                                        <span class="amenities-txt">Dining</span>
                                    </div>
                                <?php } ?>
                                <?php if(in_array('air-condition',$amenity)){ ?>
                                     <div class="amenities-item-blank">
                                        <span class="amenities-icn ac"></span>
                                        <span class="amenities-txt">Air conditioner</span>
                                    </div>
                                <?php } ?>
                                <?php if(in_array('security-gate',$amenity)){ ?>
                                    <div class="amenities-item-blank">
                                        <span class="amenities-icn security"></span>
                                        <span class="amenities-txt">Security</span>
                                    </div>
                                <?php } ?>
                                <?php if(in_array('generator',$amenity)){ ?>
                                     <div class="amenities-item-blank">
                                        <span class="amenities-icn generator"></span>
                                        <span class="amenities-txt">Generator</span>
                                    </div>
                                <?php } ?>
                                
                                
                            </div>
                        </div>

                        <div class="prop-sub-detail">
                            <div class="sub-detail-head">House rules</div>                            
                            <div class="sub-detail-note">
                                House rules violation may result in a subscription fine.
                                <table>

                                </table>
                            </div>
                        </div>

                        <div class="prop-sub-detail">
                            <div class="sub-detail-head">Neighborhood</div>                            
                            <div class="neighborhood-container">
                                
                                <?php

                					$CI =& get_instance();
                
                					$facilities = $CI->get_facilities($property['propertyID']);
                					
                					foreach($facilities as $facility => $outlet){

                				?>
                                    <div class="neighborhood-item">
                                        <div class="neighborhood-img">
                                            <img src="<?php echo base_url()."uploads/properties/".$property['imageFolder'].'/facilities/'.$outlet['file_path']; ?>" alt="neighborhood image">
                                        </div>
                                        <div class="neighborhood-name"><?php echo $outlet['name']; ?></div>
                                        <div class="neighborhood-category"><?php echo $outlet['category']; ?></div>
                                        <div class="neighborhood-distance"><?php echo $outlet['distance']; ?></div>
                                    </div>
                					
                				<?php } ?>
                                
                            </div>
                        </div>
                    </div>



                    <div class="property-payment-details web-disp">
                        <div class="payment-details-form">
                            <span class="payment-desc web-disp">Subscription Price</span>
                            <span class="rent-cost web-disp"><span style="font-family:helvetica;">&#x20A6;</span><?php echo $prc.' '.$mnth; ?></span>
                            
                            <div class="security-deposit-line web-disp"><span>Security deposit fund</span><span><b style="font-family:helvetica;">&#x20A6;</b><?php if($sec_dep > 999999){ echo (($sec_dep/1000000) + $evictionDeposit).'M'; }else{ echo number_format($sec_dep + $evictionDeposit); } ?></span></span>
                            <!----Tool tip starts--->
                                
                            <!----Tool tip ends ---->
                            </div>
                            <div style="width:100%;display:inline-block;background:transparent;color:#414042;font-family:gotham-medium;text-align:center;">
                                <div class="btn-container">
                                    <input type="radio" name="form-type" id="inspection" checked value="inspection" hidden/>
                                    <label for="inspection">Schedule a visit</label>  
                                    <input type="radio" name="form-type" id="subscribe" value="subscription" hidden/>
                                    <label for="subscribe">Subscribe now</label> 
                                </div>
                            </div>
                            <div class="property-forms inspection-form">
                                <div class="form-description">Choose inspection type, date and time</div>
                                <form id="inspectionForm" method="post">
                                    <div class="form-el-container">
                                        <div class="select white-bg border-round">
                                            <select class="insp-type" id="insp-type">
                                                <option value="Physical">Physical</option>
                                                <option value="Virtual">Virtual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-el-container">
                                        <input type="text" onclick="(this.type='date')" class="rss-text-f white-bg border-round inspection-date" id="insDate" placeholder="Inspection date" name="" />
                                        <span class="field-icns"><i class="bx bx-calendar"></i></span>
                                    </div>
                                    <div class="form-el-container">
                                        <input autocomplete="off" list="inspection-time"  name="inspection-time" type="text" class="inspection-time rss-text-f white-bg border-round" id="input" placeholder="Inspection time" />
                                        <datalist role="listbox" id="inspection-time">
                                            <option value="10:00">10:00 AM</option>
                                            <option value="10:30">10:30 AM</option>
                                            <option value="11:00">11:00 AM</option>
                                            <option value="11:30">11:30 AM</option>
                                            <option value="12:00">12:00 PM</option>
                                            <option value="12:30">12:30 PM</option>
                                            <option value="13:00">1:00 PM</option>
                                            <option value="13:30">1:30 PM</option>
                                            <option value="14:00">2:00 PM</option>
                                            <option value="14:30">2:30 PM</option>
                                            <option value="15:00">3:00 PM</option>
                                            <option value="15:30">3:30 PM</option>
                                            <option value="16:00">4:00 PM</option>
                                        </datalist>
                                        <span class="field-icns"><i class="bx bx-alarm"></i></span>
                                    </div>
                                    <div class="form-txt"><label for="tenancy-terms"><input type="checkbox" name="tenancy-terms" id="tenancy-terms" />I agree to <a href="">Terms and Conditions</a></label></div>
                                    
                                    <div class="form-el-container">
                                    <?php if($property['available_date'] <= date('Y-m-d H:is') || $property['available_date'] == '') { ?>

							
        							    <?php if(@$user_type == 'landlord'){ ?>
        							    
        							            <button type="submit" disabled class="disabled-btn" id="" >Schedule inspection</button>
        							    
        							    <?php }else{ ?>
        							    
        							            <button type="submit" class="rss-form-button inspection-btn schedule-inspection" id="" >Schedule inspection</button>
        							    
        							    <?php } ?>
        							    
        						    <?php }else{ ?>
                                            <?php if($property['available_date'] == date('Y-m-d', strtotime('+ 1 day'))) { ?>
                                                    <button disabled class="disabled-btn" >Available in 24hrs</button>
                                            <?php }else{ ?>
                                            
                							    <button disabled class="disabled-btn" >Unavailable</button>
                							
                							<?php } ?>
                
                					<?php } ?>
                                        
                                    </div>
                                </form>
                            </div>
                            <div class="property-forms subscription-form">
                                <div class="form-description">Book a subscription</div>
                                <form id="paymentForm" method="post">
                                    <div class="form-el-container">
                                        <div class="select white-bg border-round">
                                            <?php
    
                    							$duration = "";
                    
                    							$fullduration = 0;
                    
                    							$frequency = unserialize($property['frequency']);
                    							if(is_array($frequency)){
                    
                    								for($i = 0; $i < count($frequency); $i++){
                    
                    									if($frequency[$i] == 12){
                    
                    										$duration .= '<option value="'.$frequency[$i].'"> 12 Months </option>';
                    
                    										$fullduration = 1;
                    
                    									}elseif($frequency[$i] == 9){
                    
                    										$duration .= '<option value="'.$frequency[$i].'"> 9 Months </option>';
                    
                    									}elseif($frequency[$i] == 6){
                    
                    										$duration .= '<option value="'.$frequency[$i].'"> 6 Months </option>';
                    
                    									}elseif($frequency[$i] == 3){
                    
                    										$duration .= '<option value="'.$frequency[$i].'"> 3 Months </option>';
                    
                    									}elseif($frequency[$i] == 1){
                    
                    										$duration .= '<option value="'.$frequency[$i].'"> 1 Month </option>';
                    
                    									}
                    
                    								}
                    							}else{
                    							    $duration .= '<option value="1"> 1 Month </option>';
                    							}
                    
                    						?>
                    						<?php
                    						    //Set fields to disabled if user is not signed in
                    						    $field_stat = '';
                    						    if(!@$userID){
                    						        $field_stat = "disabled";
                    						    }
                    						?>
                                            <select <?php echo @$field_stat; ?> class="duration" id="duration">
                                                <?php echo $duration; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-el-container">
                                        <div class="select white-bg border-round">
                                            <select <?php echo @$field_stat; ?> class="payment_plan" name="payment-plan" id="payment-plan">
                                                <?php
        
                    								$intervals = "";
                    
                    								$interval = unserialize($property['intervals']);
                    
                    								for($i = 0; $i < count($interval); $i++){
                    
                    									echo '<option value="'.$interval[$i].'">'.$interval[$i].'</option>';
                    
                    								}
                    
                    							?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-el-container">
                                        <input <?php echo @$field_stat; ?> type="text" onclick="(this.type='date')" class="move-in-date rss-text-f white-bg border-round" id="move-in-date" placeholder="Move in date" />
                                        <span class="field-icns"><i class="bx bx-calendar"></i></span>
                                    </div>
                                    <table class="pay-table" width="100%">
                                        <tr>
                                            <td width="60%"><span class="td-desc">Subscription fees</span></td>
                                            <td><span class="td-note"><span style="font-family:helvetica;">&#x20A6;</span><span class = "subc"><?php echo $prc; ?></span> <span class = "mnth"><?php echo $vmnth; ?></span></span></td>
                                        </tr>
                                        <?php if(@$userID){ ?>
                                            <tr>
                                                <td width="60%"><span class="td-desc">Service charge deposit</span></td>
                                                    <td><span class="td-note"><span style="font-family:helvetica;">&#x20A6;</span><?php echo ($property['serviceChargeTerm'] != '') ? number_format($property['serviceCharge'] * $property['serviceChargeTerm']) : $property['serviceCharge']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="td-desc">Security deposit fund</span></td>
                                                <td><span class="td-note"><span style="font-family:helvetica;">&#x20A6;</span><span class = "sec_dep"><?php echo number_format($sec_dep + $evictionDeposit); ?></span></span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="td-desc">Total amount</span></td>
                                                <td><span class="td-note"><span style="font-family:helvetica;">&#x20A6;</span><span class="pricing"><?php echo $total; ?></span></span></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                    <?php if(!@$userID){ ?>
                                        <div class="price-notifier">Login to see price breakdown</div>
                                    <?php } ?>
                                    <div class="form-el-container">
                                    <?php if($property['available_date'] <= date('Y-m-d H:is') || $property['available_date'] == '') { ?>

							
        							    <?php if(@$user_type == 'landlord'){ ?>
        							    
        							            <button type="submit" disabled class="disabled-btn" id="" >Pay now</button>
        							    
        							    <?php }else{ ?>
        							    
        							            <button type="submit" class="rss-form-button subscription-btn" id="pay-property" >Subscribe</button>
        							    
        							    <?php } ?>
        							    
        						    <?php }else{ ?>
                                            <?php if($property['available_date'] == date('Y-m-d', strtotime('+ 1 day'))) { ?>
                                                    <button disabled class="disabled-btn" >Available in 24hrs</button>
                                            <?php }else{ ?>
                                            
                							    <button disabled class="disabled-btn" >Rented</button>
                							
                							<?php } ?>
                
                					<?php } ?>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="userID" id="userID" value="<?php echo @$userID; ?>" />
				
        		<input type="hidden" class="verified" id="verified" value="<?php echo @$verified; ?>" />
        
        		<input type="hidden" class="productName" id="productName" value="<?php echo $property['propertyTitle']; ?>" />
        
        		<input type="hidden" class="property-id" id="property_id" value="<?php echo $property['propertyID']; ?>" />
        
        		<input type="hidden" class="prop-monthly-price" id="monthly-price" value="<?php echo $property['price']; ?>" />
        
        		<input type="hidden" class="sec-deposit" id="sec-deposit" value="<?php echo ($sec_dep + $evictionDeposit); ?>" />
        
        		<input type="hidden" class="serv-charge" id="serv-charge" value="<?php echo ($property['serviceCharge']* $property['serviceChargeTerm']); ?>" />
        		
        		<input type="hidden" class="cvstat" id="cvstat" value="<?php echo @$verified; ?>" />
        		
        		<input type="hidden" class="verification_profile" id="verification_profile" value="<?php echo @$verification_profile; ?>" />
        		<?php 
        		    $inspection_stat = "no";
        		    if(@$check_inspection){
        		        $inspection_stat = "yes";
        		    }
        		?>
        		<input type="hidden" class="inspection_stat" id="inspection_stat" value="<?php echo @$inspection_stat ?>" />
        		<input type="hidden" class="apt-type" id="apt-type" value="<?php echo @$property['type_slug']; ?>" />
        
        		<input type="hidden" class="imageLink" id="imageLink" value="<?php echo base_url().'uploads/properties/'.$property['imageFolder'].'/'.$property['featuredImg']; ?>" />
        
        		<input type="hidden" class="amount-due" id="amount-due" value="<?php echo $property['price'] + $sec_dep + $property['serviceCharge']; ?>" />

            </div>
        </div>
        
        
        <!------- Form overlays here ----->
        <!------ Mobile search pane ------->  
        <div class="inspection-mobile-overlay mobile-overlays inspection-overlay">
            <div class="property-forms">
                <div class="search-close-btn close-mobile-overlay">x</div>
                <div class="form-description">Choose inspection type, date and time</div>
                <form id="mobInspectionForms" method="post">
                    <div class="form-el-container">
                        <div class="select white-bg border-round">
                            <select class="mob-insp-type" id="insp-type">
                                <option value="Physical">Physical</option>
                                <option value="Virtual">Virtual</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-el-container">
                        <input type="text" onclick="(this.type='date')" class="rss-text-f white-bg border-round mob-inspection-date" id="insDateMob" placeholder="Inspection date" name="" />
                        <span class="field-icns"><i class="bx bx-calendar"></i></span>
                    </div>
                    <div class="form-el-container">
                        <input autocomplete="off" list="inspection-time"  name="inspection-time" type="text" class="mob-inspection-time rss-text-f white-bg border-round" id="input" placeholder="Inspection time" />
                        <datalist role="listbox" id="inspection-time">
                            <option value="10:00">10:00 AM</option>
                            <option value="10:30">10:30 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="11:30">11:30 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="12:30">12:30 PM</option>
                            <option value="13:00">1:00 PM</option>
                            <option value="13:30">1:30 PM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="14:30">2:30 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="15:30">3:30 PM</option>
                            <option value="16:00">4:00 PM</option>
                        </datalist>
                        <span class="field-icns"><i class="bx bx-alarm"></i></span>
                    </div>
                    <div class="form-txt"><label for="tenancy-terms"><input type="checkbox" name="tenancy-terms" id="tenancy-terms" />I agree to <a href="">Terms and Conditions</a></label></div>
                    <div class="form-el-container">
                        <button type="submit" class="rss-form-button mob-schedule-inspection" id="" >Schedule inspection</button>
                    </div>
                </form>
            </div>
        </div>
        <!------ Inspection overlay  ------->
        <!------ Subscription overlay ------>
        <div class="subscription-mobile-overlay mobile-overlays subscription-overlay">
            <div class="property-forms">
                <div class="search-close-btn close-mobile-overlay">x</div>
                <div class="form-description">Book a subscription</div>
                <form id="mobPaymentForms" method="POST">
                    <div class="form-el-container">
                        <div class="select white-bg border-round">
                            <?php

    							$duration = "";
    
    							$fullduration = 0;
    
    							$frequency = unserialize($property['frequency']);
    							if(is_array($frequency)){
    
    								for($i = 0; $i < count($frequency); $i++){
    
    									if($frequency[$i] == 12){
    
    										$duration .= '<option value="'.$frequency[$i].'"> 12 Months </option>';
    
    										$fullduration = 1;
    
    									}elseif($frequency[$i] == 9){
    
    										$duration .= '<option value="'.$frequency[$i].'"> 9 Months </option>';
    
    									}elseif($frequency[$i] == 6){
    
    										$duration .= '<option value="'.$frequency[$i].'"> 6 Months </option>';
    
    									}elseif($frequency[$i] == 3){
    
    										$duration .= '<option value="'.$frequency[$i].'"> 3 Months </option>';
    
    									}elseif($frequency[$i] == 1){
    
    										$duration .= '<option value="'.$frequency[$i].'"> 1 Month </option>';
    
    									}
    
    								}
    							}else{
    							    $duration .= '<option value="1"> 1 Month </option>';
    							}
    
    						?>
                            <select <?php echo @$field_stat; ?> class="duration" id="mob-duration">
                                             
                                <?php echo $duration; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-el-container">
                        <div class="select white-bg border-round">
                            <select <?php echo @$field_stat; ?> class="payment_plan" name="mob-payment-plan" id="mob-payment-plan">
                                <option value="">Payment plan</option>
                                <?php
        
    								$intervals = "";
    
    								$interval = unserialize($property['intervals']);
    
    								for($i = 0; $i < count($interval); $i++){
    
    									echo '<option value="'.$interval[$i].'">'.$interval[$i].'</option>';
    
    								}
    
    							?>
                            </select>
                        </div>
                    </div>
                    <div class="form-el-container">
                        <input <?php echo @$field_stat; ?> type="text" onclick="(this.type='date')" class="move-in-date rss-text-f white-bg border-round" id="mob-move-in-date" placeholder="Move in date" />
                        <span class="field-icns"><i class="bx bx-calendar"></i></span>
                    </div>
                    <table class="pay-table" width="100%">
                        <tr>
                            <td width="60%"><span class="td-desc">Subscription fees</span></td>
                            <td><span class="td-note"><span style="font-family:helvetica;">&#x20A6;</span><span class = "subc"><?php echo $prc; ?></span> <span class = "mnth"><?php echo $vmnth; ?></span></span></td>
                        </tr>
                        <?php if(@$userID){ ?>
                            <tr>
                                <td><span class="td-desc">Service charge deposit</span></td>
                                <td><span class="td-note"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['serviceCharge']); ?>Monthly</span></td>
                            </tr>
                            <tr>
                                <td><span class="td-desc">Security deposit fund</span></td>
                                <td><span class="td-note"><span style="font-family:helvetica;">&#x20A6;</span><span class = "sec_dep"><?php echo number_format($sec_dep + $evictionDeposit); ?></span></span></td>
                            </tr>
                            <tr>
                                <td><span class="td-desc">Total amount</span></td>
                                <td><span class="td-note"><span style="font-family:helvetica;">&#x20A6;</span><span class="pricing"><?php echo $total; ?></span></span></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <?php if(!@$userID){ ?>
                        <div class="price-notifier">Login to see price breakdown</div>
                    <?php } ?>
                    <div class="form-el-container">
                        <button type="submit" class="rss-form-button" id="mob-pay-property">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
        <!------Subscription overlay ------->
        <!------Successful inspection, subscription and payment popups ------->
        <div class="popup-container">
            <!---- Payment option popup box ---->
            <div class="popup payment-option-pop">
                <div class="close-button">x</div>
                <div class="pay-option" id="transfer">
                    <div class="pay-option-item">
                        <div class="fake-check-box fcb-transfer"><div class="chk-bx-color"></div></div>
                    </div>
                    <div class="pay-option-item">
                        <div class="pay-option-desc">Transfer</div>
                    </div>
                    <div class="pay-option-item">
                        <div class="pay-option-img transfer"></div>
                    </div>
                </div>
                <div class="pay-option" id="paystack">
                    <div class="pay-option-item">
                        <div class="fake-check-box fcb-paystack"><div class="chk-bx-color"></div></div>
                    </div>
                    <div class="pay-option-item">
                        <div class="pay-option-desc">Paystack</div>
                    </div>
                    <div class="pay-option-item">
                        <div class="pay-option-img paystack"></div>
                    </div>
                </div>
                <div class="pay-option" id="flutterwave">
                    <div class="pay-option-item">
                        <div class="fake-check-box fcb-flutterwave"><div class="chk-bx-color"></div></div>
                    </div>
                    <div class="pay-option-item">
                        <div class="pay-option-desc">Flutterwave</div>
                    </div>
                    <div class="pay-option-item">
                        <div class="pay-option-img flutterwave"></div>
                    </div>
                </div>
                <div class="pay-option" id="wallet">
                    <div class="pay-option-item">
                        <div class="fake-check-box fcb-wallet"><div class="chk-bx-color"></div></div>
                    </div>
                    <div class="pay-option-item">
                        <div class="pay-option-desc">Wallet</div>
                    </div>
                    <div class="pay-option-item">
                        <div class="pay-option-img"></div>
                    </div>
                </div>
                <div class="pay-option" id="crypto">
                    <div class="pay-option-item">
                        <div class="fake-check-box fcb-crypto"><div class="chk-bx-color"></div></div>
                    </div>
                    <div class="pay-option-item">
                        <div class="pay-option-desc">Cryptocurrency</div>
                    </div>
                    <div class="pay-option-item">
                        <div class="pay-option-img"></div>
                    </div>
                </div>
        
                <input type="hidden" id="payment_option" value="" />
        
                <div class="continue-but" id="continue-but">Continue</div>
            </div>
            <!---- Payment option popup box ---->
            
            <!---- Inspection popup box ---->
            <div class="popup inspection">
                <div class="close-button">x</div>
                <div class="popup-img">
                <img src="<?php echo base_url(); ?>assets/images/hurray_popup.png" class="" > 
                </div>
                <h3 class="align-center">Hurrah!!</h3>
                <h4 class="align-center">Inspection booked</h4>
                <span class="align-center">Please check your email for more details.</span>
            </div>
            <!---- Inspection popup box ---->
            
            
            <!---- Successful payment box ---->
            <div class="popup subscription">
                <div class="close-button">x</div>
                <div class="popup-img">
                <img src="<?php echo base_url(); ?>assets/images/hurray_popup.png" class="" > 
                </div>
                <h3 class="align-center">Hurrah!!</h3>
                <h4 class="align-center">Payment Successful</h4>
                <span class="align-center">Please check your email for more details.</span>
            </div>
            <!---- Successful payment box ---->                
        </div>
        <!------- Form overlays here ----->
        <script src="<?php echo base_url(); ?>assets/js/property.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/property-form-change.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'vertical',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
            });

        </script>


    
    <!-- properties nearby -->
    <!---<div class="container nearby">
        <p class="nearby-heading">Similar properties nearby</p>
        <div class="row">
            <?php //if(isset($relatedProps)){ ?>
    
    			<?php //foreach($relatedProps as $relatedProp => $related){ ?>
                <div class="col-lg-4 n-card">
                    <a href="<?php //echo base_url(); ?>property/<?php //echo $related['propertyID']; ?>">
                        <div class="prop-img-container">
                            <img src="<?php //echo base_url(); ?>uploads/properties/<?php //echo $related['imageFolder']."/".$related['featuredImg'] ?>" class="card-img-top" alt="...">
                            <?php
    							/*$CI =& get_instance();
    												  
    							//@$avail_date = $CI->get_available_date($value['propertyID']);
    
    							if(date('Y-m-d') <= $related['available_date']){
    
    								echo '<p class="img-tag">Rented Until - <span class="occupied">'.date("M Y", strtotime($related['available_date'])).'</span></p>';
    
    							}else{
    								
    								echo '<p class="img-tag">Available - <span>now</span></p>';
    							}*/
    
    						?>
    				    </div>
                        <div class="card-body">
                            <p class="card-title">
                                <span><span style="font-family:helvetica;">&#x20A6;</span><?php //echo number_format($related['price']); ?>/Month</span>
                                <span><strike><span style="font-family:helvetica;">&#x20A6;</span><?php //echo number_format($related['price'] * 12); ?>/Year</strike></span>
                            </p>
                            <p class="card-text"><?php //echo $related['address'].", ".$related['city'] ; ?></p>
                            <p class="card-text">
                                &bullet;
                                <span><?php //echo $related['bed']; ?> Bed</span>
                                &bullet;
                                <span><?php //echo $related['bath']; ?> Bath</span>
                                &bullet;
                                <span>Lagos</span>
                            </p>
                        </div>
                    </a>
                </div>
                <?php //} ?>
            <?php //} ?>
                
             
        </div>
    </div>
</div>
 </div>--->
        <script>
            function insertDate(){
                
                $('#insDate').attr('type', 'date');
                
                $('#insDateMob').attr('type', 'date');
                
                var dtToday = new Date();
                
                var month = dtToday.getMonth() + 1;
                
                var day = dtToday.getDate();
                
                var year = dtToday.getFullYear();
                
                if(month < 10)
                
                    month = '0' + month.toString();
                    
                if(day < 10)
                
                    day = '0' + day.toString();
                
                var maxDate = year + '-' + month + '-' + day;
                
                // or instead:
                // var maxDate = dtToday.toISOString().substr(0, 10);
            
                $('#insDate').attr('min', maxDate);
                
                $('#insDateMob').attr('min', maxDate);
            }
        </script>

    <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/inspection.js?version=9.10.2"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/payment-plan.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/rent-calculator.js?version=<?php echo rand(2, 9999); ?>.10.<?php echo rand(2, 99999); ?>"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/rental.js?version=<?php echo rand(2, 999); ?>.10.<?php echo rand(2, 999); ?>"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/favorite.js"></script>
    