
		
		<!----Body of email is in here ---->
		<div style="width:90%;font-family:gotham;padding:20px 0;margin:auto;">
			Hello <?php echo @$name; ?>,
			<p>
			   Thank you for registering, to complete profile registration we need you to verify your email by clicking on the <b>Verification</b> link below.  
			</p>
			<div style="width:100%;line-height:40px;border-radius:4px;text-align:center;margin:auto;margin-top:20px;border-radius:4px;background:#007DC1" ><a style="text-decoration:none;display:block;background:#007DC1;color:#FFF;font-family:calibri;border-radius:4px;font-size:14px;" href="<?php echo @$confirmationLink; ?>">Verify</a></div>

		</div>
		<!----Body of email ends here ----->
		
		
		