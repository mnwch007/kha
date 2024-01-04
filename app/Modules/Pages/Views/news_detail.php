<!-- p6heading area start -->
<section id="p6heading" class="wow fadeIn">
    <div class="container">
        <div class="p6heading_wrapper">
            <div class="p6heading_back text-end">
                <a href="<?= base_url_lang(lang('url_lang.news'), $lang_url) ?>"
                   ><span><i class="fa-solid fa-angle-left"></i></span
                    ><?= lang('global_lang.back_news_activities') ?></a
                >
            </div>
            <div class="p6heading_para">
                <p><?= date_thai($data_info['date'], $lang_url) ?></p>
            </div>
            <div class="p6heading_text">
                <h3>
                    <?= $data_info['Name'] ?>
                </h3>
                <div class="headbar">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- p6heading area end -->

<!-- p6content area start -->
<section id="p6content" class="wow fadeIn">
    <div class="container">
        <div class="p6content_wrapper">
            <?= $data_info['Detail'] ?>
        </div>
    </div>
</section>
<!-- p6content area end -->

<!-- p6gellery area start -->

<section id="p6gellery" class="wow fadeIn">
    <div class="container">

        <?php
        foreach ($data_info['info_gallery'] as $k2 => $info2):
            ?>
            <div class="col-lg-12 col-md-12 mt-5">
                <a href="<?php echo img_path('news/' . $info2['file_path']); ?>" data-fancybox="gallery">
                    <img src="<?= img_path('news/' . $info2['file_path']) ?>" alt="" class="img-fluid"/>
    <!--                    <div class="ratio ratio-16x9" style="background:#fff url('<?= img_path('news/' . $info2['file_path']) ?>') center center no-repeat; background-size: cover;"></div>-->
                </a>
            </div>
            <?php
        endforeach;
        ?>

    </div>
</section>

<?php /* <section id="p6gellery" class="d-none d-lg-block wow fadeIn">
  <div class="container">
  <div class="p6gellery_wrapper">

  <?php
  foreach ($data_info['info_gallery'] as $k2 => $info2):
  ?>
  <div class="p6gellery_box">
  <a href="<?php echo img_path('news/' . $info2['file_path']); ?>" data-fancybox="gallery">
  <div class="ratio ratio-16x9" style="background:#fff url('<?= img_path('news/' . $info2['file_path']) ?>') center center no-repeat; background-size: cover;"></div>
  </a>
  </div>
  <?php
  endforeach;
  ?>

  </div>
  </div>
  </section>
 */ ?>
<!-- p6gellery area end -->

<?php
/*
  <section id="p6smgellary" class="mt-4 d-block d-lg-none wow fadeIn">
  <div class="container">
  <div class="p6smgellery_wrapper">
  <div class="owl-carousel p6astro-slider owl-theme">
  <?php
  foreach ($data_info['info_gallery'] as $k2 => $info2):
  ?>
  <div class="item">
  <div class="p6sm_gellery_box">
  <a href="<?php echo img_path('news/' . $info2['file_path']); ?>" data-fancybox="gallery_mob">
  <div class="ratio ratio-16x9" style="background:#fff url('<?= img_path('news/' . $info2['file_path']) ?>') center center no-repeat; background-size: cover;"></div>
  </a>
  <!--                            <img src="<? img_path('news/' . $info2['file_path']) ?>" alt="" />-->
  </div>
  </div>
  <?php
  endforeach;
  ?>


  </div>
  </div>
  </div>
  </section>
 */?>