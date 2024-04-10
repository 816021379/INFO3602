<?php


function add_post_types()
{



  register_post_type('news', array(
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'public' => true,
    'rewrite' => array('slug' => 'news'),
    'has_archive' => true,
    'labels' => array(
      'name' => "News",
      'add_new_item' => 'Add New News Post',
      'edit_item' => 'Edit News Post',
      'all_items' => 'All News Posts',
      'singular_name' => "News Post",
    ),
    'menu_icon' => 'dashicons-format-status'
  ));

  register_post_type('information', array(
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'public' => true,
    'rewrite' => array('slug' => 'information'),
    'has_archive' => true,
    'labels' => array(
      'name' => "Information",
      'add_new_item' => 'Add New Information',
      'edit_item' => 'Edit Information Post',
      'all_items' => 'All Information Posts',
      'singular_name' => "Information Post",
    ),
    'menu_icon' => 'dashicons-format-status'
  ));

  register_post_type('question', array(
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'public' => true,
    'rewrite' => array('slug' => 'frequently-asked-questions'),
    'has_archive' => false,
    'labels' => array(
      'name' => "Questions",
      'add_new_item' => 'Add New Question',
      'edit_item' => 'Edit Question',
      'all_items' => 'All Questions',
      'singular_name' => "Question",
    ),
    'menu_icon' => 'dashicons-format-status'
  ));
}
function site_files()
{
  wp_enqueue_style('site_main_styles', get_stylesheet_uri());
  wp_enqueue_style('custom-google-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}




add_action('wp_enqueue_scripts', 'site_files');
add_action('init', 'add_post_types');
