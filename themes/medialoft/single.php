<style type="text/css">
    .main-menu,
    #main-logo {
        display: none;
    }
</style>

<?php get_header(); ?>
    <section id="blog">
        <div class="articles group">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                    $cats = get_the_category();
                    $cat = $cats[0];
                    $catName = $cat->name;
                    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id() );
                    $format = get_post_format();

                    $videoUrl = get_post_meta( get_the_ID(), 'medialoft_post-video', true );
                ?>
                <article id="<?php echo seoUrl(get_the_title()); ?>" class="blog-article no-related-articles show-article">
                    <a class="header" href="#" class="header">
                        <div class="inner">
                            <div class="header-copy">
                                <div class="video-article-headline">
                                    <h2 class="title"><?php echo get_the_title(); ?></h2>
                                    <?php if($format == 'video' && $videoUrl){ ?>
                                        <div class="video-start play-full-screen" data-video="<?php echo seoUrl(get_the_title()); ?>-video" data-video-src="<?php echo $videoUrl; ?>">
                                            <div></div>
                                            <div></div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="info">
                                    <span class="category"><?php echo $catName; ?></span> / <span class="date"><?php echo get_formatted_date(get_the_date('m-d-y')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="full-bleed blog-header-bg" style="background-image:url(<?php echo $thumbnail_src[0]; ?>);"></div>
                    </a>
                    <div class="article-content">
                        <?php the_content(); ?>
                        <div class="social">
                            <!-- http://www.facebook.com/sharer/sharer.php?u=[URL]&title=[TITLE] -->
                            <a class="facebook" data-url="/blog/#!/<?php echo seoUrl(get_the_title()); ?>" data-title="<?php echo get_the_title(); ?>" href=""><i class="fa fa-facebook-official"></i></a>
                            <!-- http://twitter.com/intent/tweet?status=[TITLE]+[URL] -->
                            <a class="twitter" data-url="/blog/#!/<?php echo seoUrl(get_the_title()); ?>" data-title="<?php echo get_the_title(); ?>" href=""><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </article>
            <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
        </div>

        <div id="blog-video-overlay" class="video-overlay">
            <a href="#" class="close-video"><i></i></a>
        </div>
        <a href="#" class="back">
            <img src="<?php echo MOBILE_IMG ?>/icons/nav-arrow-down-dark.png" alt="Media Loft" />
        </a>
    </section>
<?php get_footer(); ?>