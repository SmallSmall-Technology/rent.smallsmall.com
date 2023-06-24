                        <div class="message-action-container">
                            <span class=""><a href="<?php echo base_url()."landlord/messages"; ?>">Inbox</a></span>|<span class="active-msg-btn"><a href="<?php echo base_url()."landlord/sent-messages"; ?>">Sent messages</a></span>
                        </div>
                        <div class="user-mainbar-content">
							<!---<div class="welcome-big">Accounts</div>--->
						<?php if(isset($sent_messages) && !empty($sent_messages)){ ?>
		                    <?php foreach($sent_messages as $sent_message => $value){ ?>
							
							<div class="msg-strip <?php if($value['status'] == 'Unread'){ echo 'orange-tint'; } ?>">
								<div class="msg-inner-items text-left">
									<img src="<?php echo base_url(); ?>assets/img/logo-rss.png" alt="RSS Logo" />
								</div>
								<div class="msg-inner-items">
									<div class="msg-inner-light text-left">From</div>
									<div class="msg-inner-heavy text-left"><?php echo $value['firstName'].' '.$value['lastName']; ?></div>
								</div>
								<div class="msg-inner-items">
									<div class="msg-inner-light text-left">Date</div>
									<div class="msg-inner-heavy text-left"><?php echo date('d.m.Y', strtotime($value['received_on'])); ?></div>
								</div>
								<div class="msg-inner-items">
									<div class="msg-inner-light text-center">Status</div>
									<div class="msg-inner-heavy text-center"><?php echo $value['status']; ?></div>
								</div>
								<div class="msg-inner-items">
									<div class="reply-button-o">View <span class="fa fa-angle-down"></span></div>
								</div>
							</div>
							<?php } ?>
						<?php }else{ ?>
						    <div style="width:100%;font-weight:bold;color:#03100D;text-align:left;font-size:14px;">No messages in you inbox yet.</div>
						<?php } ?>
						    
						    <div class="paginated"><?php echo $this->pagination->create_links(); ?></div>
							
						</div>
					</div>