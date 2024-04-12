<?php
get_header();
?>

<div class='page-title' style="background-image: url(<?php echo get_theme_file_uri('images/n95.jpg') ?> );filter: grayscale(90%);"><?php wp_title() ?></div>
<div class="page-body">

    <?php
    // Define posts per page
    $posts_per_page = 3;

    // Get current page number
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    // Query posts with pagination
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'post_type' => 'information'
    );
    $query = new WP_Query($args);

    // Loop through the posts
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
        // Pagination links
        echo '<div class="pagination">';
        echo paginate_links(array(
            'total' => $query->max_num_pages,
        ));
        echo '</div>';
    } else {
        // No posts found
        echo '<p>No posts found</p>';
    }

    // Restore original post data
    wp_reset_postdata();

    // Comments section

    ?>
</div>

<?php
get_footer();
?>