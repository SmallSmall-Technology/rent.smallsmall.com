<!-- MAIN SECTION -->

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
                <button class="btn city-btn btn-primary" data-city-id="2671">Lagos</button>
              </div>
              <div class="col-md-4">
                <button class="btn city-btn btn-secondary" data-city-id="2648">Abuja</button>
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
            <?php
//   $city_id = isset($locations['name']) ? $locations['name'] : null;
//   echo "Selected city_id: " . $state_ids . "<br>";
//   print_r($_GET);
?>
            <div class="row w-130" id="location-list">
                
                  <!--<?php if (isset($the_cities) && !empty($the_cities)) { ?>-->
                  
                  <!--  <?php foreach ($the_cities as $the_city => $each_city) { ?>-->
                    
                  <!--  <?php if ($each_city['state_id'] == 2671) { ?>-->

                        <!--<div class="col-md-4 mb-2 location-item">-->
                             
                        <!--<button class="btn city-btn btn-primary" data-city-id="<?php echo $each_city['state_id']; ?>" style="display:inline-block; width: 110px;"><?php echo $each_city['city']; ?>-->
                        <!--</button>-->
                        
                        <!--</div>-->
                        
                       <!-- <?php } elseif($each_city['state_id'] == 2671) { ?>-->
                        
                       <!-- <div class="col-md-4 mb-2 location-item">-->
                    
                       <!-- <button class="btn city-btn btn-outline-secondary" data-city-id="<?php echo $each_city['state_id']; ?>" style="display:inline-block; width: 110px;"><?php echo $each_city['city']; ?>-->
                       <!-- </button>-->
                        
                       <!-- </div>-->
                        
                       <!--<?php } ?>-->

                  <!--  <?php } ?>-->
                  <!--<?php } ?>-->
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
            
            // locationList.appendChild(locationBtn);
          });
        }
      };

      xhr.send();
    });
  });
</script>
<script>
//   const cityDropdownBtns = document.querySelectorAll('.dropdown-menu:first-of-type .city-btn');
//   const locationList = document.querySelector('#location-list');

//   cityDropdownBtns.forEach((btn) => {
//     btn.addEventListener('click', (e) => {
//       const cityId = e.target.dataset.cityId;
//       console.log("Selected cityId: ", cityId);

//       // Make AJAX request to the controller
//       const xhr = new XMLHttpRequest();
//       const url = '<?php echo base_url('rss/get_locations'); ?>';
//       const params = 'city_id=' + encodeURIComponent(cityId);
//       xhr.open('GET', url + '?' + params, true);

//       xhr.onreadystatechange = function() {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//           const response = JSON.parse(xhr.responseText);
//           console.log(response);
//           // Process the response data
//           locationList.innerHTML = ''; // Clear previous locations
//           response.forEach((location, index) => {
//             const locationBtn = document.createElement('button');
//             locationBtn.classList.add('btn', 'city-btn');
//             locationBtn.style.display = 'inline-block';
//             locationBtn.style.width = '110px';
//             locationBtn.textContent = location.name;

//             // Add primary style to the first element
//             if (index === 0) {
//               locationBtn.classList.add('btn-primary');
//             } else { // Add secondary style to the other elements
//               locationBtn.classList.add('btn-outline-secondary');
//             }

//             const buttonWrapper = document.createElement('div');
//             buttonWrapper.classList.add('col-md-4', 'mb-2', 'location-item');
//             buttonWrapper.appendChild(locationBtn);

//             locationList.appendChild(buttonWrapper);
//           });
//         }
//       };

//       xhr.send();
//     });
//   });
</script>


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
                    <input type="radio" name="options" id="option1" checked />
                    Any
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="options" id="option2" />
                    Studio
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
                    <input type="radio" name="options" id="option1" checked />
                    Any
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="options" id="option2" />
                    Studio
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
                    <input type="radio" name="options" id="option1" checked />
                    Any
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="options" id="option2" />
                    unfurnished
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="options" id="option3" />
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
                  <input type="range" class="form-control-range" id="formControlRange" />
                </div>
              </div>
              <div class="col-12 d-flex justify-content-between">
                <p>&#8358; 1/ month</p>
                <p>&#8358; 600k/ month</p>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-primary show-result-btn">Show result</button>
      </div>
    </div>

    <!-- Properties section -->
    
    <div class="properties-section">
        
      <div class="row">
        <div class="col-12">
          <p>302 properties</p>
        </div>
        

        
<!--        <div class="col-lg-4 col-md-6 col-12 my-4">-->
            
<!--        <?php if (isset($properties) && !empty($properties)) { ?>-->

<!--            <?php foreach ($properties as $property => $value) { ?>-->

            
<!--          <div class="card">-->
              
<!--              <a style="text-decoration:none" href="<?php echo base_url(); ?>property/<?php echo $value['propertyID']; ?>">-->
                  
<!--            <img src="<?php echo base_url(); ?>uploads/properties/<?php echo $value['imageFolder']."/".$value['featuredImg'] ?>" alt="RSS property image">-->

             <!--<img src="../assets/images/prop1.png" class="card-img-top" alt="..." /> -->
            
<!--            <div id="carouselExampleControls" class="carousel slide card-img-top" data-ride="carousel">-->
                
                
<!--                <?php-->

<!--                    $CI = &get_instance();-->

<!--        if (date('Y-m-d') <= $value['available_date']) {-->
                    
<!--        echo '<div class="availablility unavailable">Rented until: ' . date("M Y", strtotime($value['available_date'])) . '</div>';-->
        
<!--        } else {-->
        
<!--        echo '<div class="availablility available">Available: Now</div>';-->
        
<!--        }-->
        
<!--        ?>-->
        
<!--              <div class="carousel-inner">-->
<!--                <div class="carousel-item active">-->
<!--                <img src="<?php echo base_url(); ?>uploads/properties/<?php echo $value['imageFolder'] . "/" . $value['featuredImg'] ?>" alt="RSS property image">-->
                  <!--<img src="<?php echo base_url(); ?>assets/updated-assets/images/prop1.png" class="d-block w-100" alt="..." />-->
<!--                </div>-->
                
                <!--<div class="carousel-item">-->
                <!--  <img src="<?php echo base_url(); ?>assets/updated-assets/images/prop2.png" class="d-block w-100" alt="..." />-->
                <!--</div>-->
                <!--<div class="carousel-item">-->
                <!--  <img src="<?php echo base_url(); ?>assets/updated-assets/images/prop1.png" class="d-block w-100" alt="..." />-->
                <!--</div>-->
<!--              </div>-->
              
<!--              <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"-->
<!--                data-slide="prev">-->
<!--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--                <span class="sr-only">Previous</span>-->
<!--              </button>-->
              
<!--              <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"-->
<!--                data-slide="next">-->
<!--                <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--                <span class="sr-only">Next</span>-->
<!--              </button>-->
<!--            </div>-->
            
            
            
<!--            <div class="card-body">-->
<!--              <p class="card-text">-->
<!--                &#8358;<?php echo ($value['price'] > 999999) ? ($value['price'] / 1000000) . 'M' : number_format($value['price']); ?>/month&nbsp;&nbsp;-->
<!--                <small style="-->
<!--                      text-decoration: line-through;-->
<!--                      text-decoration-color: #007dc1;-->
<!--                      text-decoration-thickness: 3px;-->
<!--                    ">-->
<!--                  &#8358;<?php $annual_price = $value['price'] * 12; echo ($annual_price > 999999) ? number_format($annual_price / 1000000) . 'M' : number_format($annual_price); ?>/year-->
<!--                </small>-->

<!--              </p>-->
<!--              <p class="card-text"><?php echo $value['address'] . ", " . $value['city']; ?></p>-->
              
<!--              <div class="card-text d-flex justify-content-between">-->
<!--                <p>&bull;<?php echo $value['bed']; ?> Bed &bull; <?php echo $value['bath']; ?> Bath &bull; Lagos</p>-->
                
<!--                <a href="#" class="text-decoration-none">-->
<!--                  <div class="d-flex flex-column  align-items-center">-->
<!--                    <img class="img-fluid" style="width: 15px" src="<?php echo base_url(); ?>assets/updated-assets/images/share-icon.svg" alt="">-->
<!--                    <span style="font-size: 10px" class="primary-text-color-alt">share</span>-->
<!--                  </div>-->
<!--                </a>-->

<!--              </div>-->
<!--            </div>-->
            
<!--                        </a>-->
                        
                        
<!--<?php } ?>-->
                      
                          <!-- Pagination -->
<!--    <div class="pagination-section my-5">-->
<!--      <div class="row">-->
<!--        <div class="col-12">-->
            
<!--            <?php echo $this->pagination->create_links(); ?>-->

          <!--<nav aria-label="Page navigation example" class="d-flex d-md-block justify-content-center">-->
          <!--  <ul class="pagination">-->
          <!--    <li class="page-item">-->
          <!--      <a class="page-link" href="#" aria-label="Previous">-->
          <!--        <span aria-hidden="true">&laquo;</span>-->
          <!--      </a>-->
          <!--    </li>-->
              <!--<li class="page-item active">-->
              <!--  <a class="page-link" href="#">1</a>-->
              <!--</li>-->
              <!--<li class="page-item"><a class="page-link" href="#">2</a></li>-->
              <!--<li class="page-item"><a class="page-link" href="#">3</a></li>-->
              <!--<li class="page-item">-->
              <!--  <a class="page-link" href="#" aria-label="Next">-->
              <!--    <span aria-hidden="true">&raquo;</span>-->
              <!--  </a>-->
              <!--</li>-->
          <!--  </ul>-->
          <!--</nav>-->
<!--        </div>-->
        <!--<div class="col-12 d-md-none text-center">-->
        <!--  <p>1 - 10 of 200 listings</p>-->
        <!--</div>-->
<!--      </div>-->
<!--    </div>-->

                      
                        <!--<div class="pagination">-->

                        <!--<?php echo $this->pagination->create_links(); ?>-->

                        <!--</div> -->

 
        
<!--        <?php } else { ?>-->
        
        
<!--        <div style="width:100%;padding:15px 0;font-family:gotham-medium;color:#414042">No results matching your search</div>-->
        
<!--        <?php } ?>-->
<!--          </div>-->
          


<!--        </div>-->
        
        
        <!--<div class=" col-lg-4 col-md-6 col-12 my-4">-->
        <!--  <div class="card">-->

        <!--     <img src="../assets/images/prop1.png" class="card-img-top" alt="..." /> -->
        <!--    <div id="carouselExampleControls2" class="carousel slide card-img-top" data-ride="carousel">-->
        <!--      <div class="availablility available">-->
        <!--        Available: Now-->
        <!--      </div>-->
        <!--      <div class="carousel-inner">-->
        <!--        <div class="carousel-item active">-->
        <!--          <img src="<?php echo base_url(); ?>assets/updated-assets/images/prop1.png" class="d-block w-100" alt="..." />-->
        <!--        </div>-->
        <!--        <div class="carousel-item">-->
        <!--          <img src="<?php echo base_url(); ?>assets/updated-assets/images/prop2.png" class="d-block w-100" alt="..." />-->
        <!--        </div>-->
        <!--        <div class="carousel-item">-->
        <!--          <img src="<?php echo base_url(); ?>assets/updated-assets/images/prop1.png" class="d-block w-100" alt="..." />-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls2"-->
        <!--        data-slide="prev">-->
        <!--        <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
        <!--        <span class="sr-only">Previous</span>-->
        <!--      </button>-->
        <!--      <button class="carousel-control-next" type="button" data-target="#carouselExampleControls2"-->
        <!--        data-slide="next">-->
        <!--        <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
        <!--        <span class="sr-only">Next</span>-->
        <!--      </button>-->
        <!--    </div>-->
        <!--    <div class="card-body">-->
        <!--      <p class="card-text">-->
        <!--        &#8358;87,000/month&nbsp;&nbsp;-->
        <!--        <small style="-->
        <!--              text-decoration: line-through;-->
        <!--              text-decoration-color: #007dc1;-->
        <!--              text-decoration-thickness: 3px;-->
        <!--            ">-->
        <!--          &#8358;150,000/year-->
        <!--        </small>-->

        <!--      </p>-->
        <!--      <p class="card-text">Fola Osibo Phase 1, Lekki</p>-->
        <!--      <div class="card-text d-flex justify-content-between">-->
        <!--        <p>1 Bed . 1 Bath . Lagos</p>-->
        <!--        <a href="#" class="text-decoration-none">-->
        <!--          <div class="d-flex flex-column  align-items-center">-->
        <!--            <img class="img-fluid" style="width: 15px" src="<?php echo base_url(); ?>assets/updated-assets/images/share-icon.svg" alt="">-->
        <!--            <span style="font-size: 10px" class="primary-text-color-alt">share</span>-->
        <!--          </div>-->
        <!--        </a>-->

        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        <!--<div class="col-lg-4 col-md-6 col-12 my-4">-->
        <!--  <div class="card">-->

        <!--     <img src="../assets/images/prop1.png" class="card-img-top" alt="..." /> -->
        <!--    <div id="carouselExampleControls3" class="carousel slide card-img-top" data-ride="carousel">-->
        <!--      <div class="availablility available">-->
        <!--        Available: Now-->
        <!--      </div>-->
        <!--      <div class="carousel-inner">-->
        <!--        <div class="carousel-item active">-->
        <!--          <img src="<?php echo base_url(); ?>assets/updated-assets/images/prop1.png" class="d-block w-100" alt="..." />-->
        <!--        </div>-->
        <!--        <div class="carousel-item">-->
        <!--          <img src="<?php echo base_url(); ?>assets/updated-assets/images/prop2.png" class="d-block w-100" alt="..." />-->
        <!--        </div>-->
        <!--        <div class="carousel-item">-->
        <!--          <img src="<?php echo base_url(); ?>assets/updated-assets/images/prop1.png" class="d-block w-100" alt="..." />-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls3"-->
        <!--        data-slide="prev">-->
        <!--        <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
        <!--        <span class="sr-only">Previous</span>-->
        <!--      </button>-->
        <!--      <button class="carousel-control-next" type="button" data-target="#carouselExampleControls3"-->
        <!--        data-slide="next">-->
        <!--        <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
        <!--        <span class="sr-only">Next</span>-->
        <!--      </button>-->
        <!--    </div>-->
        <!--    <div class="card-body">-->
        <!--      <p class="card-text">-->
        <!--        &#8358;87,000/month&nbsp;&nbsp;-->
        <!--        <small style="-->
        <!--              text-decoration: line-through;-->
        <!--              text-decoration-color: #007dc1;-->
        <!--              text-decoration-thickness: 3px;-->
        <!--            ">-->
        <!--          &#8358;150,000/year-->
        <!--        </small>-->

        <!--      </p>-->
        <!--      <p class="card-text">Fola Osibo Phase 1, Lekki</p>-->
        <!--      <div class="card-text d-flex justify-content-between">-->
        <!--        <p>1 Bed . 1 Bath . Lagos</p>-->
        <!--        <a href="#" class="text-decoration-none">-->
        <!--          <div class="d-flex flex-column  align-items-center">-->
        <!--            <img class="img-fluid" style="width: 15px" src="<?php echo base_url(); ?>assets/updated-assets/images/share-icon.svg" alt="">-->
        <!--            <span style="font-size: 10px" class="primary-text-color-alt">share</span>-->
        <!--          </div>-->
        <!--        </a>-->

        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        
        
        
        
        
            

        
      </div>
      
      
      
    </div>

    <!-- Pagination -->
    <!--<div class="pagination-section my-5">-->
    <!--  <div class="row">-->
    <!--    <div class="col-12">-->
    <!--      <nav aria-label="Page navigation example" class="d-flex d-md-block justify-content-center">-->
    <!--        <ul class="pagination">-->
    <!--          <li class="page-item">-->
    <!--            <a class="page-link" href="#" aria-label="Previous">-->
    <!--              <span aria-hidden="true">&laquo;</span>-->
    <!--            </a>-->
    <!--          </li>-->
    <!--          <li class="page-item active">-->
    <!--            <a class="page-link" href="#">1</a>-->
    <!--          </li>-->
    <!--          <li class="page-item"><a class="page-link" href="#">2</a></li>-->
    <!--          <li class="page-item"><a class="page-link" href="#">3</a></li>-->
    <!--          <li class="page-item">-->
    <!--            <a class="page-link" href="#" aria-label="Next">-->
    <!--              <span aria-hidden="true">&raquo;</span>-->
    <!--            </a>-->
    <!--          </li>-->
    <!--        </ul>-->
    <!--      </nav>-->
    <!--    </div>-->
    <!--    <div class="col-12 d-md-none text-center">-->
    <!--      <p>1 - 10 of 200 listings</p>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    
    
    
  </main>
  
  <!--  <script>-->
  <!--  $(document).ready(function() {-->
  <!--    $('.city-btn').click(function() {-->
  <!--      // remove active class from all buttons-->
  <!--      $('.city-btn').removeClass('active-btn-custom');-->

  <!--      // add active class to the clicked button-->
  <!--      $(this).addClass('active-btn-custom');-->
  <!--    });-->
  <!--  });-->
  <!--</script>-->

