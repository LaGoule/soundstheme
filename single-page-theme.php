<?php
  /**
   * Template Name: One-pager Template
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package soundstheme
   */
   get_header();
?>
<!--
    <div id="primary" class="site-content">
        <div id="content" role="main">
-->
          <?php
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
                   echo '<p class='shoppic'><a class="foobox" href="' .$shoppic.'">[Image du magasin]</a></p>';
                 }
                 //Contenu de la page
                 echo '<p>';
                 echo $content;
                 echo "</p></div></div>";
            }
          ?>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
