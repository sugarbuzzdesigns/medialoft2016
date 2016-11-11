<?php
	global $detect;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js <?php if(wp_is_mobile()){ echo 'mobile'; } ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicon.png">
	<!-- <script type="text/javascript" async src="<?php bloginfo('template_directory'); ?>/assets/js/src/libs/videojs.min.js"></script> -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/simple-grid.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/clipboard.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/video-gallery.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php include('partials/gallery-loader.php'); ?>
	<div class="wrap<?php if(!$post->post_parent && !isset($_GET["category"])){ echo ' toc'; }?>	">
		<a id="video-gallery-main-logo" class="video-gallery-logo" target="_blank" href="<?php echo get_site_url(); ?>/">
			<span><img src="<?php bloginfo('template_directory'); ?>/assets/images/logos/ML_Logo_video_gallery_bw.png" alt="Media Loft" /></span>
		</a>