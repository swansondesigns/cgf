<?php
/*
Plugin Name:    In-Page Navigation Shortcode
Description:    Custom plugin for CGF that displays selected pages with excerpt and featured image
Version:        1.0
Author:         Graham Swanson
*/

require_once( 'includes/library.php' );

function sd_in_page_navigation() {

    if( !have_rows('pages') )
		return;

    $max_words = 40;

    $output = '<ul class="ipn">';

    while( have_rows('pages') ) : the_row();

        $page_object = get_sub_field('page');

        $excerpt_text = ( !empty($page_object->post_excerpt) ) ? $page_object->post_excerpt : sd_truncate_string($page_object->post_content, $max_words)  ;

        $output .= '<li>';

        // The link html will be different depending on whether we have an override or not.

        if ( get_field('ipn_override_toggle', $page_object->ID ) ) {

            $permalink = get_field('ipn_override_url', $page_object->ID );

            $anchor_html_start = '<a href="' . $permalink . '" target="_blank"';
        } else {
            $permalink = get_permalink( $page_object->ID );

            $anchor_html_start = '<a href="' . $permalink . '"';
        }

        if ( $thumbnail = get_the_post_thumbnail( $page_object->ID, 'thumbnail' ) ) {
            $output .= '<div class="ipn-thumbnail">';


            $output .= $anchor_html_start . '>';
            $output .= $thumbnail;
            $output .= '</a>';

            $output .= '</div>';

        }

		$output .= '<div class="ipn-body">';
        $output .= '<h3>' . $anchor_html_start . '>' . get_the_title( $page_object->ID ) . '</a></h3>';

        $output .= sd_get_page_excerpt( $page_object->ID, 60 );

        $output .= $anchor_html_start . ' class="button">Read more...</a>';

        $output .= '</div>';

        $output .= '</li>';




    endwhile;

    $output .= '</ul>';



    return $output;
}
add_shortcode( 'in_page_navigation', 'sd_in_page_navigation' );
