//

<div class="other-content">
            <div class="verification-container">
                <div class="ver-page">Verify Me</div>
                <div class="ver-note">Before you can subscribe with us we need to know who you are since this will be a long partnership. We do not share data with any 3rd party or government agency.</div>
                <div class="ver-curr">Renting history</div>
                <div class="progress" style="height: 9px; width: 100%;">
                    <div class="progress-bar" role="progressbar" style="width: 40%; background: #007DC1 !important;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <ul id="progressbar">
                    <li class="active verification"></li>
                    <li class="active verification"></li>
                    <li class="verification"></li>
                    <li class="verification"></li>
                </ul>
                <div class="ver-form-container">
                    <form id="rentingHistoryForm" autocomplete="off" class="verificationForm regForm" method="POST">
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>Address</label>
                                <input type="text" class="rss-text-f light-blue-bg present_address verify-txt-f" id="" />
                            </div>
                            <div class="input-holder">
                                <label>Country</label>                        
                                <div class="select light-blue-bg">
                                    <select class="country verify-txt-f" id="country" name="country">
                                        <option value="" selected="selected">Country</option>
        							    <?php
        
        									$CI =& get_instance();
        
        									$countries = $CI->get_countries();
        
        									foreach($countries as $country => $value){
        
        										echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
        
        									}
        
        							    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>State</label>
                                <div class="select light-blue-bg">
                                    <select class="states verify-txt-f" id="states">
                                        <option value="">State</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-holder">  
                                <label>City</label>                      
                                <input type="text" disabled class="city rss-text-f light-blue-bg verify-txt-f" id="city" />
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>Previous rent duration</label>
                                <div class="select light-blue-bg">
                                    <select class="previous_rent_duration verify-txt-f" name="previous-rent" id="previous-rent">
                                        <option value="" selected="selected">Previous rent duration</option>

            							<option value="1" >1 Year</option>
            
        							    <option value="2" >2 Years</option>
            
        							    <option value="3" >3 Year</option>
            
        							    <option value="4" >4 Year</option>
            
        							    <option value="5" >5 Year</option>
            
        							    <option value="6" >6 Year</option>
            
        							    <option value="7" >7 Year</option>
            
        							    <option value="8" >8 Year</option>
            
        							    <option value="9" >9 Year</option>
            
        							    <option value="10">10 Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-holder"> 
                                <label>Current renting status</label>                       
                                <div class="select light-blue-bg">
                                    <select class="renting_status verify-txt-f" name="renting_status" id="renting_status">
                                        <option value="Yes">Renting</option>

						                <option value="No">Not Renting</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>Previous evictions?</label>
                                <div class="select light-blue-bg">
                                    <select class="previous_eviction" name="previous-eviction" id="previous-eviction">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-holder"> 
                                <label>Pets</label>                       
                                <div class="select light-blue-bg">
                                    <select class="pet" name="pets" id="pets">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>Disability/Illness</label>                     
                                <div class="select light-blue-bg">
                                    <select class="critical_illness" name="critical-illness" id="critical-illness">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-holder">  
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">                                
                                <label>Landlord's Name</label>                      
                                <input type="text" class="rss-text-f light-blue-bg landlord_full_name verify-txt-f" id="" />
                            </div>
                            <div class="input-holder"> 
                                <label>Lanlord's Email</label>                       
                                <input type="text" class="rss-text-f light-blue-bg landlord_email" id="" />
                            </div>
                        </div>
                        <div class="form-input-cont"> 
                            <div class="input-holder">                                
                                <label>Landlord's Phone</label>                      
                                <input type="text" class="rss-text-f light-blue-bg landlord_phone verify-txt-f" id="" />
                            </div>
                        </div>
                        <div class="form-input-cont"> 
                            <div class="input-holder">                                
                                <label>Landlord's address</label>                      
                                <textarea class="rss-text-area light-blue-bg landlord_address verify-txt-f" id=""></textarea>
                            </div>
                            <div class="input-holder">                                
                                <label>Reason for leaving</label>                      
                                <textarea class="rss-text-area light-blue-bg reason_for_leaving" id=""></textarea>
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <button type="submit" class="rss-form-button verifyBut" id="verifyBut">Next</div>
                            </div>
                            <div class="input-holder">                        
                                &nbsp;
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
<script src="<?php echo base_url().'assets/js/verification.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>


//




<!-- MAIN SECTION -->
<main class="container-fluid ">
    <div class="row">
      <div class="col-md-4 col-12 col-lg-3 verify-container">
        <div class="d-flex align-items-center">
          <p class="mr-md-4 mr-0 verify-me">Verify me</p>
          <p class="verify-number d-md-block d-none">2 of 5</p>
        </div>
        <p class="verify-body">Before you can subscribe with us we need to know who you are since this will be a long
          partnership. Please
          <a href="privacyPolicy.html">read</a> our policy on data sharing.
        </p>
        <p class="verify-number d-md-none d-block">2 of 5</p>
      </div>
      <div class="col-md-8 col-12 col-lg-6">
        <div class="text-center mt-md-5">
          <h2 class="verify-title">Rental history</h2>
          <p class="verify-body">Provide your rental history</p>
        </div>

        <div class="form-container mt-5">
          <form id="rentingHistoryForm" autocomplete="off" class="verificationForm regForm px-md-5" method="POST">
          <!-- <form class="px-md-5 " method="" action=""> -->
            <div class="d-flex row">

              <div class="col-md-6 col-12 order-md-0 order-1">
                <div class="row">

                  <div class=" col-12">
                    <div class="form-group">
                      <textarea class="form-control present_address verify-txt-f" id=""
                        rows="5">Current address</textarea>
                    </div>
                  </div>


                  <div class=" col-12">
                    <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1"
                        rows="5">Reasons for leaving</textarea>
                    </div>
                  </div>


                  
                  <div class="input-holder"> 
                                <label>Pets</label>                       
                                <div class="select light-blue-bg">
                                    <select class="pet" name="pets" id="pets">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>


                </div>
              </div>
              <div class="col-md-6 col-12 order-md-1 order-0">

                <div class="row">
                
                <!-- Country -->
                
                <div class=" col-12">
                    <div class="form-group">
                      <div class="customized-select">
                        <select id="country verify-txt-f" class="form-control" name="country">
                        <option value="" selected="selected">Country</option>
        							    <?php
        
        									$CI =& get_instance();
        
        									$countries = $CI->get_countries();
        
        									foreach($countries as $country => $value){
        
        										echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
        
        									}
        
        							    ?>
                        </select>
                      </div>
                    </div>
                  </div>

                <!-- State -->

                <div class=" col-12">
                    <div class="form-group">
                      <div class="customized-select">
                        <select id="states" class="form-control states verify-txt-f">
                            <option value="">State</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- City -->
                  
                  <div class=" col-12">
                    <div class="form-group">
                      <div class="customized-select">

                      <input type="text" class="city rss-text-f light-blue-bg verify-txt-f" id="city" placeholder="City"  />

                      </div>
                    </div>
                  </div>

                  <!--Rent Duration  -->

                  <div class=" col-12">
                    <div class="form-group">
                      <div class="customized-select">
                        <select id="previous-rent" class="form-control previous_rent_duration verify-txt-f" name="previous-rent">

                        <option value="" selected="selected">Previous rent duration</option>

            							<option value="1" >1 Year</option>
            
        							    <option value="2" >2 Years</option>
            
        							    <option value="3" >3 Year</option>
            
        							    <option value="4" >4 Year</option>
            
        							    <option value="5" >5 Year</option>
            
        							    <option value="6" >6 Year</option>
            
        							    <option value="7" >7 Year</option>
            
        							    <option value="8" >8 Year</option>
            
        							    <option value="9" >9 Year</option>
            
        							    <option value="10">10 Year</option>

                        </select>
                      </div>
                    </div>
                  </div>

                    <!-- Renting Status -->

                  <div class=" col-12">
                    <div class="form-group">
                      <div class="customized-select">
                        <select id="renting_status" class="renting_status verify-txt-f" name="renting_status">

                        <option value="Yes">Renting</option>
                        <option value="No">Not Renting</option>

                        </select>
                      </div>
                    </div>
                  </div>
                




                //





                  <div class=" col-12">
                    <div class="form-group">
                      <div class="customized-select">
                        <select id="inputState" class="form-control">
                          <option selected>Current Renting status</option>
                          <option>...</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class=" col-12">
                    <div class="form-group">
                      <div class="customized-select">
                        <select id="inputState" class="form-control">
                          <option selected>Time at this address</option>
                          <option>...</option>
                          <option>...</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class=" col-12">
                    <div class="form-group">
                      <div class="customized-select">
                        <select id="inputState" class="form-control">
                          <option selected>Any previous eviction</option>
                          <option>No</option>
                          <option>Yes</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>


            <div class="divider my-5"></div>


            <div>
              <div class="text-center my-md-5 mb-3">
                <h2 class="verify-title">Landlord info</h2>
              </div>
              <div class=" row">

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <div class="customized-select">
                      <input type="text" class="form-control" placeholder="Current Landlord name">
                    </div>
                  </div>
                </div>

                <div class=" col-md-6 col-12">
                  <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5">Address</textarea>
                  </div>
                </div>


              </div>
            </div>


            <div class="row mb-5">
              <div class="col-12 mt-5 text-center">
                <a href="verificationOne.html" class="text-dark mr-4 text-decoration-none">&lt; &nbsp;back</a>
                <a href="verificationThree.html" class="btn verify-btn px-5 py-2">Next</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>


  <script src="<?php echo base_url().'assets/js/verification.js' ?>"></script>

  <script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>

  <script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>


