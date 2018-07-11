<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
//require( get_template_directory() . '/404.php' );
//exit;

get_header(); ?>

		<section id="primary" class="site-content">
		<?php  //require( get_template_directory() . '/ak_sidebar_u.php' );?>
			<div id="content" role="main" >

			<?php if ( have_posts() ) : ?>


				<?php //twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php  //require( get_template_directory() . '/ak_sidebar_r.php' );?>
				
				<?php // tedad natayej va onvan jostejoo
				$allsearch = &new WP_Query("s=$s&showposts=-1"); 
				//$key = wp_specialchars($s, 1);
				$s = str_replace("  "," ",$s );
				$keys= explode(" ",$s);
				$a = 0;
				
				// akmeghdad
				// dar plugin HIGHLIGHT-SEARCH-TERMS be set_query_var( 'search_terms') gir midad vali set_query_var( 's') dorost kar mikard
				set_query_var( 'search_terms' , $keys);
				
				$arr = array("FF0","C358FF","55FF00","2A55FF","FF55FF","FFAA00","FF0055","329E56","00FFAA","C3C3C3","CD5F43","ECEB9A","9EE177","9BC3ED","D91A0D","9FD81A","996E17","A7FAA0");
				
				// ------echo '<style type="text/css">';
				foreach ($keys as $ss){
					
					//echo ".term-$a { background-color:rgb($c1, $c2, $c3) }" ;
					// ------echo ".term-$a { background-color:#$arr[$a] }" ;
					$ak_s .= ' <mark class="hilite term-'.$a.'">'.$ss.'</mark> ';
					$a +=1;
				} 
				// ----echo "</style>";
				$count = $allsearch->post_count; 
				?>
				
				
				<div id="ak_page" >
				<img border="0" src="<?php echo get_template_directory_uri();?>/images/category.png" width="30" height="30">
				<div id="ak_page_icon">جستجو | <span style="font-family: tahoma;font-size: 12px;font-weight: normal;">برای: </span>
				<?php echo $ak_s?>
				<?php /* badan dorost shavad
				 | <span style="font-family: tahoma;font-size: 12px;font-weight: normal;">تعداد: </span><?php echo $count?>
				 */ ?>
				</div>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'ak-search' );
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
						<h1 class="entry-title"><?php _e( 'جستجو بی نتیجه بود', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p>با عرض پوزش، مقاله ای پیدا نشد. شاید بایگانی سالیانه و یا ماهیانه بتواند به شما کمک کند.</p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>