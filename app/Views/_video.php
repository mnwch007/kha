
<?php
$info_video = $this->mainm->get_video($lang_url);
if (count($info_video) > 0):
    ?>
    <section id="p1video" class="wow fadeIn">
        <div class="container">
            <div class="p1video_wrapper">
                <div class="owl-carousel video-slider owl-theme">

                    <?php
                    foreach ($info_video as $k => $info):
                        ?>
                        <div class="item">
                            <div class="video_one">
                                <div class="row g-5">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="video_one_left">
                                            <iframe
                                                height="315"
                                                src="<?= convertYoutube($info['file_link']) ?>"
                                                title="<?= $info['Name'] ?>"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen
                                                ></iframe>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="video_one_right">
                                            <h3><?= $info['Name'] ?></h3>
                                            <div class="headbar">
                                                <span></span>
                                            </div>
                                            <p><?= $info['ShortDetail'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>

                    <!--
                                        <div class="item">
                                            <div class="video_one">
                                                <div class="row g-5">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="video_one_left">
                                                            <iframe
                                                                height="315"
                                                                src="https://www.youtube.com/embed/KLuTLF3x9sA?si=z8XYiF4dh5236-uS&amp;start=42209"
                                                                title="YouTube video player"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                allowfullscreen
                                                                ></iframe>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="video_one_right">
                                                            <h3>
                                                                รวมทุกความรู้สึก ความประทับใจ
                                                                ที่มีต่อโครงการบ้านเคหะสุขประชา ฉลองกรุง
                                                            </h3>
                                                            <div class="headbar">
                                                                <span></span>
                                                            </div>
                                                            <p>
                                                                รวมทุกความรู้สึก ความประทับใจ
                                                                ที่มีต่อโครงการบ้านเคหะสุขประชา ฉลองกรุง
                                                                รวมทุกความรู้สึก ความประทับใจ
                                                                ที่มีต่อโครงการบ้านเคหะสุขประชา ฉลองกรุง
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="video_one">
                                                <div class="row g-5">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="video_one_left">
                                                            <iframe
                                                                height="315"
                                                                src="https://www.youtube.com/embed/KLuTLF3x9sA?si=z8XYiF4dh5236-uS&amp;start=42209"
                                                                title="YouTube video player"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                allowfullscreen
                                                                ></iframe>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="video_one_right">
                                                            <h3>
                                                                รวมทุกความรู้สึก ความประทับใจ
                                                                ที่มีต่อโครงการบ้านเคหะสุขประชา ฉลองกรุง
                                                            </h3>
                                                            <div class="headbar">
                                                                <span></span>
                                                            </div>
                                                            <p>
                                                                รวมทุกความรู้สึก ความประทับใจ
                                                                ที่มีต่อโครงการบ้านเคหะสุขประชา ฉลองกรุง
                                                                รวมทุกความรู้สึก ความประทับใจ
                                                                ที่มีต่อโครงการบ้านเคหะสุขประชา ฉลองกรุง
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->


                </div>
                <div class="p1vieo_slider_nav">
                    <ul>
                        <li>
                            <span class="videoPrev"
                                  ><i class="fa-solid fa-chevron-left"></i
                                ></span>
                        </li>
                        <li>
                            <span class="videoNext"
                                  ><i class="fa-solid fa-chevron-right"></i
                                ></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php
endif;
?>