<?php get_header();
$details = array(
  'title' => 'All Programs',
  'subtitle' => 'See what going on in our world.',
);
pageBanner($details);  ?>

<!-- Main Content -->
<div class="container container--narrow page-section">
  <ul class="link-list min-list">
    <?php
    while (have_posts()) {
      the_post(); ?>
      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

    <?php  }
    wp_reset_postdata();
    echo paginate_links();
    ?>
  </ul>
</div>

<!-- End Content -->

<?php get_footer(); ?>