	<div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-news-paper text-success">

						</i>

					</div>

					<div>

						Edit Article						

					</div>

				</div>

				</div>

		</div> 

		<div class="tab-content">			

			<div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">

				<div class="main-card mb-3 card">

					<div class="card-body"><h5 class="card-title">Edit</h5>
					<div class="form-report"></div>
					<form id="editNewsForm" enctype="multipart/form-data">



						<div class="position-relative row form-group"><label for="articleSubject" class="col-sm-2 col-form-label">Title</label>

							<div class="col-sm-10"><input name="articleSubject" id="articleSubject" value="<?php echo $article['articleTitle']; ?>" type="subject" class="form-control verify-txt"></div>

						</div>



						<div class="position-relative row form-group"><label for="content" class="col-sm-2 col-form-label">Content</label>

							<div class="col-sm-10">
								<textarea name="content" id="txtDefaultHtmlArea" class="form-control content verify-txt" rows="15"><?php echo html_entity_decode($article['content']); ?></textarea>
							</div>

						</div>

						<div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Article Image</label>

							<div class="col-sm-10"><input id='userfile' name='userfile' type="file" class="form-control-file">

								<small class="form-text text-muted">Select an image for the article (JPG, GIF or PNG format only)</small>

							</div>

						</div>
						<div class="position-relative row form-group"><label for="articleCredit" class="col-sm-2 col-form-label">Article Credit</label>

							<div class="col-sm-10"><input name="articleCredit" id="articleCredit" value="<?php echo $article['credit']; ?>" type="subject" class="form-control"></div>

						</div>

                        <input type="hidden" value="<?php echo $article['articleID']; ?>" id="articleID" />
                        <input type="hidden" value="<?php echo $article['featuredImage']; ?>" id="featImg" />
                        <input type="hidden" value="<?php echo $article['articleSlug']; ?>" id="slug" />
                        
						<div class="position-relative row form-check">

							<div class="col-sm-10 offset-sm-2">

								<button class="submit-but btn btn-primary">Save</button>

							</div>

						</div>
                        


					</form>

					</div>

				</div>

			</div>

		</div>

	</div>