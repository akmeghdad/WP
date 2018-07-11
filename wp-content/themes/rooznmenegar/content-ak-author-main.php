<?php
/**
 * The template for displaying posts in the Status Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */


get_header(); ?>

				<section id="primary">
		<?php  //require( get_template_directory() . '/ak_sidebar_u.php' );?>
			<div id="content" role="main" style="margin:0;width: 100%;">




				<?php /* Start the Loop */ ?>
				<?php  //require( get_template_directory() . '/ak_sidebar_r.php' );?>
				
				<div id="ak_page" >
				<img border="0" src="<?php echo get_template_directory_uri();?>/images/akauthorall.png" width="30" height="30">
				<div id="ak_page_icon">نویسندگان</div>
				
				<?php //get_template_part( 'content', 'ak-author-sar' );?>
				<?php //while ( have_posts() ) : the_post(); ?>
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'ak-author-all' );
					?>

				<?php //endwhile; ?>
				</div> <!-- #ak_page -->
				<?php  //require( get_template_directory() . '/ak_sidebar_l.php' );?>
	
				<div class="navigation" style="text-align: center;font-size: 14px !important;font-family: tahoma;padding-bottom: 10px;">
				<?php //wp_pagenavi(); ?>
				</div>
				

			</div><!-- #content -->
		</section><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>












	
