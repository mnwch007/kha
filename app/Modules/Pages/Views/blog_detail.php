<section id="p2_hero" <?= (isset($info_data['BgColor']) && $info_data['BgColor'] != "" ? 'style="background-color:' . $info_data['BgColor'] . '"' : '') ?>>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 order-2 order-md-1 d-flex align-items-center justify-content-between">
                <div class="p2_hero_left wow fadeInUp">
                    <p id="date"><?= dateFormat($info_data['BlogDate'], 'd M Y') ?></p>
                    <h2 <?= (isset($info_data['FontColorTitle']) && $info_data['FontColorTitle'] != "" ? 'style="color:' . $info_data['FontColorTitle'] . '"' : '') ?>><?= isset_arr('Name', $info_data) ?></h2>
                    <p <?= (isset($info_data['FontColorDetail']) && $info_data['FontColorDetail'] != "" ? 'style="color:' . $info_data['FontColorDetail'] . '"' : '') ?>>
                        <?= isset_arr('ShortDes', $info_data) ?>
                    </p>
                </div>
            </div>
            <div class="col-md-6 order-1 order-md-2">
                <div class="p2_hero_right">
                    <?php
                    if (isset($info_data['ImgBanner']) && $info_data['ImgBanner'] != ""):
                        ?>
                        <img src="<?= STOCK_URL . $info_data['ImgBanner'] ?>" alt="" />
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- p5_hero area end -->


<!-- p14blog area start -->
<section id="p14blog" class="wow fadeIn">
    <div class="container">
        <div class="p14blog_wrapper">
            <div class="row">
                <div class="col-lg-7">
                    <div class="p14blog_left">
                        <?= htmlspecialchars_decode($info_data['Detail']) ?>
                        <?php
                        if (isset($info_data['Tag']) && $info_data['Tag'] != ""):
                            ?>
                            <div class="p13filter_button p14filter_button">
                                <ul>
                                    <?php
                                    $exp_kw = explode(',', $info_data['Tag']);
                                    foreach ($exp_kw as $k => $kw):
                                        ?>
                                        <li class=""><a href="javascript:;"><?= $kw ?></a></li>
                                        <?php
                                    endforeach;
                                    ?>
                                    <!--                                    <li>All</li>
                                   <li class="activetab">Fashion</li>
                                   <li>Curtains</li>-->
                                </ul>
                            </div>
                            <?php
                        endif;
                        ?>
                        <!--                        <div class="p13filter_button p14filter_button">
                                                    <ul>
                                                        <li>All</li>
                                                        <li class="activetab">Fashion</li>
                                                        <li>Curtains</li>
                                                    </ul>
                                                </div>-->


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- p14blog area end -->

<?php echo view('_blog_other') ?>