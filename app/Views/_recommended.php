<?php
$info_recommended = $this->mainm->get_recommended_projects($lang_url);
if (count($info_recommended) > 0):
    ?>
    <section id="p1minislider" class="wow fadeIn">
        <div class="container">
            <div class="p1minislider_wrapper">
                <div
                    class="p1minislider_heading d-flex align-items-center justify-content-between"
                    >
                    <h3><?= lang('global_lang.recommended_projects') ?></h3>
                    <ul>
                        <li>
                            <span class="customPrevBtn"><i class="fa-solid fa-chevron-left"></i></span>
                        </li>
                        <li>
                            <span class="customNextBtn"><i class="fa-solid fa-chevron-right"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="p1minslider_block">
                    <div class="owl-carousel mini-slider owl-theme">
                        <?php
                        foreach ($info_recommended as $k => $info):
                            ?>
                            <div class="item">
                                <div class="mini_one">
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
                <!--                                                                    <img src="<? img_path('image_gallery/' . $info2['file_path']) ?>" alt="" />-->
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
                                                    <p><img src="<?= assets('img/loc.png') ?>" alt="" /><?= $info['Location'] ?></p>
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
                            </div>
                            <?php
                        endforeach;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
endif;
?>