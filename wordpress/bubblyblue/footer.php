<?php
/**
 * @package WordPress
 * @subpackage Bubbly_Blue
 */
?>

<div id="footer" role="contentinfo" class="rounded">
<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
	<p>
		<?php bloginfo('name'); ?> is proudly powered by
		<a href="http://wordpress.org/">WordPress</a>
		<br/>Bubbly Blue Theme created by Skaman Sam Tyler, <a href="http://rbe.homeip.net">Rude Boy Enterprises</a>.
		<br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
		and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.<br/>
		<?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds.<br/>
	<a href="http://validator.w3.org/check?uri=<?php echo "http://".$_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI'] ?>"><img src="<?php echo get_template_directory_uri()."/images/valid-xhtml10-blue.gif"?>" alt="validate this page!"/></a>
	</p>
</div>

<?php /* "Just what do you think you're doing Dave?" */ ?>
		<?php wp_footer(); ?>
</div> <!-- /#envelope -->
</body>
</html>
