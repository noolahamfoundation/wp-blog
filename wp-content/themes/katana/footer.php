</div>


<div id="footer">
	
<div class="fleft">

Design by:  <a href="http://web2feel.com/ ">Web2feel.com</a> <br/>
Copyright &copy; <?php echo date('Y');?> <?php bloginfo('name');?> &ndash; <?php bloginfo('description'); ?>
<br/>
<?php $foot = get_option('ktn_foot'); echo stripslashes($foot); ?>
</div>

<div class="fright">
<a href="<?php bloginfo('rss2_url'); ?>">Subscribe to Posts</a>  <a href="<?php bloginfo('comments_rss2_url'); ?>">Subscribe to Comments</a> <br/>
	</div>
	</div>
</div>	
<?php wp_footer(); ?>
</body>
</html> 
     