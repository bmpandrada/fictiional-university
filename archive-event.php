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
    the_post(); ?>
    <div class="event-summary">
      <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
        <span class="event-summary__month">
          <?php
          $eventDate = new DateTime(get_field('event_date'));
          echo esc_html($eventDate->format('M')) ?></span>
        <span class="event-summary__day"><?php echo esc_html($eventDate->format('d')) ?></span>
      </a>
      <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <p><?php if (has_excerpt()) {
              echo get_the_excerpt();
            } else {
              echo wp_trim_words(get_the_content(), 13);
            } ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
      </div>
    </div>

  <?php  }
  wp_reset_postdata();
  echo paginate_links();
  ?>
  <hr class="section-break">
  <p>Looking for a recap of past events? <a href="<?php echo esc_url(site_url('/past-events')); ?>">See our past events</a>.</p>
</div>

<!-- End Content -->

<?php get_footer(); ?>