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

</div><!-- #site-wrapper --></div>

	<footer id="colophon" class="site-footer">

			<div class="column footer-menu">
				<nav class="footer-navigation">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'footer-menu',
						) );
					?>
				</nav>
			</div><!--.footer-menu-->

			<div class="column footer-map">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_sidebar') ) : endif; ?>
			</div><!--.footer-map-->

			<div class="column footer-widget">
				<div class="site-hours">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_sidebar') ) : endif; ?>
				</div>
			</div><!--.footer-widget-->

		<div class="site-info">
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
