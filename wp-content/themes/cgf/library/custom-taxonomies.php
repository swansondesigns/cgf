<?php
/*
{"feature_type":{"name":"feature_type","label":"Feature Types","singular_label":"Feature Type","description":"","public":"true","publicly_queryable":"true","hierarchical":"false","show_ui":"true","show_in_menu":"true","show_in_nav_menus":"false","query_var":"true","query_var_slug":"","rewrite":"true","rewrite_slug":"","rewrite_withfront":"1","rewrite_hierarchical":"0","show_admin_column":"true","show_in_rest":"true","show_in_quick_edit":"","rest_base":"","rest_controller_class":"","labels":{"menu_name":"","all_items":"","edit_item":"","view_item":"","update_item":"","add_new_item":"","new_item_name":"","parent_item":"","parent_item_colon":"","search_items":"","popular_items":"","separate_items_with_commas":"","add_or_remove_items":"","choose_from_most_used":"","not_found":"","no_terms":"","items_list_navigation":"","items_list":""},"meta_box_cb":"","object_types":["features"]}}
*/

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Feature Types.
	 */

	$labels = array(
		"name" => __( "Feature Types", "cgf" ),
		"singular_name" => __( "Feature Type", "cgf" ),
	);

	$args = array(
		"label" => __( "Feature Types", "cgf" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'feature_type', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "feature_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "feature_type", array( "features" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
