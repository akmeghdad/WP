<?php
/*
Plugin Name: Ak baygani shomare
Plugin URI: http://rooznamenegar.net/
Author: Meghdad Abolfazli
Author URI: http://rooznamenegar.net/
Description: نمایش بایگانی بر اساس شماره های منتشر شده.
Version: 0.2
Text Domain: Rooznamenegar
*/

/**
 * @see :  http://codex.wordpress.org/Widgets_API#Default_Usage
 */
class akarchive_num extends WP_Widget {

    function __construct() {
        parent::__construct(
                'akarchive_num', 'ak_archive', array('description' => 'آرشیو شماره برایی',)
        );
    }

    public function form($instance) {
        if (!isset($instance['akarchive_option_title']))
            $instance['akarchive_option_title'] = 'بایگانی شماره';

        if (!isset($instance['akarchive_option_text']))
            $instance['akarchive_option_text'] = '';

        if (!isset($instance['akarchive_option_dropdown']))
            $instance['akarchive_option_dropdown'] = FALSE;
        ?>
        <div dir="rtl" align="justify">
            <p style="text-align:right">
                <label for="<?php echo $this->get_field_id('akarchive_option_title'); ?>">
                    <?php _e('title', 'ztjalali') ?>: 
                    <input style="width: 200px;" id="<?php echo $this->get_field_id('akarchive_option_title'); ?>" name="<?php echo $this->get_field_name('akarchive_option_title'); ?>" type="text" value="<?php echo $instance['akarchive_option_title']; ?>" />
                </label>
            </p>
            <p style="text-align:right">
                <label for="<?php echo $this->get_field_id('akarchive_option_text'); ?>">
                متن: <textarea name="<?php echo $this->get_field_name('akarchive_option_text'); ?>" id="<?php echo $this->get_field_id('akarchive_option_text'); ?>" cols="20" rows="3" class="widefat"><?php echo $instance['akarchive_option_text']; ?></textarea>
                </label>
            </p>
            <p style="text-align:right">
                <label for="<?php echo $this->get_field_id('dropdown'); ?>">
                    <input name="<?php echo $this->get_field_name('akarchive_option_dropdown'); ?>" type="checkbox" value="1" id="<?php echo $this->get_field_id('dropdown'); ?>" <?php checked($instance['akarchive_option_dropdown'], TRUE); ?> />
                    <?php _e('show dropdown list (not work in post by post)', 'ztjalali') ?>
                </label>
            </p>
        </div>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['akarchive_option_title'] = strip_tags($new_instance['akarchive_option_title']);
        $instance['akarchive_option_text'] = strip_tags($new_instance['akarchive_option_text']);
//         $instance['akarchive_option_link_count'] = strip_tags($new_instance['akarchive_option_link_count']);
//         $instance['akarchive_option_show_post_count'] = (!empty($new_instance['akarchive_option_show_post_count']) ) ? TRUE : FALSE;
        $instance['akarchive_option_dropdown'] = (!empty($new_instance['akarchive_option_dropdown']) ) ? TRUE : FALSE;
        
        return $instance;
    }

    public function widget($args, $instance) {
        global $wpdb,$table_prefix;
        
         if (!isset($instance['akarchive_option_title']))
            $instance['akarchive_option_title'] = 'بایگانی شماره';

        if (!isset($instance['akarchive_option_text']))
            $instance['akarchive_option_text'] = '';

        if (!isset($instance['akarchive_option_dropdown']))
            $instance['akarchive_option_dropdown'] = FALSE;
        
        $ak_last_id=$wpdb->query("SELECT LAST_INSERT_ID() FROM ".$table_prefix."ak_tarikh ");
        
        extract($args);
        echo $before_widget;
        echo $before_title . $instance['akarchive_option_title'] . $after_title;
        echo $options['akarchive_option_text'];
        
        if ($instance['akarchive_option_dropdown']) {
//         	echo "<select name=\"jarchive-dropdown\" onchange='document.location.href=this.options[this.selectedIndex].value;'> <option value=\"\">" . esc_attr($instance['jarchive_title']) . "</option>";
        	echo "<select name=\"jarchive-dropdown\" onchange='document.location.href=this.options[this.selectedIndex].value;'> <option value=\"\">" . esc_attr($instance['akarchive_option_title']) . "</option>";
//         	echo "<select name=\"jarchive-dropdown\" onchange='document.location.href=this.options[this.selectedIndex].value;'> <option value=\"\">شماره</option>";
        	for ($i=$ak_last_id;$i>0;$i--){
        		echo '<option value="'.ak_link_archive($i).'"';
        		if ($ghaleb == $i)echo '" selected="selected"';
        		echo '>'.farsi_num($i).'</option>';
        	}
        	echo "</select>";
        }else{
        	for ($i=$ak_last_id;$i>0;$i--){
        		echo '<a href="'. ak_link_archive($i).'" title="نمایش شماره'.farsi_num($i).'" >شماره '.farsi_num($i).'</a><br>';
        
        	}
        }
        
        echo $after_widget;
    } 
}

// ijad link baraye har shomare az roozname dar widget
function ak_link_archive($ak_i){
	global $wpdb,$table_prefix;

	$status = $wpdb->get_results("SELECT * FROM ".$table_prefix."ak_tarikh WHERE ID = '$ak_i'");
	foreach ($status as $status) {
		$ak_date = $status -> tarikh_date;
	}
	$akak=get_option('siteurl').akj_mysql2date("/Y/m/d",$ak_date);
	return $akak;
}

/**
 * widget handle action
 */
add_action('widgets_init', 'register_akarchive_num');

function register_akarchive_num() {
	register_widget('akarchive_num');
}

// register_sidebar_widget( 'ak_archive_num','akjarchive_widget');
// register_widget_control('ak_archive_num', 'akwidget_jarchive_control');

?>
