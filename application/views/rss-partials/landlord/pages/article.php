<div class="pane">
		<div style="text-align:center" class="pane-inner ">
			<h1>Blog</h1>
			<h5 style="width:100%;">Latest news and resources</h5>
		</div>
	</div>
	<div class="item-pane">
		<div class="page-inner">
			<div class="article-container">
				<div class="article-title"><?php echo $article['articleTitle']; ?></div>
				<div class="article-image">
					<img src="<?php echo base_url().'uploads/news/'.$article['articleSlug'].'/'.$article['featuredImage']; ?>" />
				</div>
				<div class="article-author">Posted On <?php echo date('H:ia d.m.Y', strtotime($article['datePosted'])); ?></div>
				<div class="article-content">
				    <pre><code>
					<?php echo html_entity_decode($article['content']); ?>
					</code></pre>
					<div class="blog-share-container">
					    <div class="blog-share-text">Share</div>
					    <div class="blog-share">
					        <span class="blog-share-item"><a class="js-share-twitter-link" href="https://twitter.com/intent/tweet?url=<?php echo base_url().'article/'.$article['articleSlug']; ?>"><i class="fa fa-twitter"></i></a></span>
					        <span class="blog-share-item"><a href="javascript:fbShare('<?php echo base_url().'article/'.$article['articleSlug']; ?>', '<?php echo @$article['articleTitle']; ?>', 'RentSmallSmall Blog', '<?php echo base_url().'uploads/news/'.$article['articleSlug'].'/'.$article['featuredImage']; ?>', 520, 350)"><i class="fa fa-facebook"></i></a></span>
					        <span class="blog-share-item"><a target="_blank" href="http://www.linkedin.com/shareArticle?url=<?php echo base_url().'article/'.$article['articleSlug']; ?>"><i class="fa fa-linkedin"></i></a></span>
					        <span class="blog-share-item mobile-share"><a href="whatsapp://send?text=<?php echo base_url().'article/'.$article['articleSlug']; ?>" data-action="share/whatsapp/share" target="_blank"><i class="fa fa-whatsapp"></i></a></span>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
	$('.js-share-twitter-link').click(function(e) {
		e.preventDefault();
		var href = $(this).attr('href');
		window.open(href, "Twitter", "height=285,width=550,resizable=1");
	});
</script>