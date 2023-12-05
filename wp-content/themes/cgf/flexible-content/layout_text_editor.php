<?php

ob_start();

the_sub_field('text_editor_content');

$output = ob_get_contents();
ob_end_clean();
echo $output;
