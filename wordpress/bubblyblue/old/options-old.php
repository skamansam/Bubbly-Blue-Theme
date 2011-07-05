<?php
/**
 * @package WordPress
 * @subpackage Bubbly_Blue
 */
 global $sname;
?>
<div class='wrap'>
<form method="post" action="">
	<?php wp_nonce_field('bb-options'); ?>
	<h2><?php _e('Customize Bubbly Blue'); ?></h2>
	<p>NOTE: The top sidebar widgets MUST be lists!</p>
	<fieldset style="border: solid 1px #ccc;padding:10px;">
		<legend>Options:</legend>
		<label for="show_pages_in_header_cb" title="If enabled, this option will show the pages in the main menu in the header. You can add the Pages widget to the top sidebar to show a dropdown list of pages.">
			<input 
				type="checkbox" 
				<?php echo get_option($sname.'_show_pages_in_menu')!='0'?"checked='checked'":'' ?> 
				id="show_pages_in_header_cb" 
				name="show_pages_in_header_cb"
				onchange="document.getElementById('show_pages_in_header').value=(this.checked)?1:0"
			/> 
			Show Pages In Menu (Top Sidebar)
		</label>
		<input type="hidden" name="show_pages_in_header" value="0" id="show_pages_in_header"/><br/>

		<label for="bb_has_topbar" title="If enabled, this option will show the dropdown menu ( top sidebar ) in the header.">
			<input 
				type="checkbox" 
				<?php echo get_option($sname.'_has_topbar')!='0'?"checked='checked'":'' ?> 
				id="bb_has_topbar_cb" 
				name="bb_has_topbar_cb"
				onchange="document.getElementById('bb_has_topbar').value=(this.checked)?1:0"
			/> 
			Show Top Sidebar ( Dropdown Menu ) [<?php echo $sname.'_has_topbar, '.get_option($sname.'_has_topbar') ?>]
		</label>
		<input type="hidden" name="bb_has_topbar" value="0" id="bb_has_topbar"/><br/>

		<label for="bb_has_leftbar_cb" title="If enabled, this option will show the dropdown menu ( top sidebar ) in the header.">
			<input 
				type="checkbox" 
				<?php echo get_option($sname.'_has_leftbar')!='0'?"checked='checked'":'' ?> 
				id="bb_has_leftbar_cb" 
				name="bb_has_leftbar_cb"
				onchange="document.getElementById('bb_has_leftbar').value=(this.checked)?1:0"
			/> 
			Show Left Sidebar
		</label>
		<input type="hidden" name="bb_has_leftbar" value="0" id="bb_has_leftbar"/><br/>

		<label for="bb_has_rightbar_cb" title="If enabled, this option will show the dropdown menu ( top sidebar ) in the header.">
			<input 
				type="checkbox" 
				<?php echo get_option($sname.'_has_rightbar')!='0'?"checked='checked'":'' ?> 
				id="bb_has_rightbar_cb" 
				name="bb_has_rightbar_cb"
				onchange="document.getElementById('bb_has_rightbar').value=(this.checked)?1:0"
			/> 
			Show Right Sidebar
		</label>
		<input type="hidden" name="bb_has_rightbar" value="0" id="bb_has_rightbar"/><br/>

		<br/>

	</fieldset>
	<fieldset style="border: solid 1px #ccc;padding:10px;">
		<legend>Customize Header:</legend>
		<p>The header consists of 3 layers: the background layer, the logo layer, and the FX layer. The 
		background layer is simply the background for the whole header. The logo layer is the image 
		behind/beside the text. The FX layer is the background image for the text layer.</p>
		<div style="margin-bottom:2ex;">
		<?php include get_template_directory()."/header-bar.php"?>
		</div>
		<label for="bb_header_logo" title="Select one of the files located in $wp_theme_dir/bubblyblue/images/header/ to be the logo for the site header. It will be clipped at 100px high and can be used as a background for the header. Note: this is not the same as the header background.">
			Custom FX Image (text layer background image) : 
			<select id="bb_header_fx" name="bb_header_fx">
				<?php echo bb_files_as_list_options("images/header",get_option($sname.'_header_fx')) ?>
				<option value="random"> [ random image ] </option>
			</select>
			<img src="<?php echo get_template_directory_uri() . '/images/header/'.get_option($sname.'_header_logo') ?>" alt="header FX image"/>
		</label>
		<br/>
		<label for="bb_header_logo" title="Select one of the files located in $wp_theme_dir/bubblyblue/images/header/ to be the logo for the site header. It will be clipped at 100px high and can be used as a background for the header. Note: this is not the same as the header background.">
			Custom Logo Image (logo image) : 
			<select id="bb_header_logo" name="bb_header_logo">
				<?php echo bb_files_as_list_options("images/logo",get_option($sname.'_header_logo')) ?>
				<option value="random"> [ random image ] </option>
			</select>
			<img src="<?php echo get_template_directory_uri() . '/images/header/'.get_option($sname.'_header_logo') ?>" alt="header logo"/>
		</label>
		<br/>
		<label for="bb_header_bg" title="Select one of the files located in $wp_theme_dir/bubblyblue/images/header/ to be the logo for the site header. It will be clipped at 100px high and can be used as a background for the header. Note: this is not the same as the header background.">
			Custom Background Image (header background image) : 
			<select id="bb_header_bg" name="bb_header_bg">
				<?php echo bb_files_as_list_options("images/logo",get_option($sname.'_header_bg')) ?>
				<option value="random"> [ random image ] </option>
			</select>
			<img src="<?php echo get_template_directory_uri() . '/images/header/'.get_option($sname.'_header_logo') ?>" alt="header background"/>
		</label>
		<fieldset style="border: solid 1px #ccc;padding:10px;">
			<legend>Adjustments:</legend>
			<h3>Custom Logo</h3><div style="display:inline-block;">
<!--				top: <input type="text" style="width:3em;" value="<?php echo get_option($sname.'_logo_top'); ?>" id="bb_logo_top" name="bb_logo_top"/>px 
				left: <input type="text" style="width:3em;" value="<?php echo get_option($sname.'_logo_left'); ?>" id="logo_left" name="bb_logo_left">px
				<input type="button" name="logo_up_btn" id="logo_up_btn" value="Up" onclick="move_logo_top(-1)"/>
				<input type="button" name="logo_down_btn" id="logo_down_btn" value="Down" onclick="move_logo_top(1)"/>
				<input type="button" name="logo_left_btn" id="logo_left_btn" value="Left" onclick="move_logo_left(-1)"/>
				<input type="button" name="logo_right_btn" id="logo_right_btn" value="Right" onclick="move_logo_left(1)"/><br/>
				opacity: <input type="text" style="width:3em;" value="<?php echo get_option($sname.'_logo_opacity'); ?>" id="bb_logo_opacity" name="bb_logo_opacity">
				<input type="button" name="logo_opacity_up_btn" id="logo_opacity_up_btn" value="Less Solid" onmousedown="set_logo_opacity(-0.01)"/>
				<input type="button" name="logo_opacity_down_btn" id="logo_opacity_down_btn" value="More Solid" onmousedown="set_logo_opacity(0.01)"/>
-->			</div>
		</fieldset>
	</fieldset>
	<fieldset style="border: solid 1px #ccc;padding:10px;">
		<legend>Options:</legend><pre>
		<?php echo $sname."_logo_top: ".$_REQUEST['bb_logo_top']." = ".get_option($sname.'_logo_top')?><br/>
		<?php echo $sname."_logo_left: ".$_REQUEST['bb_logo_left']." = ".get_option($sname.'_logo_left') ?><br/>
		<?php echo $sname."_logo_opacity: ".$_REQUEST['bb_logo_opacity']." = ".get_option($sname.'_logo_opacity') ?><br/>
		<?php echo $sname."_has_topbar: ".$_REQUEST['bb_has_topbar']." = ".get_option($sname.'_has_topbar') ?><br/>
		<?php echo $sname."_has_leftbar: ".$_REQUEST['bb_has_leftbar']." = ".get_option($sname.'_has_leftbar') ?><br/>
		<?php echo $sname."_has_rightbar: ".$_REQUEST['bb_has_rightbar']." = ".get_option($sname.'_has_rightbar') ?><br/>
		<?php echo $sname."show_pages_in_header: ".$_REQUEST['show_pages_in_header']." = ".get_option($sname.'_show_pages_in_menu') ?><br/>
		<?php echo $sname."_header_logo: ".$_REQUEST['bb_header_logo']." = ".get_option($sname.'_image_header') ?><br/>
		</pre>			
			
	</fieldset>

	<input type="hidden" name="action" value="save" />
	<input type="submit" class="defbutton" name="submitform" value="&nbsp;&nbsp;<?php esc_attr_e('Save'); ?>&nbsp;&nbsp;" />
</form>
</div>