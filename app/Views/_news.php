<?php
$info_rem_news = $this->mainm->get_recommended_news($lang_url);
if (count($info_rem_news) > 0):
    ?>
    <section id="p1blog" class="d-none d-lg-block wow fadeIn">
        <div class="container">
            <div class="p1blog_wrapper">
                <h3 class="text-center"><?= lang('global_lang.news_activities') ?></h3>
                <div class="p1blog_block">
                    <div class="row">
                        <?php
                        foreach ($info_rem_news as $k => $info):
                            ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="p1blog_cnt">
                                    <div class="ratio ratio-16x9" style="background:#f2f2f2 url('<?= img_path('news/' . $info['Image']) ?>') center center no-repeat; background-size: cover;"></div>
        <!--                                    <img src="<? img_path('news/' . $info['Image']) ?>" alt="" />-->
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

                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- p1blog area start -->
    <section id="p1blog" class="d-block d-lg-none wow fadeIn">
        <div class="container">
            <div class="p1blog_wrapper">
                <h3 class="text-center"><?= lang('global_lang.news_activities') ?><</h3>
                <div class="p1blog_block">
                    <div class="owl-carousel blog_slider">
                        <?php
                        foreach ($info_rem_news as $k => $info):
                            ?>
                            <div class="item">
                                <div class="p1blog_cnt">
                                    <img src="<?= img_path('news/' . $info['Image']) ?>" alt="" />
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
                            <?php
                        endforeach;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- p1blog area end -->


    <?php
endif;
?>