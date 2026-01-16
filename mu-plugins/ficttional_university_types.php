<?php

//================= Custom Post Types =================//
function fictional_university_custom_post_types()
{
  register_post_type('event', array(
    'public' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events'
    ),
    'menu_icon' => 'dashicons-calendar',
    'supports' => array('title', 'editor', 'excerpt'),
    'has_archive' => true,
    'rewrite' => array('slug' => 'events')
  ));
}

add_action('init', 'fictional_university_custom_post_types');
//================= End of Custom Post Types =================//