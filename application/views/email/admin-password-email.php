		<!----Body of email is in here ---->
		<div style="width:90%;font-family:gotham;padding:20px 0;margin:auto;">
			Hello <?php echo @$name; ?>,
			<p>
			   You have been added as administrator on the rentsmallsmall admin portal, below are the details needed to login.
			   
			   <table width="100%">
					<tr>
						<td width="150px"><span style="font-family:calibri;font-size:14px;font-weight:bold">Web URL</span></td>
						<td><span style="font-family:calibri;font-size:14px;">https://www.rent.smallsmall.com/admin</span></td>
					</tr>
					<tr>
						<td><span style="font-family:calibri;font-size:14px;font-weight:bold">Username</span></td>
						<td><span style="font-family:calibri;font-size:14px;"><?php echo @$username; ?></span></td>
					</tr>
					<tr>
						<td><span style="font-family:calibri;font-size:14px;font-weight:bold">Password</span></td>
						<td><span style="font-family:calibri;font-size:14px;"><?php echo @$password; ?></span></td>
					</tr>
				</table>
				<?php echo @$result_title; ?>
			</p>
			
		</div>
		<!----Body of email ends here ----->