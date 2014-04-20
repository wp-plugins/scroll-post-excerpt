<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<div class="wrap">
  <div class="form-wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br>
    </div>
    <h2><?php _e('Scroll post excerpt', 'scroll-post-excerpt'); ?></h2>
    <?php
	$spe_title = get_option('spe_title');
	$spe_select_num_user = get_option('spe_select_num_user');
	$spe_dis_num_user = get_option('spe_dis_num_user');
	$spe_dis_num_height = get_option('spe_dis_num_height');
	$spe_select_categories = get_option('spe_select_categories');
	$spe_select_orderby = get_option('spe_select_orderby');
	$spe_select_order = get_option('spe_select_order');
	$spe_excerpt_length = get_option('spe_excerpt_length');
	
	if (isset($_POST['spe_form_submit']) && $_POST['spe_form_submit'] == 'yes')
	{
		//	Just security thingy that wordpress offers us
		check_admin_referer('spe_form_setting');
			
		$spe_title = stripslashes($_POST['spe_title']);
		$spe_select_num_user = stripslashes($_POST['spe_select_num_user']);
		$spe_dis_num_user = stripslashes($_POST['spe_dis_num_user']);
		$spe_dis_num_height = stripslashes($_POST['spe_dis_num_height']);
		$spe_select_categories = stripslashes($_POST['spe_select_categories']);
		$spe_select_orderby = stripslashes($_POST['spe_select_orderby']);
		$spe_select_order = stripslashes($_POST['spe_select_order']);
		$spe_excerpt_length = stripslashes($_POST['spe_excerpt_length']);
		
		update_option('spe_title', $spe_title );
		update_option('spe_select_num_user', $spe_select_num_user );
		update_option('spe_dis_num_user', $spe_dis_num_user );
		update_option('spe_dis_num_height', $spe_dis_num_height );
		update_option('spe_select_categories', $spe_select_categories );
		update_option('spe_select_orderby', $spe_select_orderby );
		update_option('spe_select_order', $spe_select_order );
		update_option('spe_excerpt_length', $spe_excerpt_length );
		
		?>
		<div class="updated fade">
			<p><strong><?php _e('Details successfully updated.', 'scroll-post-excerpt'); ?></strong></p>
		</div>
		<?php
	}
	?>
	<h3><?php _e('Scroll Setting', 'scroll-post-excerpt'); ?></h3>
	<form name="spe_form" method="post" action="">
	
		<label for="tag-title"><?php _e('Widget title', 'scroll-post-excerpt'); ?></label>
		<input name="spe_title" type="text" id="spe_title" value="<?php echo $spe_title; ?>" size="50" />
		<p><?php _e('Enter widget title', 'scroll-post-excerpt'); ?></p>
			
		<label for="tag-image"><?php _e('Enter height of each post', 'scroll-post-excerpt'); ?></label>
		<input name="spe_dis_num_height" type="text" id="spe_dis_num_height" value="<?php echo $spe_dis_num_height; ?>" maxlength="3" />
		<p><?php _e('If any overlap in the reel at front end, you should arrange (increase/decrease) this height. (Only number)', 'scroll-post-excerpt'); ?> (Example: 80)</p>
		
		<label for="tag-image"><?php _e('Display number of post', 'scroll-post-excerpt'); ?></label>
		<input name="spe_dis_num_user" type="text" id="spe_dis_num_user" value="<?php echo $spe_dis_num_user; ?>" maxlength="2" />
		<p><?php _e('Enter number of post at the same time in scroll to display. (Only number)', 'scroll-post-excerpt'); ?> (Example: 5)</p>
		
		<label for="tag-image"><?php _e('Enter max number of post to scroll', 'scroll-post-excerpt'); ?></label>
		<input name="spe_select_num_user" type="text" id="spe_select_num_user" value="<?php echo $spe_select_num_user; ?>" maxlength="2" />
		<p><?php _e('Enter max number of post to scroll. (Only number)', 'scroll-post-excerpt'); ?> (Example: 10)</p>
		
		<label for="tag-image"><?php _e('Enter categories', 'scroll-post-excerpt'); ?></label>
		<input name="spe_select_categories" type="text" id="spe_select_categories" value="<?php echo $spe_select_categories; ?>" maxlength="100" />
		<p><?php _e('Category IDs, separated by commas.', 'scroll-post-excerpt'); ?></p>
		
		<label for="tag-image"><?php _e('Select orderbys', 'scroll-post-excerpt'); ?></label>
		<select name="spe_select_orderby" id="spe_select_orderby">
			<option value='ID' <?php if($spe_select_orderby == 'ID') { echo 'selected' ; } ?>>ID</option>
			<option value='author' <?php if($spe_select_orderby == 'author') { echo 'selected' ; } ?>>Author</option>
			<option value='title' <?php if($spe_select_orderby == 'title') { echo 'selected' ; } ?>>Title</option>
			<option value='rand' <?php if($spe_select_orderby == 'rand') { echo 'selected' ; } ?>>Rand</option>
			<option value='category' <?php if($spe_select_orderby == 'category') { echo 'selected' ; } ?>>Category</option>
			<option value='date' <?php if($spe_select_orderby == 'date') { echo 'selected' ; } ?>>Date</option>
			<option value='modified' <?php if($spe_select_orderby == 'modified') { echo 'selected' ; } ?>>Modified</option>
		</select>
		<p><?php _e('Select orderbys from the list', 'scroll-post-excerpt'); ?></p>
		
		<label for="tag-image"><?php _e('Select order', 'scroll-post-excerpt'); ?></label>
		<select name="spe_select_order" id="spe_select_order">
			<option value='ASC' <?php if($spe_select_order == 'ASC') { echo 'selected' ; } ?>>ASC</option>
			<option value='DESC' <?php if($spe_select_order == 'DESC') { echo 'selected' ; } ?>>DESC</option>
		</select>
		<p><?php _e('Select display order from the list', 'scroll-post-excerpt'); ?></p>
		
		<label for="tag-image"><?php _e('Excerpt length', 'scroll-post-excerpt'); ?></label>
		<input name="spe_excerpt_length" type="text" id="spe_excerpt_length" value="<?php echo $spe_excerpt_length; ?>" maxlength="3" />
		<p><?php _e('Only Number', 'scroll-post-excerpt'); ?> (Example: 200)</p>
		
		<div style="height:5px;"></div>	
		<input type="hidden" name="spe_form_submit" value="yes"/>
		<input name="spe_submit" id="spe_submit" class="button add-new-h2" value="Update Details" type="submit" />
		<?php wp_nonce_field('spe_form_setting'); ?>
	</form>
  </div>
  <div style="height:5px;"></div>
  <p class="description"><?php _e('Check official website for more information', 'scroll-post-excerpt'); ?> 
  <a target="_blank" href="http://www.gopiplus.com/work/2011/09/13/vertical-scroll-post-excerpt-wordpress-plugin/"><?php _e('click here', 'scroll-post-excerpt'); ?></a></p>
</div>
