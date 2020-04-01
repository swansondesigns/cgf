<?php
/*
Plugin Name:    In-Page Ad Carousel
Description:    Custom plugin for CGF that displays AdSanity banners in a carousel
Version:        1.0
Author:         Graham Swanson
*/

// require_once( 'includes/library.php' );

/*

For this plugin to work properly, the developer needs to add this code to footer.php.

  <?php cgf_insert_carousel(); ?>

The snippet should go above the <footer> tag.  This is necessary because the theme developer put the get_footer() call
inside the end of the element that contains the body and I used flex to do the layout.

Also, the CSS in cgf-ad-carousel.css needs to be adjusted to match the theme.

*/

function cgf_register_carousel_cpt() {

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
		"show_in_rest" => false,
		"rest_base" => "",
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
add_action( 'init', 'cgf_register_carousel_cpt' );



function cgf_carousel_enqueue() {
    $path_to_this_folder = plugin_dir_url( __FILE__ );
    wp_enqueue_script( 'cgf-slick', $path_to_this_folder . 'slick/slick.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'cgf-slick-init', $path_to_this_folder . 'cgf-ad-carousel-init.js', array(), '1.0.0', true );

    wp_enqueue_style( 'cgf-slick', $path_to_this_folder . 'slick/slick.css', array() );
	wp_enqueue_style( 'cgf-slick-theme', $path_to_this_folder . 'slick/slick-theme.css', array( 'cgf-slick' ) );
    // wp_enqueue_style( 'cgf-carousel', $path_to_this_folder . 'cgf-ad-carousel.css', array() );
}
add_action( 'wp_enqueue_scripts', 'cgf_carousel_enqueue' );



function cgf_insert_carousel() {

	if ( get_field('add_carousel') ):
		echo '<div class="cgf-carousel-wrap">';

		$selected_carousel = get_field('select_carousel');

		$banners = get_field('banners', $selected_carousel->ID);

		// echo '<script>$(\'.cgf-banners\').slick({
		// 	  infinite: true,
		// 	  slidesToShow: 3,
		// 	  slidesToScroll: 1
		// 	});
		// 	</script>';

		echo '<div class="cgf-banners">';
		foreach ($banners as $banner) {
			//echo $banner['ad'] . '<br />';
			//echo do_shortcode('[adsanity id="' . $banner['ad'] . '"]');

			echo '<div>';

			echo do_shortcode('[adsanity id="' . $banner['ad'] . '"]');

			echo '</div>';

		}
		echo '</div>';



		echo '</div>';
	endif;
}
// add_action ( 'get_footer', 'cgf_insert_carousel' );
// Can't do this because the start of the footer is inside the content area.  Stupid.





if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5b43a2a0896de',
		'title' => 'Carousel Entries',
		'fields' => array(
			array(
				'key' => 'field_5b43a2b55de4b',
				'label' => 'Banners',
				'name' => 'banners',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => 'Add Ad',
				'sub_fields' => array(
					array(
						'key' => 'field_5b43a2c75de4c',
						'label' => 'Ad',
						'name' => 'ad',
						'type' => 'post_object',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'post_type' => array(
							0 => 'ads',
						),
						'taxonomy' => array(
						),
						'allow_null' => 0,
						'multiple' => 0,
						'return_format' => 'id',
						'ui' => 1,
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'carousel',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	acf_add_local_field_group(array(
		'key' => 'group_5b43a365f0c1f',
		'title' => 'Carousel Settings',
		'fields' => array(
			array(
				'key' => 'field_5b43a37e52d30',
				'label' => 'Add Carousel?',
				'name' => 'add_carousel',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5b43a38d52d31',
				'label' => 'Select Carousel',
				'name' => 'select_carousel',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5b43a37e52d30',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'carousel',
				),
				'taxonomy' => array(
				),
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'object',
				'ui' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
				array(
					'param' => 'page_template',
					'operator' => '!=',
					'value' => 'template-front-page.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

endif;
