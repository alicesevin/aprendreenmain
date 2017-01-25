<?php


require_once('inc/debug.php');

/*********************
 * ADMIN
 *********************/

require_once('inc/admin.php');

/*********************
 * Fonctions
 *********************/

require_once('inc/tools.php');

/*********************
 * Clean + Config
 *********************/

function start()
{

    // CPT
    require_once('inc/custom-post-type.php');

    // Clean
    add_action('init', 'clean_head');
    // Title
    add_filter('wp_title', 'rewrite_title', 10, 3);
    // Remove Version
    add_filter('the_generator', 'remove_version');
    // Remove comment widget
    add_filter('wp_head', 'remove_widget_comments', 1);
    // Clean comments head
    add_action('wp_head', 'remove_css_comments', 1);
    // Clean gallery
    add_filter('gallery_style', 'remove_css_gallery');

    // Styles
    add_action('wp_enqueue_scripts', 'load_styles', 999);
    add_action('wp_enqueue_scripts', 'load_fonts');
    add_action('wp_footer', 'remove_embed');

    theme_support();

    // Clean images
    add_filter('the_content', 'clean_images');

}

add_action('after_setup_theme', 'start');

?>
