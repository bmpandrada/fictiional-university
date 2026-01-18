<?php get_header();
// <!-- Main Content -->
while (have_posts()) {
  the_post();
  $details = array(
    'title' => get_the_title(),
    'subtitle' => get_field('page_banner_subtitle'),
  );
  pageBanner($details);  ?>
  <div class="container container--narrow page-section">
    <div class="generic-content">
      <div class="row group">
        <div class="one-third">
          <?php the_post_thumbnail('professorPortrait'); ?>
        </div>
        <div class="two-thirds">
          <?php the_content(); ?>
        </div>
      </div>
      <?php
      $relatedPrograms = get_field('related_programs');
      // <!-- print_r($relatedPrograms); -->
      if ($relatedPrograms) { ?>
        <hr class="section-break">
        <h2 class="headline headline--medium">Subject(s) Taught</h2>
        <ul class="link-list min-list">
          <?php
          foreach ($relatedPrograms as $program) { ?>
            <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
          <?php } ?>
        </ul>
      <?php }
      wp_reset_postdata(); ?>
    </div>
  </div>
<?php }
//  <!-- End Content -->
get_footer();
?>