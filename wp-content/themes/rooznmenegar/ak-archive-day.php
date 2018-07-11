<?php
/**
 * The template for displaying posts in the Status Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

 /* 
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-520e6bcf62ec945c"></script>
*/

//$args = array(
//		'showposts' => 1,
//	);
//
//echo '<div id="main">';


$chars = preg_split('/\//', $_SERVER['REQUEST_URI'] ,-1, PREG_SPLIT_NO_EMPTY);

foreach($chars as $k) {
	$akak1 +=1;
}
//echo 'آرشیو ';
define("ak_date_d", $chars[$akak1-1]);
define("ak_date_m", $chars[$akak1-2]);
define("ak_date_y", $chars[$akak1-3]);

// dar header chek mikonad baraye hamin ebteda seda zadam vali baad neshan midaham
//$ak_them = ak_cal_theme(ak_date_d,ak_date_m,ak_date_y);

get_header();
require( get_template_directory() . '/ak_home.php' );
get_footer();

exit;

?>