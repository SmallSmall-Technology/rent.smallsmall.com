		<table width="100%" style="margin-top:30px">
			<tr>
				<td width="100%">
					<div class="message-container" style="width:100%;border-radius:10px;text-align:center;background:#F2FCFB;padding:40px;">
						<div style="width:100%;	min-height:10px;overflow:auto;text-align:center;font-family:calibri;font-size:30px;margin-bottom:20px;" class="name">
							Hello <?php echo @$name; ?>,
						</div>
						<div style="width:100%;min-height:10px;overflow:auto;text-align:center;font-family:calibri;font-size:20px;margin-bottom:20px;" class="intro">
							<?php echo @$result_title; ?>
						
						</div>
						<div style="width:100%;min-height:30px;	overflow:auto;text-align:center;font-family:calibri;font-size:16px;margin-bottom:20px;" class="email-body">
							<?php echo @$result_note; ?>
						</div>
						<?php echo @$login_button; ?>
					</div>
				</td>
			</tr>
		</table> 