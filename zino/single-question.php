<?php get_header(); ?>
<div class="page-body">
    <?php
    while (have_posts()) {
        $args = array(
            'post_type' => 'question',
            'posts_per_page' => -1,
        );
        $questions_query = new WP_Query($args);
        the_post(); ?>
        <div class='page-title' style="background-image: url(<?php echo get_theme_file_uri('images/n95.jpg') ?> );filter: grayscale(90%);"><?php the_title() ?></div>
        <div class="page-content">
            <div class="page-hierarchy">
                <div class="metabox">
                    <p><a class="parent-link" href="/frequently-asked-questions">
                            <i class="fa fa-home" aria-hidden="true"></i> Back to About Covid</a>
                    <div class="page-links">
                        <ul class="min-list">
                            <li class="category-list"><a href="frequently-asked-questions">Frequently asked Questions</a></li>
                            <? if ($questions_query->have_posts()) {
                                while ($questions_query->have_posts()) {
                                    $questions_query->the_post();
                                    echo '<li class="child-post">' . '<a href=' . get_the_permalink() . '>' . get_the_title() . '</a>' . '</li>';
                                }
                                wp_reset_postdata();
                            } else {
                                echo 'No questions found.';
                            }
                            ?>

                            </p>
                    </div>


                </div>
            <?php } ?>
            </div>
            <div class="page-text">
                <p class="breadcrumb"><a href="/about-covid">About Covid > </a><a href="/frequently-asked-questions">Frequently Asked Questions > </a><?php echo basename(get_the_permalink()) ?></p>
                <?php

                the_content();
                if (get_field('qr-code')) {
                    $qr_code_url = get_field('qr-code'); // Assuming 'qr-code' is the ACF field name

                    if ($qr_code_url) {
                        echo '<img class="qr-code" src="' . esc_url($qr_code_url) . '" alt="QR Code"><br>';
                    }
                }
                if (get_field('related_information')) {

                    $found = get_field('related_information');
                    $found = array_pop($found);
                    $permalink = get_permalink($found->ID);
                    echo '<a class="page-button" href=' . $permalink . '>RELATED INFORMATION</a></div>';
                }



                ?>
            </div>

        </div>
</div>
<?php


get_footer(); ?>