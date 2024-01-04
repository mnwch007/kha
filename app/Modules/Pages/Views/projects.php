<?php
if ($info_banner):
    ?>
    <!-- p2hero area start -->
    <section id="p2hero">
        <img class="d-none d-md-block w-100" src="<?= img_path('banner_page/' . $info_banner['Image']) ?>" alt="" />
        <img class="d-block d-md-none w-100" src="<?= img_path('banner_page/' . $info_banner['ImageMob']) ?>" alt="" />
    <!--    <img class="d-none d-md-block w-100" src="<? img_path('banner_page/' . $info_banner['Image']) ?>" alt="..." />
       <img class="d-block d-md-none w-100" src="<? img_path('banner_page/' . $info_banner['ImageMob']) ?>"  alt="..." />-->
    <!--    <div class="d-none d-md-block ratio ratio-21x9" style="background:#fff url('<? img_path('banner_page/' . $info_banner['Image']) ?>') center center no-repeat; background-size: cover;"></div>
       <div class="d-block d-md-none ratio ratio-16x9" style="background:#fff url('<? img_path('banner_page/' . $info_banner['ImageMob']) ?>') center center no-repeat; background-size: cover;"></div>-->
    </section>
    <!-- p2hero area end -->
    <?php
endif;
?>

<!-- p2block area start -->
<section id="p2block" class="wow fadeIn">
    <div class="container">
        <div class="p2block_wrapper">
            <div class="p2block_heading">
                <h4><?= lang('global_lang.our_project') ?></h4>
                <div class="headbar">
                    <span></span>
                </div>
            </div>
            <div class="p2block_area">
                <?php
                $info_projects = $this->mainm->get_projects($lang_url);
                foreach ($info_projects as $k => $info):
                    ?>
                    <div class="mini_one m-0">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6">
                                <div class="mini_one_left">
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            <?php
                                            if (isset($info['info_gallery']) && count($info['info_gallery']) > 0):
                                                foreach ($info['info_gallery'] as $k2 => $info2):
                                                    ?>
                                                    <div class="swiper-slide">
                                                        <div class="ratio ratio-16x9" style="background:#fff url('<?= img_path('image_gallery/' . $info2['file_path']) ?>') center center no-repeat; background-size: cover;"></div>

                                                                                                            <!--                                                        <img  class="d-block w-100" src="<? img_path('image_gallery/' . $info2['file_path']) ?>" alt="" />-->
                                                    </div>
                                                    <?php
                                                endforeach;
                                            else:
                                                ?>
                                                <div class="swiper-slide">
                                                    <div class="ratio ratio-16x9"></div>
                                                </div>
                                            <?php
                                            endif;
                                            ?>
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="minislier_right">
                                    <div class="minislider_right_heading">
                                        <h3><?= $info['Name'] ?></h3>
                                        <p><img src="<?= assets('img/loc.png') ?>" alt="" /><?= $info['Location'] ?> </p>
                                        <p><img src="<?= assets('img/home.png') ?>" alt="" /><?= $info['Characteristics'] ?></p>
                                        <div class="headbar">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="minislider_para">
                                        <p><?= $info['ShortDetail'] ?></p>
                                        <a href="<?= base_url_lang(lang('url_lang.projects') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>"><?= lang('global_lang.view_detail') ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>


                <?php /*
                  <div class="mini_one m-0">
                  <div class="row g-5 align-items-center">
                  <div class="col-lg-6">
                  <div class="mini_one_left">
                  <div class="swiper mySwiper">
                  <div class="swiper-wrapper">
                  <div class="swiper-slide">
                  <img
                  class="d-block w-100"
                  src="<?= assets('img/mini1.png') ?>"
                  alt=""
                  />
                  </div>
                  <div class="swiper-slide">
                  <img
                  class="d-block w-100"
                  src="<?= assets('img/mini1.png') ?>"
                  alt=""
                  />
                  </div>
                  <div class="swiper-slide">
                  <img
                  class="d-block w-100"
                  src="<?= assets('img/mini1.png') ?>"
                  alt=""
                  />
                  </div>
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                  </div>
                  </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="minislier_right">
                  <div class="minislider_right_heading">
                  <h3>เคหะสุขประชาฉลองกรุง</h3>
                  <p>
                  <img src="<?= assets('img/loc.png') ?>" alt="" />ฉลองกรุง - กรุงเทพมหานคร
                  </p>
                  <p>
                  <img src="<?= assets('img/home.png') ?>" alt="" />302 หน่วย แบ่งเป็น
                  บ้านแฝดชั้นเดียว 94 หน่วย บ้านสองชั้น 208
                  หน่วยกรุงเทพมหานคร
                  </p>
                  <div class="headbar">
                  <span></span>
                  </div>
                  </div>
                  <div class="minislider_para">
                  <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                  </p>
                  <a href="<?= base_url_lang(lang('url_lang.projects') . '/เคหะสุขประชาฉลองกรุง') ?>">ดูรายละเอียด</a>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  <div class="mini_one m-0">
                  <div class="row g-5 align-items-center">
                  <div class="col-lg-6">
                  <div class="mini_one_left">
                  <div class="swiper mySwiper">
                  <div class="swiper-wrapper">
                  <div class="swiper-slide">
                  <img
                  class="d-block w-100"
                  src="<?= assets('img/mini1.png') ?>"
                  alt=""
                  />
                  </div>
                  <div class="swiper-slide">
                  <img
                  class="d-block w-100"
                  src="<?= assets('img/mini1.png') ?>"
                  alt=""
                  />
                  </div>
                  <div class="swiper-slide">
                  <img
                  class="d-block w-100"
                  src="<?= assets('img/mini1.png') ?>"
                  alt=""
                  />
                  </div>
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                  </div>
                  </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="minislier_right">
                  <div class="minislider_right_heading">
                  <h3>เคหะสุขประชาฉลองกรุง</h3>
                  <p>
                  <img src="<?= assets('img/loc.png') ?>" alt="" />ฉลองกรุง - กรุงเทพมหานคร
                  </p>
                  <p>
                  <img src="<?= assets('img/home.png') ?>" alt="" />302 หน่วย แบ่งเป็น
                  บ้านแฝดชั้นเดียว 94 หน่วย บ้านสองชั้น 208
                  หน่วยกรุงเทพมหานคร
                  </p>
                  <div class="headbar">
                  <span></span>
                  </div>
                  </div>
                  <div class="minislider_para">
                  <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                  </p>
                  <a href="<?= base_url_lang(lang('url_lang.projects') . '/เคหะสุขประชาฉลองกรุง') ?>">ดูรายละเอียด</a>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  <div class="mini_one m-0">
                  <div class="row g-5 align-items-center">
                  <div class="col-lg-6">
                  <div class="mini_one_left">
                  <div class="swiper mySwiper">
                  <div class="swiper-wrapper">
                  <div class="swiper-slide">
                  <img
                  class="d-block w-100"
                  src="<?= assets('img/mini1.png') ?>"
                  alt=""
                  />
                  </div>
                  <div class="swiper-slide">
                  <img
                  class="d-block w-100"
                  src="<?= assets('img/mini1.png') ?>"
                  alt=""
                  />
                  </div>
                  <div class="swiper-slide">
                  <img
                  class="d-block w-100"
                  src="<?= assets('img/mini1.png') ?>"
                  alt=""
                  />
                  </div>
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                  </div>
                  </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="minislier_right">
                  <div class="minislider_right_heading">
                  <h3>เคหะสุขประชาฉลองกรุง</h3>
                  <p>
                  <img src="<?= assets('img/loc.png') ?>" alt="" />ฉลองกรุง - กรุงเทพมหานคร
                  </p>
                  <p>
                  <img src="<?= assets('img/home.png') ?>" alt="" />302 หน่วย แบ่งเป็น
                  บ้านแฝดชั้นเดียว 94 หน่วย บ้านสองชั้น 208
                  หน่วยกรุงเทพมหานคร
                  </p>
                  <div class="headbar">
                  <span></span>
                  </div>
                  </div>
                  <div class="minislider_para">
                  <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                  </p>
                  <a href="<?= base_url_lang(lang('url_lang.projects') . '/เคหะสุขประชาฉลองกรุง') ?>">ดูรายละเอียด</a>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                 */ ?>


            </div>
        </div>
    </div>
</section>
<!-- p2block area end -->