<div class="twitbox">

		<h2 class="bloktitl">Twitter Updates</h2>
		<?php
$twit = get_option('ktn_twit'); 
include('twitter.php');?>
<?php if(function_exists('twitter_messages')) : ?>
       <?php twitter_messages("$twit") ?>
       <?php endif; ?>

</div>