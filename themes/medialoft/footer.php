	<?php include('partials/main-menu.php'); ?>
	</div>
	<div id="full-screen-video"><a href="#" class="close-video"><i></i></a></div>

	<div id="warning-message">
		<p>Please rotate your device</p>
	</div>
	<?php
	   /* Always have wp_footer() just before the closing </body>
	    * tag of your theme, or you will break many plugins, which
	    * generally use this hook to reference JavaScript files.
	    */
	    wp_footer();
	?>
</body>