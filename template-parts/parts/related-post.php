<div class="related-posts__post">
    <div class="related-posts__post-img">
        <?php checkFeaturedImage(); ?>
    </div>
    <h3 class="related-posts__post-title">
        <?php echo get_trim_content(get_the_title(),5); ?>
    </h3>
    <div class="related-posts__post-desc">
        <?php echo get_trim_content(); ?>
    </div>
    <div class="related-posts__post-actions">
        <a href="<?php the_permalink(); ?>">Read More</a>
    </div>
</div>
