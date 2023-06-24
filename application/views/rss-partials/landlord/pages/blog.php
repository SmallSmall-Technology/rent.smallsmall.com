	<div class="pane">
		<div style="text-align:center" class="pane-inner ">
			<h1>Blog</h1>
			<h5 style="width:100%;">Latest news and resources</h5>
		</div>
	</div>
	<div class="item-pane">
		<div class="page-inner">
			<ul class="blog-container">
				<?php if(isset($articles) && !empty($articles)){ ?>
					<?php foreach($articles as $article => $news){ ?>
							<li class="blog-item">
								<a style="text-decoration:none" href="<?php echo base_url().'article/'.$news['articleSlug']; ?>">
									<div class="blog-image" style="background-image:url(<?php echo base_url(); ?>uploads/news/<?php echo $news['articleSlug'].'/'.$news['featuredImage']; ?>)">
										
									</div>
									<div class="blog-title">
										<?php echo substr($news['articleTitle'], 0, 30) . "..."; ?>
									</div>
									
									<div class="blog-title-mobile">
										<?php echo $news['articleTitle']; ?>
									</div>
									<div class="blog-note">
										<?php 

											$content = substr(strip_tags(html_entity_decode($news['content'])), 0, 110) . "...";
											echo $content;
											//echo substr($content, 0, 110) . "..."; 
										?>

									</div>
									<div class="blog-date">
										RentSmallSmall &nbsp;&nbsp; <?php echo date('H:ia d.m.Y', strtotime($news['datePosted'])); ?>
									</div>
								</a>
							</li>
				
					<?php } ?>
				<?php }else{ ?>
					<div style="width:100%;min-height:10px;overflow:auto;font-family:avenir-demi;font-size:20px;">No articles to display</div>
				<?php } ?>
			</ul>
			<div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
		</div>
	</div>