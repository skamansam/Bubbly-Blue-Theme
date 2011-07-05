<?php
/**
 * @package WordPress
 * @subpackage Bubbly_Blue
 */

get_header(); ?>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
<!-- Start page.php -->
	<div id="content" class="narrowcolumn" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2 class="post-title"><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>
<!-- End page.php -->

<?php get_footer(); ?>
