<?php get_header(); ?>
<div class="page-body">
    <?php
    while (have_posts()) {
        the_post(); ?>
        <div class='page-title' style="background-image: url(<?php echo get_theme_file_uri('images/n95.jpg') ?> );filter: grayscale(90%);"><?php the_title() ?></div>
        <div class="page-content">
            <div class="page-hierarchy">

                <?php
                $theParent = wp_get_post_parent_ID(get_the_ID());
                if ($theParent) { ?>
                    <div class="metabox">
                        <p><a class="parent-link" href="<?php echo get_permalink($theParent); ?>">
                                <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a>
                        </p>
                    </div>
                <?php }

                ?>
                <?php
                $testArray = get_pages(array(
                    'child_of' => get_the_ID()
                ));
                if ($theParent or $testArray) { ?>
                    <div class="page-links">

                        <ul class="min-list">
                            <?php
                            if ($theParent) {
                                $findChildrenOf = $theParent;
                            } else {
                                $findChildrenOf = get_the_ID();
                            }
                            wp_list_pages(array(
                                'title_li' => NULL,
                                'child_of' => $findChildrenOf,
                                'sort_column' => 'menu_order'
                            ));
                            ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <div class="page-text">
                <?php
                $breadcrumbs = '<p class="breadcrumb">';
                $current_post = get_post();
                if (is_page() && $current_post->post_parent) {
                    $parent_pages = array_reverse(get_post_ancestors($current_post->ID));
                    foreach ($parent_pages as $parent_page_id) {
                        $breadcrumbs .= '<a href="' . get_permalink($parent_page_id) . '">' . get_the_title($parent_page_id) . '</a> > ';
                    }
                }
                $breadcrumbs .= get_the_title($current_post->ID);
                $breadcrumbs .= '</p>';
                echo $breadcrumbs;


                if (get_the_title() == "Frequently asked Questions") {
                    the_content();
                    $args = array(
                        'post_type' => 'question',
                        'posts_per_page' => 5,
                    );
                    $faq_query = new WP_Query($args);
                    if ($faq_query->have_posts()) {
                        while ($faq_query->have_posts()) {
                            $faq_query->the_post();
                            the_title('<div class="question"><h1>', '</h1>');
                            the_excerpt();
                            echo '<a class="page-button" href=' . get_permalink() . '>READ MORE</a></div>';
                        }
                ?>


                <?php
                        wp_reset_postdata();
                    } else {
                        echo 'No questions as yet! feel free to ask in the comments';
                    }
                } else {
                    the_content();
                } ?>
            </div>

        </div>
</div>
<?php

        if (comments_open() || get_comments_number()) {
            echo '<h1 style="background-color:#202120; color:#fff9f0;">Comments</h1>';
            comments_template(true);
        }
    }


    get_footer(); ?>