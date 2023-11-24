<?php

function shortenText($text, $maxLength)
{
  if (strlen($text) > $maxLength) {
    $shortenedText = substr($text, 0, $maxLength) . '...';
    return $shortenedText;
  } else {
    return $text;
  }
}

?>


<!-- MAIN SECTION -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/allproperty.css" />

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/allPropertyPage.css" />

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/range-slide/css/rSlider.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/range-slide/js/rSlider.min.js" type="application/javascript"></script>

<main class="container">
  <!-- Mobile Filter section -->
  <div class="row d-lg-none">
    <div class="col-3 pr-0 d-flex">
      <div class="filter-icon search w-100 d-flex justify-content-between align-items-center" data-toggle="modal" data-target="#staticBackdrop">
        <img style="min-width: 1em;" class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/filter-icon.svg" alt="" />
        <span style="font-size: 0.9em;">Filter</span>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body filter-modal-body">
              <div>
                <i class="fa-solid fa-xmark fa-3x" data-dismiss="modal"></i>
              </div>

              <h4 class="text-center font-weight-bolder">Filter</h4>
              <form action="<?php echo base_url('rss/filter'); ?>" method="POST">
                <div class="form-group">
                  <label for="exampleFormControlSelect1" style="font-weight: 600;">
                    City
                  </label>
                  <select name="state" class="form-control px-3 custom-form-control state" id="exampleFormControlSelect1">
                    <option selected value="any">Any</option>
                    <?php if (!empty($available_states) && isset($available_states)) { ?>
                      <?php foreach ($available_states as $the_state => $each_state) { ?>
                        <option value="<?php echo $each_state['state_id']; ?>"><?php echo $each_state['name']; ?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1" style="font-weight: 600;">
                    Location
                  </label>
                  <select name="city" class="form-control px-3 custom-form-control standard-select city" id="exampleFormControlSelect1">
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1" style="font-weight: 600;">
                    Bedroom
                  </label>

                  <div class="btn-group btn-group-toggle custom-group-btn w-100" data-toggle="buttons">
                    <label class="btn">
                      <span id="any" class="">Any</span>
                    </label>
                    <label class="btn btn-outline-secondary">
                      <span id="studio" class="">Studio</span>
                    </label>
                    <label class="btn btn-outline-secondary custom-active">
                      <span id="1" class="">1</span>
                    </label>
                    <label class="btn btn-outline-secondary">
                      <span id="2" class="">2</span>
                    </label>
                    <label class="btn btn-outline-secondary">
                      <span id="3" class="">3</span>
                    </label>
                    <label class="btn btn-outline-secondary">
                      <span id="4" class="">4+</span>
                    </label>

                  </div>
                  <input type="hidden" class="bed_num" name="bed_num" value="" />

                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1" style="font-weight: 600;">
                    Bathroom
                  </label>
                  <div class="btn-group btn-group-toggle custom-group-btn w-100" data-toggle="buttons">
                    <label class="btn">
                      <span id="any" class="">Any</span>
                    </label>
                    <label class="btn btn-outline-secondary">
                      <span id="1" class="">1</span>
                    </label>
                    <label class="btn btn-outline-secondary">
                      <span id="2" class="">2</span>
                    </label>
                    <label class="btn btn-outline-secondary">
                      <span id="3" class="">3</span>
                    </label>
                    <label class="btn btn-outline-secondary">
                      <span id="4" class="bath-option-item">4+</span>
                    </label>
                  </div>
                  <input type="hidden" class="bath_num" name="bath_num" value="" />
                </div>

                <!--<div class="form-group">-->
                <!--  <div class="">-->
                <!--    <div class="row w-100 mt-3">-->
                <!--      <div class="col-12">-->
                <!--        <div class="form-group">-->
                <!--          <label style="font-weight: 600;" for="formControlRange">-->
                <!--            Price range-->
                <!--          </label>-->


                <!--          <input type="text" id="mobileSlider" class="slider" style="display:none;"/>-->

                <!--          <input type="hidden" class="price-range" name="priceRange" />-->

                <!--        </div>-->
                <!--      </div>-->
                <!--      <div class="col-12 d-flex justify-content-between">-->
                <!--        <p>-->
                <!--          &#8358; 10000-->
                <!--          <small class="text-muted" style="font-size: 10px;">-->
                <!--            /month-->
                <!--          </small>-->
                <!--        </p>-->
                <!--        <p>-->
                <!--          &#8358; 2000000-->
                <!--          <small class="text-muted" style="font-size: 10px;">-->
                <!--            /month-->
                <!--          </small>-->
                <!--        </p>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->

                <div class="form-group">
                  <div class="">
                    <div class="row w-100 mt-3">
                      <div class="col-12">
                        <div class="form-group ">
                          <label style="font-weight: 600;" for="formControlRange">
                            Price range
                          </label>

                          <div class="slider-container">

                            <input type="text" id="mobileSlider" class="slider" />

                            <input type="hidden" class="price-range" name="priceRange" />

                          </div>
                          <!--<input type="range" class="form-control-range" id="formControlRange" />-->
                        </div>
                      </div>
                      <!--<div class="col-12 d-flex justify-content-between">-->
                      <!--  <p>-->
                      <!--    &#8358; 10000-->
                      <!--    <small class="text-muted" style="font-size: 10px;">-->
                      <!--      /month-->
                      <!--    </small>-->
                      <!--  </p>-->
                      <!--  <p>-->
                      <!--    &#8358; 2000000-->
                      <!--    <small class="text-muted" style="font-size: 10px;">-->
                      <!--      /month-->
                      <!--    </small>-->
                      <!--  </p>-->
                      <!--</div>-->
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="exampleFormControlSelect1" style="font-weight: 600;">
                    Furniture
                  </label>
                  <div class="btn-group btn-group-toggle custom-group-btn w-100" data-toggle="buttons">
                    <label class="btn">
                      <span id="1" class="">Any</span>
                    </label>
                    <label class="btn btn-outline-secondary">
                      <span id="0" class="">Unfurnished</span>
                    </label>
                    <label class="btn btn-outline-secondary">
                      <span id="2" class="">Furnished</span>
                    </label>
                  </div>
                  <input type="hidden" class="furnishing" name="furnishing" value="" />
                </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect1" style="font-weight: 600;">
                    Availability
                  </label>
                  <select name="availability_val" class="form-control px-3 custom-form-control" id="exampleFormControlSelect1">
                    <option value="Now">Now</option>
                    <option value="1">Next 1 Month</option>
                    <option value="6">Next 6 Months</option>
                    <option value="9">Next 9 Months</option>
                  </select>
                </div>

                <div class="show-result">
                  <button type="submit" id="" class="">Show results</button>
                </div>
              </form>
            </div>

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

  <!--<form action="<?php echo base_url('rss/filter'); ?>" method="POST">-->
  <!--<form id="#">-->
  <!--<div id="filter-section-container">-->
  <div class="row my-5 filter-section d-lg-flex d-none">

    <div class="col-12 d-md-flex flex-row justify-content-between desktop-filter" id="filter-section-container">

      <div class="dropdown">
        <button class="btn  dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown" aria-expanded="false">
          City
        </button>
        <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
          <h5>City</h5>
          <div class="row w-100">
            <div class="col-md-4">

              <!--Manually Getting the selected Id from DB for Lagos & Abuja & using the data for Location display pass through Ajax-->
              <button class="btn city-btn btn-primary" data-city-id="2671">Lagos
                <!--<?php if (!empty($available_states) && isset($available_states)) { ?>-->
                <!--                        <?php foreach ($available_states as $the_state => $each_state) { ?>-->
                <!--                                <?php echo $each_state['name']; ?>-->
                <!--                        <?php } ?>-->
                <!--                    <?php } ?>-->
              </button>
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
        <button class="btn  dropdown-toggle py-2 filter-btn web-load" type="button" data-toggle="dropdown" aria-expanded="false">
          location
        </button>
        <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
          <h5>Location</h5>
          <div name="city" class="row w-100 city" id="location-list">

            <!-- Data Population from get_location with Ajax call -->
          </div>
          <input type="hidden" name="city" value="anny">

        </div>
      </div>
      <div class="dropdown">
        <button class="btn  dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown" aria-expanded="false">
          Bedroom
        </button>
        <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
          <h5>Bedroom</h5>
          <div class="row w-100">
            <div class="col">
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary active">
                  <input type="radio" name="bed_num" id="option1" value="" checked />
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
        <button class="btn  dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown" aria-expanded="false">
          Bathroom
        </button>
        <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
          <h5>Bathroom</h5>
          <div class="row w-100">
            <div class="col">
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary active">
                  <input type="radio" name="bath_num" id="option1" value="" checked />
                  Any
                </label>
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
        <button class="btn  dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown" aria-expanded="false">
          Furniture
        </button>
        <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
          <h5>Furniture</h5>
          <div class="row w-100">
            <div class="col">
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary active">
                  <input type="radio" name="furnishing" id="option1" value="" checked />
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

      <!--   <div class="dropdown">-->
      <!--  <button class="btn dropdown-toggle py-2 filter-btn" type="button" data-toggle="dropdown" aria-expanded="false">-->
      <!--    Budget-->
      <!--  </button>-->
      <!--  <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">-->
      <!--    <h5>Price range</h5>-->
      <!--    <div class="row w-100 mt-3">-->
      <!--      <div class="col-12">-->

      <!--        <div class="form-group">-->
      <!--              <input type="text" id="slider" class="slider" style="display: none;"/>-->

      <!--              <input type="hidden" class="price-range" name="priceRange" />-->
      <!--        </div>-->


      <!--      </div>-->
      <!--      <div class="col-12 d-flex justify-content-between">-->
      <!--        <p>&#8358; 10,000/ month</p>-->
      <!--        <p>&#8358; 2,000,000/ month</p>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->

      <div class="dropdown">
        <button class="btn dropdown-toggle py-2 filter-btn budget" type="button" data-toggle="dropdown" aria-expanded="false">
          Budget
        </button>
        <div class="dropdown-menu p-3 mt-3 filter-section-dropdown">
          <h5>Price range</h5>
          <div class="row w-100 mt-3">
            <div class="col-12">
              <div class="form-group slider-container">
                <input type="text" id="slider" class="slider" />
                <input type="hidden" class="price-range" name="priceRange" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <button type="submit" id="" class="btn btn-primary show-result-btn">Show result</button>
    </div>

  </div>

  <!--</div>-->
  <!--</form>-->


  <!-- Properties section -->

  <div class="properties-section" id="properties-container">
    <div class="row">

      <div class="col-12">
        <?php

        $cities = array_unique(array_column($properties, 'city'));

        if (count($cities) > 2) {

          echo '<p><h4>Location</h4></p>';
        } elseif (count($cities) === 2) {

          if (in_array('Lekki', $cities)) {

            echo '<p><h4>Lekki</h4></p>';
          } else {

            foreach ($cities as $city) :
        ?>
              <p>
              <h4><?php echo $city; ?></h4>
              </p>
            <?php
            endforeach;
          }
        } else {

          foreach ($cities as $city) :
            ?>
            <p>
            <h4><?php echo $city; ?></h4>
            </p>
        <?php
          endforeach;
        }

        ?>

      </div>

      <div class="col-12">
        <p><?php echo $total_count ?> properties</p>
      </div>


      <?php if (isset($properties) && !empty($properties)) { ?>

        <?php foreach ($properties as $property => $value) { ?>

          <div class="col-lg-4 col-md-6 col-12 my-4">

            <div class="card card-custom" > 
              <!-- id="properties-container" -->

              <a style="text-decoration:none" href="<?php echo base_url(); ?>property/<?php echo $value['propertyID']; ?>">

              <div id="carouselExampleControls-<?php echo $value['propertyID']; ?>" class="carousel slide card-img-top"  data-ride="carousel">

                  <!-- <div id="carouselExampleControls-<?php echo $value['propertyID']; ?>" class="carousel slide card-img-top listing-image" data-ride="carousel"> -->

                  <?php
                  $CI = &get_instance();

                  if(date('Y-m-d') <= $value['available_date']) {

                    echo '<div class="availablility unavailable d-flex">';

                    echo '<img src="' . base_url() . 'assets/updated-assets/images/time-delete.svg"  alt="">';

                    echo '<span class="ml-2">Rented until: ' . date("M Y", strtotime($value['available_date'])) . '</span>';

                    echo '</div>';
                  } else {

                    echo '<div class="availablility available">';

                    echo '<img src="' . base_url() . 'assets/updated-assets/images/check-circle.svg" alt="">';

                    echo '<span class="ml-1">Available: Now</span>';

                    echo '</div>';
                  }
                  ?>

                  <!-- <div class="carousel-inner listing-image"> -->
                  <div class="carousel-inner listing-image">

                    <?php

                    // Include AWS SDK and create S3 client
                      require 'vendor/autoload.php';
                      $s3 = new Aws\S3\S3Client([
                          'version' => 'latest',
                          'region' => 'eu-west-1'
                      ]);

                    $imageFolder = $value['imageFolder'];

                  //S3 Integration

                  $bucket = 'dev-rss-uploads'; // Your bucket name

                  $imageFolderPath = 'uploads/properties/' . $value['imageFolder'];
                  
                  try {
                      $objects = $s3->listObjects([
                          'Bucket' => $bucket,
                          'Prefix' => $imageFolderPath,
                      ]);
                  
                      $activeClass = 'active';

                      $content_size = count($objects['Contents']);

                      $count = 0;

                    //   foreach ($objects['Contents'] as $object) {
                    //     if ($object !== '.' && $object !== '..' && $count <= ($content_size - 2)) {
                    //         $imageSrc = $s3->getObjectUrl($bucket, 'uploads/properties/' . $value['imageFolder'] . '/' . $object);
                    //         echo '
                    //             <div class="carousel-item ' . $activeClass . '">
                    //                 <img src="' . $imageSrc . '" alt="RSS property image" class="d-block w-100"/>
                    //             </div>
                    //         ';
                    //         $activeClass = '';
                    //     }
                    //     $count++;
                    // }

                    foreach ($objects['Contents'] as $object) {
                      if ($object['Key'] !== '.' && $object['Key'] !== '..' && $count <= ($content_size - 2)) {
                          $imageSrc = $s3->getObjectUrl($bucket, $object['Key']);
                          echo '
                              <div class="carousel-item ' . $activeClass . '">
                                  <img src="' . $imageSrc . '" alt="RSS property image" width = "100%" height = "200px" class="d-block w-100"/>
                              </div>
                          ';
                          $activeClass = '';
                      }
                      $count++;
                  }
                    
                  } catch (Aws\S3\Exception\S3Exception $e) {
                      // Handle S3 error
                      echo '<div class="carousel-item active">
                          <img src="/assets/updated-assets/images/prop1.png" class="d-block w-100" alt="No images available for this property."/>
                      </div>';
                  
                      echo '<div class="carousel-item">
                          <img src="/assets/updated-assets/images/prop2.png" class="d-block w-100" alt="No images available for this property."/>
                      </div>';
                  }
                  

                  //End S3 Integration

                    ?>
                  </div>

                  <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls-<?php echo $value['propertyID']; ?>" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </button>

                  <button class="carousel-control-next" type="button" data-target="#carouselExampleControls-<?php echo $value['propertyID']; ?>" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </button>

                </div>
                <div class="card-body">
                  <p class="card-text" style="font-size: 14px; font-weight: 600; color: black;">
                    &#8358;<?php echo ($value['price'] > 999999) ? ($value['price'] / 1000000) . 'M' : number_format($value['price']); ?>/month&nbsp;&nbsp;
                    <small style="
                 text-decoration: line-through;
                 text-decoration-color: #007dc1;
                 text-decoration-thickness: 3px;
               ">
                      &#8358;<?php $annual_price = $value['price'] * 12;
                              echo ($annual_price > 999999) ? number_format($annual_price / 1000000) . 'M' : number_format($annual_price); ?>/year
                    </small>

                  </p>
                  <p class="card-text" style="font-size: 12px; font-weight: 400; color: black;"><?php echo shortenText($value['address'] . ", " . $value['city'], 30); ?></p><br>

                  <div class="card-text d-flex justify-content-between">
                    <!--<p class="card-text"> -->
                    <p style = "color: black;">
                      <?php echo $value['bed']; ?> Bed
                      <?php echo $value['bath']; ?> Bath
                      <!--&bull;<?php //echo ($value['state'] == 2671) ? 'Lagos' : 'Abuja'; ?>-->
                      <!-- &bull;--> <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" 
                    fill="none">
                    <g clip-path="url(#clip0_7160_3254)">
                      <path
                        d="M7.5 2.5C7.5 1.12125 6.37875 0 5 0C3.62125 0 2.5 1.12125 2.5 2.5C2.5 3.73667 3.4025 4.76625 4.58333 4.965V9.58333C4.58333 9.81333 4.77 10 5 10C5.23 10 5.41667 9.81333 5.41667 9.58333V4.965C6.5975 4.76625 7.5 3.73667 7.5 2.5Z"
                        fill="#414042" />
                    </g>
                    <defs>
                      <clipPath id="clip0_7160_3254">
                        <rect width="10" height="10" fill="white" />
                      </clipPath>
                    </defs>
                  </svg><?php echo ($value['city']); ?>
                    </p>

                    <!--    <a href="#" class="text-decoration-none">-->
                    <!--  <div class="d-flex flex-column  align-items-center">-->
                    <!--    <img class="img-fluid" style="width: 15px" src="<?php echo base_url(); ?>assets/updated-assets/assets/images/share-icon.svg" alt="">-->
                    <!--    <span style="font-size: 10px" class="primary-text-color-alt">share</span>-->
                    <!--  </div>-->
                    <!--</a>-->

                    <a href="#" class="text-decoration-none" onclick="shareLink('<?php echo $value['propertyID']; ?>')" data-toggle="tooltip" data-placement="top" title="Share property link">
                      <div class="d-flex flex-column  align-items-center">
                        <img src="<?php echo base_url(); ?>assets/updated-assets/images/share-icon.svg" class="img-fluid" style="width: 15px" alt="">
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
          </div>
        </div>

    </div>

  <?php } else { ?><div style="width:100%;padding:15px 0;font-family:gotham-medium;color:#414042">No results matching your search</div>

  <?php } ?>

  </div>
  <!--</div>-->


</main>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/rslider@1.0.5/dist/rSlider.min.js"></script>-->

<script>
  const cityDropdownBtns = document.querySelectorAll('.dropdown-menu:first-of-type .city-btn');
  const locationList = document.querySelector('#location-list');
  const filterBtn = document.querySelector('.filter-btn');
  const locationText = document.querySelector('.web-load');

  const filterUrl = '<?php echo base_url("rss/filter"); ?>';

  let isWaiting = false; // Added variable to track button state

  cityDropdownBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      const cityId = e.target.dataset.cityId;
      const cityName = e.target.textContent;

      // Update the value of the hidden input field with the selected city ID
      $('input[name="city"]').val('');

      // Update the text of the filter button
      filterBtn.textContent = cityName;

      // Show "Loading..." text
      locationText.textContent = 'Loading...';

      // Make AJAX request to the controller
      const url = '<?php echo base_url('rss/get_locations'); ?>';
      const params = {
        city_id: cityId
      };

      $.ajax({
        url: url,
        data: params,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          // console.log(response);
          // Process the response data
          locationList.innerHTML = ''; // Clear previous locations

          if (Array.isArray(response)) {
            $.each(response, function(index, location) {
              const locationBtn = $('<button></button>')
                .addClass('btn location-btn')
                .css({
                  display: 'inline-block',
                  width: '110px'
                })
                .text(location.name);

              // Add primary style to the first element
              if (index === 0) {
                locationBtn.addClass('btn-primary');
              } else {
                // Add secondary style to the other elements
                locationBtn.addClass('btn-outline-secondary');
              }

              const buttonWrapper = $('<div></div>')
                .addClass('col-md-4 mb-2 location-item')
                .append(locationBtn);

              $(locationList).append(buttonWrapper);

              // Add click event listener to each location button
              locationBtn.on('click', function() {
                const locationName = $(this).text();
                $(this).closest('.dropdown').find('.filter-btn').text(locationName);
                $('input[name="city"]').val(locationName); // Assign locationName to input field
                // console.log('Selected location:', locationName);
              });
            });
          } else {
            const locationBtn = $('<button></button>')
              .addClass('btn location-btn')
              .addClass('btn-primary')
              .css({
                display: 'inline-block',
                width: '100px'
              })
              .text(response);

            const buttonWrapper = $('<div></div>')
              .addClass('col-md-4 mb-2 location-item')
              .append(locationBtn);

            $(locationList).append(buttonWrapper);

            // Add click event listener to the single location button
            locationBtn.on('click', function() {
              const locationName = $(this).text();
              $(this).closest('.dropdown').find('.filter-btn').text(locationName);
              $('input[name="city"]').val(locationName); // Assign locationName to input field
              // console.log('Selected location:', locationName);
            });
          }

          // Restore original text
          locationText.textContent = 'Location';

          // Check if the second location dropdown button is not clicked or selected
          if (!$('.dropdown-menu:last-of-type .location-btn').hasClass('selected')) {
            // Set the input values to empty
            $('input[name="city"]').val('');
            $('input[name="state"]').val('');
            $('.price-range').val('');
          }
        }
      });
    });
  });

  jQuery(document).ready(function() {
    $('.show-result-btn').click(function() {
      // Check if already waiting, and return if true
      if (isWaiting) {
        return;
      }

      // Toggle waiting state
      isWaiting = true;

      // Store the original button text
      const originalText = $(this).text();

      // Clear the button text and add a placeholder element
      $(this).empty().append($('<span class="button-placeholder"></span>'));

      // Get the placeholder element
      const placeholder = $(this).find('.button-placeholder');

      // Update placeholder text to "Wait..."
      //   placeholder.text('   Wait ...   ');
      placeholder.html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wait&nbsp;...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

      var state = $('input[name="state"]').val();
      var city = $('input[name="city"]').val();
      var bed_num = $('input[name="bed_num"]:checked').val();
      var bath_num = $('input[name="bath_num"]:checked').val();
      var furnishing = $('input[name="furnishing"]:checked').val();
      var priceRange = $('.price-range').val();

      // Check if the second location dropdown button is not clicked or selected
      if (!$('.dropdown-menu:last-of-type .location-btn').hasClass('selected')) {
        // Set the input values to empty
        $('input[name="city"]').val('');
        $('input[name="state"]').val('');
        priceRange = '';
      }

      var data = {
        state: state,
        bed_num: bed_num,
        bath_num: bath_num,
        furnishing: furnishing,
        priceRange: priceRange,
      };

      // Append the city to the data object if needed
      data.city = city;

      // console.log(data);

      jQuery.ajax({
        type: 'POST',
        url: filterUrl,
        data: data,
        success: function(response) {
          // console.log(response);

          window.location.href = filterUrl;
          // Process the response data
          // ...

          // Restore button text and state
          placeholder.text(originalText);
          isWaiting = false;
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(errorThrown);

          // Restore button text and state
          placeholder.text(originalText);
          isWaiting = false;
        }
      });
    });
  });
</script>

<!--Tooltip for share-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });


  function shareLink(propertyID) {

    var url = "<?php echo base_url(); ?>property/" + propertyID;

    if (navigator.share) {
      navigator.share({
          title: 'Share Property',
          text: 'Check out this property!',
          url: url
        })
        .then(() => {
          //   console.log('Share successful');
        })
        .catch((error) => {
          console.error('Error sharing:', error);
        });
    } else {
      // console.log('Web Share API not supported');
    }
  }
</script>

<!------ Mobile search pane ------->

<script src="<?php echo base_url(); ?>assets/js/props-country-picker.js"></script>

<script src="<?php echo base_url(); ?>assets/js/property-search.js"></script>

<script>
  (function() {
    'use strict';

    var mySlider, mobileSlider; // Declare variables for the sliders

    var initializeSlider = function() {
      return new rSlider({
        target: '#slider',
        values: {
          min: 10000,
          max: 2000000
        },
        range: true,
        set: [30000, 1000000],
        scale: true,
        labels: false,
        tooltip: true,
        step: 10000,
        width: null,
        onChange: function(vals) {
          console.log(vals);
          $('.price-range').val(vals);
        }
      });
    };

    var initializeMobileSlider = function() {
      return new rSlider({
        target: '#mobileSlider',
        values: {
          min: 10000,
          max: 2000000
        },
        range: true,
        set: [30000, 1000000],
        scale: true,
        labels: false,
        tooltip: true,
        step: 10000,
        width: null,
        onChange: function(mobvals) {
          console.log(mobvals);
          $('.price-range').val(mobvals);
        }
      });
    };

    var init = function() {
      mySlider = initializeSlider(); // Initialize the slider on window load

      var dropdownButton = document.querySelector('.budget');
      dropdownButton.addEventListener('click', function() {
        if (mySlider) {
          mySlider.destroy(); // Destroy the previous slider if it exists
        }
        mySlider = initializeSlider(); // Re-initialize the slider on button click
      });

      $('#staticBackdrop').on('shown.bs.modal', function() {
        mobileSlider = initializeMobileSlider(); // Initialize the mobile slider when the filter modal is shown
      });

      $('#staticBackdrop').on('hidden.bs.modal', function() {
        if (mobileSlider) {
          mobileSlider.destroy(); // Destroy the mobile slider when the filter modal is hidden
        }
      });
    };

    // Call the init function on window load
    window.addEventListener('load', init);
  })();
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<!--Bootstrap js and Popper js -->
<script src="<?php echo base_url(); ?>assets/updated-assets/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>

<script src="<?php echo base_url(); ?>assets/updated-assets/js/bootstrap-js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>