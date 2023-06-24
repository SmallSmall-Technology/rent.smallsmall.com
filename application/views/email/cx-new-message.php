		<table width="100%" style="margin-top:30px">
			<tr>
				<td width="100%">
					<div class="message-container" style="width:100%;border-radius:10px;text-align:center;background:#F2FCFB;padding:40px;">
						<div style="width:100%;	min-height:10px;overflow:auto;text-align:center;font-family:calibri;font-size:30px;margin-bottom:20px;" class="name">Hi Guys,</div>
						<div style="width:100%;min-height:10px;overflow:auto;text-align:center;font-family:calibri;font-size:20px;margin-bottom:20px;" class="intro">New Message Alert</div>
						<div style="width:100%;min-height:30px;	overflow:auto;text-align:center;font-family:calibri;font-size:14px;margin-bottom:20px;"><?php echo @$name; ?> Just sent a message via the contact us form. <br /><br /><div style="width:100%;min-height:30px;overflow:auto;font-style:italic;color:#333;margin-bottom:15px;">"<?php echo @$msg; ?>"</div>Login to view contact information.</div> 
						
						<div style="width:100px;line-height:30px;border-radius:4px;text-align:center;margin:auto;border-radius:4px;" class="verify-but"><a style="text-decoration:none;display:inline-block;width:100%;height:100%;background:#007DC1;color:#FFF;font-family:calibri;border-radius:4px;font-size:14px;" href="<?php echo base_url().'admin'; ?>">Login</a></div>
					</div>
				</td>
			</tr>
		</table> 