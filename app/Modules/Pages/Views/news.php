
<?php
if ($info_banner):
    ?>
    <!-- p4bannar area start -->
    <section id="p4bannar">
        <img class="d-none d-md-block w-100" src="<?= img_path('banner_page/' . $info_banner['Image']) ?>" alt="" />
        <img class="d-block d-md-none w-100" src="<?= img_path('banner_page/' . $info_banner['ImageMob']) ?>" alt="" />
    <!--        <img src="<? assets('img/p5bannar.png') ?>" alt="" />-->
        <h2><?= $info_banner['Title'] ?></h2>
    </section>
    <!-- p4bannar area end -->
    <?php
endif;
?>


<!-- p5slider area start -->
<section id="p5slider" class="wow fadeIn">
    <div class="container">
        <div class="p5slider_heading">
            <div class="p5slider_left">
                <h3><?= lang('global_lang.news_activities') ?></h3>
                <div class="headbar">
                    <span></span>
                </div>
            </div>
            <div class="pslider_right">
                <!--                <ul>
                                    <li>
                                        <span class="p5s_prev"
                                              ><i class="fa-solid fa-chevron-left"></i
                                            ></span>
                                    </li>
                                    <li>
                                        <span class="p5s_next"
                                              ><i class="fa-solid fa-chevron-right"></i
                                            ></span>
                                    </li>
                                </ul>-->
            </div>
        </div>
        <div class="p5slider_wrapper">
            <div class="owl-carousel p5-slider owl-theme">
                <div class="item">
                    <div class="p5slider_items">
                        <div class="row">
                            <?php
                            foreach ($info_news as $k => $info):
                                ?>

                                <div class="col-lg-4">
                                    <div class="p5slider_wrapperbox">
                                        <div class="p1blog_cnt">
                                            <div class="ratio ratio-16x9" style="background:#f2f2f2 url('<?= img_path('news/' . $info['Image']) ?>') center center no-repeat; background-size: cover;"></div>
    <!--                                            <img src="<? img_path('news/' . $info['Image']) ?>" alt="" />-->
                                            <div class="p1blog_cnt_para">
                                                <span><?= date_thai($info['date'], $lang_url) ?></span>
                                                <h5>
                                                    <?= $info['Name'] ?>
                                                </h5>
                                                <p>
                                                    <?= $info['ShortDetail'] ?>
                                                </p>
                                                <div class="goto text-end">
                                                    <a href="<?= base_url_lang(lang('url_lang.news') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>"><?= lang('global_lang.read_more') ?></a>
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
        </div>
    </div>
</section>
<!-- p5slider area end -->

<!-- p1video area start -->
<?php echo view('_video') ?>
<!-- p1video area end -->