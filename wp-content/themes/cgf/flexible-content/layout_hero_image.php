<?php

$selected_post = get_sub_field('choose_hero');

$feature_id = $selected_post->ID;

set_query_var( 'feature_id', $feature_id );

get_template_part( 'flexible-content/features/feature', 'hero'  );
// ob_start();
//
//
// $output = ob_get_contents();
//
// ob_end_clean();
//
// echo $output;
