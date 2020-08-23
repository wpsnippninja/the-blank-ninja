<?php get_header(); ?>
<?php if ( have_posts() ) { ?>
  <div class="container">
    <h1><?php printf( __( '%s', 'wpsn' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
    <?php while ( have_posts() ) { ?>
      <?php the_post(); ?>
      <?php the_post_thumbnail(); ?>
      <h3><a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
      <?php the_excerpt(); ?>
    <?php } ?>
    <?php bootstrap_pagination(); ?>
  </div>
<?php } else { ?>
  <h1>No posts found in this category.</h1>
<?php } ?>
<?php get_footer(); ?>
