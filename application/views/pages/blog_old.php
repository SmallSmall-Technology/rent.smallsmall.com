	<div class="other-content">
	   <div class="blog-container">
	    <div class="blog-title-header">
            <div class="blog-main-title">Blog</div>
            <div class="blog-main-subtitle">Follow RentSmallsmall’s blog for the latest news in the housing space, industry insights, how-to guides, and product updates</div>
        </div>
        <div class="blog-news-container">
            
            <?php if(isset($articles) && !empty($articles)){ ?>
					<?php foreach($articles as $article => $news){ ?> 
						<div class="blog-news-item">
							<a style="text-decoration:none" href="<?php echo base_url().'article/'.$news['articleSlug']; ?>">
								<div class="blog-image" style="background-image:url(<?php echo base_url(); ?>uploads/news/<?php echo $news['articleSlug'].'/'.$news['featuredImage']; ?>)">
									
								</div>
								<div class="blog-title">
									<?php echo substr($news['articleTitle'], 0, 50) . "..."; ?>
								</div>
								<div class="blog-note">
									<?php 

										$content = substr(strip_tags(html_entity_decode(str_replace("amp;","",$news['content']))), 0, 110) . "...";
										echo $content;
										//echo substr($content, 0, 110) . "..."; 
									?>

								</div>
								<div class="blog-date">
									RentSmallSmall &nbsp;&nbsp; <?php echo date('H:ia d.m.Y', strtotime($news['datePosted'])); ?>
								</div>
							</a>
						</div>
				
					<?php } ?>
				<?php }else{ ?>
					<div style="width:100%;display:inline-block;font-family:Gotham;font-size:18px;">No articles to display</div>
				<?php } ?>
            
            
        </div>
        <div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
    	</div>
	
	</div>
	</div>
	
	