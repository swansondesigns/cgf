<?php

$hero_image = get_field('hero_image', $feature_id);

ob_start();

echo '<img src="' . $hero_image['url'] . '" />';

$output = ob_get_contents();

ob_end_clean();

echo $output;
