<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery(".postim").tooltip('.toolbox'); 
});
</script>
<div class="blokbox">
<h2 class="bloktitl">Featured Posts</h2>

	<?php 
			$gldcat = get_option('ktn_gldcat'); 
			$gldct = get_option('ktn_gldct');
?>
<?php query_posts('category_name='. $flistcat .'&showposts='.$gldct.''); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="blok" id="post-<?php the_ID(); ?>">

<div class="fentry">

<a href="<?php the_permalink() ?>"><?php ktn_block_image();?></a>

<div class='toolbox'>

<div class='tool'>

<h3 style="padding:5px 0px;"><a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_title(); ?></a></h3>
<?php the_excerpt(); ?> 
</div>
<div class='tip'></div>
</div>
</div>

</div>
<?php endwhile; ?>
<?php wp_reset_query();?>

<?php endif; ?>
</div>
<div class="clear"></div>