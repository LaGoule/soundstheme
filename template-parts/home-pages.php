<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package soundstheme
 */

?>

<?php while(have_posts()) : the_post(); ?>
<h2 class=”post-title”><?php the_title(); ?></h2>
<div class=”post-excerpt”><?php the_excerpt() ?></div>
<div class=”post-content”><?php the_content(); ?></div>
<?php endwhile; ?>
