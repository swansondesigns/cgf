<?php

function cgf_icon_for_twitter( $atts ){
	return '<i class="fab fa-twitter-square"></i>';
}
add_shortcode( 'tw', 'cgf_icon_for_twitter' );

function cgf_icon_for_facebook( $atts ){
	return '<i class="fab fa-facebook-square"></i>';
}
add_shortcode( 'fb', 'cgf_icon_for_facebook' );


function cgf_icon_for_instagram( $atts ){
	return '<i class="fab fa-instagram"></i>';
}
add_shortcode( 'ig', 'cgf_icon_for_instagram' );

function cgf_icon_for_yelp( $atts ){
	return '<i class="fab fa-yelp"></i>';
}
add_shortcode( 'yp', 'cgf_icon_for_yelp' );
