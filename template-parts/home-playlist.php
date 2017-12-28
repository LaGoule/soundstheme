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
<h2 class="post-title"><?php the_title(); ?></h2>
<div class="post-content"><?php the_content(); ?></div>
<?php
$args = array( 'posts_per_page'=>-1, 'post_typ'=>'realisation','orderby'=> 'menu_order', 'order'=> 'ASC');
$loop = new WP_Query( $args );
if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
$link = get_permalink($post->ID);
$thumbID = get_post_thumbnail_id($post->ID);
$postImg = wp_get_attachment_image_src($thumbID,'width=1140&crop=1' );
$baseline = $post->post_excerpt;
?>
<div class="realisation-card">
 <a href="<?php echo $link; ?>" title="<?php echo $post->post_title; ?>" rel="prefetch">
 <div class="wide-img" style="background-image:url(<?php echo $postImg[0]; ?>);"></div>
 <div class="card-info">
 <h3 class="card-title"><?php echo $post->post_title; ?></h3>
 <?php if($baseline !='') { ?><h4 class="card-subtitle"><?php echo $baseline; ?></h4><?php } ?>
 </div>
 </a>
</div>
<?php endwhile;endif; ?>
<?php endwhile;
