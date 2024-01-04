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
                        <?php echo $page_text; ?>
                    </h3>
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

                                <!-- bg -->
                                <div class="form-group m-form__group row">
                                    <div class="pull-lg-left">
                                        <label class="col col-form-label">Active</label>
                                        <div class="col">
                                            <span class="m-switch m-switch--outline m-switch--success">
                                                <label>
                                                    <input type="checkbox" name="active" value="1" <?php echo ($info_data['active'] == 1 ? 'checked="checked"':''); ?> />
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            Position <span class="font-red">*</span>
                                        </label>
                                        <select name="position" class="form-control">
                                            <option value="0" <?php echo ($info_data['position'] == '0' ? 'selected':''); ?>>Left</option>
                                            <option value="1" <?php echo ($info_data['position'] == '1' ? 'selected':''); ?>>Center</option>
                                            <option value="2" <?php echo ($info_data['position'] == '2' ? 'selected':''); ?>>Right</option>
                                        </select>
                                        <span class="m-form__help">
                                            Please select position
                                        </span>
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

                                <div class="tab-content">
                                    <!-- FOR ENG -->
                                    <div class="tab-pane active" id="m_tabs_en" role="tabpanel">      
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    Title
                                                </label>
                                                <input type="text" class="form-control m-input" name="title_en" value="<?php echo $info_data['title_en']; ?>" placeholder="">
                                                <span class="m-form__help"></span>
                                            </div>

                                            <div class="col-lg-4">
                                                <label>
                                                    Sub Ttitle
                                                </label>
                                                <input type="text" class="form-control m-input" name="sub_en" value="<?php echo $info_data['sub_en']; ?>" placeholder="">
                                                <span class="m-form__help"></span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    Button Text
                                                </label>
                                                <input type="text" class="form-control m-input" name="btn_text_en" value="<?php echo $info_data['btn_text_en']; ?>" placeholder="">
                                                <span class="m-form__help"></span>
                                            </div>

                                            <div class="col-lg-4">
                                                <label>
                                                    Button Link
                                                </label>
                                                <input type="text" class="form-control m-input" name="btn_link" value="<?php echo $info_data['btn_link']; ?>" placeholder="">
                                                <span class="m-form__help"></span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-8">
                                                <label>
                                                    Details
                                                </label>
                                                <textarea class="form-control m-input" name="detail_en" rows="6"><?php echo $info_data['detail_en']; ?></textarea>
                                                <span class="m-form__help"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FOR ENG -->
                                    <div class="tab-pane" id="m_tabs_th" role="tabpanel">      
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    หัวเรื่อง
                                                </label>
                                                <input type="text" class="form-control m-input" name="title_th" value="<?php echo $info_data['title_th']; ?>" placeholder="">
                                                <span class="m-form__help"></span>
                                            </div>

                                            <div class="col-lg-4">
                                                <label>
                                                    หัวเรื่องรอง
                                                </label>
                                                <input type="text" class="form-control m-input" name="sub_th" value="<?php echo $info_data['sub_th']; ?>" placeholder="">
                                                <span class="m-form__help"></span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    ข้อความบนปุ่ม
                                                </label>
                                                <input type="text" class="form-control m-input" name="btn_text_th" value="<?php echo $info_data['btn_text_th']; ?>" placeholder="">
                                                <span class="m-form__help"></span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-8">
                                                <label>
                                                    รายละเอียด
                                                </label>
                                                <textarea class="form-control m-input" name="detail_th" rows="6"><?php echo $info_data['detail_th']; ?></textarea>
                                                <span class="m-form__help"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- bg -->
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            Background
                                        </label>
                                        <div class="slim" data-size="1800,820" data-max-file-size="3" data-label="<i class='la la-cloud-upload' aria-hidden='true' style='font-size: 35px;color: #666;'></i>" data-default-input-name="image">
                                            <input type="file" name="image" accept="image/png, image/jpeg, image/gif, image/bmp, image/*" />
                                            <?php if($info_data['image']): ?>
                                                <img src="<?php echo base_url('../uploads/explore/' . $info_data['image']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <span class="m-form__help">
                                            Image should be (1800x820 file size limit to 3mb)
                                        </span>
                                    </div>
                                </div>


                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            อัพเดทล่าสุดเมื่อ
                                        </label>
                                        <?php echo $info_data['updated_at']; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn m-setfont__main btn-success" onclick="return CKupdate()">
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
