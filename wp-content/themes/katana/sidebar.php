<div class="right">


<?php include (TEMPLATEPATH . '/flist.php'); ?>	
<?php include (TEMPLATEPATH . '/searchform.php'); ?>	
	<?php include (TEMPLATEPATH . '/twitbox.php'); ?>
	<div class="clear"></div>
<?php include (TEMPLATEPATH . '/sponsors.php'); ?>	


<div class="sidebar">

	<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar("Sidebar1") ) : ?>    
		<div class="sidebox1">
		<li>
			<h3 class="sidetitl">Pages</h3>
			<ul>
			<?php wp_list_pages('title_li='); ?>
			</ul>
		</li>
	</div>
	
	<?php endif; ?>
	</ul>

</div>


<div class="sidebar2">

	<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar("Sidebar2") ) : ?>    
		<div class="sidebox2">
		<li>
			<h3 class="sidetitl">Pages</h3>
			<ul>
			<?php wp_list_pages('title_li='); ?>
			</ul>
		</li>
	</div>
	
	<?php endif; ?>
	</ul>

</div>



</div>