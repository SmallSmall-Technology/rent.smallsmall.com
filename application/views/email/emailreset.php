	    
	    
	    <!----Body of email is in here ---->
		<div style="width:90%;font-family:calibri;padding:20px 0;margin:auto;">
			Hello <?php echo @$name; ?>,
			<p>
			    You have initiated a password reset on rent.smallsmall.com. Click on the button below to complete the password reset process.<p> The reset link is valid for only 48 hours. Alternatively, you can copy and paste the link below in the address bar of your browser.
			</p>
			<div style="background:#f2f2f2;color:#007DC1;font-family:avenir-italic;font-size:14px;padding:10px;border-radius:8px;margin-bottom:15px;margin-top:15px;">
			<?php echo @$resetLink; ?></div>
			<div style="width:200px;line-height:30px;border-radius:4px;text-align:center;margin:auto;border-radius:4px;" class="verify-but"><a style="text-decoration:none;display:inline-block;width:100%;height:100%;background:#007DC1;color:#FFF;font-family:calibri;border-radius:4px;font-size:14px;" href="<?php echo @$resetLink; ?>">Reset</a></div>
		</div>
			
			
				<!--Using Unione Template-->
			
		<!-- <!DOCTYPE html>
        <html>
            
            <head>
                
                <title>Rentsmallsmall Template Email</title>
                
            </head>
            
            <body>
                
                <pre><?php echo $response; ?></pre>
                
            </body>
            
        </html> -->
