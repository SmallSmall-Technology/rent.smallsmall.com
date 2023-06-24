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
					    Buy2Let FAQs
					</div>
				</div>
			</div>
		</div>            
	    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a role="tab" class="nav-link active" data-toggle="modal" data-target="#exampleModalLong">
                    <span>New Entry <i style="font-size:14px;marginleft:5px;" class="fa fa-plus"></i></span>
                </a>
            </li> 	
        </ul>
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">
						<div class="btn-actions-pane-right">
													
                        	
						</div>
					</div>
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th class="text-left"><b>#</b></th>
								<th class="text-left">Question</th>
								<!--<th class="text-left">Location</th>
								<th class="text-left">Type</th>-->
								<th class="text-left">Answer</th>
								<th class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php

							    
							    
								$stat = '';
								$CI =& get_instance();
								
								if (isset($questions) && !empty($questions)) {
									foreach($questions as $question => $value) {
										
										
							?>	

							<tr>
								<td class="text-left"><?php echo $value['faq_order']; ?><!---<input type="checkbox" class="faq-checkbox" id="<?php //echo $value['id'] ?>" />---></td> 
								<td class="text-left"><b><?php echo $value['question']; ?></b></td>
								
								<td class="text-left"><?php echo $CI->shorten_title($value['answer']); ?></td>
								
								<td class="text-left">
									<div class="action-container">
										<button type="button" id="faq-<?php echo $value['id']; ?>" class="btn btn-primary btn-sm faq-edit">Edit</button>
										
										<button type="button" id="faq-<?php echo $value['id']; ?>" class="btn btn-primary btn-sm faq-delete">Delete</button>
										
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