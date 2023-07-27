<footer class="footer footer-all">
    <div class="container">
        <div class="row">
            
            
            <div class="col-sm-2 footer-logo-png">
                <img src="images/mobile-logo.png" alt="">
            </div>
            <div class="col-sm-5"></div>
            <div class="col-sm-2 app-store-footer-desk">
                <a href="#"><img class="applestorelogo-desk" src="images/appstore-footer.png" alt=""></a>
          </div>
          <div class="col-sm-1 google-play-footer-desk">
            <a href="#" target="_blank"><img class="google-play-footer-desk" src="images/googleplay-footer.png" alt=""></a>
          </div>
          <!-- <div class="col-sm-1"></div> -->
        </div>
        <div class="row">
          
          <div class="col-sm product-footer">
            <h3>Products</h3>
            <ul>
                <a href="https://dev-rent.smallsmall.com" target="_blank"><li>Rentsmallsmall</li></a>
                <a href="#nogo"><li>Stayone</li></a>
                <a href="https://buy2let.ng" target="_blank"><li>Buy2let</li></a>
            </ul>
          </div>
          <div class="col-sm company-footer">
            <h3>Company</h3>
            <ul>
                <a href="/about.html"><li>About us</li></a>
                <a href="#"><li>Blog</li></a>
                <a href="#"><li>Careers</li></a>
            </ul>
          </div>
          <div class="col-sm legal-footer">
            <h3>Legal</h3>
            <ul>
                <a href="{{url('/privacy')}}"><li>Privacy policy</li></a>
                <a href="{{url('/terms')}}"><li>>Subscription terms</li></a>
                <!--<a href="{{url('/terms')}}"><li>Terms & Conditions</li></a>-->
                <!--<a href="{{url('/faq')}}"><li>Subscription terms</li></a>-->
                <a href="{{url('/faq')}}"><li>FAQ</li></a>
            </ul>
          </div>

          <div class="col-sm contact-footer">
                <h3>Contact us</h3>
                <ul>
                    <li>Talk to us</li>
                    <li>hello@smallsmall.com</li>
                    <li class="social-media-icons">
                        <div class="row social-icon-size">
                            <div class="col-sm-2 social-icon-col-size"><a href="#"><img src="images/twitter.svg" alt=""></a></div>
                            <div class="col-sm-2 social-icon-col-size"><a href="#"><img src="images/instagram.svg" alt=""></a></div>
                            <div class="col-sm-2 social-icon-col-size"><a href="#"><img src="images/linkedin.svg" alt=""></a></div>
                            <div class="col-sm-2 social-icon-col-size"><a href="#"><img src="images/facebook.svg" alt=""></a></div>
                            <div class="col-sm-2 social-icon-col-size"><a href="#"><img src="images/youtube.svg" alt=""></a></div>
                        </div>
                        
                    </li>
                </ul>
                
              
          </div>
        </div>

        <div class="row">
            <!-- <div class="col-sm-3"></div>   -->
            <div class="col-sm-2 app-store-footer-mobile">
                <a href="#"><img class="applestorelogo-mobile" src="images/appstore-footer.png" alt=""></a>
            </div>
            <div class="col-sm-2 google-play-footer-mobile">
            <a href="#" target="_blank"><img class="googleplaylogo-mobile" src="images/googleplay-footer.png" alt=""></a>
            </div>
            <div class="col-sm-3"></div> 
        </div>
        <div class="row">  
            <div class="col-sm copy-2022-footer">
                  <p> &copy; 2023 Smallsmall Technology</p>
            </div>
        </div>

        
    </div>



</footer>
<!----Popups here ------>
    <div class="popup-container">
        <!---- Payment option popup box ---->
        <div class="popup payment-option-pop">
            <div class="close-button">x</div>
            <table width="100%" style="border-collapse:collapse" cellpadding="5px" >
    			<tr style="cursor:pointer;" class="pay-option" id="transfer">
    			    <td>
    					Direct Transfer
    				</td>
    				<td>
    				    <img src="<?php echo base_url(); ?>assets/images/providus-bank.png" />
    
    				</td>
    			</tr>
    			<tr>
    				<td>&nbsp;</td>
    				<td>&nbsp;</td>
    			</tr>
    			<tr style="cursor:pointer" class="pay-option" id="paystack">
    				<td>Paystack</td>
    				<td>
    					<img src="<?php echo base_url(); ?>assets/images/paystack.png" />
    				</td>
    			</tr>
    			<tr>
    				<td>&nbsp;</td>
    				<td>&nbsp;</td>
    			</tr>
                <tr style="cursor:pointer" class="pay-option" id="flutterwave">
    				<td>Flutterwave</td>
    				<td>
    					<img src="<?php echo base_url(); ?>assets/images/flutterwave.png" />
    				</td>
    			</tr>
    			<tr>
    				<td>&nbsp;</td>
    				<td>&nbsp;</td>
    			</tr>
    			<tr style="cursor:pointer" class="pay-option" id="wallet">
    				<td>RSS Wallet</td>
    				<td>
    					<!---<img src="<?php echo base_url(); ?>assets/images/paystack.png" />--->
    				</td>
    			</tr>
    			
    		</table>
    
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
            <h3 class="text-center">Hurrah!!</h3>
            <h4 class="text-center">Inspection booked</h4>
            <span class="text-center">Please check your email for more details.</span>
        </div>
        <!---- Inspection popup box ---->
        
        
        <!---- Successful payment box ---->
        <div class="popup subscription">
            <div class="close-button">x</div>
            <div class="popup-img">
               <img src="<?php echo base_url(); ?>assets/images/hurray_popup.png" class="" > 
            </div>
            <h3 class="text-center">Hurrah!!</h3>
            <h4 class="text-center">Payment Successful</h4>
            <span class="text-center">Please check your email for more details.</span>
        </div>
        <!---- Successful payment box ---->
            
    </div>
    
    
<script src="<?php echo base_url(); ?>assets/front/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/front/js/script.js"></script>

<script src="<?php echo base_url(); ?>assets/front/js/script.js"></script>

<script src="<?php echo base_url(); ?>assets/js/testimonial-carousel.js" type="application/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/custom-drop-down.js" type="application/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/top-form.js" type="application/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/user-registration.js" type="application/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/login.js" type="application/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/apartment_types.js" type="application/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/menu-opener.js" type="application/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/floating-cart.js" type="application/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/header-animate.js" type="application/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/rating-meter.js" type="application/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/script.js"></script>

<script src="<?php echo base_url(); ?>assets/js/user-registration.js?version=<?php echo rand(1, 99999999); ?>.10.<?php echo rand(1, 4050); ?>"></script>