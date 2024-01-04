<?php
$arr = (isset($info_data)) ? $info_data : [];
foreach ($arr as $key => $info):
    ?>
    <div class="search_box_one">
        <div class="search_box_one_left">
            <img src="<?= img_path('image_gallery/' . $info['Image']) ?>" alt="" />
        </div>
        <div class="search_box_one_right">
            <a href="<?= base_url_lang(lang('url_lang.projects') . '/' . ($lang_url == 'en' ? $info['SeoURLEn'] : $info['SeoURLTh']), $lang_url) ?>"><?= $info['Name'] ?></a>
            <p>
                <span><img src="<?= assets('img/loc.png') ?>" alt="" /></span><?= $info['Location'] ?>
            </p>
        </div>
    </div>
    <?php
endforeach;
?>
<!--<div class="search_box_one">
    <div class="search_box_one_left">
        <img src="<?= assets('img/house1.png') ?>" alt="" />
    </div>
    <div class="search_box_one_right">
        <a href="#">เคหะสุขประชาฉลองกรุง</a>
        <p>
            <span><img src="<?= assets('img/loc.png') ?>" alt="" /></span>ฉลองกรุง -
            กรุงเทพมหานคร
        </p>
    </div>
</div>
<div class="search_box_one">
    <div class="search_box_one_left">
        <img src="<?= assets('img/house1.png') ?>" alt="" />
    </div>
    <div class="search_box_one_right">
        <a href="#">เคหะสุขประชาฉลองกรุง</a>
        <p>
            <span><img src="<?= assets('img/loc.png') ?>" alt="" /></span>ฉลองกรุง -
            กรุงเทพมหานคร
        </p>
    </div>
</div> -->