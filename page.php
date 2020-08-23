<?php get_header(); ?>
<div class="container">
  <?php
  if (have_posts()) {
    while (have_posts()) {
      the_post(); ?>
      <article>
        <header class="article-header">
          <h1 class="article-title"><?php the_title(); ?></h1>
          <p>Author: <a href="<?php echo get_the_author_meta('user_url'); ?>"><?php echo get_the_author_meta('display_name'); ?></a> | Posted on: <?php the_date(); ?></p>
        </header>
        <div class="content">
          <?php the_post_thumbnail('medium'); ?>
          <?php the_content(); ?>
        </div>
      </article>
    <?php }
  }
  ?>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
