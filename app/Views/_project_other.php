<?php
$info_projects_other = $this->mainm->get_projects_other($data_info['id'], $lang_url);
?>

<!-- p3blog area start -->
<section id="p3blog" class="d-none d-lg-block wow fadeIn">
    <div class="container">
        <div class="p3blog_wrapper">
            <h3 class="text-center"><?= lang('global_lang.other_projects') ?></h3>
            <div class="row">

                <?php
                foreach ($info_projects_other as $k => $info):
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="p3blog_cnt">
                            <div class="p3blog_cnt_img">
                                <div class="ratio ratio-16x9" style="background:#fff url('<?= img_path('image_gallery/' . $info['Image']) ?>') center center no-repeat; background-size: cover;"></div>
    <!--                                    <img class="d-block w-100" src="<? img_path('image_gallery/' . $info['Image']) ?>" alt="" />-->
                            </div>
                            <div class="p3blog_cnt_content">
                                <h4><?= $info['Name'] ?></h4>
                                <div class="p3blg_para">
                                    <p>
                                        <img src="<?= assets('img/loc.png') ?>"" alt="" /><?= $info['Location'] ?>
                                    </p>
                                </div>
                                <div class="p3blg_para_two">
                                    <div class="p3blg_para_two_left">
                                        <img src="<?= assets('img/home.png') ?>"" alt="" />
                                    </div>
                                    <div class="p3blg_para_two_right">
                                        <p><?= $info['Characteristics'] ?></p>
    <!--                                        <p>270 หน่วย แบ่งเป็น</p>
                                        <p>บ้านแฝดชั้นเดียว 86 หน่วย</p>
                                        <p>บ้านสองชั้น 184 หน่วย</p>-->
                                    </div>
                                </div>
                                <div class="p3blg_link text-end">
                                    <a href="<?= base_url_lang(lang('url_lang.projects') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>"><?= lang('global_lang.view_detail') ?></a>
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
</section>
<!-- p3blog area end -->

<!-- p3blog area start -->
<section id="p3blog" class="d-block d-lg-none">
    <div class="customcnt">
        <div class="p3blog_wrapper">
            <h3 class="text-center"><?= lang('global_lang.other_projects') ?></h3>
            <div class="owl-carousel p4sliderblg">

                <?php
                foreach ($info_projects_other as $k => $info):
                    ?>
                    <div class="item">
                        <div class="p3blog_cnt">
                            <div class="p3blog_cnt_img">
                                <div class="ratio ratio-16x9" style="background:#fff url('<?= img_path('image_gallery/' . $info['Image']) ?>') center center no-repeat; background-size: cover;"></div>
    <!--                                <img class="d-block w-100" src="<?= img_path('image_gallery/' . $info['Image']) ?>"" alt="" />-->

                            </div>
                            <div class="p3blog_cnt_content">
                                <h4><?= $info['Name'] ?></h4>
                                <div class="p3blg_para">
                                    <p>
                                        <img src="<?= assets('img/loc.png') ?>"" alt="" /><?= $info['Location'] ?>
                                    </p>
                                </div>
                                <div class="p3blg_para_two">
                                    <div class="p3blg_para_two_left">
                                        <img src="<?= assets('img/home.png') ?>"" alt="" />
                                    </div>
                                    <div class="p3blg_para_two_right">
                                        <p><?= $info['Characteristics'] ?></p>
    <!--                                    <p>270 หน่วย แบ่งเป็น</p>
                                        <p>บ้านแฝดชั้นเดียว 86 หน่วย</p>
                                        <p>บ้านสองชั้น 184 หน่วย</p>-->
                                    </div>
                                </div>
                                <div class="p3blg_link text-center">
                                    <a href="<?= base_url_lang(lang('url_lang.projects') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>"><?= lang('global_lang.view_detail') ?></a>
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
</section>
<!-- p3blog area end -->