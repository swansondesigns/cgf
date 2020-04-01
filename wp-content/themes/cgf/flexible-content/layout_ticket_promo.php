<?php

$selected_post = get_sub_field('choose_ticket_promo');


set_query_var( 'feature_id', $selected_post->ID );

ob_start();

get_template_part( 'flexible-content/features/feature', 'ticket-promo'  );

$output = ob_get_contents();

ob_end_clean();

echo $output;
