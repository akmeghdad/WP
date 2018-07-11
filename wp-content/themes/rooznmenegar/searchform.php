<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
/*
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'twentyeleven' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'جستجو', 'twentyeleven' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'بجو', 'twentyeleven' ); ?>" />
	</form>

*/?>
	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div>
					<label class="screen-reader-text assistive-text"  for="s">جستجو :</label>
					<input type="text"  class="field" name="s" placeholder="<?php (isset ($_GET["s"]))? $_GET["s"] : esc_attr_e( 'جستجو', 'twentyeleven' ); ?>" id="s">
					<input type="submit" id="searchsubmit" value="جستجو">
				</div>
			</form>