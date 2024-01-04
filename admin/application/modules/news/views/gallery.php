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
                        <?php echo $page_text; ?> - Gallery
                    </h3>
                    <?php $this->load->view('inc-bread.php', [
                        'data' => [
                            'sq' => true,
                            'page_url' => $page_url,
                            'page_id' => $edit_id
                        ]
                    ]); ?>
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
                        <form action="<?php echo base_url($page_url . '/submit'); ?>" method="post" id="submitForm" data-url="<?php echo base_url($page_url . '/gallery/' . $edit_id); ?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                            <input type="hidden" name="mode" value="<?php echo $act_mode; ?>" />
                            <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>" />
                            <input type="hidden" name="postact" value="project_media" />
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

                                <div class="bx-upload m--hides">
                                    <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-info alert-dismissible fade show">
                                        <div class="m--space-10"></div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                0%
                                            </div>
                                        </div>
                                        <div class="m--space-10"></div>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-md-12">
                                        <h4>Photo Gallery</h4>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="pull-lg-left">
                                        <label class="col col-form-label">Active</label>
                                        <div class="col">
                                            <span class="m-switch m-switch--outline m-switch--success">
                                                <label>
                                                    <input type="checkbox" name="gallery_active" value="1" <?php echo ($info_data_main['gallery_active'] == 1 ? 'checked="checked"':''); ?> />
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <?php if(count($gallery_db)>0): ?>
                                <div class="form-group m-form__group row gallery_list">
                                    <?php foreach($gallery_db as $key => $row): ?>
                                        <?php if($row['file_path']): ?>
                                            <div class="col-lg-3 mgb-15 gallery_item" data-id="<?php echo $row['id']; ?>">
                                                <?php if($row['media_type'] == 0): ?>
                                                <div class="img-set">
                                                    <div class="center-block">
                                                        <a href="<?php echo base_url('../uploads/image_gallery/' . $row['file_path']); ?>" target="_blank"><img src="<?php echo base_url('../uploads/image_gallery/' . $row['file_path']); ?>" class="img-responsive center-block" /></a>
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
                                                <?php elseif($row['media_type'] == 1): ?>
                                                <div class="img-set">
                                                    <div class="center-block" style="background: #000">
                                                        <a href="<?php echo ($row['file_link'] ? $row['file_link']:'javascript:;'); ?>" target="_blank"><img src="<?php echo ($row['file_path']) ? base_url('../uploads/video_gallery/' . $row['file_path']) : base_url('images/hero-play.png'); ?>" class="img-responsive center-block" /></a>
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
                                    $(function () {
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
                                    });
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
                                <!-- image zone -->

                                <!-- Video zone -->
                                <div class="form-group m-form__group row">
                                    <div class="col-md-12">
                                        <h4>Video</h4>
                                    </div>
                                </div>
                                <?php /* if(count($video_db)>0): ?>
                                <div class="form-group m-form__group row">
                                    <?php foreach($video_db as $key => $row): ?>
                                        <?php if($row['file_path']): ?>
                                            <?php $get_tmn = $this->models->get_vdotem($row['file_path'], 10); ?>
                                            <div class="col-lg-3 mgb-15">
                                                <div class="img-set">
                                                    <div class="center-block" style="background: #000">
                                                        <a href="<?php echo base_url('../uploads/video_gallery/' . $row['file_path']); ?>" target="_blank"><img src="<?php echo ($get_tmn) ? base_url('../uploads/video_gallery/' . $get_tmn) : base_url('images/hero-play.png'); ?>" class="img-responsive center-block" /></a>
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
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; */ ?>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <input type="file" multiple class="form-control m-input" id="video_file" name="video_file[]">
                                        <span class="m-form__help">
                                            Please select the preview image of the video, support .jpg .png .bmp
                                        </span>
                                    </div>

                                    <div class="col-lg-4">
                                        <input type="text" class="form-control m-input" id="file_link" name="file_link">
                                        <span class="m-form__help">
                                            Please fill the link of video
                                        </span>
                                    </div>

                                    <div class="col-lg-12">
                                        <span class="m-form__help">
                                            Recommended image ratio 1600x600px and size limit 3mb
                                        </span>
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
