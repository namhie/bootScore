<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.3.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#0d6efd">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
  <link href="<?= get_stylesheet_directory_uri(); ?>/libs/bootstrap/bootstrap.min.css" rel="stylesheet" media="all">
  <link href="<?= get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet" media="all">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">
<div class="wrapper d-flex flex-column">
  <header class="header p-0"> 
        <div class="navbar navbar-top border-bottom border-default border-1 bg-white py-0">
          <div class="container justify-content-between row-gap-md-0 row-gap-4">
            <div class="navbar-menu">
              <button class="navbar-toggler p-3 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarMenu" aria-controls="offcanvasNavbarMenu" aria-expanded="false" aria-label="Переключатель навигации"><span class="navbar-toggler-icon"></span></button><a class="navbar-brand p-0" href="index-home.html"><img class="logo" src="<?= get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="logo"></a>
            </div>
            <div class="times text-nowrap ps-md-3 ps-2"><span class="cantry">CN </span><span class="time"></span></div>
            <div class="offcanvas offcanvas-main offcanvas-start text-bg-danger" id="offcanvasNavbarMenu" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header border-bottom justify-content-start p-0">
                <button class="btn-close btn-close-white fs-5 fs-md-3 p-4 pt-5 pb-3 me-2" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                <div class="offcanvas-title me-3"><a class="logo" href="#"><img src="<?= get_stylesheet_directory_uri(); ?>/img/logo-toggle.svg" alt="logo"></a></div>
                <div class="times text-nowrap px-md-3 px-2 ms-auto border-0"><span class="cantry">CN </span><span class="time time-form"></span></div>
              </div>
              <div class="offcanvas-body px-0">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-lg-0 mt-3">
                  <li class="nav-item"><a class="nav-link px-4 py-1" href="/#first-section" role="button">home</a></li>
                  <li class="nav-item"><a class="nav-link px-4 py-1" href="./#second-section" role="button">about us</a></li>
                  <li class="nav-item"><a class="nav-link px-4 py-1" href="./#third-section" role="button">we’ll tell you</a></li>
                  <li class="nav-item"><a class="nav-link px-4 py-1" href="./#fourth-section" role="button">our pipes</a></li>
                  <li class="nav-item"><a class="nav-link px-4 py-1" href="./#fifth-section" role="button">get in touch</a></li>
                </ul>
                <div class="row mt-2 mb-3 px-4 border-top pt-4">
                  <div class="col-4">
                    <div class="fs-6 mb-2">Adress factories:</div>
                  </div>
                  <div class="col">
                    <div class="fs-6 mb-2">Daying Industrial Zone, Zhishan Town, Heshan City, Jiangmen City, Guangdong Province, China zip code 529700 </div>
                  </div>
                </div>
                <div class="row px-4">
                  <div class="col-4">
                    <div class="fs-6 mb-3">Adress office:</div>
                  </div>
                  <div class="col">
                    <div class="fs-6 mb-3">UNIT 617, 6/F, 131-132CONNAUGHT ROAD WEST, SOLO WORKSHOPS, HONG KONG</div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </header>
<!-- #masthead -->
