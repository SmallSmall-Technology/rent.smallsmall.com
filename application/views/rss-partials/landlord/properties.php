                    <div class="page-det-container">
                        <div class="page-icn my-prop-icn"></div>
                        <div class="page-name">My properties (<?php echo $total_count; ?>)</div>
                    </div>
                    <div class="my-prop-container">
                        <?php if(isset($properties) && !empty($properties)){ ?>
		                    <?php foreach($properties as $property => $value){ ?>
                            <div class="my-prop-item">
                                <table cellpadding="10" width="100%">
                                    <tr>
                                        <td width="66.6%" valign="top">
                                            <div class="my-prop-name"><?php echo $value['propertyTitle']; ?></div>
                                            <div class="my-prop-loc"><?php echo $value['city']; ?></div>
                                        </td>
                                        <td valign="top"><div id="review-button-<?php echo $value['propID']; ?>" class="landlord-btns price-review float-right">Review price</div></td>
                                    </tr>
                                </table>
                                <table cellpadding="10" width="100%">
                                    <tr>
                                        <?php
                                            $name = '';
                                            
                                            if(!@$value['userID']){
                                                $name = "No Tenant";
                                            }else{
                                                $name = $value['firstName'].' '.$value['lastName'];
                                            }
                                        ?>
                                        <td width="40%">
                                            <div class="prop-table-title">Tenant</div>
                                            <div class="prop-table-note"><?php echo $name; ?></div>
                                        </td>
                                        <td width="30%" valign="top">
                                            <div class="prop-table-title">List Date</div>
                                            <div class="prop-table-note"><?php echo date('d M, Y', strtotime($value['dateOfEntry'])); ?></div>
                                        </td>
                                        <td width="30%" valign="top">
                                            <div class="prop-table-title">Plan</div>
                                            <div class="prop-table-note"><?php echo $value['paymentPlan']; ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">
                                            <div class="prop-table-title">Property rating</div>
                                            <div class="prop-table-note">7.5</div>
                                        </td>
                                        <td width="30%" valign="top">
                                            <div class="prop-table-title">Rent</div>
                                            <div class="prop-table-note"><span style="font-family:helvetica">&#x20A6;</span><?php echo number_format($value['price']); ?></div>
                                        </td>
                                        <td width="30%" valign="top">
                                            <div class="prop-table-note"><?php if($value['available_date'] > date('Y-m-d')){ echo "Tenanted"; $stat_color = "green"; }else{ echo "Vacant"; $stat_color = "red"; } ?> <span class="tenancy-status <?php echo $stat_color; ?>"><span></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <div class="ll-pagination">
        				<?php echo $this->pagination->create_links(); ?>
        			</div>
                </div>
            </div>
        <!---Price review overlay starts here--->
        <div class="form-overlay">
            <div class="form-overlay-box price-review-overlay">
                <div class="close-button">X</div>
                <div class="price-review-form">
                    <table>                            
                        <tr>
                            <td width="50px" valign="top"><div class="top-booking-icon top-credit-icon"></div></td>
                            <td>
                                <div class="dash-bt-header">Price Review</div>
                                <!---<div class="dash-wallet-subheader">Top up your wallet with ease.</div>--->
                            </td>
                        </tr>
                    </table>
                    
                    <div class="form-controls-container">
                        <label>New price</label>
                        <input type="text" class="dash-txt-f new-price" id="new-price" />
                    </div>
                    <div class="form-controls-container">
                        <label>Payment plan</label>
                        <select class="payment-plan" id="customSelect">
                            <option value=""></option>
                            <option value="Monthly">Monthly</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Bi-annually">Bi-annually</option>
                            <option value="Annually">Annually</option>
                        </select>
                    </div>
                    <div class="form-controls-container">
                        <label>Purpose of review</label>
                        <textarea class="txtarea-survey purpose-of-review"></textarea>
                    </div>             
                    <div class="form-controls-container">
                        <div class="action-btns green-bg review-button">Send request</div>
                    </div>
                    <input type="hidden" id="property-id" value="" />
                    <!---<div class="form-controls-container">
                        <label class="checkbox-label"><input type="checkbox" class="dash-chk-bx" id="t-and-c" />Click to agree to our <a href="#">terms and conditions</a></label>                    
                    </div>--->
                </div>
                
            </div>
        </div>
        <!---Price review ends here---> 

	<script src="<?php echo base_url('assets/js/rent-review.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/price-review.js?ver=1203992920'); ?>"></script>