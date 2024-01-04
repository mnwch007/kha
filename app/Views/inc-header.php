<!DOCTYPE html>
<html lang="en-US">
    <head>
        <base href="<?php echo base_url(); ?>" 
              lang="<?= (isset($lang_url) && $lang_url != "en") ? 'th' : 'en' ?>" 
              data-url-th="<?= isset($page_url_th) ? base_url($page_url_th) : base_url() ?>" 
              data-url-en="<?= isset($page_url_en) ? base_url($page_url_en) : base_url() ?>"/>
        <!-- Meta setup -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="keywords" content="<?= (isset($seo_keyword) ? $seo_keyword : '') ?>" />
        <meta name="decription" content="<?= (isset($seo_decription) ? $seo_decription : '') ?>" />
        <meta name="author" content="<?= SITENAME ?>" />

        <!-- Title -->
        <title><?= SITENAME ?><?= ((isset($page_title) && $page_title != "") ? ' - ' . $page_title : '') ?></title>
        <!-- Fav Icon -->
        <link rel="icon" href="<?= assets('img/favicon.png') ?>" />
        <!-- Include Bootstrap -->
        <link rel="stylesheet" href="<?= assets('css/bootstrap.min.css') ?>" />

        <link rel="stylesheet" href="<?= assets('css/animate.css') ?>" />

        <link rel="stylesheet" href="<?= assets('css/jquery.fancybox.css?ver=' . VERSION) ?>" />

        <!-- font StyleSheet -->
        <link rel="stylesheet" href="<?= assets('css/fonts.css') ?>" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <!-- Include Owl-Carusol -->
        <link rel="stylesheet" href="<?= assets('css/owl.carousel.min.css') ?>" />
        <link rel="stylesheet" href="<?= assets('css/owl.theme.default.min.css') ?>" />
        <!-- Main StyleSheet -->
        <link rel="stylesheet" href="<?= assets('css/style.css?ver=' . VERSION) ?>" />
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="<?= assets('css/responsive.css?ver=' . VERSION) ?>" />


        <!-- My Style For This Page -->
        <?php
        if (isset($css) && count($css) > 0):
            foreach ($css as $css_val):
                echo '<link href="' . assets($css_val) . '" rel="stylesheet">' . PHP_EOL;
            endforeach;
        endif;
        ?>
    </head>
    <body>
        <?php
        $this->mainm = new App\Models\MainModel();
        ?>

        <!-- header area start -->
        <header class="d-none d-lg-block">
            <div class="header">
                <div class="container">
                    <div
                        class="header_wrapper d-flex align-items-center justify-content-between"
                        >
                        <div class="header_left">
                            <a href="<?= base_url(($lang_url == 'en' ? 'en' : '')) ?>">
                                <img src="<?= assets('img/logo.png') ?>" alt="logo" />
                            </a>
                            <div class="smmenu_right d-flex align-items-center gap-3">
                                <div class="header_right_icon d-block d-lg-none">
                                    <ul>
                                        <li>
                                            <button
                                                type="button"
                                                data-bs-toggle="offcanvas"
                                                data-bs-target="#offcanvasRight"
                                                aria-controls="offcanvasRight"
                                                >
                                                <img src="<?= assets('img/search.png') ?>" alt="" />
                                            </button>
                                        </li>
                                        <li>
                                            <select class="change_lang">
                                                <?php
                                                if ($lang_url == 'en'):
                                                    ?>
                                                    <option value="en" <?= ($lang_url == 'en' ? 'selected' : '') ?>>EN</option>  
                                                    <option value="th" <?= ($lang_url == '' ? 'selected' : '') ?>>TH</option>

                                                    <?php
                                                else:
                                                    ?>
                                                    <option value="th" <?= ($lang_url == '' ? 'selected' : '') ?>>TH</option>
                                                    <option value="en" <?= ($lang_url == 'en' ? 'selected' : '') ?>>EN</option>

                                                <?php
                                                endif;
                                                ?>
                                            </select>
                                        </li>
                                    </ul>
                                </div>

                                <div class="bar d-block d-lg-none">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="header_right d-flex align-items-center justify-content-between"
                            >
                            <div class="header_right_menu">
                                <ul>
                                    <li><a href="<?= base_url_lang(lang('url_lang.projects'), $lang_url) ?>"><?= lang('global_lang.our_project') ?></a></li>
                                    <li><a href="<?= base_url_lang(lang('url_lang.about_us'), $lang_url) ?>"><?= lang('global_lang.about_us') ?></a></li>
                                    <li><a href="<?= base_url_lang(lang('url_lang.news'), $lang_url) ?>"><?= lang('global_lang.news') ?></a></li>
                                    <li><a href="<?= base_url_lang(lang('url_lang.investor'), $lang_url) ?>"><?= lang('global_lang.investor') ?></a></li>
                                    <li><a href="<?= base_url_lang(lang('url_lang.contacts'), $lang_url) ?>"><?= lang('global_lang.contacts') ?></a></li>
                                </ul>
                            </div>
                            <div class="header_right_icon">
                                <ul>
                                    <li>
                                        <button
                                            type="button"
                                            data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasRight"
                                            aria-controls="offcanvasRight"
                                            >
                                            <img src="<?= assets('img/search.png') ?>" alt="" />
                                        </button>
                                    </li>
                                    <li>
                                        <select class="change_lang">
                                            <?php
                                            if ($lang_url == 'en'):
                                                ?>
                                                <option value="en" <?= ($lang_url == 'en' ? 'selected' : '') ?>>EN</option>  
                                                <option value="th" <?= ($lang_url == '' ? 'selected' : '') ?>>TH</option>

                                                <?php
                                            else:
                                                ?>
                                                <option value="th" <?= ($lang_url == '' ? 'selected' : '') ?>>TH</option>
                                                <option value="en" <?= ($lang_url == 'en' ? 'selected' : '') ?>>EN</option>

                                            <?php
                                            endif;
                                            ?>

                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header area end -->

        <!-- mobile_header area start -->
        <header class="d-block d-lg-none">
            <div class="container">
                <div class="header_wrpper">
                    <div
                        class="mobile_bar"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight2"
                        aria-controls="offcanvasRight"
                        >
                        <img src="<?= assets('img/bar.png') ?>" alt="" />
                    </div>
                    <div class="mobile_logo">
                        <a href="<?= base_url() ?>">
                            <img src="<?= assets('img/logo.png') ?>" alt="" />
                        </a>
                    </div>
                    <div class="mobile_search">
                        <button
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight"
                            >
                            <img src="<?= assets('img/search.png') ?>" alt="" />
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <!-- mobile_header area end -->



