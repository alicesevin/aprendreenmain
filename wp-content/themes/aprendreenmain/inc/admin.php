<?php

/************* ALLOW SVG UPLOAD *****************/

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

add_filter('tiny_mce_before_init', 'fb_tinymce_add_pre');
function fb_tinymce_add_pre($initArray)
{

    // Comma separated string od extendes tags
    // Command separated string of extended elements
    $ext = 'svg[preserveAspectRatio|style|version|viewbox|xmlns],defs,linearGradient[id|x1|y1|z1]';

    if (isset($initArray['extended_valid_elements'])) {
        $initArray['extended_valid_elements'] .= ',' . $ext;
    } else {
        $initArray['extended_valid_elements'] = $ext;
    }
    // maybe; set tiny paramter verify_html
    //$initArray['verify_html'] = false;

    return $initArray;
}

/************* CUSTOM DASHBOARD AND MENU *****************/

function custom_menu()
{

    $eles = get_field('affichage', 'option');

    if (count($eles) > 0) {
        if (is_array($eles)) {
            foreach ($eles as $ele) {
                remove_menu_page($ele);
            }
        } else {
            remove_menu_page($eles);
        }
    }
    $new_pages = get_field('icone', 'option');

    if (count($new_pages) > 0) {
        if (is_array($new_pages)) {
            foreach ($new_pages as $new_page) {
                add_menu_page($new_page['titre'], $new_page['titre_sidebar'], 'manage_options', $new_page['lien'], '', $new_page['icone'], $new_page['position']);
            }
        } else {
            add_menu_page($new_pages['titre'], $new_pages['titre_sidebar'], 'manage_options', $new_pages['lien'], '', $new_pages['icone'], $new_pages['position']);
        }
    }
}

add_action('admin_menu', 'custom_menu');


function remove_widgets()
{
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
}

function remove_commentstatus_meta_box()
{
    remove_meta_box('commentstatusdiv', 'post', 'normal');
}

function remove_bar_links()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('w3tc');
}

function home_widget()
{
    ?>
    <h1>Bienvenu</h1>
    <div>
        <p></p>
    </div>
    <?php
}

function add_widget()
{
    wp_add_dashboard_widget('home_widget', 'Bienvenue', 'home_widget');
}

add_action('wp_dashboard_setup', 'remove_widgets');
add_action('wp_dashboard_setup', 'add_widget');
add_action('admin_menu', 'remove_commentstatus_meta_box');
add_action('wp_before_admin_bar_render', 'remove_bar_links');

/**
 * COLUMNS ADMIN
 */
function order_column($defaults)
{
    $defaults['order_menu'] = 'Ordre ( 0 en haut de page )';
    return $defaults;
}

function order_column_sections_sortable($columns)
{
    $columns['order_menu'] = 'order_menu';
    return $columns;
}

function order_column_sections($column_name)
{
    global $post;

    if ($column_name == 'order_menu') {
        $order = $post->menu_order;
        echo $order;
    }
}

add_filter('manage_edit-sections_sortable_columns', 'order_column_sections_sortable');
add_filter('manage_sections_posts_columns', 'order_column');
add_action('manage_sections_posts_custom_column', 'order_column_sections', 10, 2);
function index_column($defaults)
{
    $defaults['order_index'] = 'Profondeur';
    return $defaults;
}

function index_column_parallax_sortable($columns)
{
    $columns['order_index'] = 'order_index';
    return $columns;
}

function index_column_parallax($column_name)
{
    global $post;

    if ($column_name == 'order_index') {
        $order = intval(get_field('plx-z', $post));
        echo $order;
    }
}

add_filter('manage_edit-parallax_sortable_columns', 'index_column_parallax_sortable');
add_filter('manage_parallax_posts_columns', 'index_column');
add_action('manage_parallax_posts_custom_column', 'index_column_parallax', 10, 2);

?>
