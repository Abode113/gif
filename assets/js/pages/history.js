$(document).ready(function () {

    $(document).on('click','#deleteRole', function () {
        alert($(this).data('id'));
    });


    var datatable = $('.kt-datatable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    method: 'GET',
                    url: siteURL + 'requests/historylist.php',
                    params: {
                        action: 'tags-list'
                    },
                    map: function (raw) {
                        var dataSet = raw;
                        if (raw.code === 1) {
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        } else if (raw.code === -50) {

                        } else {
                            notification('danger', raw.msg)
                        }
                    }
                },
            },
            pageSize: 10,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
        },

        // layout definition
        layout: {
            scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
            height: null, // datatable's body's fixed height
            footer: false, // display/hide footer
            icons: {
                pagination: {
                    next: 'fa fa-angle-right',
                    prev: 'fa fa-angle-left',
                    first: 'fa fa-angle-double-left',
                    last: 'fa fa-angle-double-right',
                    more: 'fa fa-ellipsis-h'
                },
                rowDetail: {
                    expand: 'fa fa-caret-down',
                    collapse: 'fa fa-caret-right'
                }

            }
        },

        // column sorting
        sortable: true,

        pagination: true,

        search: {
            delay: 400,
            onEnter: true,
            input: $('#generalSearch'),
        },

        // columns definition
        columns: [
            {
                field: 'id',
                title: '#',
                width: 30,
                type: 'number',
                selector: false,
                textAlign: 'center',
            },{
                field: 'searchText',
                title: lang.searchText,
            },{
                field: 'searchTime',
                title: lang.searchTime,
            }],

        translate: {
            records: {
                processing: lang.pleaseWait,
                noRecords: lang.noResult,
            },
            toolbar: {
                pagination: {
                    items: {
                        default: {
                            first: lang.first,
                            prev: lang.previous,
                            next: lang.previous,
                            last: lang.last,
                            more: lang.morePage,
                            input: lang.input,
                            select: lang.select,
                        },
                        info: lang.displaying + ' {{start}} - {{end}} ' + lang.of + ' {{total}} ' + lang.records,
                    },
                },
            },
        },
    });


})