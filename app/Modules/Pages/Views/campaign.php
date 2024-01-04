

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
<form id="frmSearchMob" name="frmSearchMob" method="post" action="<?= current_url() . (!empty($url_query_set) ? '?' . $url_query_set : ''); ?>">
    <input type="hidden" name="mode" id="mode" value="search">


    <?php
    $sprice_slide = 0;
    $eprice_slide = 500;
    //if ((isset($search['SPriceWhs']) && $search['SPriceWhs'] == 1)):
    if (isset($info_price_whs)):
        $exp_price = explode(',', $info_price_whs);
        $sprice_slide = $exp_price[0];
        $eprice_slide = $exp_price[1];
    endif;
    //else:
    if (isset($info_price_retail)):
        $exp_price = explode(',', $info_price_retail);
        if ($exp_price[0] < $sprice_slide):
            $sprice_slide = $exp_price[0];
        endif;
        if ($exp_price[1] > $eprice_slide):
            $eprice_slide = $exp_price[1];
        endif;
    endif;
    //endif;
    ?>


    <div class="p2mobile_check" id="p2filter_mobile">
        <div class="container">
            <div class="p2mobile_check_wrapper">
                <div class="p2mobile_check_top">
                    <div class="p2mobile_check_heading">
                        <h3><?= lang('global_lang.filter') ?></h3>
                        <button id="close_filter">
                            <img src="<?= assets('img/close.png') ?>" alt="" />
                        </button>
                    </div>
                    <div class="m_cata">
                        <h4><?= lang('global_lang.category') ?></h4>
                        <div class="m_cata_wrapper">

                            <div class="m_cata_wrapper_left">
                                <?php
                                $category_arr = $this->mainm->get_web_category(1, $lang_url);
                                foreach ($category_arr as $key => $info):
                                    $check = (is_array($search['SCate']) && in_array($info['ID'], $search['SCate'])) ? 'checked' : '';
                                    ?>
                                    <div class="p2filter_drop_one_block">
                                        <label class="check-box"><?= $info['Name'] ?><input type="checkbox" name="SCate[]" value="<?= $info['ID'] ?>" <?= $check ?>/><span class="checkmark"></span></label>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="m_cata">
                        <h4><?= lang('global_lang.characteristics') ?></h4>
                        <div class="m_cata_wrapper">
                            <div class="m_cata_wrapper_left">
                                <?php
                                $category_arr = $this->mainm->get_web_characters(1, $lang_url);
                                foreach ($category_arr as $key => $info):
                                    $check = (is_array($search['SCharecter']) && in_array($info['ID'], $search['SCharecter'])) ? 'checked' : '';
                                    ?>
                                    <div class="p2filter_drop_one_block">
                                        <label class="check-box"><?= $info['Name'] ?><input type="checkbox" name="SCharecter[]" value="<?= $info['ID'] ?>" <?= $check ?>/><span class="checkmark"></span></label>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="m_cata m_color">
                        <h4><?= lang('global_lang.color') ?></h4>
                        <div class="m_cata_wrapper">
                            <div class="m_cata_wrapper_left">
                                <?php
                                $category_arr = $this->mainm->get_web_color(1, $lang_url);
                                foreach ($category_arr as $key => $info):
                                    $check = (is_array($search['SColor']) && in_array($info['ID'], $search['SColor'])) ? 'checked' : '';
                                    ?>
                                    <div class="p2filter_drop_one_block m_checkbg_one">
                                        <label class="check-box"><?= $info['Name'] ?>
                                            <input type="checkbox" name="SColor[]" value="<?= $info['ID'] ?>" <?= $check ?>/>
                                            <span class="checkmark" style="background-image:url('<?= STOCK_URL . $info['Photo4'] ?>');background-size: cover;"></span>
                                        </label>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="m_range">
                        <h4><?= lang('global_lang.price_range') ?></h4>
                        <div class="drop_four_left">
                            <input 
                                data-addui="slider"
                                data-min="<?= $sprice_slide ?>"
                                data-max="<?= $eprice_slide ?>"
                                data-formatter="usd"
                                data-step="0.05"
                                data-range="true"
                                value="<?= isset_arr('SPrice1', $search) ?>,<?= isset_arr('SPrice2', $search) ?>"
                                name="SPrice"
                                />
                            <div class="rangeValue d-flex align-items-center justify-content-between">
                                <p><?= $sprice_slide ?></p>
                                <p id="max"><?= $eprice_slide ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="m_cata">
                        <h4><?= lang('global_lang.sort_by') ?></h4>
                        <div class="m_cata_wrapper">
                            <div class="m_cata_wrapper_left" style="width: 100%">
                                <div class="p2filter_drop_one_block">
                                    <label class="check-box"><?= lang('global_lang.price_low_to_high') ?>
                                        <input type="checkbox" name="SPriceLowHigh" value="1" <?= (isset($search['SPriceLowHigh']) && $search['SPriceLowHigh'] == 1) ? 'checked' : '' ?> />
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="p2filter_drop_one_block">
                                    <label class="check-box"><?= lang('global_lang.price_high_to_low') ?>
                                        <input type="checkbox" name="SPriceHighLow" value="1" <?= (isset($search['SPriceHighLow']) && $search['SPriceHighLow'] == 1) ? 'checked' : '' ?>/>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <?php /* <div class="p2filter_drop_one_block">
                                  <label class="check-box"><?= lang('global_lang.new_arrivals') ?>
                                  <input type="checkbox" name="SNew" value="1" <?= (isset($search['SNew']) && $search['SNew'] == 1) ? 'checked' : '' ?>/>
                                  <span class="checkmark"></span>
                                  </label>
                                  </div> */ ?>

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

<!-- p2filter area start -->
<form id="frmSearch" name="frmSearch" method="post" action="<?= current_url() . (!empty($url_query_set) ? '?' . $url_query_set : ''); ?>">
    <input type="hidden" name="mode" id="mode" value="search">

    <section id="p2filter" class="d-none d-lg-block wow fadeIn">
        <div class="container">
            <div class="p2filter_wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="p2filter_left">
                            <ul>
                                <li will_open="drop_one">
                                    <?= lang('global_lang.category') ?>
                                    <span><i class="fa-solid fa-chevron-down"></i></span>
                                </li>
                                <li will_open="drop_two">
                                    <?= lang('global_lang.characteristic') ?>
                                    <span><i class="fa-solid fa-chevron-down"></i></span>
                                </li>
                                <li will_open="drop_three">
                                    <?= lang('global_lang.color') ?>
                                    <span><i class="fa-solid fa-chevron-down"></i></span>
                                </li>
                                <li will_open="drop_four">
                                    <?= lang('global_lang.price_range') ?>
                                    <span><i class="fa-solid fa-chevron-down"></i></span>
                                </li>
                                <li will_open="drop_five">
                                    <?= lang('global_lang.sort_by') ?>
                                    <span><i class="fa-solid fa-chevron-down"></i></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p2filter_right text-end d-flex align-items-center justify-content-end">
                            <ul>
                                <li id="apply_filter"><?= lang('global_lang.apply_filter') ?></li>
                                <li id="clear_filter"><a href="<?= current_url() . (!empty($url_query_set) ? '?' . $url_query_set : ''); ?>"><?= lang('global_lang.clear_filter') ?></a></li>
                            </ul>
                            <p><?= lang('global_lang.found') ?> <?= number_format($total_records) ?> <?= lang('global_lang.items') ?></p>
                        </div>
                    </div>
                </div>

                <div class="p2_filter_drop_one" id="drop_one">
                    <div class="p2filter_drop_one_wrapper">
                        <?php
                        $category_arr = $this->mainm->get_web_category(1, $lang_url);
                        foreach ($category_arr as $key => $info):
                            $check = (is_array($search['SCate']) && in_array($info['ID'], $search['SCate'])) ? 'checked' : '';
                            ?>
                            <div class="p2filter_drop_one_block"><label class="check-box"><?= $info['Name'] ?><input type="checkbox" name="SCate[]" value="<?= $info['ID'] ?>" <?= $check ?>/><span class="checkmark"></span></label></div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="p2_filter_drop_one" id="drop_two">
                    <div class="p2filter_drop_one_wrapper">
                        <?php
                        $category_arr = $this->mainm->get_web_characters(1, $lang_url);
                        foreach ($category_arr as $key => $info):
                            $check = (is_array($search['SCharecter']) && in_array($info['ID'], $search['SCharecter'])) ? 'checked' : '';
                            ?>
                            <div class="p2filter_drop_one_block"><label class="check-box"><?= $info['Name'] ?><input type="checkbox" name="SCharecter[]" value="<?= $info['ID'] ?>" <?= $check ?>/><span class="checkmark"></span></label></div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="p2_filter_drop_one" id="drop_three">
                    <div class="p2filter_drop_one_wrapper">

                        <?php
                        $category_arr = $this->mainm->get_web_color(1, $lang_url);
                        foreach ($category_arr as $key => $info):
                            $check = (is_array($search['SColor']) && in_array($info['ID'], $search['SColor'])) ? 'checked' : '';
                            ?>
                            <div class="p2filter_drop_one_block" id="check_one">
                                <label class="check-box"><input type="checkbox" name="SColor[]" value="<?= $info['ID'] ?>" <?= $check ?>/>
                                    <span class="checkmark" style="background-image:url('<?= STOCK_URL . $info['Photo4'] ?>');background-size: cover;"></span>
                                </label>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="p2_filter_drop_one" id="drop_four">
                    <div class="drop_four_wrapper">
                        <div class="row">
                            <?php /* <div class="col-lg-6">
                              <div class="drop_four_left">
                              <input
                              data-addui="slider"
                              data-min="55"
                              data-formatter="usd"
                              data-step="0.05"
                              data-range="true"
                              value="<?= $search['SPrice1'] ?>,<?= $search['SPrice2'] ?>"
                              name="SPrice"
                              />
                              <div
                              class="rangeValue d-flex align-items-center justify-content-between"
                              >
                              <p><?= $search['SPrice1'] ?></p>
                              <p id="max"><?= $search['SPrice2'] ?></p>
                              </div>
                              </div>
                              </div>
                             */ ?>

                            <div class="col-lg-12">
                                <div class="drop_four_right">
                                    <div class="drop_four_right_left">
                                        <div class="p2filter_drop_one_block">
                                            <label class="check-box"><?= lang('global_lang.retaill_price') ?>
                                                <input type="checkbox" name="SPriceRetail" value="1" <?= (isset($search['SPriceRetail']) && $search['SPriceRetail'] == 1) ? 'checked' : '' ?>/>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="p2filter_drop_one_block">
                                            <label class="check-box"><?= lang('global_lang.wholesale_price') ?>
                                                <input type="checkbox" name="SPriceWhs" value="1" <?= (isset($search['SPriceWhs']) && $search['SPriceWhs'] == 1) ? 'checked' : '' ?>/>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="drop_four_left" style="width: 50%;">
                                        <input
                                            data-addui="slider"
                                            data-min="<?= $sprice_slide ?>"
                                            data-max="<?= $eprice_slide ?>"
                                            data-formatter="usd"
                                            data-step="0.05"
                                            data-range="true"
                                            value="<?= isset_arr('SPrice1', $search) ?>,<?= isset_arr('SPrice2', $search) ?>"
                                            name="SPrice"
                                            />
                                        <div
                                            class="rangeValue d-flex align-items-center justify-content-between"
                                            >
                                            <p><?= $sprice_slide ?></p>
                                            <p id="max"><?= $eprice_slide ?></p>
                                        </div>
                                    </div>
                                    <div class="drop_four_right_left">
                                        <div class="p2filter_drop_one_block">
                                            <label class="check-box"><?= lang('global_lang.yard') ?>
                                                <input type="checkbox" name="SYard" value="Y" <?= (isset($search['SYard']) && $search['SYard'] == 'Y') ? 'checked' : '' ?>/>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="p2filter_drop_one_block">
                                            <label class="check-box"><?= lang('global_lang.kg') ?>
                                                <input type="checkbox" name="SKg" value="Kg" <?= (isset($search['SKg']) && $search['SKg'] == 'Kg') ? 'checked' : '' ?>/>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="p2_filter_drop_one" id="drop_five">
                    <div class="p2filter_drop_one_wrapper">
                        <div class="p2filter_drop_one_block">
                            <label class="check-box"><?= lang('global_lang.price_low_to_high') ?>
                                <input type="checkbox" name="SPriceLowHigh" value="1" <?= (isset($search['SPriceLowHigh']) && $search['SPriceLowHigh'] == 1) ? 'checked' : '' ?>/>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="p2filter_drop_one_block">
                            <label class="check-box"><?= lang('global_lang.price_high_to_low') ?>
                                <input type="checkbox" name="SPriceHighLow" value="1" <?= (isset($search['SPriceHighLow']) && $search['SPriceHighLow'] == 1) ? 'checked' : '' ?>/>
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <?php /*   <div class="p2filter_drop_one_block">
                          <label class="check-box"><?= lang('global_lang.new_arrivals') ?>
                          <input type="checkbox" name="SNew" value="1" <?= (isset($search['SNew']) && $search['SNew'] == 1) ? 'checked' : '' ?>/>
                          <span class="checkmark"></span>
                          </label>
                          </div> */ ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<!-- p2filter area end -->



<!-- p2slider area start -->
<section id="p2slider" tabindex="1" class="wow fadeIn">
    <div class="container">

        <?php
        if ($total_records > 0):
            ?>
            <div class="p2slider_wrapper">
                <div class="p2_slider_wrapper">

                    <?php
                    foreach ($info_detail as $key => $info):
                        ?>
                        <div class="p2_slider_one">
                            <div class="best_slider_inner content_wrapper">
                                <?php
                                if (isset($info_color[$info['PCID']]) && is_array($info_color[$info['PCID']])):
                                    if (isset($info_color[$info['PCID']][0]['WebPhotos'])):
                                        ?>
                                        <a href="<?= base_url_lang(lang('url_lang.fabrics') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>"><img id="bsImg" src="<?= ($info_color[$info['PCID']][0]['WebPhotos'] != "" ? STOCK_URL . $info_color[$info['PCID']][0]['WebPhotos'] : assets('img/no-image.png')) ?>" alt="" /></a>
                                        <?php
                                    else:
                                        ?>
                                        <a href="<?= base_url_lang(lang('url_lang.fabrics') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>"><img id="bsImg" src="<?= assets('img/no-image.png') ?>" alt="" /></a>
                                    <?php
                                    endif;
                                else:
                                    ?>
                                    <a href="<?= base_url_lang(lang('url_lang.fabrics') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>"><img id="bsImg" src="<?= assets('img/no-image.png') ?>" alt="" /></a>
                                <?php
                                endif;
                                ?>
                                <div class="slider_inner_content">
                                    <div class="best_slider_inner_heading">
                                        <div class="best_slider_inner_heading_left">
                                            <h5><a href="<?= base_url_lang(lang('url_lang.fabrics') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>"><?= get_pcode_lang($info, $lang_url) ?></a></h5>
                                            <p><?= get_pname_lang($info, $lang_url) ?></p>
                                        </div>
                                        <div class="best_slider_inner_heading_right"> 
                                            <p><?= (!empty($info['PWidth']) ? $info['PWidth'] . '"' : '') ?></p>
                                        </div>
                                    </div>
                                    <div class="slider_color_varient">
                                        <ul>
                                            <?php
                                            if (isset($info_color[$info['PCID']]) && is_array($info_color[$info['PCID']])):
                                                $num_color = count($info_color[$info['PCID']]);
                                                foreach ($info_color[$info['PCID']] as $k2 => $v2):
                                                    ?>
                                                    <li class="color_vari">
                                                        <button class="<?= ($k2 == 0 ? 'bsactive' : '') ?>" imgsrc="<?= ($v2['WebPhotos'] != "" ? STOCK_URL . $v2['WebPhotos'] : assets('img/no-image.png') ) ?>">
                                                            <span style="background-image:url('<?= STOCK_URL . $v2['WebPhotos'] ?>');background-size: cover;"></span>
                                                        </button>
                                                    </li>
                                                    <?php
                                                    if ($k2 == 4):
                                                        break 1;
                                                    endif;
                                                endforeach;

                                                if ($num_color > 5):
                                                    ?>
                                                    <li class="color_link">
                                                        <a href="<?= base_url_lang(lang('url_lang.fabrics') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>"><span>+<?= number_format($num_color) ?></span></a>
                                                    </li>                
                                                    <?php
                                                endif;
                                            endif;
                                            ?>

                                        </ul>
                                    </div>
                                    <div class="slider_favorite">
                                        <div class="sf_left">
        <!--                                        <span><i class="fa-regular fa-heart"></i></span>-->
                                        </div>
                                        <div class="sf_right text-end">
                                            <p><span><?= lang('global_lang.retail') ?></span>฿ <?= decimal_null_web($info['SPrice3'], 2); ?> / <?= lang('global_lang.' . $info['Unit']) ?></p>
                                            <p><span><?= lang('global_lang.wholesale') ?></span>฿ <?= decimal_null_web($info['SPrice2'], 2); ?> / <?= lang('global_lang.' . $info['Unit']) ?></p>
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
            <?php
        else:
            ?>
            <div class="text-center"><?= lang('global_lang.not_found') ?></div>
        <?php
        endif;
        ?>

        <div class="p2loader text-center" style="display: none;">
            <ul>
                <li><a href="#"><span></span></a></li>
                <li><a href="#"><span></span></a></li>
                <li><a href="#"><span></span></a></li>
            </ul>
        </div>


    </div>
</section>
<!-- p2slider area end -->
<input type="hidden" id="chk_p2slider_action" value="<?= ((isset($search['mode']) && $search['mode'] == 'search') ? 1 : 0) ?>">
<input type="hidden" name="en_price_retail" id="en_price_retail" value="<?= $info_price_retail ?>"/>
<input type="hidden" name="en_price_whs" id="en_price_whs" value="<?= $info_price_whs ?>"/>