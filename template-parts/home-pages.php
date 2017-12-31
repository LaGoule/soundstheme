<?php
    /*
        Template Name: Home-page (part)
    */


while(have_posts()) : the_post(); ?>
  <h2 class="sec-title"><?php the_title(); ?></h2>
  <div class="post-excerpt"><?php the_excerpt(); ?></div>
  <div class="sec-content"><?php the_content(); ?></div>
<?php endwhile; ?>
