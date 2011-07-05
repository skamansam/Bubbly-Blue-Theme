<?php
/**
 * @package WordPress
 * @subpackage Bubbly_Blue
 */
 global $sname,$options,$errors;

if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
 
?>
<div class='wrap'>
<form method="post" action="">
	<?php wp_nonce_field('bb-options'); ?>
	<h2><?php _e('Customize Bubbly Blue'); ?></h2>
	<p>NOTE: The top sidebar widgets MUST be lists!</p>
	<fieldset style="border: solid 1px #ccc;padding:10px;">
		<legend>Options:</legend>

		<label for="<?php echo $sname;?>_has_topbar" title="If enabled, this option will show the pages in the main menu in the header. You can add the Pages widget to the top sidebar to show a dropdown list of pages.">
			<input 
				type="checkbox" 
				<?php echo get_option($sname.'_has_topbar')?"checked='checked'":'' ?> 
				id="<?php echo $sname;?>_has_topbar" 
				name="<?php echo $sname;?>_has_topbar"
			/> 
			Show Menu (Top Sidebar)
		</label>
<br/>
		<label for="<?php echo $sname;?>_show_pages_in_menu" title="If enabled, this option will show the pages in the main menu in the header. You can add the Pages widget to the top sidebar to show a dropdown list of pages.">
			<input 
				type="checkbox" 
				<?php echo get_option($sname.'_show_pages_in_menu')?"checked='checked'":'' ?> 
				id="<?php echo $sname;?>_show_pages_in_menu" 
				name="<?php echo $sname;?>_show_pages_in_menu"
			/> 
			Show Pages In Menu
		</label>

<br/>
		<label for="<?php echo $sname;?>_has_leftbar" title="If enabled, this option will show the pages in the main menu in the header. You can add the Pages widget to the top sidebar to show a dropdown list of pages.">
			<input 
				type="checkbox" 
				<?php echo get_option($sname.'_has_leftbar')?"checked='checked'":'' ?> 
				id="<?php echo $sname;?>_has_leftbar" 
				name="<?php echo $sname;?>_has_leftbar"
			/> 
			Show Left Sidebar
		</label>

<br/>
		<label for="<?php echo $sname;?>_has_rightbar" title="If enabled, this option will show the pages in the main menu in the header. You can add the Pages widget to the top sidebar to show a dropdown list of pages.">
			<input 
				type="checkbox" 
				<?php echo get_option($sname.'_has_rightbar')?"checked='checked'":'' ?> 
				id="<?php echo $sname;?>_has_rightbar" 
				name="<?php echo $sname;?>_has_rightbar"
			/> 
			Show Right Sidebar
		</label>

	</fieldset>
	
	<fieldset style="border: solid 1px #ccc;padding:10px;">
		<legend>Customize Header:</legend>
		<p>The header consists of 3 layers: the background layer, the logo layer, and the FX layer. The 
		background layer is simply the background for the whole header. The logo layer is the image 
		behind/beside the text. The FX layer is the background image for the text layer.</p>
		<div style="margin-bottom:2ex;">
		<?php include get_template_directory()."/header-bar.php"?>
		</div>
<!--		<label for="<?php echo $sname;?>_header_fx" title="Select one of the files located in $wp_theme_dir/bubblyblue/images/header/ to be the logo for the site header. It will be clipped at 100px high and can be used as a background for the header. Note: this is not the same as the header background.">
			Custom FX Image (text layer background image) : 
			<select id="<?php echo $sname;?>_header_fx" name="<?php echo $sname;?>_header_fx">
				<?php echo bb_files_as_list_options("images/header",get_option($sname.'_header_fx')) ?>
				<option value="random" <?php echo (get_option($sname.'_header_fx')=='random')?'default ':''?>> [ random image ] </option>
			</select>
			<img src="<?php echo get_template_directory_uri() . '/images/header/'.get_option($sname.'_header_fx') ?>" alt="header FX image"/>
		</label>
		<br/>
		<label for="bb_header_bg" title="Select one of the files located in $wp_theme_dir/bubblyblue/images/header/ to be the logo for the site header. It will be clipped at 100px high and can be used as a background for the header. Note: this is not the same as the header background.">
			Custom Background Image (header background image) : 
			<select id="bb_header_bg" name="bb_header_bg">
				<?php echo bb_files_as_list_options("images/logo",get_option($sname.'_header_bg')) ?>
				<option value="random"> [ random image ] </option>
			</select>
			<img src="<?php echo get_template_directory_uri() . '/images/header/'.get_option($sname.'_header_logo') ?>" alt="header background"/>
		</label>-->

		<!-- Begin Custom Logo Settings -->
		<div class="option-group">
			<h3 onclick="jQuery('#custom_logo_div').toggle();jQuery(this).toggleClass('bb-section-open');" class="bb-section-closed">Custom Logo</h3>
			<div id="custom_logo_div" style="display:none;" class="bb-option-pane">
			<br/>
			<label for="<?php echo $sname;?>_header_logo_path" title="Select one of the files located in $wp_theme_dir/bubblyblue/images/header/ to be the logo for the site header. It will be clipped at 100px high and can be used as a background for the header. Note: this is not the same as the header background.">
				Custom Logo Image (logo image) : 
				<input id="<?php echo $sname;?>_header_logo_path" onblur="set_logo_image(this.value)" name="<?php echo $sname;?>_header_logo_path" value="<?php echo get_option($sname.'_header_logo_path')?>"/>
				<select id="bb_header_logo" name="bb_header_logo" style="width:25px;" onchange="set_logo_image(this.value)">
					<?php echo bb_files_as_list_options("images/logo",get_option($sname.'_header_logo_path')) ?>
					<option value="random"> [ random image ] </option>
					<img src=""/>
				</select>
			</label>
			<br/>
				top: <input type="text" style="width:3em;" value="<?php echo get_option($sname.'_logo_top'); ?>" id="<?php echo $sname;?>_logo_top" name="<?php echo $sname;?>_logo_top"/>px 
				left: <input type="text" style="width:3em;" value="<?php echo get_option($sname.'_logo_left'); ?>" id="<?php echo $sname;?>_logo_left" name="<?php echo $sname;?>_logo_left">px
				<input type="button" name="logo_up_btn" id="logo_up_btn" value="Up" onclick="move_logo_top(-1)"/>
				<input type="button" name="logo_down_btn" id="logo_down_btn" value="Down" onclick="move_logo_top(1)"/>
				<input type="button" name="logo_left_btn" id="logo_left_btn" value="Left" onclick="move_logo_left(-1)"/>
				<input type="button" name="logo_right_btn" id="logo_right_btn" value="Right" onclick="move_logo_left(1)"/><br/>
				opacity: <input type="text" style="width:3em;" value="<?php echo get_option($sname.'_logo_opacity'); ?>" id="<?php echo $sname;?>_logo_opacity" name="<?php echo $sname;?>_logo_opacity">
				<input type="button" name="logo_opacity_up_btn" id="logo_opacity_up_btn" value="Less Solid" onmousedown="set_logo_opacity(-0.01)"/>
				<input type="button" name="logo_opacity_down_btn" id="logo_opacity_down_btn" value="More Solid" onmousedown="set_logo_opacity(0.01)"/>
			</div>
		</div>
		<!-- End Custom Logo Settings -->

		<!-- Begin Custom FX Image Settings -->
		<div class="option-group">
			<h3 onclick="jQuery('#custom_fx_div').toggle();jQuery(this).toggleClass('bb-section-open');" class="bb-section-closed">Custom FX Layer (with text)</h3>
			<div id="custom_fx_div" style="display:none;" class="bb-option-pane">
			<br/>
			<label for="<?php echo $sname;?>_header_fx" title="Select one of the files located in $wp_theme_dir/bubblyblue/images/header/ to be the fx for the site header. It will be clipped at 100px high and can be used as a background for the header. Note: this is not the same as the header background.">
				Custom FX Image (background for text) : 
				<input id="<?php echo $sname;?>_header_fx" name="<?php echo $sname;?>_header_fx"/>
				<select id="bb_header_fx" name="bb_header_fx" style="width:25px;">
					<?php echo bb_files_as_list_options("images/header",get_option($sname.'_header_fx')) ?>
					<option value="random"> [ random image ] </option>
				</select>
				<img src="<?php echo get_template_directory_uri() . '/images/header/'.get_option($sname.'_header_fx') ?>" alt="header fx"/>
			</label>
			<br/>
				top: <input type="text" style="width:3em;" value="<?php echo get_option($sname.'_fx_top'); ?>" id="<?php echo $sname;?>_fx_top" name="<?php echo $sname;?>_fx_top"/>px 
				left: <input type="text" style="width:3em;" value="<?php echo get_option($sname.'_fx_left'); ?>" id="<?php echo $sname;?>_fx_left" name="<?php echo $sname;?>_fx_left">px
				<input type="button" name="fx_up_btn" id="fx_up_btn" value="Up" onclick="move_fx_top(-1)"/>
				<input type="button" name="fx_down_btn" id="fx_down_btn" value="Down" onclick="move_fx_top(1)"/>
				<input type="button" name="fx_left_btn" id="fx_left_btn" value="Left" onclick="move_fx_left(-1)"/>
				<input type="button" name="fx_right_btn" id="fx_right_btn" value="Right" onclick="move_fx_left(1)"/><br/>
				opacity: <input type="text" style="width:3em;" value="<?php echo get_option($sname.'_fx_opacity'); ?>" id="<?php echo $sname;?>_fx_opacity" name="<?php echo $sname;?>_fx_opacity">
				<input type="button" name="fx_opacity_up_btn" id="fx_opacity_up_btn" value="Less Solid" onmousedown="set_fx_opacity(-0.01)"/>
				<input type="button" name="fx_opacity_down_btn" id="fx_opacity_down_btn" value="More Solid" onmousedown="set_fx_opacity(0.01)"/>
			</div>
		</div>
		<!-- End Custom fx Settings -->

	</fieldset>
	
	
<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<pre><?php echo $errors; ?></pre>

<script type="text/javascript">
/* 	Javascript functions used to dynamically alter the header from the theme admin panel
 * 	WARNING: this script requires jQuery to function.
 * */

//shortname for theme. must be same as $sname in functions.php 
window.themeshort="<?php echo $sname; ?>";
logo_image_dir="<?php echo get_template_directory_uri() . '/images/logo/'; ?>";

//build selector strings for jquery
var logo_left_sel='#'+themeshort+'_logo_left';
var logo_top_sel='#'+themeshort+'_logo_top';
var logo_opacity_sel='#'+themeshort+'_logo_opacity';

jQuery(document).ready(function ($) {

	/* CSS selectors we will be working with, as jQuery objects */
	window.the_header=jQuery('#header'); //: the header block
	window.the_fx=jQuery('#header_fx'); //: the FX block. Text is on this layer
	window.the_logo=jQuery('#header_logo'); //: a img containing the logo
	window.the_menu=jQuery('#page_menu'); //: the dropdown menu

//	console.log('Ready!');
	window.the_logo_left=parseInt(the_logo.css('left').replace(/px/,''));
	window.the_logo_top=parseInt(the_logo.css('top').replace(/px/,''));
	window.the_logo_opacity=parseFloat(the_logo.css('opacity'));
//	console.log(the_logo_left);
	$(logo_left_sel).val(the_logo_left);
	$(logo_top_sel).val(the_logo_top);
	$(logo_opacity_sel).val(the_logo_opacity);
});

function move_logo_top(i){
	the_logo_top+=i;
	the_logo.css('top',the_logo_top);
	jQuery(logo_top_sel).val(the_logo_top);	
//	console.log(window.the_logo_top);
}
function move_logo_left(i){
	the_logo_left+=i;
	the_logo.css('left',the_logo_left);
	jQuery(logo_left_sel).val(the_logo_left);	
//	console.log(the_logo_left);
}

function set_logo_opacity(i){
	the_logo_opacity+=i;
	if(the_logo_opacity>1.0) the_logo_opacity=1.0;
	if(the_logo_opacity<0.0) the_logo_opacity=0.0;
	the_logo.css('opacity',the_logo_opacity);
	jQuery(logo_opacity_sel).val(the_logo_opacity);	
}
//changes the header logo. occurs when the dropdown list is selected 
// or the input box loses focus
function set_logo_image(src){
	jQuery('#'+themeshort+'_header_logo_path').val(src);
	jQuery('#header_logo').attr('src', mess_path(logo_image_dir,src));
}

function mess_path(server_path,file){
	if(file.match(/^http\:\/\//)) return file;
	return server_path+file;
}

</script>
