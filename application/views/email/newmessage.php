		<!----Body of email is in here ---->
		<div style="width:90%;font-family:gotham;padding:20px 0;margin:auto;">
		    Hello <?php echo @$name; ?>,
		    <p>
		        You have a new message waiting in your inbox. Click login below to go to sign in on your SmallSmall dashboard.
		    </p>
		    
		    <div style="width:100%;	display:inline-block;text-align:center;font-family:calibri;font-size:14px;margin-right:auto;margin-left:auto;margin-bottom:20px;font-style:italic;color:#202423">
						    <?php echo @$message; ?>
						</div>

            <div style="width:100px;line-height:30px;border-radius:4px;text-align:center;margin:auto;border-radius:4px;"><a style="text-decoration:none;display:inline-block;width:100%;height:100%;background:#007DC1;color:#FFF;font-family:calibri;border-radius:4px;font-size:14px;" href="<?php echo base_url().'login'; ?>">Login</a></div>
		    
		</div>