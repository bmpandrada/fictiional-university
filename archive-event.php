<?php get_header();
$details = array(
  'title' => 'All Events',
  'subtitle' => 'See what going on in our world.',
);
pageBanner($details);  ?>
<!-- Main Content -->
<div class="container container--narrow page-section">
  <?php
  while (have_posts()) {
    the_post();
    get_template_part('template-parts/content', 'event');
  }
  wp_reset_postdata();
  echo paginate_links();
  ?>
  <hr class="section-break">
  <p>Looking for a recap of past events? <a href="<?php echo esc_url(site_url('/past-events')); ?>">See our past events</a>.</p>
</div>
<!-- End Content -->
<?php get_footer(); ?>