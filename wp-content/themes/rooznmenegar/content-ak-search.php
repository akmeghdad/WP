<?php
/**
 * The template for displaying posts in the Status Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */
?>

<?php 
$akimg = array(
				//	'meta_key' => 'feature_img',
					'size' => 'ak-thumb',
					'width' => '150',
					//'height' => '150',
					'image_class' => 'medium feature-image medium ',
					'default_image' => 'http://mihan.net/wp-content/uploads/images/post/no-image1.jpg' ,
					'image_scan' => true,
					'attachment' => false,
					'link_to_post' => false,
					'the_post_thumbnail' => false,
				);
?>


	<article id="post-<?php the_ID(); ?>" <?php //post_class(); ?>>
	
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>


			<?php if ( comments_open() && ! post_password_required() && 1 ===2 ) : // sheklak marboot be comment neshan dade nemishe?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'twentyeleven' ) . '</span>', _x( '1', 'comments number', 'twentyeleven' ), _x( '%', 'comments number', 'twentyeleven' ) ); ?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->
		
		<div class="entry-summary">
			<div class="ak_cat">
				<?php get_the_image( $akimg);	?>
				<div class="ak_trkh_titr">
					<?php echo ak_tarikh_titr()?>
				</div><p>
				<?php //the_excerpt(); 
				the_content_limit(500, "...", true);?>
				<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
				</p>
			</div>
			
<!--			<div style="float:left">-->
			
		</div><!-- .entry-summary -->

	</article><!-- #post-<?php the_ID(); ?> -->
