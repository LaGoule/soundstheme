<?php
    /*
        Template Name: One-pager Template
    */

    get_header(); ?>

    <div id="primary" class="site-content">
        <div id="content" role="main">
          <?php
            $pages = get_pages();
            foreach ($pages as $page_data) {
                 $content = apply_filters(‘the_content’, $page_data->post_content);
                 $title = $page_data->post_title;
                 $shoppic = get_field( 'shoppic' );
                 $pageid = get_the_ID();

                 //Structure et titre de la page
                 echo "<div class='sections post-" . $pageid . "'><h2 class='sec-title'>";
                 echo $title;
                 echo "</h2><div class='sec-content more'>";

                 //Si le lien "image du magasin" existe, on l'affiche
                 if($shoppic){
      ;             echo '<p class='shoppic'><a class="foobox" href="' .$shoppic.'">[Image du magasin]</a></p>';
                 }
                 //Contenu de la page
                 echo '<p>';
                 echo $content;
                 echo "</p></div></div>";
            }
            wp_reset_query();
          ?>


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
