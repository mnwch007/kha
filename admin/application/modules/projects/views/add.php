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
                                                    ชื่อโครงการ <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="name_th">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    สถานที่ตั้งโครงการ
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_location_th" >
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    พื้นที่โครงการ
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_area_th" >
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    ลักษณะโครงการ
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_characteristics_th" >
                                            </div>
                                        </div>


                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    รายละเอียดสั้น
                                                </label>
                                                <textarea class="form-control" rows="6" name="det_th"></textarea>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    สิ่งอำนวยความสะดวก
                                                </label>
                                                <input type="text" class="form-control m-input" data-role="tagsinput" name="info_facility_th">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-3">
                                                <label>
                                                    ละติจูด 
                                                </label>
                                                <input type="text" class="form-control m-input" name="lat" placeholder="18.913951">
                                            </div>
                                            <div class="col-lg-3">
                                                <label>
                                                    ลองจิจูด
                                                </label>
                                                <input type="text" class="form-control m-input" name="lng" placeholder="100.436234">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-md-12">
                                                <h4> รูปภาพ</h4>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    รูปภาพแบนเนอร์
                                                </label>
                                                <div class="slim" data-force-size="1900,540" data-max-file-size="3" data-label="<i class='la la-cloud-upload' aria-hidden='true' style='font-size: 35px;color: #666;'></i>" data-default-input-name="Image">
                                                    <input type="file" name="Image" accept="image/png, image/jpeg, image/gif, image/bmp, image/*" />
                                                </div>
                                                <span class="m-form__help">
                                                    Image should be (1900x540 file size limit to 3mb)
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    รูปภาพแบนเนอร์ (มือถือ)
                                                </label>
                                                <div class="slim" data-force-size="700,500" data-max-file-size="3" data-label="<i class='la la-cloud-upload' aria-hidden='true' style='font-size: 35px;color: #666;'></i>" data-default-input-name="Image_mob">
                                                    <input type="file" name="Image_mob" accept="image/png, image/jpeg, image/gif, image/bmp, image/*" />
                                                </div>
                                                <span class="m-form__help">
                                                    Image should be (700x500 file size limit to 3mb)
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
                                                </div>
                                                <span class="m-form__help">
                                                    Image should be (1800x650 file size limit to 3mb)
                                                </span>
                                            </div>
                                            <div class="col-lg-6"> 
                                                <label>
                                                    Embed a map
                                                </label>
                                                <textarea class="form-control" rows="6" name="map_code"></textarea>
                                                <div style="margin-top: 15px;">
                                                    <span class="m-form__help">ตัวอย่าง Embed a map</span><br/>
                                                    <a href="<?php echo base_url('assets/img/map_example.png'); ?>" target="_blank"><img src="<?php echo base_url('assets/img/map_example.png'); ?>" style="width: 100%;height: auto;max-width: 300px;"></a>
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
                                            <div class="col-lg-3">
                                                <label class="col col-form-label">Recommended</label>
                                                <div class="col">
                                                    <span class="m-switch m-switch--outline m-switch--success">
                                                        <label>
                                                            <input type="checkbox" name="home_active" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- END TH -->


                                    <!-- FOR ENG -->
                                    <div class="tab-pane" id="m_tabs_en" role="tabpanel">

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Name <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="name_en">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Location
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_location_en" >
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Area
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_area_en" >
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Characteristics
                                                </label>
                                                <input type="text" class="form-control m-input" name="info_characteristics_en">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Short Detail
                                                </label>
                                                <textarea class="form-control" rows="6" name="det_en"></textarea>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    Project Facility
                                                </label>
                                                <input type="text" class="form-control m-input" data-role="tagsinput" name="info_facility_en">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END EN -->

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
