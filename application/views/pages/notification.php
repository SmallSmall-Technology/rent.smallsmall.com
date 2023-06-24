	<div class="news-content">
	    <!---<div class="blog-title-header">
            <div class="blog-main-title">Article</div>
            <div class="blog-main-subtitle">Follow RentSmallsmall’s blog for the latest news in the housing space, industry insights, how-to guides, and product updates</div>
        </div>--->
        <div class="article-container">
			<div class="article-title"><?php echo $notification['mesage']; ?></div>
		<!---<div class="article-image">
				<img src="<?php //echo base_url().'uploads/news/'.$notification['notification_slug'].'/'.$article['featuredImage']; ?>" />
			</div>--->
			<div class="article-author">Posted On <?php echo date('d.m.Y', strtotime($article['entry_date'])); ?></div>
			<div class="article-content">
				<?php echo htmlspecialchars_decode(str_replace("amp;","",$article['content'])); ?>
				<div class="blog-share-container">
				    <div class="blog-share-text">Share</div>
				    <div class="blog-share">
				        <span class="blog-share-item"><a class="js-share-twitter-link" href="https://twitter.com/intent/tweet?url=<?php echo base_url().'article/'.$article['articleSlug']; ?>"><i class="fa fa-twitter"></i></a></span>
				        <span class="blog-share-item"><a href="javascript:fbShare('<?php echo base_url().'article/'.$article['articleSlug']; ?>', '<?php echo $article['articleTitle']; ?>', 'RentSmallSmall Blog', '<?php echo base_url().'uploads/news/'.$article['articleSlug'].'/'.$article['featuredImage']; ?>', 520, 350)"><i class="fa fa-facebook"></i></a></span>
				        <span class="blog-share-item"><a target="_blank" href="http://www.linkedin.com/shareArticle?url=<?php echo base_url().'article/'.$article['articleSlug']; ?>"><i class="fa fa-linkedin"></i></a></span>
				        <span class="blog-share-item mobile-share"><a href="whatsapp://send?text=<?php echo base_url().'article/'.$article['articleTitle']; ?>" data-action="share/whatsapp/share" target="_blank"><i class="fa fa-whatsapp"></i></a></span>
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