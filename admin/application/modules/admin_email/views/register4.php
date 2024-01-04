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
                    <?php
                    $this->load->view('inc-bread-email.php', [
                        'data' => [
                            'sq' => true,
                            'page_url' => $page_url,
                            'page_id' => $edit_id
                        ]
                    ]);
                    ?>
                    <div class="floting-proj"><?php echo $this->models->get_projectname($project_id); ?></div>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">

                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                <span>
                                                    <i class="la la-search"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                                            <a href="<?php echo base_url($page_url . '/export_register/' . $project_id); ?>" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                                                <span>
                                                                    <i class="flaticon-download"></i>
                                                                    <span>
                                                                        Export to .csv
                                                                    </span>
                                                                </span>
                                                            </a>
                                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                        </div>-->
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
    jQuery(document).ready(function () {
        //== Private functions
        // basic demo
        var base_url = '<?php echo base_url($page_url); ?>';
        var datatable = $('.m_datatable').mDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '<?php echo base_url($page_url . '/loadRegister4/' . $project_id); ?>',
                        map: function (raw) {
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
                    message: 'Processing..',
                }
            },

            sort: {
                sort: 'desc',
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
            columns: [
			  {
                    field: 'remark',
                    title: 'จุดประสงค์การโอน',
                    // sortable: 'asc', // default sort
                    filterable: false, // disable or enable filtering
                    sortable: false,
                    // basic templating support for column rendering,
                    //template: '{{OrderID}} - {{ShipCountry}}',
                },
                {
                    field: 'ref_no',
                    title: 'เลขที่อ้างอิง',
                    // sortable: 'asc', // default sort
                    filterable: false, // disable or enable filtering
                    sortable: false,
                    // basic templating support for column rendering,
                    //template: '{{OrderID}} - {{ShipCountry}}',
                }, {
                    field: 'name',
                    title: 'ชื่อ-นามสกุล',
                    // sortable: 'asc', // default sort
                    filterable: false, // disable or enable filtering
                    sortable: false,
                    // basic templating support for column rendering,
                    //template: '{{OrderID}} - {{ShipCountry}}',
                }, {
                    field: 'email',
                    title: 'อีเมล์',
                    // sortable: 'asc', // default sort
                    filterable: false, // disable or enable filtering
                    sortable: false,
                    // basic templating support for column rendering,
                    //template: '{{OrderID}} - {{ShipCountry}}',
                }, {
                    field: 'tel',
                    title: 'เบอร์โทรศัพท์',
                    width: 100,
                    sortable: false,
                }, {
                    field: 'amount',
                    title: 'จำนวน (บาท)',
                    // sortable: 'asc', // default sort
                    filterable: false, // disable or enable filtering
                    sortable: false
                }, {
                    field: 'action',
                    width: 110,
                    title: 'action',
                    sortable: false,
                    overflow: 'visible',
                    template: function (row, index, datatable) {
                        var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                        return '\
                    <a href="' + base_url + '/payment_delete/' + row.id + '" class="crm-delete m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\
                        <i class="la la-trash"></i>\
                    </a>\
                ';
                    },
                }],
        });

        $('#m_form_status').on('change', function () {
            datatable.search($(this).val(), 'Status');
        });

        $('#m_form_type').on('change', function () {
            datatable.search($(this).val(), 'Type');
        });
    });
</script>