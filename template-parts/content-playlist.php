<?php
/**
 * Template part for displaying the playlists content custom fields
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package soundstheme
 */

?>



<?php

// check if the repeater field has rows of data
if( have_rows('track') ):

		echo '<ul>';
 		// loop through the rows of data
    while ( have_rows('track') ) : the_row();
				echo '<li class="piste">';

        // display a sub field value
				//if(get_sub_field('image')){
					//$sfid = the_sub_field('image');
					//wp_get_attachment_image( $sfid, array('100', '100'), "", array( "class" => "cover" ) );
				//}

        // display a sub field value

				echo '</li>';

    endwhile;
		echo '</ul>';
else :

    // no rows found

endif;

?>
