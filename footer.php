    </main>
    <footer class="main-footer">
      <div class="container">
        <div class="">
          <h3>Footer Menu</h3>
          <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
        </div>
        <div class="copyright">
          <p>Copyright &copy; <?php date('Y'); ?>Site Name. All rights reserved. <a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a></p>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
