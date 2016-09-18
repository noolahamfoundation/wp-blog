<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content" class="widecolumn">
<div class="post">
<div class="post-title"><div>
<h2>Archives</h2>
</div></div>
<div class="post-entry">

<h3>Archives by Month</h3>
<ul>
    <?php wp_get_archives('type=monthly'); ?>
</ul>
<p>&nbsp;</p>
<h3>Archives by Subject</h3>
<ul>
     <?php wp_list_cats(); ?>
</ul>

<?php if( function_exists('wp_tag_cloud') ) { ?>
<p>&nbsp;</p>
<h3>Tags</h3>
<?php wp_tag_cloud(); ?>
<?php } ?>

</div>
</div>	
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
