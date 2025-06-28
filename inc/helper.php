<?php

function debug($data){
    echo '<pre>' . print_r($data, true) . '</pre>';
}
function checkFeaturedImage($size = 'full'){
    if (has_post_thumbnail()){
        the_post_thumbnail($size);
    }else{
        echo '<img src="'. ASSETS_THEME_IMAGES_PATH .'/placeholder-featured-image.jpeg'.'" alt="placeholder image">';
    }
}

function convert_array_to_inline_styles($arr = []){
    if ($arr){
        $inline_style = implode('; ', array_map(fn($k, $v) => "$k: $v", array_keys($arr), $arr));

        return 'style="' . $inline_style . '"';
    }
    return false;
}

function display_svg( $img, $class = '', $size = 'medium' ) {
    echo return_svg( $img, $class, $size );
}

function return_svg( $img, $class = '', $size = 'medium' ) {
    if ( ! $img ) {
        return '';
    }

    $file_url = is_array( $img ) ? $img['url'] : $img;

    $file_info = pathinfo( $file_url );
    if ( $file_info['extension'] == 'svg' ) {
        $file_path         = convert_url_to_path( $file_url );

        if ( ! $file_path ) {
            return '';
        }

        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer"      => false,
                "verify_peer_name" => false,
            ),
        );
        $image             = file_get_contents( $file_path, false, stream_context_create( $arrContextOptions ) );
        if ( $class ) {
            $image = str_replace( '<svg ', '<svg class="' . esc_attr( $class ) . '" ', $image );
        }
        $image = preg_replace('/^(.*)?(<svg.*<\/svg>)(.*)?$/is', '$2', $image);

    } elseif ( is_array( $img ) ) {
        $image = wp_get_attachment_image( $img['id'], $size, false, array( 'class' => $class ) );
    } else {
        $image = '<img class="' . esc_attr( $class ) . '" src="' . esc_url( $img ) . '" alt="' . esc_attr( $file_info['filename'] ) . '"/>';
    };

    return $image;
}

/**
 * Convert file url to path
 *
 * @param string $url Link to file
 *
 * @return bool|mixed|string
 */

function convert_url_to_path( $url ) {
    if ( ! $url ) {
        return false;
    }
    $url       = str_replace( array( 'https://', 'http://' ), '', $url );
    $home_url  = str_replace( array( 'https://', 'http://' ), '', site_url() );
    $file_part = ABSPATH . str_replace( $home_url, '', $url );
    $file_part = str_replace( '//', '/', $file_part );
    if ( file_exists( $file_part ) ) {
        return $file_part;
    }

    return false;
}

function get_trim_content($text = '',  $wordLimit = 20){
    $text = ($text) ? $text :  get_the_content();
    $text = strip_tags($text);
    $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
    $words = explode(' ', $text);

    if (count($words) > $wordLimit) {
        $text = implode(' ', array_slice($words, 0, $wordLimit)) . '...';
    }
    return trim($text);
}