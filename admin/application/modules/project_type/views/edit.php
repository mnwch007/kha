<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
        <i class="la la-close"></i>
    </button>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
        <!-- BEGIN: Aside Menu -->
        <?php $this->load->view('inc-menu'); ?>
        <!-- END: Aside Menu -->
    </div>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-setfont__main m-subheader__title--separator">
                        Edit <?php echo $page_text; ?>
                    </h3>
                    <?php $this->load->view('inc-bread.php'); ?>
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
                            <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>" />
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
                                    <ul class="nav nav-tabs  m-tabs-line" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_en" role="tab">
                                                <span class="flag-icon flag-icon-us"></span>&nbsp;&nbsp;English
                                            </a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_th" role="tab">
                                                <span class="flag-icon flag-icon-th"></span>&nbsp;&nbsp;ภาษาไทย
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <!-- FOR ENG -->
                                    <div class="tab-pane active" id="m_tabs_en" role="tabpanel">
                                        
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    Project Type
                                                </label>
                                                <input type="text" class="form-control m-input" name="type_name_en" placeholder="Project Type" required="required" value="<?php echo $info_data['type_name_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill project type name
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    Keyword
                                                </label>
                                                <input type="text" class="form-control m-input" data-role="tagsinput" name="type_keyword_en" placeholder="" value="<?php echo $info_data['type_keyword_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill the keyword - for SEO
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    Description
                                                </label>
                                                <input type="text" class="form-control m-input" name="type_detail_en" placeholder="" value="<?php echo $info_data['type_detail_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill the description - for SEO
                                                </span>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <!-- END EN -->

                                    <!-- FOR TH -->
                                    <div class="tab-pane" id="m_tabs_th" role="tabpanel">
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    ประเภทโครงการ
                                                </label>
                                                <input type="text" class="form-control m-input" name="type_name_th" placeholder="กรุณากรอกประเภทโครงการ" value="<?php echo $info_data['type_name_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกประเภทโครงการ
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    คีย์เวิร์ด
                                                </label>
                                                <input type="text" class="form-control m-input" data-role="tagsinput" name="type_keyword_th" placeholder="" value="<?php echo $info_data['type_keyword_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกคีย์เวิร์ดสำหรับทำ SEO
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    คำอธิบาย
                                                </label>
                                                <input type="text" class="form-control m-input" name="type_detail_th" placeholder="" value="<?php echo $info_data['type_detail_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกคำอธิบายสำหรับทำ SEO
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END TH -->
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
