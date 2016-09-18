<?php get_header(); ?>

	<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="post-title"><div>
				<h2><?php the_title(); ?></h2>
			</div></div>
			<div class="post-entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
			<p class="post-meta">
					
					<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
						// Both Comments and Pings are open ?>
						You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> from your own site. Follow any responses to this page through the <?php comments_rss_link('RSS 2.0'); ?> feed.

					<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
						// Only Pings are Open ?>
						<a href="<?php trackback_url(true); ?> " rel="trackback">Trackback URI</a>. Follow any responses to this page through the <?php comments_rss_link('RSS 2.0'); ?> feed.

					<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
						// Comments are open, Pings are not ?>
						Follow any responses to this page through the <?php comments_rss_link('RSS 2.0'); ?> feed.

					<?php } edit_post_link('Edit this page.','',''); ?>

			</p>
		</div>
		<?php comments_template(); ?>
		<?php endwhile; else: ?>
			<h2 class="pagetitle">Not Found</h2>
			<p>Sorry, but you are looking for something that isn't here.</p>

		<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
