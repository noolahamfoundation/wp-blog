<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="content" class="widecolumn">
<div class="post">

<div class="post-title"><div>
<h2>Links</h2>
</div></div>
<div class="post-entry">
<?php 
	wp_list_bookmarks('
		title_li=
		&title_before=<h3>
		&title_after=</h3>
		&category_before=
		&category_after=
		&orderby=rating
		&order=DESC
		&show_description=1
		&between= — 
	'); 
	// See http://codex.wordpress.org/Template_Tags/wp_list_bookmarks

?>
</div>
</div>
</div>
<?php
get_sidebar();
get_footer();
?>

