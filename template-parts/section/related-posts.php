<?php
    $title = ($args['title']) ? $args['title'] : 'Related posts';
    $count_posts = ($args['posts']) ? $args['posts'] : -1;

    $section_margin = ($args['section-margin']) ? $args['section-margin'] : '';
    $array_css = array_filter([
        'background' => $args['bg-color'] ?? null,
        'margin' => $args['section-margin'] ?? null,
        'padding' => (!$args['section-padding'] && $args['bg-color']) ? '50px 0' : null
    ]);
?>

<section class="related-posts" <?php echo ($array_css) ? convert_array_to_inline_styles($array_css) : ''; ?>>
    <div class="container">

        <h2 class="text-center"><?php echo $title; ?></h2>
        <?php
            $args = [
                'post_type' => 'post',
                'posts_per_page' => $count_posts,
            ];
            $all_posts = new WP_Query($args);
        ?>
        <?php if($all_posts->have_posts()): ?>
           <div class="related-posts__list">
               <?php while ($all_posts->have_posts()){
                   $all_posts->the_post();
                   get_template_part('template-parts/parts/related-post');
               } ?>
           </div>
        <?php endif?>
    </div>
</section>