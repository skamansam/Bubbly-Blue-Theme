<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
global $sname;
?>
<?php if (get_option($sname."_has_topbar")){ ?>
	<div id="page_menu">
		<ul>
			<?php 
				if (get_option($sname.'_show_pages_in_menu'))
					wp_list_pages("title_li=&depth=1&sort_column=menu_order");
				?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('top') ) : ?>
			<?php endif; ?>
		</ul>
	</div>
<?php }?>