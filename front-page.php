<?php get_header(); ?>
<!-- Main Content -->
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg'); ?>)"></div>
  <div class="page-banner__content container t-center c-white">
    <h1 class="headline headline--large">Welcome!</h1>
    <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
    <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
    <a href="<?php echo esc_url(get_post_type_archive_link('program')); ?>" class="btn btn--large btn--blue">Find Your Major</a>
  </div>
</div>

<div class="full-width-split group">
  <div class="full-width-split__one">
    <div class="full-width-split__inner">
      <!-- Events Loop -->
      <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
      <?php
      $today = date('Ymd');
      $args = array(
        'posts_per_page' => 2,
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',

        'meta_query' => array(
          array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'NUMERIC'
          )
        )
      );

      $homepageEvents = new WP_Query($args);
      while ($homepageEvents->have_posts()) {
        $homepageEvents->the_post();
        get_template_part('template-parts/content', 'event');
      }
      wp_reset_postdata();
      ?>
      <p class="t-center no-margin"><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="btn btn--blue">View All Events</a></p>
    </div>
  </div>
  <!-- End of Events Loop -->
  <div class="full-width-split__two">
    <div class="full-width-split__inner">
      <!-- Start Blogs Loop -->
      <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
      <?php
      $args = array(
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
        'no_found_rows'  => true
      );

      $homepagePosts = new WP_Query($args);
      while ($homepagePosts->have_posts()) {
        $homepagePosts->the_post();
        get_template_part('template-parts/content', 'blog');
      }
      wp_reset_postdata(); ?>
      <!-- End of Blogs Loop -->
      <p class="t-center no-margin"><a href="<?php echo esc_url(home_url('/blog')) ?>" class="btn btn--yellow">View All Blog Posts</a></p>
    </div>
  </div>
</div>
<?php get_template_part('template-parts/content', 'carousel') ?>
<!-- End Content -->
<?php get_footer(); ?>