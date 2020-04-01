<?php


// We need one container for each feature
echo '<div class="feature">';

	// We are going to need the link settings for multiple links in the feature so we are going to start here.

	// Since we have multiple items that will need to be wrapped in link, we will set up the tags as variables here.
	$heading_tag = '<h3>%s</h3>';
	$image_tag = '<img src="%s" />';

	// Grab all the link settings since it's a group.
	$link_settings = get_field( 'link_settings', $feature_id );

	// We are going to need to check this a few times so let's just get a variable
	// if ( $link_settings['link'] )
	// 	$has_link = true;

	// We are going to output a link if this isn't 0
	if ( $link_settings['link_setup'] ) {

		// The link settings will be a switch statement
		// Rather than output the link itself, we will just set some vars.

		switch ( $link_settings['link_setup'] ) {
			case 'internal':

				$href = get_permalink( $link_settings['link_page'] );
				$target = '_self';

				break;

			case 'external':

				$href = $link_settings['link_url'];
				$target = '_blank';

				break;

		}

		$heading_tag = '<h3><a href="' . $href . '" target="' . $target . '">%s</a></h3>';
		$image_tag = '<a href="' . $href . '" target="' . $target . '"><img src="%s" /></a>';

		// if ( $link_settings['link_text'] ) {
		// 	$link_text = $link_settings['link_text'];
		// } else {
		// 	$link_text = 'Learn More';
		// }
		// if ( $link_settings['link_text'] ) ? ( $link_text = $link_settings['link_text'] : $link_text = 'Learn More';

		$link_text = ( ( empty( $link_settings['link_text'] ) ) ? 'Learn More' : $link_settings['link_text'] );

		// Since this is added to the bottom, we'll just store it as a variable instead of outputting.
		$feature_link = '<a href="' . $href . '" target="' . $target . '" class="button">'. $link_text . '</a>';

	}




	// Output image if set
	if ( $image = get_field( 'image', $feature_id ) )
		printf( $image_tag, $image['sizes']['rectangle-small'] );


	// Output heading
	// The heading will either use the default tag or the reset from the IF statement
	printf( $heading_tag, get_field( 'heading', $feature_id ) );


	// Output content
	the_field( 'content', $feature_id  );

	if ( !empty( $feature_link ) )
		echo $feature_link;

	$feature_link = null;

echo '</div><!-- .feature -->';
