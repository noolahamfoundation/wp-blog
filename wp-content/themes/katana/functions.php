<?php
include 'theme_options.php';
if ( function_exists('register_sidebar') )
    register_sidebar(array(
	'name' => 'Sidebar1',
    'before_widget' => '<div class="sidebox1">',
    'after_widget' => '</div>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
    ));

if ( function_exists('register_sidebar') )
    register_sidebar(array(
	'name' => 'Sidebar2',
    'before_widget' => '<div class="sidebox2">',
    'after_widget' => '</div>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
    ));	
	

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'ktn_home', 125, 125, true );
	add_image_size( 'ktn_block', 100, 100, true ); 

}

function ktn_home_image(){
if ( has_post_thumbnail() ) {
			 the_post_thumbnail( 'ktn_home', array('class' => 'sidim') );
} else {
};
}

function ktn_block_image(){
if ( has_post_thumbnail() ) {
	 the_post_thumbnail( 'ktn_block', array('class' => 'postim', 'title'=>'') );
} else {
};
}
function ShortenText($text)
{
// Change to the number of characters you want to display

$chars_limit = 50;

$chars_text = strlen($text);

$text = $text." ";

$text = substr($text,0,$chars_limit);

$text = substr($text,0,strrpos($text,' '));

// If the text has more characters that your limit,
//add ... so the user knows the text is actually longer

if ($chars_text > $chars_limit)

{

$text = $text."...";

}

return $text;

}
?>