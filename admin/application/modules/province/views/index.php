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
                                <!-- <a href="<?php echo base_url($page_url . '/add'); ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                    <span>
                                        <i class="flaticon-user-add"></i>
                                        <span>
                                            เพิ่ม<?php echo $page_text; ?>ใหม่
                                        </span>
                                    </span>
                                </a> -->
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
                        url: '<?php echo base_url($page_url . '/loadContent/' . $this->input->post('year')); ?>',
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
                field: 'pv.id',
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
                field: 'name_in_thai',
                title: 'จังหวัด',
                sortable: true,
            }, {
                field: 'rice_status',
                title: 'สถานะ',
                width: 300,
                filterable: false, // disable or enable filtering
                sortable: false,
                template: function(row, index, datatable) {
                    var html = '';
                    if(row.rice_status) {
                        html += '<div class="">\
                                    <span class="m-badge" style="background-color: '+ row.rice_color +'"></span>&nbsp;&nbsp;ระดับอันตรายข้าว (' + row.rice_text + ')\
                                </div>';
                    }
                    if(row.corn_status) {
                        html += '<div class="">\
                                    <span class="m-badge" style="background-color: '+ row.corn_color +'"></span>&nbsp;&nbsp;ระดับดันตรายข้าวโพด (' + row.corn_text + ')\
                                </div>';
                    }
                    return html;
                }
            }, {
                field: 'updated_at',
                title: 'แก้ไขเมื่อ',
                // sortable: 'asc', // default sort
                filterable: true, // disable or enable filtering
                sortable: true,
                // basic templating support for column rendering,
                //template: '{{OrderID}} - {{ShipCountry}}',
            }, {
                field: 'updated_name',
                title: 'แก้ไขโดย',
                // sortable: 'asc', // default sort
                filterable: true, // disable or enable filtering
                sortable: true,
                // basic templating support for column rendering,
                //template: '{{OrderID}} - {{ShipCountry}}',
            }, {
                field: 'Action',
                width: 110,
                title: 'ดำเนินการ',
                sortable: false,
                overflow: 'visible',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '\
                          <a href="' + base_url + modules_path + '/edit/' + row.prov_id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="แก้ไขข้อมูล">\
                              <i class="la la-edit"></i>\
                          </a>\
                      ';
                },
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