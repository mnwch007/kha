//== Class definition
var modules_path = 'contacts';
var DatatableRemoteAjax = function () {
    //== Private functions

    // basic demo
    var started = function () {
        var base_url = $('base').attr('href');
        var datatable = $('.m_datatable').mDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: base_url + modules_path +'/loadContent',
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
                    message: 'กำลังโหลดข้อมูล',
                }
            },

            sort: {
                sort: 'asc',
                field: 'contact_id',
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
                    field: 'contact_id',
                    title: '#',
                    sortable: true, // disable sort for this column
                    width: 40,
                    selector: false,
                    textAlign: 'center',
                }, {
                    field: 'contact_name',
                    title: 'ชื่อสถานที่',
                    sortable: true,
                }, {
                    field: 'contact_address',
                    title: 'ที่อยู่',
                    // sortable: 'asc', // default sort
                    filterable: false, // disable or enable filtering
                    sortable: false,
                    // basic templating support for column rendering,
                    //template: '{{OrderID}} - {{ShipCountry}}',
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
                    template: function (row, index, datatable) {
                        var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                        return '\
                          <a href="' + base_url + modules_path + '/edit/' + row.contact_id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="แก้ไขข้อมูล">\
                              <i class="la la-edit"></i>\
                          </a>\
                          <a href="' + base_url + modules_path + '/delete/' + row.contact_id + '" onclick="return confirm(\'คุณต้องการลบรายการข้อมูลนี้หรือไม่ ?\');" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="ลบข้อมูล">\
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

    };

    return {
        // public functions
        init: function () {
            started();
        },
    };
}();

jQuery(document).ready(function () {
    DatatableRemoteAjax.init();
});