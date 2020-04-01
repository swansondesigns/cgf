<?php

add_post_type_support( 'page', 'excerpt' );

function sd_script_and_style_enqueuer() {

    $parent_style = 'underscores-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/css/style.css',
        // get_stylesheet_directory_uri() . '/css/style.min.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );


    // Animate.css
    // wp_enqueue_style( 'client-animate', get_stylesheet_directory_uri() . '/css/animate.css'  );

    // Google Fonts
    wp_enqueue_style( 'client-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,400i,700,900&display=swap' );

    // Font Awesome
    // We either do this one...
    // wp_enqueue_style( 'client-fontawesome-main', get_stylesheet_directory_uri() . '/fonts/fontawesome/css/all.min.css' );

    // ...or a selection of these.  Need the first one and then others as required.
    wp_enqueue_style( 'client-fontawesome-main',    get_stylesheet_directory_uri() . '/fonts/fontawesome/css/fontawesome.min.css' );
    wp_enqueue_style( 'client-fontawesome-brands',  get_stylesheet_directory_uri() . '/fonts/fontawesome/css/brands.min.css' );
    wp_enqueue_style( 'client-fontawesome-light',   get_stylesheet_directory_uri() . '/fonts/fontawesome/css/light.min.css' );
    // wp_enqueue_style( 'client-fontawesome-regular', get_stylesheet_directory_uri() . '/fonts/fontawesome/css/regular.css' );  // No min for this?!
    // wp_enqueue_style( 'client-fontawesome-solid',   get_stylesheet_directory_uri() . '/fonts/fontawesome/css/solid.min.css' );



}
add_action( 'wp_enqueue_scripts', 'sd_script_and_style_enqueuer' );

// Update CSS within in Admin
function sd_admin_style() {
  wp_enqueue_style( 'client-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,400i,700,900&display=swap' );
  wp_enqueue_style('style-admin', get_stylesheet_directory_uri() . '/css/style.admin.css');

  // add_editor_style();

}
add_action('admin_enqueue_scripts', 'sd_admin_style');



/**
 *	CGF Modify Adsanity Sidebar Class
 *
 *	@author Graham Swanson
 *	@date 2018-19-12
 *
 *	@see wp-content\themes\cgf\sidebar.php
 *
 *	@uses adsanity_post_class filter
 *
 *	@param $classes array
 *	@param $post object
 *
 *	@return $classes
 *
 */
 add_filter( 'adsanity_post_class', 'cgf_modify_adsanity_sidebar_classes', 2, 99 );
 function cgf_modify_adsanity_sidebar_classes( $classes, $post ) {

	 $classes[] = get_field( 'sponsor_level', $post->ID);

	 return $classes;

 }

require_once( 'library/_init-library-files.php' );
