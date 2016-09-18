<?php get_header(); ?>

	<div id="content">
	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post-title"><div>
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				</div></div>
				<div class="post-entry">
					<?php the_content("<small>Continue reading &#8216;" . the_title('', '', false) . "&#8217; &raquo;</small>"); ?>
				</div>

				<p class="post-meta">Posted by <?php the_author() ?> on <?php the_time(get_option('date_format')) ?> at <?php the_time(get_option('time_format')) ?> under <?php the_category(', ')?>.<br /><?php if( function_exists('the_tags') ) the_tags('Tags: ', ', ', '<br />'); ?><?php comments_popup_link('Comment on this post', '1 Comment', '% Comments'); ?>. <?php edit_post_link('Edit', '', '. '); ?>  </p>

			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
		
	<?php else : ?>

		<h2 class="pagetitle">Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
