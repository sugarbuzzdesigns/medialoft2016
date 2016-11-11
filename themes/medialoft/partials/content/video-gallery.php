<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $page_title = get_the_title();
	if(isset($catParam)){
		$page_title = $catParam . ' videos';
	}
?>

<?php

$hideGalleryTitle = get_post_meta( get_the_ID(), 'medialoft_disable_gallery_title', true );

?>

<?php endwhile; endif; wp_reset_postdata(); ?>

<div class="gallery">
	<?php if($hideGalleryTitle != 'on') { ?>
		<h1 class="gallery-header"><span><?php echo $page_title; ?></span></h1>
	<?php } ?>
	<div class="gallery-inner grid grid-pad">
		<?php include( locate_template('partials/content/loop-video-gallery.php') ); ?>
	</div>

	<?php if (isset($_GET["category"])){ ?>
		<a class="return-breadcrumb" href="<?php echo $referrer; ?>"><span><</span> <span>Return to gallery</span></a>
	<?php } ?>
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