<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php //_e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php if ( ! post_password_required() && ! is_attachment() ) :
				//the_post_thumbnail();
			endif; ?>

			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php if (ak_autor_show()):?>
					<span>توسط:<?php coauthors_posts_links ( "، ", " و ", " ", " ", true )?></span>
				<?php endif;?>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php if ( comments_open() && 1==2 ) : // akmeghdad-1 nooooooooo?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() // akmeghdad-1 nooooooooo?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
		
		<?php // tedad natayej va onvan jostejoo
				$allsearch = &new WP_Query("s=$s&showposts=-1"); 
				//$key = wp_specialchars($s, 1);
				$s = str_replace("  "," ",$s );
				$keys= explode(" ",$s);
				
				// akmeghdad
				// dar plugin HIGHLIGHT-SEARCH-TERMS be set_query_var( 'search_terms') gir midad vali set_query_var( 's') dorost kar mikard
				$keys = get_query_var( 'search_terms');
				$keys = get_search_query( 's' );
				
				$arr = array("329E56","2A55FF","55FF00","FF55FF","FFAA00","FF0055","00FFAA","C3C3C3","CD5F43","ECEB9A","9EE177","9BC3ED","D91A0D","9FD81A","996E17","A7FAA0");
				
				echo '<style type="text/css">';
				foreach ($keys as $ss){
					
					//echo ".term-$a { background-color:rgb($c1, $c2, $c3) }" ;
					echo ".term-$a { background-color:#$arr[$a] }" ;
					$ak_s .= ' <mark class="hilite term-'.$a.'">'.$ss.'</mark> ';
					$a +=1;
				} 
				echo "</style>";
				$count = $allsearch->post_count; 
				?>
		
		
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<?php if (1==2): // akmeghdad-2 nooooooooo?>
		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php
						/** This filter is documented in author.php */
						$author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><?php endif; // akmeghdad-2 nooooooooo?><!-- .entry-meta -->
	</article><!-- #post -->
