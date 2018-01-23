<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package soundstheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			$postid = get_the_ID();

			if(in_category('playlists')){
	      //Ancre vide pour la section playlist
	      echo '<div id="playlists" style="height:0;width:0;text-indent:-9999em;">Playlist du mois</div>';
			}
			the_title( '<h2 class="entry-title"><a href="#post-'. $postid .'" rel="bookmark">', '</a></h2>' );
		else :
			$postid = get_the_ID();
			//the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			the_title( '<h2 class="entry-title"><a href="#post-'. $postid .'" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php soundstheme_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* About img link */
			if(get_field('shoppic')){
				echo '<a class="shoppic foobox" href="'.get_field('shoppic').'" alt="Photo du magasin">[Le Magaz]</a>';
			}
			/* Event Type */
			if(get_field('eventtype')){
				echo '<p><strong>'.get_field('eventtype').'</strong></p>';
			}
		?>

		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'soundstheme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			/* Event Date */
			if(get_field('eventdate')){
				echo '<p class="event-date">'.get_field('eventdate').'</p>';
			}

			/* Playlists */
			if(in_category('playlists')){
				get_template_part( 'template-parts/content-playlist', 'playlist' );
			}

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'soundstheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php soundstheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
