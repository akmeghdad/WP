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
<div style="width: 100%;padding-top: 10px;">
<div class="ak_aut_txt" style="float:right;">
<p>
این فهرست براساس نام خانوادگی مرتب شده است.
</p><p> 
با کلیک بر روی 
<strong>نوشته های نویسنده</strong>
، همه مقالات منتشر شده از وی در هفته نامه
<strong>روزنامه نگار</strong>
، نشان داده می شود. با کلیک مجدد لیست مقالات بسته می شود.
</p> 
با کلیک بر روی نام و یا تصویر هر نویسنده، به صفحه نویسنده راهنمایی خواهید شد. صفحه نویسنده شامل خلاصه ای از مقالات اوست.
		
		</div>
		
		</div>
		
<?php /*
		
		<p>Other posts by <?php the_author_posts_link(4); ?></p>
		<p><?php the_author(4); ?> has blogged <?php echo number_format_i18n( get_the_author_posts() ); ?> 
posts</p>
		<a href="<?php echo get_author_posts_url( 4 ); ?>">5555</a>



 */ ?>

		<?php /* */
	global $wpdb,$table_prefix;
	
	$status = $wpdb->get_results("SELECT * FROM ".$table_prefix."users WHERE ID NOT LIKE 1 AND display_name NOT REGEXP 'يييي' ORDER BY ".$table_prefix."users.id ASC ");
		
	foreach ($status as $status) {
		 $ak_id = $status -> ID;
		 $ak_name = $status -> display_name ;
		 $akf1[]= get_the_author_meta( 'last_name', $ak_id ).'___'.$ak_id;
		 $akf3[]= get_the_author_meta( 'last_name', $ak_id );
		 $akf2[]= $ak_name;
	}
	
	sort($akf1);
	foreach ($akf1 as $key => $val) {
		$akid_new = substr($val, -(strlen(strstr($val, "___"))-3))-2;
//		echo $akf2[$akid_new];
//		echo '<br>';
	
			switch (substr($akf3[$akid_new],0,2)) {
	    case "آ":
		case "ا":
	        $akb[1][]=$akf2[$akid_new];
	        $akc[1][]=$akid_new+2;
	        $akf[1][]=1;
	        break;
	    case "ب":
	    	$akb[2][]=$akf2[$akid_new];
	    	$akc[2][]=$akid_new+2;
	    	$akf[2][]=2;
	        break;
	    case "پ":
	    	$akb[3][]=$akf2[$akid_new];
	    	$akc[3][]=$akid_new+2;
	    	$akf[3][]=3;
	        break;
	    case "ت":
	    	$akb[4][]=$akf2[$akid_new];
	    	$akc[4][]=$akid_new+2;
	    	$akf[4][]=4;
	        break;
	    case "ث":
	    	$akb[5][]=$akf2[$akid_new];
	    	$akc[5][]=$akid_new+2;
	    	$akf[5][]=5;
	        break;
	    case "ج":
	    	$akb[6][]=$akf2[$akid_new];
	    	$akc[6][]=$akid_new+2;
	    	$akf[6][]=6;
	        break;
	    case "چ":
	    	$akb[7][]=$akf2[$akid_new];
	    	$akc[7][]=$akid_new+2;
	    	$akf[7][]=7;
	        break;
	    case "ح":
	    	$akb[8][]=$akf2[$akid_new];
	    	$akc[8][]=$akid_new+2;
	    	$akf[8][]=8;
	        break;
	    case "خ":
	    	$akb[9][]=$akf2[$akid_new];
	    	$akc[9][]=$akid_new+2;
	    	$akf[9][]=9;
	        break;
	    case "د":
	    	$akb[10][]=$akf2[$akid_new];
	    	$akc[10][]=$akid_new+2;
	    	$akf[10][]=10;
	        break;
	    case "ذ":
	    	$akb[11][]=$akf2[$akid_new];
	    	$akc[11][]=$akid_new+2;
	    	$akf[11][]=11;
	        break;
	    case "ر":
	    	$akb[12][]=$akf2[$akid_new];
	    	$akc[12][]=$akid_new+2;
	    	$akf[12][]=12;
	        break;
	    case "ز":
	    	$akb[13][]=$akf2[$akid_new];
	    	$akc[13][]=$akid_new+2;
	    	$akf[13][]=13;
	        break;
	    case "ژ":
	    	$akb[14][]=$akf2[$akid_new];
	    	$akc[14][]=$akid_new+2;
	    	$akf[14][]=14;
	        break;
	    case "س":
	    	$akb[15][]=$akf2[$akid_new];
	    	$akc[15][]=$akid_new+2;
	    	$akf[15][]=15;
	        break;
	    case "ش":
	    	$akb[16][]=$akf2[$akid_new];
	    	$akc[16][]=$akid_new+2;
	    	$akf[16][]=16;
	        break;
	    case "ص":
	    	$akb[17][]=$akf2[$akid_new];
	    	$akc[17][]=$akid_new+2;
	    	$akf[17][]=17;
	        break;
	    case "ض":
	    	$akb[18][]=$akf2[$akid_new];
	    	$akc[18][]=$akid_new+2;
	    	$akf[18][]=18;
	        break;
	    case "ط":
	    	$akb[19][]=$akf2[$akid_new];
	    	$akc[19][]=$akid_new+2;
	    	$akf[19][]=19;
	        break;
	    case "ظ":
	    	$akb[20][]=$akf2[$akid_new];
	    	$akc[20][]=$akid_new+2;
	    	$akf[20][]=20;
	        break;
	    case "ع":
	    	$akb[21][]=$akf2[$akid_new];
	    	$akc[21][]=$akid_new+2;
	    	$akf[21][]=21;
	        break;
	    case "غ":
	    	$akb[22][]=$akf2[$akid_new];
	    	$akc[22][]=$akid_new+2;
	    	$akf[22][]=22;
	        break;
	    case "ف":
	    	$akb[23][]=$akf2[$akid_new];
	    	$akc[23][]=$akid_new+2;
	    	$akf[23][]=23;
	        break;
	    case "ق":
	    	$akb[24][]=$akf2[$akid_new];
	    	$akc[24][]=$akid_new+2;
	    	$akf[24][]=24;
	        break;
	    case "ک":
	    	$akb[25][]=$akf2[$akid_new];
	    	$akc[25][]=$akid_new+2;
	    	$akf[25][]=25;
	        break;
	    case "گ":
	    	$akb[26][]=$akf2[$akid_new];
	    	$akc[26][]=$akid_new+2;
	    	$akf[26][]=26;
	        break;
	    case "ل":
	    	$akb[27][]=$akf2[$akid_new];
	    	$akc[27][]=$akid_new+2;
	    	$akf[27][]=27;
	        break;
	    case "م":
	    	$akb[28][]=$akf2[$akid_new];
	    	$akc[28][]=$akid_new+2;
	    	$akf[28][]=28;
	        break;
	    case "ن":
	    	$akb[29][]=$akf2[$akid_new];
	    	$akc[29][]=$akid_new+2;
	    	$akf[29][]=29;
	        break;
	    case "و":
	    	$akb[30][]=$akf2[$akid_new];
	    	$akc[30][]=$akid_new+2;
	    	$akf[30][]=30;
	        break;
	    case "ه":
	    	$akb[31][]=$akf2[$akid_new];
	    	$akc[31][]=$akid_new+2;
	    	$akf[31][]=31;
	        break;
        case "ی":
	    	$akb[32][]=$akf2[$akid_new];
	    	$akc[32][]=$akid_new+2;
	    	$akf[32][]=32;
	        break;
		}
		
	}?>
	
	
	<?php 	
	for($i=1;$i<=32;$i++){
		if(!empty($akc[$i][0])){
			ak_author_all_harf($akf[$i][0]);?>
			<div class="ak_author_all_harf" style="">
			
			<?php 
			for($ii=0;$ii<50;$ii++){
				if (!empty($akc[$i][$ii])){ ?>
					
					<div class="ak_author_all_harf1" style="">

<div class="ak_author_harf_img" style="">
<a href="<?php echo get_author_posts_url($akc[$i][$ii]); ?>" rel="bookmark" title="رفتن به صفحه <?php echo $akb[$i][$ii] ?>">
<?php userphoto_thumbnail($akc[$i][$ii])?>
<?php /*  ghablan in joori gozashte bodam
<img border="0" src="<?php echo get_option('siteurl') ?>/wp-content/uploads/images/userphoto/<?php echo $akc[$i][$ii]; ?>.thumbnail.jpg" width="70" height="70">
*/?>
</a>
</div>


<div class="ak_author_harf_txt1"  style="">
	
	<a href="<?php echo get_author_posts_url($akc[$i][$ii]); ?>" rel="bookmark" title="رفتن به صفحه <?php echo $akb[$i][$ii] ?>">
	<?php echo get_the_author_meta( 'first_name', $akc[$i][$ii] )?> 
	<strong><?php echo get_the_author_meta( 'last_name', $akc[$i][$ii] )?></strong>
	</a>
	
	<br>
	<span class="ak_author_harf_txt2" style="">
	<a style="cursor: pointer; color: #898989;" title="نمایش دادن و یا مخفی کردن نوشته های نویسنده" 
	onclick="document.getElementById('<?php echo $akc[$i][$ii] ?>').style.display = (document.getElementById('<?php echo $akc[$i][$ii] ?>').style.display=='none'?'':'none')">
	نوشته های نویسنده
	</a>
	</span>
	
	<?php  // peyda kardan nevisande jari baraye tedad maghalat
	wp_reset_query();
	$args = array(
		'author' => $akc[$i][$ii],
	);
	query_posts($args);
	while (have_posts()) : the_post();
	endwhile;
	// peyda kardan nevisande jari baraye tedad maghalat
	?>
	
	<div id="<?php echo $akc[$i][$ii] ?>" class="ak_author_hrf_3" style="display:none;" >
	
	<?php 
	if (get_the_author_posts() > 5){ // neveshtehaye bish az 5 scrol bekhore
		echo '<ul style="height: 115px;">';
	}else{
		echo '<ul>';
	}

		wp_reset_query();
	$args = array(
		'author' => $akc[$i][$ii],
		'showposts' => 10000,
	);
	
	query_posts($args);
	while (have_posts()) : the_post();?>
		<li>        
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo the_title(); ?>"><?php echo the_title(); ?></a>
	    </li>  
	<?php endwhile; ?>

		</ul>
	</div>
</div>
</div>
					
					
					<?php
					
					//echo '////$i='.$i.'///$keyb='.($ii).'--==--'.$akb[$i][$ii].'///$ii='.$ii.'////$akc='.$akc[$i][$ii];
					//echo'<br><br>';
				 }
			}?>
			</div>
		<?php }
	}?>
	<div style="float: right;height: 140px;"></div>
	
	
<?php 		
		
		/*
		
		?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		


	
<div class="ak_author_all_harf" style="">






<div class="ak_author_all_harf1" style="">

<div class="ak_author_harf_img" style="">
<img border="0" src="http://rahedigar.net/wp-content/uploads/images/17293-200x200.jpg" width="70" height="70">
</div>


<div class="ak_author_harf_txt1"  style="">
	مقداد <strong>ابوالفضلی</strong>
	<br>
	<span class="ak_author_harf_txt2" style="">
	<a style="cursor: pointer; color: #898989;" title="انجام تنظیمات" 
	onclick="document.getElementById('ak_author_harf_txt3').style.display = (document.getElementById('ak_author_harf_txt3').style.display=='none'?'':'none')">
	نوشته های نویسنده
	</a>
	</span>
	<div id="ak_author_harf_txt3" class="ak_author_hrf_3" style="display:none;" >
	
		<ul style="list-style-type: disc;">
			<li>
			<a title="تدبیرهای ناکام؛  آغاز تحریم‌" rel="bookmark" href="http://localhost/wp/rahedigar/wp/1391/04/10/tadbir-haye-nakam/">تدبیرهای ناکام؛ آغاز تحریم‌</a>
			</li>
			<li>
			<a title="شاعری که “در هنگامه زمان” رفت" rel="bookmark" href="http://localhost/wp/rahedigar/wp/1391/04/10/shaeri-ke-dar-hengame-raft/">شاعری که “در هنگامه زمان” رفت</a> 
			</li>
			<li>
			<a title="خداحافظی با اخوان؛ سلام به “همه” مردم" rel="bookmark" href="http://localhost/wp/rahedigar/wp/1391/04/10/khoda-hafezi-ba-ekhvan/">خداحافظی با اخوان؛ سلام به “همه” مردم</a>
			</li>
		</ul>
	</div>
</div>
</div>


<div class="ak_author_all_harf1" style="">


<div class="ak_author_harf_img" style="">
<img border="0" src="http://rahedigar.net/wp-content/uploads/images/17293-200x200.jpg" width="70" height="70">
</div>


<div class="ak_author_harf_txt" style="">

<div class="ak_author_harf_txt1"  style="">
	مقداد <strong>ابوالفضلی</strong>
	<br>
	<span class="ak_author_harf_txt2" style="">
	<a style="cursor: pointer; color: #898989;" title="انجام تنظیمات" 
	onclick="document.getElementById('ak_author_harf_txt3').style.display = (document.getElementById('ak_author_harf_txt3').style.display=='none'?'':'none')">
	نوشته های نویسنده
	</a>
	</span>
	<div id="ak_author_harf_txt3" class="ak_author_hrf_3" style="display:none;" >
	
		<ul style="list-style-type: disc;">
			<li>
			<a title="تدبیرهای ناکام؛  آغاز تحریم‌" rel="bookmark" href="http://localhost/wp/rahedigar/wp/1391/04/10/tadbir-haye-nakam/">تدبیرهای ناکام؛ آغاز تحریم‌</a>
			</li>
			<li>
			<a title="شاعری که “در هنگامه زمان” رفت" rel="bookmark" href="http://localhost/wp/rahedigar/wp/1391/04/10/shaeri-ke-dar-hengame-raft/">شاعری که “در هنگامه زمان” رفت</a> 
			</li>
			<li>
			<a title="خداحافظی با اخوان؛ سلام به “همه” مردم" rel="bookmark" href="http://localhost/wp/rahedigar/wp/1391/04/10/khoda-hafezi-ba-ekhvan/">خداحافظی با اخوان؛ سلام به “همه” مردم</a>
			</li>
		</ul>
	</div>
</div>
</div>
</div>






</div>








<?php */
function ak_author_all_harf($ak_s=null){
	$ak_s1='
	<div class="ak_alefba">
	<a name="a'.$ak_s.'"></a>
	<font style="" >الف |</font>
	
	<a href="#a1">الف</a>
	<a href="#a2">ب</a>
	<a href="#a3">پ</a>
	<a href="#a4">ت</a>
	<a href="#a5">ث</a>
	<a href="#a6">ج</a>
	<a href="#a7">چ</a>
	<a href="#a8">ح</a>
	<a href="#a9">خ</a>
	<a href="#a10">د</a>
	<a href="#a11">ذ</a>
	<a href="#a12">ر</a>
	<a href="#a13">ز</a>
	<a href="#a14">ژ</a>
	<a href="#a15">س</a>
	<a href="#a16">ش</a>
	<a href="#a17">ص</a>
	<a href="#a18">ض</a>
	<a href="#a19">ط</a>
	<a href="#a20">ظ</a>
	<a href="#a21">ع</a>
	<a href="#a22">غ</a>
	<a href="#a23">ف</a>
	<a href="#a24">ق</a>
	<a href="#a25">ک</a>
	<a href="#a26">گ</a>
	<a href="#a27">ل</a>
	<a href="#a28">م</a>
	<a href="#a29">ن</a>
	<a href="#a30">و</a>
	<a href="#a31">ه</a>
	<a href="#a32">ی</a>

	</div>';
	echo $ak_s1;
	
}


/* */?>



