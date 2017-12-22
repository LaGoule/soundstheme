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
                 echo "<div class='sections'><h2 class='sec-title'>";
                 echo $title;
                 echo "</h2><div class='sec-content'>";
                 echo $content;
                 echo "</div></div>";
            }
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
