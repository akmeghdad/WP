<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

			<?php if ( have_posts() ) : ?>


				<?php //twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php  //require( get_template_directory() . '/ak_sidebar_r.php' );?>
				
				<div id="ak_page" >
				<img border="0" src="<?php echo get_template_directory_uri();?>/images/category.png" width="30" height="30">
				<div id="ak_page_icon">دسته بندی | <?php echo single_cat_title( '', false )?></div>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'ak-category' );
					?>

				<?php endwhile; ?>
				</div> <!-- #ak_page -->
				<?php  //require( get_template_directory() . '/ak_sidebar_l.php' );?>
	
				<?php //twentyeleven_content_nav( 'nav-below' ); ?>
				<div class="navigation" style="text-align: center;font-size: 14px !important;font-family: tahoma;padding-bottom: 10px;">
				<?php wp_pagenavi(); ?>
				</div>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>