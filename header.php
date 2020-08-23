<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(''); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-000000000-0"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-000000000-0');
    </script>
    <!-- Global Search Console Verification -->
    <meta name="google-site-verification" content="" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class="main-header">
      <div class="container">
        <a href="/" title="" class="site-name">Site Name</a>
        <nav class="navbar navbar-expand-md" role="navigation">
          <?php wp_nav_menu(array('theme_location' => 'header')); ?>
        </nav>
      </div>
    </header>
    <main>
