<?php

$heading = get_field('heading', $feature_id);
$subtitle = get_field('subtitle', $feature_id);
$content = get_field('content', $feature_id);
$link_settings = get_field('link_settings', $feature_id);
$promo_type = get_field('promo_type', $feature_id);
$promo_video = get_field('promo_video', $feature_id);
$promo_image = get_field('promo_image', $feature_id);

ob_start();

// echo '$heading = ' . $heading;
// echo '<br />';
// echo '$subtitle = ' . $subtitle;
// echo '<br />';
// echo '$content = ' . $content;
// echo '<br />';
// echo '$link_settings';
// echo '<pre>';
// var_dump($link_settings);
// echo '</pre>';
//*/$link_settings;
// echo '<br />';
// echo '$promo_type = ' . $promo_type;
// echo '<br />';
// echo '$promo_video = ' . $promo_video;
// echo '<br />';
// echo '$promo_image = ' . $promo_image;
// echo '<br />';

echo '<div class="ticket-column ticket-column-content">';

	echo '<h2>' . $heading . '</h2>';

	echo '<h3>' . $subtitle . '</h3>';

	the_field('content', $feature_id);

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

		$link_text = ( ( empty( $link_settings['link_text'] ) ) ? 'Learn More' : $link_settings['link_text'] );

		// Since this is added to the bottom, we'll just store it as a variable instead of outputting.
		$feature_link = '<a href="' . $href . '" target="' . $target . '" class="button button-2"><i class="fal fa-ticket-alt"></i>'. $link_text . '</a>';

	}

	echo $feature_link;

echo '</div>';

echo '<div class="ticket-column ticket-column-promo">';

	switch ($promo_type) {
	    case 'youtube':

			// Get the embed code using the video URL
			$embed_code = wp_oembed_get( $promo_video );

			// Run the embed code through the filter that adds the wrappers.  @see sd_modify_default_youtube_embed_html() in the library.
			echo apply_filters( 'embed_oembed_html', $embed_code, $promo_video );

	        break;

	    case 'image':
			$attachment_image = wp_get_attachment_image($promo_image['ID'], 'medium-resized');
			echo $attachment_image;
			/*
			echo '<pre>';
			var_dump($attachment_image);
			echo '</pre>';
			//*/
	        break;
	}

echo '</div>';

$output = ob_get_contents();

ob_end_clean();

echo $output;
