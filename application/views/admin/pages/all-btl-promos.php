<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-home icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>
					    Promos
					</div>
				</div>
			</div>
		</div>            
	
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">All Promos
						
						<div class="btn-actions-pane-right">
                        	
						</div>
					</div>
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th class="text-left">&nbsp;</th>
								<th class="text-left">Title</th>
								<th class="text-left">Type</th>
								<th class="text-left">Value</th>
								<th class="text-left">Status</th>
								<th class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = ''; 
								$code = '';
								$CI =& get_instance();

								if (isset($promos) && !empty($promos)) {
									foreach($promos as $promo => $value) {

										$subs = 0;
										
										if($value['status']){
											$stat = 'badge-success';
                                            $msg = 'Active';
										}else{
											$stat = 'badge-warning';
                                            $msg = 'Inactive';
										}

										if($value['type'] == 'Discount'){
											$code = $value['discount_code'];										
										}else{
											$code = $value['promo_code'];
										}

										$subs = $CI->admin_model->getPromoSubscribers($code);
                                        
                                        
							?>	

							<tr>
								<td class="text-left"><input type="checkbox" class="notification-checkbox" id="<?php echo $value['id'] ?>" /></td> 
								<td class="text-left">
                                    <?php echo $value['promo_title'].' ('.$code.')'; ?>
                                    <div style="font-weight:bold;font-size:14px;color:#495057;opacity:.6" class="widget-subheading">
                                        <b style="color:#3f6ad8">From:</b> <?php echo date("d M Y" , strtotime($value['start_date'])); ?> <b style="color:#3f6ad8">To:</b> <?php echo date("d M Y" , strtotime($value['end_date'])); ?><br />
                                        <b style="color:#3f6ad8">Subscribers:</b> <?php echo number_format($subs); ?>
								    </div>
                                </td>
								
								<td class="text-left"><?php echo $value['type']; ?></td>
								<td class="text-left"><?php echo $value['promo_value']; ?></td>
								<td class="text-left"><div class="mb-2 mr-2 badge <?php echo $stat; ?>"><?php echo $msg ?></div></td>
								
					
								<td class="text-left">
									<div class="action-container">
                                        <?php if($value['status']){ ?>
										    <a type="button" style="color:#FFF" id="deactivate-<?php echo $value['id']; ?>" class="btn btn-danger btn-sm deactivate-promo">Deactivate</a>
                                        <?php }else{ ?>
                                            <a type="button" style="color:#FFF" id="reactivate-<?php echo $value['id']; ?>" class="btn btn-success btn-sm reactivate-promo">Reactivate</a>
                                        <?php } ?>

										<button type="button" id="delete-<?php echo $value['id']; ?>-<?php echo $value['id']; ?>" class="btn btn-primary btn-sm delete-promo">Delete</button>

									</div>
								</td> 
							</tr>
							<?php 
									}
								}
						
							?>
							
							</tbody>
						</table>
					</div>
					<div class="d-block text-center card-footer">
						<div class="paginated"><?php echo $this->pagination->create_links(); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>