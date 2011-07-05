<?php global $sname;?>
<!--<div id="header" role="banner"> // What is role="banner"??? it breaks w3c validation!-->
<div id="header" class="rounded">
	<?php if ( get_option($sname.'_header_logo_path') ){?>
		<img id="header_logo" src="<?php echo bb_get_logo_image_uri() ?>" style="<?php echo bb_get_logo_style() ?>" alt="header logo"/>
	<?php }?>
	<div id="header_fx" style="background:url(<?php echo bb_get_header_image_uri() ?>) 0 0 no-repeat;">
		<!--<img src="<?php echo bb_get_header_image_uri() ?>" style="max-height:90px;"/>-->
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
	</div>
	<?php get_sidebar('top'); ?>
</div>
