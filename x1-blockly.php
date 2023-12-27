<?php
/*
 * Template Name: Blockly Page
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#0d6efd">
  <script src="<?php echo get_template_directory_uri() ?>/assets/app.js" defer></script>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php

wp_body_open();
if (  is_user_logged_in() ) {
    echo do_shortcode("[x1-blockly]");
} else {
    $blockly_param = '';
    if ( isset($_GET['blocklyfile'] ) ) {
        $blockly_param = '?blocklyfile=' . $_GET['blocklyfile'];
    }
    echo "Необходимо авторизоваться ------> <b> <a href='/my-account$blockly_param'>Логин</a></b>";
}


wp_footer();
