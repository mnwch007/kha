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
                        เพิ่ม<?php echo $page_text; ?>
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
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            กรุณาเลือกหน่วยงาน:
                                        </label>
                                        <?php
                                        /* get data */
                                        $get_department = $this->mains->get_usertable('department');
                                        ?>
                                        <select class="form-control m-input m-input--square" name="department_id" id="department_id" required="required">
                                            <option value="">กรุณาเลือก</option>
                                            <?php foreach ($get_department as $key => $row): ?>
                                                <option value="<?php echo $row['department_id']; ?>" <?php echo ($row['department_id'] == $info_data['department_id'] ? 'selected':''); ?>><?php echo $row['department_name']; ?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <span class="m-form__help">
                                            กรุณาเลือกหน่วยงาน
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>
                                            ชื่อสถานที่
                                        </label>
                                        <input type="text" class="form-control m-input" name="contact_name" placeholder="กรุณากรอกชื่อสถานที่" required="required" value="<?php echo $info_data['contact_name']; ?>">
                                        <span class="m-form__help">
                                            กรุณากรอกชื่อสถานที่
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <label>
                                            เบอร์โทรติดต่อ
                                        </label>
                                        <input type="text" class="form-control m-input" name="contact_tel" placeholder="กรุณากรอกเบอร์โทร" required="required" value="<?php echo $info_data['contact_tel']; ?>">
                                        <span class="m-form__help">
                                            กรุณากรอกเบอร์โทร
                                        </span>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>
                                            อีเมล์ (ถ้ามี)
                                        </label>
                                        <input type="email" class="form-control m-input" name="contact_email" placeholder="กรุณากรอกอีเมล์ (ถ้ามี)" value="<?php echo $info_data['contact_email']; ?>">
                                        <span class="m-form__help">
                                            กรุณากรอกอีเมล์ (ถ้ามี)
                                        </span>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>
                                            ไอดีไลน์ (ถ้ามี)
                                        </label>
                                        <input type="text" class="form-control m-input" name="contact_line" placeholder="กรุณากรอกไอดีไลน์ (ถ้ามี)" value="<?php echo $info_data['contact_line']; ?>">
                                        <span class="m-form__help">
                                            กรุณากรอกไอดีไลน์ (ถ้ามี)
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            ลติจูต (latitude)
                                        </label>
                                        <input type="text" class="form-control m-input" name="latitude" placeholder="กรุณากรอกลติจูตของที่ตั้ง" required="required" value="<?php echo $info_data['latitude']; ?>">
                                        <span class="m-form__help">
                                            กรุณากรอกลติจูตของที่ตั้ง
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>
                                            ลองติจูต (longitude)
                                        </label>
                                        <input type="text" class="form-control m-input" name="longtitude" placeholder="กรุณากรอกลองติจูต (longitude)" required="required" value="<?php echo $info_data['longtitude']; ?>">
                                        <span class="m-form__help">
                                            กรุณากรอกลองติจูต (longitude)
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-12">
                                        <label>
                                            ที่อยู่
                                        </label>
                                        <textarea class="form-control m-input" name="contact_address" placeholder="กรุณากรอกที่อยู่" required="required"><?php echo $info_data['contact_address']; ?></textarea>
                                        <span class="m-form__help">
                                            กรุณากรอกที่อยู่
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn m-setfont__main btn-success">
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
