<?php get_header(); ?>
<div class="container">
  <?php
  if (have_posts()) {
    while (have_posts()) {
      the_post(); ?>
      <article>
        <header class="article-title">
          <h1 class="text-primary"><?php the_title(); ?></h1>
          <p>Author: <a href="<?php echo get_the_author_meta('user_url'); ?>"><?php echo get_the_author_meta('display_name'); ?></a> | Posted on: <?php the_date(); ?></p>
        </header>
        <div class="content">
          <?php the_post_thumbnail('medium'); ?>
          <?php the_content(); ?>
        </div>
        <footer>
          <hr>
          <h3>About the Author</h3>
          <h4><a href="<?php echo get_the_author_meta('user_url'); ?>"><?php echo get_the_author_meta('display_name'); ?></a></h4>
          <p><?php echo get_the_author_meta('description'); ?></p>
        </footer>
      </article>
      <hr>
      <div class="related-posts">
        <h3>Related Articles</h3>
        <ul>
          <?php
          $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
          if( $related ) foreach( $related as $post ) {
            setup_postdata($post); ?>
            <li>
              <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
              <p><?php the_excerpt(); ?></p>
            </li>
          <?php }
          wp_reset_postdata(); ?>
        </ul>
      </div>
    <?php }
  }
  ?>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
