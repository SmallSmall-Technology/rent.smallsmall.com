
		<!----Body of email is in here ---->
		<div style="width:90%;font-family:calibri;padding:20px 0;margin:auto;">
		    Hello <?php echo @$name; ?>,
		    <p>
		        Thank you for booking an inspection for one of our properties, your inspection details are below.
		    </p>

            <p>
                Our Customer experience team will contact you via email to confirm availability of your selected inspection date: <?php echo $inspectionDate; ?>, if that date is not available our team we will suggest a more suitable date.
            </p>
            <table width="100%">
				<tr style="background:#f2f2f2">
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Property Name :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $propName; ?></td>
				</tr>
				<tr>
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Property Address :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $propAddress; ?></td>
				</tr>
				<tr style="background:#f2f2f2">
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Date of inspection :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $inspectionDate; ?></td>
				</tr>
				<tr>
					<td valign="top" style="text-align:left;line-height:30px" valign="top" width="50%"><b style="color:#007DC1">Type of inspection :</b></td>
					<td valign="top" style="text-align:left;line-height:30px" valign="top"><?php echo $inspectionType; ?></td>
				</tr>
			</table>
		    
		</div>
