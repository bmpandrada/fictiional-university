<?php

//================= Custom Post Types =================//
function fictional_university_custom_post_types()
// Event Post Type
{
  register_post_type('event', array(
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar',
    'supports' => array('title', 'editor', 'excerpt', 'custom-fields'),
    'has_archive' => true,
    'rewrite' => array('slug' => 'events')
  ));

  //Program Post Type
  register_post_type('program', array(
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Programs',
      'add_new_item' => 'Add New Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ),
    'menu_icon' => 'dashicons-welcome-learn-more',
    'supports' => array('title', 'editor'),
    'has_archive' => true,
    'rewrite' => array('slug' => 'programs')
  ));
}

add_action('init', 'fictional_university_custom_post_types');
//================= End of Custom Post Types =================//