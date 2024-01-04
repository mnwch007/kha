<!-- p1slider area start -->
<section id="p1slider">
    <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-bs-ride="carousel"
        >
        <div class="carousel-indicators">

            <?php
            if (count($info_banner) > 1):
                foreach ($info_banner as $key => $info):
                    ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $key ?>" class="<?= $key == 0 ? 'active' : '' ?>" <?= ($key == 0 ? 'class="active" aria-current="true"' : '') ?> aria-label="Slide <?= ($key + 1) ?>"></button>
                    <?php
                endforeach;
            endif;
            ?>
            <?php /* <button
              type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
              ></button>
              <button
              type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide-to="1"
              aria-label="Slide 2"
              ></button>
              <button
              type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide-to="2"
              aria-label="Slide 3"
              ></button>
             */ ?>
        </div>
        <div class="carousel-inner">
            <?php
            foreach ($info_banner as $key => $info):
                ?>
                <div class="carousel-item <?= ($key == 0 ? 'active' : '') ?>">
                    <?php
                    if ($info['banner_link'] != ""):
                        ?>
                        <a href="<?= $info['banner_link'] ?>">
                            <img class="d-none d-md-block" src="<?= img_path('banner/' . $info['banner_image']) ?>" class="d-block w-100" alt="..." />
                            <img class="d-block d-md-none" src="<?= img_path('banner/' . $info['banner_image_mob']) ?>" class="d-block w-100" alt="..." />
                        </a>
                        <?php
                    else:
                        ?>
                        <img class="d-none d-md-block" src="<?= img_path('banner/' . $info['banner_image']) ?>" class="d-block w-100" alt="..." />
                        <img class="d-block d-md-none" src="<?= img_path('banner/' . $info['banner_image_mob']) ?>" class="d-block w-100" alt="..." />
                    <?php
                    endif;
                    ?>

                    <div class="carousel-caption slider_text">
                        <div class="container">
                            <h5><?= $info['banner_detail'] ?></h5>
                            <h3><?= $info['banner_title'] ?></h3>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
            ?>

            <?php /*
              <div class="carousel-item active">
              <img src="<?= assets('img/sl1.png') ?>" class="d-block w-100" alt="..." />
              <div class="carousel-caption slider_text">
              <div class="container">
              <h5>สร้างบ้าน สร้างเศรษฐกิจ</h5>
              <h3>เพื่อชีวิตสุขประชา</h3>
              </div>
              </div>
              </div>
              <div class="carousel-item">
              <img src="<?= assets('img/sl2.png') ?>" class="d-block w-100" alt="..." />
              <div class="carousel-caption slider_text">
              <div class="container">
              <h5>สร้างบ้าน สร้างเศรษฐกิจ</h5>
              <h3>เพื่อชีวิตสุขประชา</h3>
              </div>
              </div>
              </div>
              <div class="carousel-item">
              <img src="<?= assets('img/sl3.png') ?>" class="d-block w-100" alt="..." />
              <div class="carousel-caption slider_text">
              <div class="container">
              <h5>สร้างบ้าน สร้างเศรษฐกิจ</h5>
              <h3>เพื่อชีวิตสุขประชา</h3>
              </div>
              </div>
              </div>
             */ ?>

        </div>
    </div>
    <?php
    if (count($info_banner) > 1):
        ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <?php
    endif;
    ?>
</section>
<!-- p1slider area end -->

<!-- p1minislider area start -->
<?php echo view('_recommended') ?>
<!-- p1minislider area end -->

<!-- p1blog area start -->
<?php echo view('_news') ?>
<!-- p1blog area end -->



<!-- p1video area start -->
<?php echo view('_video') ?>
<!-- p1video area end -->