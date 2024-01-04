<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
        <i class="la la-close"></i>
    </button>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
        <!-- BEGIN: Aside Menu -->
        <?php
        $this->load->view('inc-menu', [
            'data' => [
                'sq' => true,
                'page_url' => $page_url,
                'page_id' => $edit_id
            ]
        ]);
        ?>
        <!-- END: Aside Menu -->
    </div>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-setfont__main m-subheader__title--separator">
                    <?php echo $page_text; ?> - SEO
                    </h3>
<?php $this->load->view('inc-bread.php'); ?>
                    <div class="floting-proj"><?php echo $this->models->get_projectname($edit_id); ?></div>
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
                        <form action="<?php echo base_url($page_url . '/submit'); ?>" method="post" id="submitForm" data-url="<?php echo base_url($page_url . '/seo/' . $edit_id); ?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                            <input type="hidden" name="mode" value="<?php echo $act_mode; ?>" />
                            <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>" />
                            <input type="hidden" name="postact" value="project_seo" />
                            <div class="m-portlet__body">
                                <div class="bx-respone m--hides">
                                    <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-danger alert-dismissible fade show" role="alert">
                                        <div class="m-alert__icon">
                                            <i class="la la-clock-o"></i>
                                        </div>
                                        <div class="m-alert__text">
                                            Processing..
                                        </div>
                                        <div class="m-alert__close">
                                            <button type="button" class="close" onclick="$('.bx-respone.m--hides').hide();" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <ul class="nav nav-tabs m-tabs-line" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_th" role="tab">
                                                <img src="<?php echo base_url('images/th_icon.png'); ?>">&nbsp;&nbsp;ภาษาไทย
                                            </a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_en" role="tab">
                                                <img src="<?php echo base_url('images/en_icon.png'); ?>">&nbsp;&nbsp;English
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="tab-content">
                                    
                                    <!-- FOR TH -->
                                    <div class="tab-pane active" id="m_tabs_th" role="tabpanel">

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    เพจ Title
                                                </label>
                                                <input type="text" class="form-control m-input" name="title_th" onkeyup="return genURL(this, '#url_th');" placeholder="" value="<?php echo $info_data['title_th'] ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอก Title ของเพจสำหรับ SEO
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    รายละเอียดของเพจ
                                                </label>
                                                <textarea class="form-control m-input" name="description_th" placeholder="รายละเอียดของเพจ"><?php echo $info_data['description_th'] ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกรายละเอียดของเพจสำหรับ SEO
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    คีย์เวิร์ด
                                                </label>
                                                <input type="text" class="form-control m-input" data-role="tagsinput" name="keyword_th" placeholder="" value="<?php echo $info_data['keyword_th'] ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกคีย์เวิร์ดของเพจสำหรับ SEO
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    URL
                                                </label>
                                                <input type="text" class="form-control m-input" id="url_th" name="url_th" placeholder="page-url-1" value="<?php echo $info_data['url_th'] ?>">
                                                <span class="m-form__help">
                                                    URL จะถูกสร้างอัตโนมัติจากชื่อโครงการ
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- END TH -->
                                    
                                    <!-- FOR ENG -->
                                    <div class="tab-pane" id="m_tabs_en" role="tabpanel">

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Page Title
                                                </label>
                                                <input type="text" class="form-control m-input" name="title_en" placeholder="" onkeyup="return genURL(this, '#url_en');" value="<?php echo $info_data['title_en'] ?>">
                                                <span class="m-form__help">
                                                    Please fill page title - for SEO
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    Page Description
                                                </label>
                                                <textarea class="form-control m-input" name="description_en" placeholder="Page Description"><?php echo $info_data['description_en'] ?></textarea>
                                                <span class="m-form__help">
                                                    Please fill page description - for SEO
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Keyword
                                                </label>
                                                <input type="text" class="form-control m-input" data-role="tagsinput" name="keyword_en" placeholder="" value="<?php echo $info_data['keyword_en'] ?>">
                                                <span class="m-form__help">
                                                    Please fill the keyword - for SEO
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    URL
                                                </label>
                                                <input type="text" class="form-control m-input" id="url_en" name="url_en" placeholder="page-url-1" value="<?php echo $info_data['url_en'] ?>">
                                                <span class="m-form__help">
                                                    URL will generate by 'Page Title'
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END EN -->


                                    <!-- <div class="form-group m-form__group row">
                                        <div class="pull-lg-left">
                                            <label class="col col-form-label">Active</label>
                                            <div class="col">
                                                <span class="m-switch m-switch--outline m-switch--success">
                                                    <label>
                                                        <input type="checkbox" name="active" value="1" <?php echo ($info_data['active'] == 1 ? 'checked="checked"' : ''); ?> />
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn m-setfont__main btn-success">
                                                Save
                                            </button>
                                            <button type="reset" class="btn m-setfont__main btn-secondary" onclick="window.location.href = '<?php echo base_url($page_url); ?>';">
                                                Cancel
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
