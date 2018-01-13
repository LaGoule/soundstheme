<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package soundstheme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

			<div class="column footer-menu">
				<p>Un footer</p>
			</div><!--.footer-menu-->
			<div class="column">

			</div><!--.column-->
			<div class="column footer-widget">

					<div class="site-hours">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_sidebar') ) : endif; ?>
					</div>
			</div><!--.footer-widget-->

		<div class="site-info">
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #site-wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
