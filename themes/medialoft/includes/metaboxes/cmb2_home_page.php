<?php

add_action( 'cmb2_admin_init', 'cmb2_home_metaboxes' );

function cmb2_home_metaboxes() {
    // Start with an underscore to hide fields from custom fields list
    $prefix = 'medialoft_';

    $homePageID = get_id_by_slug('home');

    /**
     * Initiate the Home Page metabox
     */
    $cmb_home = new_cmb2_box( array(
        'id'            => $prefix . 'home_page_metabox',
        'title'         => __( 'Home Page', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_on' => array( 'key' => 'id', 'value' => array( $homePageID ) ),
        'show_names'    => true, // Show field names on the left
        'open'     => true // Keep the metabox closed by default
    ));

    // home background video that plays under
    // the shape mask
    $cmb_home->add_field( array(
        'name'       => __( 'Homepage Background Video', 'cmb2' ),
        'desc'       => __( 'Please enter a vimeo MP4 URL for the background home video', 'cmb2' ),
        'id'         => $prefix . 'background_home_video',
        'type'       => 'text'
    ));

    // home video overlay that takes over screen
    // when play button is clicked
    $cmb_home->add_field( array(
        'name'       => __( 'Homepage Full Video', 'cmb2' ),
        'desc'       => __( 'Please enter a vimeo MP4 URL for the full home video', 'cmb2' ),
        'id'         => $prefix . 'full_home_video',
        'type'       => 'text'
    ));

    // MOBILE home video overlay that takes over screen
    // when play button is clicked
    $cmb_home->add_field( array(
        'name'       => __( 'Homepage Full Video Mobile', 'cmb2' ),
        'desc'       => __( 'Please enter a mobile vimeo MP4 URL for the full home video', 'cmb2' ),
        'id'         => $prefix . 'full_home_video_mobile',
        'type'       => 'text'
    ));
}