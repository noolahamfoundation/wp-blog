<?php get_header(); ?>

	<div id="content">
<div align="left" style="padding:10px;padding-left:0;">
<script type="text/javascript">
/* <![CDATA[ */
function affiliateLink(str){ str = unescape(str); var r = ''; for(var i = 0; i < str.length; i++) r += String.fromCharCode(2^str.charCodeAt(i)); document.write(r); }
affiliateLink('%3Ec%22jpgd%3F%20jvvr8--uuu%2Cvgzv/nkli/cfq%2Camo-%3Dpgd%3F%3B2407%20%3C%3Ekoe%22qpa%3F%20jvvr8--uuu%2Cvgzv/nkli/cfq%2Camo-kocegq-vgzv%5Dnkli%5Dcfq%5DC%5D64%3Az42%2Cekd%20%22%60mpfgp%3F%202%20%22cnv%3F%20Vgzv%22Nkli%22Cfq%20%3C%3E-c%3C');
/* ]]> */
</script>
</div>
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
<div class="entry">
			<div id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				By <?php the_author() ?> on <abbr title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s &#8211; %2$s'), the_date('', '', '', false), get_the_time()) ?></abbr> <!-- by <?php the_author() ?> -->

				
					<?php the_content('Read the rest of this entry &raquo;'); ?>
<?php if ( function_exists('the_tags') ) { the_tags('<p>Tags: ', ', ', '</p>'); } ?>

				<p class="postmetadata">Posted in <span class="cty"><?php the_category(', ') ?></span> | <?php edit_post_link('Edit', '', ' | '); ?>  <span class="cmt"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></span></p>
				</div></div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('<span class="prev"> Previous Entries</span>') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries <span class="next">&nbsp;</span>') ?></div>
		</div>

	<?php else : ?>
<div class="entry">
		<h2>Not Found</h2>
		Sorry, but you are looking for something that isn't here.
</div>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
