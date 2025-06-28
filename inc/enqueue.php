<?php

function paskal_enqueue_assets() {
    // Enqueue scripts
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
    wp_enqueue_style('main-style', ASSETS_BUILD_THEME_PATH . '/css/all.css', array(), THEME_VERSION, 'all');


    // Enqueue scripts
    wp_enqueue_script('main-js', ASSETS_BUILD_THEME_PATH . '/js/all.js', array('jquery'), THEME_VERSION, true);
    wp_enqueue_script('single-js', ASSETS_BUILD_THEME_PATH . '/js/single.js', array('jquery'), THEME_VERSION, true);

    $theme_vars = array(
        'ajaxUrl' => site_url() . '/wp-admin/admin-ajax.php',
    );
    wp_localize_script('main-js', 'themeVars', $theme_vars);
}
add_action('wp_enqueue_scripts', 'paskal_enqueue_assets');

