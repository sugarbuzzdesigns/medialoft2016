<style type="text/css">
	.single-timeline_event {
		padding: 150px 0 0 0;
	}

	.content {
		width: 80%;
		margin: 0 auto;
	}

	.event_bg {
		width: 50%;
	}

	.content div {
		background: #a5a5a5;
	}
</style>
<?php get_header(); ?>
	<div class="content">
		<!-- events -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php

			$event_bg = get_post_meta( get_the_ID(), 'medialoft_about_timeline_bg_image', true );
			$event_video = get_post_meta( get_the_ID(), 'medialoft_about_timeline_video', true );

			?>

			<header>
				<h1>Timeline Event Details</h1>
			</header>
			<div>
				<h3>Date:</h3>
				<?php the_title(); ?>
			</div>
			<div>
				<h3>Copy:</h3>
				<?php echo get_the_content(); ?>
			</div>
			<div>
				<h3>Event BG:</h3>
				<img class="event_bg" src="<?php echo $event_bg; ?>">
				</div>
			<?php if(!empty($event_video)){ ?>
			<div>
				<h3>Event Video:</h3>
				<?php echo $event_video; ?>
			</div>
			<?php } ?>
		<?php endwhile; ?>
		<?php else : ?>
			<div>Sorry, No preview Available</div>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>