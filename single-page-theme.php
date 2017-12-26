<?php
    /*
        Template Name: One-pager Template
    */

    get_header(); ?>

    <div id="primary" class="site-content">
        <div id="content" role="main">
          <?php
          
            wp_reset_query();
            $pages = get_pages();
            foreach ($pages as $page_data) {
                 $content = apply_filters(‘the_content’, $page_data->post_content);
                 $title = $page_data->post_title;
                 $shoppic = get_field( 'shoppic' );
                 $secid = $page_data->post_id;

                 //Structure et titre de la page
                 echo "<div class='sections post-" . $secid . "'><h2 class='sec-title'>";
                 echo $title;
                 echo "</h2><div class='sec-content'>";

                 //Si le lien "image du magasin" existe, on l'affiche
                 if($shoppic){
                   echo '<p class="shop-picture"><a class="foobox" href="' . $shoppic .'">[Image du magasin]</a></p>';
                 }
                 //Contenu de la page
                 echo '<p>';
                 echo $content;
                 echo "</p></div></div>";
            }

          ?>
      <!--
          <?php
            $menu_items = wp_get_nav_menu_items('main-nav');
            if( $menu_items ) {
            foreach ($menu_items as $menu_item ) {
            $args = array('p' => $menu_item->object_id,'post_type' => 'any');

            global $wp_query;
            $wp_query = new WP_Query($args);
            $templatePart = ($menu_item->title == 'content-page') ? 'content-page' : $menu_item->object;
            ?>

            <section <?php post_class('sep'); ?> id="<?php echo sanitize_title($menu_item->title); ?> ">
            <?php
            if ( have_posts() ){
               include(locate_template('home-'.$templatePart.'.php'));
            } ?>
            </section>
          <?php }}; ?>
        -->

            <?php /*
                $args = array("post_type" => "page", "order" => "ASC", "orderby" => "menu_order");
                $the_query = new WP_Query($args);
            ?>
            <?php if(have_posts()):while($the_query->have_posts()):$the_query->the_post(); ?>
            <?php get_template_part("content", "page"); ?>
            <?php endwhile; endif; */ ?>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
