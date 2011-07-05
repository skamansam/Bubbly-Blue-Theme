<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
global $sname;
?>
<?php if (get_option($sname."_has_rightbar")){ ?>
<div id="sidebar-right" class="sidebar" role="complementary">
<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar('right') ) : ?>
<?php endif; ?>
</div>
<?php }?>