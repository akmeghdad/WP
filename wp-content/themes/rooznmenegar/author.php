<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

//require( get_template_directory() . '/404.php' );
//exit;

/* 
				<header class="page-header">
					<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'twentyeleven' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
				</header>
				
				echo get_the_author();
				echo 'rrrrrrrrrrrrrrr';
				
				<p>Email the author: <a href="mailto:<?php echo get_the_author_meta('user_email', 25); ?>"><?php the_author_meta('display_name', 25); ?></a></p>
				
				//echo esc_url( get_author_posts_url( get_the_author_meta( "5" ) ) );
				//echo $user_email = get_the_author_meta('user_email');
				
*/

get_header(); ?>

				<section id="primary">
		<?php  //require( get_template_directory() . '/ak_sidebar_u.php' );?>
			<div id="content" role="main" style="margin:0;width: 100%;">

			<?php if ( have_posts() ) : ?>


				<?php //twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php  //require( get_template_directory() . '/ak_sidebar_r.php' );?>
				
				<div id="ak_page" >
				<img border="0" src="<?php echo get_template_directory_uri();?>/images/akauthor.png" width="30" height="30">
				<div id="ak_page_icon">صفحه نویسنده</div>
				
				<?php get_template_part( 'content', 'ak-author-sar' );?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'ak-author' );
					?>

				<?php endwhile; ?>
				</div> <!-- #ak_page -->
				<?php  //require( get_template_directory() . '/ak_sidebar_l.php' );?>
	
				<?php //twentyeleven_content_nav( 'nav-below' ); ?>
				<div class="navigation" style="text-align: center;font-size: 14px !important;font-family: tahoma;padding-bottom: 10px;">
				<?php wp_pagenavi(); ?>
				</div>
				

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>