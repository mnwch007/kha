<div class="p7main_cnt_three wow fadeIn" id="cnt3">
    <div class="p7main_cnt_two mt-4">
        <div
            class="p7main_cnt_two_heading d-flex align-items-center justify-content-between"
            >
            <div class="p7main_cnt_two_heading_left">
                <h5><?= $type_info['Name'] ?> : <?= $srch_syear ?></h5>
            </div>
            <div class="p7main_cnt_two_heading_right d-none d-lg-block">
                <select class="change_syear">
                    <?php
                    foreach ($info_myear as $k => $val):
                        ?>
                        <option value="<?php echo $k; ?>" <?= ($srch_syear == $val ? 'selected' : '') ?>><?php echo $val; ?></option>
                        <?php
                    endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div
            class="sm_select d-flex d-lg-none align-items-center gap-3"
            >
            <div class="mobile_link mt-4 d-block d-lg-none">
                <div class="dropdown">
                    <button
                        class="dropdown-toggle"
                        id="dropdownMenuButton1"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        >
                            <?= lang('global_lang.shareholder_information') ?>
                    </button>
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="dropdownMenuButton1"
                        >
                        <li>
                            <a class="active" href="#"> <?= lang('global_lang.shareholder_information') ?></a>
                        </li>
                        <?php
                        $info_investor_type = $this->mainm->get_investor_type($lang_url);
                        foreach ($info_investor_type as $k => $v):
                            ?>
                            <li><a class="<?= ( ((isset($type_info['id']) && $type_info['id'] == $v['id']) || !isset($type_info['id']) && $k == 0) ? 'active' : '') ?>" href="<?= base_url_lang(lang('url_lang.investor') . '/' . lang('url_lang.shareholder_information') . '/' . ($lang_url == 'en' ? $v['SeoURLEn'] : $v['SeoURLTh']), $lang_url) ?>"><?= $v['Name'] ?></a></li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <div class="p7main_cnt_two_heading_right mt-4">
                <select class="change_syear">
                    <?php
                    foreach ($info_myear as $k => $val):
                        ?>
                        <option value="<?php echo $k; ?>" <?= ($srch_syear == $val ? 'selected' : '') ?>><?php echo $val; ?></option>
                        <?php
                    endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="p7main_cnt_two_table mt-3">
            <table>
                <tr>
                    <th><?= lang('global_lang.list_report') ?></th>
                    <th><?= lang('global_lang.dowload') ?></th>
                </tr>
                <?php
                foreach ($detail_info as $k => $v):
                    ?>
                    <tr>
                        <td><?= $v['Name'] ?></td>
                        <td>
                            <?php
                            if ($v['pdf_file'] != ""):
                                ?>
                                <span><?= FileSizeConvert(filesize(FCPATH . 'uploads/investor/' . $v['pdf_file'])) ?></span>
                                <a href="<?= img_path('investor/' . $v['pdf_file']) ?>" target="_blank"><img src="<?= assets('img/pdf.png') ?>" alt="" /></a>
                                <?php
                            endif;
                            ?>
                        </td>
                    </tr>  
                    <?php
                endforeach;
                ?>
            </table>
        </div>
    </div>
</div>