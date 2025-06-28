<?php get_header(); ?>
    <div class="container">
        <h1>HEllo</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquam aliquid amet asperiores at blanditiis consequatur consequuntur debitis deleniti dolores, ducimus ea eaque eligendi ex excepturi hic illum incidunt ipsum iusto magnam maiores minus necessitatibus nesciunt nihil obcaecati perspiciatis porro quam quod repellat repellendus repudiandae saepe temporibus tenetur veniam vitae voluptatibus voluptatum! Aliquid amet aut blanditiis commodi consequatur ea eaque earum eveniet fuga molestiae quaerat quibusdam ratione, similique soluta tempora!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consectetur, deleniti deserunt dicta doloremque doloribus eveniet incidunt ipsum itaque magnam minus pariatur quaerat quibusdam quis quisquam quos rem repellendus saepe sapiente similique sit temporibus tenetur, totam? Ab alias aliquid aspernatur assumenda aut consequuntur, deserunt doloremque earum eligendi esse fugit ipsum laboriosam laborum necessitatibus non odio perspiciatis, possimus quis quod reiciendis repellat saepe sed similique, sit temporibus unde voluptatibus? Architecto ducimus ex explicabo libero magni? Eum fuga, tempora!</p>
        <button id="test">click</button>
        <h2>Posts</h2>
        <?php
            $args = [
              'post_type' => 'post',
              'posts_per_page' => -1,
              'fields' => 'ids'
            ];
            $all_posts = new WP_Query($args);
            debug($all_posts->posts);
         ?>

        <?php
        $args = array(
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => -1, // Get all media files
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $i = 1;
            while ($query->have_posts()) {
                $query->the_post();
                $url = wp_get_attachment_url(get_the_ID());
                echo '<p>№' . $i . '. ' . $url . '</p>';
                $i++;
            }
        }

        wp_reset_postdata();
        ?>
    </div>
<?php get_footer(); ?>
