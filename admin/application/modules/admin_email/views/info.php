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
                        <?php echo $page_text; ?> - Info
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
                        <form action="<?php echo base_url($page_url . '/submit'); ?>" method="post" id="submitForm" data-url="<?php echo base_url($page_url . '/information/' . $edit_id); ?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                            <input type="hidden" name="mode" value="<?php echo $act_mode; ?>" />
                            <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>" />
                            <input type="hidden" name="postact" value="project_info" />
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

                                        <!-- <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Name <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="name_en" placeholder="The Project name" value="<?php echo $info_data['name_en']; ?>" readonly="readonly">
                                                <span class="m-form__help">
                                                    Please fill project name
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Location <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="location_en" placeholder="Sukhunvit - Silom" value="<?php echo $info_data['location_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill project location
                                                </span>
                                            </div>
                                        </div> -->

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Unit Space <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="space_en" placeholder="110 Sqm" value="<?php echo $info_data['space_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill project unit space
                                                </span>
                                            </div>
                                            <!-- <div class="col-lg-6">
                                                <label>
                                                    Project Vision
                                                </label>
                                                <textarea class="form-control" rows="4" name="vision_en"><?php echo $info_data['vision_en']; ?></textarea>
                                                <span class="m-form__help">
                                                    Please select project vision
                                                </span>
                                            </div> -->
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-3">
                                                <label class="col col-form-label">Active Vision</label>
                                                <div class="col">
                                                    <span class="m-switch m-switch--outline m-switch--success">
                                                        <label>
                                                            <input type="checkbox" name="slogan_active_en" value="1" <?php echo ($info_data['slogan_active_en'] == 1 ? 'checked="checked"' : ''); ?> />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Vision Position <span class="font-red">*</span>
                                                </label>
                                                <select name="slogan_position" class="form-control">
                                                    <option value="0" <?php echo ($info_data['slogan_position'] == '0' ? 'selected' : ''); ?>>Left</option>
                                                    <option value="1" <?php echo ($info_data['slogan_position'] == '1' ? 'selected' : ''); ?>>Center</option>
                                                    <option value="2" <?php echo ($info_data['slogan_position'] == '2' ? 'selected' : ''); ?>>Right</option>
                                                </select>
                                                <span class="m-form__help">
                                                    Please select project vision position
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Vision Title
                                                </label>
                                                <input type="text" class="form-control m-input" name="vision_en" placeholder="Project Vision Title" value="<?php echo $info_data['vision_en']; ?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Vision Font color
                                                </label>
                                                <input type="text" class="form-control m-input jscolor" name="vs_color_f" value="<?php echo $info_data['vs_color_f']; ?>" placeholder="">
                                                <span class="m-form__help">
                                                    Please select project vision font color
                                                </span>
                                            </div>
                                        </div>


                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Vision <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="slogan_title_en" placeholder="Project slogan" value="<?php echo $info_data['slogan_title_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill project vision
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    Vision detail
                                                </label>
                                                <textarea class="form-control" rows="4" name="slogan_en"><?php echo $info_data['slogan_en']; ?></textarea>
                                                <span class="m-form__help">
                                                    Please fill project vision detail
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-3">
                                                <label class="col col-form-label">Active Information</label>
                                                <div class="col">
                                                    <span class="m-switch m-switch--outline m-switch--success">
                                                        <label>
                                                            <input type="checkbox" name="info_active_en" value="1" <?php echo ($info_data['info_active_en'] == 1 ? 'checked="checked"' : ''); ?> />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    Project Detail
                                                </label>
                                                <textarea class="form-control ck-editor" rows="10" name="detail_en"><?php echo $info_data['detail_en']; ?></textarea>
                                                <span class="m-form__help">
                                                    Please fill project detail and you can use HTML tag
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    Project location
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_location_en" placeholder="Pattanakan 20" value="<?php echo $info_data['info_location_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill project location info
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    Train Station
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_bts_en" placeholder="BTS Akamai" value="<?php echo $info_data['info_bts_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill project train station
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    Highway
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_highway_en" placeholder="Srirat Highway" value="<?php echo $info_data['info_highway_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill project highway
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    Reserve money
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_promise_en" placeholder="Reserve by 5,000 baht" value="<?php echo $info_data['info_promise_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill project reserve money
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    Project area
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_area_en" placeholder="12-4-21 Rai" value="<?php echo $info_data['info_area_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill project area info
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    Project characteristics
                                                </label>
                                                <textarea class="form-control" rows="4" name="info_characteristics_en"><?php echo $info_data['info_characteristics_en']; ?></textarea>
                                                <span class="m-form__help">
                                                    Please fill project characteristics
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Designer
                                                </label>
                                                <textarea class="form-control" rows="6" name="info_designer_en"><?php echo $info_data['info_designer_en']; ?></textarea>
                                                <span class="m-form__help">
                                                    Please fill project designer
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    Project facility
                                                </label>
                                                <textarea class="form-control" rows="6" name="info_facility_en"><?php echo $info_data['info_facility_en']; ?></textarea>
                                                <span class="m-form__help">
                                                    Please fill project facility
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    Register for discount text
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_register_en" placeholder="Register for 5,000 baht discount" value="<?php echo $info_data['info_register_en']; ?>">
                                                <span class="m-form__help">
                                                    Please fill register for discount text
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
                                                    ชื่อโครงการ
                                                </label>
                                                <input type="text" class="form-control m-input" name="name_th" placeholder="ชื่อโครงการ" value="<?php echo $info_data['name_th']; ?>" readonly="readonly">
                                                <span class="m-form__help">
                                                    กรุณากรอกชื่อโครงการ
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    โลเคชั่นโครงการ
                                                </label>
                                                <input type="text" class="form-control m-input" name="location_th" placeholder="สุขุมวิท - สีลม" value="<?php echo $info_data['location_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกโลเคชั่นโครงการ
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    พื้นที่ของยูนิท
                                                </label>
                                                <input type="text" class="form-control m-input" name="space_th" placeholder="110 ตรม" value="<?php echo $info_data['space_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกพื้นที่ยูนิท
                                                </span>
                                            </div>
                                            <!-- <div class="col-lg-6">
                                                <label>
                                                    แนวคิดโครงการ
                                                </label>
                                                <textarea class="form-control" rows="4" name="vision_th"><?php echo $info_data['vision_th']; ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกแนวคิดโครงการ
                                                </span>
                                            </div> -->
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-3">
                                                <label class="col col-form-label">เปิดแสดงส่วนของแนวคิด</label>
                                                <div class="col">
                                                    <span class="m-switch m-switch--outline m-switch--success">
                                                        <label>
                                                            <input type="checkbox" name="slogan_active_th" value="1" <?php echo ($info_data['slogan_active_th'] == 1 ? 'checked="checked"' : ''); ?> />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    หัวข้อแนวคิดโครงการ
                                                </label>
                                                <input type="text" class="form-control m-input" name="vision_th" placeholder="หัวข้อแนวคิดโครงการ" value="<?php echo $info_data['vision_th']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    แนวคิดโครงการ <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="slogan_title_th" placeholder="สุนทรียภาพแห่งการใช้ชีวิตเหนือระดับ" value="<?php echo $info_data['slogan_title_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกแนวคิดโครงการ
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    รายละเอียดแนวคิด
                                                </label>
                                                <textarea class="form-control" rows="4" name="slogan_th"><?php echo $info_data['slogan_th']; ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกรายละเอียดแนวคิด
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-3">
                                                <label class="col col-form-label">เปิดแสดงส่วนของรายละเอียด</label>
                                                <div class="col">
                                                    <span class="m-switch m-switch--outline m-switch--success">
                                                        <label>
                                                            <input type="checkbox" name="info_active_th" value="1" <?php echo ($info_data['info_active_th'] == 1 ? 'checked="checked"' : ''); ?> />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    รายละเอียดของโครงการ
                                                </label>
                                                <textarea class="form-control ck-editor" rows="10" name="detail_th"><?php echo $info_data['detail_th']; ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกรายละเอียดของโครงการ สามารถใช้ tag HTML ได้
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    สถานที่ตั้งโครงการ
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_location_th" placeholder="พัฒนาการ 20" value="<?php echo $info_data['info_location_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกสถานที่ตั้งโครงการ
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    ใกล้รถไฟฟ้า
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_bts_th" placeholder="BTS เอกมัย" value="<?php echo $info_data['info_bts_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอก BTS ที่ใกล้โครงการ
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    ใกล้ทางด่วน
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_highway_th" placeholder="ทางด่วนศรีรัช" value="<?php echo $info_data['info_highway_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกทางด่วนที่ใกล้โครงการ
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    เงินจอง
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_promise_th" placeholder="จองเพียง 5,000 บาท" value="<?php echo $info_data['info_promise_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกเงินจอง
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    ขนาดพื้นที่รวมโครงการ
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_area_th" placeholder="12-4-21 ไร่" value="<?php echo $info_data['info_area_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกพื้นที่รวมโครงการ
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    ลักษณะของโครงการ
                                                </label>
                                                <textarea class="form-control" rows="4" name="info_characteristics_th"><?php echo $info_data['info_characteristics_th']; ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกลักษณะของโครงการ
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    ผู้ออกแบบโครงการ
                                                </label>
                                                <textarea class="form-control" rows="6" name="info_designer_th"><?php echo $info_data['info_designer_th']; ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกผู้ออกแบบโครงการ
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    สิ่งอำนวยความสะดวก
                                                </label>
                                                <textarea class="form-control" rows="6" name="info_facility_th"><?php echo $info_data['info_facility_th']; ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกสิ่งอำนวยความสะดวก
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label>
                                                    ข้อความลงทะเบียนรับสิทธิ์
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_register_th" placeholder="ลงทะเบียนรับส่วนลดทันที 5,000 บาท" value="<?php echo $info_data['info_register_th']; ?>">
                                                <span class="m-form__help">
                                                    กรุณากรอกข้อความลงทะเบียนรับสิทธิ์
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- END TH -->


                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-3">
                                            <label class="col col-form-label">Active 360 tour</label>
                                            <div class="col">
                                                <span class="m-switch m-switch--outline m-switch--success">
                                                    <label>
                                                        <input type="checkbox" name="360_active" value="1" <?php echo ($info_data['360_active'] == 1 ? 'checked="checked"' : ''); ?> />
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label>
                                                360 tour url
                                            </label>
                                            <textarea type="text" class="form-control m-input" name="360_iframe" rows="4"><?php echo $info_data['360_iframe']; ?></textarea>
                                            <span class="m-form__help">
                                                Please fill the 360 tour iframe url (100%x500px)
                                            </span>
                                        </div>
                                    </div>

                                    <!-- bg -->
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label>
                                                Project background
                                            </label>
                                            <div class="slim" data-size="1800,820" data-max-file-size="3" data-label="<i class='la la-cloud-upload' aria-hidden='true' style='font-size: 35px;color: #666;'></i>" data-default-input-name="project_image">
                                                <input type="file" name="project_image" accept="image/png, image/jpeg, image/gif, image/bmp, image/*" />
                                                <?php if ($info_data['project_image']): ?>
                                                    <img src="<?php echo base_url('../uploads/projects/' . $info_data['project_image']); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <span class="m-form__help">
                                                Image should be (1800x820 file size limit to 3mb)
                                            </span>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>
                                                Vision background
                                            </label>
                                            <div class="slim" data-size="1800,820" data-max-file-size="3" data-label="<i class='la la-cloud-upload' aria-hidden='true' style='font-size: 35px;color: #666;'></i>" data-default-input-name="slogan_image">
                                                <input type="file" name="slogan_image" accept="image/png, image/jpeg, image/gif, image/bmp, image/*" />
                                                <?php if ($info_data['slogan_image']): ?>
                                                    <img src="<?php echo base_url('../uploads/projects/' . $info_data['slogan_image']); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <span class="m-form__help">
                                                Image should be (1800x820 file size limit to 3mb)
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-4">
                                            <label>
                                                Project background (Mobile)
                                            </label>
                                            <div class="slim" data-size="768,820" data-max-file-size="6" data-label="<i class='la la-cloud-upload' aria-hidden='true' style='font-size: 35px;color: #666;'></i>" data-default-input-name="project_image_mob">
                                                <input type="file" name="project_image_mob" accept="image/png, image/jpeg, image/gif, image/bmp, image/*" />
                                                <?php if ($info_data['project_image_mob']): ?>
                                                    <img src="<?php echo base_url('../uploads/projects/' . $info_data['project_image_mob']); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <span class="m-form__help">
                                                Image should be (768x820px file size limit to 3mb)
                                            </span>
                                        </div>
                                        <div class="col-lg-6"> </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label>
                                                Infomation Background
                                            </label>
                                            <div class="slim" data-size="900,800" data-max-file-size="3" data-label="<i class='la la-cloud-upload' aria-hidden='true' style='font-size: 35px;color: #666;'></i>" data-default-input-name="info_image">
                                                <input type="file" name="info_image" accept="image/png, image/jpeg, image/gif, image/bmp, image/*" />
                                                <?php if ($info_data['info_image']): ?>
                                                    <img src="<?php echo base_url('../uploads/projects/' . $info_data['info_image']); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <span class="m-form__help">
                                                Image should be (900x800 file size limit to 3mb)
                                            </span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>
                                                Project logo
                                            </label>
                                            <div class="slim" data-max-file-size="3" data-label="<i class='la la-cloud-upload' aria-hidden='true' style='font-size: 35px;color: #666;'></i>" data-default-input-name="logo_image">
                                                <input type="file" name="logo_image" accept="image/png, image/jpeg, image/gif, image/bmp, image/*" />
                                                <?php if ($info_data['logo_image']): ?>
                                                    <img src="<?php echo base_url('../uploads/projects/' . $info_data['logo_image']); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <span class="m-form__help">
                                                (file size limit to 3mb)
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label>
                                                Map Image
                                            </label>
                                            <div class="slim" data-size="1800,650" data-max-file-size="3" data-did-remove="imageRemoved" data-label="<i class='la la-cloud-upload' aria-hidden='true' style='font-size: 35px;color: #666;'></i>" data-default-input-name="map_image">
                                                <input type="file" name="map_image" accept="image/png, image/jpeg, image/gif, image/bmp, image/*" />
                                                <?php if ($info_data['map_image']): ?>
                                                    <img src="<?php echo base_url('../uploads/projects/' . $info_data['map_image']); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <span class="m-form__help">
                                                Image should be (1800x650 file size limit to 3mb)
                                            </span>
                                        </div>
                                        <div class="col-lg-6"> </div>
                                    </div>

                                    <!-- end bg -->

                                    <div class="form-group m-form__group row">
                                        <div class="pull-lg-left">
                                            <label class="col col-form-label">Active Project</label>
                                            <div class="col">
                                                <span class="m-switch m-switch--outline m-switch--success">
                                                    <label>
                                                        <input type="checkbox" name="active" value="1" <?php echo ($info_data['active_info'] == 1 ? 'checked="checked"' : ''); ?> />
                                                        <span></span>
                                                    </label>
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

<script language="JavaScript">
    function imageRemoved(data) {

        $.ajax({

            url: '<?php echo base_url('projects/deleteimage_map'); ?>',

            type: 'post',

            dataType: 'json',

            data: {field: data.meta.imageId, id: <?php echo $edit_id; ?>},
            success: function (data) {
                if (data.code == 0) {

                } else {

                    return false;

                }

            }

        });

    }
</script>