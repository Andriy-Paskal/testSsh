<?php
function register_tutor_post_type() {
    $labels = array(
        'name'               => 'Tutors',
        'singular_name'      => 'Tutor',
        'menu_name'          => 'Tutors',
        'name_admin_bar'     => 'Tutor',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Tutor',
        'new_item'           => 'New Tutor',
        'edit_item'          => 'Edit Tutor',
        'view_item'          => 'View Tutor',
        'all_items'          => 'All Tutors',
        'search_items'       => 'Search Tutors',
        'not_found'          => 'No tutors found',
        'not_found_in_trash' => 'No tutors found in Trash'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'rewrite'            => array('slug' => 'tutors'),
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('tutor', $args);
}
add_action('init', 'register_tutor_post_type');

function register_tutor_taxonomy() {
    $labels = array(
        'name'              => 'Tutor Categories',
        'singular_name'     => 'Tutor Category',
        'search_items'      => 'Search Categories',
        'all_items'         => 'All Categories',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Tutor Categories',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'tutor-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('tutor_category', array('tutor'), $args);
}
add_action('init', 'register_tutor_taxonomy');

