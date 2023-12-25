<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.3.0
 */

?>

  <footer class="footer my-5">
    <div class="container-sm">
        <div class="row gap-lg-0 gap-5"> 
            <div class="col-lg-2 col-12"><img class="logo-footer mt-3" src="<?= get_stylesheet_directory_uri(); ?>/img/logo/logo-footer.png" alt="footer logo"></div>
            <div class="col-lg-8 col-12"> 
              <div class="list-footer mx-lg-auto ms-0 me-auto">
                <div class="row flex-lg-row flex-column">
                  <div class="col-lg-3">
                    <div class="list-footer-item filter-check ps-0"><a class="d-block fw-bold" data-bs-toggle="collapse" href="#navigation" role="button" aria-controls="navigation">Навигация
                        <div class="form-check-arrow d-lg-none d-block"></div></a>
                      <div class="list-footer-item-overlay"></div>
                    </div>
                    <div class="collapse" id="navigation">
                      <div class="list-group"><a class="list-group-item" href="" role="button">Главная</a><a class="list-group-item" href="" role="button">Каталог</a><a class="list-group-item" href="" role="button">Blockly</a></div>
                    </div>
                  </div>
                  <div class="col-lg-5">
                    <div class="list-footer-item filter-check ps-md-0"><a class="d-block fw-bold" data-bs-toggle="collapse" href="#buyers" role="button" aria-controls="buyers">Покупателям
                        <div class="form-check-arrow d-lg-none d-block"></div></a>
                      <div class="list-footer-item-overlay"></div>
                    </div>
                    <div class="collapse" id="buyers">
                      <div class="list-group"><a class="list-group-item" href="" role="button">Условия продажи</a><a class="list-group-item" href="" role="button">Доставка и оплата</a><a class="list-group-item" href="" role="button">Правила пользования торговой площадкой</a><a class="list-group-item" href="" role="button">Политика конфиденциальности</a></div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="list-footer-item filter-check ps-0"><a class="d-block fw-bold" data-bs-toggle="collapse" href="#company" role="button" aria-controls="company">Компания
                        <div class="form-check-arrow d-lg-none d-block"></div></a>
                      <div class="list-footer-item-overlay"></div>
                    </div>
                    <div class="collapse" id="company">
                      <div class="list-group"><a class="list-group-item" href="" role="button">О нас</a><a class="list-group-item" href="" role="button">Реквизиты</a><a class="list-group-item" href="" role="button">Контакты</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-12 p-md-0">
              <div class="d-flex flex-xl-column flex-row align-items-xl-end align-items-center gap-3 gap-xl-0">
                <button class="btn btn-primary rounded-pill btn-md btn-mobile mb-lg-3 mt-lg-3" type="button"> 
                  <svg class="bi bi-telegram me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"> </path>
                  </svg>Войти как Виктор
                </button>
                <a class="d-block text-center footer-login" href="registr-form.html">Войти</a>
              </div>
            </div>
        </div>
        <div class="row mt-5"> 
            <p class="copy">2023 © Wildberries — модный интернет-магазин одежды, обуви и аксессуаров. Все права защищены. Доставка по всей России.На Торговой площадке wildberries.ru применяются рекомендательные технологии. Адрес для направления юридически значимых сообщений: sales@wildberries.ru</p>
        </div>
    </div>
  </footer>
  

<!-- To top button -->
<a href="#" class="btn btn-primary shadow top-button position-fixed zi-1020"><i class="fa-solid fa-chevron-up"></i><span class="visually-hidden-focusable">To top</span></a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
