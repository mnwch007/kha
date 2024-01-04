<!-- footer area start -->
<footer>
    <div class="container">
        <div class="footer_wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer_one">
                        <h5><?= lang('global_lang.our_project') ?></h5>
                        <ul>
                            <?php
                            $info_projects_footer = $this->mainm->get_projects_footer($lang_url);
                            ?>
                            <?php
                            foreach ($info_projects_footer as $k => $info):
                                ?>
                                <li><a href="<?= base_url_lang(lang('url_lang.projects') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>"><?= $info['Name'] ?></a></li>
                                <?php
                            endforeach;
                            ?>
<!--                            <li><a href="<?= base_url_lang(lang('url_lang.projects') . '/เคหะสุขประชาร่มเกล้า') ?>">เคหะสุขประชาร่มเกล้า</a></li>
<li><a href="<?= base_url_lang(lang('url_lang.projects') . '/เคหะสุขประชาฉลองกรุง') ?>">เคหะสุขประชาฉลองกรุง</a></li>
<li><a href="<?= base_url_lang(lang('url_lang.projects') . '/ตลาดสุขประชาฉลองกรุง') ?>">ตลาดสุขประชาฉลองกรุง</a></li>
<li><a href="<?= base_url_lang(lang('url_lang.projects') . '/เคมอลล์@ร่มเกล้า') ?>">เคมอลล์@ร่มเกล้า</a></li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer_one">
                        <h5><?= lang('global_lang.information') ?></h5>
                        <ul>
                            <li><a href="<?= base_url_lang(lang('url_lang.about_us'), $lang_url) ?>"><?= lang('global_lang.about_us') ?></a></li>
                            <li><a href="<?= base_url_lang(lang('url_lang.news'), $lang_url) ?>"><?= lang('global_lang.news') ?></a></li>
                            <li><a href="<?= base_url_lang(lang('url_lang.investor'), $lang_url) ?>"><?= lang('global_lang.investor') ?></a></li>
                            <li><a href="<?= base_url_lang(lang('url_lang.career'), $lang_url) ?>"><?= lang('global_lang.career') ?></a></li>
                            <li><a href=" https://www.kha.co.th/contractor/" target="_blank"><?= lang('global_lang.contractor_registration') ?></a></li>
                            <li><a href="https://www.kha.co.th/land/" target="_blank"><?= lang('global_lang.register_land_for_rent') ?></a></li>
                            <li><a href="<?= base_url_lang(lang('url_lang.privacy_policy'), $lang_url) ?>"><?= lang('global_lang.privacy_policy') ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer_one">
                        <h5><?= lang('global_lang.contacts') ?></h5>
                        <p>บริษัท เคหะสุขประชา จำกัด (มหาชน)</p>
                        <ul id="address">
                            <li>111 ซอย เคหะร่มเกล้า 29</li>
                            <li>แขวงคลองสองต้นนุ่น เขตลาดกระบัง</li>
                            <li>กรุงเทพมหานคร 10520</li>
                        </ul>
                        <p class="mt-3">
                            <i class="fa-solid fa-phone"></i><a href="tel:021152222"> 02 115 2222</a>
                        </p>
                        <ul id="social" class="mt-3">
                            <li>
                                <a href="https://www.facebook.com/PR.NHA" target="_blank"><img src="<?= assets('img/fb.png') ?>" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="<?= assets('img/tube.png') ?>" alt="" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer_input">
                        <form class="js-form-subscribe-x">
                            <div class="footer_input_wrapper">
                                <h5><?= lang('global_lang.subscribe_newsletter') ?></h5>
                                <input type="text"  name="subscribe_email" id="subscribe_email" placeholder="<?= lang('global_lang.your_email') ?>" autocomplete="off" />
                                <div class="submit_button text-end">
                                    <button type="submit" class="c-subscribe__button">
                                        <?= lang('global_lang.submit_newsletter') ?> 
                                        <span><i class="fa-solid fa-angle-right"></i></span>
                                    </button>
                                </div>
                                <div class="bottom-respon text-white opacity-75 ms-2"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- search area start -->
<div
    class="offcanvas searchcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasRight"
    aria-labelledby="offcanvasRightLabel"
    >
    <div class="offcanvas-header search_heading">
        <p><?= lang('global_lang.project_search') ?></p>
        <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
            ></button>
    </div>
    <div class="offcanvas-body-item">
        <div class="search_item">
            <div
                class="search_input d-flex align-items-center justify-content-between"
                >
                <input type="text" placeholder="" />
                <button><img src="<?= assets('img/sc.png') ?>" alt="" /></button>
            </div>
        </div>
        <div class="search_box">


            <?php /*  <div class="search_box_one">
              <div class="search_box_one_left">
              <img src="<?= assets('img/house1.png') ?>" alt="" />
              </div>
              <div class="search_box_one_right">
              <a href="#">เคหะสุขประชาฉลองกรุง</a>
              <p>
              <span><img src="<?= assets('img/loc.png') ?>" alt="" /></span>ฉลองกรุง -
              กรุงเทพมหานคร
              </p>
              </div>
              </div>
              <div class="search_box_one">
              <div class="search_box_one_left">
              <img src="<?= assets('img/house1.png') ?>" alt="" />
              </div>
              <div class="search_box_one_right">
              <a href="#">เคหะสุขประชาฉลองกรุง</a>
              <p>
              <span><img src="<?= assets('img/loc.png') ?>" alt="" /></span>ฉลองกรุง -
              กรุงเทพมหานคร
              </p>
              </div>
              </div> */ ?>



        </div>
    </div>
</div>
<!-- search area end-->

<!-- menu for mobile start -->
<div
    class="offcanvas offcanvas-start"
    tabindex="-1"
    id="offcanvasRight2"
    aria-labelledby="offcanvasRightLabel"
    >
    <div class="offcanvas-header">
        <div class="mobile_menu">
            <a href="index.html">
                <img src="<?= assets('img/logo.png') ?>" alt="" />
            </a>
        </div>
        <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
            ></button>
    </div>
    <div class="offcanvas-body">
        <div class="header_right_menu sm_menu">
            <ul>
                <li><a href="<?= base_url_lang(lang('url_lang.projects'), $lang_url) ?>">โครงการของเรา</a></li>
                <li><a href="<?= base_url_lang(lang('url_lang.about_us'), $lang_url) ?>">รู้จักเคหะสุขประชา</a></li>
                <li><a href="<?= base_url_lang(lang('url_lang.news'), $lang_url) ?>">ข่าวสาร</a></li>
                <li><a href="<?= base_url_lang(lang('url_lang.investor'), $lang_url) ?>">นักลงทุนสัมพันธ์</a></li>
                <li><a href="<?= base_url_lang(lang('url_lang.contacts'), $lang_url) ?>">ติดต่อเรา</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- menu for mobile end -->




<!-- Main jQuery -->
<script src="<?= assets('js/jquery-3.6.0.min.js') ?>"></script>

<!-- Bootstrap Js -->
<script src="<?= assets('js/bootstrap.bundle.min.js') ?>"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Include owl-carousel -->
<script src="<?= assets('js/owl.carousel.min.js') ?>"></script>

<script src="<?= assets('js/jquery.fancybox.min.js') ?>"></script>

<!-- Fontawesome Script -->
<script src="https://kit.fontawesome.com/e7f2043049.js"></script>

<script src="<?= assets('js/wow.js') ?>"></script>

<!-- Custom jQuery -->
<script src="<?= assets('js/scripts.js?ver=' . VERSION) ?>"></script>

<!-- Scroll-Top button -->
<a href="#" class="scrolltotop"><i class="fas fa-angle-up"></i></a>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        slidesPerView: 1,
        spaceBetween: 0,
        loop: false,
        freeMode: true,
    });
</script>

<script>
    wow = new WOW(
            {
                animateClass: 'animated',
                offset: 100,
                callback: function (box) {
                }
            }
    );
    wow.init();
</script>


<?php
if (isset($js) && count($js) > 0):
    foreach ($js as $js_val):
        echo '<script src="' . assets($js_val) . '"></script>' . PHP_EOL;
    endforeach;
endif;
?>



</body>
</html>