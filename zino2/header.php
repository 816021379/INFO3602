<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale =1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">

        <h1 class="header-logo"><a href="<?php echo site_url() ?>"><strong>COVID-19</strong> Hub</a></h1>
        <div class="site-header-menu group">
            <nav class="main-navigation">

                <?php
                $pages = get_pages();
                if ($pages) {
                    echo '<ul>';
                    foreach ($pages as $page) {
                        $children = get_pages(array('child_of' => $page->ID));
                        if ($children || $page->post_name == "frequently-asked-questions") {
                            echo '<li><a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a></li>';
                        }
                    }
                    echo '</ul>';
                }
                ?>

            </nav>

        </div>
    </header>