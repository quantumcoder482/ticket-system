$(function() {

    var _url = $("#_url").val();

    var $ib_data_panel = $("#ib_data_panel");

    $ib_data_panel.block({ message:block_msg });

    $.fn.modal.defaults.width = '700px';

    var $modal = $('#ajax-modal');

    $('[data-toggle="tooltip"]').tooltip();

    var ib_dt = $('#ib_dt').DataTable( {

        "serverSide": true,
        "ajax": {
            "url": base_url + "leads/json_list/",
            "type": "POST",
            "data": function ( d ) {

                d.first_name = $('#filter_first_name').val();
                d.last_name = $('#filter_last_name').val();
                d.middle_name = $('#filter_middle_name').val();
                d.email = $('#filter_email').val();
                d.salutation = $('#filter_salutation').val();
                d.company = $('#filter_company').val();
                d.phone = $('#filter_phone').val();
                d.status = $('#filter_status').val();


            }
        },
        "pageLength": 10,
        responsive: true,
        dom: "<'row'<'col-sm-6'i><'col-sm-6'B>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'><'col-sm-7'p>>",
        fixedHeader: {
            headerOffset: 50
        },
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            {
                extend:    'colvis',
                text:      '<i class="fa fa-columns"></i>',
                titleAttr: 'Columns'
            },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Print'
            },
            {
                extend:    'pageLength',
                text:      '<i class="fa fa-bars"></i>',
                titleAttr: 'Entries'
            }
        ],
        "columnDefs": [
            { "orderable": false, "targets": 8 }
        ],
        "order": [[ 0, 'desc' ]],
        "scrollX": true,
        "initComplete": function () {
            $ib_data_panel.unblock();
        }
    } );

    var $ib_filter = $("#ib_filter");

    $('.add_item').on('click', function(e){

        e.preventDefault();

        $('body').modalmanager('loading');

        $modal.load( _url + 'leads/modal_lead/new/', '', function(){

            $modal.modal();

            $('#is_public').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'icheckbox_square-blue',
                increaseArea: '20%' // optional
            });

            $('.selectpicker').selectpicker({
                style: 'btn-primary',
                size: 4
            });

            // $('#memo').redactor(
            //     {
            //         minHeight: 200, // pixels
            //         plugins: ['fontcolor']
            //     }
            // );

            ib_editor("#memo");



        });
    });





    $modal.on('click', '.modal_submit', function(e){

        e.preventDefault();

        $modal.modal('loading');

        $.post( _url + "leads/post/", $("#ib_modal_form").serialize())
            .done(function( data ) {

                if ($.isNumeric(data)) {
                    $modal.modal('hide');
                    $ib_data_panel.block({ message:block_msg });

                    ib_dt.ajax.reload(
                        function () {
                            $ib_data_panel.unblock();
                        }
                    );

                }

                else {
                    $modal.modal('loading');
                    toastr.error(data);
                }

            });

    });


    $modal.on('click', '.act_convert_to_customer', function(e){

        e.preventDefault();

        $modal.modal('loading');

        $.post( base_url + "leads/convert_to_customer/", { lid: $("#v_lid").val() })
            .done(function( data ) {

                if ($.isNumeric(data)) {

                    window.location = base_url + 'contacts/view/' + data;

                }

                else {
                    $modal.modal('loading');
                    toastr.error(data);
                }

            });

    });

    $modal.on('click', '.act_memo_update', function(e){

        e.preventDefault();

        $modal.modal('loading');

        $.post( base_url + "leads/update_memo/", { lid: $("#v_lid").val(), memo:$("#v_memo").val() })
            .done(function( data ) {

                $modal.modal('loading');
                toastr.success(data);

            });

    });





    $ib_filter.on('click', function(e) {
        e.preventDefault();

        $ib_data_panel.block({ message:block_msg });

        ib_dt.ajax.reload(
            function () {
                $ib_data_panel.unblock();
            }
        );


    });


    $ib_data_panel.on('click', '.cdelete', function(e){
        e.preventDefault();
        var lid = this.id;
        bootbox.confirm(_L['are_you_sure'], function(result) {
            if(result){

                $.get( base_url + "delete/lead/"+lid, function( data ) {
                    $ib_data_panel.block({ message:block_msg });

                    ib_dt.ajax.reload(
                        function () {
                            $ib_data_panel.unblock();
                        }
                    );
                });


            }
        });

    });

    $ib_data_panel.on('click', '.cedit', function(e){
        e.preventDefault();
        var lid = this.id;
        $('body').modalmanager('loading');

        $modal.load( _url + 'leads/modal_lead/edit/'+lid, '', function(){

            $modal.modal();

            $('#is_public').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'icheckbox_square-blue',
                increaseArea: '20%' // optional
            });

            $('.selectpicker').selectpicker({
                style: 'btn-primary',
                size: 4
            });

            ib_editor("#memo");



        });


    });

    $ib_data_panel.on('click', '.cview', function(e){
        e.preventDefault();
        var lid = this.id;
        $.fn.modal.defaults.width = '1000px';
        $('body').modalmanager('loading');

        $modal.load( _url + 'leads/modal_lead/view/'+lid, '', function(){

            $modal.modal();

            ib_editor("#v_memo");



        });

    });





});