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
                        New <?php echo $page_text; ?>
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
                                            <div class="col-lg-3">
                                                <label>
                                                    วันที่ <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input m_datepicker" name="date" placeholder="" autocomplete="off">
                                            </div>
                                            <div class="col-lg-3">
                                                <label>
                                                    เลือกปี <span class="font-red">*</span>
                                                </label>
                                                <select name="syear" class="form-control">
                                                    <option value="">-- เลือก --</option>
                                                    <?php
                                                    foreach ($info_myear as $k => $val):
                                                        ?>
                                                        <option value="<?php echo $k; ?>"><?php echo $val; ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    ประเภท <span class="font-red">*</span>
                                                </label>
                                                <?php
                                                $investor_type = $this->mains->get_datatable('company_type');
                                                ?>
                                                <select name="stype" class="form-control">
                                                    <option value="">-- เลือก --</option>
                                                    <?php foreach ($investor_type as $key => $row): ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['type_name_th']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    หัวข้อ <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="title_th" placeholder="หัวข้อ">
                                                <span class="m-form__help">
                                                    กรุณากรอกหัวข้อ
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-md-12">
                                                <h4>อัพโหลดไฟล์</h4>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <input type="file" class="form-control m-input" id="pdf_file" name="pdf_file">
                                                <span class="m-form__help">
                                                    support *.pdf, Recommended size limit 12mb
                                                </span>
                                            </div>
                                        </div>


                                    </div>

                                    <!-- FOR ENG -->
                                    <div class="tab-pane" id="m_tabs_en" role="tabpanel">
                                        <div class="form-group m-form__group row">

                                            <div class="col-lg-6">
                                                <label>
                                                    Title <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="title_en" placeholder="title">
                                                <span class="m-form__help">
                                                    Please fill investor name
                                                </span>
                                            </div>
                                        </div>
 
                                    </div>
                                    <!-- END EN -->

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
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn m-setfont__main btn-success" onclick="return CKupdate();">
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
