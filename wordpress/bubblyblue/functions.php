<?php
/**
 * @package WordPress
 * @subpackage Bubbly_Blue
 */
$themename = "Bubbly Blue";
$sname = "bubblyblue";
$errors="<h3>Errors:</h3>\n";
automatic_feed_links();

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'right',
		'before_widget' => '<div id="%1$s" class="widget rounded %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title rounded">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => 'left',
		'before_widget' => '<div id="%1$s" class="widget rounded %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title rounded">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => 'top',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	));
}

// when the admin interface is shown, do stuff
add_action('admin_menu', 'bb_handle_theme_page');
add_action('admin_head', 'bb_print_theme_options_page_header');
//add_action('admin_menu', 'bb_handle_readme_page');

//default options array
$options=array( 
	$sname."_has_topbar" => '1',
	$sname."_has_leftbar" => '1',
	$sname."_has_rightbar" => '1',
	$sname.'_show_pages_in_menu' => '0',
	$sname.'_logo_left' => '8',
	$sname.'_logo_top' => '8',
	$sname.'_logo_opacity' => '.5',
	$sname.'_header_logo_path' => 'default.gif'
/*	$sname.'_fx_left' => '8',
	$sname.'_fx_top' => '8',
	$sname.'_fx_opacity' => '.5',
	$sname.'_header_text_left' => '8',
	$sname.'_header_text_top' => '8',
	$sname.'_header_text_opacity' => '.5',*/
 );

//if(!get_option($sname.'_set_default_options')){bb_option_defaults(false);}
bb_option_defaults(false);
//bb_option_defaults(true); //reset options to default

/* Default Options */
function bb_option_defaults($reset){
	global $sname;
	if (!$reset){
		foreach (array_keys($options) as $o){
			add_option($o,$options[$o]);
		}
	}else{
		foreach (array_keys($options) as $o){
			update_option($o,$options[$o]);
		}
	}
}


/* adds theme page and handles all options */
function bb_handle_theme_page(){
	bb_handle_options();
	add_action('admin_head', 'bb_print_theme_options_page_header');
	add_theme_page(__('Customize Theme'), __('Customize Theme'), 'edit_themes', basename(__FILE__), 'bb_show_theme_options_page');
}

function bb_handle_readme_page(){
	add_theme_page(__('Theme Readme'), __('Theme Readme'), 'edit_themes', basename(__FILE__), 'bb_show_readme');
}

/* handle options */
function bb_handle_options(){
	global $sname,$options,$errors;
	if ( isset( $_GET['page'] ) && $_GET['page'] == basename(__FILE__) ) { //check if this page is the source for the request
		if ( isset( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) { //check if we are saving
			check_admin_referer('bb-options');
			foreach (array_keys($options) as $o){
				$val=$_REQUEST[$o];
				if(preg_match("/(ur[il]|path)/i",$o))  //sanitize path if it has path, uri or url in the name. Case-insensitive.
					$val=bb_get_sanitize_path($val);
				update_option($o,$val);
				$errors.="update_option($o,[$_REQUEST[$o] => $val]);\n";
			}
		}
	}
}

/*convenience function - tests for $cgID in $_GET and sets $key to $value if it exists
 * NOTE: sanitizes all input. Paths are made relative, except absolute URIs */
function bb_set_option($cgID,$key){
	if (isset( $_REQUEST[$cgID] )){
		update_option($key, bb_get_sanitize_path($_REQUEST[$cgID]));
	}
}

/*cleans the path. removes first slashes and dots, as well as all '../'*/
function bb_get_sanitize_path($p){
	global $errors;
	$path=$p;
	$path = preg_replace('/\.\.\//','',$path); //remove all '../' from path
//	while($path=preg_replace('/^\//','',$path) || $path=preg_replace('/^\./','',$path)); //remove forward slashes and dots
	while(preg_match($path,'/^\//') || preg_match($path,'/^\./')){ //remove forward slashes and dots
		$path=preg_replace('/^\//','',$path);
		$path=preg_replace('/^\./','',$path);
	}
	return $path;
}

function bb_get_logo_style(){
	global $sname,$errors;
	$out='';
	$left=get_option($sname.'_logo_left');
	$top=get_option($sname.'_logo_top');
	$opacity=get_option($sname.'_logo_opacity');
	
	if (!$left=='' || $left==0){$out.="left: ".$left."px; ";}
	if (!$top=='' || $top==0){$out.="top: ".$top."px; ";}
	if (!$opacity=='' || $opacity==0){$out.="opacity: ".$opacity."; ";}
	$errors.="Left: $left\n";
	return $out;
}
function bb_get_fx_style(){
	global $sname,$errors;
	$out='';
	$left=get_option($sname.'_fx_left');
	$top=get_option($sname.'_fx_top');
	$opacity=get_option($sname.'_fx_opacity');
	
	if (!$left=='' || $left==0){$out.="left: ".$left."px; ";}
	if (!$top=='' || $top==0){$out.="top: ".$top."px; ";}
	if (!$opacity=='' || $opacity==0){$out.="opacity: ".$opacity."; ";}
	$errors.="Left: $left\n";
	return $out;
}
function bb_get_header_text_style(){
	global $sname,$errors;
	$out='';
	$left=get_option($sname.'_header_text_left');
	$top=get_option($sname.'_header_text_top');
	$opacity=get_option($sname.'_header_text_opacity');
	
	if (!$left=='' || $left==0){$out.="left: ".$left."px; ";}
	if (!$top=='' || $top==0){$out.="top: ".$top."px; ";}
	if (!$opacity=='' || $opacity==0){$out.="opacity: ".$opacity."; ";}
	$errors.="Left: $left\n";
	return $out;
}
/*returns classes regarding sidebar information, and image information*/
function bb_get_page_classes(){
	global $sname;
	$out="";
	if (!is_active_sidebar( 'left' ) ) {$out.=" no-left-sidebar";}
	if (!is_active_sidebar( 'right' ) ) {$out.=" no-right-sidebar";}
	if (!get_option($sname.'_image_logo') ) {$out.=" no-logo";}
	return $out;
}

/* returns an html option list for the files in a directory.
 * The $dir param is relative to the theme directory. 
 * The $cur param is the current value of the option. (selected value)*/
function bb_files_as_list_options($dir, $cur){
	$dir = get_template_directory() . '/'. $dir;
	$out="";
	$dir_handle = @opendir($dir);
	if (!$dir_handle) return "<option value='none'> ! No Such Directory ! </option>";
	while ($file = readdir($dir_handle)){
		if($file=='.' || $file =='..') continue; //skip . and ..
  		$out .= "<option ".( ($file==$cur)?'default ': '' )."value='$file'>$file</option>";
	}
	return $out;
}


function bb_get_header_image_uri(){
	global $sname;
	if(strstr(get_option($sname.'_image_header'),"/")){ //if var contains a slash, it is absolute path or url
		return bb_get_sanitize_path(get_option($sname.'_image_header'));
	}
	$path = get_template_directory_uri() . "/images/header/";
	
	return $path.(get_option($sname.'_image_header')?get_option($sname.'_image_header'):"default.png");
}

/* Return the URI of the header logo image */
function bb_get_logo_image_uri(){
	global $sname;
	$file=get_option($sname.'_header_logo_path');
	$path=get_template_directory_uri() . "/images/logo/".($file ? $file : "default.gif");
	if ( preg_match("/^http/i",$file) ) $path=$file;
	return $path;
}



/* do we have a header logo defined? */
function bb_has_header_logo(){
	global $sname;
	return (get_option($sname.'_image_logo'))?true:false;
}

/* Add javascript, css to header in admin panel */
function bb_print_theme_options_page_header(){ 
?>
	<!-- enqueue jquery -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/options.css" type="text/css" media="screen" />
<!--	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/options.js"></script>-->
<?php }

/* Shows the theme options page, options.php */
function bb_show_theme_options_page(){include(get_template_directory()."/options.php");}

/* parses the README.txt and echos it */
function bb_show_readme(){
	$file=file(get_template_directory().'/README.txt');
	foreach ($file as $line_num => $line) {
		$out=$line;
		$out=preg_replace($out,'/^\_\_\s+(.*)\s+\_\_/','\<h2\>$1\<\/h2\>'); // __ = h2
		$out.=preg_replace($out,'/^\_\_\_\_\s+(.*)\s+\_\_\_\_/','\<h3\>$1\<\/h3\>'); // ____ = h3
		$out.=preg_replace($out,'/^u\.\s+(.*)$','<ul><li>$1</li>'); // u. = ul li
		$out.=preg_replace($out,'/^\.\s+(.*)$','<li>$1</li>'); // . = li
		$out.=preg_replace($out,'/^\u\.\.\s+(.*)$/','\<h2\>$1\<\/h2\>'); //u.. = /ul
		echo $out;
	}
	
}

?>