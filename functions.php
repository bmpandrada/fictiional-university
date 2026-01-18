<?php
//================= Enqueue Scripts and Styles =================//
function fictional_university_files()
{
  wp_enqueue_script('fictional_university_main_js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('fictional_university_font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('fictional_university_google_fonts', 'fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');

  wp_enqueue_style('fictional_university_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('fictional_university_styles', get_theme_file_uri('/build/index.css'));
}
add_action('wp_enqueue_scripts', 'fictional_university_files');
//================= End of Enqueue Scripts and Styles =================//



//================= Theme Support =================//
function fictional_university_features()
{
  add_theme_support('title-tag');
  // <!-- Enable featured image support: Plugin use: Regenerate Thumbnails -->
  // <!--Manual Image Crop By Tomasz Sitar to set custom image sizes-->
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 400, 260, true);
  add_image_size('professorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'fictional_university_features');
//================= End of Theme Support =================//


//================= Manipulate Default URL Based Queries/Archive Event =================//
function fictional_university_adjust_queries($query)
{
  if (!is_admin() and is_post_type_archive('program') and $query->is_main_query()) { // to order programs alphabetically
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) { // to hide past events
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'NUMERIC'
      )
    ));
  }
}

add_action('pre_get_posts', 'fictional_university_adjust_queries');
//================= End ofManipulate Default URL Based Queries =================//