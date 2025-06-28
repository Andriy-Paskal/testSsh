<?php

function paskal_setup() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'paskal_setup');

function add_theme_menus() {
    register_nav_menus([
        'header-menu' => __('Header Menu', THEME_DOMAIN),
        'footer-menu' => __('Footer Menu', THEME_DOMAIN),
    ]);
}
add_action('after_setup_theme', 'add_theme_menus');

function theme_setup() {
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'theme_setup');

//Remove Comments
function disable_comments_on_all() {
    // Disable support for comments and pingbacks in all post types
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');

    // Close comments on existing posts
    $args = array(
        'status' => 'publish',
        'post_type' => 'any',
        'numberposts' => -1
    );
    $posts = get_posts($args);

    foreach ($posts as $post) {
        wp_update_post(array(
            'ID' => $post->ID,
            'comment_status' => 'closed',
            'ping_status' => 'closed'
        ));
    }
}
add_action('init', 'disable_comments_on_all');

function disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'disable_comments_admin_menu');

function disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'disable_comments_dashboard');

function disable_comment_page_redirect() {
    if (is_singular() && comments_open()) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('template_redirect', 'disable_comment_page_redirect');

//stop cropping images
function remove_default_image_sizes() {
    remove_image_size('thumbnail');
    remove_image_size('medium');
    remove_image_size('medium_large');
    remove_image_size('large');
}
add_action('init', 'remove_default_image_sizes');

function rename_uncategorized_category() {
    $uncategorized = get_category_by_slug('uncategorized');

    if ($uncategorized) {

        $new_name = 'Blog';

        wp_update_term($uncategorized->term_id, 'category', array(
            'name' => $new_name,
            'slug' => sanitize_title($new_name),
        ));
    }
}

//add_action('init', 'rename_uncategorized_category');

//TEst rest API
// Register Custom REST API Endpoint
function custom_get_posts_endpoint() {
    register_rest_route('custom/v1', '/posts/', array(
        'methods'  => 'GET',
        'callback' => 'custom_get_posts',
        'permission_callback' => '__return_true' // Public access (can be restricted)
    ));
}
add_action('rest_api_init', 'custom_get_posts_endpoint');

// Callback Function to Fetch Posts
function custom_get_posts($request) {
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 5, // Change as needed
        'post_status'    => 'publish'
    );

    $query = new WP_Query($args);
    $posts = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $posts[] = [
                'id'      => get_the_ID(),
                'title'   => get_the_title(),
                'content' => get_the_content(),
                'excerpt' => get_the_excerpt(),
                'link'    => get_permalink()
            ];
        }
        wp_reset_postdata();
    }

    return rest_ensure_response($posts);
}
