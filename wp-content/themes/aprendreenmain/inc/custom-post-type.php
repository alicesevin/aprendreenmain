<?php

require_once 'custom-fields.php';

/*********************
 * CPT ( CAMION / RESTAURANT )
 *********************/
add_action('after_switch_theme', 'rewrite_rules');

function rewrite_rules()
{
    flush_rewrite_rules();
}

add_action('init', 'register_portrait');
add_action('init', 'register_parrallax');
add_action('init', 'add_taxonomies');

function register_portrait()
{
    register_post_type('portrait',
        array('labels' => array(
            'name' => 'Portraits',
            'singular_name' => 'Portrait',
            'all_items' => 'Tous les membres',
            'add_new' => 'Ajouter un membre',
            'add_new_item' => 'Ajouter un nouveau membre',
            'edit' => 'Editer le membre',
            'edit_item' => 'Editer',
            'new_item' => 'Nouveau membre',
            'view_item' => 'Voir le membre',
            'search_items' => 'Chercher un membre',
            'not_found' => 'Aucun membre trouvé',
            'not_found_in_trash' => 'Aucun membre trouvé dans la poubelle',
            'parent_item_colon' => 'Parent'
        ),
            'description' => 'Gestion des membres',
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-id-alt',
            'has_archive' => 'false',
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'revisions', 'thumbnail')
        )
    );

}

function register_parrallax()
{
    register_post_type('parrallax',
        array('labels' => array(
            'name' => 'Parrallax',
            'singular_name' => 'Parrallax',
            'all_items' => 'Tous les parrallaxs',
            'add_new' => 'Ajouter un parrallax',
            'add_new_item' => 'Ajouter un nouveau parrallax',
            'edit' => 'Editer le parrallax',
            'edit_item' => 'Editer',
            'new_item' => 'Nouveau parrallax',
            'view_item' => 'Voir le parrallax',
            'search_items' => 'Chercher un parrallax',
            'not_found' => 'Aucun parrallax trouvé',
            'not_found_in_trash' => 'Aucun parrallax trouvé dans la poubelle',
            'parent_item_colon' => 'Parent'
        ),
            'description' => 'Gestion des parrallaxs',
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-format-gallery',
            'has_archive' => 'false',
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'revisions')
        )
    );

}
function add_taxonomies()
{
    register_taxonomy('type',
        array('parrallax'),
        array('hierarchical' => true,
            'labels' => array(
                'name' => 'Types',
                'singular_name' => 'Type de parrallax',
                'search_items' => 'Rechercher tous les types de parrallax',
                'all_items' => 'Tous les types de parrallax',
                'parent_item' => 'Parent',
                'parent_item_colon' => 'Parent',
                'edit_item' => 'Editer le type de parrallax',
                'update_item' => 'Mettre à jour le type de parrallax',
                'add_new_item' => 'Ajouter un nouveau type de parrallax',
                'new_item_name' => 'Nouveau type de parrallax'
            ),
            'show_admin_column' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'type'),
        )
    );
}
?>
