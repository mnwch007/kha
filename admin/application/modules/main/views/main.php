<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
        <i class="la la-close"></i>
    </button>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
        <?php $this->load->view('inc-menu'); ?>
    </div>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Dashboard
                    </h3>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->

        <!-- END: Subheader -->
        <div class="m-content">
            <!--begin:: Widgets/Stats-->
            <div class="m-portlet ">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">

                        <div class="col-md-12 col-lg-4 col-xl-4">
                            <!--begin::New Orders-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Projects
                                    </h4>
                                    <br>
                                    <span class="m-widget24__desc">
                                        All Projects
                                    </span>
                                    <span class="m-widget24__stats m--font-danger">
                                        <?php echo $get_ulevel = $this->db->count_all_results('projects'); ?>
                                    </span>
                                    <div class="m--space-30"></div>
                                    <div class="m-widget24__desc">
                                        <a href="<?php echo base_url('projects'); ?>" class="btn btn-outline-warning m-btn m-btn--outline-2x">Go to Projects</a>
                                    </div>
                                    <div class="m--space-30"></div>
                                </div>
                            </div>
                            <!--end::New Orders-->
                        </div>

                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::Total Profit-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h3 class="m-widget24__title">
                                        News & Events
                                    </h3>
                                    <br>
                                    <span class="m-widget24__desc">
                                        All News & Events
                                    </span>
                                    <span class="m-widget24__stats m--font-brand">
                                        <?php echo $get_ulevel = $this->db->count_all_results('news'); ?>
                                    </span>
                                    <div class="m--space-30"></div>
                                    <div class="m-widget24__desc">
                                        <a href="<?php echo base_url('news'); ?>" class="btn btn-outline-warning m-btn m-btn--outline-2x">Go to News & Events</a>
                                    </div>
                                    <div class="m--space-30"></div>
                                </div>
                            </div>
                            <!--end::Total Profit-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Feedbacks-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Subscriber
                                    </h4>
                                    <br>
                                    <span class="m-widget24__desc">
                                        All Subscriber
                                    </span>
                                    <span class="m-widget24__stats m--font-info">
                                        <?php echo $get_ulevel = $this->db->count_all_results('subscribers'); ?>
                                    </span>
                                    <div class="m--space-30"></div>
                                    <div class="m-widget24__desc">
                                        <a href="<?php echo base_url('subscribe'); ?>" class="btn btn-outline-warning m-btn m-btn--outline-2x">Go to Subscriber</a>
                                    </div>
                                    <div class="m--space-30"></div>
                                </div>
                            </div>
                            <!--end::New Feedbacks-->
                        </div>

                    </div>
                </div>
            </div>
            <!--end:: Widgets/Stats-->

        </div>
    </div>
</div>
<!-- end:: Body -->