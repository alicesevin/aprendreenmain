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
add_action('init', 'register_sections');
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

function register_sections()
{
    register_post_type('sections',
        array('labels' => array(
            'name' => 'Sections',
            'singular_name' => 'Section',
            'all_items' => 'Toutes les sections',
            'add_new' => 'Ajouter une section',
            'add_new_item' => 'Ajouter une nouvelle section',
            'edit' => 'Editer la section',
            'edit_item' => 'Editer',
            'new_item' => 'Nouvelle section',
            'view_item' => 'Voir la section',
            'search_items' => 'Chercher une section',
            'not_found' => 'Aucune section trouvée',
            'not_found_in_trash' => 'Aucune section trouvée dans la poubelle',
            'parent_item_colon' => 'Parent'
        ),
            'description' => 'Gestion des sections',
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-welcome-widgets-menus',
            'has_archive' => 'false',
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'revisions', 'page-attributes')
        )
    );

}

function register_parrallax()
{
    register_post_type('parallax',
        array('labels' => array(
            'name' => 'Parallax',
            'singular_name' => 'Parallax',
            'all_items' => 'Tous les parallax',
            'add_new' => 'Ajouter un parallax',
            'add_new_item' => 'Ajouter un nouveau parallax',
            'edit' => 'Editer le parallax',
            'edit_item' => 'Editer',
            'new_item' => 'Nouveau parallax',
            'view_item' => 'Voir le parallax',
            'search_items' => 'Chercher un parallax',
            'not_found' => 'Aucun parallax trouvé',
            'not_found_in_trash' => 'Aucun parallax trouvé dans la poubelle',
            'parent_item_colon' => 'Parent'
        ),
            'description' => 'Gestion des parallax',
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
    register_taxonomy('type_parallax',
        array('parallax'),
        array('hierarchical' => true,
            'labels' => array(
                'name' => 'Types',
                'singular_name' => 'Type de parallax',
                'search_items' => 'Rechercher tous les types de parallax',
                'all_items' => 'Tous les types de parallax',
                'parent_item' => 'Parent',
                'parent_item_colon' => 'Parent',
                'edit_item' => 'Editer le type de parallax',
                'update_item' => 'Mettre à jour le type de parallax',
                'add_new_item' => 'Ajouter un nouveau type de parallax',
                'new_item_name' => 'Nouveau type de parallax'
            ),
            'show_admin_column' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'type_parallax'),
        )
    );

    register_taxonomy('section_parallax',
        array('parallax'),
        array('hierarchical' => true,
            'labels' => array(
                'name' => 'Sections',
                'singular_name' => 'Section de parallax',
                'search_items' => 'Rechercher toutes les sections de parallax',
                'all_items' => 'Toutes les sections',
                'parent_item' => 'Parent',
                'parent_item_colon' => 'Parent',
                'edit_item' => 'Editer la section',
                'update_item' => 'Mettre à jour la section',
                'add_new_item' => 'Ajouter un nouvelle section',
                'new_item_name' => 'Nouvelle section'
            ),
            'show_admin_column' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'type_parallax'),
        )
    );

    register_taxonomy('type',
        array('sections'),
        array('hierarchical' => true,
            'labels' => array(
                'name' => 'Types',
                'singular_name' => 'Type de section',
                'search_items' => 'Rechercher tous les types de section',
                'all_items' => 'Tous les types de section',
                'parent_item' => 'Parent',
                'parent_item_colon' => 'Parent',
                'edit_item' => 'Editer le type de section',
                'update_item' => 'Mettre à jour le type de section',
                'add_new_item' => 'Ajouter un nouveau type de section',
                'new_item_name' => 'Nouveau type de section'
            ),
            'show_admin_column' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'type'),
        )
    );
}

?>
