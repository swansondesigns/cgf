<?php
/**
 * The Sidebar
 *
 */
/*
echo '<pre>';
var_dump($post_id);
echo '</pre>';
//*/
// This sidebar runs off of the top-most ancenstor slug.  So let's get that first.
if( !is_page() )
    return;

global $post;

// The function get_post_ancestors() returns an array of IDs
$post_ancestors = get_post_ancestors( $post->ID );

//  The last entry in the array is the topmost ancestor.
//  So we use that to get the post.
$top_ancestor_page = get_post( end( $post_ancestors ) );

// We now have the post as an object. To keep things simple, we'll
//  dump this to a variable.
$top_ancestor_page_slug = $top_ancestor_page->post_name;

// In order to have multiple sidebars on some pages we'll use an array
$sidebar_names = [];
$sidebar_area_names = array(
    'sponsors-primary',
    'sponsors',
);

// In order to stay flexible with page slugs, the widegt areas IDs are different than
//  the page slugs. So we have to use a switch statement to tie them together.

switch ( $top_ancestor_page_slug ) {

    case 'colorado-fall-home-show':
        $sidebar_names[] = 'sidebar-fall-home-show-primary-sponsors';
        $sidebar_names[] = 'sidebar-fall-home-show';
        break;

    case 'colorado-garden-home-show':
        $sidebar_names[] = 'sidebar-garden-home-show-primary-sponsors';
        $sidebar_names[] = 'sidebar-garden-home-show';
        break;

    case 'about':
        $sidebar_names[] = 'sidebar-foundation';
        break;

    default:
        $sidebar_names = null;
        break;
}

if ( is_array($sidebar_names) ) :

    echo '<aside id="secondary" class="widget-area light-theme" role="complementary">';

        $ctr = 0;
		foreach ($sidebar_names as $sidebar_name) {
            echo '<div class="sponsor-area ' . $sidebar_area_names[$ctr] . '">';

            dynamic_sidebar( $sidebar_name );

            echo '</div>';
            $ctr++;
		}

    echo '</aside>';

endif;
