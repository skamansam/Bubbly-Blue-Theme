<?php
/**
 * @package WordPress
 * @subpackage Bubbly_Blue
 * */
global $sname,$user_identity;
?>
<div id="bb_loginform" class="widget rounded">
	<?php if ( current_user_can('level_0') ) : ?>
	<h2 class="widget-title rounded">Welcome, <?php echo $user_identity ?></h2>
		<ul>
			<li><a href="<?php bloginfo('url') ?>/wp-admin/">Dashboard</a></li>

			<?php if ( $user_level >= 1 ) : ?>
			<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php">Write an article</a></li>
			<?php endif // $user_level >= 1 ?>

			<li><a href="<?php bloginfo('url') ?>/wp-admin/profile.php">Profile and personal options</a></li>
			<li><a href="<?php echo wp_logout_url( get_permalink() ); ?>">logout</a></li>
		</ul>
	<?php else : //if ( get_option('users_can_register') ) : ?>
	<h2 class="widget-title rounded">Login</h2>
		<form action="<?php bloginfo('url') ?>/wp-login.php" method="post">
			<label for="log">User:<input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="22" /></label><br />
			<label for="pwd">Password:<input type="password" name="pwd" id="pwd" size="22" /></label><br />
			<input type="submit" name="submit" value="Send" class="button" /><br/>
			<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me</label><br />
			<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
		</form>
		<a href="<?php bloginfo('url') ?>/wp-register.php">Register</a><br/>
		<a href="<?php bloginfo('url') ?>/wp-login.php?action=lostpassword">Recover password</a><br/>
	<?php endif // get_option('users_can_register') ?>
</div>