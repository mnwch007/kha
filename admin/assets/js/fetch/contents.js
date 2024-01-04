//== Class definition
var modules_path = 'contents';
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
                        url: base_url + modules_path + '/loadContent',
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
                    message: 'Processing...',
                }
            },

            sort: {
                sort: 'asc',
                field: 'content_id',
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
                field: 'content_id',
                title: '#',
                sortable: true, // disable sort for this column
                width: 40,
                selector: false,
                textAlign: 'center',
            }, {
                field: 'content_title_en',
                title: 'Title (EN)',
                sortable: true,
            }, {
                field: 'content_title_th',
                title: 'Title (TH)',
                sortable: true,
            }, {
                field: 'updated_at',
                title: 'updated at',
                // sortable: 'asc', // default sort
                filterable: true, // disable or enable filtering
                sortable: true,
                // basic templating support for column rendering,
                //template: '{{OrderID}} - {{ShipCountry}}',
            }, {
                field: 'updated_name',
                title: 'update by',
                // sortable: 'asc', // default sort
                filterable: true, // disable or enable filtering
                sortable: true,
                // basic templating support for column rendering,
                //template: '{{OrderID}} - {{ShipCountry}}',
            }, {
                field: 'active',
                title: 'Active',
                width: 40,
                filterable: true,
                sortable: true,
                template: function(row) {
                    return '<input type="checkbox" class="setActive" value="1" data-id-field="content_id" data-id="' + row.content_id + '" data-url="' + $('base').attr('href') + '" data-table="contents" data-field="active" value="1" ' + (row.active == 1 ? "checked" : "") + ' />'
                }
            }, {
                field: 'Action',
                width: 110,
                title: 'action',
                sortable: false,
                overflow: 'visible',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '\
                          <a href="' + base_url + modules_path + '/edit/' + row.content_id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="แก้ไขข้อมูล">\
                              <i class="la la-edit"></i>\
                          </a>\
                          <a href="' + base_url + modules_path + '/delete/' + row.content_id + '" onclick="return confirm(\'คุณต้องการลบรายการข้อมูลนี้หรือไม่ ?\');" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="ลบข้อมูล">\
                              <i class="la la-trash"></i>\
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