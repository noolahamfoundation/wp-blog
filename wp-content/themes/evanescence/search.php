<?php get_header(); ?>
	<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<?php while (have_posts()) : the_post(); ?>

			<div class="searchresult">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>

				<p class="post-meta">Posted on <?php the_time(get_option('date_format')) ?> at <?php the_time(get_option('time_format')) ?>. <?php edit_post_link('Edit', '', '. '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

	<?php else : ?>
		<h2 class="pagetitle">No posts found. Try a different search?</h2>
	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
