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

		echo '<ul class="the-list">';
 		// loop through the rows of data
    while ( have_rows('track') ) : the_row();
				//ACF Variables
				$sfid = get_sub_field('image');
				$aname = get_sub_field('artist');
				$tname = get_sub_field('trackname');
				$desc = get_sub_field('description');
				$ytlink = get_sub_field('youtubelink');
				$bclink = get_sub_field('bandcamplink');

				//Nouvelle track dans la liste
				echo '<li class="the-track">';
	        // Cover
					if($sfid){echo wp_get_attachment_image( $sfid, 'thumbnail', "", array( "class" => "cover" ) );}

					echo '<div class="textwrap"><div class="textbox">';
		        // Artiste
						if($aname){echo '<p class="artist">'.$aname.'</p>';}
		        // Track
						if($tname){echo '<p class="trackname">'.$tname.'</p>';}
		        // Description
						if($desc){echo '<p class="description">'.$desc.'</p>';}

						echo '<div class="linkbox">';
			        // Youtube Link
							if($ytlink){echo '<a href='.$ytlink.' class="youtubelink">Youtube</a>';}
			        // Youtube Link
							if($bclink){echo '<a href='.$bclink.' class="bandcamplink">Bandcamp</a>';}
					echo '</div></div></div>';
				echo '</li>';

    endwhile;
		echo '</ul>';
else :

    // no rows found

endif;

?>
