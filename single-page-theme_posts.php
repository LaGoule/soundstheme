<?php
    /**
        * Template Name: One-pager Post Template
        *
        * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
        *
        * @package soundstheme
    */

    get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

  <?php

    if ( is_home() && ! is_front_page() ) : ?>
      <header>
        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
      </header>
    <?php
    endif;
?>



<?php
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

<?php if ( $wpb_all_query->have_posts() ) : ?>



    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
    <?php endwhile; ?>
    <!-- end of the loop -->



    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>




  </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
