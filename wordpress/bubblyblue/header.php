<?php
/**
 * @package WordPress
 * @subpackage Bubbly_Blue
 */
 global $sname, $errors;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_enqueue_script("jquery"); ?>
<?php wp_enqueue_script("jquery-ui-core"); ?>
<?php wp_enqueue_script("jquery-ui-tabs"); ?>
<?php wp_head(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri()."/bubblyblue.js"?>"></script>

<?php if(isset($_SERVER['HTTP_USER_AGENT'])){ //testing user agents.
    $agent = $_SERVER['HTTP_USER_AGENT']; 
	if(preg_match('/^Mozilla\/.*?Gecko/i',$agent)){  //Rendering with Mozilla
		include("fixes/mozilla.php");
	}else if ( preg_match('/Webkit/i',$agent) ){ //Rendering With WebKit
		include("fixes/webkit.php");
	}else if ( preg_match('/Opera/i',$agent) ){ //Rendering with Opera
		include("fixes/opera.php");
	}else if ( preg_match('/MSIE/i',$agent) ){ //Rendering with IE
		include("fixes/msie.php");
	}else{
	}
}?>

<!-- The following are conditional comments, used only in Internet Explorer.
If you need to include fixes, put them in the fixes/ folder -->
<!-- IE SUPPORT -->
<!--[if IE]>
<script type="text/javascript" src="<?php echo get_template_directory_uri()."/curvycorners.js"?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri()."/jquery.corners.min.js"?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri()."/fixes/ie.js"?>"></script>
<![endif]-->
<!--[if lte IE 7]>
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/fixes/ie7.css" type="text/css"/>
<![endif]-->
<!--[if lte IE 6]>
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/fixes/ie6.css" type="text/css"/>
<![endif]-->
<!--[if lte IE 5.5]>
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/fixes/ie55.css" type="text/css"/>
<![endif]-->
<!--[if lte IE 5]>
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/fixes/ie5.css" type="text/css"/>
<![endif]-->
<!-- /IE SUPPORT -->

</head>

<body <?php body_class(); ?>>
<div id="envelope" class="envelope<?php 
	if (!get_option( $sname.'_has_topbar' ) ) {echo " no-menu";}
	if (!get_option( $sname.'_has_leftbar' ) ) {echo " no-left-sidebar";}
	if (!get_option( $sname.'_has_rightbar' ) ) {echo " no-right-sidebar";}
	if (!get_option($sname.'_header_logo_path') ) {echo " no-logo";}
	if (is_single()){echo " single-page";}
	?>">
<?php include get_template_directory()."/header-bar.php"?>
<div id="page">
