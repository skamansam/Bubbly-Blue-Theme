<?php
/**
 * @package WordPress
 * @subpackage Bubbly_Blue
 */
global $sname;
?>
<?php if (get_option($sname."_has_leftbar")){ ?>
<div id="sidebar-left" class="sidebar rounded" role="complementary">
	<?php include(get_template_directory()."/loginform.php"); ?>
	<div id="bb_searchform" class="widget rounded">
		<h2 class="widget-title rounded">Search</h2>
		<?php get_search_form() ?>
	</div>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('left') ) : ?>
	<?php endif; ?>
</div>
<?php }?>