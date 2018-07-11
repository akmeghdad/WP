<?php
/**
 * The template for displaying posts in the Status Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

while (have_posts()) : the_post();
endwhile;

//echo get_the_author_meta( "ID" );






?>

<div class="ak_author_main">




<div class="ak_author_img">
<?php userphoto(get_the_author_meta( "ID" ))?>
<?php  /* ghablan injori gozashte bodam 
<img border="0" src="<?php echo get_option('siteurl') ?>/wp-content/uploads/images/userphoto/<?php echo get_the_author_meta( "ID" )?>.jpg"  width="220" height="220">
*/?>
</div>

<div class="ak_author_pnom" >
<?php echo get_the_author_meta( 'first_name', get_the_author_meta( "ID" ) )?> 
</div>

<div class="ak_author_nom" >
<?php echo get_the_author_meta( 'last_name', get_the_author_meta( "ID" ) )?> 
</div></div>
	
