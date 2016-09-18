<?php
/*
Plugin Name: Thamizmanam WP plugin
Version: 0.9
Plugin URI: http://kannan.jumbledthoughts.com/index.php/thamizmanam-plugin/
Author: Kannan Ramanathan
Author URI: http://kannan.jumbledthoughts.com/
Description: Thamizmanam WP plugin allows you to embed the <a href="http://www.blogdesam.com/tmwiki/index.php?id=toolbar" target="_blank" title="Pathivu toolbar">Pathivu toolbar</a> in your posts with out editing the template. This plugin supports both <a href="http://www.thamizmanam.com/" target="_blank" alt="Website">Thamizmanam</a> and <a href="http://www.blogdesam.com/" target="_blank" alt="Website">Blogdesam</a> aggregators.
*/

/*--------------------------------------------------------------------------------------------------
 Date           Ver                Name                     Description
 ======================================================================
 21 Mar,07      0.9                Kannan Ramanathan        Added support for Blogdesam. Added a new
                                                            option to "Options" page to select the service.
 08 Mar,07      0.6                Kannan Ramanathan        Added an options page
 05 Mar,07      0.1                Kannan Ramanathan        Initial version. 
        
--------------------------------------------------------------------------------------------------*/

/*  Copyright 2007 Kannan Ramanathan

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


//--------------------------------------------------------------------------------------------------
// Plugin release date and version
//
$plugin_date = "21/03/2007"; // dd/mm/yyyy
$plugin_version = "0.9";

//--------------------------------------------------------------------------------------------------
// Headers for Pathivu toolbar (for both Thamizmanam.com and Blogdesam.com)
//
$plugin_header = "<!-- Thamizmanam WP plugin v".$plugin_version." by Kannan Ramanathan (mailto:kannan[dot]ramanathan[AT]jumbledthoughts[dot]com)-->\n";
$thamizmanam_header = "<!-- thamizmanam.com toolbar code Part 1, starts. Pathivu toolbar (c) 2005 thamizmanam.com -->
                        <script language=\"javascript\" type=\"text/javascript\" src=\"http://services.thamizmanam.com/jscript.php\"></script>
                        <!-- thamizmanam.com toolbar code Part 1, ends. Pathivu toolbar (c) 2005 thamizmanam.com -->\n";

//$blogdesam_header =   "\n<!-- blogdesam.com toolbar code Part 1, starts. Pathivu toolbar (c) 2005 thamizmanam.com -->\n
//                        <script language=\"javascript\" type=\"text/javascript\" src=\"http://services.blogdesam.com/jscript.php\"></script>\n
//                        <!-- blogdesam.com toolbar code Part 1, ends. Pathivu toolbar (c) 2005 thamizmanam.com -->\n";

//-------------------------------------------------------------------------------------------------- 
// Hook in to the WP filters/actions
//
function tb_add_hooks()        
{
        // Adds the script to the header
        add_action('wp_head', 'tb_include_header');                        
        // Set a hook for showing the cfg page
        add_action('admin_menu', 'tb_add_cfg_page');


        // Display toolbar in the_content
        add_filter('the_content', 'tb_show_toolbar');
        // Display toolbar in the_excerpt
        add_filter('the_excerpt', 'tb_show_toolbar');        
}

//--------------------------------------------------------------------------------------------------
// Emit SCRIPT_INCLUDE during the <head> phase
//
function tb_include_header()
{       
        global $plugin_version;
        global $plugin_header, $thamizmanam_header, $blogdesam_header;

        print $plugin_header;

        // Print the headers depending on user selected option
        if ((get_option("tbToolbar_optionThamizmanam") == 1) || (get_option("tbToolbar_optionBlogdesam") == 1))
        {
                print $thamizmanam_header;
        }
}

//--------------------------------------------------------------------------------------------------
// Emit SCRIPT_CODE 
//
function tb_include_toolbar_code()
{                                  
        $toolbar_code = '';
        if (get_option("tbToolbar_optionThamizmanam") == 1)
        {
                $thamizmanamURL = "http://services.thamizmanam.com/toolbar.php";
                $imagefile = get_option("tbToolbar_plugin_imagename");
                if ($imagefile == "")
                {
                        $imagefile = get_bloginfo('wpurl') . '/wp-content/plugins/tbToolbar/images/default.png';
                }

                global $wp_query;
                $post = $wp_query->post;

                $date=(mysql2date('m/d/Y',$post->post_date));
                $permalink = (get_permalink($post->ID));
                $cmt=$post->comment_count;
                $blogurl = (get_bloginfo('wpurl'));
                $photo= ($imagefile);
                $srcURL = $thamizmanamURL."?date=".$date."&amp;posturl=".($permalink)."&amp;cmt=".$cmt."&amp;blogurl=".($blogurl)."&amp;photo=".($photo);

                // Form the tool bar code
                $toolbar_code .= "\n<!-- thamizmanam.com toolbar code Part 2, starts. Pathivu toolbar v1.1 (c)2005 thamizmanam.com -->\n";
                $toolbar_code .= "<script language=\"javascript\" type=\"text/javascript\" src=\"".$srcURL."\">\n";
                $toolbar_code .= "</script><br/>\n";
                $toolbar_code .= "<!-- thamizmanam.com toolbar code Part 2, ends. Pathivu toolbar (c)2005 thamizmanam.com -->\n";
				
				// ta.indli.com tool bar code
                $toolbar_code .= "\n<!-- ta.indli.com toolbar code, starts. -->\n";
                $toolbar_code .= "<script type='text/javascript'> button=\"hori\"; lang=\"ta\"; submit_url=\"".the_permalink()."\"</script>\n";
				$toolbar_code .= "<script src='http://ta.indli.com/tools/voteb.php' type='text/javascript'/></script>\n"; 
                $toolbar_code .= "\n<!-- ta.indli.com toolbar code, ends. -->\n";
        }
        if (get_option("tbToolbar_optionBlogdesam") == 1)
        {
                $blogdesamURL = "http://services.blogdesam.com/toolbar.php";
                $imagefile = get_option("tbToolbar_plugin_imagename");
                if ($imagefile == "")
                {
                        $imagefile = get_bloginfo('wpurl') . '/wp-content/plugins/tbToolbar/images/default.png';
                }

                global $wp_query;
                $post = $wp_query->post;

                $date=(mysql2date('m/d/Y',$post->post_date));
                $permalink = (get_permalink($post->ID));
                $cmt=$post->comment_count;
                $blogurl = (get_bloginfo('wpurl'));
                $photo= ($imagefile);
                $srcURL = $blogdesamURL."?date=".$date."&amp;posturl=".($permalink)."&amp;cmt=".$cmt."&amp;blogurl=".($blogurl)."&amp;photo=".($photo);

                // Form the tool bar code
                $toolbar_code .= "\n<!-- blogdesam.com toolbar code Part 2, starts. Pathivu toolbar v1.1 (c)2005 thamizmanam.com -->\n";
                $toolbar_code .= "<script language=\"javascript\" type=\"text/javascript\" src=\"".$srcURL."\">\n";
                $toolbar_code .= "</script>\n";
                $toolbar_code .= "<!-- blogdesam.com toolbar code Part 2, ends. Pathivu toolbar (c)2005 thamizmanam.com -->\n";
        }
        return ($toolbar_code);
}   

//--------------------------------------------------------------------------------------------------
// Callback function during the_content and the_excerpt filter phases
//
function tb_show_toolbar($content)
{                   
        if (is_single())
        {
                $toolbar_code = tb_include_toolbar_code();
                return($content."<br/>".$toolbar_code);
        }
        else
        {
                return $content;
        }
}

//--------------------------------------------------------------------------------------------------
// Callback for admin_menu action hook
// 
function tb_add_cfg_page()
{
        if (function_exists('add_options_page'))
        {
                add_options_page('Thamizmanam WP Plugin', 'Thamizmanam WP Plugin', 8, basename(__FILE__), 'tb_options_page');
        }
}

//--------------------------------------------------------------------------------------------------
// CFG page function
//
function tb_options_page()
{
        global $plugin_version;
        if(isset($_POST["action"]))
        {
                if($_POST["action"] == 'update_options')
                {
                        // Save the settings
                        update_option("tbToolbar_plugin_imagename",$_POST["imageName"]);
                        update_option("tbToolbar_optionThamizmanam", $_POST["option_thamizmanam"]);
                        update_option("tbToolbar_optionBlogdesam", $_POST["option_blogdesam"]);

                        // Print a nice message to the user
                        echo "<div id=\"message\" class=\"updated fade\"><p><strong>Options updated</strong></p></div>";
                }
        }

        $msgInfo = "This plugin (v".$plugin_version.") helps you to add <a target=\"_blank\" href=\"http://www.thamizmanam.com\" alt=\"Website\">Thamizmanam</a> or <a target=\"_blank\" href=\"http://www.blogdesam.com\" alt=\"Website\">Blogdesam</a> Toolbar code to your site, with out editing any of the template pages. By default, this plugin adds the code only to the single post pages and not to the homepage. ";
        $msgInfo .= "Please contact the <a target=\"_blank\" href=\"http://kannan.jumbledthoughts.com/index.php/about/contact-me/\" alt=\"Contact the author\">author</a> for any info on bugs/errors or general info.";

        echo "<div class=\"wrap\"><h2>Thamizmanam WP Plugin</h2><form method=\"post\">";
        echo "<p>".$msgInfo."</p>";
        echo "<fieldset class=\"options\"><legend>Options</legend>";
        echo "<table class=\"editform optiontable\"><tr valign=\"top\"><th scope=\"row\">Image path: </th><td>";
        echo "<input type=\"text\" class=\"code\" size=\"40\" name=\"imageName\" value=\"".get_option("tbToolbar_plugin_imagename")."\"/>";
        echo "<br />You should enter a fully qualified URL here, like <div class=\"code\">".get_bloginfo("wpurl")."/wp-content/uploads/myphoto.png</div></td></tr>";
        echo "<tr valign=\"top\"><th scope=\"row\">Include code for: </th><td>";
        echo "<label for=\"option_thamizmanam\"><input name=\"option_thamizmanam\" type=\"checkbox\" id=\"option_thamizmanam\" value=\"1\"";checked('1', get_option('tbToolbar_optionThamizmanam'));
        echo "/>  Thamizmanam.com</label><br />";
        echo "<label for=\"option_blogdesam\"><input name=\"option_blogdesam\" type=\"checkbox\" id=\"option_blogdesam\" value=\"1\"";checked('1', get_option('tbToolbar_optionBlogdesam'));
        echo "/>  Blogdesam.com</label>";
        echo "</td></tr></table></fieldset>";
        echo "<input type=\"hidden\" name=\"action\" value=\"update_options\" /><p class=\"submit\"><input type=\"submit\" name=\"update_options\" value=\"";
        echo "Update options &raquo;\"/></p>";
        echo "</form></div><div id=\"footer\"><p class=\"logo\"><img src=\"".get_bloginfo("wpurl")."/wp-content/plugins/tbToolbar/images/thamizmanam.gif\" alt=\"Thamizmanam\" /></p></div>";
}

//--------------------------------------------------------------------------------------------------
// Our main() function
//
function tb_initialize()
{
        // Setup hooks
        tb_add_hooks();  
        
}        

// Start our program
tb_initialize();
?>