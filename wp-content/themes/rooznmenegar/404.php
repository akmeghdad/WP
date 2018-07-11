<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
// baraye safe asli nevisandegan
// $chars = preg_split('/\//', $_SERVER['REQUEST_URI'] ,-1, PREG_SPLIT_NO_EMPTY);

// foreach($chars as $k) {
// 	$akak1 +=1;
// }

// if ($chars[$akak1-1] == "author"){
// 	get_template_part( 'content', 'ak-author-main' );
// 	exit;
// }
get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( ' خطای 404', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php 
get_sidebar(); 
get_footer(); ?>