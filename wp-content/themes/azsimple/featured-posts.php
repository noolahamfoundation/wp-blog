<?php
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) {
		$$value['id'] = $value['std'];
	}
	else {
		$$value['id'] = get_settings( $value['id'] );
	}
}
?>

<div class="featured-posts">
	<ul id="featured-posts-list">

		<?php

			// Random category
			if($azs_randomcat == true) {
				$categories = get_categories();
				$key = array_rand($categories, 1);
				$azs_featuredcat = ($categories[$key]->name);
			}

			$my_query = new WP_Query('showposts='.$azs_featurednr.'&category_name='.$azs_featuredcat);


		while ($my_query->have_posts()) : $my_query->the_post();

		?>

        	<li>
            		<div class="featured-post-image">
				<?php featured_post_image(); ?>
			</div>

			<div class="featured-post-text">
				<h2 class="featured-post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>                 
				<div class="featured-post-content"><?php limits(120, "Continue Reading"); ?></div>
			</div>
			<div class="clearfix"></div>
		</li>

		<?php endwhile; ?>

	</ul>
	<div class="featured-posts-nav">
		<div id="featured-posts-pages"></div>
	</div>  
</div><!-- featured-posts -->
