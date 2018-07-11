<?php
/**
 * emal taghirat marboot be RAHEDIGAR.NET dar theme Twenty_Eleven
 */


// emtehan mishavad ke Archive saliyane tarikh shamsi bashad mesl 1393 na tarikh miladi mesl 2014
function ak_chek_year($ak_main_calendrie= false, $ak_thisday="", $ak_thismonth="", $ak_thisyear="", $ak_show_nextmonth=false, $ak_show_year=false) {
	global $wpdb, $m, $monthnum, $year, $timedifference, $month, $day,  $posts;
	global $j_month_name , $j_day_name , $jday_abbrev;
	


		
		$monthnum =  gmdate('m', current_time('timestamp') + get_option('gmt_offset') * 3600);
		$thismonth = ''.zeroise(intval($monthnum), 2);
		$thisyear = ''.intval($year);
		$chthisyear = gmdate('Y', current_time('timestamp') + get_option('gmt_offset') * 3600);
		
		if ((int)$thisyear == (int)$chthisyear){
			//require( get_template_directory() . '/404.php' );
			header('Location: ../404-not-found');
			exit;
		}
}


function ak_cat_yr() {
	$ala = get_cat_name( $_GET["tvcat"] );
	if (!empty($ala ) ){
		return 'برای برنامه <strong>'.$ala.'</strong>';	
	}
}

/* neshan dadan mah jari */
function ak_day(){
	global  $monthnum, $year, $day ;
	
	
	$thismonth = ''.zeroise(intval($monthnum), 2);
	$thisyear = ''.intval($year);
	
	$unixmonth = jmaketime(0, 0 , 0, $thismonth, $day, $thisyear);
	
	
	return jdate('j F Y', $unixmonth);
}

/* neshan dadan mah jari */
function ak_this_month_year($ak_this="month"){
	
	global $wpdb, $posts, $wp;
	global $jdate_month_name, $ztjalali_option;
	
	$thismonth = (int)$wp->query_vars['monthnum'];
	$thisyear = (int)$wp->query_vars['year'];
	$unixmonth = jmktime(0, 0, 0, $thismonth, 1, $thisyear);
	$jthisyear = $thisyear;
	$jthismonth = $thismonth;
	
	
	switch ($ak_this){
		case "month":
			return $jdate_month_name[(int)$jthismonth].' '.jdate('Y', $unixmonth) ;
			break;
			
		case "year":
			return jdate('Y', $unixmonth) ;
			break;
		
	}
	
}

function ak_thisyear(){
	global $wpdb, $posts, $wp;
	global $jdate_month_name, $ztjalali_option;
	
	$thismonth = (int)$wp->query_vars['monthnum'];
	$thisyear = (int)$wp->query_vars['year'];
	$unixmonth = jmktime(0, 0, 0, $thismonth, 1, $thisyear);
	$jthisyear = $thisyear;
	$jthismonth = $thismonth;
	
	
	
	/* translators: Calendar caption: 1: month name, 2: 4-digit year */
	$calendar_caption = _x('%1$s %2$s', 'calendar caption');
	
	return	$calendar_output = sprintf($calendar_caption, $jdate_month_name[(int)$jthismonth], jdate('Y', $unixmonth)) ;
}

// namayesh taghvin dar archive 
function ak_archive_calendar1($ak_main_calendrie= false, $ak_thisday="", $ak_thismonth="", $ak_thisyear="", $ak_show_nextmonth=false, $ak_show_year=false) {
	global $wpdb, $m, $monthnum, $year, $timedifference, $month, $day,  $posts;
	global $j_month_name , $j_day_name , $jday_abbrev;
	
	$_wp_version = get_bloginfo("version");
	if (version_compare($_wp_version, '2.1', '>=')) {
		$_query_add = " post_type='post' ";
	} else {
		$_query_add = " 1 = 1 "; // =)) 11-5-2007 0:38
	}
	
	if (!$posts) {
		$gotsome = $wpdb->get_var("SELECT ID from $wpdb->posts WHERE ".$_query_add." AND post_status = 'publish' ORDER BY post_date DESC LIMIT 1");
		if (!$gotsome) return;
	}

	$week_begins = intval(get_option('start_of_week'));
	$add_hours = intval(get_option('gmt_offset'));
	$add_minutes = intval(60 * (get_option('gmt_offset') - $add_hours));

	$input_is_gregorian = false;

	if (!empty($monthnum) && !empty($year)) {
		$thismonth = ''.zeroise(intval($monthnum), 2);
		$thisyear = ''.intval($year);
	}elseif (!empty($m)) {
		$calendar = substr($m, 0, 6);
		$thisyear = ''.intval(substr($m, 0, 4));
		if (strlen($m) < 6) {
			$thismonth = '01';
		} else {
			$thismonth = ''.zeroise(intval(substr($m, 4, 2)), 2);
		}
	}else {
		// khathaye zir hazf shod va 3 khat badi ezafe shod chon az mah BAHMAN shoroo mishod
//		$input_is_gregorian = true;
//		$thisyear = gmdate('Y', current_time('timestamp') + get_option('gmt_offset') * 3600);
//		$thismonth = gmdate('m', current_time('timestamp') + get_option('gmt_offset') * 3600);
//		$thisday = gmdate('d', current_time('timestamp') + get_option('gmt_offset') * 3600);
		
		$monthnum =  gmdate('m', current_time('timestamp') + get_option('gmt_offset') * 3600);
		$thismonth = ''.zeroise(intval($monthnum), 2);
		$thisyear = ''.intval($year);
	}
	
	// taghvim bar asas tarikh darkhasti // ak rahedigar
	if (!empty($ak_thisday))
		$thisday = $ak_thisday;
	if (!empty($ak_thismonth))
		$thismonth = $ak_thismonth;
	if (!empty($ak_thisyear))
		$thisyear = $ak_thisyear;
	
	if ($input_is_gregorian) {
		list($jthisyear,$jthismonth,$jthisday) = gregorian_to_jalali($thisyear,$thismonth,$thisday);
		$unixmonth = jmaketime(0, 0 , 0, $jthismonth, 1, $jthisyear);
	} else {
		$unixmonth = jmaketime(0, 0 , 0, $thismonth, 1, $thisyear);
		$jthisyear = $thisyear;
		$jthismonth = $thismonth;

	}

	$jnextmonth = $jthismonth + 1;
	$jnextyear = $jthisyear;
	if ($jnextmonth > 12) {
		$jnextmonth = 1;
		$jnextyear++;
	}
	//This is so important to change the table dir to RTL and keep it // rahedigar ak
	echo '<table id="wp-calendar" style="direction: rtl;border-spacing: 5px"><caption class="ak_cal_sa">';
	if($ak_main_calendrie){
	   	echo $j_month_name[(int) $jthismonth ] . ' ' . jdate('Y', $unixmonth) ;
	}else{
		echo'<a href="' .get_option('siteurl').english_num(jdate('/Y/m/', $unixmonth)).'" title="' . 
		$j_month_name[(int) $jthismonth ] . ' ' . jdate('Y', $unixmonth). '">' . 
		$j_month_name[(int) $jthismonth ] . ' ' . jdate('Y', $unixmonth) ;
	}
    echo'</caption><thead> <tr>';

	$day_abbrev = $weekday_initial;

	$myweek = array();

	for ($wdcount=0; $wdcount<=6; $wdcount++) {
		$myweek[]=$jday_abbrev[($wdcount+$week_begins)%7];
	}

	foreach ($myweek as $wd) {
		echo "\n\t\t<th abbr=\"$wd\" scope=\"col\" title=\"$wd\">" . $wd . '</th>';
	}

	echo '
    </tr>
    </thead>';
	
	$g_startdate = date("Y:m:d H:i:s",jmaketime(0,0,0,$jthismonth,1,$jthisyear));
	$g_enddate = date("Y:m:d H:i:s",jmaketime(0,0,0,$jnextmonth,1,$jnextyear));
	$prev = $wpdb->get_results("SELECT count(id) AS prev FROM $wpdb->posts
    								WHERE $_query_add
    								AND post_date < '$g_startdate'
    								AND post_status = 'publish'
    								AND post_date < '" . current_time('mysql') . '\'', ARRAY_N);

	$next = $wpdb->get_results("SELECT count(id) AS next FROM $wpdb->posts
    								WHERE $_query_add
    								AND post_date > '$g_enddate'
    								AND post_status = 'publish'
    								AND post_date < '" . current_time('mysql') . '\'', ARRAY_N);
	if ($prev[0][0] != 0) $is_prev = true; else $is_prev = false;
	if ($next[0][0] != 0) $is_next = true; else $is_next = false;

	if ($is_prev) {
		$previous_month = $jthismonth - 1;
		$previous_year = $jthisyear;
		if ($previous_month == 0) {
			$previous_month = 12;
			$previous_year --;
		}
	}
	if ($is_next) {
		$next_month = $jthismonth + 1;
		$next_year = $jthisyear;
		if ($next_month == 13) {
			$next_month = 1;
			$next_year ++;
		}
	}
	
	echo'
    <tbody>
    <tr>';

	$dayswithposts = $wpdb->get_results("SELECT DISTINCT DAYOFMONTH(post_date),MONTH(post_date),YEAR(post_date)
            FROM $wpdb->posts 
        	WHERE $_query_add 
            AND post_date > '$g_startdate' AND post_date < '$g_enddate'
            AND post_status = 'publish'
            AND post_date < '" . current_time('mysql') . '\'', ARRAY_N);

	$ak_link_cal = false;
	$ak_no_get = true;
	
	if (!empty($_GET["tvcat"])){
		$akwithpost = array();
		$dayswithposts = '';
		$ak_no_get = true;
		$ak_dayswithposts = $wpdb->get_results("SELECT *
            FROM $wpdb->posts 
        	WHERE $_query_add 
            AND post_date > '$g_startdate' AND post_date < '$g_enddate'
            AND post_status = 'publish'
            AND post_date < '" . current_time('mysql') . '\'', ARRAY_N);
		
		foreach ($ak_dayswithposts as $status) {
			$ak_id = $status[0];
			$akstr_cat = get_the_category($ak_id);
			$ak_cat_id = $akstr_cat[0] -> term_id;
			//echo '<br>';
			if ($ak_cat_id == $_GET["tvcat"]){
				$ak_css_cat = 'style="background: #CDD6EB;"';
				$ak_id.'<br>';
				
				$dayswithposts = $wpdb->get_results("SELECT DISTINCT DAYOFMONTH(post_date),MONTH(post_date),YEAR(post_date)
			            FROM $wpdb->posts 
			        	WHERE $_query_add 
			        	AND ID = $ak_id
			            AND post_date > '$g_startdate' AND post_date < '$g_enddate'
			            AND post_status = 'publish'
			            AND post_date < '" . current_time('mysql') . '\'', ARRAY_N);
				foreach ($dayswithposts as $daywith) {
					//$daywithpost[] = $daywith[0];
					$akss1 = $daywithpost[] = jdate("j",mktime(0,0,0,$daywith[1],$daywith[0],$daywith[2]),true);
					$akwithpost[$akss1] =   $ak_id ;
					//$akwithpost= array_merge_recursive($akwithpost, array(jdate("j",mktime(0,0,0,$daywith[1],$daywith[0],$daywith[2]),true) => $ak_id)) ;
				}
				$ak_no_get = false;
			}
		}
		
	}
	
	if (!$ak_link_cal){
		//$dayswithposts = '';
		//echo "5555";
	}
	
	if ($dayswithposts && $ak_no_get) {
		foreach ($dayswithposts as $daywith) {
			//$daywithpost[] = $daywith[0];
			$daywithpost[] = jdate("j",mktime(0,0,0,$daywith[1],$daywith[0],$daywith[2]),true);
		}
	} elseif($ak_no_get) {
		$daywithpost = array();
	}

	// See how much we should pad in the beginning
	$pad = calendar_week_mod(jdate('w', $unixmonth,true)-$week_begins);
	if (0 != $pad){
		if($ak_main_calendrie){
			echo "\n\t\t".'<td colspan="'.$pad.'" id="ak_pad">&nbsp;</td>';
		}else{
			echo "\n\t\t".'<td colspan="'.$pad.'" id="ak_pad">&nbsp;</td>';
		}
	}

	$daysinmonth = intval(jdate('t', $unixmonth,true));
	for ($day = 1; $day <= $daysinmonth; ++$day) {
		list($akthiyear,$thismonth,$thisday) = jalali_to_gregorian($jthisyear,$jthismonth,$day);
		if (isset($newrow) && $newrow)
		echo "\n\t</tr>\n\t<tr>\n\t\t";
		$newrow = false;
		
		if (empty($ak_thismonth)){
			if ($thisday == gmdate('j', (time() + (get_option('gmt_offset') * 3600))) && $thismonth == gmdate('m', time()+(get_option('gmt_offset') * 3600)) && $akthisyear == gmdate('Y', time()+(get_option('gmt_offset') * 3600)))
			echo '<td id="ak_today">';
			else
			echo '<td>';
		}else{
			if ($thisday == gmdate('j', (time() + (get_option('gmt_offset') * 3600))) && $thismonth == gmdate('m', time()+(get_option('gmt_offset') * 3600)))
			echo '<td id="ak_today">';
			else
			echo '<td>';
		}
		
		$mps_jd_optionsDB = get_option(MPS_JD_OPTIONS_NAME);
		$mps_jd_farsinum_date = $mps_jd_optionsDB['mps_jd_farsinum_date'];
					
		if ($mps_jd_farsinum_date)
			$day_text = farsi_num($day);
		else
			$day_text = $day;
				
		if (in_array($day, $daywithpost)) { // any posts today? $ak_id
			if (!$ak_no_get){
				echo '<a href="' . get_day_link($jthisyear, $jthismonth, $day) . $akwithpost[$day].'" title="'.ak_cal_sar_tarikh($day,$jthismonth,$jthisyear).'"'.$ak_css_cat.'>'.$day_text.'</a>';
			}else{
				echo '<a href="' . get_day_link($jthisyear, $jthismonth, $day) . '" title="'.ak_cal_sar_tarikh($day,$jthismonth,$jthisyear).'"'.$ak_css_cat.'>'.$day_text.'</a>';
			}
		} else {
			echo $day_text;
		}
		echo '</td>';

		if (6 == calendar_week_mod(date('w', jmaketime(0, 0 , 0, $jthismonth, $day, $jthisyear))-$week_begins))
		$newrow = true;
	}

	$pad = 7 - calendar_week_mod(date('w', jmaketime(0, 0 , 0, $jthismonth, $day, $jthisyear))-$week_begins);
	if ($pad != 0 && $pad != 7){
	if($ak_main_calendrie){
			echo "\n\t\t".'<td colspan="'.$pad.'" id="ak_pad">&nbsp;</td>';
		}else{
			echo "\n\t\t".'<td colspan="'.$pad.'" id="pad">&nbsp;</td>';
		}
	}

	echo "\n\t</tr>\n\t</tbody>\n\t</table>";

}

/**
 * own widget function
 */
function ak_archive_calendar($ak_main_calendrie= false, $ak_thisday="", $ak_thismonth="", $ak_thisyear="", $shortname = TRUE, $echo = TRUE, $thisyear = 0, $thismonth = 0) {
	global $wpdb, $posts, $wp;
	global $jdate_month_name, $ztjalali_option;

	if (isset($wp->query_vars['m'])) {
		$m_year= (int)(substr($wp->query_vars['m'],0, 4));
		$m_month= (int)(substr($wp->query_vars['m'], 4,2));
		if($m_year < 1700){
			list($m_year,$m_month,$tmp_day) = jalali_to_gregorian($m_year, $m_month, 15);
		}
	}
	elseif (isset($wp->query_vars['m']))
	$thisyear =(int)(substr($wp->query_vars['m'],0, 4));

	if (empty($thisyear)) {
		if (isset($wp->query_vars['year']))
			$thisyear = (int)$wp->query_vars['year'];
		elseif (isset($m_year))
		$thisyear =$m_year;
		else
			$thisyear = date('Y', time());
	}
	if (empty($thismonth)) {
		if (isset($wp->query_vars['monthnum']))
			$thismonth = (int)$wp->query_vars['monthnum'];
		elseif (isset($m_month))
		$thismonth =$m_month;
		else
			$thismonth = date('m', time());
	}
	
	// taghvim bar asas tarikh darkhasti // ak rahedigar
	if (!empty($ak_thisday))
		$thisday = $ak_thisday;
	if (!empty($ak_thismonth))
		$thismonth = $ak_thismonth;
	if (!empty($ak_thisyear))
		$thisyear = $ak_thisyear;


	//doing: support $_GET['w']
	//  if (isset($_GET['w']))
		//    $w = '' . (int)($_GET['w']);
		//    if (!empty($w)) {
		//// We need to get the month from MySQL
		//        $thisyear = '' . (int)(substr($m, 0, 4));
		//        $d = (($w - 1) * 7) + 6; //it seems MySQL's weeks disagree with PHP's
		//        $thismonth = $wpdb->get_var("SELECT DATE_FORMAT((DATE_ADD('{$thisyear}0101', INTERVAL $d DAY) ), '%m')");
		//    }

	/* doing : cache */
	$cache = array();
	$key = md5( $thismonth . $thisyear);
	if ($cache = wp_cache_get('ztjalali_calendar', 'calendar')) {
		if (is_array($cache) && isset($cache[$key])) {
			if ($echo) {
				/** This filter is documented in wp-includes/general-template.php */
				echo apply_filters('ztjalali_calendar', $cache[$key]);
				return;
			} else {
				/** This filter is documented in wp-includes/general-template.php */
				return apply_filters('ztjalali_calendar', $cache[$key]);
			}
		}
	}

	if (!is_array($cache))
		$cache = array();
	// Quick check. If we have no posts at all, abort!
	if (!$posts) {
		$gotsome = $wpdb->get_var("SELECT 1 as test FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' LIMIT 1");
		if (!$gotsome) {
			$cache[$key] = '';
			wp_cache_set('ztjalali_calendar', $cache, 'calendar');
			return;
		}
	}

	if($thisyear>1700){
		list($thisyear,$thismonth,$thisday)= gregorian_to_jalali($thisyear, $thismonth, 1);
	}
	$unixmonth = jmktime(0, 0, 0, $thismonth, 1, $thisyear);
	$jthisyear = $thisyear;
	$jthismonth = $thismonth;
	list($thisyear,$thismonth,$jthisday)= jalali_to_gregorian($jthisyear, $jthismonth, 1);

	$last_day = jdate('t', $unixmonth,FALSE,FALSE);

	// Get the next and previous month and year with at least one post
	$startdate = date("Y:m:d", jmktime(0, 0, 0, $jthismonth, 1, $jthisyear));
	$enddate = date("Y:m:d", jmktime(23, 59, 59, $jthismonth, $last_day, $jthisyear));

	$previous = $wpdb->get_row("SELECT DAYOFMONTH(post_date) AS `dayofmonth`,MONTH(post_date) AS month, YEAR(post_date) AS year
			FROM $wpdb->posts
			WHERE post_date < '$startdate'
			AND post_type = 'post' AND post_status = 'publish'
			ORDER BY post_date DESC
			LIMIT 1");
	$next = $wpdb->get_row("SELECT DAYOFMONTH(post_date) AS `dayofmonth`,MONTH(post_date) AS month, YEAR(post_date) AS year
			FROM $wpdb->posts
			WHERE post_date > '$enddate 23:59:59'
			AND post_type = 'post' AND post_status = 'publish'
			ORDER BY post_date ASC
			LIMIT 1");
	
	// agar dar in mah matlabi nist LINK be mah gozashte nashavad
	$ak_this_month = $wpdb->get_row("SELECT DAYOFMONTH(post_date) AS `dayofmonth`,MONTH(post_date) AS month, YEAR(post_date) AS year
			FROM $wpdb->posts
			WHERE post_date < '$enddate 23:59:59'
			AND post_date > '$startdate'
			AND post_type = 'post' AND post_status = 'publish'
			ORDER BY post_date ASC
			LIMIT 1");
	/* translators: Calendar caption: 1: month name, 2: 4-digit year */
	$calendar_caption = _x('%1$s %2$s', 'calendar caption');
			$calendar_output = '<table id="wp-calendar" class="widget_calendar">
	<caption>';  
	
			// <------ inghesmat dast kari kardam ke link be mah bashad
			if($ak_main_calendrie || empty($ak_this_month)){
		$calendar_output .= sprintf($calendar_caption, $jdate_month_name[(int)$jthismonth], jdate('Y', $unixmonth)) ;
	}else{
		$calendar_output .='<a href="' .get_option('siteurl').english_num(jdate('/Y/m/', $unixmonth)).'" title="' .
				sprintf($calendar_caption, $jdate_month_name[(int)$jthismonth], jdate('Y', $unixmonth)). '">' .
				sprintf($calendar_caption, $jdate_month_name[(int)$jthismonth], jdate('Y', $unixmonth)) ;
	}
	  
	
	$calendar_output .='</caption>
	<thead>
	<tr>';
		// -----> inghesmat dast kari kardam ke link be mah bashad
		
			/*echo '<table id="wp-calendar" style="direction: rtl;border-spacing: 5px"><caption class="ak_cal_sa">';
			if($ak_main_calendrie){
				echo $j_month_name[(int) $jthismonth ] . ' ' . jdate('Y', $unixmonth) ;
			}else{
				echo'<a href="' .get_option('siteurl').english_num(jdate('/Y/m/', $unixmonth)).'" title="' .
						sprintf($calendar_caption, $jdate_month_name[(int)$jthismonth], jdate('Y', $unixmonth)). '">' .
						sprintf($calendar_caption, $jdate_month_name[(int)$jthismonth], jdate('Y', $unixmonth)) ;
			}
			echo'</caption><thead> <tr>';*/

			$myweek =$myshortweek = array();

			$week_begins = (int)(get_option('start_of_week'));


					for ($wdcount = 0; $wdcount <= 6; $wdcount++) {
					$myweek[] = ztjalali_get_week_name(($wdcount + $week_begins) % 7);
					$myshortweek[] = ztjalali_get_short_week_name(($wdcount + $week_begins) % 7);
					}

					foreach ($myweek as $k=>$wd) {
					//esm roozha ra bozorg neshon midad hazf kardam
					//$day_name = (true == $shortname) ? $myshortweek[$k] :$wd;
					$day_name = $myshortweek[$k];
					
					$wd = esc_attr($wd);
					$calendar_output .= "\n\t\t<th scope=\"col\" title=\"$wd\">$day_name</th>";
					}

					$calendar_output .= '
					</tr>
					</thead>';

	/* <------------- hazf nam mah dar paiin taghvim 
	<tfoot>
							
	<tr>';

    if ($previous) {
					$jprevious=gregorian_to_jalali($previous->year, $previous->month, $previous->dayofmonth);
					if ($ztjalali_option['change_url_date_to_jalali'])
            $calendar_output .= "\n\t\t" . '<td colspan="3" id="prev"><a href="' . get_month_link($jprevious[0],$jprevious[1]) . '" title="' . esc_attr(sprintf(__('View posts for %1$s %2$s','ztjalali'), $jdate_month_name[$jprevious[1]], jdate('Y', mktime(0, 0, 0, $previous->month, 1, $previous->year)))) . '">&laquo; ' . $jdate_month_name[$jprevious[1]] . '</a></td>';
            else
            		$calendar_output .= "\n\t\t" . '<td colspan="3" id="prev"><a href="' . get_month_link($previous->year, $previous->month) . '" title="' . esc_attr(sprintf(__('View posts for %1$s %2$s','ztjalali'), $jdate_month_name[$jprevious[1]], jdate('Y', mktime(0, 0, 0, $previous->month, 1, $previous->year)))) . '">&laquo; ' . $jdate_month_name[$jprevious[1]] . '</a></td>';
					} else {
							$calendar_output .= "\n\t\t" . '<td colspan="3" id="prev" class="ak_pad">&nbsp;</td>';
    }

    $calendar_output .= "\n\t\t" . '<td class="ak_pad">&nbsp;</td>';

    if ($next) {
    $jnext=gregorian_to_jalali($next->year, $next->month, $next->dayofmonth);
    if ($ztjalali_option['change_url_date_to_jalali'])
            $calendar_output .= "\n\t\t" . '<td colspan="3" id="next"><a href="' . get_month_link($jnext[0], $jnext[1]) . '" title="' . esc_attr(sprintf(__('View posts for %1$s %2$s','ztjalali'), $jdate_month_name[$jnext[1]], jdate('Y', mktime(0, 0, 0, $next->month, 1, $next->year)))) . '">' . $jdate_month_name[$jnext[1]] . ' &raquo;</a></td>';
            else
            		$calendar_output .= "\n\t\t" . '<td colspan="3" id="next"><a href="' . get_month_link($next->year, $next->month) . '" title="' . esc_attr(sprintf(__('View posts for %1$s %2$s','ztjalali'), $jdate_month_name[$jnext[1]], jdate('Y', mktime(0, 0, 0, $next->month, 1, $next->year)))) . '">' . $jdate_month_name[$jnext[1]] . ' &raquo;</a></td>';
    } else {
            				$calendar_output .= "\n\t\t" . '<td colspan="3" id="next" class="ak_pad">&nbsp;</td>';
    }

            						$calendar_output .= '
	</tr>
	</tfoot>
	---------------> hazf nam mah dar paiin taghvim */
            $calendar_output .= '
	<tbody>
	<tr>';

	// Get days with posts
	$dayswithposts = $wpdb->get_results("SELECT DISTINCT post_date
	FROM $wpdb->posts WHERE post_date >= '$startdate 00:00:00'
	AND post_type = 'post' AND post_status = 'publish'
	AND post_date <= '$enddate 23:59:59'", ARRAY_N);
	if ($dayswithposts) {
	foreach ((array) $dayswithposts as $daywith) {
	$jdaywithpost[] = jdate('j',  strtotime($daywith[0]),FALSE,FALSE);
	}
	} else {
	$jdaywithpost = array();
	}

	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'camino') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'safari') !== false)
		$ak_title_separator = "\n";
    else
    $ak_title_separator = ', ';

    $ak_titles_for_day = array();
    $ak_post_titles = $wpdb->get_results("SELECT ID, post_title, post_date as dom "
    . "FROM $wpdb->posts "
            . "WHERE post_date >= '$startdate 00:00:00' "
            . "AND post_date <= '$enddate 23:59:59' "
            . "AND post_type = 'post' AND post_status = 'publish'"
	);
	if ($ak_post_titles) {
        foreach ((array) $ak_post_titles as $ak_post_title) {

        /** This filter is documented in wp-includes/post-template.php */
        	$post_title = esc_attr(apply_filters('the_title', $ak_post_title->post_title, $ak_post_title->ID));
        	$jdom = $jdaywithpost[] = jdate('j',  strtotime( $ak_post_title->dom),FALSE,FALSE);
        	if (empty($ak_titles_for_day['day_' . $jdom]))
        		$ak_titles_for_day['day_' . $jdom] = '';
        		if (empty($ak_titles_for_day["$jdom"])) // first one
        		$ak_titles_for_day["$jdom"] = $post_title;
        		else
        			$ak_titles_for_day["$jdom"] .= $ak_title_separator . $post_title;
        }
        }
        // See how much we should pad in the beginning
        $pad = calendar_week_mod(jdate('w', $unixmonth, false, false)  - $week_begins);
        	$pad--;
        	if ($pad < 0)
        		$pad = 6;

        		if (0 != $pad)
        			$calendar_output .= "\n\t\t" . '<td colspan="' . esc_attr($pad) . '" class="ak_pad">&nbsp;</td>';

        			$jdaysinmonth = (int)(jdate('t', $unixmonth,FALSE,FALSE));
    for ($jday = 1; $jday <= $jdaysinmonth; ++$jday) {
    if (isset($newrow) && $newrow)
    	$calendar_output .= "\n\t</tr>\n\t<tr>\n\t\t";
    	$newrow = false;
    	if ($jday == jdate('j', time(),FALSE,FALSE) && $jthismonth == jdate('m', time(),FALSE,FALSE) && $jthisyear == jdate('Y', time(),FALSE,FALSE))
    	$calendar_output .= '<td id="ak_today">';
    	else
    		$calendar_output .= '<td>';

    		if (in_array($jday, $jdaywithpost)){ // any posts today?
    		$day = jalali_to_gregorian($jthisyear, $jthismonth, $jday);
    		if ($ztjalali_option['change_url_date_to_jalali'])
    			$calendar_output .= '<a href="' . get_day_link($jthisyear, $jthismonth, $jday) . '" '.ak_cal_tip_tarikh($jday,$jthismonth,$jthisyear).'>'.$jday.'</a>';
    																							//  onmouseover="Tip(\'uuuu\')" onmouseout="UnTip()">'.$jday.'</a>';
    					else
    					$calendar_output .= '<a href="' . get_day_link($day[0], $day[1], $day[2]) . '" title="' . esc_attr($ak_titles_for_day[$jday]) . "\">$jday</a>";
    		}else
    			$calendar_output .= $jday;
    			$calendar_output .= '</td>';
    			jdate('w', jmktime(0, 0, 0, $jthismonth, $jday, $jthisyear),FALSE,FALSE);
    			if (6 == calendar_week_mod(date('w', jmktime(0, 0, 0, $jthismonth, $jday, $jthisyear)) - $week_begins))
    				$newrow = true;
    	}

    	$pad = 7 - calendar_week_mod(date('w', jmktime(0, 0, 0, $jthismonth, $jday, $jthisyear)) - $week_begins);
    	if ($pad != 0 && $pad != 7)
    		$calendar_output .= "\n\t\t" . '<td class="ak_pad" colspan="' . esc_attr($pad) . '">&nbsp;</td>';

    		$calendar_output .= "\n\t</tr>\n\t</tbody>\n\t</table>";

    		$cache[$key] = $calendar_output;
    wp_cache_set('ztjalali_calendar', $cache, 'calendar');

    if ($ztjalali_option['change_jdate_number_to_persian'])
        				$calendar_output = ztjalali_persian_num($calendar_output);
        				if ($echo) {
        				/**
         * Filter the HTML calendar output.
         *
         * @since 3.0.0
         *
         * @param string $calendar_output HTML output of the calendar.
         	*/
         	echo apply_filters('ztjalali_calendar', $calendar_output);
         	} else {
         	/** This filter is documented in wp-includes/general-template.php */
         	return apply_filters('ztjalali_calendar', $calendar_output);
         		}
         		}

// namayesh shomare marboote dar Archive Roozane
function ak_cal_theme1($akday,$akthismonth,$akthisyear){
	
	global $wpdb,$table_prefix;
	
	$akak= jmaketime(0, 0, 0,$akthismonth,$akday,$akthisyear)+(60*60);
	$akdat = gmdate('Y-m-d',$akak);
// 	ak_theme_asli($akdat);
	
	$ak_like = esc_sql( $wpdb->esc_like( $akdat ) ); // This is the correct order.
	 
	$status = $wpdb->get_results("SELECT * FROM ".$table_prefix."ak_tarikh WHERE tarikh_date LIKE '%{$ak_like}%' ORDER BY ".$table_prefix."ak_tarikh.ID DESC LIMIT 0 , 1");
	
	foreach ($status as $status) { 
		$ak_ghaleb = $status -> ghaleb ;
		define("ak_ghaleb", $ak_ghaleb);
	}
	
	$ak1 = ak_accueil("body",$ak_ghaleb);
	return $ak1;
	
// 	require( get_template_directory() . '/ak/theme/'.$ak_ghaleb.'/ak_asli.php' );
}

// ijad TIP onmouse
function ak_cal_sar_tarikh($akday,$akthismonth,$akthisyear,$ak_tarikh_title,$ak_id){
	global $wpdb,$table_prefix;

	$akak= jmaketime(0, 0, 0,$akthismonth,$akday,$akthisyear)+(60*60);
	$akdat = gmdate('Y-m-d',$akak);
// 	echo $akdat;
// exit;
// 	$var = '%' . $akdat . '%';

// 	$ak_like = esc_sql( $wpdb->esc_like( $akdat ) ); // This is the correct order.
	
// 	$status = $wpdb->get_results("SELECT * FROM ".$table_prefix."ak_tarikh WHERE tarikh_date LIKE '%{$ak_like}%' ORDER BY ".$table_prefix."ak_tarikh.ID DESC LIMIT 0 , 1");
// 	foreach ($status as $status) { 
// 		$ak_tarikh_title = $status -> tarikh_title;
// 		$ak_title_majale = $status -> title_majale;
// 		$ak_id = $status -> ID;
// 	}
// 	echo $ak_id;
// 	exit;
	$ak_thum = get_option('siteurl')."/wp-content/uploads/ak_theme_newspaper/".$ak_id."_thum.png";
	
	// peida kardan POSTHA dar in rooz
	
	// dar bala alaki yek rooz ezafe kardebodam inja on 1 rooz ra kam kardam
	$akak_1= jmaketime(0, 0, 0,$akthismonth,$akday,$akthisyear)+(60*60);
	
	wp_reset_query();
	$args = array(
		'showposts' => 100,
		'year'  => gmdate('Y',$akak_1),
		'monthnum' => gmdate('m',$akak_1),
		'day'   => gmdate('d',$akak_1),
		'post_status'=> array( 'publish', 'future' ), // future
	);
	
	$ak_echo = '\'<div style=&quot;direction: ltr; width: 550px;&quot;>'.
  '<img class=&quot;alignleft&quot; style=&quot;float: left;margin-top: -10px&quot; src=&quot;'.$ak_thum.'&quot; width=&quot;220&quot; alt=&quot;&quot;/>'.
'  <p style=&quot;font-family: Arial, Tahoma; font-weight: bold; font-size: 20px;text-align: right;&quot;></p>'.
'  <ol style=&quot;list-style-type:decimal;direction: rtl;text-align: right;font: 14px tahoma; margin: 10px 30px 0 0;&quot;>';
	
// 	$ak_echo = '\'<div style="direction: ltr; width: 550px;">'.
// 			'<img class="alignleft" style="float: left;margin-top: -10px" src="'.$ak_thum.'" width="220" alt=""/>'.
// 			'  <p style="font-family: Arial, Tahoma; font-weight: bold; font-size: 20px;text-align: right;">'.$ak_title_majale.'</p>'.
// 			'  <ol style="list-style-type:decimal;direction: rtl;text-align: right;font: 14px tahoma; margin: 10px 30px 0 0;">';
	

	query_posts($args);
	while (have_posts()) : the_post();
        $ak_echo .= '<li style=&quot;margin-top:10px;&quot;><a href=&quot;'.get_permalink().'&quot;>'.get_the_title().'</a></li>';
//         $ak_echo .= '<li style="margin-top:10px;"><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
        
	endwhile;
	
	$ak_echo .= '</ol>'.
'</div>\', TITLE, \''.$ak_tarikh_title.'\', TITLEALIGN, \'right\', BGCOLOR, \'#E4EEFC\', TITLEBGCOLOR, \'#4C6EA5\', WIDTH, 550, STICKY, true, CLICKCLOSE, true, CLOSEBTN, true, BORDERSTYLE, \'dashed\', PADDING, 8';
	//echo gmdate('Y-m-d',$akak_1);
	return $ak_echo;
}

// Namayesh TIP on mouse 
function ak_cal_tip_tarikh($akday,$akthismonth,$akthisyear){
	global $wpdb,$table_prefix;

	$akak= jmaketime(0, 0, 0,$akthismonth,$akday,$akthisyear)+(60*60);
	$akdat = gmdate('Y-m-d',$akak);
	
	$ak_like = esc_sql( $wpdb->esc_like( $akdat ) ); // This is the correct order.

	$status = $wpdb->get_results("SELECT * FROM ".$table_prefix."ak_tarikh WHERE tarikh_date LIKE '%{$ak_like}%' ORDER BY ".$table_prefix."ak_tarikh.ID DESC LIMIT 0 , 1");
	foreach ($status as $status) {
		$ak_tip_java = $status -> tip_mouse;
	}
	
	$ak_tip_java = str_replace("&#039;","'",$ak_tip_java );
// 	$ak_tip_java = "2222";
	return $ak_tip_java;
}

// kar nemikonad 
// namayesh tedad rozha i ke rozname dar mah chap shode
function ak_cal_num_post($jal_month,$jal_year){
	global $wpdb;
	
	$_query_add = " post_type='post' ";
	$gre_end = date("Y:m:d H:i:s",jmaketime(0,0,0,$jal_month,1,$jal_year));
	$gre_start = date("Y:m:d H:i:s",jmaketime(0,0,0,$jal_nextmonth,1,$jal_nextyear));
	
	$jal_post_count = $wpdb->get_results("SELECT COUNT(id) as 'post_count' FROM $wpdb->posts WHERE ".$_query_add." AND post_date < NOW() AND post_status = 'publish' AND post_date >= '$gre_start' AND post_date < '$gre_end'");
//	return $jal_posts = $jal_post_count[0]->post_count;
	return $jal_post_count;
}


// entekhab theme
function ak_theme_asli1($ak_archive=null){
	global $wpdb,$table_prefix;

	if(empty($ak_archive)){
		$akdat = current_time('mysql'); //2012-09-14 19:40:23
	}else{
		$akdat = $ak_archive;
	}

	$status = $wpdb->get_results("SELECT * FROM ".$table_prefix."ak_tarikh WHERE tarikh_date < '$akdat' ORDER BY ".$table_prefix."ak_tarikh.ID DESC LIMIT 0 , 1");

	foreach ($status as $status) {
		$ak_ghaleb = $status -> ID;
	}

	require( get_template_directory() . '/ak/theme/'.$ak_ghaleb.'/ak_asli.php' );
}







?>
