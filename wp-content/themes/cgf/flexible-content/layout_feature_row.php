<?php
ob_start();
// echo 'This is the features file<br />';


// $features = get_sub_field( 'features' );

if ( have_rows( 'choose_features' ) ):

	while ( have_rows('choose_features') ) : the_row();

		$selected_post = get_sub_field('feature_repeater');

		$feature_id = $selected_post->ID;
		// include( 'features/promo-box.php' );
		// get_template_part( 'flexible-content-layouts/features', 'feature_box' );

		set_query_var( 'feature_id', $feature_id );
		get_template_part( 'flexible-content/features/feature', 'promo-box' );


	endwhile;


	// echo 'Passed on have_rows';

else:
	// echo 'Failed on have_rows';
endif;


$output = ob_get_contents();
ob_end_clean();
echo $output;
