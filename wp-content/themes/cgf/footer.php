<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Underscores_Base_Theme
 */

?>

	</div><!-- #content -->

	<?php cgf_insert_carousel(); ?>

	
	<footer id="colophon" class="site-footer">

		<?php

		// @see https://wordpress.stackexchange.com/questions/128647/retrieve-each-widget-separately-from-a-sidebar

		// global $wp_registered_widgets;
		$widgets = wp_get_sidebars_widgets();

		ob_start();
		echo '<div class="footer-column">';
		foreach ($widgets['footer-widget-area'] as $widget) {

			// Check to see if the widget is a divider widget
			if (strpos($widget, 'divider') !== false) {
				// If it is, end current column and start a new one.
				echo '</div>';
				echo '<div class="footer-column">';
			}

			echo do_shortcode( '[do_widget id=' . $widget . ']' );


		}

		echo '</div><!-- footer-column -->';

		$output_buffer = ob_get_contents();
		ob_end_clean();
		echo $output_buffer;

		 ?>
		 <?php
		 // echo do_shortcode( '[do_widget categories]' );
		 ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
