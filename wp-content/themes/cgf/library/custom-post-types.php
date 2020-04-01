<?php

function cptui_register_my_cpts() {

	/**
	 * Post Type: Features.
	 */

 	/*
	If we need to reimport back into CPT UI for some reason.
	{"features":{"name":"features","label":"Features","singular_label":"Feature","description":"","public":"true","publicly_queryable":"true","show_ui":"true","show_in_nav_menus":"false","show_in_rest":"false","rest_base":"","rest_controller_class":"","has_archive":"false","has_archive_string":"","exclude_from_search":"true","capability_type":"post","hierarchical":"false","rewrite":"true","rewrite_slug":"","rewrite_withfront":"true","query_var":"true","query_var_slug":"","menu_position":"35","show_in_menu":"true","show_in_menu_string":"","menu_icon":"dashicons-excerpt-view","supports":["title"],"taxonomies":[],"labels":{"menu_name":"","all_items":"","add_new":"","add_new_item":"","edit_item":"","new_item":"","view_item":"","view_items":"","search_items":"","not_found":"","not_found_in_trash":"","parent_item_colon":"","featured_image":"","set_featured_image":"","remove_featured_image":"","use_featured_image":"","archives":"","insert_into_item":"","uploaded_to_this_item":"","filter_items_list":"","items_list_navigation":"","items_list":"","attributes":"","name_admin_bar":""},"custom_supports":""}}
	*/
	$labels = array(
		"name" => __( "Features", "cgf" ),
		"singular_name" => __( "Feature", "cgf" ),
	);

	$args = array(
		"label" => __( "Features", "cgf" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "features", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 35,
		"menu_icon" => "dashicons-excerpt-view",
		"supports" => array( "title" ),
	);

	register_post_type( "features", $args );







	/**
	 * Post Type: Carousels.
	 */

	$labels = array(
		"name" => __( "Carousels", "colorado-garden-foundation" ),
		"singular_name" => __( "Carousel", "colorado-garden-foundation" ),
		"menu_name" => __( "Carousels", "colorado-garden-foundation" ),
		"all_items" => __( "All Carousels", "colorado-garden-foundation" ),
		"add_new" => __( "Add Carousel", "colorado-garden-foundation" ),
		"add_new_item" => __( "Add New Carousel", "colorado-garden-foundation" ),
		"edit_item" => __( "Edit Carousel", "colorado-garden-foundation" ),
		"new_item" => __( "New Carousel", "colorado-garden-foundation" ),
		"view_item" => __( "View Carousel", "colorado-garden-foundation" ),
		"view_items" => __( "View Carousels", "colorado-garden-foundation" ),
		"search_items" => __( "Search Carousel", "colorado-garden-foundation" ),
		"not_found" => __( "No Carousels Found", "colorado-garden-foundation" ),
		"not_found_in_trash" => __( "No Carousels Found in Trash", "colorado-garden-foundation" ),
		"parent_item_colon" => __( "Parent Carousel", "colorado-garden-foundation" ),
		"featured_image" => __( "Featured Image for This Carousel", "colorado-garden-foundation" ),
		"set_featured_image" => __( "Set featured image for this Carousel", "colorado-garden-foundation" ),
		"remove_featured_image" => __( "Remove featured image for this Carousel", "colorado-garden-foundation" ),
		"use_featured_image" => __( "Use as Featured Image for this Carousel", "colorado-garden-foundation" ),
		"archives" => __( "Carousel Archives", "colorado-garden-foundation" ),
		"insert_into_item" => __( "Insert into Carousel", "colorado-garden-foundation" ),
		"uploaded_to_this_item" => __( "Uploaded to this Carousel", "colorado-garden-foundation" ),
		"filter_items_list" => __( "Filter Carousels List", "colorado-garden-foundation" ),
		"items_list_navigation" => __( "Carousels list navigation", "colorado-garden-foundation" ),
		"items_list" => __( "Carousels list", "colorado-garden-foundation" ),
		"attributes" => __( "Carousels Attributes", "colorado-garden-foundation" ),
		"parent_item_colon" => __( "Parent Carousel", "colorado-garden-foundation" ),
	);

	$args = array(
		"label" => __( "Carousels", "colorado-garden-foundation" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "carousel", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 30,
		"menu_icon" => "dashicons-controls-repeat",
		"supports" => array( "title" ),
	);

	register_post_type( "carousel", $args );


}

add_action( 'init', 'cptui_register_my_cpts' );
