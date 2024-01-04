<!-- p3hero area start -->
<section id="p3hero">
    <div class="p3hero_wrapper">
        <div class="row g-0">
            <div class="col-xl-7 col-lg-6">
                <div class="p3hero_left">
                    <div class="zoomed_pic">
                        <img id="pic" src="<?= ((isset($info_data['info_color'][0]['WebPhotos']) && $info_data['info_color'][0]['WebPhotos'] != "") ? STOCK_URL . $info_data['info_color'][0]['WebPhotos'] : assets('img/no-image.png')) ?>" class="feature-image" />

                        <button id="zoombutton">
                            <img src="<?= assets('img/zoom.png') ?>" alt="" />
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="p3hero_right">
                    <div class="p3hero_right_heading">
                        <div class="p3hero_right_heading_left">
                            <h3><?= get_pcode_lang($info_data, $lang_url) ?></h3>
                            <p><span><?= (!empty($info_data['PWidth']) ? $info_data['PWidth'] . '"' : '') ?></span>&nbsp;<?= get_pname_lang($info_data, $lang_url) ?></p>
                            <p>
                                <span id="colorName"><?= (isset($info_data['info_color'][0]['WebName']) ? $info_data['info_color'][0]['WebName'] : '') ?> </span><?php /* - <?= lang('global_lang.pcode') ?>
  <span id="colorCode"> <?= $info_data['PCode'] ?></span> */ ?>
                            </p>
                        </div>

                        <?php /* <div class="p3hero_right_heading_right">
                          <ul>
                          <li>
                          <a href="#"
                          ><span><i class="fa-regular fa-heart"></i></span
                          ></a>
                          </li>-
                          <li>
                          <a href="#"><i class="fa-solid fa-share-nodes"></i></a>
                          </li>
                          </ul>
                          </div> */ ?>

                    </div>
                    <div class="p3hero_right_color">
                        <?php
                        if (isset($info_data['info_color']) && is_array($info_data['info_color'])):
                            foreach ($info_data['info_color'] as $k2 => $v2):
                                ?>
                                <div class="p3hro_right_color_box <?= ($k2 == 0 ? 'selected' : '') ?> text-center">
                                    <span style="background-image:url('<?= STOCK_URL . $v2['WebPhotos'] ?>');background-size: cover;" change_src="<?= ($v2['WebPhotos'] != "" ? STOCK_URL . $v2['WebPhotos'] : assets('img/no-image.png')) ?>"></span>
                                    <p color_code="<?= $info_data['PCode'] ?>"><?= $v2['WebName'] ?></p>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>

                        <?php /* <div class="p3hro_right_color_box selected text-center">
                          <span change_src="<?= assets('img/bs1.png') ?>"></span>
                          <p color_code="#A5C9D0">Light <br />Blue</p>
                          </div>


                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_two text-center"
                          >
                          <span change_src="<?= assets('img/bs2.png') ?>"></span>
                          <p color_code="#AFC0D0">
                          Harvest <br />
                          Gold
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_three text-center"
                          >
                          <span change_src="<?= assets('img/bs3.png') ?>"></span>
                          <p color_code="#B3876D">
                          Green <br />
                          Olive
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_four text-center"
                          >
                          <span change_src="<?= assets('img/bs4.png') ?>"></span>
                          <p color_code="#86A4A9">
                          Dark <br />
                          Spring
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_five text-center"
                          allow="notallowed"
                          >
                          <span change_src="<?= assets('img/bs5.png') ?>"></span>
                          <img src="<?= assets('img/notallowed.png') ?>" alt="" />
                          <p color_code="#6E8CEE">Aquamarine</p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_six text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#A8CDD4">
                          Coral <br />
                          Peach
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_seven text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#B2C3D3">
                          Black <br />
                          Ink
                          </p>
                          </div>
                          <div class="p3hro_right_color_box text-center">
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#A5C9D0">
                          Light <br />
                          Blue
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_two text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#AFC0D0">
                          Harvest <br />
                          Gold
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_three text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#B3876D">
                          Green <br />
                          Olive
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_four text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#86A4A9">
                          Dark <br />
                          Spring
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_five text-center"
                          allow="notallowed"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <img src="<?= assets('img/notallowed.png') ?>" alt="" />
                          <p color_code="#6E8CEE">Aquamarine</p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_six text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#A8CDD4">
                          Coral <br />
                          Peach
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_seven text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#B2C3D3">
                          Black <br />
                          Ink
                          </p>
                          </div>
                          <div class="p3hro_right_color_box text-center">
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#A5C9D0">
                          Light <br />
                          Blue
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_two text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#AFC0D0">
                          Harvest <br />
                          Gold
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_three text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#B3876D">
                          Green <br />
                          Olive
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_four text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#86A4A9">
                          Dark <br />
                          Spring
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_five text-center"
                          allow="notallowed"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <img src="<?= assets('img/notallowed.png') ?>" alt="" />
                          <p color_code="#6E8CEE">Aquamarine</p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_six text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#A8CDD4">
                          Coral <br />
                          Peach
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_seven text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#B2C3D3">
                          Black <br />
                          Ink
                          </p>
                          </div>
                          <div class="p3hro_right_color_box text-center">
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#A5C9D0">
                          Light <br />
                          Blue
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_two text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#AFC0D0">
                          Harvest <br />
                          Gold
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_three text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#B3876D">
                          Green <br />
                          Olive
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_four text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#86A4A9">
                          Dark <br />
                          Spring
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_five text-center"
                          allow="notallowed"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <img src="<?= assets('img/notallowed.png') ?>" alt="" />
                          <p color_code="#6E8CEE">Aquamarine</p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_six text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#A8CDD4">
                          Coral <br />
                          Peach
                          </p>
                          </div>
                          <div
                          class="p3hro_right_color_box p3hro_right_color_box_seven text-center"
                          >
                          <span change_src="<?= assets('img/kak.png') ?>"></span>
                          <p color_code="#B2C3D3">
                          Black <br />
                          Ink
                          </p>
                          </div>
                         */ ?>

                    </div>
                    <div class="p3cloth_details">
                        <div class="p3cloth_details_left">
                            <h4><?= get_pcode_lang($info_data, $lang_url) ?> <?= (!empty($info_data['PWidth']) ? $info_data['PWidth'] . '”' : '') ?> - <span id="colorName2"><?= (isset($info_data['info_color'][0]['WebName']) ? $info_data['info_color'][0]['WebName'] : '') ?></span></h4>
                        </div>
                        <div class="p3cloth_details_right text-end">
                            <p><span><?= lang('global_lang.retail') ?></span> ฿ <?= decimal_null_web($info_data['SPrice3'], 2); ?> / <?= lang('global_lang.' . $info_data['Unit']) ?></p>
                            <p><span><?= lang('global_lang.wholesale') ?></span> ฿ <?= decimal_null_web($info_data['SPrice2'], 2); ?> / <?= lang('global_lang.' . $info_data['Unit']) ?></p>
                        </div>
                    </div>

                    <?php /* <div class="p3cloth_select">
                      <div class="p3cloth_select_left_wrapper">
                      <div class="p3cloth_select_left">
                      <p>Choose Roll</p>
                      <select>
                      <option>Roll 35 yards</option>
                      <option>Roll 35 yards</option>
                      <option>Roll 35 yards</option>
                      <option>Roll 35 yards</option>
                      </select>
                      </div>
                      <div class="p3cloth_select_middle">
                      <p>Quantity</p>
                      <div
                      class="quantity_box d-flex align-items-center justify-content-between"
                      >
                      <span id="number">2</span>
                      <div class="quantity_box_button">
                      <button id="plus">+</button>
                      <button id="minus">-</button>
                      </div>
                      </div>
                      </div>
                      <div class="p3cloth_select_right">
                      <p>Yards</p>
                      </div>
                      </div>
                      <div class="p3cloth_select_right_wrapper text-end">
                      <p>Total</p>
                      <h4>47,500.00</h4>
                      </div>
                      </div>
                      <div class="notInStock">
                      <p>
                      <img src="<?= assets('img/notallowed.png') ?>" alt="" />Sorry, this item is
                      currently out of stock.
                      </p>
                      </div>
                      <div
                      class="p3remark d-flex align-items-center justify-content-between"
                      >
                      <a id="remark" href="JavaScript:void(0)"
                      ><span><i class="fa-solid fa-circle-plus"></i></span>Remark</a
                      >
                      <div class="remarkInput">
                      <input type="text" placeholder="Remark" />
                      </div>
                      <a id="p3addtocart" href="#">Add to Cart</a>
                      </div>
                      <div class="p3fabric_cal">
                      <div class="p3fabric_cal_left">
                      <a href="#"
                      ><img src="<?= assets('img/cal.png') ?>" alt="" />
                      <p>
                      Fabric <br />
                      Calculator
                      </p></a
                      >
                      </div>
                      <div class="p3fabric_cal_right">
                      <p>
                      <strong>Retail Price</strong> Lorem ipsum dolor sit amet,
                      consectetur adipiscing elit. Quisque enim ex.
                      </p>
                      <p>
                      <strong>Wholesale Price</strong> dolor sit amet, consectetur
                      adipiscing elit. Quisque enim ex
                      </p>
                      <p>Color displayed may differ from the original fabrics.</p>
                      </div>
                      </div> */ ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- p3hero area end -->

<?php echo view('_sample_books_cart') ?>


<!-- p3about area start -->
<section id="p3about"  class="wow fadeIn">
    <div class="container">
        <div class="p3about_wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="p3about_left">
                        <h2><?php //lang('global_lang.about')              ?><?= get_pcode_lang($info_data, $lang_url) ?></h2>
                        <?= htmlspecialchars_decode($info_data['Detail']) ?>
                        <ul>
                            <?php
                            if (isset($info_data['SeoKeyword']) && $info_data['SeoKeyword'] != ""):
                                $seo_keyword = explode(',', $info_data['SeoKeyword']);
                                foreach ($seo_keyword as $kw):
                                    ?>
                                    <li><a href="javascript:;"><?= $kw ?></a></li>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p3about_right d-none d-lg-block">
                        <h2><?= lang('global_lang.applications') ?></h2>
                        <div style="display: grid;grid-template-columns: repeat(2, 1fr);">
                            <?php
                            if (isset($info_enduse)):
                                foreach ($info_enduse as $k => $v):
                                    //echo $v['Icon'];
                                    ?>
                                    <div>
                                        <img src="<?= ((isset($v['Icon']) && $v['Icon'] != "") ? STOCK_URL . $v['Icon'] : assets('img/no-image.png')) ?>" style="display: block;width: 100%;"/>
                                    </div>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- p3about area end -->
<?php echo view('_other_product') ?>