<?php
    /*
        Template Name: One-pager Template
    */

    get_header(); ?>

    <!--<div id="primary" class="site-content">-->
        <!--<div id="content" role="main">-->
          <?php

            $menu_items = wp_get_nav_menu_items('main-menu');
            if( $menu_items ) {

            foreach ($menu_items as $menu_item ) {
              $args = array('p' => $menu_item->object_id,'post_type' => 'any');

              global $wp_query;
              $wp_query = new WP_Query($args);
              $templatePart = ($menu_item->title == 'Playlist') ? 'playlist' : $menu_item->object;
              ?>

              <section <?php post_class('sections'); ?> id="<?php echo sanitize_title($menu_item->title); ?>">
              <?php

              $pagetitle = $menu_item->title;
              echo $pagetitle;
              //if ( have_posts() ){
                 include(locate_template('home-'.$templatePart.'.php'));
              //} ?>

              </section>

          <?php }}; ?>
        <!--</div> #content commnetaire-->
    <!--</div> #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
