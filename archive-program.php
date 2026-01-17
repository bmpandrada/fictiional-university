<?php get_header(); ?>

<!-- Main Content -->

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg');  ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">All Programs</h1>
    <div class="page-banner__intro">
      <p>See what going on in our world.</p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section">
  <ul class="link-list min-list">
    <?php
    $args = array(
      'post_type' => 'program',
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC'
    );

    $programs = new WP_Query($args);

    while ($programs->have_posts()) {
      $programs->the_post(); ?>
      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

    <?php  }
    wp_reset_postdata();
    echo paginate_links();
    ?>
  </ul>
</div>

<!-- End Content -->

<?php get_footer(); ?>