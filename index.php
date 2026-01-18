<?php get_header();
$details = array(
  'title' => 'Welcome to our Blog!',
  'subtitle' => 'Keep up with our latest new.',
);
pageBanner($details);  ?>
<!-- Main Content -->
<div class="container container--narrow page-section">
  <?php
  while (have_posts()) {
    the_post(); ?>
    <div class="post-item">
      <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="metabox">
        <p>Posted by <?php the_author_posts_link(); ?> on
          <a href="<?php echo esc_url(get_day_link(
                      get_the_time('Y'),
                      get_the_time('m'),
                      get_the_time('d')
                    )); ?>"><?php the_time('n.j.y'); ?></a> in <?php echo get_the_category_list(', '); ?>
        </p>
      </div>
      <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
      </div>
    </div>
  <?php  }
  echo paginate_links();
  ?>
</div>
<!-- End Content -->
<?php get_footer(); ?>