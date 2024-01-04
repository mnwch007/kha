<!-- p7main area start -->
<section id="p7main">
    <div class="container">
        <div class="p7main_wrappper">
            <div class="row g-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="p7main_left">
                        <div class="p7main_left_heading">
                            <h3><?= lang('global_lang.investor') ?></h3>
                            <div class="headbar">
                                <span></span>
                            </div>
                        </div>
                        <ul>
                            <?php
                            if ($main_tabs == 1):
                                ?>
                                <li><a <?= ($page_tabs == 1 ? 'class="active"' : '') ?> href="<?= base_url_lang(lang('url_lang.investor'), $lang_url) ?>"><?= lang('global_lang.organizational_structure') ?></a></li>
                                <li><a <?= ($page_tabs == 2 ? 'class="active"' : '') ?> href="<?= base_url_lang(lang('url_lang.investor') . '/' . lang('url_lang.board_of_directors'), $lang_url) ?>"><?= lang('global_lang.board_of_directors') ?></a></li>
                                <li><a <?= ($page_tabs == 3 ? 'class="active"' : '') ?> href="<?= base_url_lang(lang('url_lang.investor') . '/' . lang('url_lang.message_from_chairman_director'), $lang_url) ?>"><?= lang('global_lang.message_from_chairman_director') ?></a></li>
                                <li><a href="javascript:;">ข้อบังคับบริษัท</a></li>
                                <li><a href="javascript:;">นโยบายต่อต้านการทุจริต</a></li>
                                <li><a href="javascript:;">กฎบัตรคณะกรรมการ <br />และคณะกรรมการชุดย่อย</a></li>
                                <li><a href="javascript:;">แจ้งเบาะแสการทุจริต</a></li>
                                <?php
                            elseif ($main_tabs == 2):
                                $info_financial_type = $this->mainm->get_financial_type($lang_url);
                                foreach ($info_financial_type as $k => $v):
                                    ?>
                                    <li><a class="<?= ( ((isset($type_info['id']) && $type_info['id'] == $v['id']) || !isset($type_info['id']) && $k == 0) ? 'active' : '') ?>" href="<?= base_url_lang(lang('url_lang.investor') . '/' . lang('url_lang.financial_information') . '/' . ($lang_url == 'en' ? $v['SeoURLEn'] : $v['SeoURLTh']), $lang_url) ?>"><?= $v['Name'] ?></a></li>
                                    <?php
                                endforeach;
                            elseif ($main_tabs == 3):
                                $info_investor_type = $this->mainm->get_investor_type($lang_url);
                                foreach ($info_investor_type as $k => $v):
                                    ?>
                                    <li><a class="<?= ( ((isset($type_info['id']) && $type_info['id'] == $v['id']) || !isset($type_info['id']) && $k == 0) ? 'active' : '') ?>" href="<?= base_url_lang(lang('url_lang.investor') . '/' . lang('url_lang.shareholder_information') . '/' . ($lang_url == 'en' ? $v['SeoURLEn'] : $v['SeoURLTh']), $lang_url) ?>"><?= $v['Name'] ?></a></li>
                                    <?php
                                endforeach;

                            elseif ($main_tabs == 4):
                                $info_company_type = $this->mainm->get_company_type($lang_url);
                                foreach ($info_company_type as $k => $v):
                                    ?>
                                    <li><a class="<?= ( ((isset($type_info['id']) && $type_info['id'] == $v['id']) || !isset($type_info['id']) && $k == 0) ? 'active' : '') ?>" href="<?= base_url_lang(lang('url_lang.investor') . '/' . lang('url_lang.company_policy') . '/' . ($lang_url == 'en' ? $v['SeoURLEn'] : $v['SeoURLTh']), $lang_url) ?>"><?= $v['Name'] ?></a></li>
                                    <?php
                                endforeach;
                            endif;
                            ?>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="p7main_cnt_one">
                        <div class="p7main_right">
                            <div class="p7main_left_heading d-block d-md-none mb-4">
                                <h3><?= lang('global_lang.investor') ?></h3>
                                <div class="headbar">
                                    <span></span>
                                </div>
                            </div>
                            <div class="p7main_right_tab">
                                <ul>
                                    <li <?= ($main_tabs == 1 ? 'class="active"' : '') ?> target="cnt1"><a href="<?= base_url_lang(lang('url_lang.investor'), $lang_url) ?>"><?= lang('global_lang.company_information') ?></a></li>
                                    <li <?= ($main_tabs == 4 ? 'class="active"' : '') ?> target="cnt4"><a href="<?= base_url_lang(lang('url_lang.investor'), $lang_url) . '/' . lang('url_lang.company_policy') ?>"><?= lang('global_lang.company_policy') ?></a></li>
                                    <li <?= ($main_tabs == 2 ? 'class="active"' : '') ?> target="cnt2"><a href="<?= base_url_lang(lang('url_lang.investor'), $lang_url) . '/' . lang('url_lang.financial_information') ?>"><?= lang('global_lang.financial_information') ?></a></li>
                                    <li <?= ($main_tabs == 3 ? 'class="active"' : '') ?> target="cnt3"><a href="<?= base_url_lang(lang('url_lang.investor'), $lang_url) . '/' . lang('url_lang.shareholder_information') ?>"><?= lang('global_lang.shareholder_information') ?></a></li>
                                    <li target="cnt4"><a href="<?= base_url_lang(lang('url_lang.contacts'), $lang_url) ?>"><?= lang('global_lang.investor_inquiries') ?></a></li>
                                </ul>
                            </div>

                            <?php
                            if ($main_tabs == 1):
                                ?>
                                <div class="p7tabcnts first_cnt" id="cnt1">
                                    <div class="mobile_link text-center mt-4 d-block d-lg-none">
                                        <div class="dropdown">
                                            <button
                                                class="dropdown-toggle"
                                                id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                                >
                                                    <?= lang('global_lang.organizational_structure') ?>
                                            </button>
                                            <ul
                                                class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton1">
                                                <li><a <?= ($page_tabs == 1 ? 'class="active"' : '') ?> href="<?= base_url_lang(lang('url_lang.investor'), $lang_url) ?>"><?= lang('global_lang.organizational_structure') ?></a></li>
                                                <li><a <?= ($page_tabs == 2 ? 'class="active"' : '') ?> href="<?= base_url_lang(lang('url_lang.investor') . '/' . lang('url_lang.board_of_directors'), $lang_url) ?>"><?= lang('global_lang.board_of_directors') ?></a></li>
                                                <li><a <?= ($page_tabs == 3 ? 'class="active"' : '') ?> href="<?= base_url_lang(lang('url_lang.investor') . '/' . lang('url_lang.message_from_chairman_director'), $lang_url) ?>"><?= lang('global_lang.message_from_chairman_director') ?></a></li>

                                                <li><a href="javascript:;">ข้อบังคับบริษัท</a></li>
                                                <li><a href="javascript:;">นโยบายต่อต้านการทุจริต</a></li>
                                                <li>
                                                    <a href="javascript:;"
                                                       >กฎบัตรคณะกรรมการ <br />
                                                        และคณะกรรมการชุดย่อย</a
                                                    >
                                                </li>
                                                <li><a href="javascript:;">แจ้งเบาะแสการทุจริต</a></li>


                                            </ul>
                                        </div>
                                    </div>
                                    <?php
                                    echo view('Modules\Pages\Views\investor_company');
                                    ?>
                                </div>
                                <?php
                            endif;
                            ?>




                        </div>
                    </div>

                    <?php
                    if ($main_tabs == 2):
                        echo view('Modules\Pages\Views\investor_financial');
                    endif;
                    ?>

                    <?php
                    if ($main_tabs == 3):
                        echo view('Modules\Pages\Views\investor_shareholder');
                    endif;
                    ?>
                    <?php
                    if ($main_tabs == 4):
                        echo view('Modules\Pages\Views\company_policy');
                    endif;
                    ?>


                    <!--                    <div class="p7main_cnt_three p7tabcnts" id="cnt3">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                                Laborum, natus nihil minus aliquid odio molestiae! Suscipit,
                                                at mollitia asperiores facere, laborum quisquam perspiciatis
                                                tempora quasi, amet enim sit reprehenderit est?asperiores
                                                facere, laborum quisquam perspiciatis tempora quasi, amet enim
                                                sit reprehenderit est?
                                            </p>
                                        </div>
                                        <div class="p7main_cnt_four p7tabcnts" id="cnt4">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                                Laborum, natus nihil minus aliquid odio molestiae! Suscipit,
                                                at mollitia
                                            </p>
                                        </div>-->


                </div>
            </div>
        </div>
    </div>
</section>
<!-- p7main area end -->
