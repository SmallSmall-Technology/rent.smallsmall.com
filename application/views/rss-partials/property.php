<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/singleProperty.css" />

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/allPropertyPage.css" />

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
if ($property['securityDepositTerm'] == 1) {
  $sec_dep = $property['securityDeposit'] * $property['securityDepositTerm'];
} else {
  $sec_dep = $property['securityDeposit'] * $property['securityDepositTerm'];
  $sec_dep = 0.75 * $sec_dep;
}

$evc_dep = ($sec_dep + $evictionDeposit);

$srlz = $property['intervals'];
$srlz = unserialize($srlz);
$yrnt = $property['price'] * 12;

if ($srlz[0] == 'Upfront') {
  $mnth = 'Upfront';
  $vmnth = 'Upfront';

  if ($property['price'] > 999999) {
    $prc = (($property['price'] / 1000000) * 12) . 'M';
  } else {
    $prc = number_format($property['price'] * 12);
  }

  if ($yrnt <= 2000000) {
    $sec_dep = 0.25 * $yrnt;
  } else {
    $sec_dep = 0.3 * $yrnt;
  }

  $total =  ($property['price'] * 12) + $sec_dep;

  $total = number_format($total);

  if($property['securityDepositTerm'] == 1)
  {
    $sec_dep = $property['securityDeposit'] * $property['securityDepositTerm'];

    $serviceCharge = $property['serviceCharge'] * $property['serviceChargeTerm'];

    $evc_dep = $property['securityDeposit'];
  
    $total =  ($property['price'] * 12) + $sec_dep + $evictionDeposit + $serviceCharge;
    
    $total = number_format($total);
  }

  elseif($property['securityDepositTerm'] == 2)
  {
    $sec_dep = $property['securityDeposit'] * $property['securityDepositTerm'];
    $sec_dep = 0.75 * $sec_dep;
    
    $serviceCharge = $property['serviceCharge'] * $property['serviceChargeTerm'];
  
    $total =  ($property['price'] * 12) + $sec_dep + $evictionDeposit + $serviceCharge;
    
    $total = number_format($total);
} else {
  $mnth = "/Month";
  $vmnth = "Monthly";

  if ($property['price'] > 999999) {
    $prc = ($property['price'] / 1000000) . 'M';
  } else {
    $prc = number_format($property['price']);
  }

  $serviceCharge = $property['serviceCharge'] * $property['serviceChargeTerm'];

  $total =  $property['price'] + $sec_dep + $evictionDeposit + $serviceCharge;

  $total = number_format($total);
}


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

<div class="container-fluid d-md-block d-none mt-3">
  <div>
    <a href="<?php echo base_url('properties'); ?>" class="text-decoration-none font-weight-bold primary-text-color-alt">&lt; &nbsp;&nbsp;Back</a>
  </div>
</div>

<main class="">
  <div class="container">
    <!-- caroisel slider -->

    <!-- AWS S3 Integration -->

    <div class="row">
      <div class="col">
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">

            <?php

            require 'vendor/autoload.php';

            // Create an S3 client
            $s3 = new Aws\S3\S3Client([

              'version' => 'latest',

              'region' => 'eu-west-1'

            ]);

            $bucket = 'rss-prod-uploads'; // My bucket name

            $imageFolder = $property['imageFolder'];

            // $imageFolderPath = "./uploads/properties/$imageFolder";

            // $imageFolderPath = "./uploads/properties/$imageFolder";

            // if (file_exists($imageFolderPath) && is_dir($imageFolderPath)) {

            //     $imageFiles = scandir($imageFolderPath);

            //     $activeClass = 'active';

            //     $content_size = count($imageFiles);

            //     $count = 0;

            //   foreach ($imageFiles as $file) {

            //       if ( $file !== '.' && $file !== '..'&& $count <= ($content_size - 2) ){

            //     // if ($file === '.' || $file === '..') {
            //     //   continue;
            //     // }

            //     $imageSrc = base_url() . 'uploads/properties/' . $property['imageFolder'] . '/' . $file;
            //     echo '
            //             <div class="carousel-item-img carousel-item ' . $activeClass . '" data-interval="10000">
            //               <img src="' . $imageSrc . '"  alt="RSS property image"/>
            //             </div>
            //           ';

            //     $activeClass = '';
            //   }

            //   $count++;

            // }

            // } else {

            //   echo '<div class="carousel-item-imgcarousel-item active" data-interval="10000">
            //                 <img src="/assets/updated-assets/images/carousel-banner1.png" class="d-block w-100" alt="No images available for this property."/>
            //               </div>';

            //   echo '<div class="carousel-item-img carousel-item" data-interval="2000">
            //                 <img src="/assets/updated-assets/images/carousel-banner1.png" class="d-block w-100" alt="No images available for this property."/>
            //               </div>';
            // }


            // List objects in the specified S3 folder
            try {
              $objects = $s3->listObjects([
                'Bucket' => $bucket,
                'Prefix' => "uploads/properties/$imageFolder/",
              ]);

              $activeClass = 'active';

              foreach ($objects['Contents'] as $object) {
                $imageSrc = $object['Key'];
                echo '
                            <div class="carousel-item-img carousel-item ' . $activeClass . '" data-interval="10000">
                                <img src="' . $s3->getObjectUrl($bucket, $imageSrc) . '" alt="RSS property image"/>
                            </div>
                        ';
                $activeClass = '';
              }
            } catch (Aws\S3\Exception\S3Exception $e) {

              // Handle S3 error by displaying a placeholder image

              echo '<div class="carousel-item-img carousel-item active" data-interval="10000">
                            <img src="/assets/updated-assets/images/carousel-banner1.png" class="d-block w-100" alt="No images available for this property."/>
                        </div>';

              echo '<div class="carousel-item-img carousel-item" data-interval="2000">
                            <img src="/assets/updated-assets/images/carousel-banner1.png" class="d-block w-100" alt="No images available for this property."/>
                        </div>';
            }

            // End of AWS S3 Integration

            ?>

          </div>
          <button class="carousel-control-prev" type="button" data-target="#carouselExampleInterval" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-target="#carouselExampleInterval" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
      </div>
    </div>

    <div class="row mt-4 px-md-0 px-3">
      <!-- Left side -->
      <div class="col-md-6 col-sm-12">
        <div class="row">

          <div class="col-12">

            <p class="d-md-block d-none">Video tour <img src="<?php echo base_url(); ?>assets/updated-assets/images/video-tour.svg" alt="">&nbsp; Coming Soon</p>
            <h2 class="furnished-title font-weight-bold"><?php echo $property['propertyTitle']; ?></h2>
            <p><?php echo $property['address'] . ' ' . $property['city'] . ' ' . $property['name']; ?></p>
            <div class="d-md-none mobile-subscription">
              <p class="mb-0 mobile-subscription-price">Subscription Price</p>
              <p class="font-weight-bolder primary-text-color mobile-subscription-amount">&#8358;<?php echo $prc . ' ' . $mnth; ?></p>
              <p class="mb-0 mobile-subscription-security">Security deposit fund</p>
              <p class="font-weight-bold mobile-subscription-deposit">&#8358;<?php echo number_format($evc_dep); ?></p>
            </div>


            <div class="d-flex align-items-center">
              <img class="img-fluid mr-1" src="<?php echo base_url(); ?>assets/updated-assets/images/shield-check.svg" alt="">
              <p class="mb-0 mr-4">Verified Property</p>

              <a href="#" onclick="shareLink()" data-toggle="tooltip" data-placement="top" title="Share property link">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/share.svg" alt="">
              </a>


            </div>

            <div class="mw-100 d-flex p-3 border-top justify-content-around align-items-center border-bottom my-4 property-stats">
              <div class="property-stats--child d-flex flex-column  align-items-center">
                <span>BEDROOM</span>
                <p><img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/bed.svg" alt=""> <?php echo $property['bed']; ?></p>
              </div>
              <div class="property-stats--child d-flex flex-column  align-items-center">
                <span>BATHROOM</span>
                <p><img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/bathtub.svg" alt=""> <?php echo $property['bath']; ?></p>
              </div>
              <div class="property-stats--child d-flex flex-column  align-items-center">
                <span>TOILET</span>
                <p><img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/toilet.svg" alt=""> <?php echo $property['toilet']; ?></p>
              </div>
              <div class="property-stats--child d-flex flex-column  align-items-center">
                <span>FURNISHING</span>
                <p><img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/sofa.svg" alt=""> <?php echo $property['furnishing']; ?></p>
              </div>
              <div class="property-stats--child d-flex flex-column align-items-center">
                <span>GEN</span>
                <p><img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/gen.svg" alt=""><?php echo $property['generator']; ?></p>
              </div>
            </div>

            <!-- mobile view subscription -->
            <div class="d-md-none d-block ">
              <h6>Managed by RentSmallsmall</h6>

              <div class="d-flex flex-column align-items-center">
                <p class="managed-title">Like this property? Book to it and subscribe</p>
                <div class="schedule-container d-flex mb-2">
                  <div class="schedule-container__schedule schedule-item-container" data-toggle="modal" data-target="#staticBackdrop">
                    <span class="">Schedule a visit</span>
                  </div>
                  <div class="schedule-container__subscribe" data-toggle="modal" data-target="#mobileSubscribe">
                    <span class="">Subscribe now</span>
                  </div>
                </div>

                <?php
                $CI = &get_instance();
                if (date('Y-m-d') < $property['available_date']) {
                  echo '<div style="color: red; border-color:red" class="subscription-availability subscription-available w-75">Unavailable</div>';
                } else {
                  echo '<div class="subscription-availability subscription-available w-75 mb-1">Available</div>';
                }
                ?>

              </div>

              <!-- Mobile schedule section -->
              <div class="row d-lg-none">
                <div class="col-3 pr-0 d-flex">

                  <!-- Modal -->
                  <div class="modal fade mobilePopup" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">


                        <form id="mobInspectionForms" method="post">
                          <div class="modal-body filter-modal-body secondary-background">
                            <div>
                              <i class="fa-solid fa-xmark fa-3x" data-dismiss="modal"></i>
                            </div>

                            <div class="text-center">
                              <h4 class="font-weight-bolder my-5">Schedule a visit</h4>
                              <h5 class="primary-text-color font-weight-bold mt-4" style="font-size: 20px;"><?php echo $property['propertyTitle']; ?></h5>
                              <p style="font-size: 11px;" class="mb-5"><?php echo $property['address'] . ' ' . $property['city'] . ' ' . $property['name']; ?></p>
                            </div>


                            <div class="input-container mb-3">

                              <select class="form-control mob-insp-type" id="insp-type" required>
                                <option value="">Type of selection</option>
                                <option value="Physical">Physical</option>
                                <option value="Virtual">Virtual</option>
                              </select>


                            </div>


                            <div class="input-container mb-3">

                              <input type="text" onclick="(this.type='date')" class="form-control mob-inspection-date" id="insDateMob" placeholder="Inspection date" name="" required />
                              <span class="field-icns"><i class="bx bx-calendar"></i></span>


                            </div>


                            <div class="input-container mb-3">

                              <input autocomplete="off" list="inspection-time" name="inspection-time" type="text" class="mob-inspection-time form-control " id="input" placeholder="Inspection time" />
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

                            <div class="m-4">
                              <div class="custom-control custom-checkbox">
                                <div>
                                  <input type="checkbox" name="tenancy-terms" class="custom-control-input" id="customCheckDisabled1">
                                  <label class="custom-control-label" for="customCheckDisabled1" style="font-size: 11px;">I agree to
                                    Rentsmallsmall’s <span class="primary-text-color "> Subscription
                                      terms</span></label>


                                </div>
                              </div>

                            </div>
                          </div>

                          <div class="show-result">

                            <button type="submit" class="mob-schedule-inspection" id="">Schedule inspection</button>
                          </div>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <!-- Mobile Subscribe section -->
              <div class="row d-lg-none">
                <div class="col-3 pr-0 d-flex">

                  <!-- Modal -->
                  <div class="modal fade" id="mobileSubscribe" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form id="mobPaymentForms" method="POST">

                          <div class="modal-body filter-modal-body secondary-background">
                            <div>
                              <i class="fa-solid fa-xmark fa-3x" data-dismiss="modal"></i>
                            </div>

                            <div class="p-4">
                              <div class="text-center">
                                <h4 class="font-weight-bolder my-5">Subscribe</h4>
                                <h5 class="primary-text-color font-weight-bold mt-4" style="font-size: 20px;"><?php echo $property['propertyTitle']; ?></h5>
                                <p style="font-size: 11px;" class="mb-5"><?php echo $property['address'] . ' ' . $property['city'] . ' ' . $property['name']; ?></p>
                              </div>

                              <div class="subscription-cost text-center">
                                <div class="subscription-price--mobile">
                                  <p class="m-0 font-weight-light">Subscription Price</p>
                                  <p class="" style="font-weight:700; font-size: 28px">&#8358;<?php echo $prc . ' ' . $mnth; ?></p>

                                </div>
                                <div class="subscription-deposit--mobile">
                                  <p class="m-0 font-weight-light" style="font-size: 15px">Security deposit fund</p>
                                  <p class="" style="font-weight:700; font-size: 25px">&#8358;<?php echo number_format($evc_dep); ?></p>

                                </div>
                              </div>


                              <div>
                                <p class="text-center">Choose subscription type</p>
                              </div>


                              <div class="input-container mb-3">

                                <?php

                                $duration = "";

                                $fullduration = 0;

                                $frequency = unserialize($property['frequency']);
                                if (is_array($frequency)) {

                                  for ($i = 0; $i < count($frequency); $i++) {

                                    if ($frequency[$i] == 12) {

                                      $duration .= '<option value="' . $frequency[$i] . '"> 12 Months </option>';

                                      $fullduration = 1;
                                    } elseif ($frequency[$i] == 9) {

                                      $duration .= '<option value="' . $frequency[$i] . '"> 9 Months </option>';
                                    } elseif ($frequency[$i] == 6) {

                                      $duration .= '<option value="' . $frequency[$i] . '"> 6 Months </option>';
                                    } elseif ($frequency[$i] == 3) {

                                      $duration .= '<option value="' . $frequency[$i] . '"> 3 Months </option>';
                                    } elseif ($frequency[$i] == 1) {

                                      $duration .= '<option value="' . $frequency[$i] . '"> 1 Month </option>';
                                    }
                                  }
                                } else {
                                  $duration .= '<option value="1"> 1 Month </option>';
                                }

                                ?>
                                <select <?php echo @$field_stat; ?> class="duration form-control" id="mob-duration">

                                  <?php echo $duration; ?>
                                </select>

                              </div>



                              <div class="input-container mb-3">
                                <select <?php echo @$field_stat; ?> class="payment_plan form-control" name="mob-payment-plan" id="mob-payment-plan">
                                  <option value="">Payment plan</option>
                                  <?php

                                  $intervals = "";

                                  $interval = unserialize($property['intervals']);

                                  for ($i = 0; $i < count($interval); $i++) {

                                    echo '<option value="' . $interval[$i] . '">' . $interval[$i] . '</option>';
                                  }

                                  ?>

                                </select>

                              </div>


                              <div class="input-container mb-3">

                                <input <?php echo @$field_stat; ?> type="text" onclick="(this.type='date')" class="move-in-date form-control" id="mob-move-in-date" placeholder="Move in date" />
                                <span class="field-icns"><i class="bx bx-calendar"></i></span>

                              </div>


                              <div>
                                <table class="table table-light" style="background: #F9F9F9; border-radius: 15px">

                                  <tbody class="border-bottom">
                                    <tr>
                                      <td>Subscription fees</td>

                                      <td class="primary-text-color">&#8358;
                                        <span class="subc"><?php echo $prc; ?></span>
                                        <sup class="text-dark mnth"><?php echo $vmnth; ?></sup>
                                      </td>

                                    </tr>

                                    <?php if (@$userID) { ?>


                                      <tr>
                                        <td>Service charge deposit</td>
                                        <td class="primary-text-color">&#8358;<?php echo ($property['serviceChargeTerm'] != '') ? number_format($property['serviceCharge'] * $property['serviceChargeTerm']) : $property['serviceCharge']; ?><sup class="text-dark"></sup>
                                        </td>
                                      </tr>

                                      <tr>
                                        <td>Security deposit fund</td>

                                        <td class="primary-text-color sec_dep">&#8358;<?php echo number_format($evc_dep); ?><sup class="text-dark"></sup>
                                        </td>
                                      </tr>


                                  </tbody>

                                  <tfoot>

                                    <tr>

                                      <td class="text-center" style="border-top: 1px solid #E3EBEF;">Total</td>
                                      <td class="primary-text-color pricing" style="font-size: 20px; border-top: 1px solid #E3EBEF;">&#x20A6;<?php echo $total ?></td>
                                    </tr>

                                  </tfoot>

                                <?php } ?>

                                </table>

                              </div>
                            </div>
                          </div>

                          <?php if (!@$userID) { ?>

                            <div class="price-notifier">Login to see price breakdown</div>

                            <!--Hidden input fields so as to get all the changes -->
                            <input type="hidden" class="subscription-fees" name="subscription-fees" value="<?php echo str_replace(',', '', $prc); ?>">
                            <input type="hidden" class="service-charge-deposit" name="service-charge-deposit" value="<?php echo ($property['serviceChargeTerm'] != '') ? $property['serviceCharge'] * $property['serviceChargeTerm'] : $property['serviceCharge']; ?>">
                            <input type="hidden" class="security-deposit-fund" name="security-deposit-fund" value="<?php echo $evc_dep; ?>">
                            <input type="hidden" class="total" name="total" value="<?php echo str_replace(',', '', $total) ?>">


                          <?php } ?>

                          <div class="show-result">

                            <button type="submit" class="" id="mob-pay-property">Subscribe</button>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>

            <section>
              <p class="d-md-block d-none">Managed by <span class="font-weight-bolder"><?php echo $property['manager']; ?></span></p>
              <h6 class="d-md-none d-block font-weight-bolder mt-5">About this property</h6>
              <p><?php echo nl2br(html_entity_decode($property['propertyDescription'])); ?>
              </p>
            </section>

            <section class="my-5">
              <h4>Amenities</h4>
              <div class="row">
                <div class="col-md-4 col-6">

                  <?php
                  $amenity = unserialize($property['amenities']);

                  $amenity_list = "";

                  ?>
                  <?php $amenity_count = count($amenity); ?>

                  <?php if (in_array('prepaid', $amenity)) { ?>
                    <div class="mb-3 d-flex">
                      <img class="img-fluid mr-1" src="<?php echo base_url(); ?>assets/updated-assets/images/meter.svg" alt="">
                      <span>Prepaid meter</span>
                    </div>
                  <?php } ?>

                  <?php if (in_array('water', $amenity)) { ?>
                    <div class="mb-3 d-flex">
                      <img class="img-fluid mr-1" src="<?php echo base_url(); ?>assets/updated-assets/images/water.svg" alt="">
                      <span>water</span>
                    </div>
                  <?php } ?>

                  <?php if (in_array('security-gate', $amenity)) { ?>
                    <div class="mb-3 d-flex">
                      <img class="img-fluid mr-1" src="<?php echo base_url(); ?>assets/updated-assets/images/security.svg" alt="">
                      <span>Security</span>
                    </div>
                  <?php } ?>


                  <?php if (in_array('waste-disposal', $amenity)) { ?>
                    <div class="mb-3 d-flex">
                      <img class="img-fluid mr-1" src="<?php echo base_url(); ?>assets/updated-assets/images/waste-disposal.svg" alt="">
                      <span>Waste disposal</span>
                    </div>
                  <?php } ?>
                </div>


                <div class="col-md-4 col-6">
                  <?php if (in_array('kitchen', $amenity)) { ?>
                    <div class="mb-3 d-flex">
                      <img class="img-fluid mr-1" src="<?php echo base_url(); ?>assets/updated-assets/images/kitchen.svg" alt="">
                      <span>kitchen</span>
                    </div>
                  <?php } ?>

                  <?php if (in_array('wardrobe', $amenity)) { ?>
                    <div class="mb-3 d-flex">
                      <img class="img-fluid mr-1" src="<?php echo base_url(); ?>assets/updated-assets/images/wardrobe.svg" alt="">
                      <span>Wardrobe</span>
                    </div>
                  <?php } ?>

                  <?php if (in_array('dining', $amenity)) { ?>
                    <div class="mb-3 d-flex">
                      <img class="img-fluid mr-1" src="<?php echo base_url(); ?>assets/updated-assets/images/dinning.svg" alt="">
                      <span>Dinning</span>
                    </div>
                  <?php } ?>

                  <?php if (in_array('air-condition', $amenity)) { ?>
                    <div class="mb-3 d-flex">
                      <img class="img-fluid mr-1" src="<?php echo base_url(); ?>assets/updated-assets/images/ac.svg" alt="">
                      <span>AC</span>
                    </div>
                  <?php } ?>

                </div>
                <div class="col-md-4 col-6">
                  <?php if (in_array('generator', $amenity)) { ?>
                    <div class="mb-3 d-flex">
                      <img class="img-fluid mr-1" src="<?php echo base_url(); ?>assets/updated-assets/images/gen.svg" alt="">
                      <span>Gen</span>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </section>


            <section>
              <h4>House rules</h4>
              <div class="row">
                <div class="col-12">
                  <p>House rules violation may result in a subscription fine</p>
                </div>
                <div class="col-md-4 col-6">
                  <div class="mb-3">
                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/no-smoking.svg" alt="">
                    <span>No Smoking</span>
                  </div>
                  <div class="mb-3">
                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/no-pets.svg" alt="">
                    <span>No Pets</span>
                  </div>
                </div>
              </div>
            </section>

            <section>
              <h4 class="my-4">Neighbourhood</h4>
              <div class="row">

                <?php

                $CI = &get_instance();

                $facilities = $CI->get_facilities($property['propertyID']);

                foreach ($facilities as $facility => $outlet) {

                ?>

                  <div class="col-md-4 col-6">

                    <div class="card border-0">
                      <img src="<?php echo base_url() . "uploads/properties/" . $property['imageFolder'] . '/facilities/' . $outlet['file_path']; ?>" class="card-img-top" alt="...">
                      <div class="p-1 card-body">
                        <h6 class="mb-1 card-title"><?php echo $outlet['name']; ?></h6>
                        <p class="mb-1 font-weight-lighter card-text"><?php echo $outlet['category']; ?>
                        </p>
                        <p class="mb-1 font-weight-bold">Under &#8358;<?php echo $outlet['distance']; ?></p>
                      </div>
                    </div>


                  </div>

                <?php } ?>

              </div>
            </section>

          </div>
        </div>
      </div>

      <!-- right side -->
      <div class="col-6 pl-5 d-md-block d-none">
        <div class="subscription-container ml-5" style="position: sticky; top: 98px;">
          <?php
          $CI = &get_instance();

          if (date('Y-m-d') < $property['available_date']) {

            echo '<div style="color: red; border-color:red" class="subscription-availability  subscription-available">Unavailable</div>';
          } else {

            echo '<div class="subscription-availability  subscription-available">Available</div>';
          }
          ?>
          <div class="row">


            <div class="col-12">
              <div>
                <p>subscription price</p>
                <p class="subcription-amount font-weight-bold">&#8358;<?php echo $prc . ' ' . $mnth; ?><sup id="subtips" data-toggle="tooltip" data-placement="right" title="This is your recurring subscription payment."><img class=" w-25 " style="max-width: 15px;" src="<?php echo base_url(); ?>assets/updated-assets/images/info-icon.svg" alt=""> </sup></p>
                <p>Security deposit fund <span class="subscription-deposit font-weight-bold">&#8358;<?php echo number_format($evc_dep); ?></span><sup data-toggle="tooltip" data-placement="right" title="This is a refundable deposit which shall be refunded only after the effluxion of the term or termination of the agreement and the successful handover/vacant possession of the property to the Legal Representative or property owner without any delays. See FAQ for more info"><img class=" w-25 " style="max-width: 15px;" src="<?php echo base_url(); ?>assets/updated-assets/images/info-icon.svg" alt=""> </sup></p>
              </div>
            </div>



            <div class="col-12">
              <div class="schedule-container d-flex mb-2">
                <div id="scheduleVisit" class="schedule-container__schedule  schedule-item-container" data-toggle="modal" data-target="#exampleModal">
                  <span class="">Schedule a visit</span>
                </div>
                <div id="subscribeNow" class="schedule-container__subscribe  " data-toggle="modal" data-target="#subscribe">
                  <span class="">Subscribe now</span>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <!-- Modal Schedule for desk -->
  <div class="modal fade schedule-visit-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="close-modal-custom">
          <i class="fa-solid fa-circle-xmark fa-2x close-modal" data-dismiss="modal"></i>
        </div>

        <div class="modal-body p-5">
          <h5 class="text-center font-weight-bold my-4">Schedule a visit</h5>
          <div class="form-modal">
            <form id="inspectionForm" method="post">
              <div class="input-container mb-3">

                <select class="form-control insp-type" id="insp-type">
                  <option value="">Type of selection</option>
                  <option value="Physical">Physical</option>
                  <option value="Virtual">Virtual</option>
                </select>
              </div>

              <div class="input-container mb-3">
                <input type="text" onclick="(this.type='date')" class="form-control inspection-date" id="insDate" placeholder="Inspection date" name="insDate" />
                <span class="field-icns"><i class="bx bx-calendar"></i></span>

              </div>

              <div class="input-container mb-3">
                <input autocomplete="off" list="inspection-time" name="inspection-time" type="text" class="inspection-time form-control" id="input" placeholder="Inspection time" />
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

              <div class="m-4">
                <div class="custom-control custom-checkbox">

                  <div>
                    <input type="checkbox" class="custom-control-input" name="tenancy-terms" id="scheduleDesktop">
                    <label class="custom-control-label" for="scheduleDesktop">I agree to
                      Rentsmallsmall’s <a class="primary-text-color " href="<?php echo base_url('subscription-terms'); ?>">Subscription
                        terms</a></label>
                  </div>


                </div>
              </div>
              <div>
                <?php if ($property['available_date'] <= date('Y-m-d H:is') || $property['available_date'] == '') { ?>


                  <?php if (@$user_type == 'landlord') { ?>

                    <button type="submit" disabled class="disabled-btn btn primary-background w-100" id="">Schedule a visit</button>

                  <?php } else { ?>

                    <button type="submit" class="btn primary-background w-100 inspection-btn schedule-inspection" id="">Schedule a visit</button>

                  <?php } ?>

                <?php } else { ?>
                  <?php if ($property['available_date'] == date('Y-m-d', strtotime('+ 1 day'))) { ?>
                    <button disabled class="disabled-btn btn primary-background w-100">Available in 24hrs</button>
                  <?php } else { ?>

                    <button disabled class="disabled-btn btn primary-background w-100">Unavailable</button>

                  <?php } ?>

                <?php } ?>
              </div>
            </form>


          </div>

        </div>

      </div>
    </div>
  </div>


  <!--Hidden Input for value taken-->

  <input type="hidden" class="userID" id="userID" value="<?php echo @$userID; ?>" />

  <input type="hidden" class="verified" id="verified" value="<?php echo @$verified; ?>" />

  <input type="hidden" class="productName" id="productName" value="<?php echo $property['propertyTitle']; ?>" />

  <!--<input type="text" id="availableDate" value="<?php echo $property['available_date']; ?>">-->

  <input type="hidden" class="property-id" id="property_id" value="<?php echo $property['propertyID']; ?>" />

  <input type="hidden" class="prop-monthly-price" id="monthly-price" value="<?php echo $property['price']; ?>" />

  <input type="hidden" class="sec-deposit" id="sec-deposit" value="<?php echo ($evc_dep); ?>" />

  <input type="hidden" class="serv-charge" id="serv-charge" value="<?php echo ($property['serviceCharge'] * $property['serviceChargeTerm']); ?>" />

  <input type="hidden" class="cvstat" id="cvstat" value="<?php echo @$verified; ?>" />

  <input type="hidden" class="verification_profile" id="verification_profile" value="<?php echo @$verification_profile; ?>" />

  <?php
  $inspection_stat = "no";
  if (@$check_inspection) {
    $inspection_stat = "yes";
  }
  ?>

  <input type="hidden" class="inspection_stat" id="inspection_stat" value="<?php echo @$inspection_stat ?>" />

  <input type="hidden" class="apt-type" id="apt-type" value="<?php echo @$property['type_slug']; ?>" />

  <input type="hidden" class="imageLink" id="imageLink" value="<?php echo base_url() . 'uploads/properties/' . $property['imageFolder'] . '/' . $property['featuredImg']; ?>" />

  <input type="hidden" class="amount-due" id="amount-due" value="<?php echo $property['price'] + $sec_dep + $property['serviceCharge']; ?>" />

  <!--End of hidden Input-->

  <!-- Modal Subscribe -->
  <div class="modal fade schedule-visit-modal" id="subscribe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="close-modal-custom">
          <i class="fa-solid fa-circle-xmark fa-2x close-modal" data-dismiss="modal"></i>
        </div>

        <div class="modal-body p-5">
          <h5 class="text-center font-weight-bold my-4">Subscribe</h5>
          <p class="text-center">Choose subscription type</p>
          <div class="form-modal">


            <form id="paymentForm" method="POST">

              <div class="input-container mb-3">
                <?php

                $duration = "";

                $fullduration = 0;

                $frequency = unserialize($property['frequency']);
                if (is_array($frequency)) {

                  for ($i = 0; $i < count($frequency); $i++) {

                    if ($frequency[$i] == 12) {

                      $duration .= '<option value="' . $frequency[$i] . '"> 12 Months </option>';

                      $fullduration = 1;
                    } elseif ($frequency[$i] == 9) {

                      $duration .= '<option value="' . $frequency[$i] . '"> 9 Months </option>';
                    } elseif ($frequency[$i] == 6) {

                      $duration .= '<option value="' . $frequency[$i] . '"> 6 Months </option>';
                    } elseif ($frequency[$i] == 3) {

                      $duration .= '<option value="' . $frequency[$i] . '"> 3 Months </option>';
                    } elseif ($frequency[$i] == 1) {

                      $duration .= '<option value="' . $frequency[$i] . '"> 1 Month </option>';
                    }
                  }
                } else {
                  $duration .= '<option value="1"> 1 Month </option>';
                }

                ?>
                <?php
                //Set fields to disabled if user is not signed in

                $field_stat = '';
                if (!@$userID) {
                  $field_stat = "disabled";
                }
                ?>

                <select <?php echo @$field_stat; ?> class="form-control duration" id="duration">
                  <?php echo $duration; ?>
                </select>

              </div>

              <div class="input-container mb-3">

                <select <?php echo @$field_stat; ?> class="payment_ppn form-control" name="payment-plan" id="payment-plan">
                  <?php

                  $intervals = "";

                  $interval = unserialize($property['intervals']);

                  for ($i = 0; $i < count($interval); $i++) {

                    echo '<option value="' . $interval[$i] . '">' . $interval[$i] . '</option>';
                  }

                  ?>
                </select>

              </div>


              <div class="input-container mb-3">

                <input <?php echo @$field_stat; ?> type="text" onclick="(this.type='date')" class="move-in-date form-control" id="move-in-date" placeholder="Move in date" />
                <span class="field-icns"><i class="bx bx-calendar"></i></span>

              </div>

              <div>
                <table class="table table-light" style="background: #F9F9F9; border-radius: 15px">
                  <tbody class="border-bottom">
                    <tr>
                      <td>Subscription fees</td>

                      <td class="primary-text-color">&#8358;
                        <span class="subc"><?php echo $prc; ?></span>
                        <sup class="text-dark mnth"><?php echo $vmnth; ?></sup>
                      </td>

                    </tr>

                    <?php if (@$userID) { ?>

                      <tr>
                        <td>Service charge deposit</td>

                        <td class="primary-text-color">&#8358;<?php echo ($property['serviceChargeTerm'] != '') ? number_format($property['serviceCharge'] * $property['serviceChargeTerm']) : $property['serviceCharge']; ?><sup class="text-dark"></sup>
                        </td>

                      </tr>


                      <tr>
                        <td>Security deposit fund</td>

                        <td class="primary-text-color sec_dep">&#8358;<?php echo number_format($evc_dep); ?></td>

                      </tr>

                  </tbody>

                  <tfoot>

                    <tr>

                      <td class="text-center" style="border-top: 1px solid #E3EBEF;">Total</td>
                      <td class="primary-text-color pricing" style="font-size: 20px; border-top: 1px solid #E3EBEF;">&#x20A6;<?php echo $total ?></td>
                    </tr>

                  </tfoot>


                  <!--Hidden input fields so as to get all the changes -->
                  <input type="hidden" class="subscription-fees" name="subscription-fees" value="<?php echo str_replace(',', '', $prc); ?>">
                  <input type="hidden" class="service-charge-deposit" name="service-charge-deposit" value="<?php echo ($property['serviceChargeTerm'] != '') ? $property['serviceCharge'] * $property['serviceChargeTerm'] : $property['serviceCharge']; ?>">
                  <input type="hidden" class="security-deposit-fund" name="security-deposit-fund" value="<?php echo $evc_dep; ?>">
                  <input type="hidden" class="total" name="total" value="<?php echo str_replace(',', '', $total) ?>">


                <?php } ?>

                </table>

              </div>

              <?php if (!@$userID) { ?>

                <div class="price-notifier">Login to see price breakdown</div>

              <?php } ?>


              <div>

                <?php if ($property['available_date'] <= date('Y-m-d H:is') || $property['available_date'] == '') { ?>


                  <?php if (@$user_type == 'landlord') { ?>

                    <button type="submit" disabled class="disabled-btn btn primary-background w-100" id="">Pay now</button>

                  <?php } else { ?>

                    <button type="submit" class="subscription-btn btn primary-background w-100" id="pay-property">Subscribe Now</button>

                  <?php } ?>

                <?php } else { ?>
                  <?php if ($property['available_date'] == date('Y-m-d', strtotime('+ 1 day'))) { ?>
                    <button disabled class="disabled-btn btn primary-background w-100">Available in 24hrs</button>
                  <?php } else { ?>

                    <button disabled class="btn primary-background w-100 disabled-btn">Rented</button>

                  <?php } ?>

                <?php } ?>

              </div>


            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- AWS S3 Integration -->

  <div class="container-fluid p-md-5 my-5">
    <div class="row px-md-5">
      <div class="col-12">
        <h5>Similar properties nearby</h5>
      </div>

      <?php

      require 'vendor/autoload.php';

      // Create an S3 client

      $s3 = new Aws\S3\S3Client([

        'version' => 'latest',
        'region' => 'eu-west-1'

      ]);

      $bucket = 'rss-prod-uploads'; // My bucket name

      if (isset($properties) && !empty($properties)) {
        $currentPropertyCity = $property['city']; // Get the city of the current property
        $matchingProperties = array_filter($properties, function ($value) use ($currentPropertyCity) {
          return $value['city'] === $currentPropertyCity;
        });

        if (!empty($matchingProperties)) {
      ?>
          <?php foreach ($matchingProperties as $property => $value) { ?>
            <div class="col-lg-4 col-md-6 col-12 my-4">
              <div class="card" id="properties-container">
                <a style="text-decoration:none" href="<?php echo base_url(); ?>property/<?php echo $value['propertyID']; ?>">
                  <div id="carouselExampleControls-<?php echo $value['propertyID']; ?>" class="carousel slide card-img-top listing-image" data-ride="carousel">
                    <?php
                    $CI = &get_instance();

                    if (date('Y-m-d') < $value['available_date']) {

                      echo '<div class="availablility unavailable d-flex">';

                      echo '<img src="' . base_url() . 'assets/updated-assets/images/time-delete.svg" alt="">';

                      echo '<span class="ml-2">Rented until: ' . date("M Y", strtotime($value['available_date'])) . '</span>';

                      echo '</div>';
                    } else {

                      echo '<div class="availablility available">';

                      echo '<img src="' . base_url() . 'assets/updated-assets/images/check-circle.svg" alt="">';

                      echo '<span class="ml-1">Available: Now</span>';

                      echo '</div>';
                    }
                    ?>

                    <div class="carousel-inner listing-image">
                      <?php

                      $imageFolder = $value['imageFolder'];



                      // $imageFolderPath = "./uploads/properties/$imageFolder";

                      // if (file_exists($imageFolderPath) && is_dir($imageFolderPath)) {

                      //   $imageFiles = scandir($imageFolderPath);

                      //   $activeClass = 'active';

                      //   $content_size = count($imageFiles);

                      //   $count = 0;

                      //   foreach ($imageFiles as $file) {

                      //   //   if ($file === '.' || $file === '..') {
                      //   //     continue;
                      //   //   }

                      //   if ( $file !== '.' && $file !== '..'&& $count <= ($content_size - 2) ){

                      //     $imageSrc = base_url() . 'uploads/properties/' . $value['imageFolder'] . '/' . $file;
                      //     echo '
                      //                     <div class="carousel-item ' . $activeClass . '">
                      //                         <img src="' . $imageSrc . '" alt="RSS property image" class="d-block w-100"/>
                      //                     </div>
                      //                 ';
                      //     $activeClass = '';
                      //   }

                      //   $count++;

                      //   }

                      // } else {
                      //   echo '<div class="carousel-item active">
                      //                     <img src="/assets/updated-assets/images/prop1.png" class="d-block w-100" alt="No images available for this property."/>
                      //                   </div>';
                      //   echo '<div class="carousel-item">
                      //                     <img src="/assets/updated-assets/images/prop2.png" class="d-block w-100" alt="No images available for this property."/>
                      //                   </div>';
                      // }


                      // List objects in the specified S3 folder
                      try {
                        $objects = $s3->listObjects([
                          'Bucket' => $bucket,
                          'Prefix' => "uploads/properties/$imageFolder/",
                        ]);

                        $activeClass = 'active';

                        foreach ($objects['Contents'] as $object) {

                          $imageSrc = $object['Key'];
                          echo '
                                                    <div class="carousel-item ' . $activeClass . '">
                                                        <img src="' . $s3->getObjectUrl($bucket, $imageSrc) . '" alt="RSS property image" class="d-block w-100"/>
                                                    </div>
                                                ';
                          $activeClass = '';
                        }
                      } catch (Aws\S3\Exception\S3Exception $e) {

                        // Handle S3 error by displaying a placeholder image
                        echo '<div class="carousel-item active">
                                                        <img src="/assets/updated-assets/images/prop1.png" class="d-block w-100" alt="No images available for this property."/>
                                                    </div>';
                        echo '<div class="carousel-item">
                                                        <img src="/assets/updated-assets/images/prop2.png" class="d-block w-100" alt="No images available for this property."/>
                                                    </div>';
                      }

                      // End of AWS S3

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
                    <p class="card-text">
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
                    <p class="card-text"><?php echo shortenText($value['address'] . ", " . $value['city'], 30); ?></p>
                    <div class="card-text d-flex justify-content-between">
                      <p class="card-text">
                        &bull;<?php echo $value['bed']; ?> Bed
                        &bull;<?php echo $value['bath']; ?> Bath
                        <!--&bull;<?php echo ($value['state'] == 2671) ? 'Lagos' : 'Abuja'; ?>-->
                        &bull;<?php echo ($value['city']); ?>
                      </p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>


        <?php } else { ?>
          <div style="width:100%;padding:15px 0;font-family:gotham-medium;color:#414042">No results matching your search</div>
        <?php }
      } else { ?>
        <div style="width:100%;padding:15px 0;font-family:gotham-medium;color:#414042">No results matching your search</div>
      <?php } ?>


    </div>
  </div>


  </div>

  <script src="<?php echo base_url(); ?>assets/js/property.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/property-form-change.js"></script>

  <!------Successful inspection, subscription and payment popups ------->
  <!---- Inspection popup box ---->

  <div class="popup-container">
    <div class="popup inspection">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal-custom pop-modal">
            <i class="fa-solid fa-circle-xmark fa-2x close-modal"></i>
          </div>

          <div class="modal-body p-5 text-center">
            <div>
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/success.svg" alt="successful">
            </div>
            <h5 class="text-center font-weight-bold my-4">Hurray!!!</h5>
            <h6>Visit scheduled successfully!!</h6>
            <p class="text-center">Please check your email for more details.</p>

          </div>

        </div>
      </div>
    </div>

  </div>

</main>

<script>
  function insertDate() {

    $('#insDate').attr('type', 'date');

    $('#insDateMob').attr('type', 'date');

    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;

    var day = dtToday.getDate();

    var year = dtToday.getFullYear();

    if (month < 10)

      month = '0' + month.toString();

    if (day < 10)

      day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

    $('#insDate').attr('min', maxDate);

    $('#insDateMob').attr('min', maxDate);
  }
</script>

<!--Tooltip for share-->
<script>
  function shareLink() {
    if (navigator.share) {
      navigator.share({
          title: 'Share Property',
          text: 'Check out this property!',
          url: window.location.href
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

<!--//Script for subscribe Now Shift for web-->
<script>
  $(document).ready(function() {
    $("#subscribeNow").click(function() {

      $("#subscribeNow").addClass("schedule-item-container");
      $("#subscribeNow").css("color", "black");
      $("#scheduleVisit").removeClass("schedule-item-container");
    });
    $("#scheduleVisit").click(function() {

      $("#scheduleVisit").addClass("schedule-item-container");
      $("#subscribeNow").removeClass("schedule-item-container");
    });
  });
</script>


<!--Bootstrap js and Popper js -->
<script src="<?php echo base_url(); ?>assets/updated-assets/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>

<script src="<?php echo base_url(); ?>assets/updated-assets/js/bootstrap-js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

<script src="<?php echo base_url(); ?>assets/js/favorite.js"></script>

<script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/inspection.js?version=9.10.2"></script>

<script src="<?php echo base_url(); ?>assets/js/payment-plan.js"></script>

<script src="<?php echo base_url(); ?>assets/js/rent-calculator.js?version=<?php echo rand(2, 9999); ?>.10.<?php echo rand(2, 99999); ?>"></script>

<script src="<?php echo base_url(); ?>assets/js/rental.js?version=<?php echo rand(2, 999); ?>.10.<?php echo rand(2, 999); ?>"></script>