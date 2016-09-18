<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="robots" content="follow, all" />
<meta name="language" content="en" />
<meta name="description" content="<?php bloginfo('description') ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="keywords" content="" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/box.css" media="screen" />	
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/glide.css" media="screen" />	

<?php 
wp_enqueue_script('jquery');
wp_enqueue_script('Tooltip', get_stylesheet_directory_uri() .'/js/tooltip.js');
if(get_option('ktn_cufon') == "Yes") { 
wp_enqueue_script('cufon', get_stylesheet_directory_uri() .'/js/cufon.js');
wp_enqueue_script('Myriad', get_stylesheet_directory_uri() .'/js/TitilliumMaps26L_300.font.js');
wp_enqueue_script('Rockwell', get_stylesheet_directory_uri() .'/js/Rockwell_Std_400.font.js');
wp_enqueue_script('Gang', get_stylesheet_directory_uri() .'/js/Gang_of_Three_400.font.js');
wp_enqueue_script('Effects', get_stylesheet_directory_uri() .'/js/effects.js');
}
?>

<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover = function() {
	if (!document.getElementsByTagName) return false;
	var sfEls1 = document.getElementById("catmenu").getElementsByTagName("li");
	for (var i=0; i<sfEls1.length; i++) {
		sfEls1[i].onmouseover=function() {
			this.className+=" sfhover1";
		}
		sfEls1[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover1\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]></script>

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>
<?php 
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head(); ?>

</head>
<body>

<div id="wrapper">
<div id="top"> 

<div class="blogname">
	<h1><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"><?php bloginfo('name');?></a></h1>
	<h2><?php bloginfo('description'); ?></h2>
</div>



</div>
<div class="clear"></div>

<div id="catmenucontainer">
		<div id="catmenu">
		<ul>
			<li class="page_item <?php if ( is_home() ) { ?>current_page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>/" title="Home">Home</a></li>
			<?php wp_list_pages('sort_column=menu_order&title_li=');?>
		
		</ul>
	</div>		
</div>		
<div class='head'>

</div>		
<div id="foxmenucontainer">
		<div id="menu">
			<ul>
				<?php wp_list_categories('title_li=&depth=4'); ?>
			</ul>
</div>		
	
</div>



<div id="casing">		