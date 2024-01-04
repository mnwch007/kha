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
                                                <input type="text" class="form-control m-input m_datepicker" name="date" value="<?php echo dateFormat($info_data['date'], 'Y-m-d') ?>" autocomplete="off">
                                            </div>
                                            <div class="col-lg-3">
                                                <label>
                                                    วันที่หมดอายุ
                                                </label>
                                                <input type="text" class="form-control m-input m_datepicker" name="expired" value="<?php echo dateFormat($info_data['expired'], 'Y-m-d') ?>"  autocomplete="off">
                                            </div>
                                        </div>



                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    หัวข้อข่าว <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="title_th" value="<?php echo $info_data['title_th']; ?>" placeholder="หัวข้อข่าว">
                                                <span class="m-form__help">
                                                    กรุณากรอกหัวข้อข่าว
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    รายละเอียดสั้น
                                                </label>
                                                <textarea class="form-control" rows="6" name="short_detail_th"><?php echo $info_data['short_detail_th']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    URL <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="url_th" id="url_th" value="<?php echo $info_data['url_th']; ?>" placeholder="">
                                                <span class="m-form__help">
                                                    Please fill the url of news
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    คีย์เวิร์ด
                                                </label>
                                                <input type="text" class="form-control m-input" data-role="tagsinput" name="keyword_th" id="keyword_th" value="<?php echo $info_data['keyword_th']; ?>" placeholder="">
                                                <span class="m-form__help">
                                                    กรุณากรอกคีย์เวิร์ดของเพจสำหรับ SEO
                                                </span>
                                            </div>
                                        </div>


                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    รายละเอียดข่าว
                                                </label>
                                                <textarea class="form-control ck-editor" rows="10" name="detail_th"><?php echo $info_data['detail_th']; ?></textarea>
                                                <span class="m-form__help">
                                                    กรุณากรอกรายละเอียดข่าว (สามารถใช้ Tag HTML ได้)
                                                </span>
                                            </div>
                                        </div>


                                        <?php /* <div class="form-group m-form__group row">
                                          <div class="col-md-12">
                                          <h4>Image</h4>
                                          </div>
                                          </div>

                                          <div class="form-group m-form__group row">
                                          <div class="col-lg-6">
                                          <label>
                                          News Cover
                                          </label>
                                          <div class="slim" data-force-size="1900,540" data-max-file-size="3" data-label="<i class='la la-cloud-upload' aria-hidden='true' style='font-size: 35px;color: #666;'></i>" data-default-input-name="Image">
                                          <input type="file" name="Image" accept="image/png, image/jpeg, image/gif, image/bmp, image/*" />
                                          <?php if ($info_data['image']): ?>
                                          <img src="<?php echo base_url('../uploads/news/' . $info_data['image']); ?>" />
                                          <?php endif; ?>
                                          </div>
                                          <span class="m-form__help">
                                          Image should be (1900x540 file size limit to 3mb)
                                          </span>
                                          </div>
                                          <div class="col-lg-6">
                                          <label>
                                          News Cover (mobile)
                                          </label>
                                          <div class="slim" data-force-size="700,500" data-max-file-size="3" data-label="<i class='la la-cloud-upload' aria-hidden='true' style='font-size: 35px;color: #666;'></i>" data-default-input-name="Image_mob">
                                          <input type="file" name="Image_mob" accept="image/png, image/jpeg, image/gif, image/bmp, image/*" />
                                          <?php if ($info_data['image_mob']): ?>
                                          <img src="<?php echo base_url('../uploads/news/' . $info_data['image_mob']); ?>" />
                                          <?php endif; ?>
                                          </div>
                                          <span class="m-form__help">
                                          Image should be (700x500 file size limit to 3mb)
                                          </span>
                                          </div>
                                          </div> */ ?>

                                        <div class="form-group m-form__group row">
                                            <div class="col-md-12">
                                                <h4>Gallery</h4>
                                            </div>
                                        </div>

<!--                                        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>-->
<!--                                        <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>" type="text/javascript"></script>-->
                                        <script type="text/javascript">
//                                           var $q = jQuery.noConflict();
                                        </script>
                                        <?php if (count($gallery_db) > 0): ?>
                                            <div class="form-group m-form__group row gallery_list">
                                                <?php foreach ($gallery_db as $key => $row): ?>
                                                    <?php if ($row['file_path']): ?>
                                                        <div class="col-lg-3 mgb-15 gallery_item" data-id="<?php echo $row['id']; ?>">
                                                            <?php if ($row['media_type'] == 0): ?>
                                                                <div class="img-set">
                                                                    <div class="center-block">
                                                                        <a href="<?php echo base_url('../uploads/news/' . $row['file_path']); ?>" target="_blank"><img src="<?php echo base_url('../uploads/news/' . $row['file_path']); ?>" class="img-responsive center-block" /></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <div class="pull-left">
                                                                            <?php echo $row['file_name']; ?>
                                                                        </div>
                                                                        <div class="pull-right">
                                                                            <a href="<?php echo base_url($page_url . '/media_delete/' . $edit_id . '/' . $row['id']); ?>" class="crm-delete m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-trash"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php elseif ($row['media_type'] == 1): ?>
                                                                <div class="img-set">
                                                                    <div class="center-block" style="background: #000">
                                                                        <a href="<?php echo ($row['file_link'] ? $row['file_link'] : 'javascript:;'); ?>" target="_blank"><img src="<?php echo ($row['file_path']) ? base_url('../uploads/video_gallery/' . $row['file_path']) : base_url('images/hero-play.png'); ?>" class="img-responsive center-block" /></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <div class="pull-left">
                                                                            <?php echo $row['file_name']; ?>
                                                                        </div>
                                                                        <div class="pull-right">
                                                                            <a href="<?php echo base_url($page_url . '/media_delete/' . $edit_id . '/' . $row['id']); ?>" class="crm-delete m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-trash"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                            <script>
                                                /*  (function () {
                                                 $('.gallery_list').sortable({
                                                 items: '.gallery_item',
                                                 handle: '.img-set'
                                                 }).bind('sortupdate', function () {
                                                 var letter = [];
                                                 $('.gallery_item').each(function (index) {
                                                 var setData = {
                                                 seq: index,
                                                 id: $(this).attr('data-id')
                                                 };
                                                 letter.push(setData);
                                                 });
                                                 
                                                 $.ajax({
                                                 url: '<?php echo base_url($page_url . '/update_sq'); ?>',
                                                 dataType: 'html',
                                                 type: 'POST',
                                                 data: {data_set: letter},
                                                 success: function (d) {
                                                 toastr['success']('Gallery sequence updated successfull', 'Respone');
                                                 }
                                                 });
                                                 });
                                                 });*/
                                            </script>
                                        <?php endif; ?>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <input type="file" multiple class="form-control m-input" id="image_file" name="image_file[]">
                                                <span class="m-form__help">
                                                    You can select multiple file, support .jpg .png .bmp
                                                </span>
                                            </div>

                                            <div class="col-lg-12">
                                                <span class="m-form__help">
                                                    Recommended image ratio 1600x600px and size limit 3mb
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

                                            <?php /*  <div class="col-lg-3">
                                              <label class="col col-form-label">Old news</label>
                                              <div class="col">
                                              <span class="m-switch m-switch--outline m-switch--success">
                                              <label>
                                              <input type="checkbox" name="old" value="1" <?php echo ($info_data['old'] == 1 ? 'checked' : ''); ?> />
                                              <span></span>
                                              </label>
                                              </span>
                                              </div>
                                              </div> */ ?>
                                        </div>



                                    </div>



                                    <div class="tab-pane" id="m_tabs_en" role="tabpanel">

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Title <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="title_en" value="<?php echo $info_data['title_en']; ?>" onkeyup="return genURL(this, '#url_en');" placeholder="News title">
                                                <span class="m-form__help">
                                                    Please fill project name
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    Short Detail
                                                </label>
                                                <textarea class="form-control" rows="6" name="short_detail_en"><?php echo $info_data['short_detail_en']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6">
                                                <label>
                                                    URL <span class="font-red">*</span>
                                                </label>
                                                <input type="text" class="form-control m-input" name="url_en" id="url_en" placeholder=""  value="<?php echo $info_data['url_en']; ?>" >
                                                <span class="m-form__help">
                                                    Please fill the url of news
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>
                                                    Keyword
                                                </label>
                                                <input type="text" class="form-control m-input" data-role="tagsinput" name="keyword_en" id="keyword_en" placeholder=""  value="<?php echo $info_data['keyword_en']; ?>" >
                                                <span class="m-form__help">
                                                    Please fill the keyword
                                                </span>
                                            </div>
                                        </div>


                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label>
                                                    News Detail
                                                </label>
                                                <textarea class="form-control ck-editor" rows="10" name="detail_en"><?php echo $info_data['detail_en']; ?></textarea>
                                                <span class="m-form__help">
                                                    Please fill news detail and you can use HTML tag
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
