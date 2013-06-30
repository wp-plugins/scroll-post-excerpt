<?php

/*
Plugin Name: Scroll post excerpt
Description: Scroll post excerpt WordPress plugin create the information reel in the website, this scroller contain the post title and post excerpt. it is scroll like reel.
Author: Gopi.R
Version: 6.0
Plugin URI: http://www.gopiplus.com/work/2011/09/13/vertical-scroll-post-excerpt-wordpress-plugin/
Author URI: http://www.gopiplus.com/work/2011/09/13/vertical-scroll-post-excerpt-wordpress-plugin/
Donate link: http://www.gopiplus.com/work/2011/09/13/vertical-scroll-post-excerpt-wordpress-plugin/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

global $wpdb, $wp_version;

function spe_show() 
{
	global $wpdb;
	$spe_html = "";
	$spe_x = "";
	$num_user = get_option('spe_select_num_user');
	$dis_num_user = get_option('spe_dis_num_user');

	$dis_num_height = get_option('spe_dis_num_height');
	$spe_select_categories = get_option('spe_select_categories');
	$spe_select_orderby = get_option('spe_select_orderby');
	$spe_select_order = get_option('spe_select_order');
	$spe_excerpt_length = get_option('spe_excerpt_length');
	
	if(!is_numeric($num_user))
	{
		$num_user = 5;
	} 
	if(!is_numeric($dis_num_height))
	{
		$dis_num_height = 30;
	}
	if(!is_numeric($dis_num_user))
	{
		$dis_num_user = 5;
	}
	if(!is_numeric($spe_excerpt_length))
	{
		$spe_excerpt_length = 150;
	}

	$spe_data = query_posts('cat='.$spe_select_categories.'&orderby='.$spe_select_orderby.'&order='.$spe_select_order.'&showposts='.$num_user);

	if ( ! empty($spe_data) ) 
	{
		$spe_count = 0;
		foreach ( $spe_data as $spe_data ) 
		{
			$spe_post_title = trim($spe_data->post_title);
			$spe_post_title = mysql_real_escape_string($spe_post_title);
			
			$get_permalink = get_permalink($spe_data->ID);

			$spe_dp_clean =  spe_dp_clean($spe_data->post_content, @$spe_excerpt_length);
			$spe_dp_clean = mysql_real_escape_string($spe_dp_clean);

			$dis_height = $dis_num_height."px";
			$spe_html = $spe_html . "<div class='spe_div' style='height:$dis_height;padding:2px 0px 2px 0px;'>"; 
			$spe_html = $spe_html . "<div class='spe_link'><a href='$get_permalink'>$spe_post_title</a></div>";
			$spe_html = $spe_html . "<div class='spe_excerpt'>$spe_dp_clean...</div>";
			$spe_html = $spe_html . "</div>";
			
			$spe_x = $spe_x . "spe_array[$spe_count] = '<div class=\'spe_div\' style=\'height:$dis_height;padding:2px 0px 2px 0px;\'><div class=\'spe_link\'><a href=\'$get_permalink\'>$spe_post_title</a></div><div class=\'spe_excerpt\'>$spe_dp_clean...</div></div>'; ";	
			$spe_count++;
		}
		
		$dis_num_height = $dis_num_height + 4;
		if($spe_count >= $dis_num_user)
		{
			$spe_count = $dis_num_user;
			$spe_height = ($dis_num_height * $dis_num_user);
		}
		else
		{
			$spe_count = $spe_count;
			$spe_height = ($spe_count*$dis_num_height);
		}
		$spe_height1 = $dis_num_height."px";
		?>	
		<div style="padding-top:8px;padding-bottom:8px;">
			<div style="text-align:left;vertical-align:middle;text-decoration: none;overflow: hidden; position: relative; margin-left: 1px; height: <?php echo $spe_height1; ?>;" id="spe_Holder">
				<?php echo $spe_html; ?>
			</div>
		</div>
		<script type="text/javascript">
		var spe_array	= new Array();
		var spe_obj	= '';
		var spe_scrollPos 	= '';
		var spe_numScrolls	= '';
		var spe_heightOfElm = '<?php echo $dis_num_height; ?>'; // Height of each element (px)
		var spe_numberOfElm = '<?php echo $spe_count; ?>';
		var spe_scrollOn 	= 'true';
		function spe_createscroll() 
		{
			<?php echo $spe_x; ?>
			spe_obj	= document.getElementById('spe_Holder');
			spe_obj.style.height = (spe_numberOfElm * spe_heightOfElm) + 'px'; // Set height of DIV
			spe_content();
		}
		</script>
		<script type="text/javascript">
		spe_createscroll();
		</script>
		<?php
	}
	else
	{
		echo "<div style='padding-bottom:5px;padding-top:5px;'>No data available!</div>";
	}
	wp_reset_query();
}

function spe_dp_clean($excerpt, $substr=0) {
	$string = strip_tags(str_replace('[...]', '...', $excerpt));
	if ($substr>0) {
		$string = substr($string, 0, $substr);
	}
	return $string;
}

function spe_install() 
{
	add_option('spe_title', "Scroll post excerpt");
	add_option('spe_select_num_user', "10");
	add_option('spe_dis_num_user', "5");
	add_option('spe_dis_num_height', "80");
	add_option('spe_select_categories', "");
	add_option('spe_select_orderby', "ID");
	add_option('spe_select_order', "DESC");
	add_option('spe_excerpt_length', "180");
}

function spe_control() 
{
	echo 'Scroll post excerpt<br><br>';
	echo 'Check official website for live demo and more information  <a target="_blank" href="http://www.gopiplus.com/work/2011/09/13/vertical-scroll-post-excerpt-wordpress-plugin/">click here</a>';
}

function spe_widget($args) 
{
	extract($args);
	echo $before_widget . $before_title;
	echo get_option('spe_title');
	echo $after_title;
	spe_show();
	echo $after_widget;
}

function spe_admin_options() 
{
	include('scroll-post-setting.php');
}

function spe_add_to_menu() 
{
	add_options_page('Scroll post excerpt', 'Scroll post excerpt', 'manage_options', __FILE__, 'spe_admin_options' );
}

if (is_admin()) 
{
	add_action('admin_menu', 'spe_add_to_menu');
}

function spe_init()
{
	if(function_exists('wp_register_sidebar_widget')) 
	{
		wp_register_sidebar_widget('Scroll post excerpt', 'Scroll post excerpt', 'spe_widget');
	}
	
	if(function_exists('wp_register_widget_control')) 
	{
		wp_register_widget_control('Scroll post excerpt', array('Scroll post excerpt', 'widgets'), 'spe_control');
	} 
}

function spe_deactivation() 
{
	// No action required.
}

function spe_add_javascript_files() 
{
	if (!is_admin())
	{
		wp_enqueue_script( 'scroll-post-excerpt', get_option('siteurl').'/wp-content/plugins/scroll-post-excerpt/scroll-post-excerpt.js');
	}
}

add_action('init', 'spe_add_javascript_files');
add_action("plugins_loaded", "spe_init");
register_activation_hook(__FILE__, 'spe_install');
register_deactivation_hook(__FILE__, 'spe_deactivation');
?>