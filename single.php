<?php get_header(); ?>
  <?php echo earchi_title_bar(); ?>
  <?php echo earchi_post_before_content(); ?>
  <?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
  <?php echo earchi_post_after_content(); ?>
  <?php echo earchi_related_posts(); ?>
<?php get_footer(); ?>