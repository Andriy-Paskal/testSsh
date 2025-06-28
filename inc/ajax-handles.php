<?php

add_action('wp_ajax_nopriv_post_like', 'handle_post_like');
add_action('wp_ajax_post_like', 'handle_post_like');

function handle_post_like() {
    if ( !isset($_POST['post_id']) ) {
        wp_send_json_error('No post ID');
    }

    $post_id = intval($_POST['post_id']);

    $likes = get_field('likes_tutor', $post_id);
    $likes = $likes ? intval($likes) : 0;

    $likes++;

    update_field('likes_tutor', $likes, $post_id);

    wp_send_json_success(array(
        'likes' => $likes
    ));
}
