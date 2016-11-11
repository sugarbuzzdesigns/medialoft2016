<?php $videoCats = get_categories('video'); ?>

<div class="grid">
	<div class="galleries col-1-1">
		<ul>
		    <?php wp_list_pages( array(
		        'title_li'    => '<h2>All Video Galleries</h2>',
		        'child_of'    => $post->ID
		    )); ?>
		</ul>
		<ul>
			<li class="pagenav">
				<h2>Galleries By Category</h2>
				<ul>
					<?php foreach ($videoCats as $value) { ?>
						<li><a href="<?php echo get_site_url() ?><?php echo add_query_arg( array('category' => $value->name), '/video-galleries' ); ?>"><?php echo $value->name; ?></a></li>
					<?php } ?>					
				</ul>
			</li>
		</ul>
	</div>	
</div>	