<?php

/*********************
 * CLEAN
 *********************/

function clean_head()
{
    define('DISALLOW_FILE_EDIT', true);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    add_filter('style_loader_src', 'remove_wp_styles', 9999);
    add_filter('login_errors', create_function('$a', "return null;"));

    // Page d'options
    if (function_exists('acf_add_options_page')) {
        acf_add_options_sub_page('Options');
        acf_add_options_sub_page('Partenaires');
        acf_add_options_sub_page('Sociaux');
        acf_add_options_sub_page('Back-Office');
    }

}

function rewrite_title($title, $sep, $seplocation)
{
    global $page, $paged;

    if ('right' == $seplocation) {
        $title .= get_bloginfo('name');
    } else {
        $title = get_bloginfo('name') . $title;
    }

    $site_description = get_bloginfo('description', 'display');

    if ($site_description && (is_home() || is_front_page())) {
        $title .= " {$sep} {$site_description}";
    }

    if ($paged >= 2 || $page >= 2) {
        $title .= " {$sep} " . sprintf(__('Page %s', 'dbt'), max($paged, $page));
    }

    return $title;

}

function remove_version()
{
    return '';
}

function remove_wp_styles($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

function remove_widget_comments()
{
    if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
        remove_filter('wp_head', 'wp_widget_recent_comments_style');
    }
}

function remove_css_comments()
{
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
}

function remove_css_gallery($css)
{
    return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}


/*********************
 * SCRIPTS & STYLES
 *********************/

function load_styles()
{

    if (!is_admin()) {

        // Styles
        wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), null);
        wp_register_style('theme-styles', get_stylesheet_directory_uri() . '/dist/css/main.css', array(), null);

        //Scripts
        wp_enqueue_script('theme-script', get_stylesheet_directory_uri() . '/dist/js/main.js', array(), null);
        wp_register_script('ulule', get_stylesheet_directory_uri() . '/app/js/components/cwd.js', array(), null);

        wp_enqueue_style('bootstrap');
        wp_enqueue_style('theme-styles');
        wp_enqueue_script('theme-script');

    }
}


function load_fonts()
{
    wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i');
}

function remove_embed()
{
    wp_deregister_script('wp-embed');
}


/*********************
 * THEME SUPPORT
 *********************/

function theme_support()
{
    //FEED RSS
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');

    /*//MENUS
    add_theme_support('menus');

    register_nav_menus(
        array(
            'main-nav' => 'Menu principal'
        )
    );*/

}

/*********************
 * CLEAN IMAGES
 *********************/

function clean_images($content)
{
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

?>
