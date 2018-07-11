<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

// emtehan mishavad ke baraye Archive saliyane tarikh shamsi bashad mesl 1393 na tarikh miladi mesl 2014
if ( is_year() )
ak_chek_year(false,"","01");

//get_header(); ?>

		<?php if ( is_day() ) : ?>
		<?php //printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<span>' . get_the_date() . '</span>' ); ?>
		<?php  require( get_template_directory() . '/ak-archive-day.php' );?>
		
		<?php else : 
		get_header();?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			//while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				//get_template_part( 'content', get_post_format() );

			//endwhile; ?>

			<div id="ak_page" >
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<span>' . get_the_date() . '</span>' ); ?>
				
				<?php elseif ( is_month() ) : ?>
					<?php //printf( __( 'Monthly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
					<?php  require( get_template_directory() . '/ak-archive-month.php' );?>
				
				<?php elseif ( is_year() ) : ?>
					<?php //printf( __( 'Yearly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
					<?php  require( get_template_directory() . '/ak-archive-year.php' );?>
				<?php else : ?>
					<?php //_e( 'Blog Archives', 'twentyeleven' ); ?>
				<?php endif; ?>

				<?php //twentyeleven_content_nav( 'nav-below' ); ?>
			</div>
			

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->
		<?php endif; ?>

<?php if ( !is_day() ) 
 get_sidebar(); ?>

<?php get_footer(); ?>