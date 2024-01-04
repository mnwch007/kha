<!-- p5_hero area start -->
<section id="p2_hero" <?= (isset($info_data['BgColor']) && $info_data['BgColor'] != "" ? 'style="background-color:' . $info_data['BgColor'] . '"' : '') ?>>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 order-2 order-md-1 d-flex align-items-center justify-content-between">
                <div class="p2_hero_left wow fadeInUp">
                    <h2 <?= (isset($info_data['FontColorTitle']) && $info_data['FontColorTitle'] != "" ? 'style="color:' . $info_data['FontColorTitle'] . '"' : '') ?>><?= isset_arr('Name', $info_data) ?></h2>
                    <p <?= (isset($info_data['FontColorDetail']) && $info_data['FontColorDetail'] != "" ? 'style="color:' . $info_data['FontColorDetail'] . '"' : '') ?>>
                        <?= isset_arr('Detail', $info_data) ?>
                    </p>
                </div>
            </div>
            <div class="col-md-6 order-1 order-md-2">
                <div class="p2_hero_right">
                    <?php
                    $bimg_arr = [];
                    if (isset($info_data['Photo1']) && $info_data['Photo1'] != ""):
                        $bimg_arr[] = $info_data['Photo1'];
                    endif;
                    if (isset($info_data['Photo2']) && $info_data['Photo2'] != ""):
                        $bimg_arr[] = $info_data['Photo2'];
                    endif;
                    if (isset($info_data['Photo3']) && $info_data['Photo3'] != ""):
                        $bimg_arr[] = $info_data['Photo3'];
                    endif;

                    if (count($bimg_arr) > 0):
                        ?>
                        <img src="<?= STOCK_URL . $bimg_arr[array_rand($bimg_arr)] ?>" alt="" />
                        <?php
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- p5_hero area end -->

<!-- p2mobile_filter area start -->
<section id="p2mobile_filter" class="d-block d-lg-none">
    <div class="container">
        <div class="p2mobile_filter_wrapper d-flex align-items-center justify-content-between">
            <p><?= lang('global_lang.found') ?> <?= number_format($total_records) ?> <?= lang('global_lang.items') ?></p>
            <button id="mobile_filter">
                <img src="<?= assets('img/filter.png') ?>" alt="" />
            </button>
        </div>
    </div>
</section>
<!-- p2mobile_filter area end -->

<!-- p2mobile_check area start -->
<form id="frmSearchMob" name="frmSearchMob" method="post" action="<?= current_url(); ?>">
    <input type="hidden" name="mode" id="mode" value="search">
    <div class="p2mobile_check" id="p2filter_mobile">
        <div class="container">
            <div class="p2mobile_check_wrapper p5mobile_check">
                <div class="p2mobile_check_top">
                    <div class="p2mobile_check_heading">
                        <h3><?= lang('global_lang.filter') ?></h3>
                        <button id="close_filter">
                            <img src="<?= assets('img/close.png') ?>" alt="" />
                        </button>
                    </div>
                    <div class="m_cata">
                        <h4><?= lang('global_lang.sort_by') ?></h4>
                        <div class="m_cata_wrapper d-block">
                            <div class="m_cata_wrapper_left w-100">
                                <div class="p2filter_drop_one_block">
                                    <label class="check-box"><?= lang('global_lang.new_to_old') ?>
                                        <input type="checkbox" name="chkNewOld" value="1" <?= (isset($search['chkNewOld']) && $search['chkNewOld'] == 1) ? 'checked' : '' ?>/>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="p2filter_drop_one_block">
                                    <label class="check-box"><?= lang('global_lang.old_to_new') ?>
                                        <input type="checkbox" name="chkOldNew" value="1" <?= (isset($search['chkOldNew']) && $search['chkOldNew'] == 1) ? 'checked' : '' ?>/>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p2mobile_check_bottom">
                    <ul>
                        <li><a href="javascript:;" id="apply_filter_mob"><?= lang('global_lang.apply_filter') ?></a></li>
                        <li><a href="<?= current_url(); ?>"  id="clear_filter_mob"><?= lang('global_lang.clear_filter') ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- p2mobile_check area end -->

<!-- p5filter area start -->
<form id="frmSearch" name="frmSearch" method="post" action="<?= current_url(); ?>">
    <input type="hidden" name="mode" id="mode" value="search">
    <section id="p2filter" class="d-none d-lg-block wow fadeIn">
        <div class="container">
            <div class="p2filter_wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="p5filter d-flex align-items-center">
                            <div class="p2filter_left">
                                <ul>
                                    <li will_open="drop_one"><?= lang('global_lang.sort_by') ?><span><i class="fa-solid fa-chevron-down"></i></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div
                            class="p2filter_right text-end d-flex align-items-center justify-content-end"
                            >
                            <ul>
                                <li><a href="javascript:;" id="apply_filter"><?= lang('global_lang.apply_filter') ?></a></li>
                                <li><a href="<?= current_url(); ?>"  id="clear_filter"><?= lang('global_lang.clear_filter') ?></a></li>
                            </ul>
                            <p><?= lang('global_lang.found') ?> <?= number_format($total_records) ?> <?= lang('global_lang.items') ?></p>
                        </div>
                    </div>
                </div>
                <div class="p2_filter_drop_one" id="drop_one">
                    <div class="p2filter_drop_one_wrapper">
                        <div class="p2filter_drop_one_block">
                            <label class="check-box"><?= lang('global_lang.new_to_old') ?>
                                <input type="checkbox" name="chkNewOld" value="1" <?= (isset($search['chkNewOld']) && $search['chkNewOld'] == 1) ? 'checked' : '' ?>/>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="p2filter_drop_one_block">
                            <label class="check-box"><?= lang('global_lang.old_to_new') ?>
                                <input type="checkbox" name="chkOldNew" value="1" <?= (isset($search['chkOldNew']) && $search['chkOldNew'] == 1) ? 'checked' : '' ?>/>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>   
<!-- p5filter area end -->

<!-- p13filter area start -->
<section id="p13filter" class="wow fadeIn">
    <div class="container">
        <div class="p13filter_wrap">

            <?php /* <div class="p13filter_button">
              <ul>
              <li data-filter="all" class="activetab">All</li>
              <li data-filter="Fashion">Fashion</li>
              <li data-filter="Curtains">Curtains</li>
              </ul>
              </div>
             */ ?>

            <div class="p13fiter_blog">
                <?php
                foreach ($info_detail as $key => $info):
                    ?>
                    <div class="p13fiter_blog_box">
                        <a href="<?= base_url_lang(lang('url_lang.blog') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>">
                            <div class="p13blog_img">
                                <img src="<?= STOCK_URL . $info['ImgBanner'] ?>" alt="" />
                            </div>
                            <div class="p13blog_cnt">
                                <div class="p13blog_cnt_heading">
                                    <p><?= dateFormat($info['BlogDate'], 'd M Y') ?></p>
                                    <h4><?= ($lang_url == 'en' ? $info['NameEn'] : $info['NameTh']) ?></h4>
                                </div>
                                <div class="p13blog_cnt_para">
                                    <p>
                                        <?= ($lang_url == 'en' ? $info['ShortDesEn'] : $info['ShortDesTh']) ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                endforeach;
                ?>

            </div>
        </div>
    </div>
</section>
<!-- p13filter area end -->