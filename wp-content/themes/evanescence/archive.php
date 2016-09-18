<?php get_header(); ?>

	<div id="content">
	<?php if (have_posts()) : ?>

	 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="archive-title">Archive for the &#8216;<?php echo single_cat_title(); ?>&#8217; Category</h2>
		
		<?php /* If this is a tag archive */ } elseif ( function_exists ('is_tag') && (is_tag()) ) { ?>
		<h2 class="archive-title">Posts tagged &#8216;<?php echo single_tag_title(); ?>&#8217;</h2>

 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="archive-title">Archive for <?php the_time('F jS, Y'); ?></h2>

	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="archive-title">Archive for <?php the_time('F, Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="archive-title">Archive for <?php the_time('Y'); ?></h2>

	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="archive-title">Author Archive</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="archive-title">Blog Archives</h2>

		<?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<div class="post-title"><div>
					<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
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
