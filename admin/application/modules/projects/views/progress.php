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
                        <?php echo $page_text; ?> - Progress
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
                        <form action="<?php echo base_url($page_url . '/submit'); ?>" method="post" id="submitForm" data-url="<?php echo base_url($page_url . '/progress/' . $edit_id); ?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" autocomplete="off">
                            <input type="hidden" name="mode" value="<?php echo $act_mode; ?>" />
                            <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>" />
                            <input type="hidden" name="postact" value="project_progress" />
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
                                                    <input type="checkbox" name="progress_active" value="1" <?php echo ($info_data_main['progress_active'] == 1 ? 'checked="checked"' : ''); ?> />
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-8" style="min-width: 550px;">
                                        <div class="row">
                                            <div class="col text-center">งาน (TH)</div>
                                            <div class="col text-center">Work (EN)</div>
                                            <div class="col text-center">%</div>
                                            <div class="col">&nbsp;</div>
                                        </div>
                                        <div id="result_input">
                                            <?php
                                            if (is_array($info_work) && count($info_work) > 0):
                                                foreach ($info_work as $k => $v):
                                                    ?>
                                                    <div class="row mb-1 form-input">
                                                        <div class="col"><input type="text" class="form-control m-input" name="work_th[]" value="<?= $v['work_th'] ?>"></div>
                                                        <div class="col"><input type="text" class="form-control m-input" name="work_en[]" value="<?= $v['work_en'] ?>"></div>
                                                        <div class="col"><input type="number" class="form-control m-input" name="work_pc[]" value="<?= $v['work_pc'] ?>" ></div>
                                                        <div class="col"></div>
                                                    </div>
                                                    <?php
                                                endforeach;
                                            else:
                                                ?>
                                                <div class="row mb-1 form-input">
                                                    <div class="col"><input type="text" class="form-control m-input" name="work_th[]" value=""></div>
                                                    <div class="col"><input type="text" class="form-control m-input" name="work_en[]" value=""></div>
                                                    <div class="col"><input type="number" class="form-control m-input" name="work_pc[]" value="" ></div>
                                                    <div class="col"></div>
                                                </div>
                                            <?php
                                            endif;
                                            ?>


                                        </div>
                                        <div class="row mt-2 mb-3">
                                            <div class="col">
                                                <button type="button" class="btn m-setfont__main btn-success add_input">เพิ่ม</button>
                                                <button type="button" class="btn m-setfont__main btn-danger remove_input">ลบ</button>
                                            </div>
                                        </div>
                                    </div>

                                    <?php /*

                                      <div class="col-lg-3">
                                      <label>
                                      งานโครงสร้าง (%)
                                      </label>
                                      <input type="number" class="form-control m-input" name="struc_pc" value="<?php echo $info_data['struc_pc']; ?>" placeholder="0">
                                      <span class="m-form__help"></span>
                                      </div>

                                      <div class="col-lg-3">
                                      <label>
                                      งานสถาปัตยกรรม (%)
                                      </label>
                                      <input type="number" class="form-control m-input" name="desi_pc" value="<?php echo $info_data['desi_pc']; ?>" placeholder="0">
                                      <span class="m-form__help"></span>
                                      </div>

                                      <div class="col-lg-3">
                                      <label>
                                      งานระบบ (%)
                                      </label>
                                      <input type="number" class="form-control m-input" name="system_pc" value="<?php echo $info_data['system_pc']; ?>" placeholder="0">
                                      <span class="m-form__help"></span>
                                      </div>
                                     */ ?>
                                    <div class="col-lg-4">
                                        <label>
                                            ผลรวม (%)
                                        </label>
                                        <input type="number" class="form-control m-input" name="total_pc" value="<?php echo $info_data['total_pc']; ?>" placeholder="0">
                                        <span class="m-form__help"></span>
                                    </div>



                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-md-12">
                                        <h4>Progress Gallery</h4>
                                    </div>
                                </div>
                                <?php if (count($gallery_db) > 0): ?>
                                    <div class="form-group m-form__group row gallery_list">
                                        <?php foreach ($gallery_db as $key => $row): ?>
                                            <?php if ($row['file_path']): ?>
                                                <div class="col-lg-3 mgb-15 gallery_item" data-id="<?php echo $row['id']; ?>">
                                                    <div class="img-set">
                                                        <div class="center-block">
                                                            <a href="<?php echo base_url('../uploads/progress/' . $row['file_path']); ?>" target="_blank"><img src="<?php echo base_url('../uploads/progress/' . $row['file_path']); ?>" class="img-responsive center-block" /></a>
                                                        </div>
                                                        <div class="content">
                                                            <div class="pull-left">
                                                                <?php echo $row['file_name']; ?>
                                                            </div>
                                                            <div class="pull-right">
                                                                <a href="<?php echo base_url($page_url . '/progress_media_delete/' . $edit_id . '/' . $row['id']); ?>" class="crm-delete m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                    url: '<?php echo base_url($page_url . '/update_sq_progress'); ?>',
                                                    dataType: 'html',
                                                    type: 'POST',
                                                    data: {data_set: letter},
                                                    success: function (d) {
                                                        toastr['success']('Progress Gallery sequence updated successfull', 'Respone');
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

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            อัพเดทล่าสุดเมื่อ
                                        </label>
                                        <input type="text" class="form-control m-input" name="update_date" value="<?php echo $info_data['update_date']; ?>">
                                        <span class="m-form__help"></span>
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

<script>
    $(".add_input").on("click", function () {
//    $("ul:last").clone().appendTo(".str").find(":text").val("");
        $(".form-input:first-child").clone().appendTo('#result_input').find(":input").val("");
    });
    $(".remove_input").on("click", function () {
        var No = $('.form-input').length;
        if (No > 1) {
            $(".form-input").last().remove();
        }
    });
</script>