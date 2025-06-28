<?php

    function delete_all_posts_programmatically(){
        $args = [
            'post_type' => 'post',
            'posts_per_page' => -1,
            'fields' => 'ids'
        ];

        $all_posts = new WP_Query($args);

        if ($all_posts->have_posts()){
            foreach ($all_posts->posts as $post_id){
                wp_delete_post($post_id, true);
            }
        }
		return true;
    }

	function delete_all_terms() {
		$categories = get_terms(array(
			'taxonomy'   => 'category',
			'hide_empty' => false,
			'fields'     => 'ids'
		));

		if (!empty($categories)) {
			foreach ($categories as $term_id) {
				wp_delete_term($term_id, 'category');
			}
		}

		$taxonomies = get_taxonomies(array('public' => true), 'names');
		foreach ($taxonomies as $taxonomy) {
			$terms = get_terms(array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => false,
				'fields'     => 'ids'
			));

			if (!empty($terms)) {
				foreach ($terms as $term_id) {
					wp_delete_term($term_id, $taxonomy);
				}
			}
		}
	}

    function show_custom_logo( $size = 'medium' ) {
        if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
            $logo_image = wp_get_attachment_image( $custom_logo_id, $size, false, array(
                'class'    => 'custom-logo',
                'itemprop' => 'siteLogo',
                'alt'      => get_bloginfo( 'name' ),
            ) );
        } else {
            $logo_url =  ASSETS_THEME_IMAGES_PATH. 'placeholder-logo.svg';
            $w        = 150;
            $h        = 36;
            $logo_image = '<img src="' . $logo_url . '" width="' . $w . '" height="' . $h . '" class="custom-logo" itemprop="siteLogo" alt="' . get_bloginfo( 'name' ) . '">';
        }

        $html       = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" title="%2$s" itemscope>%3$s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ), $logo_image );
        echo apply_filters( 'get_custom_logo', $html );
    }
