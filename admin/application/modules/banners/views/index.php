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
                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                <a href="<?php echo base_url($page_url . '/add'); ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                    <span>
                                        <i class="flaticon-user-add"></i>
                                        <span>
                                            New <?php echo $page_text; ?>
                                        </span>
                                    </span>
                                </a>
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
                        url: '<?php echo base_url($page_url . '/loadContent'); ?>',
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
                    message: 'Loading...',
                }
            },

            sort: {
                sort: 'asc',
                field: 'Sequence',
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
                    field: 'banner_image',
                    title: 'Image',
                    width: 100,
                    sortable: false,
                    template: function (row) {
                        return '<img src="../uploads/banner/' + row.banner_image + '" class="img-responsive" style="max-width: 250px" />';
                    },
                }, {
                    field: 'banner_title_th',
                    title: 'หัวข้อแบนเนอร์',
                    // sortable: 'asc', // default sort
                    filterable: true, // disable or enable filtering
                    sortable: true,
                    // basic templating support for column rendering,
                    //template: '{{OrderID}} - {{ShipCountry}}',
                }, {
                    field: 'banner_title_en',
                    title: 'Banner Name',
                    // sortable: 'asc', // default sort
                    filterable: true, // disable or enable filtering
                    sortable: true,
                    // basic templating support for column rendering,
                    //template: '{{OrderID}} - {{ShipCountry}}',
                }, {
                    field: 'banner_link',
                    title: 'Banner Link',
                    // sortable: 'asc', // default sort
                    filterable: true, // disable or enable filtering
                    sortable: true,
                    // basic templating support for column rendering,
                    //template: '{{OrderID}} - {{ShipCountry}}',
                }, {
                    field: 'id',
                    title: 'Seq',
                    filterable: false,
                    sortable: false,
                    template: function (row, index) {
                        var textResp = '';
                        if ((index + 1) > 1) {
                            textResp += '<button class="btn btn-default btn-sm" onclick="updateSEQ(\'up\', \'banners\', \'Sequence\', \'banner_id\', ' + row.banner_id + ' , {});"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>'
                        }
                        if ((index + 1) < <?php echo (int) $this->mains->getCountdata('banners'); ?>) {
                            textResp += '<button class="btn btn-default btn-sm" onclick="updateSEQ(\'down\', \'banners\', \'Sequence\', \'banner_id\', ' + row.banner_id + ' , {});"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>'
                        }
                        return textResp;
                    }
                }, {
                    field: 'active',
                    title: 'Active',
                    width: 60,
                    filterable: true,
                    sortable: true,
                    class: 'text-center',
                    template: function (row) {
                        return '<input type="checkbox" class="setActive" value="1" data-id-field="banner_id" data-id="' + row.banner_id + '" data-url="<?php echo base_url(); ?>" data-table="banners" data-field="active" value="1" ' + (row.active == 1 ? "checked" : "") + ' />'
                    }
                }, {
                    field: 'updated_at',
                    title: 'Updated at',
                    // sortable: 'asc', // default sort
                    filterable: true, // disable or enable filtering
                    sortable: true,
                    // basic templating support for column rendering,
                    //template: '{{OrderID}} - {{ShipCountry}}',
                }, {
                    field: 'Action',
                    width: 110,
                    title: 'Action',
                    sortable: false,
                    overflow: 'visible',
                    template: function (row, index, datatable) {
                        var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                        return '\
                        <a href="' + base_url + '/edit/' + row.banner_id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="แก้ไขข้อมูล">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="' + base_url + '/delete/' + row.banner_id + '" onclick="return confirm(\'Do you want to delete this row ?\');" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="ลบข้อมูล">\
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

        $('#m_form_status, #m_form_type').selectpicker();

    });
</script>