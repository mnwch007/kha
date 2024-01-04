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
                        <?php echo $page_text; ?> - Room plan
                    </h3>
                    <?php $this->load->view('inc-bread.php', [
                        'data' => [
                            'sq' => true,
                            'page_url' => $page_url,
                            'page_id' => $edit_id
                        ]
                    ]); ?>
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
                        <form action="<?php echo base_url($page_url . '/submit'); ?>" method="post" id="submitForm" data-url="<?php echo base_url($page_url . '/roomplan/' . $edit_id); ?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                            <input type="hidden" name="mode" value="<?php echo $act_mode; ?>" />
                            <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>" />
                            <input type="hidden" name="postact" value="room_plan" />
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
                                        <h4>Room Plan</h4>
                                    </div>
                                </div>
                                
                                <!-- bg -->
                                <div class="form-group m-form__group row">
                                    <div class="pull-lg-left">
                                        <label class="col col-form-label">Active</label>
                                        <div class="col">
                                            <span class="m-switch m-switch--outline m-switch--success">
                                                <label>
                                                    <input type="checkbox" name="roomplan_active" value="1" <?php echo ($info_data_main['roomplan_active'] == 1 ? 'checked="checked"':''); ?> />
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php if(count($plan_db)>0): ?>
                                <div class="form-group m-form__group row">
                                    <?php foreach($plan_db as $key => $row): ?>
                                        <?php if($row['plan_image']): ?>
                                            <div class="col-lg-3 mgb-15">
                                                <div class="img-set">
                                                    <div class="center-block">
                                                        <a href="<?php echo base_url('../uploads/roomplan/' . $row['plan_image']); ?>" target="_blank"><img src="<?php echo base_url('../uploads/roomplan/' . $row['plan_image']); ?>" class="img-responsive center-block" /></a>
                                                    </div>
                                                    <div class="content">
                                                        <div class="pull-left">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="input_floor_<?php echo $row['id']; ?>" value="<?php echo $row['plan_name_en']; ?>" />
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-success submit-realtime" type="button"
                                                                    data-url="<?php echo base_url(); ?>"
                                                                    data-table="projects_plan" 
                                                                    data-field="plan_name_en,plan_name_th,plan_floor_en,plan_floor_th"
                                                                    data-idfield="id"
                                                                    data-fvalue="#input_floor_<?php echo $row['id']; ?>"
                                                                    data-id="<?php echo $row['id']; ?>">
                                                                        <i class="la la-save"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pull-right">
                                                            <a href="<?php echo base_url($page_url . '/floorplan_delete/' . $edit_id . '/' . $row['id']); ?>" class="crm-delete m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <input type="file" multiple class="form-control m-input" id="image_file" name="image_file[]">
                                        <span class="m-form__help">
                                            You can select multiple file, support .jpg .png .bmp
                                        </span>
                                        <span class="m-form__help font-red">
                                            Loop name format "Room_Plan_1-5.jpg" the program will be gererate 5 rows of Room Plan (1-5)
                                        </span>
                                    </div>

                                    <div class="col-lg-12">
                                        <span class="m-form__help">
                                            Recommended image ratio 1600x600px and size limit 3mb
                                        </span>
                                    </div>

                                </div>
                                <!-- image zone -->

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
