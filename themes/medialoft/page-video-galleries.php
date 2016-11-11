<?php
/*
 Template Name: Video Galleries Template
*/
?>

<?php get_header('video-gallery'); ?>

<?php 

if (isset($_GET["category"])){
	$catParam = htmlspecialchars(strtolower($_GET["category"]));
	$referrer = wp_get_referer();
}

?>

<?php if($post->post_parent || isset($catParam)){ ?>		
	<?php include( locate_template( 'partials/content/video-gallery.php' ) ); ?>
<?php } else { ?>
	<?php include( locate_template( 'partials/content/video-galleries.php' ) ); ?>
<?php } ?>

<div class="svg-container">
	<svg version="1.1" id="shape-3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 		preserveAspectRatio="xMidYMid slice" viewBox="0 0 473.25 589.75" enable-background="new 0 0 473.25 589.75" xml:space="preserve">
	<path fill="none" stroke="#4C4B4C" stroke-width="0.5" stroke-miterlimit="10" d="M420.667,288.398l49.592-49.592
		c1.687-1.687,1.687-4.422,0-6.109L240.479,2.916c-1.688-1.687-4.424-1.687-6.11,0L121.684,115.601c-1.687,1.687-1.687,4.422,0,6.109
		l166.259,166.26"/>
	<path fill="none" stroke="#4C4B4C" stroke-width="0.5" stroke-miterlimit="10" d="M115.135,454.645c1.687,1.687,4.422,1.687,6.109,0
		l229.781-229.782c1.688-1.687,1.688-4.422,0-6.109L238.342,106.069c-1.688-1.687-4.424-1.687-6.11,0L2.45,335.85
		c-1.687,1.688-1.687,4.422,0,6.109L115.135,454.645z"/>
	<path fill="none" stroke="#4C4B4C" stroke-width="0.5" stroke-miterlimit="10" d="M65.96,405.469L2.839,468.59
		c-1.687,1.687-1.687,4.422,0,6.109l112.684,112.685c1.687,1.687,4.423,1.687,6.11,0l299.01-299.01"/>
	<path fill="none" stroke="#4C4B4C" stroke-width="0.5" stroke-miterlimit="10" d="M301.849,407.168l47.451,47.451
		c1.687,1.687,4.423,1.687,6.11,0l112.684-112.685c1.688-1.687,1.688-4.423,0-6.11L351.027,218.758"/>
	<path fill="none" stroke="#4C4B4C" stroke-width="0.5" stroke-miterlimit="10" d="M235.699,473.316l114.066,114.067
		c1.688,1.688,4.422,1.688,6.109,0l109.818-109.761c1.687-1.688,3.277-4.213,2.865-9.033l0.8-129.685"/>
	<line fill="none" stroke="#4C4B4C" stroke-width="0.5" stroke-miterlimit="10" x1="1.186" y1="338.904" x2="1.573" y2="471.645"/>
	</svg>
</div>

<?php get_footer('video-gallery'); ?>
