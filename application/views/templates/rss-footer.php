    <script src="<?php echo base_url(); ?>assets/js/side-nav.js"></script>
    <script>
      (()=>{"use strict";const t={appId:"l3hia6ldd1",q:[],identify:function(t){this.q.push(["identify",t])}};window.Atlas=t;const e=document.createElement("script");e.async=!0,e.src="https://app.getatlas.io/client-js/atlas.bundle.js";const s=document.getElementsByTagName("script")[0];s.parentNode?.insertBefore(e,s)})();
    </script>
    <script>
        window.Atlas.identify({
          userId: "<?php echo @$userID; ?>",
          name: "<?php echo @$fname.''.@$lname; ?>",
          email: "<?php echo @$email; ?>"
        });
    </script>
        <div class="footer">
            <div class="footer-inner">
                <div class="footer-logos">
                    <div class="rss-footer-logo"><img src="<?php echo base_url(); ?>assets/img/logo-blue.png" alt="rss logo blue" /></div>
                    <ul class="footer-social-container">
                        <li class="footer-social-item"><a target="_blank" href="https://apps.apple.com/us/app/smallsmall/id1643608622"><img src="<?php echo base_url(); ?>assets/img/home-icons/app-store.png" alt="App store logo" /></a></li>
                        <li class="footer-social-item"><a target="_blank" href="https://play.google.com/store/apps/details?id=com.smallsmall.mobile"><img src="<?php echo base_url(); ?>assets/img/home-icons/google-play.png" alt="Google Play store logo" /></a></li>
                    </ul>
                    
                </div>
                <div class="footer-item-container">
                    <div class="footer-items">
                        <div class="footer-head">Products</div>                     
                        <div class="footer-links"><a href="<?php echo base_url(); ?>">Rent</a></div>                     
                        <div class="footer-links"><a href="https://dev-stay.smallsmall.com">Nightly stay</a></div>                     
                        <div class="footer-links"><a href="https://dev-buy.smallsmall.com">Buy</a></div>
                    </div>
                    <div class="footer-items">
                        <div class="footer-head">Company</div>                     
                        <div class="footer-links"><a href="<?php echo base_url('blog'); ?>">Blog</a></div>                     
                        <!---<div class="footer-links"><a href="">Careers</a></div>--->                           
                    </div>
                    <div class="footer-items">
                        <div class="footer-head">Legal</div>                     
                        <div class="footer-links"><a href="<?php echo base_url('privacy-policy'); ?>">Privacy policy</a></div> 
                        <div class="footer-links"><a href="<?php echo base_url('tenancy-terms'); ?>">Subscription terms</a></div> 
                        <!--<div class="footer-links"><a href="<?php echo base_url('tenancy-terms'); ?>">Terms & Conditions</a></div>                     -->
                        <!--<div class="footer-links"><a href="">Subscription terms</a></div>                     -->
                        <div class="footer-links"><a href="<?php echo base_url('faq'); ?>">FAQ</a></div>
                    </div>
                    <div class="footer-items">
                        <div class="footer-head">Contact us</div>                      
                        <div class="footer-links"><a href="">Talk to us</a></div>                     
                        <div class="footer-links"><a href="mailto:hello@smallsmall.com">hello@smallsmall.com</a></div>       
                        <div class="footer-links">
                            <a class="img-lnk" href=""><img src="<?php echo base_url(); ?>assets/img/footer-icons/twitter.png" alt="Twitter" /></a><a class="img-lnk" href=""><img src="<?php echo base_url(); ?>assets/img/footer-icons/instagram.png" alt="Instagram" /></a><a class="img-lnk" href=""><img src="<?php echo base_url(); ?>assets/img/footer-icons/linkedin.png" alt="Linkedin" /></a><a class="img-lnk" href=""><img src="<?php echo base_url(); ?>assets/img/footer-icons/facebook.png" alt="Facebook" /></a><a class="img-lnk" href=""><img src="<?php echo base_url(); ?>assets/img/footer-icons/youtube.png" alt="Youtube" /></a>
                        </div>                          
                    </div>
                </div>
                <div class="copyright-ln">
                    &copy; 2023 Smallsmall Technology
                </div>
            </div>
        </div>
        
	</body>
</html>