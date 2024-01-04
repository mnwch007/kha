<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
        <i class="la la-close"></i>
    </button>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
        <!-- BEGIN: Aside Menu -->
        <?php $this->load->view('inc-menu');?>
        <!-- END: Aside Menu -->
    </div>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-setfont__main m-subheader__title--separator">
                        New <?php echo $page_text; ?>
                    </h3>
                    <?php $this->load->view('inc-bread.php');?>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="m-portlet">
                        <!--begin::Form-->
                        <form action="<?php echo base_url($page_url . '/submit'); ?>" method="post" id="submitForm" data-url="<?php echo base_url($page_url); ?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                            <input type="hidden" name="mode" value="<?php echo $act_mode; ?>" />
                            <div class="m-portlet__body">
                                <div class="bx-respone m--hides">
                                    <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-danger alert-dismissible fade show" role="alert">
                                        <div class="m-alert__icon">
                                            <i class="la la-clock-o"></i>
                                        </div>
                                        <div class="m-alert__text">
                                           กำลังทำรายการกรุณากรอกซักครู่
                                        </div>
                                        <div class="m-alert__close">
                                            <button type="button" class="close" onclick="$('.bx-respone.m--hides').hide();" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <ul class="nav nav-tabs m-tabs-line" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_en" role="tab">
                                                <img src="<?php echo base_url('images/en_icon.png'); ?>">&nbsp;&nbsp;English
                                            </a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_th" role="tab">
                                                <img src="<?php echo base_url('images/th_icon.png'); ?>">&nbsp;&nbsp;ภาษาไทย
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            URL <span class="font-red">*</span>
                                        </label>
                                        <input type="text" class="form-control m-input" name="content_url" id="content_url" placeholder="">
                                        <span class="m-form__help">
                                            Please fill the url of news
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>
                                            Keyword
                                        </label>
                                        <input type="text" class="form-control m-input" name="content_keyword" id="content_keyword" placeholder="">
                                        <span class="m-form__help">
                                            Please fill the keyword
                                        </span>
                                    </div>
                                </div>

                                <div class="tab-content">
                                    <!-- FOR ENG -->
                                    <div class="tab-pane active" id="m_tabs_en" role="tabpanel">
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    Page Title
                                                </label>
                                                <input type="text" class="form-control m-input" name="content_title_en" placeholder="Page title" required="required" onkeyup="return genURL(this, '#content_url');" />
                                                <span class="m-form__help">
                                                    Please fill the page title
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    Content
                                                </label>
                                                <textarea name="content_html_en" class="form-control ck-editor"></textarea>
                                                <span class="m-form__help">
                                                    Please fill the page content (HTML Support)
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FOR TH -->
                                    <div class="tab-pane" id="m_tabs_th" role="tabpanel">
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    ชื่อเพจ
                                                </label>
                                                <input type="text" class="form-control m-input" name="content_title_th" placeholder="กรุณากรอกชื่อเพจ" required="required" />
                                                <span class="m-form__help">
                                                    กรุณากรอกชื่อเพจ
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    จัดการคอนเท้นท์
                                                </label>
                                                <textarea name="content_html_th" class="form-control ck-editor"></textarea>
                                                <span class="m-form__help">
                                                    คุณสามารถจัดการคอนเท้นท์ได้จากส่วนนี้ โดยสามารถแทรกโค้ด HTML ได้
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label class="col col-form-label">Active</label>
                                        <div class="col">
                                            <span class="m-switch m-switch--outline m-switch--success">
                                                <label>
                                                    <input type="checkbox" name="active" value="1" />
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn m-setfont__main btn-success" onclick="return CKupdate();">
                                                บันทึกข้อมูล
                                            </button>
                                            <button type="reset" class="btn m-setfont__main btn-secondary">
                                                ยกเลิก
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Body -->
