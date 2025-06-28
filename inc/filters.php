<?php

function disable_image_cropping($sizes) {
    foreach ($sizes as $size => $details) {
        if (isset($details['crop'])) {
            $sizes[$size]['crop'] = false; // Disable cropping
        }
    }
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'disable_image_cropping');

function disable_additional_image_sizes($sizes) {
    return [];
}
add_filter('intermediate_image_sizes_advanced', 'disable_additional_image_sizes');