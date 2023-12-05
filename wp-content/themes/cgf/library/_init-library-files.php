<?php

/*
  Common Wordpress Needs
*/
$library_files_to_include = array(
  'advanced-custom-fields',
  'change-youtube-embed-html',
  'custom-post-types',
  'custom-taxonomies',
  'dashboard-widgets',
  'handy-functions',
  'manage-images',
  'manage-shortcodes',
  'manage-widgets',
  'shortcode-feature',
  'shortcode-posts',
  'underscores-post-thumbnail',
  'white-label',
  'widget-areas',
);

foreach ($library_files_to_include as $library_file) {

  include_once( __DIR__ . '/'. $library_file . '.php' );
  // require_once( __DIR__ . '/'. $library_file . '.php' );

}
