<div class="blokbox">
<h2 class="bloktitl">Search my site</h2>
<div id="search">
			<form method="get" id="searchform" action="<?php bloginfo('home'); ?>" >
			<input id="s" type="text" name="s" value="<?php echo wp_specialchars($s, 1); ?>" />
			<input id="searchsubmit" type="submit" value="SEARCH" />
			</form>
</div>
</div>