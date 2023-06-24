        	<!-- info -->
            
            <div class="row property-wrapper">
                <div class="col-sm-1"></div>
                <div class="col-sm-7">
                    <div class="row nearby">
                        <?php if(isset($properties) && !empty($properties)){ ?>

				            <?php foreach($properties as $property => $value){ ?>
                                <div class="col-sm-4 n-card">
                                    <div class="prop-img-container">
                                        <img src="<?php echo base_url(); ?>uploads/properties/<?php echo $value['imageFolder']."/".$value['featuredImg'] ?>" class="card-img-top" alt="...">
                                        <?php
                							$CI =& get_instance();
                
                							if(date('Y-m-d') <= $value['available_date']){
                
                								echo '<p class="img-tag">Rented Until - <span class="occupied">'.date("M Y", strtotime($value['available_date'])).'</span></p>';
                
                							}else{
                								
                								echo '<p class="img-tag">Available - <span>now</span></p>';
                							}
                
                						?>
                                    </div>
                                  
                                    <a href="<?php echo base_url(); ?>property/<?php echo $value['propertyID']; ?>">
                                        <div class="card-body">
                                            <p class="card-title">
                                                <span><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($value['price']); ?>/Month</span>
                                                <span><strike><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($value['price'] * 12); ?>/Year</strike></span>
                                            </p>
                                            <p class="card-text"><?php echo $value['address']." ".$value['city'] ; ?></p>
                                            <p class="card-text">
                                                &bullet;
                                                <span><?php echo $value['bed']; ?> Bed</span>
                                                &bullet;
                                                <span><?php echo $value['bath']; ?> Bath</span>
                                                &bullet;
                                                <span>Lagos</span>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
        							
        			    <?php } ?>
                        
                    </div>    
                </div>
                <div class="col-sm-4 filter-search">
                    <div class="filter-search-container">
                        <div class="row filter-header">
                            <p>Filter</p>
                        </div>
                        <div class="row filter-group">
                            <form action="<?php echo base_url(); ?>rss/filter" method="POST">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="filter-label">City</label>
                                    <select name="city" class="form-control padinput" id="exampleFormControlSelect1">
                                        <?php if(isset($available_cities) && !empty($available_cities)){ ?>
                							<?php foreach($available_cities as $city => $key_city){ ?>
                			                    
                                                <option value="<?php echo $key_city['name']; ?>"><?php echo $key_city['name']; ?></option>
                			                    									   		
                							<?php } ?>
                						<?php } ?>
                                    </select>
                                </div>
            
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="filter-label">Location</label>
                                    <select class="form-control padinput" id="exampleFormControlSelect1">
                                      <option>Any</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                </div>
            
                                <label for="btnradio" class="filter-label">Bedroom</label>
                                <div class="btn-group button-group-choose" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" value="any" name="property_type" id="btnradio1" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary filter-button-color" for="btnradio1">Any</label>
                                  
                                    <input type="radio" class="btn-check" value="studio" name="property_type" id="btnradio2" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio2">Studio</label>
                                  
                                    <input type="radio" class="btn-check" value="1" name="property_type" id="btnradio3" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio3">1</label>
            
                                    <input type="radio" class="btn-check" value="2" name="property_type" id="btnradio4" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio4">2</label>
            
                                    <input type="radio" class="btn-check" value="3" name="property_type" id="btnradio5" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio5">3</label>
            
                                    <input type="radio" class="btn-check" value="4" name="property_type" id="btnradio6" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio6">4+</label>
                                </div>
            
                                
                                <label for="btnradio" class="filter-label">Bathroom</label>
                                <div class="btn-group button-group-choose" role="group" aria-label="Basic radio toggle button group">
                                      
                                    <input type="radio" class="btn-check" name="btnradiob" id="btnradio10" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary filter-button-color" for="btnradio10">Any</label>
                                    
                                    <input type="radio" class="btn-check" name="btnradiob" id="btnradio12" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio12">1</label>
              
                                    <input type="radio" class="btn-check" name="btnradiob" id="btnradio13" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio13">2</label>
          
                                    <input type="radio" class="btn-check" name="btnradiob" id="btnradio14" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio14">3</label>
          
                                    <input type="radio" class="btn-check" name="btnradiob" id="btnradio15" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio15">4+</label>
                                </div>
            
                                <div class="container">
                                    <div class="slider-container">
                                        <input type="text" id="slider3" class="slider" />
                                    </div>
                                </div>
                                <label for="btnradio" class="filter-label">Furniture</label>
                                <div class="btn-group button-group-choose" role="group" aria-label="Basic radio toggle button group">
                                        
                                    <input type="radio" class="btn-check" name="btnradioc" id="btnradio20" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary filter-button-color" for="btnradio20">Any</label>
                                      
                                    <input type="radio" class="btn-check" name="btnradiob" id="btnradio21" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio21">Furnished</label>
                                      
                                    <input type="radio" class="btn-check" name="btnradiob" id="btnradio22" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio22">Unfurnished</label>
                                    
                                </div>
                                    
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="filter-label">Availability</label>
                                    <select name="availability_val" class="form-control padinput" id="exampleFormControlSelect1">
                                      <option value="now">Now</option>
                                      <option value="2">1 - 2 Mths</option>
                                      <option value="4">3 - 4 Mths</option>
                                      <option value="6">5 - 6 Mths</option>
                                      <option value="7">6+ Mths</option>
                                    </select>
                                </div>
                                    
                                <button class="search-btn">Show results</button>
                              
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
   
<script src="<?php echo base_url(); ?>assets/js/inspection.js"></script>
<script src="<?php echo base_url(); ?>assets/js/property-sort-pane.js"></script>
<!--<script>
	var slider = document.getElementById("myRange");
	var output = document.getElementById("slidevalue");
	output.innerHTML = numberWithCommas(slider.value+"/mth"); // Display the default slider value

	// Update the current slider value (each time you drag the slider handle)
	slider.oninput = function() {
	  	output.innerHTML = numberWithCommas(this.value+"/mth");
	}
	
	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
</script>--->
<!---<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoicmVudHNtYWxsc21hbGwiLCJhIjoiY2tkZ2I3ajNtMHFrYjJyb2JoMWNjNWllMSJ9.Ba7Iw2TAhxBPuTcLdQWDzQ';
    var map = new mapboxgl.Map({
        container: 'map',
        center: [2.883430,6.416970], // starting position
        style: 'mapbox://styles/mapbox/streets-v11',
        zoom: 9
    });
    // Set options
    var marker = new mapboxgl.Marker({
        color: "#00CDA4",
        draggable: true
      }).setLngLat([2.883430,6.416970]).addTo(map);
      
</script>--->