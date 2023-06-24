   <div class="other-content">
            <div class="properties-listing-container">
                <div class="property-search-container">
                    <div class="top-form">
                        <form action="<?php echo base_url('rss/filter'); ?>" method="POST">
                            <span class="map-case"><i class="fa fa-map-marker"></i></span>
                            <span class="city-case">
                                <input type="text" class="city" name="city" id="city-txt" placeholder="Search by city..." />
                                <datalist role="listbox" id="cities">
                                <?php if(!empty($available_cities) && isset($available_cities)){ ?>
                                    <?php foreach($available_cities as $the_city => $each_city){ ?>
                                            <option value="<?php echo $each_city['city']; ?>"><?php echo $each_city['city']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                                </datalist>
                            </span>
                            
                            <span class="button-case fake-btn"><i class="fa fa-search"></i></span>
                            <button type="submit" class="city-search-btn home-sub-btn" hidden />
                        </form>
                    </div>
                </div>
                <div class="listings-pane">
                    <div class="search-floating-button search-pop"><i class="bx bx-slider-alt"></i></div>
                    <?php if(isset($properties) && !empty($properties)){ ?>

        				<?php foreach($properties as $property => $value){ ?>
                            <div class="listing-item">
                                <a style="text-decoration:none" href="<?php echo base_url(); ?>property/<?php echo $value['propertyID']; ?>">
                                    <div class="listing-image">
                                        <img src="<?php echo base_url(); ?>uploads/properties/<?php echo $value['imageFolder']."/".$value['featuredImg'] ?>" alt="RSS property image">
                                        <?php
                            			    $CI =& get_instance();
                            				if(date('Y-m-d') <= $value['available_date']){
                            				    
                                                echo '<div class="availability-box">Rented Until - <span class="unavailable">'.date("M Y", strtotime($value['available_date'])).'</span></div>';
                                            
                        					}else{
                            								
                            				    echo '<div class="availability-box">Available - <span class="available">now</span></div>';
                            				}
                            
                            			?>
                                        
                                        
                                    </div>
                                    <div class="listing-content">
                                        <div class="listing-price"><span class="monthly-price"><span style="font-family:helvetica;">&#x20A6;</span><?php echo ($value['price'] > 999999)? ($value['price']/1000000).'M' : number_format($value['price']); ?>/mth</span><span class="yearly-price"><strike><span style="font-family:helvetica;">&#x20A6;</span><?php $annual_price = $value['price'] * 12; echo ($annual_price > 999999)? number_format($annual_price/1000000).'M' : number_format($annual_price); ?>/yr</strike></span></div>
                                        <div class="listing-address"><?php echo $value['address'].", ".$value['city'] ; ?></div>
                                        <div class="listing-amenities">&bull;<?php echo $value['bed']; ?> Bed &bull; <?php echo $value['bath']; ?> Bath</div>
                                    </div>
                                </a>
                            </div>
                        
                        <?php } ?>
    						
        			    <div class="pagination">
                            <?php echo $this->pagination->create_links(); ?>
                        </div> 
    			    <?php }else{ ?> 
    			            <div style="width:100%;padding:15px 0;font-family:gotham-medium;color:#414042">No results matching your search</div>
    			    <?php } ?>
                    
                </div>
                <div class="web-search-pane">
                    <div class="search-box">
                        <div class="search-box-title">Filter</div>
                        <form action="<?php echo base_url('rss/filter'); ?>" method="POST">
                            <div class="form-el-container">
                                <label class="search-label">Location</label>
                                <div class="select white-bg">
                                    <select name="state" class="standard-select state">
                                        <option selected value="any">Any</option>
                                        <?php if(!empty($available_states) && isset($available_states)){ ?>
                                            <?php foreach($available_states as $the_state => $each_state){ ?>
                                                    <option value="<?php echo $each_state['state_id']; ?>"><?php echo $each_state['name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-el-container">
                                <label class="search-label">City</label>
                                <div class="select white-bg">
                                    <select class="standard-select city" name="city">
                                    </select>
                                </div>
                            </div>
                            <div class="form-el-container">
                                <label class="search-label">Bedroom</label>
                                <div class="bed-search-container">
                                    <span id="any" class="bed-option-item active-bed-option">Any</span>
                                    <span id="studio" class="bed-option-item">Studio</span>
                                    <span id="1" class="bed-option-item">1</span>
                                    <span id="2" class="bed-option-item">2</span>
                                    <span id="3" class="bed-option-item">3</span>
                                    <span id="4" class="bed-option-item">4+</span>
                                </div>
                                <input type="hidden" class="bed_num" name="bed_num" value="" />
                            </div>
                            <div class="form-el-container">
                                <label class="search-label">Bathroom</label>
                                <div class="bed-search-container">
                                    <span id="any" class="bath-option-item active-bath-option">Any</span>
                                    <span id="1" class="bath-option-item">1</span>
                                    <span id="2" class="bath-option-item">2</span>
                                    <span id="3" class="bath-option-item">3</span>
                                    <span id="4" class="bath-option-item">4+</span>
                                </div>
                                <input type="hidden" class="bath_num" name="bath_num" value="" />
                            </div>
                            <div class="form-el-container">
                                <label class="search-label">Price range</label>
                                <div class="slider-container">
                                    <input type="text" id="slider3" class="slider" />
                                    <input type="hidden" class="price-range" name="priceRange" />
                                </div>
                                <!-----Price range slider ----->
                                <!---<div class="min-max-slider" data-legendnum="2">
                                    <label for="min">Minimum price</label>
                                    <input id="min" class="min" name="min" type="range" step="1" min="0" max="3000" />
                                    <label for="max">Maximum price</label>
                                    <input id="max" class="max" name="max" type="range" step="1" min="0" max="3000" />
                                </div>--->
                                <!-----Price range slider ----->
                            </div>
                            <div class="form-el-container">
                                <label class="search-label">Furniture</label>
                                <div class="bed-search-container">
                                    <span id="any" class="furniture-option-item active-furniture-option">Any</span>
                                    <span id="2" class="furniture-option-item">Furnished</span>
                                    <span id="3" class="furniture-option-item">Partial</span>
                                    <span id="0" class="furniture-option-item">Unfurnished</span>
                                </div>
                                <input type="hidden" class="furnishing" name="furnishing" value="" />
                            </div>
                            <div class="form-el-container">
                                <label class="search-label">Availability</label>
                                <div class="select white-bg">
                                    <select class="standard-select" name="availability_val">
                                        <option value="Now">Now</option>
                                        <option value="1">Next 1 Month</option>
                                        <option value="6">Next 6 Months</option>
                                        <option value="9">Next 9 Months</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-el-container">
                                <button type="submit" class="rss-form-button" id="" >Show results</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
               
        <!------ Mobile search pane ------->  
        <div class="mobile-search-pane">
            <div class="search-box">
                <div class="search-close-btn close-search-overlay">x</div>
                <form action="<?php echo base_url('rss/filter'); ?>" method="POST">
                    <div class="form-el-container">
                        <label class="search-label">Location</label>
                        <div class="select white-bg">
                            <select name="state" class="standard-select state">
                                <option selected value="any">Any</option>
                                <?php if(!empty($available_states) && isset($available_states)){ ?>
                                    <?php foreach($available_states as $the_state => $each_state){ ?>
                                            <option value="<?php echo $each_state['state_id']; ?>"><?php echo $each_state['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-el-container">
                        <label class="search-label">City</label>
                        <div class="select white-bg">
                            <select class="standard-select city" name="city">
                            </select>
                        </div>
                    </div>
                    <div class="form-el-container">
                        <label class="search-label">Bedroom</label>
                        <div class="bed-search-container">
                            <span id="any" class="bed-option-item active-bed-option">Any</span>
                            <span id="studio" class="bed-option-item">Studio</span>
                            <span id="1" class="bed-option-item">1</span>
                            <span id="2" class="bed-option-item">2</span>
                            <span id="3" class="bed-option-item">3</span>
                            <span id="4" class="bed-option-item">4+</span>
                        </div>
                        <input type="hidden" class="bed_num" name="bed_num" value="" />
                    </div>
                    <div class="form-el-container">
                        <label class="search-label">Bathroom</label>
                        <div class="bed-search-container">
                            <span id="any" class="bath-option-item active-bath-option">Any</span>
                            <span id="1" class="bath-option-item">1</span>
                            <span id="2" class="bath-option-item">2</span>
                            <span id="3" class="bath-option-item">3</span>
                            <span id="4" class="bath-option-item">4+</span>
                        </div>
                        <input type="hidden" class="bath_num" name="bath_num" value="" />
                    </div>
                    <div class="form-el-container">
                        <label class="search-label">Price range</label>
                        <!-----Price range slider ----->
                        <div class="slider-container">
                            <input type="text" id="slider4" class="slider" />
                            <input type="hidden" class="price-range" name="priceRange" />
                        </div>
                        <!-----Price range slider ----->
                    </div>
                    <div class="form-el-container">
                        <label class="search-label">Furniture</label>
                        <div class="bed-search-container">
                            <span id="1" class="furniture-option-item active-furniture-option">Any</span>
                            <span id="2" class="furniture-option-item">Furnished</span>
                            <span id="3" class="furniture-option-item">Partial</span>
                            <span id="0" class="furniture-option-item">Unfurnished</span>
                        </div>
                        <input type="hidden" class="furnishing" name="furnishing" value="" />
                    </div>
                    <div class="form-el-container">
                        <label class="search-label">Availability</label>
                        <div class="select white-bg">
                            <select class="standard-select" name="availability_val">
                                <option value="Now">Now</option>
                                <option value="1">Next 1 Month</option>
                                <option value="6">Next 6 Months</option>
                                <option value="9">Next 9 Months</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-el-container">
                        <button type="submit" class="rss-form-button" id="" >Show results</button>
                    </div>
                </form>
            </div>
        </div>
        <!------ Mobile search pane ------->  
        <script src="<?php echo base_url(); ?>assets/js/props-country-picker.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/property-search.js"></script> 
        <script src="<?php echo base_url(); ?>assets/range-slide/js/rSlider.min.js"></script>
        <script>
            (function () {
                'use strict';

                var init = function () {                

                    var slider3 = new rSlider({
                        target: '#slider3',
                        values: {min: 10000, max: 2000000},
                        step: 10000,
                        range: true,
                        set: [30000, 700000],
                        scale: true,
                        labels: false,
                        onChange: function (vals) {
                            //console.log(vals);
                            //Insert into field here
                            $('.price-range').val(vals);
                        }
                    });

                    var slider4 = new rSlider({
                        target: '#slider4',
                        values: {min: 10000, max: 2000000},
                        step: 10000,
                        range: true,
                        set: [30000, 700000],
                        scale: true,
                        labels: false,
                        onChange: function (valses) {
                            //console.log(valses);
                            //Insert into field here
                            $('.price-range').val(vals);
                        }
                    });

                };
                
                window.onload = init;
                
            })();
        </script>