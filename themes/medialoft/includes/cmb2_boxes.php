<?php

require_once('cmb2/show_on_child_metabox.php');

include 'metaboxes/cmb2_home_page.php';

add_action( 'cmb2_admin_init', 'cmb2_blog_post_metaboxes' );
add_action( 'cmb2_admin_init', 'cmb2_case_study_metaboxes' );
add_action( 'cmb2_admin_init', 'cmb2_page_specific_metaboxes' );
add_action( 'cmb2_admin_init', 'cmb2_video_metaboxes' );
add_action( 'cmb2_admin_init', 'cmb2_about_metaboxes' );

function cmb2_blog_post_metaboxes() {
    // Start with an underscore to hide fields from custom fields list
    $prefix = 'medialoft';

    /**
     * Initiate the Copy metabox
     */
    $cmb_blog_post = new_cmb2_box( array(
        'id'            => 'blog_post_metabox',
        'title'         => __( 'Video (optional)', 'cmb2' ),
        'object_types'  => array( 'post' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true // Keep the metabox closed by default
    ) );

    $cmb_blog_post->add_field( array(
        'name'       => __( 'Video .mp4 Url', 'cmb2' ),
        'desc'       => __( 'Add Vimeo .mp4 url for optional video', 'cmb2' ),
        'id'         => $prefix . '_post-video',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats'
    ));
}

function cmb2_case_study_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'medialoft';

    /**
     * Initiate the Copy metabox
     */
    $cmb_copy = new_cmb2_box( array(
        'id'            => 'case_study_copy_metabox',
        'title'         => __( 'Copy', 'cmb2' ),
        'object_types'  => array( 'case_study', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true // Keep the metabox closed by default
    ) );

    $cmb_copy->add_field( array(
        'name'       => __( 'Description Title', 'cmb2' ),
        'desc'       => __( 'Title that shows below the company name when a case study is opened.', 'cmb2' ),
        'id'         => $prefix . '_desc-title-text',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats'
    ));

    $cmb_copy->add_field( array(
        'name'       => __( 'Full Description', 'cmb2' ),
        'desc'       => __( 'Full Description of the case study that shows when a case study is opened.', 'cmb2' ),
        'id'         => $prefix . '_desc-text',
        'type'       => 'textarea',
        'show_on_cb' => 'cmb2_hide_if_no_cats'
    ));


    /**
     * Initiate the Cover Images metabox
     */
    $cmb_cover_images = new_cmb2_box( array(
        'id'            => 'case_study_cover_images_metabox',
        'title'         => __( 'Cover Image', 'cmb2' ),
        'object_types'  => array( 'case_study', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true // Keep the metabox closed by default
    ) );

	$cmb_cover_images->add_field( array(
	    'name'    => 'Cover Image Resting',
	    'desc'    => 'Upload the main cover image for the case study - 650x1420 @medium quality ~75kb',
	    'id'      => 'case-study-cover-image',
	    'type'    => 'file',
	    // Optional:
	    'options' => array(
	        'url' => false, // Hide the text input for the url
	        'add_upload_file_text' => 'Add Cover Image (Resting State)' // Change upload button text. Default: "Add or Upload File"
	    ),
	) );

	$cmb_cover_images->add_field( array(
	    'name'    => 'Cover Image Hover',
	    'desc'    => 'Upload the hover state for the main cover image - 650x1420 @medium quality ~75kb',
	    'id'      => 'case-study-cover-image-hover',
	    'type'    => 'file',
	    // Optional:
	    'options' => array(
	        'url' => false, // Hide the text input for the url
	        'add_upload_file_text' => 'Add Cover Image (Hover State)' // Change upload button text. Default: "Add or Upload File"
	    ),
	) );






	/**
     * Initiate the Videos metabox
     */
    $cmb_videos = new_cmb2_box( array(
        'id'            => 'case_study_videos_metabox',
        'title'         => __( 'Videos', 'cmb2' ),
        'object_types'  => array( 'case_study', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true // Keep the metabox closed by default
    ) );

	$cmb_videos->add_field( array(
	    'name'    => 'Loop Video',
	    'desc'    => 'Upload the loop video that plays on desktop when a case study is opened - 16:9 aspect Ratio is preferred. URL comes from Vimeo and is the direct link to .MP4 file',
	    'id'      => 'case-study-loop-video',
	    'type'    => 'text_url'
	));

	$cmb_videos->add_field( array(
	    'name'    => 'Main Video (Desktop)',
	    'desc'    => 'Upload the main video that plays on desktop when you click play on a loop video - 16:9 aspect Ratio is preferred. URL comes from Vimeo and is the direct link to .MP4 file',
	    'id'      => 'case-study-full-video-desktop',
	    'type'    => 'text_url'
	));

	$cmb_videos->add_field( array(
	    'name'    => 'Main Video (Mobile)',
	    'desc'    => 'Upload the main video that plays on mobile - 16:9 aspect Ratio is preferred. URL comes from Vimeo and is the direct link to .MP4 file',
	    'id'      => 'case-study-full-video-mobile',
	    'type'    => 'text_url'
	));

    $cmb_videos->add_field( array(
        'name'    => 'Mobile Video Poster',
        'desc'    => 'Upload the video poster for mobile. Shows when video state is resting. - 800x1422 @medium quality ~75kb',
        'id'      => 'case-study-video-poster-mobile',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Mobile Video Poster' // Change upload button text. Default: "Add or Upload File"
        ),
    ));



	/**
     * Initiate the SS metabox
     */
    $cmb_ss_images = new_cmb2_box( array(
        'id'            => 'case_study_ss_images_metabox',
        'title'         => __( 'Slideshow Images - Desktop', 'cmb2' ),
        'object_types'  => array( 'case_study', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true // Keep the metabox closed by default
    ) );

    $group_field_id = $cmb_ss_images->add_field( array(
        'id'          => 'wiki_test_repeat_group',
        'type'        => 'group',
        'description' => __( 'Add SS images for desktop case studies', 'cmb2' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'SS Image {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Image', 'cmb2' ),
            'remove_button' => __( 'Remove Image', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    $cmb_ss_images->add_group_field( $group_field_id, array(
        'name' => 'Select an Image',
        'id'   => 'title',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add SS Image' // Change upload button text. Default: "Add or Upload File"
        ),
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    /**
     * Initiate the SS metabox
     */
    $cmb_ss_images_mobile = new_cmb2_box( array(
        'id'            => 'case_study_ss_images_mobile_metabox',
        'title'         => __( 'Slideshow Images - Mobile', 'cmb2' ),
        'object_types'  => array( 'case_study', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true // Keep the metabox closed by default
    ) );

    $group_field_id = $cmb_ss_images_mobile->add_field( array(
        'id'          => 'case_study_ss_images_mobile_group',
        'type'        => 'group',
        'description' => __( 'Add SS images for mobile case studies', 'cmb2' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Mobile SS Image {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Mobile Image', 'cmb2' ),
            'remove_button' => __( 'Remove Mobile Image', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    $cmb_ss_images_mobile->add_group_field( $group_field_id, array(
        'name' => 'Select an Image',
        'id'   => 'title',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Mobile SS Image' // Change upload button text. Default: "Add or Upload File"
        ),
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    /**
     * Initiate the Related Image metabox
     */
    $cmb_related_image = new_cmb2_box( array(
        'id'            => 'case_study_related_image_metabox',
        'title'         => __( 'Related Item Image - Desktop', 'cmb2' ),
        'object_types'  => array( 'case_study', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true // Keep the metabox closed by default
    ) );

    $cmb_related_image->add_field( array(
        'name'    => 'Related Work Item Image Resting State',
        'desc'    => 'Upload the desktop resting state of the image that will show up in related items slide of other work items.',
        'id'      => 'case-study-related-image-resting-desktop',
        'type'    => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Related Image Resting' // Change upload button text. Default: "Add or Upload File"
        ),
    ));

    $cmb_related_image->add_field( array(
        'name'    => 'Related Work Item Image Hover State',
        'desc'    => 'Upload the desktop hover state of the image that will show up in related items slide of other work items.',
        'id'      => 'case-study-related-image-hover-desktop',
        'type'    => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Related Image Hover' // Change upload button text. Default: "Add or Upload File"
        ),
    ));




    /**
     * Initiate the Related Image metabox
     */
    $cmb_related_image_mobile = new_cmb2_box( array(
        'id'            => 'case_study_related_image_metabox_mobile',
        'title'         => __( 'Related Item Image - Mobile', 'cmb2' ),
        'object_types'  => array( 'case_study', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true // Keep the metabox closed by default
    ) );

    $cmb_related_image_mobile->add_field( array(
        'name'    => 'Related Work Item Image Resting State',
        'desc'    => 'Upload the mobile resting state of the image that will show up in related items slide of other work items.',
        'id'      => 'case-study-related-image-resting-mobile',
        'type'    => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Related Image Resting' // Change upload button text. Default: "Add or Upload File"
        ),
    ));

    $cmb_related_image_mobile->add_field( array(
        'name'    => 'Related Work Item Image Hover State',
        'desc'    => 'Upload the mobile hover state of the image that will show up in related items slide of other work items.',
        'id'      => 'case-study-related-image-hover-mobile',
        'type'    => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Related Image Hover' // Change upload button text. Default: "Add or Upload File"
        ),
    ));
}

function cmb2_page_specific_metaboxes(){
    // Start with an underscore to hide fields from custom fields list
    $prefix = 'medialoft_';

    $pageId = get_id_by_slug('contact');

    /**
     * Initiate the Copy metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'page_metabox',
        'title'         => __( 'General Contact Details', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_on' => array( 'key' => 'id', 'value' => array( $pageId ) ),
        'show_names'    => true, // Show field names on the left
        'open'     => true // Keep the metabox closed by default
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Email', 'cmb2' ),
        'desc'       => __( 'Please enter full email address. EX. info@medialoft.com', 'cmb2' ),
        'id'         => $prefix . 'email-address',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ));

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Phone', 'cmb2' ),
        'desc'       => __( 'Please enter a formatted phone number, EX. 612.375.1086', 'cmb2' ),
        'id'         => $prefix . 'phone-number',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ));

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Address 1', 'cmb2' ),
        'desc'       => __( 'Please enter the first line of your address, EX. 615 First Ave NE, Suite 100', 'cmb2' ),
        'id'         => $prefix . 'address-1',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ));

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Address 2', 'cmb2' ),
        'desc'       => __( 'Please enter the second line of your address, EX. Minneapolis, MN 55413', 'cmb2' ),
        'id'         => $prefix . 'address-2',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ));

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Directions Link', 'cmb2' ),
        'desc'       => __( 'Please enter a link to get directions. EX. Google Maps Directions', 'cmb2' ),
        'id'         => $prefix . 'directions',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ));
}

function cmb2_video_metaboxes() {
    // Start with an underscore to hide fields from custom fields list
    $prefix = 'medialoft_';

    $galleriesPageId = get_id_by_slug('video-galleries');

    /**
     * Initiate the Copy metabox
     */
    $cmb_gallery = new_cmb2_box( array(
        'id'            => 'gallery_video_ids',
        'title'         => __( 'Gallery Videos', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_on' => array( 'key' => 'child_of', 'value' => array( $galleriesPageId ) ),
        'show_names'    => true, // Show field names on the left
        'open'     => true // Keep the metabox closed by default
    ));

    // Regular text field
    $cmb_gallery->add_field( array(
        'name'       => __( 'Ids', 'cmb2' ),
        'desc'       => __( 'Please enter a comma separated list of IDs', 'cmb2' ),
        'id'         => $prefix . 'video_ids',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ));

    $cmbtitle = new_cmb2_box( array(
        'id'            => 'video_title_metabox',
        'title'         => __( 'Disable Video Title', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_on' => array( 'key' => 'child_of', 'value' => array( $galleriesPageId ) ),
        'show_names'    => true, // Show field names on the left
        'open'     => true // Keep the metabox closed by default
    ));

    $cmbtitle->add_field( array(
        'name' => 'Disable Title',
        'desc' => 'Check this box to disable the gallery title',
        'id'   => $prefix . 'disable_gallery_title',
        'type' => 'checkbox',
    ));

    /**
     * Initiate the Copy metabox
     */

    $cmb = new_cmb2_box( array(
        'id'            => 'video_metabox',
        'title'         => __( 'Video Urls', 'cmb2' ),
        'object_types'  => array( 'video' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'open'     => true // Keep the metabox closed by default
    ));

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Desktop URL', 'cmb2' ),
        'desc'       => __( 'Please enter desktop video url', 'cmb2' ),
        'id'         => $prefix . 'desktop_url',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ));

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Mobile URL', 'cmb2' ),
        'desc'       => __( 'Please enter mobile video url', 'cmb2' ),
        'id'         => $prefix . 'mobile_url',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ));

    $cmb2 = new_cmb2_box( array(
        'id'            => 'video_poster_metabox',
        'title'         => __( 'Poster Image', 'cmb2' ),
        'object_types'  => array( 'video' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'open'     => true // Keep the metabox closed by default
    ));

    $cmb2->add_field( array(
        'name'    => 'Poster Image',
        'desc'    => 'Upload an image that will show as the video poster.',
        'id'      => $prefix . 'video_poster',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Poster Image' // Change upload button text. Default: "Add or Upload File"
        ),
    ));

    $cmbshare = new_cmb2_box( array(
        'id'            => 'video_share_link',
        'title'         => __( 'Disable Share Link', 'cmb2' ),
        'object_types'  => array( 'video' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'open'     => true // Keep the metabox closed by default
    ));

    $cmbshare->add_field( array(
        'name' => 'Disable Share Link',
        'desc' => 'Check this box to remove the video share link',
        'id'   => $prefix . 'disable_video_share',
        'type' => 'checkbox',
    ));
}

function cmb2_about_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'medialoft_';

    $aboutPageId = get_id_by_slug('about');

    /**
     * Initiate the About Page metabox
     */
    $cmb_about = new_cmb2_box( array(
        'id'            => $prefix . 'about_page_metabox',
        'title'         => __( 'About Page Videos', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_on' => array( 'key' => 'id', 'value' => array( $aboutPageId ) ),
        'show_names'    => true, // Show field names on the left
        'open'     => true // Keep the metabox closed by default
    ) );

    // Regular text field
    $cmb_about->add_field( array(
        'name'       => __( 'Landing Background Video', 'cmb2' ),
        'desc'       => __( 'Please enter a URL for the landing area background video', 'cmb2' ),
        'id'         => $prefix . 'landing_video',
        'type'       => 'text'
    ));

        // File Upload Field
        $cmb_about->add_field( array(
            'name'       => __( 'Landing Background Video Poster', 'cmb2' ),
            'desc'       => __( 'Please upload a poster for the landing video', 'cmb2' ),
            'id'         => $prefix . 'landing_video_poster',
            'type'       => 'file',
            // Optional:
            'options' => array(
                'url' => false, // Hide the text input for the url
                'add_upload_file_text' => 'Add Landing Video Poster' // Change upload button text. Default: "Add or Upload File"
            )
        ));

    // Regular text field
    $cmb_about->add_field( array(
        'name'       => __( 'Culture Background Video', 'cmb2' ),
        'desc'       => __( 'Please enter a URL for the culture area background video', 'cmb2' ),
        'id'         => $prefix . 'culture_bg_video',
        'type'       => 'text'
    ));

        // File Upload Field
        $cmb_about->add_field( array(
            'name'       => __( 'Culture Background Video Poster', 'cmb2' ),
            'desc'       => __( 'Please upload a poster for the culture video', 'cmb2' ),
            'id'         => $prefix . 'culture_bg_video_poster',
            'type'       => 'file',
            // Optional:
            'options' => array(
                'url' => false, // Hide the text input for the url
                'add_upload_file_text' => 'Add Culture Video Poster' // Change upload button text. Default: "Add or Upload File"
            )
        ));

    // Regular text field
    $cmb_about->add_field( array(
        'name'       => __( 'Culture Full Video', 'cmb2' ),
        'desc'       => __( 'Please enter a URL for the culture area full video', 'cmb2' ),
        'id'         => $prefix . 'culture_full_video',
        'type'       => 'text'
    ));


        // File Upload Field
        $cmb_about->add_field( array(
            'name'       => __( 'Culture Full Video Poster', 'cmb2' ),
            'desc'       => __( 'Please upload a poster for the full culture video', 'cmb2' ),
            'id'         => $prefix . 'culture_full_video_poster',
            'type'       => 'file',
            // Optional:
            'options' => array(
                'url' => false, // Hide the text input for the url
                'add_upload_file_text' => 'Add Culture Full Video Poster' // Change upload button text. Default: "Add or Upload File"
            )
        ));


    /**
     * Initiate the Timeline Event metaboxes
     */
    $cmb_timeline_event = new_cmb2_box( array(
        'id'            => 'timeline_event_media_metabox',
        'title'         => __( 'Event Media', 'cmb2' ),
        'object_types'  => array( 'timeline_event', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true // Keep the metabox closed by default
    ));

    $cmb_timeline_event->add_field( array(
        'name'       => __( 'Event Background Image', 'cmb2' ),
        'desc'       => __( 'Upload a background image to show when the even is clicked.', 'cmb2' ),
        'id'         => $prefix . 'about_timeline_bg_image',
        'type'       => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Background Image' // Change upload button text. Default: "Add or Upload File"
        )
    ));

    $cmb_timeline_event->add_field( array(
        'name'       => __( 'Event Video', 'cmb2' ),
        'desc'       => __( 'Url for video if the event has one associated with it.', 'cmb2' ),
        'id'         => $prefix . 'about_timeline_video',
        'type'    => 'text'
    ));



    /**
     * Client custom metas for logo resting and hover
     */
    $cmb_client = new_cmb2_box( array(
        'id'            => 'client_media_metabox',
        'title'         => __( 'Client Media', 'cmb2' ),
        'object_types'  => array( 'client', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => false // Keep the metabox closed by default
    ));

    $cmb_client->add_field( array(
        'name'       => __( 'Client Resting Image', 'cmb2' ),
        'desc'       => __( 'Upload a resting image for the client.', 'cmb2' ),
        'id'         => $prefix . 'about_client_image',
        'type'       => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Client Logo Image' // Change upload button text. Default: "Add or Upload File"
        )
    ));

    $cmb_client->add_field( array(
        'name'       => __( 'Client Hover Image', 'cmb2' ),
        'desc'       => __( 'Upload a hover image for the client.', 'cmb2' ),
        'id'         => $prefix . 'about_client_hover_image',
        'type'       => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Client Logo Image Hover State' // Change upload button text. Default: "Add or Upload File"
        )
    ));




    /**
     * Employee custom metas for logo resting and hover
     */
    $cmb_employee = new_cmb2_box( array(
        'id'            => 'employee_media_metabox',
        'title'         => __( 'Employee Media', 'cmb2' ),
        'object_types'  => array( 'employee', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => false // Keep the metabox closed by default
    ));

    $cmb_employee->add_field( array(
        'name'       => __( 'Employee Resting Image', 'cmb2' ),
        'desc'       => __( 'Upload a resting image for the employee.', 'cmb2' ),
        'id'         => $prefix . 'about_employee_image',
        'type'       => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Employee Image' // Change upload button text. Default: "Add or Upload File"
        )
    ));

    $cmb_employee->add_field( array(
        'name'       => __( 'Employee Hover Image', 'cmb2' ),
        'desc'       => __( 'Upload a hover image for the employee.', 'cmb2' ),
        'id'         => $prefix . 'about_employee_hover_image',
        'type'       => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Employee Image Hover State' // Change upload button text. Default: "Add or Upload File"
        )
    ));
}