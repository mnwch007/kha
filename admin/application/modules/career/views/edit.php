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
                        <form action="<?php echo base_url($page_url . '/submit'); ?>" method="post" id="submitForm" data-url="<?php echo base_url($page_url . '/edit/' . $edit_id); ?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                            <input type="hidden" name="mode" value="<?php echo $act_mode; ?>" />
                            <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>" />
                            <input type="hidden" name="postact" value="project_add" />
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
                                    <div class="col-lg-3">
                                        <label>
                                            Expired Date
                                        </label>
                                        <input type="text" class="form-control m-input m_datepicker" name="expired" placeholder="" value="<?php echo date('Y-m-d', strtotime($info_data['expired'])); ?>" autocomplete="off">
                                        <span class="m-form__help">
                                            Please select expired date of news
                                        </span>
                                    </div>
                                </div>

                                <!-- <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            URL <span class="font-red">*</span>
                                        </label>
                                        <input type="text" class="form-control m-input" name="url" id="url" placeholder="">
                                        <span class="m-form__help">
                                            Please fill the url of news
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>
                                            Keyword
                                        </label>
                                        <input type="text" class="form-control m-input" name="keyword" id="keyword" placeholder="">
                                        <span class="m-form__help">
                                            Please fill the keyword
                                        </span>
                                    </div>
                                </div> -->

                                <div class="tab-content">
                                    <!-- FOR ENG -->
                                    <div class="tab-pane active" id="m_tabs_en" role="tabpanel">

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Job Title <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="job_title_en" value="<?php echo $info_data['job_title_en']; ?>" onkeyup="return genURL(this, '#url');" placeholder="Job title">
                                                <span class="m-form__help">
                                                    Please fill job titlee
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Short Description <span class="font-red">*</span>
                                                </label>
                                                <textarea class="form-control" rows="2" name="short_detail_en"><?php echo $info_data['short_detail_en']; ?></textarea>
                                                <span class="m-form__help">
                                                    Please fill short description
                                                </span>
                                            </div>
                                        </div>



                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    Job Description
                                                </label>
                                                <textarea class="form-control ck-editor" rows="10" name="job_des_en"><?php echo $info_data['job_des_en']; ?></textarea>
                                                <span class="m-form__help">
                                                    Please fill job description
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    Qalification
                                                </label>
                                                <textarea class="form-control ck-editor" rows="10" name="qualification_en"><?php echo $info_data['qualification_en']; ?></textarea>
                                                <span class="m-form__help">
                                                    Please fill the qalification
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    Other
                                                </label>
                                                <textarea class="form-control ck-editor" rows="10" name="other_en"><?php echo $info_data['other_en']; ?></textarea>
                                                <span class="m-form__help">
                                                    Please fill the other details
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Button Name
                                                </label>
                                                <input type="text" class="form-control m-input" name="button_name_en" placeholder="" value="<?php echo $info_data['button_name_en']; ?>" autocomplete="off">
                                                <span class="m-form__help">
                                                    Please fill the button name
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- END EN -->

                                    <!-- FOR TH -->
                                    <div class="tab-pane" id="m_tabs_th" role="tabpanel">

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    ตำแหน่งงาน <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="job_title_th" value="<?php echo $info_data['job_title_th']; ?>" placeholder="ตำแหน่งงาน">
                                                <span class="m-form__help">
                                                    กรุณากรอกตำแหน่งงาน
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    คำอธิบายสั้น <span class="font-red">*</span>
                                                </label>
                                                <textarea class="form-control" rows="2" name="short_detail_th"><?php echo $info_data['short_detail_th']; ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกคำอธิบายสั้น
                                                </span>
                                            </div>
                                        </div>


                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    รายละเอียดของงาน
                                                </label>
                                                <textarea class="form-control ck-editor" rows="10" name="job_des_th"><?php echo $info_data['job_des_th']; ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกรายละเอียดของงาน (สามารถใช้ Tag HTML ได้)
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    คุณสมบัติ
                                                </label>
                                                <textarea class="form-control ck-editor other_en" rows="10" name="qualification_th"><?php echo $info_data['qualification_th']; ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกรายละเอียดคุณสมบัติของผู้สมัคร (สามารถใช้ Tag HTML ได้)
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    อื่นๆ
                                                </label>
                                                <textarea class="form-control ck-editor other_en" rows="10" name="other_th"><?php echo $info_data['other_th']; ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกข้อมูลอื่นๆ
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    ชื่อปุ่มกด
                                                </label>
                                                <input type="text" class="form-control m-input" name="button_name_th" placeholder="" value="<?php echo $info_data['button_name_th']; ?>" autocomplete="off">
                                                <span class="m-form__help">
                                                    กรุณากรอกชื่อปุ่มกด
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- END TH -->
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            Button Link
                                        </label>
                                        <input type="text" class="form-control m-input" name="link" placeholder="Button Link" value="<?php echo $info_data['link']; ?>">
                                        <span class="m-form__help">
                                            Please fill the target of the button
                                        </span>
                                    </div>
                                </div>


                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label class="col col-form-label">Active</label>
                                        <div class="col">
                                            <span class="m-switch m-switch--outline m-switch--success">
                                                <label>
                                                    <input type="checkbox" name="active" value="1" <?php echo ($info_data['active'] == 1 ? 'checked' : ''); ?> />
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
