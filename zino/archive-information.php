<?php
get_header();
?>

<div class='page-title' style="background-image: url(<?php echo get_theme_file_uri('images/n95.jpg') ?> );filter: grayscale(90%);"><?php wp_title() ?></div>
<div class="page-body">

    <?php

    $posts_per_page = 3;

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'post_type' => 'information'
    );
    $query = new WP_Query($args);


    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
    ?>
            <div class="post-listing">
                <div class="post-title"><?php the_title() ?></div>
                <div class="post-excerpt"><?php the_excerpt() ?></div>
                <a class="post-button" href="<?php the_permalink() ?>">Read more</a>
            </div>
    <?php
        }

        echo '<div class="pagination">';
        echo paginate_links(array(
            'total' => $query->max_num_pages,
        ));
        echo '</div>';
    } else {

        echo '<p>No posts found</p>';
    }


    wp_reset_postdata();


    ?>
</div>

<?php
get_footer();
?>