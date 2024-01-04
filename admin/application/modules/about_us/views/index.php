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
                    <?php $this->load->view('inc-bread.php'); ?>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">

                <!--begin::Form-->
                <!-- <form action="" method="post" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                    <input type="hidden" name="mode" value="<?php echo $act_mode; ?>" />
                    <div class="m-portlet__body">
                        <div class="bx-respone m--hides">
                            <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="m-alert__icon">
                                    <i class="la la-clock-o"></i>
                                </div>
                                <div class="m-alert__text">
                                    กำลังทำรายการกรุณากรอกซักครู่
                                </div>
                                <div class="m-alert__close">
                                    <button type="button" class="close" onclick="$('.bx-respone.m--hides').hide();" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>
                                    ช่วงวัน
                                </label>
                                <div class="input-group" id="m_daterangepicker_2">
                                    <input type="text" name="date_range" class="form-control m-input" readonly  placeholder="กรุณาเลือกช่วงวัน" value="<?php echo $_POST['date_range']; ?>"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>
                                    ชื่อผู้ใช้งาน
                                </label>
                                <input type="text" class="form-control m-input" name="login" placeholder="ชื่อผู้ใช้งาน" value="<?php echo $_POST['login']; ?>">
                            </div>
                            <div class="col-lg-4">
                                <label>
                                    ชื่อ
                                </label>
                                <input type="text" class="form-control m-input" name="full_name" placeholder="ชื่อ" value="<?php echo $_POST['full_name']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn m-setfont__main btn-success">
                                        ค้นหา
                                    </button>
                                    <button type="reset" class="btn m-setfont__main btn-secondary" onclick="window.location.href='<?php echo base_url($page_url); ?>';">
                                        ยกเลิก
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> -->
                <!--end::Form-->
                
                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <input type="text" class="form-control m-input" placeholder="ค้นหา..." id="generalSearch">
                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                <span>
                                                    <i class="la la-search"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                <form method="post" action="<?php echo base_url($page_url . '/export'); ?>">
                                    <?php foreach($_POST as $key => $row): ?>
                                        <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $row; ?>" />
                                    <?php endforeach; ?>
                                    <button type="submit" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                        <span>
                                            <i class="flaticon-download"></i>
                                            <span>
                                                Export to .csv
                                            </span>
                                        </span>
                                    </button>
                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </form>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <div class="m_datatable" id="ajax_data"></div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Body -->
<script>
//== Class definition
var modules_path = '<?php echo $this->router->class; ?>';
var DatatableRemoteAjax = function() {
    //== Private functions

    // basic demo
    var started = function() {
        var base_url = $('base').attr('href');
        var datatable = $('.m_datatable').mDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '<?php echo base_url($page_url . '/loadContent/'); ?>',
                        method: 'POST',
                        params: <?php echo json_encode($_POST); ?>,
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
                saveState: {
                    cookie: false,
                    webstorage: false
                }
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
                spinner: {
                    message: 'กำลังโหลดข้อมูล',
                }
            },

            sort: {
                sort: 'asc',
                field: 'id',
            },

            // column sorting
            sortable: true,
            pagination: true,
            toolbar: {
                // toolbar items
                items: {
                    // pagination
                    pagination: {
                        // page size select
                        pageSizeSelect: [10, 20, 30, 50, 100],
                    },
                },
            },

            search: {
                input: $('#generalSearch'),
            },

            // columns definition
            columns: [{
                field: 'id',
                title: '#',
                sortable: true, // disable sort for this column
                width: 40,
                selector: false,
                textAlign: 'center',
            }, {
                field: 'Email',
                title: 'email',
                sortable: true,
            }, {
                field: 'created_at',
                title: 'created_at',
                sortable: true,
            }],
        });

        $('#m_form_status').on('change', function() {
            datatable.search($(this).val(), 'Status');
        });

        $('#m_form_type').on('change', function() {
            datatable.search($(this).val(), 'Type');
        });

        $('#m_form_status, #m_form_type').selectpicker();

    };

    return {
        // public functions
        init: function() {
            started();
        },
    };
}();

jQuery(document).ready(function() {
    DatatableRemoteAjax.init();
});
</script>