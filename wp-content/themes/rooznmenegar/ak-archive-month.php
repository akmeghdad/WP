<?php
/**
 * The template for displaying posts in the Status Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

echo'<div style="padding-bottom: 20px;font-weight: bold;" >
				<img border="0" src="'. get_template_directory_uri().'/images/archive.png" width="30" height="30">
				<div id="ak_page_icon">بایگانی ماهیانه</div></div>';

echo'<div style="width: 100%;"><div class="ak_cal_txt" style="float:right;">
		<P>شما بایگانی ماه
		<strong>'.ak_this_month_year("month").'</strong>
		را انتخاب کردید برای مطالعه شماره های قبلی هفته نامه 
		<b>روزنامه نگار</b>، می توانید در تقویم زیر روی تاریخ مورد نظرتان کلیک کنید.
		</p><p>
		همچنین می توانید با کلیک روی نام هر ماه به بایگانی ماهیانه دلخواه خود دسترسی داشته باشید.
		</p><p>
		تنها لینک ماههایی که در آنها هفته نامه منتشر شده است فعال می باشند. 
		</p></div><div class="ak_cal_main" style="float:right1;">
		<div class="ak_cal_back_main">
	';
echo ak_archive_calendar(true);
echo '</div></div></div><div style="float: right;width: 100%;height: 30px;"></div>';
echo '<div class="ak_cal_other" style="float: right;width: 100%;"><div class="ak_cal_other_1" style="float: right;padding-bottom: 30px;">';

echo '<div style="float: right;padding-left: 35px;">';
echo ak_archive_calendar(false,"","01");
echo '</div><div style="float: right;padding-left: 35px;">';
echo ak_archive_calendar(false,"","02");
echo '</div><div style="float: right;">';
echo ak_archive_calendar(false,"","03");
echo '</div></div><div class="ak_cal_other_2" style="float: right;padding-bottom: 30px;">';

echo '<div style="float: right;padding-left: 35px;">';
echo ak_archive_calendar(false,"","04");
echo '</div><div style="float: right;padding-left: 35px;">';
echo ak_archive_calendar(false,"","05");
echo '</div><div style="float: right;">';
echo ak_archive_calendar(false,"","06");
echo '</div></div><div class="ak_cal_other_3" style="float: right;padding-bottom: 30px;">';

echo '<div style="float: right;padding-left: 35px;">';
echo ak_archive_calendar(false,"","07");
echo '</div><div style="float: right;padding-left: 35px;">';
echo ak_archive_calendar(false,"","08");
echo '</div><div style="float: right;">';
echo ak_archive_calendar(false,"","09");
echo '</div></div><div class="ak_cal_other_4" style="float: right;padding-bottom: 30px;">';

echo '<div style="float: right;padding-left: 35px;">';
echo ak_archive_calendar(false,"","10");
echo '</div><div style="float: right;padding-left: 35px;">';
echo ak_archive_calendar(false,"","11");
echo '</div><div style="float: right;">';
echo ak_archive_calendar(false,"","12").'</div></div></div>';
?>