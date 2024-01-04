<!-- p3hero area start -->
<section id="p2hero">
    <img class="d-block w-100 d-none d-md-block" src="<?= img_path('projects/' . $data_info['image']) ?>"" alt="" />
    <img class="d-block w-100 d-block d-md-none" src="<?= img_path('projects/' . $data_info['image_mob']) ?>"" alt="" />
</section>
<!-- p3hero area end -->

<!-- p3slider area start -->
<div class="p3slider wow fadeIn">
    <div class="custom_container">
        <div class="row align-items-md-start align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="p3slider_left">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                            if (isset($data_info['info_gallery']) && count($data_info['info_gallery']) > 0):
                                foreach ($data_info['info_gallery'] as $k2 => $info2):
                                    ?>
                                    <div class="swiper-slide">
                                        <img class="d-block w-100" src="<?= img_path('image_gallery/' . $info2['file_path']) ?>" alt="" />
                                    </div>
                                    <?php
                                endforeach;
                            else:
                                ?>
                                <div class="swiper-slide">&nbsp;</div>
                            <?php
                            endif;
                            ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="p3slider_right">
                    <div class="minislider_right_heading">
                        <h3><?= $data_info['Name'] ?></h3>
                        <p><img src="<?= assets('img/loc.png') ?>"" alt="" /><?= $data_info['Location'] ?></p>
                        <div class="headbar">
                            <span></span>
                        </div>
                    </div>
                    <div class="p3slider_right_cnt">
                        <div class="p3slider_right_cnt_one">
                            <div class="p3slider_right_cnt_one_left">
                                <p><?= lang('global_lang.project_size') ?></p>
                            </div>
                            <div class="p3slider_right_cnt_one_right">
                                <p><?= $data_info['Area'] ?></p>
                            </div>
                        </div>
                        <div class="p3slider_right_cnt_one">
                            <div class="p3slider_right_cnt_one_left">
                                <p><?= lang('global_lang.project_characteristics') ?></p>
                            </div>
                            <div class="p3slider_right_cnt_one_right">
                                <p><?= $data_info['Characteristics'] ?></p>
 <!--                                <p>302 หน่วย แบ่งเป็น</p>
                                 <p>บ้านแฝดชั้นเดียว 94 หน่วย</p>
                                 <p>บ้านสองชั้น 208 หน่วย</p>-->
                            </div>
                        </div>
                        <div class="p3slider_right_cnt_one">
                            <div class="p3slider_right_cnt_one_left">
                                <p><?= lang('global_lang.facilities') ?></p>
                            </div>
                            <div class="p3slider_right_cnt_one_right">
                                <?php
                                if ($data_info['Facility'] != ""):
                                    $facility_arr = explode(',', $data_info['Facility']);
                                    foreach ($facility_arr as $fac_info):
                                        echo '<p>' . $fac_info . '</p>';
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        /* if ($data_info['video_active'] == 1):
          $info_project_media = $this->mainm->get_project_media($data_info['id']);
          if (is_array($info_project_media) && count($info_project_media) > 0):
          foreach ($info_project_media as $k => $v):
          ?>
          <div class="row mt-5" class="wow fadeIn">
          <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 text-center mt-2">
          <div class="ratio ratio-16x9">
          <iframe  src="<?= convertYoutube($v['file_link']) ?>" allowfullscreen></iframe>
          </div>
          </div>
          </div>
          <?php
          endforeach;
          endif;
          endif; */
        ?>


    </div>
</div>
<!-- p3slider area end -->


<!-- p3map area start -->
<section id="p3map" class="wow fadeIn">
    <div class="container">
        <div class="p3map_heading">
            <div
                class="p3map_heading_left d-flex align-items-center justify-content-between"
                >
                <div class="minislider_right_heading">
                    <h3><?= lang('global_lang.project_location') ?></h3>
                    <div class="headbar">
                        <span></span>
                    </div>
                </div>
                <div class="p3map_heading_right">
                    <ul>
                        <li class="act active" target="map1"><?= lang('global_lang.google_map') ?></li>
                        <?php
                        if ($data_info['map_image'] != ""):
                            ?>
                            <li class="act" target="map2"><?= lang('global_lang.map_image') ?></li>
                            <?php
                        endif;
                        ?>
                        <li><a href="https://www.google.com/maps?saddr=My current location&daddr=<?php echo $data_info['lat']; ?>,<?php echo $data_info['lng']; ?>" target="_blank"><?= lang('global_lang.request_route') ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="p3map_img mt-4">
        <div class="p3map_one" id="map1">
            <?php
            if ($data_info['map_code'] != ""):
                echo $data_info['map_code'];
            endif;
            ?>
            <!--            <img class="d-block w-100" src="<?= assets('img/map1.png') ?>"" alt="" />           -->
        </div>
        <?php
        if ($data_info['map_image'] != ""):
            ?>
            <div class="p3map_one" id="map2">
                <img class="d-block w-100" src="<?= img_path('projects/' . $data_info['map_image']) ?>" alt="" />
            </div>
            <?php
        endif;
        ?>
        <!--        <div class="p3map_one" id="map3">
                    <img class="d-block w-100" src="<?= assets('img/map3.png') ?>"" alt="" />
                </div>-->
    </div>
</section>
<!-- p3map area end -->



<?php
if ($data_info['video_active'] == 1):
    $info_project_media = $this->mainm->get_project_media($data_info['id'], $lang_url);
    if (is_array($info_project_media) && count($info_project_media) > 0):
        ?>
        <section id="p2video" class="wow fadeIn">
            <div class="container">
                <div class="p2video_wrapper">
                    <div class="owl-carousel video-slider2 owl-theme">

                        <?php
                        foreach ($info_project_media as $k => $v):
                            ?>
                            <div class="item">
                                <div class="video_one">
                                    <div class="row g-5">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="video_one_left">
                                                <iframe
                                                    height="315"
                                                    src="<?= convertYoutube($v['file_link']) ?>"
                                                    title="<?= $v['Name'] ?>"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen
                                                    ></iframe>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="video_one_right">
                                                <h3><?= $v['Name'] ?></h3>
                                                <div class="headbar">
                                                    <span></span>
                                                </div>
                                                <p><?= $v['Detail'] ?></p>
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
        </section>

        <?php
    endif;
endif;
?>
<!-- p3progress area start -->
<?php
if ($data_info['progress_active'] == 1):
    $info_project_progress = $this->mainm->get_project_progress($data_info['id'], $lang_url);
    $info_project_progress_work = $this->mainm->get_project_progress_work($data_info['id'], $lang_url);
    ?>
    <section id="p3progress" class="wow fadeIn">
        <div class="container">
            <div class="p3progress_heading">
                <div class="minislider_right_heading">
                    <h3><?= lang('global_lang.project_progress') ?></h3>
                    <div class="headbar">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="p3progress_wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="p3progress_left">
                            <div class="p3progress_left_slider">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">

                                        <?php
                                        $info_progressimg = $this->mainm->get_progressimgitem($data_info['id']);
                                        foreach ($info_progressimg as $k2 => $info2):
                                            ?>
                                            <div class="swiper-slide">
                                                <img class="d-block w-100" src="<?= img_path('progress/' . $info2['file_path']) ?>" alt="" />
                                            </div>
                                            <?php
                                        endforeach;
                                        ?>
                                        <!--                                        <div class="swiper-slide">
                                                                                    <img class="d-block w-100" src="<?= assets('img/mini1.png') ?>"" alt="" />
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <img class="d-block w-100" src="<?= assets('img/mini1.png') ?>"" alt="" />
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <img class="d-block w-100" src="<?= assets('img/mini1.png') ?>"" alt="" />
                                                                                </div>-->

                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="p3progress_bar">
                                    <?php
                                    if (is_array($info_project_progress_work) && count($info_project_progress_work) > 0):
                                        foreach ($info_project_progress_work as $k => $v):
                                            ?>
                                            <div class="p3bar_one">
                                                <div class="p3bar_one_base">
                                                    <span style="width: <?= $v['work_pc'] ?>%;"></span>
                                                </div>
                                                <p><strong><?= $v['work_pc'] ?>%</strong> <?= $v['Name'] ?></p>
                                            </div>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                    <?php /* <div class="p3bar_one">
                                      <div class="p3bar_one_base">
                                      <span style="width: <?= $info_project_progress['struc_pc'] ?>%;"></span>
                                      </div>
                                      <p><strong><?= $info_project_progress['struc_pc'] ?>%</strong> <?= lang('global_lang.construction') ?></p>
                                      </div>
                                      <div class="p3bar_one p3bar_two">
                                      <div class="p3bar_one_base">
                                      <span style="width: <?= $info_project_progress['system_pc'] ?>%;"></span>
                                      </div>
                                      <p><strong><?= $info_project_progress['system_pc'] ?>%</strong> <?= lang('global_lang.system') ?></p>
                                      </div>
                                      <div class="p3bar_one p3bar_three">
                                      <div class="p3bar_one_base">
                                      <span style="width: <?= $info_project_progress['desi_pc'] ?>%;"></span>
                                      </div>
                                      <p><strong><?= $info_project_progress['desi_pc'] ?>%</strong> <?= lang('global_lang.architectures') ?></p>
                                      </div> */ ?>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="p3progress_right_slider">
    <!--                        <img class="d-block w-100" src="<?= assets('img/50.png') ?>"" alt="" />-->
                            <div id="pie-me" class="pie-title-center" data-percent="<?php echo $info_project_progress['total_pc']; ?>" style="position: relative;"> <span class="pie-value" style="position: absolute;top: 43%;left: 0;right: 0;"></span> </div>

                            <?php
                            if ($info_project_progress['update_date'] != ""):
                                ?>
                                <p><?= lang('global_lang.latest_update') ?> <?= $info_project_progress['update_date'] ?></p> 
                                <?php
                            endif;
                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <?php
endif;
?>
<!-- p3progress area end -->

<?php echo view('_project_other') ?>
