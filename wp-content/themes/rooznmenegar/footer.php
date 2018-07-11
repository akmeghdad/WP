<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	</div><!-- #page -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'twentytwelve_credits' ); ?>
			طراحی و برنامه نویسی توسط <a href="https://www.facebook.com/akmeghdad" title="Meghdad Abolfazli" target="_blank">مقداد ابوالفضلی</a>
			<?php /* 
			برپایه <a href="http://wordpress.org/" title="Wordpress" target="_blank">وردپرس</a>
			*/?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


<?php wp_footer(); ?>
</body>
</html>