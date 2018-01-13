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
				$sfid = get_sub_field('image');
				$aname = get_sub_field('artist');
				$tname = get_sub_field('trackname');
				$desc = get_sub_field('description');
				$ytlink = get_sub_field('youtubelink');
				$bclink = get_sub_field('bandcamplink');

				echo '<li class="piste">';
        // Cover
				if($sfid){echo wp_get_attachment_image( $sfid, 'thumbnail', "", array( "class" => "cover" ) );}
        // Artiste
				if($aname){echo '<p>'.$aname.'</p>';}
        // Track
				if($tname){echo '<p>'.$tname.'</p>';}
        // Description
				if($desc){echo '<p>'.$desc.'</p>';}
        // Youtube Link
				if($ytlink){echo '<p>'.$ytlink.'</p>';}
        // Youtube Link
				if($bclink){echo '<p>'.$bclink.'</p>';}

				echo '</li>';

    endwhile;
		echo '</ul>';
else :

    // no rows found

endif;

?>
