<?php
/**
 * @package WordPress
 * @subpackage Bubbly_Blue
 */
$themename = "Bubbly Blue";
$sname = "bubblyblue";

automatic_feed_links();

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => 'left',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
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
$options = array (
	
	array( "name" => "$themename Options",
		"type" => "title"),
	 
	array( "type" => "open"),
	 
	array( "name" => "Show Menu in Header",
		"desc" => "Show or hide the menu bar in the header.",
		"id" => $sname."_has_topbar",
		"type" => "checkbox",
		"std" => "true"),
	array( "name" => "Show Left Sidebar",
		"desc" => "Show or hide the left sidebar. The content area will resize automatically. ",
		"id" => $sname."_has_leftbar",
		"type" => "checkbox",
		"std" => "true"),
	array( "name" => "Show Right Sidebar",
		"desc" => "Show or hide the right sidebar. The content area will resize automatically. ",
		"id" => $sname."_has_rightbar",
		"type" => "checkbox",
		"std" => "true"),
	 
	array( "type" => "close")
 
);

if(!get_option($sname.'_set_default_options')){bb_option_defaults(false);}

/* Default Options */
function bb_option_defaults($reset){
	if (!$reset){
		add_option($sname."_has_topbar",'1');
		add_option($sname."_has_leftbar",'1');
		add_option($sname."_has_rightbar",'1');
		add_option($sname.'_show_pages_in_menu','0');
		update_option($sname.'_set_default_options');
	}
}


/******************************************
 * Global Convenience Functions */

function bb_get_header_image_uri(){
	if(strstr(get_option('bb_image_header'),"/")){ //if var contains a slash, it is absolute path or url
		return bb_get_sanitize_path(get_option('bb_image_header'));
	}
	$path = get_template_directory_uri() . "/images/header/";
	
	return $path.(get_option('bb_image_header')?get_option('bb_image_header'):"default.png");
}

/* Return the URI of the header logo image */
function bb_get_logo_image_uri(){
	return (get_option('bb_image_logo'))?get_option('bb_image_logo'):get_template_directory_uri() . "/images/logo/default.gif";
}

/* do we have a header logo defined? */
function bb_has_header_logo(){return (get_option('bb_image_logo'))?true:false;}

/* Global Convenience Functions
 ******************************************/

/******************************************
 * Theme Options Page Handlers
 */

// when the admin interface is shown, do stuff
add_action('admin_menu', 'bb_handle_theme_page');
add_action('admin_head', 'bb_print_theme_options_page_header');

/* adds theme page and handles all options */
function bb_handle_theme_page(){
	bb_handle_options();
	add_action('admin_head', 'bb_print_theme_options_page_header');
	add_theme_page(__('Customize Theme'), __('Customize Theme'), 'edit_themes', basename(__FILE__), 'bb_show_theme_options_page');
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

/*cleans the path. removes first slashes and dots, as well as all '../'*/
function bb_get_sanitize_path($p){
	$path=$p;
	$path = preg_replace($path,'/\.\.\//',''); //remove all '../' from path
	while($path=preg_replace($path,'/^\//','') || $path=preg_replace($path,'/^\./','')); //remove forward slashes and dots
	return $path;
}

/* Add javascript, css to header in admin panel */
function bb_print_theme_options_page_header(){ 
?>
	<!-- enqueue jquery -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/header.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/options.js"></script>
<?php }

/* Shows the theme options page, options.php */
//function bb_show_theme_options_page(){include(get_template_directory()."/options.php");}
function bb_show_theme_options_page(){}


/* Theme Options Page Handlers
 ******************************************/


?>