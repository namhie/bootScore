<?php
get_header();
?>

  <div id="content" class="site-content <?= bootscore_container_class(); ?> py-5 mt-4">
    <div id="primary" class="content-area">
      <!-- Hook to add something nice -->
      <?php bs_after_primary(); ?>
      <main id="main" class="site-main">
        <!-- Breadcrumb -->
        <?php woocommerce_breadcrumb(); ?>
        <div class="row">
          <!-- sidebar -->
          <?php get_sidebar(); ?>
          <!-- row -->
          <div class="<?= bootscore_main_col_class(); ?>">
            <?php  woocommerce_content(); ?>
          </div>
        </div>
      </main><!-- #main -->
    </div><!-- #primary -->
  </div><!-- #content -->
<?php
get_footer();
