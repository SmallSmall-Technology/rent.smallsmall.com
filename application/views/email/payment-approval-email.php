		<!----Body of email is in here ---->
		<div style="width:90%;font-family:gotham;padding:20px 0;margin:auto;">
		    Hello <?php echo @$name; ?>,
		    <p>
		        Good news!!! Your payment has been confirmed and approved for the following property <a style="color:#007DC1" href="https://www.rentsmallsmall.com/property/<?php echo @$prop_id; ?>"><?php echo @$propertyName; ?></a>
		    </p>
		    
		 
            <div style="width:100px;line-height:30px;border-radius:4px;text-align:center;margin:auto;border-radius:4px;"><a style="text-decoration:none;display:inline-block;width:100%;height:100%;background:#007DC1;color:#FFF;font-family:calibri;border-radius:4px;font-size:14px;" href="<?php echo base_url().'login'; ?>">Login</a></div>
		    
		</div>