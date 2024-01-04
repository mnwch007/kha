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
                    <?php
                    $this->load->view('inc-bread.php', [
                        'data' => [
                            'sq' => true,
                            'page_url' => $page_url,
                            'page_id' => $edit_id
                        ]
                    ]);
                    ?>
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
                                <div class="tab-content">
                                    <!-- FOR ENG -->
                                    <div class="tab-pane active" id="m_tabs_en" role="tabpanel">

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Name <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="name_en" placeholder="The Project name" value="<?php echo $info_data['name_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill project name
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Type
                                                </label>
                                                <?php
                                                $project_type = $this->mains->get_datatable('projects_type');
                                                ?>
                                                <select name="ptype" class="form-control">
                                                    <option value="">Please select</option>
                                                    <?php foreach ($project_type as $key => $row): ?>
                                                        <option value="<?php echo $row['id']; ?>" <?php echo ($info_data['ptype'] == $row['id'] ? 'selected' : ''); ?>><?php echo $row['type_name_en']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="m-form__help">
                                                    Please select project type
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Status
                                                </label>
                                                <?php
                                                $project_state = $this->mains->get_datatable('projects_state');
                                                ?>
                                                <select name="pstate" class="form-control">
                                                    <option value="">Please select</option>
                                                    <?php foreach ($project_state as $key => $row): ?>
                                                        <option value="<?php echo $row['id']; ?>" <?php echo ($info_data['pstate'] == $row['id'] ? 'selected' : ''); ?>><?php echo $row['name_en']; ?> (<?php echo $row['name_th']; ?>)</option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="m-form__help">
                                                    Please select project status
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Prices <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="prices_en" placeholder="12.60" value="<?php echo $info_data['prices_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill start of project prices
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-3">
                                                <label>
                                                    Latitude <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="latitude" value="<?php echo $info_data['latitude']; ?>" placeholder="18.913951">
                                                <span class="m-form__help">
                                                    Please fill project latitude
                                                </span>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>
                                                    Longitude <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="longitude" value="<?php echo $info_data['longitude']; ?>" placeholder="100.436234">
                                                <span class="m-form__help">
                                                    Please fill project longitude
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Primary Color <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input jscolor" name="p_color" value="<?php echo $info_data['p_color']; ?>" placeholder="">
                                                <span class="m-form__help">
                                                    Please select primary color
                                                    <br />Background Color, Header Text Color, Button Background Color
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    Primary Font color
                                                </label>
                                                <input type="text" class="form-control m-input jscolor" name="p_color_f" value="<?php echo $info_data['p_color_f']; ?>" placeholder="">
                                                <span class="m-form__help">
                                                    Please select primary font color
                                                    <br />Text color on Primary background and Button
                                                </span>
                                            </div>
                                            <!-- <div class="col-lg-6">
                                                <label>
                                                    Secondary color
                                                </label>
                                                <input type="text" class="form-control m-input jscolor" name="s_color" value="<?php echo $info_data['s_color']; ?>" placeholder="">
                                                <span class="m-form__help">
                                                    Please select secondary color
                                                    <br />Sub Background Color, Sub Text Color
                                                </span>
                                            </div> -->
                                        </div>

                                        <div class="form-group m-form__group row">

                                            <div class="col-lg-6">
                                                <label>
                                                    Icon tone
                                                </label>
                                                <select class="form-control" name="icon_tone">
                                                    <option value="0" <?php echo ($info_data['icon_tone'] == 0 ? 'selected' : ''); ?>>Normal (Gray)</option>
                                                    <option value="1" <?php echo ($info_data['icon_tone'] == 1 ? 'selected' : ''); ?>>White</option>
                                                    <option value="2" <?php echo ($info_data['icon_tone'] == 2 ? 'selected' : ''); ?>>Black</option>
                                                </select>
                                                <span class="m-form__help">
                                                    Please select tone color of icon
                                                </span>
                                            </div>

                                            <!-- <div class="col-lg-6">
                                                <label>
                                                    Secondary Font color
                                                </label>
                                                <input type="text" class="form-control m-input jscolor" name="s_color_f" value="<?php echo $info_data['s_color_f']; ?>" placeholder="">
                                                <span class="m-form__help">
                                                    Please select secondary font color
                                                    <br />Text color on Secondary background and Button
                                                </span>
                                            </div> -->
                                        </div>

                                    </div>
                                    <!-- END EN -->

                                    <!-- FOR TH -->
                                    <div class="tab-pane" id="m_tabs_th" role="tabpanel">

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    ชื่อโครงการ
                                                </label>
                                                <input type="text" class="form-control m-input" name="name_th" placeholder="ชื่อโครงการ" value="<?php echo $info_data['name_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกชื่อโครงการ
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    ราคาโครงการ <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="prices_th" placeholder="12.60" value="<?php echo $info_data['prices_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกราคาโครงการ
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- END TH -->

                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-3">
                                            <label class="col col-form-label">Active for Smart Search</label>
                                            <div class="col">
                                                <span class="m-switch m-switch--outline m-switch--success">
                                                    <label>
                                                        <input type="checkbox" name="smart_active" value="1" <?php echo ($info_data['smart_active'] == 1 ? 'checked="checked"' : ''); ?> />
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col col-form-label">Active for Register</label>
                                            <div class="col">
                                                <span class="m-switch m-switch--outline m-switch--success">
                                                    <label>
                                                        <input type="checkbox" name="register_active" value="1" <?php echo ($info_data['register_active'] == 1 ? 'checked="checked"' : ''); ?> />
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col col-form-label">Active for Home</label>
                                            <div class="col">
                                                <span class="m-switch m-switch--outline m-switch--success">
                                                    <label>
                                                        <input type="checkbox" name="home_active" value="1" <?php echo ($info_data['home_active'] == 1 ? 'checked="checked"' : ''); ?> />
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="col col-form-label">Active for Other</label>
                                            <div class="col">
                                                <span class="m-switch m-switch--outline m-switch--success">
                                                    <label>
                                                        <input type="checkbox" name="other_active" value="1" <?php echo ($info_data['other_active'] == 1 ? 'checked="checked"' : ''); ?> />
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-3">
                                            <label class="col col-form-label">Sold Out</label>
                                            <div class="col">
                                                <span class="m-switch m-switch--outline m-switch--success">
                                                    <label>
                                                        <input type="checkbox" name="soldout" value="1" <?php echo ($info_data['soldout'] == 1 ? 'checked="checked"' : ''); ?> />
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-3">
                                            <label class="col col-form-label">Active for Book Now</label>
                                            <div class="col">
                                                <span class="m-switch m-switch--outline m-switch--success">
                                                    <label>
                                                        <input type="checkbox" name="booking_active" value="1" <?php echo ($info_data['booking_active'] == 1 ? 'checked="checked"' : ''); ?>/>
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>
                                                Book Now Link
                                            </label>
                                            <input type="text" class="form-control m-input" name="booking_link" placeholder="Book Now Link" value="<?php echo $info_data['booking_link']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-md-12">
                                            <h4>Header & Body Script</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            Header Code
                                        </label>
                                        <textarea rows="10" class="form-control m-input" name="header_code"><?php echo $info_data['header_code']; ?></textarea>
                                        <span class="m-form__help">
                                            ติดหน้า ทุกหน้า ยกเว้น หน้า Thank You Page
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>
                                            Body Code
                                        </label>
                                        <textarea rows="10" class="form-control m-input" name="footer_code"><?php echo $info_data['footer_code']; ?></textarea>
                                        <span class="m-form__help">
                                            This code will insert into < body > tags
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            Thank Code
                                        </label>
                                        <textarea rows="10" class="form-control m-input" name="thank_code"><?php echo $info_data['thank_code']; ?></textarea>
                                        <span class="m-form__help">
                                            ติดหน้า Thank You Page ONLY
                                        </span>
                                    </div>
                                    <div class="col-lg-6"></div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-md-12">
                                        <h4>Related Project email</h4>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <?php for ($i = 1; $i <= 10; $i++): ?>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control m-input" placeholder="mail@tome.com" name="proj_email_<?php echo $i; ?>" placeholder="" value="<?php echo $info_data['proj_email_' . $i]; ?>">
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                    <div class="col-lg-6">
                                        <span class="m-form__help">
                                            The register notification will send to all email
                                        </span>
                                    </div>
                                </div>
                            </div>

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
