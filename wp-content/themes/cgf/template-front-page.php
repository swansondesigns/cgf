<?php
/* Template Name: Home Page */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php

			if( have_rows('home_page_builder') ):

				// echo 'We have rows';

				while ( have_rows('home_page_builder') ) : the_row();

					// Manual method uses get_row_layout() in a series of IF statements or a switch.
					// if( get_row_layout() == 'features_row' ) {}

					// Better way uses the same function as part of a get_template_part call
					// load the component from the folder
					$flexible_content_folder = 'flexible-content';
					$row_layout = get_row_layout();
					$file_path = __DIR__ . '/' . $flexible_content_folder . '/' . $row_layout . '.php';

					if ( file_exists( $file_path ) ) {

						// Array of classes for the section
						$add_classes = array(
							$row_layout
						);

						// In order to make this more flexible, I'm adding a filter for the classes.  Not sure why yet.
						// The filter name will be sd_flexible_content_section_class_filter_{layout_name}
						//	so that each layout can be filtered individually.
						apply_filters( 'sd_flexible_content_section_class_filter_' . $row_layout , $add_classes, array ( $row_layout, $add_classes ) );

						// Convert the array of classes to a string
						$added_classes_as_string = implode( " ",  $add_classes );

						// Swap out underscores for hyphens
						$added_classes_as_string = str_replace( '_', '-', $added_classes_as_string);

						// Wrap the section content in section tags.
						echo '<section class="flexible-content ' . $added_classes_as_string . '">';

							get_template_part( $flexible_content_folder . '/' . $row_layout );

						echo '</section>';

					} else {

						echo wpautop('No layout found for layout with slug <strong>' . $row_layout . '</strong><br />Filepath: ' . $file_path);

					}


				endwhile;
				// echo 'We "have_rows()"';

			else :

				echo 'No rows found by "have_rows()"';

			endif;

			echo do_shortcode('[in_page_navigation]');


			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
