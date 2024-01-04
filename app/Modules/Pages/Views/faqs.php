<!-- p5_hero area start -->
<section id="p2_hero" <?= (isset($info_data['BgColor']) && $info_data['BgColor'] != "" ? 'style="background-color:' . $info_data['BgColor'] . '"' : '') ?>>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 order-2 order-md-1 d-flex align-items-center justify-content-between">
                <div class="p2_hero_left">
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

<!-- p15testi area start -->
<section id="p16testi">
    <div class="container">
        <div class="accordion" id="accordionExample">

            <?php
            foreach ($info_detail as $key => $info):
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading_<?= $key ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $key ?>" aria-expanded="false" aria-controls="collapse<?= $key ?>" fdprocessedid="woite9">
                            <?= $info['Title'] ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="heading_<?= $key ?>" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            <p><?= $info['Detail'] ?></p>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
            ?>

    </div>
</section>
<!-- p15testi area end -->