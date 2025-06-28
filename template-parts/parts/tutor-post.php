<?php
    $post_id = get_the_ID();
    $terms = get_the_terms($post_id, 'tutor_category');
    $price = get_field('price_tutor', $post_id);
    $rate = get_field('rate_tutor', $post_id);
    $likes = get_field('likes_tutor', $post_id);
?>
<div class="tutor__post">
    <div class="tutor__post-img">
        <?php checkFeaturedImage(); ?>
    </div>
    <div class="tutor__post-content">
        <div class="tutor__post-content-top">
            <?php if($terms):?>
                <div class="tutor__post-category <?php echo $terms[0]->slug; ?>">
                    <?php echo $terms[0]->name ; ?>
                </div>
            <?php endif?>

            <?php if($price): ?>
                <div class="tutor__post-price">
                    <?php echo '$' . $price; ?>
                </div>
            <?php endif?>
        </div>
        <h3 class="tutor__post-title">
            <a href="<?php echo get_the_permalink($post_id); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
       <div class="tutor__post-content-bottom">
           <?php if($rate): ?>
              <div class="tutor__post-rate">
                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10.3446 15.401L14.2849 17.8974C14.7886 18.2165 15.4139 17.7419 15.2644 17.154L14.126 12.6756C14.0939 12.5509 14.0977 12.4197 14.137 12.297C14.1762 12.1743 14.2492 12.0652 14.3477 11.9822L17.8811 9.04132C18.3453 8.6549 18.1057 7.88439 17.5092 7.84567L12.8949 7.5462C12.7706 7.53732 12.6514 7.49332 12.5511 7.41931C12.4509 7.34531 12.3737 7.24435 12.3286 7.12819L10.6076 2.79436C10.5609 2.67106 10.4777 2.56492 10.3692 2.49002C10.2606 2.41511 10.1319 2.375 10 2.375C9.86813 2.375 9.73938 2.41511 9.63085 2.49002C9.52232 2.56492 9.43914 2.67106 9.39236 2.79436L7.6714 7.12819C7.62631 7.24435 7.54914 7.34531 7.4489 7.41931C7.34865 7.49332 7.22944 7.53732 7.10515 7.5462L2.49078 7.84567C1.89429 7.88439 1.65466 8.6549 2.11894 9.04132L5.65232 11.9822C5.75079 12.0652 5.82383 12.1743 5.86305 12.297C5.90226 12.4197 5.90606 12.5509 5.874 12.6756L4.81824 16.8288C4.63889 17.5343 5.38929 18.1038 5.99369 17.7209L9.65539 15.401C9.75837 15.3354 9.87792 15.3006 10 15.3006C10.1221 15.3006 10.2416 15.3354 10.3446 15.401Z" fill="#FD8E1F"/>
                  </svg>
                  <span><?php echo $rate; ?></span>

              </div>
           <?php endif?>
           <?php if($likes): ?>
               <div class="tutor__post-likes" data-post-id="<?php echo get_the_ID(); ?>">
                   <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M9.5 2.60406C10.1507 1.84844 11.2765 1 12.9907 1C15.9883 1 18 3.79375 18 6.39531C18 11.8338 11.1792 16 9.5 16C7.82078 16 1 11.8338 1 6.39531C1 3.79375 3.01167 1 6.00933 1C7.7235 1 8.84928 1.84844 9.5 2.60406Z" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                   </svg>
                   <span><?php echo number_format($likes); ?></span>
               </div>
           <?php endif?>
       </div>
    </div>
</div>

