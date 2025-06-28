<?php
$paged = (get_query_var('page')) ? get_query_var('page') : 1;

$args = [
    'post_type' => 'tutor',
    'posts_per_page' => 8,
    'paged' => $paged,
];

$all_posts = new WP_Query($args);
?>

<?php if ($all_posts->have_posts()): ?>
    <div class="tutor__section">
        <div class="container">
            <div class="tutor__list">
                <?php while ($all_posts->have_posts()) {
                    $all_posts->the_post();
                    get_template_part('template-parts/parts/tutor-post');
                } ?>
            </div>


            <div class="pagination">
                <?php
                    echo paginate_links([
                        'total' => $all_posts->max_num_pages,
                        'current' => $paged,
                        'next_text' => '<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.75 12.5H20.25" stroke="#FF6636" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.5 5.75L20.25 12.5L13.5 19.25" stroke="#FF6636" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                        'prev_text' => '<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.25 12.5H3.75" stroke="#FF6636" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M10.5 5.75L3.75 12.5L10.5 19.25" stroke="#FF6636" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                    ]);
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
