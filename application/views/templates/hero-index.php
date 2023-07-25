    <!-- hero -->
    <div class="container-fluid hero home">
        <div class="top-menu">
            <div class="top-menu-inner">
                <div class="logo-container"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" /></a></div>
                <div class="navigation">
                    <div class="mobile-menu-container">
                        <div id="mobile-menu" class="mobile-menu light">
                            <span class="mobile-bars"></span>
                            <span class="mobile-bars"></span>
                            <span class="mobile-bars"></span>
                        </div>
                    </div>
                    <ul class="menu light">
                        <li class="menu-item"><a id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" href="#">Subscribe<i class="bx bx-chevron-down arrowbtn"></i></a>
                            <ul class="dropdown-menu sub-menu" aria-labelledby="dropdownMenuButton1">
                                <li class="menu-item"><a href="<?php echo base_url(); ?>properties">Subscribe to a home</a></li>
                                <li class="menu-item"><a href="<?php echo base_url(); ?>">Upcoming homes</a></li>
                            </ul>
                        </li>
                        <li class="menu-item"><a href="https://buy.smallsmall.com">Buy</a></li>
                        <li class="menu-item"><a href="https://stay.smallsmall.com">Nightly stay</a></li>
                        <li class="menu-item"><a href="<?php echo base_url(); ?>partner-with-us">Property owner</a></li>
    
                        <?php if(@$userID && !@$ongod && @$user_type == 'tenant' ){ ?>
                        
                                <li class="menu-item"><a href="<?php echo base_url(); ?>user/dashboard" class="createbtn">Go to Dashboard</a></li>
                            
                        <?php }else if(@$userID && !@$ongod && @$user_type == 'landlord' ){ ?>
                        
                                <li class="menu-item"><a href="<?php echo base_url(); ?>landlord/dashboard" class="createbtn">Go to Dashboard</a></li>
                            
                        <?php }else{ ?>
                            
                                <li class="menu-item"><a href="<?php echo base_url(); ?>login" class="loginbtn">Login</a></li>
                                
                                <li class="menu-item"><a href="<?php echo base_url(); ?>signup" class="createbtn">Create Account</a></li>
                            
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <?php
        
        	$CI =& get_instance();
        
        	$property = $CI->insert_stats(); 	
        ?>