<!-- MAIN SECTION -->

<style>
    .pagination {
    width: 100%;
    display: inline-block;
    margin: 15px 0;
    text-align: center;
}

.pagination span {
    font-family: sans-serif;
    float: left;
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #007bff;
    /*background-color: #007bff; */
    /* Updated background color */
    border: 1px solid #dee2e6;
}

.pagination span:not(:has(a)) {
    background-color: #007bff; /* Background color for spans without an 'a' link */
    color: #fff; /* Text color for spans without an 'a' link */
}

.pagination span a {
    display: block;
    width: 100%;
    height: 100%;
    border-radius: 0;
    font-family: sans-serif;
    text-decoration: none;
    color: #007bff; /* Added color for links */
}

.pagination span a:hover {
    /*color: #fff;*/
    background-color: #007bff;
    /*border-color: #007bff;*/
    z-index: 2;
    color: #0056b3;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}


.listing-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    border-radius:5px 5px 0 0;
}

.listing-image{
    width:100%;
    height:200px;
    overflow:hidden;
    border-radius:5px 5px 0 0;
    position:relative;
}

</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/allPropertyPage.css" />

  <main class="container">
    <!-- Mobile Filter section -->
    <div class="row d-lg-none">
      <div class="col-3 pr-0 d-flex">
        <div class="filter-icon search w-100 d-flex justify-content-between align-items-center" data-toggle="modal"
          data-target="#staticBackdrop">
          <img style="min-width: 1em;" class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/filter-icon.svg" alt="" />
          <span style="font-size: 0.9em;">Filter</span>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body filter-modal-body">
                <div>
                  <i class="fa-solid fa-xmark fa-3x" data-dismiss="modal"></i>
                </div>

                <h4 class="text-center font-weight-bolder">Filter</h4>
                <form>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1" style="font-weight: 600;">
                      City
                    </label>
                    <select class="form-control px-3 custom-form-control" id="exampleFormControlSelect1">
                      <option>Any</option>
                      <option>Lagos</option>
                      <option>Abuja</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1" style="font-weight: 600;">
                      Location
                    </label>
                    <select class="form-control px-3 custom-form-control" id="exampleFormControlSelect1">
                      <option>Any</option>
                      <option>Ikate</option>
                      <option>Ikosi</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1" style="font-weight: 600;">
                      Bedroom
                    </label>

                    <div class="btn-group btn-group-toggle custom-group-btn w-100" data-toggle="buttons">
                      <label class="btn">
                        <input type="radio" name="options" id="option1" checked />
                        Any
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option2" />
                        Studio
                      </label>
                      <label class="btn btn-outline-secondary custom-active">
                        <input type="radio" name="options" id="option3" />
                        1
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option3" />
                        2
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option3" />
                        3
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option3" />
                        4+
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1" style="font-weight: 600;">
                      Bathroom
                    </label>
                    <div class="btn-group btn-group-toggle custom-group-btn w-100" data-toggle="buttons">
                      <label class="btn">
                        <input type="radio" name="options" id="option1" checked />
                        Any
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option3" />
                        1
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option3" />
                        2
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option3" />
                        3
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option3" />
                        4+
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="">
                      <div class="row w-100 mt-3">
                        <div class="col-12">
                          <div class="form-group">
                            <label style="font-weight: 600;" for="formControlRange">
                              Price range
                            </label>
                            <input type="range" class="form-control-range" id="formControlRange" />
                          </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                          <p>
                            &#8358; 1
                            <small class="text-muted" style="font-size: 10px;">
                              /month
                            </small>
                          </p>
                          <p>
                            &#8358; 600k
                            <small class="text-muted" style="font-size: 10px;">
                              /month
                            </small>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1" style="font-weight: 600;">
                      Furniture
                    </label>
                    <div class="btn-group btn-group-toggle custom-group-btn w-100" data-toggle="buttons">
                      <label class="btn">
                        <input type="radio" name="options" id="option1" checked />
                        Any
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option3" />
                        Unfurnished
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option3" />
                        Furnished
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1" style="font-weight: 600;">
                      Availability
                    </label>
                    <select class="form-control px-3 custom-form-control" id="exampleFormControlSelect1">
                      <option>Any</option>
                      <option>available</option>
                      <option>not-available</option>
                    </select>
                  </div>
                </form>
              </div>
              <div class="show-result">
                <button>Show results</button>
              </div>
              <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Understood</button>
                </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-9">
        <div class="search w-100">
            <form method="POST" action="<?php echo base_url('rss/filter'); ?>">
                    <div class="row m-0">
                        <div class="col-10 search-left">
                            <i class="fa-solid fa-location-dot location-icon"></i>
                            <span class="">City..</span>
                            <input class="search-input" type="text" placeholder="which city would you like to live in?" />
                            <datalist role="listbox" id="cities">
                                <?php if (!empty($the_cities) && isset($the_cities)) { ?>
                                    <?php foreach ($the_cities as $the_city =>
                                        $each_city) { ?>
                                        <option value="<?php echo $each_city['city']; ?>"><?php echo $each_city['city']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-2 search-icon">
                            <button class="submit-container" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </form>
        </div>
      </div>
    </div>

    <!-- Desktop Filter section -->

    <form action="<?php echo base_url('rss/filter'); ?>" method="POST">

    <div class="row my-5 filter-section d-lg-flex d-none">
        
            <div class="col-12 d-md-flex flex-row justify-content-between desktop-filter">
                
        <div class="dropdown">
          <button class="btn  dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown"
            aria-expanded="false">
            City
          </button>
          <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
            <h5>City</h5>
            <div class="row w-100">
              <div class="col-md-4">
                  
                  <!--Manually Getting the selected Id from DB for Lagos & Abuja & using the data for Location display pass through Ajax-->
                <button class="btn city-btn btn-primary" data-city-id="2671">Lagos</button>
                <input type="hidden" name="state" value="2671">
              </div>
              <div class="col-md-4">
                <button class="btn city-btn btn-secondary" data-city-id="2648">Abuja</button>
                <input type="hidden" name="state" value="2648">
              </div>
              <div class="col-md-4"></div>
            </div>
          </div>
        </div>
        
        <div class="dropdown">
          <button class="btn  dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown"
            aria-expanded="false">
            location
          </button>
          <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
            <h5>Location</h5>
            <div class="row w-100" id="location-list">
                
                <!-- Data Population from get_location with Ajax call -->
                
            </div>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn  dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown"
            aria-expanded="false">
            Bedroom
          </button>
          <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
            <h5>Bedroom</h5>
            <div class="row w-100">
              <div class="col">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-primary active">
                    <input type="radio" name="bed_num" id="option1" value="any" checked />
                    Any
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="bed_num" id="option2" value="studio" />
                    Studio
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="bed_num" id="option3" value="1" />
                    1
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="bed_num" id="option3" value="2" />
                    2
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="bed_num" id="option3" value="3" />
                    3
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="bed_num" id="option3" value="4" />
                    4+
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn  dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown"
            aria-expanded="false">
            Bathroom
          </button>
          <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
            <h5>Bathroom</h5>
            <div class="row w-100">
              <div class="col">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-primary active">
                    <input type="radio" name="bath_num" id="option1" value="any" checked />
                    Any
                  </label>
                  <!--<label class="btn btn-outline-secondary">-->
                  <!--  <input type="radio" name="bath_num" id="option2" value="1" />-->
                  <!--  Studio-->
                  <!--</label>-->
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="bath_num" id="option3" value="1" />
                    1
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="bath_num" id="option3" value="2" />
                    2
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="bath_num" id="option3" value="3" />
                    3
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="bath_num" id="option3" value="4" />
                    4+
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn  dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown"
            aria-expanded="false">
            Furniture
          </button>
          <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
            <h5>Furniture</h5>
            <div class="row w-100">
              <div class="col">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-primary active">
                    <input type="radio" name="furnishing" id="option1" value="1" checked />
                    Any
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="furnishing" id="option2" value="0" />
                    unfurnished
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="furnishing" id="option3" value="2" />
                    furnished
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn  dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown"
            aria-expanded="false">
            Budget
          </button>
          <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
            <h5>Price range</h5>
            <div class="row w-100 mt-3">
              <div class="col-12">
                <div class="form-group">
                  <!-- <label for="formControlRange">Example Range input</label> -->
                  <input type="range" class="form-control-range" id="formControlRange slider3" />
                  <input type="hidden" class="price-range" name="priceRange" />
                </div>
              </div>
              <div class="col-12 d-flex justify-content-between">
                <p>&#8358; 10000/ month</p>
                <p>&#8358; 2000000/ month</p>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" id="" class="btn btn-primary show-result-btn">Show result</button>
      </div>
      
      </div>
    </form>




    <!-- Properties section -->
    <div class="properties-section">
      <div class="row">
        <div class="col-12">
          <p><?php echo $total_count ?> properties</p>
        </div>
        
        
        <?php if(isset($properties) && !empty($properties)){ ?>

        	    <?php foreach($properties as $property => $value){ ?>
        
        <div class="col-lg-4 col-md-6 col-12 my-4">

          <div class="card">
              <a style="text-decoration:none" href="<?php echo base_url(); ?>property/<?php echo $value['propertyID']; ?>">

            <div id="carouselExampleControls" class="carousel slide card-img-top listing-image" data-ride="carousel">
                <?php

                    $CI = &get_instance();

                    if (date('Y-m-d') <= $value['available_date']) {
                    
                        echo '<div class="availablility unavailable">Rented until: ' . date("M Y", strtotime($value['available_date'])) . '</div>';
        
                    } else {
        
                        echo '<div class="availablility available">Available: Now</div>';
        
                    }
        
                    ?>
                
              <div class="carousel-inner">
                  
                    <!-- Additional required wrapper -->
                        <!-- Slides -->
                        
                        <!--$dir ="<?php base_url(); ?>uploads/properties/<?php echo $value['imageFolder'] . "/" . $value['featuredImg'] ?>";-->
                        
                        
                        <?php 
                        
                            $mobile_images = '';
                            $dir ='base_url()./uploads/properties/'.$value['imageFolder'].'/'. $value['featuredImg'];

                            
                            // $dir = './uploads/properties/'.$value['imageFolder'].'/';

        				// 	$dir = 'base_url()./uploads/properties/'.$value['imageFolder']."/".$value['featuredImg'];
        
        					if (file_exists($dir) == false) {
        
        				// 		echo 'Directory \'', $dir, '\' not found!'; 
        						
        						 echo 'Directory \'', $dir, '\' not found!'; 

        
        					} else {
        
        						$dir_contents = scandir($dir); 
        
        						$count = 0;
        																
        						$content_size = count($dir_contents);
        						    
        						$files = array();
        
        						foreach ($dir_contents as $file) {
        
        							//$file_type = strtolower(end(explode('.', $file)));
        
        							if ( $file !== '.' && $file !== '..'&& $count <= ($content_size - 2) ){ 
        							    
        							    
        				// 	echo '<div class="carousel-item active">
            //       <img src="'.base_url().''.$dir.''.$file.'" class="d-block w-100" alt="RSS property image" />
            //     </div>';
                
                        							    
        					echo '<div class="carousel-item active">
                  <img src="'.$file.'" class="d-block w-100" alt="RSS property image" />
                </div>';		    

        					
        				// 	echo '<div class="carousel-item">
            //       <img src="'.base_url().''.$dir.''.$file.'" class="d-block w-100" alt="RSS property image" />
            //     </div>';		
        						
        							}  
        							$count++;
        
        						}
        
        					}
        
        				?>
              </div>
              <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </button>
            </div>
            <div class="card-body">
              <p class="card-text">
                &#8358;<?php echo ($value['price'] > 999999) ? ($value['price'] / 1000000) . 'M' : number_format($value['price']); ?>/month&nbsp;&nbsp;
                <small style="
                      text-decoration: line-through;
                      text-decoration-color: #007dc1;
                      text-decoration-thickness: 3px;
                    ">
                  &#8358;<?php $annual_price = $value['price'] * 12; echo ($annual_price > 999999) ? number_format($annual_price / 1000000) . 'M' : number_format($annual_price); ?>/year
                </small>

              </p>
              <p class="card-text"><?php echo $value['address'] . ", " . $value['city']; ?></p>
              <div class="card-text d-flex justify-content-between">
                <p>
                    &bull;<?php echo $value['bed']; ?> Bed 
                    &bull;<?php echo $value['bath'];?> Bath 
                    &bull;<?php echo ($value['state'] == 2671) ? 'Lagos': 'Abuja';?>
                    </p>
                <a href="#" class="text-decoration-none">
                  <div class="d-flex flex-column  align-items-center">
                    <img class="img-fluid" style="width: 15px" src="../assets/images/share-icon.svg" alt="">
                    <span style="font-size: 10px" class="primary-text-color-alt">share</span>
                  </div>
                </a>

              </div>
            </div>
            </a>
          </div>
          
          
        </div>
        
        <?php } ?>
    
    <!--Pagination -->
    <div class="pagination-section my-5">
      <div class="row">
        <div class="col-12">
          <nav aria-label="Page navigation example" class="d-flex d-md-block justify-content-center">
            <ul class="pagination">
                <?php echo $this->pagination->create_links(); ?>
            </ul>
          </nav>
        </div>
        <div class="col-12 d-md-none text-center">
          <p><?php echo $this->pagination->create_links(); ?> listings</p>
        </div>
      </div>
    </div>
    
</div>
   						
    	<?php }else{ ?><div style="width:100%;padding:15px 0;font-family:gotham-medium;color:#414042">No results matching your search</div>

    	<?php } ?>
        
      </div>
    </div>

  </main>
  
  <div class="dropdown">
  <button class="btn dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown" aria-expanded="false">
    City
  </button>
  <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
    <h5>City</h5>
    <div class="row w-100">
      <div class="col-md-4">
        <button class="btn city-btn btn-primary" data-city-id="2671" type="button" data-city-id="2671">Lagos</button>
        <input type="hidden" name="state" value="2671">
      </div>
      <div class="col-md-4">
        <button class="btn city-btn btn-secondary" data-city-id="2648" type="button" data-city-id="2648">Abuja</button>
        <input type="hidden" name="state" value="2648">
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
</div>
  
   <script>
  const cityDropdownBtns = document.querySelectorAll('.dropdown-menu:first-of-type .city-btn');
 
  
  const locationList = document.querySelector('#location-list');

  cityDropdownBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      const cityId = e.target.dataset.cityId;
      console.log("Selected cityId: ", cityId);

      // Make AJAX request to the controller
      const xhr = new XMLHttpRequest();
      const url = '<?php echo base_url('rss/get_locations'); ?>';
      const params = 'city_id=' + encodeURIComponent(cityId);
      xhr.open('GET', url + '?' + params, true);

      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          console.log(response);
          // Process the response data
          locationList.innerHTML = ''; // Clear previous locations
          response.forEach((location,  index) => {
            const locationBtn = document.createElement('button');
            locationBtn.classList.add('btn', 'city-btn');
                
            locationBtn.style.display = 'inline-block';
            locationBtn.style.width = '110px';
            locationBtn.textContent = location.name;
            
            // Add primary style to the first element
            if (index === 0) {
              locationBtn.classList.add('btn-primary');
            } else { // Add secondary style to the other elements
              locationBtn.classList.add('btn-outline-secondary');
            }
            
            const buttonWrapper = document.createElement('div');
            buttonWrapper.classList.add('col-md-4', 'mb-2', 'location-item');
            buttonWrapper.appendChild(locationBtn);
  
            locationList.appendChild(buttonWrapper);
            
          });
        }
      };

      xhr.send();
    });
  });
</script>


<!------ Mobile search pane ------->

<!--<script src="<?php echo base_url(); ?>assets/js/props-country-picker.js"></script>-->

<!--<script src="<?php echo base_url(); ?>assets/js/property-search.js"></script>-->

<!--<script src="<?php echo base_url(); ?>assets/range-slide/js/rSlider.min.js"></script>-->

<script>
//     (function() {

//         'use strict';

//         var init = function() {

//             var slider3 = new rSlider({

//                 target: '#slider3',

//                 values: {
//                     min: 10000,
//                     max: 2000000
//                 },

//                 step: 10000,

//                 range: true,

//                 set: [30000, 700000],

//                 scale: true,

//                 labels: false,

//                 onChange: function(vals) {

//                     console.log(vals);

//                     //Insert into field here

//                     $('.price-range').val(vals);

//                 }

//             });

//             var slider4 = new rSlider({

//                 target: '#slider4',

//                 values: {
//                     min: 10000,
//                     max: 2000000
//                 },

//                 step: 10000,

//                 range: true,

//                 set: [30000, 700000],

//                 scale: true,

//                 labels: false,

//                 onChange: function(valses) {

//                     console.log(valses);

//                     //Insert into field here

//                     $('.price-range').val(vals);

//                 }

//             });

//         };

//         window.onload = init;

//     })();
</script>

