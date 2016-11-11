<?php

get_header();

if (have_posts()) : while (have_posts()) : the_post();
	$email = get_post_meta( get_the_ID(), 'medialoft_email-address', true );
	$phone = get_post_meta( get_the_ID(), 'medialoft_phone-number', true );

	$address1 = get_post_meta( get_the_ID(), 'medialoft_address-1', true );
	$address2 = get_post_meta( get_the_ID(), 'medialoft_address-2', true );

	$map = get_post_meta( get_the_ID(), 'medialoft_directions', true );

endwhile; endif;
wp_reset_query();

?>
	<section id="contact-landing">
		<div class="hero">
			<p>say <em>hello.</em></p>
		</div>
		<div class="content">
			<div class="general-info">
				<?php if(!wp_is_mobile()){ ?>
					<div class="video-bg-container">
						<video id="contact-video" loop autoplay>
							<source src="https://player.vimeo.com/external/136555574.hd.mp4?s=b44e0310b68a126f339cae0ae86cb522&profile_id=113">
						</video>
					</div>
					<div class="blur-overlay"></div>
				<?php } else { ?>

				<?php } ?>
				<div class="inner">
					<div class="name-abbrev">mpls</div>
					<div class="clock"><i class="hours"></i><i class="minutes"></i></div>
					<div class="weather"></div>
				</div>
			</div>
			<div class="contact-info">
				<div class="inner">
					<h3>General Inquires</h3>
					<a class="email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
					<a class="tel" href="tel:+1<?php echo str_replace(array('.'), '' , $phone); ?>"><?php echo $phone; ?></a>
					<p class="address">
						<span><?php echo $address1; ?></span>
						<span><?php echo $address2; ?></span>
					</p>
					<a target="_blank" href="https://www.google.com/maps/dir/''/media+loft/data=!4m5!4m4!1m0!1m2!1m1!1s0x52b32d9d5517721b:0x5654a778fb32a43e?sa=X&ved=0CIQBEPUXMA9qFQoTCPH50cLNqccCFUaaHgodrQkEPg" class="directions"><span class="get-directions-icon"><div></div><div></div><i></i></span><span>Get Directions</span></a>

					<div class="social">
						<a href="https://www.facebook.com/TheMediaLoft"><i class="fa fa-facebook-official"></i></a>
						<a href="https://twitter.com/medialoft"><i class="fa fa-twitter"></i></a>
						<a href="https://instagram.com/medialoft/"><i class="fa fa-instagram"></i></a>
						<a href="https://www.linkedin.com/company/media-loft"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>