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
if ( is_day() ){ 
	$chars = preg_split('/\//', $_SERVER['REQUEST_URI'] ,-1, PREG_SPLIT_NO_EMPTY);
	
	foreach($chars as $k) {
		$akak1 +=1;
	}
	//echo 'آرشیو ';
	define("ak_date_d", $chars[$akak1-1]);
	define("ak_date_m", $chars[$akak1-2]);
	define("ak_date_y", $chars[$akak1-3]);

	get_template_part( 'ak_bala_r' );
	ak_cal_theme(ak_date_d,ak_date_m,ak_date_y);
	get_footer(); 
	
	exit;
}elseif(is_year() ){
//	echo'<div style="padding-bottom: 20px;font-weight: bold;" >
//				<img border="0" src="'. get_template_directory_uri().'/images/archive.png" width="30" height="30">
//				<div id="ak_page_icon">بایگانی ماهیانه</div></div>';
	

// 	echo'<div style="padding-bottom: 20px;font-weight: bold;" >
				
// 				<div id="ak_page_icon">بایگانی سالیانه</div></div>';
	
//	echo'<div style="width: 100%;"><div class="ak_cal_txt" style="float:right;">
//		شما بایگانی ماه
//		<strong>'.ak_thismonth().'</strong>
//		را انتخاب کردید برای مطالعه شماره های قبلی روزنامه، می توانید در تقویم زیر روی تاریخ مورد نظرتان کلیک کنید.	
//		<br>
//		همچنین می توانید با کلیک روی نام هر ماه به بایگانی ماهیانه دلخواه خود دسترسی داشته باشید.
//		</div><div class="ak_cal_main" style="float:right1;">
//		<div class="ak_cal_back_main">
//	';
	/*echo'<div style="width: 100%;"><div class="ak_cal_txt" style="float:right;width: 95%;font-family: tahoma,arial;">*/
	echo'<div style="padding-bottom: 20px;font-weight: bold;" >
				<img border="0" src="'. get_template_directory_uri().'/images/archive-sal.png" width="30" height="30">
				<div id="ak_page_icon">بایگانی سالیانه</div></div>';
	echo'<div style="width: 100%;"><div class="ak_cal_txt" style="width: 100%;">
		
		<P>شما بایگانی سال 
		<strong>'.ak_this_month_year("year").'</strong>
		را
		انتخاب کردید برای مطالعه شماره های قبلی هفته نامه 
		<b>روزنامه نگار</b>
		، می توانید در تقویم زیر روی تاریخ مورد نظرتان کلیک کنید.	
		</p><p>
		همچنین می توانید با کلیک روی نام هر ماه به بایگانی ماهیانه دلخواه خود دسترسی داشته باشید.
		</p><p>
		تنها لینک ماههایی که در آنها هفته نامه منتشر شده است فعال می باشند. 
		</p></div><div class="ak_cal_main" style="float:right1;">
		<div class="ak_cal_back_main1">
	
	';
	//echo ak_archive_calendar(true);
	
// 	echo'<img border="0" src="'.get_template_directory_uri().'/images/1soae7vvi.png" align="left">';
	
	echo '</div></div></div>';
	echo '<div class="ak_cal_other" style="float: right;width: 100%;"><div class="ak_cal_other_1 ak_cal_css" style="float: right;padding-bottom: 30px;">';
/**/
	echo '<div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","01");
	echo '</div><div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","02");
	echo '</div><div style="float: right;">';
	echo ak_archive_calendar(false,"","03");
	echo '</div></div><div class="ak_cal_other_2 ak_cal_css" style="float: right;padding-bottom: 30px;">';
	
	echo '<div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","04");
	echo '</div><div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","05");
	echo '</div><div style="float: right;">';
	echo ak_archive_calendar(false,"","06");
	echo '</div></div><div class="ak_cal_other_3 ak_cal_css" style="float: right;padding-bottom: 30px;">';
	
	echo '<div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","07");
	echo '</div><div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","08");
	echo '</div><div style="float: right;">';
	echo ak_archive_calendar(false,"","09");
	echo '</div></div><div class="ak_cal_other_4 ak_cal_css" style="float: right;padding-bottom: 30px;">';
	
	echo '<div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","10");
	echo '</div><div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","11");
	echo '</div><div style="float: right;">';
	echo ak_archive_calendar(false,"","12").'</div></div></div>';
	
	
}elseif(is_month()){
	echo'<div style="padding-bottom: 20px;font-weight: bold;" >
				<img border="0" src="'. get_template_directory_uri().'/images/archive-sal.png" width="30" height="30">
				<div id="ak_page_icon">بایگانی سالیانه</div></div>';
	echo'<div style="width: 100%;"><div class="ak_cal_txt1" style="float:right;width: 325px;font-family: tahoma,arial;">
		
		شما بایگانی سال 
		<strong>'.ak_thisyear().'</strong>
		را انتخاب کردید برای مطالعه شماره های قبلی روزنامه، می توانید در تقویم زیر روی تاریخ مورد نظرتان کلیک کنید.	
		<br>
		همچنین می توانید با کلیک روی نام هر ماه به بایگانی ماهیانه دلخواه خود دسترسی داشته باشید.
		</div><div class="ak_cal_main" style="float:right1;">
		<div class="ak_cal_back_main1">
	
	';
	echo'<img border="0" src="'.get_option('siteurl').'/wp-content/themes/rahedigar/images/1soae7vvi.png" align="left">';
	echo '</div></div></div><div style="float: right;width: 100%;height: 30px;"></div>';
	echo '<div style="float: right;width: 100%;height: 30px;"></div>';
	echo '<div class="ak_cal_other" style="float: right;width: 100%;"><div class="ak_cal_other_1" style="float: right;padding-bottom: 30px;">';

	echo '<div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","04");
	echo '</div><div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","05");
	echo '</div><div style="float: right;">';
	echo ak_archive_calendar(false,"","06");
	echo '</div></div><div class="ak_cal_other_2" style="float: right;padding-bottom: 30px;">';
	
	echo '<div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","07");
	echo '</div><div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","08");
	echo '</div><div style="float: right;">';
	echo ak_archive_calendar(false,"","09");
	echo '</div></div><div class="ak_cal_other_3" style="float: right;padding-bottom: 30px;">';
	
	echo '<div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","10");
	echo '</div><div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","11");
	echo '</div><div style="float: right;">';
	echo ak_archive_calendar(false,"","12");
	echo '</div></div><div class="ak_cal_other_4" style="float: right;padding-bottom: 30px;">';
	
	echo '<div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","01");
	echo '</div><div style="float: right;padding-left: 35px;">';
	echo ak_archive_calendar(false,"","02");
	echo '</div><div style="float: right;">';
	echo ak_archive_calendar(false,"","03").'</div></div></div>';
}



?>
						
						
					<!-- 	-->

<!--
<header class="page-header">
					<h1 class="page-title">
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'twentyeleven' ); ?>
						<?php endif; ?>
					</h1>
				</header>-->
				
				
<?php /*
$akimg = array(
				//	'meta_key' => 'feature_img',
					'size' => 'ak-thumb',
					'width' => '150',
					'height' => '150',
					'image_class' => 'medium feature-image medium ',
					'default_image' => 'http://rahedigar.net/wp-content/uploads/images/no-image-150x150.jpg' ,
					'image_scan' => true,
				//	'the_post_thumbnail' => true,
					'link_to_post' => false,
				
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
		<div class="ak_trkh_titr">
<?php //echo ak_tarikh_titr()?>
</div>
		<div class="entry-summary" style="padding-top: 10px;font-family: tahoma;">
			<div style="float:right;width: 345px;">
			<?php //the_excerpt(); 
			the_content_limit(500, "...", true);?>
			</div>
			
<!--			<div style="float:left">-->
			<div style=" " class="wp-caption alignleft" id="attachment_87">
			<?php get_the_image( $akimg);	?>
			</div>
			
		</div><!-- .entry-summary -->

		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->

 */?>
