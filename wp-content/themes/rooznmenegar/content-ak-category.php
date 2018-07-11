<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

?>

<?php 
$akimg = array(
				//	'meta_key' => 'feature_img',
					'size' => 'thumbnail',
// 					'width' => '150',
					//'height' => '150',
					'image_class' => 'medium feature-image medium ',
					'default_image' => 'http://mihan.net/wp-content/uploads/images/post/no-image1.jpg' ,
					'image_scan' => true,
					'attachment' => false,
					'link_to_post' => true,
					'the_post_thumbnail' => false,
				
				);
?>


	<article id="post-<?php the_ID(); ?>" <?php //post_class(); ?>>
	
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</header><!-- .entry-header -->
		
		

		<div class="entry-summary">
			<div class="ak_cat">
				<?php get_the_image( $akimg);	?>
				<div class="ak_trkh_titr">
					<?php echo ak_tarikh_titr()?>
				</div><p>
				<?php //the_excerpt(); 
				the_content_limit(350, "...", true);?>
				<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
				</p>
			</div>
			
<!--			<div style="float:left">-->
			
		</div><!-- .entry-summary -->

		<footer class="entry-meta">
			<?php //edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
	
