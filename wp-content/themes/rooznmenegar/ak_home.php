<?php
?>
<div id="ak_home"> 
	<?php //============================================= ak_right ==================================================?>
	<div class="ak_right">
		<div class="ak_r_1">
		<?php $results = ak_post(11,4,'thumbnail',array("txt-mini","sar-titr",'titr-img')) // CAT==> 11 // کنار عکس?>
			<?php echo $results["img"][0];?> 
			<ul>
				<li class="cat-item cat-item-12"><?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link" style="margin-right: -70px;">', '</span>',$results['id'][0] );?>
				<a href="<?php echo $results["link"][0]?>"><?php echo $results["title"][0]?></a></li>
					
				<li class="cat-item cat-item-12"><?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link" style="margin-right: -70px;">', '</span>',$results['id'][1] );?>
				<a href="<?php echo $results["link"][1]?>"><?php echo $results["title"][1]?></a></li>
				
				<li class="cat-item cat-item-12"><?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link" style="margin-right: -70px;">', '</span>',$results['id'][2] );?>
				<a href="<?php echo $results["link"][2]?>"><?php echo $results["title"][2]?></a></li>
				
				<li class="cat-item cat-item-12"><?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link" style="margin-right: -70px;">', '</span>',$results['id'][3] );?>
				<a href="<?php echo $results["link"][3]?>"><?php echo $results["title"][3]?></a></li>
			</ul>
		</div>
		<div class="ak_r_hr_1"></div>
		<div class="ak_r_2">
			<?php $results = ak_post(12,1,'thumbnail',array("txt-mini","sar-titr",'titr-img')) // CAT==> 12 // راستک?> 
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>',$results['id'][0] );?>
			<?php echo $results["img"][0];?>
			<span><?php echo $results["meta"][1]?></span> 
			<p><a href="<?php echo $results["link"][0]?>"><?php echo $results["title"][0]?></a></p>
		</div>
		<div class="ak_r_hr_2"></div>
		<div class="ak_r_3">
			<?php $results = ak_post(14,1,'thumbnail',array("txt-mini","sar-titr",'titr-img')) // CAT==> 14 // دیدگاه?>
			<span>دیدگاه</span>
			<div class="ak_r_3_img">
			<?php echo $results["img"][0];?>
			</div>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>',$results['id'][0] );?>
			<div class="ak_r_3_titr">
				<a href="<?php echo $results["link"][0]?>"><?php echo $results["title"][0]?></a>
			</div>
			<div class="ak_r_3_aut"><?php echo $results["author"][0]?></div>
			<div class="ak_txt"> <?php echo $results["meta"][0]?></div>
		</div>
	</div>
	<?php //============================================= ak_centre ==================================================?>

	<div class="ak_centre">
		<div class="ak_c_1">
		<?php $results = ak_post(9,1,'full',array()); // CAT==> 9 // عکس بالا
		edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>',$results['id'][0] );
		echo $results["img"][0];
		?>
		<?php /* 
			<img src="<?php echo get_template_directory_uri()?>/ak/imge.php?e=<?php echo mt_rand(1,200);?>&w=950&h=900"	alt="ALTT" height="385">
			*/?> 
			<span><?php echo ak_tarikh_titr()?> <?php get_search_form(); ?></span>
			
		</div>
		<div class="ak_c_2">
			<?php $results = ak_post(10,1,'full',array("txt-mini","sar-titr",'titr-img')) // CAT==> 10 // تیتر اصلی?>
			 
			<?php if(empty($results["meta"][2])){?>
					<h1><a	href="<?php echo $results["link"][0]?>"><?php echo $results["title"][0]?></a></h1>
	  				<h3><?php echo $results["meta"][1]?></h3>
			<?php }else{
				 	echo '<a href="'. $results["link"][0].'"><img src="'.get_option('home').'/wp-content/uploads/images/titr-img/'.$results["meta"][2].'" alt="'.$results["title"][0].'"></a>';
				  }
			edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>',$results['id'][0] );
				  ?> 
				  <hr>
			<div class="ak_txt"><?php echo $results["meta"][0]?></div>
		</div>
		<div class="ak_c_3">
			<div class="ak_c_3r">
				<?php $results = ak_post(16,1,'full',array("txt-mini","sar-titr",'titr-img')) // CAT==> 16 // راست اصلی?> 
				<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>',$results['id'][0] );?>
				<h1><a	href="<?php echo $results["link"][0]?>"><?php echo $results["title"][0]?></a></h1>
				<h3><?php echo $results["meta"][1]?></h3>
				<div class="ak_txt"><?php echo $results["meta"][0]?></div>
			</div>
			<div class="ak_c_3l">
				<?php $results = ak_post(17,1,'full',array("txt-mini","sar-titr",'titr-img')) // CAT==> 17 // چپ اصلی?> 
				<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>',$results['id'][0] );?>
				<h1><a	href="<?php echo $results["link"][0]?>"><?php echo $results["title"][0]?></a></h1>
				<h3><?php echo $results["meta"][1]?></h3>
				<div class="ak_txt"><?php echo $results["meta"][0]?></div>
			</div>
		</div>
	</div>
		<?php //============================================= ak_left ==================================================?>
	<div class="ak_left">
		<div class="ak_l_1">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php echo get_template_directory_uri()?>/images/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
			</a>
			<?php /* 
			<ul>
				<li class="cat-item cat-item-12"><a	href="http://rahedigar.net/cat/news/"> آزادی بیان</a></li>
				<li class="cat-item cat-item-12"><a	href="http://rahedigar.net/cat/news/"> روزنامه نگاران دربند</a></li>
				<li class="cat-item cat-item-12"><a	href="http://rahedigar.net/cat/news/"> تجربه های جهانی</a></li>
				<li class="cat-item cat-item-12"><a	href="http://rahedigar.net/cat/news/"> گزارش ویژه</a></li>
				<li class="cat-item cat-item-12"><a	href="http://rahedigar.net/cat/news/"> گفتگو</a></li>
				<li class="cat-item cat-item-12"><a	href="http://rahedigar.net/cat/news/"> مقالات</a></li>
				<li class="cat-item cat-item-12"><a	href="http://rahedigar.net/cat/news/"> تاریخ شفاهی</a></li>
				<li class="cat-item cat-item-12"><a	href="http://rahedigar.net/cat/news/"> نویسندگان</a></li>
				<li class="cat-item cat-item-12"><a	href="http://rahedigar.net/cat/news/"> بایگانی</a></li>
				<li class="cat-item cat-item-12"><a	href="http://rahedigar.net/cat/news/"> درباره ما</a></li>
				<li class="cat-item cat-item-12"><a	href="http://rahedigar.net/cat/news/"> ارتباط با ما</a></li>
			</ul>
			*/?>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div>
		<div class="ak_r_2">
			<?php $results = ak_post(13,1,'thumbnail',array("txt-mini","sar-titr",'titr-img')) // CAT==> 13 // چپک?> 
			<?php echo $results["img"][0];?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>',$results['id'][0] );?>
			<span><?php echo $results["meta"][1]?></span> 
			<p><a href="<?php echo $results["link"][0]?>"><?php echo $results["title"][0]?></a></p>
		</div>
		<div class="ak_r_hr_2"></div>
		<div class="ak_r_3">
			<?php $results = ak_post(15,1,'thumbnail',array("txt-mini","sar-titr",'titr-img')) // CAT==> 15 // یادداشت اول?>
			<span>یادداشت اول</span>
			<div class="ak_r_3_img">
			<?php echo $results["img"][0];?>
			</div>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>',$results['id'][0] );?>
			<div class="ak_r_3_titr">
				<a href="<?php echo $results["link"][0]?>"><?php echo $results["title"][0]?></a>
			</div>
			<div class="ak_r_3_aut"><?php echo $results["author"][0]?></div>
			<div class="ak_txt"> <?php echo $results["meta"][0]?></div>
		</div>
	</div>
	<?php //================================================ fini ==================================================?>
</div>