		<!----Body of email is in here ---->
		<div style="width:90%;font-family:gotham;padding:20px 0;margin:auto;">
		    Hi Guys,
		    <p>
		        Thank you for booking an inspection for one of our properties, your inspection details are below.
		    </p>

            <p>
                Our Customer experience team will contact you via email to confirm availability of your selected inspection date: <?php echo $inspectionDate; ?>, if that date is not available our team we will suggest a more suitable date.
            </p>
            <table width="100%">
		        <tr style="background:#f2f2f2">
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Tenant Name :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $custname; ?></td>
				</tr>
				<tr style="background:#f2f2f2">
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Tenant Email :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $custemail; ?></td>
				</tr>
				<tr style="background:#f2f2f2">
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC16">Tenant Phone :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $custphone; ?></td>
				</tr>
				<tr style="background:#f2f2f2">
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Lead Channel :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $leadchannel; ?></td>
				</tr>
				<tr style="background:#f2f2f2">
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Lead Source :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $leadsource; ?></td>
				</tr>
				<tr style="background:#f2f2f2">
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Signup Date :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $signup_date; ?></td>
				</tr>
				<tr style="background:#f2f2f2">
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Income :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $income; ?></td>
				</tr>
				<tr style="background:#f2f2f2">
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Property Name :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $propName; ?></td>
				</tr>
				<tr>
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Property Address :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $propAddress; ?></td>
				</tr>
				<tr style="background:#f2f2f2">
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Inspection Date & Time :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $inspectionDate; ?></td>
				</tr>
				<tr>
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Type of inspection :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $inspectionType; ?></td>
				</tr>
			</table>
		    
		</div>