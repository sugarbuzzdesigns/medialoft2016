<?php
/*
 Template Name: About Page Dynamic
*/
?>

<?php get_header();

if (have_posts()) : while (have_posts()) : the_post();
	$landing_video = get_post_meta( get_the_ID(), 'medialoft_landing_video', true );
	$landing_video_poster = get_post_meta( get_the_ID(), 'medialoft_landing_video_poster', true );

	$culture_video = get_post_meta( get_the_ID(), 'medialoft_culture_full_video', true );
	$culture_video_poster = get_post_meta( get_the_ID(), 'medialoft_culture_video_poster', true );

	$culture_bg_video = get_post_meta( get_the_ID(), 'medialoft_culture_bg_video', true );
	$culture_bg_video_poster = get_post_meta( get_the_ID(), 'medialoft_culture_bg_video_poster', true );

endwhile; endif;
wp_reset_query();

$contact_page_query = new WP_Query( array( 'pagename' => 'contact' ) );
if( $contact_page_query->have_posts() ) {
	while ( $contact_page_query->have_posts() ) : $contact_page_query->the_post();

	endwhile;
}
wp_reset_query();


$employees_query = new WP_Query( array(
    'post_type' => 'employee',
    'posts_per_page' => -1
));

$employeesInfo = array();
$employees = array();

if( $employees_query->have_posts() ) {
	while ( $employees_query->have_posts() ) : $employees_query->the_post();

		$employee_name = get_the_title();
		$employee_logo = get_post_meta( get_the_ID(), 'medialoft_about_employee_image', true );
		$employee_logo_hover = get_post_meta( get_the_ID(), 'medialoft_about_employee_hover_image', true );

		$employeesInfo[$employee_name] = array(
			'name' => $employee_name,
			'logo' => $employee_logo,
			'logo_hover' => $employee_logo_hover
		);

		array_push($employees, $employee_name);

	endwhile;
}

wp_reset_query();


$clients_query = new WP_Query( array(
    'post_type' => 'client',
    'posts_per_page' => -1
));

$clientsInfo = array();
$clients = array();

if( $clients_query->have_posts() ) {
	while ( $clients_query->have_posts() ) : $clients_query->the_post();

		$client_name = get_the_title();
		$client_logo = get_post_meta( get_the_ID(), 'medialoft_about_client_image', true );
		$client_logo_hover = get_post_meta( get_the_ID(), 'medialoft_about_client_hover_image', true );

		$clientsInfo[$client_name] = array(
			'name' => $client_name,
			'logo' => $client_logo,
			'logo_hover' => $client_logo_hover
		);

		array_push($clients, $client_name);

	endwhile;
}

wp_reset_query();

?>

<script>
	var clientsInfo = <?php echo json_encode($clientsInfo); ?>;
	var clients = <?php echo json_encode($clients); ?>;

	var employeesInfo = <?php echo json_encode($employeesInfo); ?>;
	var employees = <?php echo json_encode($employees); ?>;

</script>
	<section data-section-name="section-about-landing" id="about-landing">
		<div class="sqr"></div>
		<div class="cta">
			<h2 class="tagline single-line">
				<span class="grey">40 great years</span>
				<span>an ongoing success story</span>
			</h2>
			<?php if(!wp_is_mobile()){ ?>
				<p>Media Loft is a 100% employee-owned company that produces corporate<br>events across the globe, with account, technical, creative, design, video<br>production and interactive technology services all under one roof.</p>
			<?php } else { ?>
				<p>Media Loft is a 100% employee-owned company that produces corporate events across the globe, with account, technical, creative, design, video production and interactive technology services all under one roof.</p>
			<?php } ?>
			<div class="nav-arrow-down animate-flicker">
				<img src="<?php echo MOBILE_IMG ?>/icons/nav-arrow-down.png" alt="Media Loft" />
				<img src="<?php echo MOBILE_IMG ?>/icons/nav-arrow-down.png" alt="Media Loft" />
			</div>
		</div>

		<?php if(!wp_is_mobile()){ ?>
			<div class="video-bg-container">
				<video id="landing-video" autoplay loop style="background-image:url(<?php echo $landing_video_poster; ?>);">
					<source src="<?php echo $landing_video; ?>">
				</video>
			</div>
		<?php } ?>
		<div class="blur-overlay show"></div>
	</section>
	<section data-section-name="section-timeline2" id="timeline2">
		<div class="large-date-wrap">
			<span class="large-date">74</span>
		</div>
		<div id="explore-timeline">
			<span>explore our history</span>
			<div class="nav-arrow-right animate-flicker">
				<img src="<?php echo MOBILE_IMG ?>/icons/nav-arrow-down.png" alt="Media Loft" />
				<img src="<?php echo MOBILE_IMG ?>/icons/nav-arrow-down.png" alt="Media Loft" />
			</div>
		</div>

		<div class="timeline-wrap">
			<article></article>
			<article></article>
			<article></article>
			<article></article>
		</div>
		<div class="full-bleed">
			<img src="" style="display:none;">
			<div class="cover"></div>
		</div>

		<div id="timeline-video-overlay" class="video-overlay">
			<a href="#" class="close-video"><i></i></a>
		</div>
	</section>
	<section data-section-name="section-clients" class="tile-container" id="clients">
		<div class="cta alternate">
			<h2 class="tagline">
				<?php if(!wp_is_mobile()){ ?>
					<span>relationships measured in decades,</span>
					<span>not years</span>
				<?php } else { ?>
					<span>relationships measured</span>
					<span>in decades, not years</span>
				<?php } ?>
			</h2>
		</div>
		<div data-img="" class="tile empty"></div>
		<div data-img="" class="tile client dark"></div>
		<div data-img="" class="tile client"></div>
		<div data-img="" class="tile client dark"></div>
		<div data-img="" class="tile client"></div>
		<div data-img="" class="tile client dark"></div>

		<div data-img="" class="tile empty"></div>
		<div data-img="" class="tile empty"></div>
		<div data-img="" class="tile empty"></div>
		<div data-img="" class="tile client"></div>
		<div data-img="" class="tile client"></div>
		<div data-img="" class="tile client dark"></div>

		<div data-img="" class="tile client"></div>
		<div data-img="" class="tile client dark"></div>
		<div data-img="" class="tile client"></div>
		<div data-img="" class="tile client dark"></div>
		<div data-img="" class="tile client"></div>
		<div data-img="" class="tile client dark"></div>

		<div class="svg-container animated-svg">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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
	</section>
	<section data-section-name="section-people" class="tile-container" id="people">
		<div class="cta alternate">
			<h2 class="tagline">
				<span>our people make</span><span>it all possible</span>
			</h2>
		</div>
		<div class="tile empty"></div>
		<div class="tile employee"></div>
		<div class="tile employee"></div>
		<div class="tile employee"></div>
		<div class="tile employee"></div>
		<div class="tile employee"></div>

		<div class="tile employee mobile-empty"></div>
		<div class="tile employee mobile-empty"></div>
		<div class="tile employee"></div>
		<div class="tile employee"></div>
		<div class="tile employee"></div>
		<div class="tile employee"></div>

		<div class="tile employee"></div>
		<div class="tile employee"></div>
		<div class="tile employee"></div>
		<div class="tile employee"></div>
		<div class="tile employee"></div>
		<div class="tile employee"></div>

		<div class="svg-container animated-svg">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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
	</section>
	<section data-section-name="section-culture" id="culture">
		<div class="cta centered">
			<?php if(!wp_is_mobile()){ ?>
			<h2 class="tagline one-liner alternate-red">
				<span>fun is <em>always</em> in the equation</span>
			</h2>
			<?php } else { ?>
			<h2 class="tagline alternate-red">
				<span>fun is <em>always</em> in</span>
				<span>the equation</span>
			</h2>
			<?php } ?>

			<a class="play-reel" href="#">
				<i class="ml-play white"></i>
				<i class="ml-play black"></i>
				<span>Play Reel</span>
			</a>
		</div>

		<?php if(!wp_is_mobile()){ ?>
			<div class="video-bg-container">
				<video id="about-culture-video-loop" autoplay loop style="background-image:url(<?php echo $culture_bg_video_poster; ?>);">
					<source src="<?php echo $culture_bg_video; ?>">
				</video>
			</div>
			<div class="blur-overlay show"></div>
		<?php } ?>
		<div class="video-overlay">
			<video width="auto" height="auto" class="video-js vjs-default-skin" controls data-setup='{}' id="about-culture-video-full" style="background-image:url(<?php echo $culture_video_poster; ?>);">
				<source src="<?php echo $culture_video; ?>">
			</video>
			<a href="#" class="close-video"><i></i></a>
		</div>
		<div class="full-bleed" style="background-image:url(<?php echo IMG_DIR ?>/mobile/backgrounds/about/Culture_Vid_Static_BG.jpg);"></div>
	</section>
	<section data-section-name="section-join-us" id="join-us">
		<div class="contact-us">
			<div class="cta">
				<h2 class="tagline single-line alternate">
					<span>enough about us</span>
					<span>tell us about you</span>
				</h2>
			</div>
			<div class="email">
				<div>work</div>
				<div class="choose">
					<span class="selected">with</span>
					<span class="choice active" data-mailto="mailto:contact@medialoft.com"><i class="check"></i> with</span>
					<span class="choice" data-mailto="mailto:careers@medialoft.com"><i class="check"></i> at</span>
				</div>
				<div>media loft</div>
				<div class="right-col">
					<div class="email-link"><a href="mailto:contact@medialoft.com">talk to us <i class="fa fa-chevron-right"></i></a></div>
					<div class="visit-contact"><span>or </span><a href="<?php echo get_site_url(); ?>/contact">visit contact page <i class="fa fa-chevron-right"></i></a></div>
				</div>
			</div>
		</div>
		<div class="full-bleed" style="background-image:url(<?php echo IMG_DIR ?>/768up/backgrounds/about/Join_Us_BG_02.jpg);"></div>
	</section>
	<script>
		var imgDir = '<?php echo IMG_DIR; ?>';
	</script>

	<?php
		$timeline_query = new WP_Query( array(
		    'post_type' => 'timeline_event',
		    'posts_per_page' => -1
		));

		$timeline_events = array();
		$timeline_events_first_group = array();
		$timeline_events_remaining = array();

		$event_data = array();

		// how many events we have
		$event_count = 0;

		// how many event sections we have
		$event_section_count = 0;

		// pattern for first event block
		$first_event_section_pattern = array(4,3,2,2);
		$first_section_counter = true;
		$first_section_event_total = 11;

		// which pattern should we follow while looping
		// through the data. Once we are done with the first
		// section we will use the default pattern.
		$section_pattern = $first_event_section_pattern;

		// section pattern counter
		$section_pattern_counter = 0;

		// pattern for all other event blocks
		$event_block_pattern = array(3,3,2,2);

		if( $timeline_query->have_posts() ) {
			while ( $timeline_query->have_posts() ) : $timeline_query->the_post();

				$event_data['event_post_id'] = get_the_ID();
				$event_data['event_date'] = get_the_title();
				$event_data['event_content'] = get_the_content();

				$event_data['event_bg'] = get_post_meta( get_the_ID(), 'medialoft_about_timeline_bg_image', true );

				$event_video = get_post_meta( get_the_ID(), 'medialoft_about_timeline_video', true );

				if(!empty($event_video)){
					$event_data['event_video'] = $event_video;
				} else {
					$event_data['event_video'] = '';
				}

				array_push($timeline_events, $event_data);

			endwhile;
		}



		$date_classes = array(
			'left-top',
			'right-bottom',
			'right-top',

			'left-top',
			'right-bottom',
			'right-top',

			'left-top',
			'right-top',

			'right-bottom',
			'right-top'
		);

		$date_classes_counter = 0;
		?>

	<div id="timeline-data" style="display:none;">
		<div class="timeline-container">
			<div class="timeline-block">
			<?php
				$i = 0;
				$event_counter = 0;
				$temp_event_counter = 0;
				$timeline_events = array_reverse($timeline_events);

				foreach($timeline_events as $timeline_event){
					$temp_event_counter++;
				    $event_counter++;
				    $date_class = 'left-bottom';

				    if($event_counter > 1){
				    	$date_class = $date_classes[$date_classes_counter];
				    	$date_classes_counter++;

				    	if($date_classes_counter == count($date_classes)){
							$date_classes_counter = 0;
				    	}
				    }
				    ?>

					<a style="display:block;" href="#" data-info-id="<?php echo $timeline_event['event_date']; ?>" data-bg-image="<?php echo $timeline_event['event_bg']; ?>" class="date <?php echo $date_class; ?>">
						<span class="num"></span>
						<span class="close"></span>
						<span class="info">
							<?php echo $timeline_event['event_content']; ?>
							<?php if($timeline_event['event_video'] != ''){ ?>
							<span class="play-reel" href="#" data-video-url="<?php echo $timeline_event['event_video']; ?>">
								<i class="icon-play-btn"></i>
								<span>Watch Video</span>
							</span>
							<?php } ?>
						</span>
					</a>

					<?php

				    if($temp_event_counter == $section_pattern[$section_pattern_counter]){
				    	echo '</div><div class="timeline-block">';
				    	// if($event_counter <= count($timeline_events)){
				    	// 	echo '<div class="timeline-block">';
				    	// }

				    	$temp_event_counter = 0;
				    	$section_pattern_counter++;
				    }

				    if($section_pattern_counter == 4){
				    	if($first_section_counter == true){
				    		$section_pattern = $event_block_pattern;
				    		$first_section_counter = false;
				    	}

				    	$section_pattern_counter = 0;
				    }
				}
			?>
			</div>
		</div>
		<div class="large-date"></div>
		<script>
			var timeLineImageDir = "";
		</script>
		<div class="full-bleed">
			<img src="" style="display:none;">
			<div class="cover"></div>
		</div>
	</div>

	<?php include('partials/about-menu.php'); ?>
<?php get_footer(); ?>