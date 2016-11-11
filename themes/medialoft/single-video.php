<?php get_header('single-video'); ?>
	<div class="gallery">
		<h1 class="gallery-header"><span>Preview</span></h1>
		<div class="gallery-inner grid grid-pad">
			<script>
	    		var oneGalleryVideo = true;
	    	</script>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
					$columnSizeClass = 'col-1-2';
					$deepLinktitle = seoUrl(get_the_title());
					$cats = get_the_category();
					$cat = $cats[0]->name;
					$catLower = strtolower($cat);
					$desktopURL = get_post_meta( get_the_ID(), 'medialoft_desktop_url', true );
					$mobileURL = get_post_meta( get_the_ID(), 'medialoft_mobile_url', true );
					$poster = get_post_meta( get_the_ID(), 'medialoft_video_poster', true );
				?>
				<!-- post FOUND!! -->
				<div class="gallery-item <?php echo $columnSizeClass; ?> mobile-col-1-1 tablet-col-1-2" id="<?php echo $deepLinktitle; ?>" data-deep-link="<?php echo $deepLinktitle; ?>" data-item-index="<?php echo $index ?>" data-desktop-url="<?php echo $desktopURL; ?>" data-mobile-url="<?php echo $mobileURL; ?>" data-poster-url="<?php echo $poster; ?>">
					<div class="gallery-video">
						<div class="video-wrap">
							<div class="video-placeholder" data-video-id="gallery_video_<?php echo get_the_ID(); ?>" class="video-js vjs-default-skin" width="auto" height="auto" controls style="background-image:url(<?php echo $poster; ?>);"></div>
						</div>
						<p class="title"><?php the_title(); ?></p>
						<?php if ($cat) { ?>
							<p class="category"><a href="<?php echo get_site_url() ?><?php echo add_query_arg( array('category' => $catLower), '/video-galleries' ); ?>"><?php echo $cats[0]->name; ?></a></p>
						<?php } ?>
						<p class="description hide"><?php echo get_the_content(); ?></p>
						<p class="share-link hide"></p>
					</div>
				</div>

			<?php endwhile; ?>
			<?php else : ?>
				<div>Sorry, No preview Available</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="gallery-overlay">
		<span class="close-video"><i></i></span>
		<div class="gallery-overlay-item">
			<div class="video-wrap">
				<div class="video-start play-full-screen">
					<div></div>
					<div></div>
					<i></i>
				</div>
			</div>
			<div class="copy grid grid-pad">
				<div class="col col-5-12 tablet-col-1-1 mobile-col-1-1">
					<div class="content">
						<p class="title"></p>
						<p class="category"></p>

						<a href="#" class="share-link copy-to-clipboard" data-clipboard-text="" target="_blank"><i></i>Share Link</a>
					</div>
				</div>
				<div class="col col-7-12 tablet-col-1-1 mobile-col-1-1">
					<div class="content">
						<p class="description"></p>
					</div>
				</div>
			</div>
		</div>
		<nav>
			<span class="prev"></span>
			<span class="next"></span>
		</nav>
	</div>

	<!-- <div class="gallery-overlay-transition"></div> -->
<?php get_footer('video-gallery'); ?>