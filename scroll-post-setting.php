<div class="wrap">
  <div class="form-wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br>
    </div>
    <h2>Scroll post excerpt</h2>
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
			<p><strong>Details successfully updated.</strong></p>
		</div>
		<?php
	}
	?>
	<h3>Scroll setting</h3>
	<form name="spe_form" method="post" action="">
	
		<label for="tag-title">Widget title</label>
		<input name="spe_title" type="text" id="spe_title" value="<?php echo $spe_title; ?>" size="50" />
		<p>Enter widget title</p>
			
		<label for="tag-image">Enter height of each post</label>
		<input name="spe_dis_num_height" type="text" id="spe_dis_num_height" value="<?php echo $spe_dis_num_height; ?>" maxlength="3" />
		<p>If any overlap in the reel at front end, you should arrange (increase/decrease) this height. (Only number)</p>
		
		<label for="tag-image">Display number of post</label>
		<input name="spe_dis_num_user" type="text" id="spe_dis_num_user" value="<?php echo $spe_dis_num_user; ?>" maxlength="2" />
		<p>Enter number of post at the same time in scroll to display. (Only number)</p>
		
		<label for="tag-image">Enter max number of post to scroll</label>
		<input name="spe_select_num_user" type="text" id="spe_select_num_user" value="<?php echo $spe_select_num_user; ?>" maxlength="2" />
		<p>Enter max number of post to scroll. (Only number)</p>
		
		<label for="tag-image">Enter categories</label>
		<input name="spe_select_categories" type="text" id="spe_select_categories" value="<?php echo $spe_select_categories; ?>" maxlength="100" />
		<p>Category IDs, separated by commas.</p>
		
		<label for="tag-image">Select orderbys</label>
		<select name="spe_select_orderby" id="spe_select_orderby">
			<option value='ID' <?php if($spe_select_orderby == 'ID') { echo 'selected' ; } ?>>ID</option>
			<option value='author' <?php if($spe_select_orderby == 'author') { echo 'selected' ; } ?>>Author</option>
			<option value='title' <?php if($spe_select_orderby == 'title') { echo 'selected' ; } ?>>Title</option>
			<option value='rand' <?php if($spe_select_orderby == 'rand') { echo 'selected' ; } ?>>Rand</option>
			<option value='category' <?php if($spe_select_orderby == 'category') { echo 'selected' ; } ?>>Category</option>
			<option value='date' <?php if($spe_select_orderby == 'date') { echo 'selected' ; } ?>>Date</option>
			<option value='modified' <?php if($spe_select_orderby == 'modified') { echo 'selected' ; } ?>>Modified</option>
		</select>
		<p>Select orderbys from the list</p>
		
		<label for="tag-image">Select order</label>
		<select name="spe_select_order" id="spe_select_order">
			<option value='ASC' <?php if($spe_select_order == 'ASC') { echo 'selected' ; } ?>>ASC</option>
			<option value='DESC' <?php if($spe_select_order == 'DESC') { echo 'selected' ; } ?>>DESC</option>
		</select>
		<p>Select display order from the list</p>
		
		<label for="tag-image">Excerpt length</label>
		<input name="spe_excerpt_length" type="text" id="spe_excerpt_length" value="<?php echo $spe_excerpt_length; ?>" maxlength="3" />
		<p>Only Number, Example: 200</p>
		
		<div style="height:5px;"></div>	
		<input type="hidden" name="spe_form_submit" value="yes"/>
		<input name="spe_submit" id="spe_submit" class="button add-new-h2" value="Update Details" type="submit" />
		<?php wp_nonce_field('spe_form_setting'); ?>
	</form>
  </div>
  <div style="height:5px;"></div>
  <p class="description">Check official website for more information <a target="_blank" href="http://www.gopiplus.com/work/2011/09/13/vertical-scroll-post-excerpt-wordpress-plugin/">click here</a></p>
</div>
