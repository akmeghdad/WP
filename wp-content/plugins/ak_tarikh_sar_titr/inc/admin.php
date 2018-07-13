<?php

/**
 * add admin page 
 */
function ak_add_pages() {
	$page = add_options_page( __( 'تاریخ سر تیتر', 'ak' ), __( 'تاریخ سر تیتر', 'ak' ), 10, 'ak_tarikh_sar_titr', 'ak_options_page' );
}

/**
 * Clean up when uninstalled, delete settings from db
 */
function ak_uninstall() {
	delete_option( 'nkthemeswitch' );
}

function ak_options_page_get() { 
	global $wpdb,$table_prefix;
	
	if ( isset($_POST['btnsave']) && !isset($_GET['id']) ){
		
		$ak_id = $_POST["id"];
		foreach($_POST["ghaleb"] as $val){ $ak_ghaleb = $val;}
		$ak_date = $_POST["date"];
		$ak_titr = $_POST["titr"];
		
		$tmp = explode("-",substr($ak_date,0,10)); //khorooji $tmpa[0]-> Year  $tmpa[1]->month     $tmpa[2]->day
		$tmp_j = gregorian_to_jalali($tmp[0],$tmp[1],$tmp[2]);
		$ak_tip_java = 'onmouseover="Tip('.ak_cal_sar_tarikh($tmp_j[2],$tmp_j[1],$tmp_j[0],$ak_titr,$ak_ghaleb).')" onmouseout="UnTip()"';
		$ak_tip_java = str_replace("'","&#039;",$ak_tip_java );
// 		exit;
// 		$ak_tip_java = esc_attr('" onmouseover="Tip(<div style="&quot;direction:" ltr;="" width:="" 550px;&quot;=""><img class="&quot;alignleft&quot;" style="&quot;float:" left;margin-top:="" -10px&quot;="" src="&quot;http://localhost/wp/Mihan/wp/wp-content/uploads/ak_theme_newspaper/2_thum.jpg&quot;" width="&quot;220&quot;" alt="&quot;&quot;/">  <p style="&quot;font-family:" arial,="" tahoma;="" font-weight:="" bold;="" font-size:="" 20px;text-align:="" right;&quot;=""></p>  <ol style="&quot;list-style-type:decimal;direction:" rtl;text-align:="" right;font:="" 14px="" tahoma;="" margin:="" 10px="" 30px="" 0="" 0;&Tip()"');
// 		$ak_tip_java1 = "ttt'";
// 		$ak_tip_java = esc_attr( $ak_tip_java );
		//$ak_tip_java = $wpdb->real_escape_string($city);
		
		$insert = "INSERT INTO ".$table_prefix."ak_tarikh (tarikh_date, tarikh_title, ghaleb, tip_mouse ) " .
          	     "VALUES ('$ak_date', '$ak_titr', '$ak_ghaleb', '$ak_tip_java')" ;

		$wpdb->query( $insert );
		
		//$ak_id = $wpdb->insert_id ;
		
	}elseif (isset($_GET['id'])){
		
		$ak_get = $_GET['id'];
		$status = $wpdb->get_results("SELECT * FROM ".$table_prefix."ak_tarikh WHERE id = '$ak_get' ");
		
		foreach ($status as $status) {
			$ak_id = $status -> ID;
			$ak_ghaleb = $status -> ghaleb ;
			$ak_date = $status -> tarikh_date;
			$ak_titr = $status -> tarikh_title;
			$ak_tip_java = $status -> tip_mouse;
		}
		
		if ( isset($_POST['btnsave'])) {
			
			$ak_id = $ak_get;
			foreach($_POST["ghaleb"] as $val){ $ak_ghaleb = $val;}
			$ak_date = $_POST["date"];
			$ak_titr = $_POST["titr"];
			
			$tmp = explode("-",substr($ak_date,0,10)); //khorooji $tmpa[0]-> Year  $tmpa[1]->month     $tmpa[2]->day
			$tmp_j = gregorian_to_jalali($tmp[0],$tmp[1],$tmp[2]); //  $tmp_j[0]-> Year  $tmp_j[1]->month     $tmp_j[2]->day
			$ak_tip_java = 'onmouseover="Tip('.ak_cal_sar_tarikh($tmp_j[2],$tmp_j[1],$tmp_j[0],$ak_titr,$ak_ghaleb).')" onmouseout="UnTip()"';
			$ak_tip_java = str_replace("'","&#039;",$ak_tip_java );
						
			$akupdate = "UPDATE ".$table_prefix."ak_tarikh SET tarikh_date = '$ak_date',  tarikh_title = '$ak_titr',
						ghaleb = '$ak_ghaleb', tip_mouse = '$ak_tip_java' WHERE id = '$ak_get'";
			
			$wpdb->query($akupdate) ;
		}
		
	}
	if (!isset($_GET['id'])){
		$ak_id = $wpdb->query("SELECT LAST_INSERT_ID() FROM ".$table_prefix."ak_tarikh ")+1;
		$ak_ghaleb = "1" ;
		$ak_date = current_time('mysql');
		$ak_date = ( $gmt ) ? gmdate( 'Y-m-d 04:00:00' ) : gmdate( 'Y-m-d 04:00:00', ( time() + ( get_option( 'gmt_offset' ) * 3600 ) ) );
		//$ak_date = ( $gmt ) ? gmdate( 'Y-m-d H:i:s' ) : gmdate( 'Y-m-d H:i:s', ( time() + ( get_option( 'gmt_offset' ) * 3600 ) ) );
		
		// ba chand saat zodtar baz ham rooz baad neshan dade shavad 
		//date_default_timezone_set('Asia/Tehran');
		
		$m = gmdate('YmdHis'); 
        // 60*60*5 bekhater ehtiyat 5 saat dige gozashtam na 1 rooz dige
        $gmt = mktime(substr($m,8,2),substr($m,10,2),substr($m,12,2),substr($m,4,2),substr($m,6,2),substr($m,0,4))+(60*60*5);
		$ak_titr = jdate('l | j F Y |', $gmt + (get_option('gmt_offset') * 3600));
		$akd1 = date(' j ', $gmt + (get_option('gmt_offset') * 3600));
		$akd2 = __(date('F', $gmt + (get_option('gmt_offset') * 3600)));
		$ak_titr .= $akd1.$akd2.date(' Y | ', $gmt + (get_option('gmt_offset') * 3600));
		$ak_shomare = $ak_id ; // pish shomare nadarim adad 4 ra bardashtam
		$ak_titr .= 'سال اول | شماره '.$ak_shomare;
	
	}
	
	ak_options_page_form($ak_id,$ak_date,$ak_titr,$ak_ghaleb);
	
}

function ak_options_page_form($id,$date,$titr,$ghaleb) { 
	
	?>
	
		<h2><?php 
		if (!isset($_GET['id']) && !isset($_POST['btnsave'])){
			echo '<b><font color="#FA6A14">تاریخ سر برگ جدید</font></b>';
		}else{
			echo 'تغییرات تاریخ سر برگ';
		}
		?></h2> 
		<form action="" method="post">
			<table class="form-table" id="clearnone" >
					<tr>
						<th>
							<label>
								ردیف
							</label>
						</th>
						<td>
							<input type="text" name="id" disabled="disabled" style=" background-color: #E8E8E8;" value="<?php echo $id ?>" size="10" />
						</td>
					</tr>
					
					<tr>
					<th>
						<label>
							شماره قالب
						</label>
					</th>
						<td>
							<select name="ghaleb[]" style="width: 100px;" >
							<?php 
							for ($i=1;$i<2;$i++){
								echo '<option value="'.$i.'"';
								if ($ghaleb == $i)echo '" selected="selected"';
								echo '>'.$i.'</option>';
							}
							?>
							<?php // <option value="2" selected="selected">2</option> ?>
							</select>
						</td>
					</tr>  
					
					<tr>
						<th>
							<label>
								تاریخ انتشار
							</label>
						</th>
						<td>
							<input style="direction: ltr;" type="text" name="date" value="<?php echo $date ?>" size="30" />
						</td>
					</tr>
	
					<tr>
						<th>
							عبارت سر تیتر<label>
								</label>
						</th>
						<td>
							<input type="text" name="titr" value="<?php echo ztjalali_persian_num($titr) ?>" size="70" />
						</td>
					</tr>
				</table>

			<p class="submit">
				<input type="submit" name="btnsave" class="button-primary" value="<?php _e( 'ذخیره تغییرات', '' ) ?>">
				<?php 
				if (isset($_GET['id']) || isset($_POST['btnsave'])){ 
				echo '&nbsp;&nbsp;<a href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?page=ak_tarikh_sar_titr">ایجاد تاریخ سر برگ جدید</a>';
					
				}
					
				?>
			</p>

		</form> 
	
<?php
}


function ak_options_page_table() {
	
	global $wpdb,$table_prefix;
	?>
	<table class="widefat">
		<thead>
			<tr>
				<th>ردیف</th>
				<th>ID</th>
				<th>تاریخ انتشار</th>
				<th>عبارت سر برگ</th>
				<th>شماره قالب</th>
				<th>ویرایش</th>
			</tr>
		</thead>
		<tbody>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/ak/wz_tooltip.js?df23e6"></script>
		<?php 
	$aklink = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?page=ak_tarikh_sar_titr';
	$status = $wpdb->get_results("SELECT * FROM ".$table_prefix."ak_tarikh ORDER BY ".$table_prefix."ak_tarikh.id DESC LIMIT 0 , 50");
		
	foreach ($status as $status) {
		$ak_id = $status -> ID;
		$ak_ghaleb = $status -> ghaleb  ;
		$ak_date = $status -> tarikh_date;
		$ak_titr = $status -> tarikh_title;
		$akcont ++;
		
		$tmp = explode("-",substr($ak_date,0,10)); //khorooji $tmpa[0]-> Year  $tmpa[1]->month     $tmpa[2]->day
		$tmp_j = gregorian_to_jalali($tmp[0],$tmp[1],$tmp[2]); //  $tmp_j[0]-> Year  $tmp_j[1]->month     $tmp_j[2]->day
?>
	<tr class="alternate">
		<td><?php echo $akcont?></td>
		<td><?php echo $ak_id?></td>
		<td><?php echo $ak_date?></td>
		<td><a href="<?php echo get_bloginfo('siteurl').'/'.$tmp_j[0].'/'.$tmp_j[1].'/'.$tmp_j[2].'/' ?>" <?php echo ak_cal_tip_tarikh($tmp_j[2],$tmp_j[1],$tmp_j[0])?>><?php echo $ak_titr?></a></td>
		<td style="direction: ltr;float: right;"><?php echo $ak_ghaleb?></td>
		<td><a href="<?php echo $aklink.'&id='.$ak_id ?>">ویرایش</a></td>
		</tr>
		 
	
<?php }
echo '</tbody></table>';

}

function ak_options_page() { 
	?>

	<div id="nkuttler" class="wrap" > 
 <?php ak_options_page_get();
 ak_options_page_table();
 ?>
	</div> <?php
}


?>
