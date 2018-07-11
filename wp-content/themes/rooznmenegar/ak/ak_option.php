<?php
// hazf Jquery pishfarz va gozashtan Jquery Google
// if( !is_admin()){
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false, '1.11.3');
	wp_enqueue_script('jquery');
// }
	// add_image_size( 'ak-thumb', 600, 343, true ); // ya  650 X 371
	



// farakhani matlab
function ak_post($cat,$showpost=1,$siz='thumbnail',$met=array()) {

	wp_reset_query();

	$args = array(
			'showposts' => $showpost,
			'cat' => $cat,
			'year'  => (is_day())? ak_date_y: null,
			'monthnum' => (is_day())? ak_date_m: null,
			'day'   => (is_day())? ak_date_d: null,
	);
	
// 	$size = ($siz=='full')?'full':'thumbnail';

	$akimg = array(
			//'width' => '601',
			//'height' => '108',
			'image_class' => 'medium feature-image medium ',
			'default_image' => 'http://localhost/wp/Rooznamenegar/wp/wp-content/themes/Rooznmenegar-twentytwelve/ak/images/no-image.jpg' ,
			'image_scan' => true,
			'size' => $siz,
			'link_to_post' => true,
			'echo' => false,
			//	'meta_key' => 'feature_img',
			//	'the_post_thumbnail' => true,
			//'attachment' => false,
	);

	query_posts($args);
	while (have_posts()) : the_post();
		$akid=get_the_ID();
		//$akmeta['video_id'][] = get_post_meta($akid, "video_id", true);
		$akmeta['description'][] = get_post_meta($akid, "txt-mini", true);
		//$akmeta['description-oth'][] = get_post_meta($akid, "txt-min-oth", true);
		//$akmeta['author'][] = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a>';
		$akmeta['author'][] = ak_get_author($akid);
		$akmeta['title'][] = get_the_title();
		$akmeta['link'][] = get_permalink();
		$akmeta['img'][] = get_the_image( $akimg );
		$akmeta['id'][] = $akid;
		$akmeta['time_en'][] = get_the_time ('j F');
		//$akmeta['time'][] = jtime('j F Y', $akid);
		foreach ($met as $meta){
			$akmeta['meta'][] = get_post_meta($akid, $meta,true);
		}
	endwhile;
	wp_reset_query();
	return $akmeta;
}

function ak_get_author($akid){
	//$akid = get_the_author_meta( "ID" );
	$akarray = array(100); // ID author haii ke nabayad namayesh dad

	if (in_array($akid, $akarray)) {
		return "";
	}else{
		return '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a>';
	}
	//$akmeta['author'][] = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a>';
}

// esm nevusande baraye ADMIN namayesh dade nashavad
function ak_autor_show(){ 
	$ak1 = coauthors_IDs ( "-", "-", "-", "-", false );
	$ak2 = preg_split('/-/', $ak1 ,-1, PREG_SPLIT_NO_EMPTY);

	foreach ($ak2 as $x1){
		if ($x1 == 1){
			return false;
			break;
		}
	}
	return true;
	// 	return $ak1;
	// <span>نویسنده:<?php coauthors_posts_links ( "، ", " و ", " ", " ", true )? ></span>

}

// tarikh balaye site
function ak_tarikh_titr(){
	global $wpdb,$table_prefix;

	$akdat = current_time('mysql');

	if (is_category() || is_single() || is_search() || is_author()){

		$taim = get_the_time('d-m-Y');
		$akdat = akdateadd($taim,1);
		$tmp = explode("-",$taim); //khorooji $tmpa[2]-> Year  $tmpa[1]->month     $tmpa[0]->day
	}

	$status = $wpdb->get_results("SELECT * FROM ".$table_prefix."ak_tarikh WHERE tarikh_date < '$akdat' ORDER BY ".$table_prefix."ak_tarikh.ID DESC LIMIT 0 , 1");

	foreach ($status as $status) {
		$ak_titr = $status -> tarikh_title;
	}

	if (is_category() || is_single() || is_search() || is_author()){
		$ak_titr = '<a href="' . get_day_link($tmp[2], $tmp[1], $tmp[0]) . '"'. ak_cal_tip_tarikh($tmp[0],$tmp[1],$tmp[2]).'>'.$ak_titr.'</a>';
	}

	return $ak_titr;

}

// dar ak_tarikh_titr estefade mishe
function akdateadd($day,$toadd){ //input format: d/m/yyyy
	$tmpa = explode("-",$day); //khorooji $tmpa[2]-> Year  $tmpa[1]->month     $tmpa[0]->day
	$tmp = jalali_to_gregorian($tmpa[2],$tmpa[1],$tmpa[0]); //khorooji $tmp[0]-> Year  $tmp[1]->month     $tmp[2]->day
	$dadate = mktime(0,0,0,$tmp[1],$tmp[2]+($toadd),$tmp[0]);
	return date("Y-m-d",$dadate);
}

// 2014-01-16 16:11:08 => 16/janvier/2014
function akj_mysql2date($dateformatstring, $mysqlstring, $translate = true) {
	global $month, $weekday, $month_abbrev, $weekday_abbrev;
	$m = $mysqlstring;
	if ( empty($m) ) {
		return false;
	}
	$i = mktime(substr($m,11,2),substr($m,14,2),substr($m,17,2),substr($m,5,2),substr($m,8,2),substr($m,0,4));

	if ( -1 == $i || false == $i )
		$i = 0;

	$j = @jdate($dateformatstring, $i);
	return $j;
}

//
function ak_add_menu(){
	global $wp_admin_bar;
	$ak_space = get_bloginfo( 'name' ).'_space';
//	$wp_admin_bar->add_menu( array( 'parent' => 'wpseo-menu', 'id' => 'wpseo-kwresearch', 'title' => __( 'Keyword Research', 'wordpress-seo' ), 'href' => 'https://adwords.google.com/select/KeywordToolExternal', 'meta' => array('target' => '_blank'), ) );
	$wp_admin_bar->add_menu( array( 'id' => 'ak_meno', 'title' => $ak_space, ) );
	$wp_admin_bar->add_menu( array( 'parent' => 'ak_meno', 'id' => 'ak_tarikh_sar_titr', 'title' => 'ورود به فضای مجازی', 'href' => 'http://ns220273.ip-188-165-239.eu/pydio', 'meta' => array( 'target'=>'_blank' ) ) );
	/*
	$wp_admin_bar->add_menu( array( 'parent' => 'ak_meno', 'id' => 'ak_theme_demo', 'title' => 'پیش نمایش سایت', 'href' => 'http://rahedigar.net/?theme=Rahedigar&passkey=767638024fa413272414a&ghaaaleb=1', ) );
	$wp_admin_bar->add_menu( array( 'parent' => 'ak_meno', 'id' => 'ak_img_up', 'title' => 'آپلود عکس تیتر یک', 'href' => 'http://rahedigar.net/wp-content/plugins/ak_img_up', ) );
	$wp_admin_bar->add_menu( array( 'parent' => 'ak_meno', 'id' => 'ak_wpfilebase_up', 'title' => 'آپلود گروهی روزنامه چاپی', 'href' => 'http://rahedigar.net/wp-admin/admin.php?page=wpfilebase_manage&action=batch-upload', ) );
	$wp_admin_bar->add_menu( array( 'parent' => 'ak_meno', 'id' => 'ak_newpaper_up', 'title' => 'آپلود روزنامه چاپی', 'href' => 'http://rahedigar.net/wp-content/plugins/ak_newspaper_up', ) );
	*/
}

function ak_wp_head() {
	
	echo '<link rel="alternate" type="application/rss+xml" title="'. wp_title( '|', false, 'right' ).' &raquo; ط®ظˆط±ط§ع©" href="http://feeds.feedburner.com/mihannet/" />';
	echo '<link rel="shortcut icon" href="'. get_template_directory_uri().'/images/favicon.jpg" type="image/x-icon" />';
	echo '<link rel="stylesheet"  href="'. get_template_directory_uri().'/ak/ak_style.css" type="text/css" media="all" />';
// 	echo '<script type="text/javascript" src="'. get_option('siteurl').'/wp-includes/js/jquery/jquery.js"></script>';
// 	echo '<script type="text/javascript" src="'. get_template_directory_uri().'/ak/jquery.1.4.3.min.js"></script>';
// 	echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
	echo '<script type="text/javascript" src="'. get_template_directory_uri().'/ak/akmeghdad-farsi-num.js"></script>';

	echo "<script type='text/javascript'>
				$(document).ready(function () {
	
	    $(window).scroll(function () {
	        if ($(this).scrollTop() > 300) {
	            $('.scrollup').fadeIn();
	        } else {
	            $('.scrollup').fadeOut();
	        }
	    });
		
	    $('.scrollup').click(function () {
	        $(\"html, body\").animate({
	            scrollTop: 0
	        }, 800);
	        return false;
	    });
	});
		</script>";
	
	if(is_month() || is_day() || is_year())
		echo '<link rel="stylesheet" href="'. get_template_directory_uri().'/ak/ak_style_calendrie.css" type="text/css" media="all" />';
	
	if (!current_user_can('activate_plugins') || !is_super_admin() ){
		/*echo "<script type='text/javascript'>
		      var _gaq = _gaq || [];
		      _gaq.push(['_setAccount', 'UA-500']);
		      _gaq.push(['_trackPageview']);
		      (function() {
		        var ga = document.createElement('script');
		        ga.type = 'text/javascript';
		        ga.async = true;
		        ga.src = (document.location.protocol == 'https:' ?
		                  'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		        var s = document.getElementsByTagName('script')[0];
		        s.parentNode.insertBefore(ga, s);
		      })();
		    </script>";*/
		
		echo "<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', 'UA-1503508-10', 'auto');
		ga('send', 'pageview');
		
		</script>";
	}
}

function ak_wp_footer() {
	echo '<script type="text/javascript">
	/* <![CDATA[ */
	$(document).ready(function(){
	$(\'.ak-lft-logo\').persiaNumber();
	$(\'body\').persiaNumber();
	});
	/* ]]> */
	</script>';
}

function ak_wp_admin_head(){
	echo '<link rel="stylesheet" href="'. get_template_directory_uri().'/ak/ak_admin_style.css" type="text/css" media="all" />';
}


// نشان دادن گزینه "روزنامه نگار" در منو انتخاب اندازه تصویر
function ak_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
			'ak-thumb' => __( 'روزنامه نگار' ),
	) );
}

add_action('admin_head', 'ak_wp_admin_head');
add_action( 'wp_head', 'ak_wp_head' );
add_action( 'wp_footer', 'ak_wp_footer' );
add_action( 'admin_bar_menu', 'ak_add_menu', 95 );
// add_action( 'wp_before_admin_bar_render', 'ak_remove_admin_bar_links' );
//add_action('admin_menu','ak_hide_update_mass');

add_filter( 'image_size_names_choose', 'ak_custom_sizes' ); // نشان دادن گزینه شخصی برای قرار دادن تصویر مخصوص


/* hazf RSS pishfarz  */
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

// file makhsoos Archiv farakhani shavad
require( get_template_directory() . '/ak/ak_option_archive.php' );
//require( get_template_directory() . '/ak/ak_archive_calendrie.php' );

$chars = preg_split('/\//', $_SERVER['REQUEST_URI'] ,-1, PREG_SPLIT_NO_EMPTY);

foreach($chars as $k) {
	$akak1 +=1;
}

if ($chars[$akak1-1] == "author"){
	get_template_part( 'content', 'ak-author-main' );
	exit;
}
?>