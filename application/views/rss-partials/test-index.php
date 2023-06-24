        <div class="hero-header">
            <p class="hero-heading">Do you want to pay rent monthly?</p>
            <p class="hero-text">Renting doesn't have to be hard. enjoy the ease that comes with a monthly payment plan <?php echo print_r($this->session); ?></p>
        </div>
        
        
      <div class="search-box">
        <form method="POST" action="<?php echo base_url('rss/filter'); ?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="location"><img src="<?php echo base_url(); ?>assets/images/map.png" alt=""></div>
                </div>
                <input style="background:#FFF;" autocomplete="off" type="text" id="input" list="city" class="form-control search-field-home" name="city" placeholder="What city would you like to live in?">
                <datalist role="listbox" id="city">
                    <?php if(isset($the_cities) && !empty($the_cities)){ ?>
                
						<?php foreach($the_cities as $a_city => $a_city_item){ ?>

							<option><?php echo $a_city_item['name']; ?></option>

						<?php } ?>

				    <?php } ?>
                </datalist>
              <div class="input-group-append">
                  <button type="submit" class="top-banner-button"><i class="bx bx-search"></i></button>
              </div>
            </div>
        </form>
      </div>
     

    </div>

    <!-- features -->
    <div class="container features-container">
        <div class="row">
            <p class="heading2">A new & smart way to live</p>
            <p class="text2">Out with the old in with the new, experience an easier way to live and pay flexibly.</p>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <img src="<?php echo base_url(); ?>assets/images/Rectangle301.png" alt="" width="100%">
            </div>

            <div class="col-lg-6 features">
              <div class="feature">
                <p class="feature-heading"> <i class="bx bx-check-square"></i> Zero legal & agency Fee</p>
                <p class="feature-body">Get connected to verified properties to save brokerage & legal fees. Never any surprise or hidden fees.</p>
              </div>
              <div class="feature">
                <p class="feature-heading"> <i class="bx bx-check-square"></i> Monthly payment</p>
                <p class="feature-body">Subscribe to any of our flexible payment plans & pay your subscritpion with ease.</p>
              </div>
              <div class="feature">
                <p class="feature-heading"> <i class="bx bx-check-square"></i>Vetted Homes</p>
                <p class="feature-body">Browse & filter our growing unique listings.</p>
              </div>

             <div>
                <button class="features-btn"><a href="<?php echo base_url(); ?>signup">Get started</a></button>
             </div>
            </div>
        </div>
    </div>

    <!-- how it works -->

    <div class="container work-home">
        <div class="row">
            <div class="col-lg-4 column1">
                <p class="work-title-home">HOW IT WORKS</p>
                <h3>How to Subscribe with RentSmallsmall</h3>
                <p class="work-body-home">Simple steps to subscribing with us</p>

                <p class="work-footer-home">Ready to find your home?</p>
                <button class="getstartednownew-btn">Get started now</button>
                <!-- <button class="find-home-btn">View more neighborhoods</button> -->
                <!-- <button class="work-btn-home">Get started now</button> -->
            </div>
            <div class="col-lg-4 work-feature-wrap">
                <div class="work-feature">
                    <p class="work-feature-heading-home"> <img src="<?php echo base_url(); ?>assets/images/keyboard.svg" alt=""> Sign up & Search</p>
                    <p class="work-feature-body-home">Get instant access to our listings when you register on our platform. </p>
                </div>

                <div class="work-feature">
                    <p class="work-feature-heading-home"> <img src="<?php echo base_url(); ?>assets/images/verify.svg" alt=""> See verified listing</p>
                    <p class="work-feature-body-home">Explore our well vetted homes curated just for you.</p>
                </div>

                <div class="work-feature">
                    <p class="work-feature-heading-home"> <img src="<?php echo base_url(); ?>assets/images/clock.svg" alt=""> Schedule A Visit</p>
                    <p class="work-feature-body-home">Take a tour of our properties in person or virtually.</p>
                </div>

               
            </div>
            <div class="col-lg-3 work-feature-wrap2">
                

                <div class="work-feature">
                    <p class="work-feature-heading-home"> <img src="<?php echo base_url(); ?>assets/images/shield-check.svg" alt=""> Get verified</p>
                    <p class="work-feature-body-home">Receive confirmation on your validity and we are good to go. </p>
                </div>

                <div class="work-feature subscribeandpay">
                    <p class="work-feature-heading-home"> <img src="<?php echo base_url(); ?>assets/images/credit-card.svg" alt=""> Subcribe & Pay online</p>
                    <p class="work-feature-body-home">Be a part of our community. Enjoy zero payment hassle. </p>
                </div>

                <p class="work-footer-home-mobile">Ready to find your home?</p>
                <button class="work-btn-home-mobile">Get started now</button>

            </div>
            
        </div>
    </div>

    <!-- explore homes -->
    <div class="explore-homes-container">
        <div class="row">
            <p class="explore-title">Explore homes on RentSmallsmall</p>
            <p class="explore-body"> Search from over 200+ verified listings</p>
        </div>
        <div class="explore-container">
            
            <div class="ex-container-items">
                <div class="shared-image">
                    <div class="prop-overlay-txt">
                        <div class="large-prop-desc"><a href="">Verified Homes</a></div>
                        <div class="large-prop-num"><a href="">200+</a></div>
                    </div>
                </div>
            </div>
            <div class="ex-container-items">
                <div class="small-prop-boxes premium">
                    <div class="prop-overlay-txt">
                        <div class="small-prop-desc"><a href="">Premium Homes</a></div>
                        <div class="small-prop-num"><a href="">30+</a></div>
                    </div>
                </div>
                <div class="small-prop-boxes bedspace">
                    <div class="prop-overlay-txt">
                        <div class="small-prop-desc"><a href="">Bedspaces</a></div>
                        <div class="small-prop-num"><a href="">100+</a></div>
                    </div>
                </div>
                <div class="small-prop-boxes shared-h">
                    <div class="prop-overlay-txt">
                        <div class="small-prop-desc"><a href="">Shared Homes</a></div>
                        <div class="small-prop-num"><a href="">30+</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile carousel -->
    <div class="explore-mobile">
        <div class="row">
            <p class="explore-mobile-title">Explore homes on RentSmallsmall</p>
            <p class="explore-mobile-body"> Search from over 200+ verified listings</p>
        </div>
    </div>
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
    </div>
    
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/verified-homes.png" alt="Verified Homes" class="d-block" style="width:100%">
        <div class="carousel-caption">
            <h3>Verified Homes</h3>
            <p>200+</p>
          
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/bedspace-mobile.png" alt="Bedspace" class="d-block" style="width:100%">
        <div class="carousel-caption">
            <h3>Bedspace</h3>
            <p>100+</p>
          
          
        </div> 
      </div>
      <div class="carousel-item">
        <img src="images/shared-homes.png" alt="Shared Homes" class="d-block" style="width:100%">
        <div class="carousel-caption">
            <h3>Shared Homes</h3>
            <p>30+</p>
          
        </div>  
    </div>
    <div class="carousel-item">
        <img src="images/premium-homes.png" alt="Premium Homes" class="d-block" style="width:100%">
        <div class="carousel-caption">
                <h3>Premium Homes</h3>
                <p>20+</p>
              
        </div>  
      </div>
    </div>
    
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
  

    <!-- mobile carousel -->

    <!-- find a neighbourhood -->
    <div class="container find-home">
        <div class="row header">
            <p class="find-home-title">Find a neighborhood near you</p>
            <p class="find-home-body"> Enjoy quality living experience within proximity. It’s closer than you think!</p>
        </div>
        <div class="row nav-row">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link my-nav active" id="pills-lag-tab" data-bs-toggle="pill" data-bs-target="#pills-lag" type="button" role="tab" aria-controls="pills-lag" aria-selected="true">Lagos
                    <div class="border-btm"></div></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link my-nav" id="pills-abj-tab" data-bs-toggle="pill" data-bs-target="#pills-abj" type="button" role="tab" aria-controls="pills-abj" aria-selected="false">Abuja
                    <div class="border-btm"></div></button>
                </li>
            </ul>
            
            <!----Lagos cities ---->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-lag" role="tabpanel" aria-labelledby="pills-lag-tab" tabindex="0">
                    <div class="row content-row">
                        <?php if(isset($the_cities) && !empty($the_cities)){ ?>
        				    <?php foreach($the_cities as $the_city => $each_city){ ?>
    							<div class="col-lg-3 find-home-content">
                                    <a href="<?php echo base_url()."areas-we-cover/".$each_city['id']; ?>"><?php echo $each_city['city']; ?> <span><img src="<?php echo base_url(); ?>assets/images/Vector.png" alt="" class="image"></span></a>
                                </div>
            				<?php } ?>
            			<?php } ?>
                    </div>
                <div class="tab-pane fade" id="pills-abj" role="tabpanel" aria-labelledby="pills-abj-tab" tabindex="0">...</div>
                </div>
            </div>

        <!-- <div class="row"> -->
            <!---<button class="find-home-btn">View more neighborhoods <i class="bx bx-down-arrow-alt"></i></button>--->
        <!-- </div> -->

    </div>

    <!-- scores -->
    <div class="container">
        <div class="scores">
        <div class="row">
            <p class="scores-title">
                We are proud of some 
                of our numbers
            </p>
            <p class="scores-body">
                In line with our goals of organzing the property
                rental market and providing affordable housing, 
                we make it a duty to celebrate our every breakthrough.
            </p>
        </div>
        <div class="row columns">
            <div class="col-lg-4 column1">
                <p class="figure">24</p>
                <p class="text">Locations</p>
            </div>
            <div class="col-lg-4 column2">
                <p class="figure">25,000+</p>
                <p class="text">Monthly Stays</p>
            </div>
            <div class="col-lg-4 column3">
                <p class="figure"><span style="font-family:helvetica;font-weight:bold;">&#x20A6;</span>1.4Bn</p>
                <p class="text">Saved on legal 
                    & agency fee</p>
            </div>
        </div>
    </div>
    </div>

    <!-- feedback -->
    <!---<div class="container feedback-ll">
        <p class="feedback-title">
            See what our subcribers are saying
        </p>
        <div class="row">
            <img src="<?php //echo base_url(); ?>assets/images/Group-5.png" alt="">
        </div>
    </div>--->

    <!-- stack -->
    <div class="container">
        <div class="stack">
        <p class="stack-title">
            How RentSmallsmall stacks up against the rest
        </p>

        <table class="table">
            <tr>
                <th class="table-heading1">Why choose RentSmallsmall?</th>
                <th style="background:#eaf9ff" class="table-heading2">RentSmallsmall</th>
                <th class="table-heading3">Traditional real estate</th>
            </tr>
            <tr>
                <td class="table-data-1">Flexible payment plans</td>
                <td style="background:#eaf9ff;" class="table-data-2"><img src="<?php echo base_url(); ?>assets/images/check-1.png" alt=""></td>
                <td class="table-data-3"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt=""></td>
            </tr>
            <tr>
                <td class="table-data-1">Montly movement options</td>
                <td style="background:#eaf9ff;" class="table-data-2"><img src="<?php echo base_url(); ?>assets/images/check-1.png" alt=""></td>
                <td class="table-data-3"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt=""></td>
            </tr>
            <tr>
                <td class="table-data-1">Zero hidden fees</td>
                <td style="background:#eaf9ff;" class="table-data-2"><img src="<?php echo base_url(); ?>assets/images/check-1.png" alt=""></td>
                <td class="table-data-3"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt=""></td>
            </tr>
            <tr>
                <td class="table-data-1">Gender & Ethinic equality</td>
                <td style="background:#eaf9ff;" class="table-data-2"><img src="<?php echo base_url(); ?>assets/images/check-1.png" alt=""></td>
                <td class="table-data-3"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt=""></td>
            </tr>
            <tr>
                <td class="table-data-1">100% transparency</td>
                <td style="background:#eaf9ff;" class="table-data-2"><img src="<?php echo base_url(); ?>assets/images/check-1.png" alt=""></td>
                <td class="table-data-3"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt=""></td>
            </tr>

        </table>
    </div>
    </div>

    <!-- faq -->
    <div class="container faq-container">
        <div class="faq">
            <p class="faq-title">FAQs</p>
            <p class="faq-sub-title">Here’s a list of the most common customer questions. If you can’t find an answer to your question,
                please don’t hesitate to reach out to us</p>

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is RentSmallSmall about?
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body"><p>
                            At Rentsmallsmall , we offer our customers looking for a home access to flexible payment plans. We list both furnished and unfurnished apartments on our platform in top locations in Nigeria.
                            Payment can be made monthly, bimonthly, quarterly, ...whatever frequency of payment is most convenient for you. Here, there are no agency or agreement fees required!
                            </p>
                            <p>
                            We also provide property owners with premium services that include getting verified subscribers (tenants) for their property, saving them time and stress in getting tenants. With us, you earn your rental income as and when due without suffering any payment defaults.
                        </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Can you talk to my Landlord to collect my rent monthly?
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>You can refer a property owner (Landlord) to list with us by convincing them to put their Property on the Rent Smallsmall platform.</p>
                            <p>
                            You stand to earn a referral fee once an agreement is signed with the landlord and you could
                            earn between 5k -100k depending on the rental price of the property.
                            </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What is Security deposit?
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Security deposit is a refundable one-off payment which serves as rent insurance as well as a
                                caution fee on the condition that no damages were incurred on the property nor any default in
                                rent payment. It's paid at the beginning of your contract and refunded when the agreed period of
                                stay has elapsed.</p>
                                <p>
                                However if you vacate the apartment before the agreed time, you run the risk of forfeiting the
                                payment.</p>
                        </div>
                      </div>
                    </div>
                  
                  
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            How do I schedule to inspect a property I like on RentSmallsmall?
                        </button>
                      </h2>
                      <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>When you find the unit you like, you fill out the inspection request form found at the bottom of
                                each link, you get a confirmation email and our agents get in touch with you within 24-48 hours.</p>
                                <p>
                                If you see the unit and like it, you apply for verification, if successful, you make payments, get
                                your agreement and move in</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            Will I pay for property inspection?
                        </button>
                      </h2>
                      <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>At Rent SmallSmall, We do not charge for inspection, no matter how many properties you desire
                                to inspect!
                                </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading6">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                            What does verification & other requirements for subscription mean?
                        </button>
                      </h2>
                      <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>We put our clients through a verification process and for this they’d be required to provide a
                                valid ID, 4 months worth of bank statement, employment/business information as well as
                                personal details.</p>
                        </div>
                      </div>
                    </div>
                  
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading7">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                Can I speak with someone at RentSmallsmall?
                            </button>
                          </h2>
                      <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>You can reach out to our customer experience team on; 09037222669 / 09036339800
                                (Monday-Friday; 9am-4pm) for assistance or if you have any questions. Thank you!</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading8">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">

                            Where are you located?
                        </button>
                      </h2>
                      <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>We are currently located in Lagos but have properties in Lagos & Abuja</p>
                        </div>
                      </div>
                    </div>
                    </div>
                

        </div>
    </div>	
    
    </div>
	
<script>
    input.onfocus = function () {
      city.style.display = 'block';
      input.style.borderRadius = "5px 5px 0 0";  
    };
    for (let option of city.options) {
      option.onclick = function () {
        input.value = option.value;
        city.style.display = 'none';
        input.style.borderRadius = "5px";
      }
    };
    
    input.oninput = function() {
      currentFocus = -1;
      var text = input.value.toUpperCase();
      for (let option of city.options) {
        if(option.value.toUpperCase().indexOf(text) > -1){
          option.style.display = "block";
      }else{
        option.style.display = "none";
        }
      };
    }
    var currentFocus = -1;
    input.onkeydown = function(e) {
      if(e.keyCode == 40){
        currentFocus++
       addActive(city.options);
      }
      else if(e.keyCode == 38){
        currentFocus--
       addActive(city.options);
      }
      else if(e.keyCode == 13){
        e.preventDefault();
            if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
              if (browsers.options) city.options[currentFocus].click();
            }
      }
    }
    
    function addActive(x) {
        if (!x) return false;
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        x[currentFocus].classList.add("active");
      }
      function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("active");
        }
  }
</script>	
<script src="<?php echo base_url(); ?>assets/js/options-opener.js" type="application/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/horizontal-prop-scroller.js" type="application/javascript"></script>
<!---<script src="<?php //echo base_url(); ?>assets/js/how-to-scroller.js" type="application/javascript"></script>-->
<script src="<?php echo base_url(); ?>assets/js/popup-handler.js" type="application/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/banner-state-selector.js" type="application/javascript"></script>