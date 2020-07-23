{extends file="$layouts_admin"}

{block name="content"}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
 
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6" style="padding-top: 20px">

                        <form id="frm_search">
                            <div class="form-group">
                                <label for="daterange">Date Range</label>
                                <input type="text" name="daterange" class="form-control" id="daterange">
                            </div>
                            {if $user['user_type'] eq 'Admin'}
                            <div class="form-group">
                                <label class="control-label" for="employee_id">Employee</label>
                                <select id="employee_id" name="employee_id" class="form-control">
                                    <option value="" selected>{$_L['All']}</option>
                                    {foreach $employees as $employee}
                                    <option value="{$employee['id']}">{$employee['fullname']}</option>
                                    {/foreach}
                                </select>
                            </div>
                            {/if}
                            <div class="form-group">
                                <label class="control-label" for="pay_for">Pay for</label>
                                <input type="text" id="pay_for" name="pay_for" class="form-control">
                            </div>

                            <!-- <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" id="amount" name="amount" class="form-control">
                            </div> -->

                            <div class="form-group">
                                <label for="request">Request</label>
                                <select id="request" name="request" class="form-control">
                                    <option value="" selected>{$_L['All']}</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                               <select id="status" name="status" class="form-control">
                                   <option value="" selected>{$_L['All']}</option>
                                   <option value="Not Processed">Not Processed</option>
                                   <option value="Processed">Processed</option>
                                   <option value="Paid">Paid</option>
                               </select>
                            </div>

                            <input type="hidden" id="sure_msg" value="{$_L['are_you_sure']}" />
                            <button type="submit" id="ib_filter" class="btn btn-primary">Filter</button>

                            <br>
                        </form>
                    </div>
                    <div class="col-md-9 col-sm-6 ib_right_panel">
                        <div class="ibox-title">
                            <h5 style="font-weight: bold;">Salary List</h5>
                            {if $user['user_type'] eq 'Admin'}
                            <div class="ibox-tools">
                                <a href="#" class="btn btn-primary btn-xs new-salary"><i
                                        class="fa fa-plus"></i>Add Salary</a>
                            </div>
                            {/if}
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-12">
                                <div id="ib_act_hidden" style="display: none;">
                                    <a href="#" id="delete_multiple_salaries" class="btn btn-danger"><i
                                            class="fa fa-trash"></i> {$_L['Delete']}</a>
                                    <hr>
                                </div>
                                <div class="table-responsive" id="ib_data_panel">
                                    <table class="table table-bordered table-hover display" id="ib_dt">
                                        <thead>
                                            <tr class="heading" style="width: 100%;">
                                                <th><input id="d_select_all" type="checkbox" value="" name=""
                                                        class="i-checks" /></th>
                                                <th width="50px"> # </th>
                                                <th width="100px">Date</th>
                                                <th>Employee</th>
                                                <th>Pay for</th>
                                                <th>Amount</th>
                                                <th>Request</th>
                                                <th class="text-center" width="100px">Status</th>
                                                <th class="text-center" width="80px">Manage</th>
                                            </tr>
                                            <!-- <tr class="heading">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><input type="text" id="filter_employee" name="filter_employee"
                                                        class="form-control"></td>
                                                <td><input type="text" id="filter_payfor" name="filter_payfor"
                                                        class="form-control"></td>
                                                <td><input type="text" id="filter_amount" name="filter_amount"
                                                        class="form-control"></td>
                                                <td>
                                                    <select id="filter_request" name="filter_request" class="form-control">
                                                        <option value=""></option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="filter_status" name="filter_status" class="form-control">
                                                        <option value=""></option>
                                                        <option value="Not Processed">Not Processed</option>
                                                        <option value="Processed">Processed</option>
                                                        <option value="Paid">Paid</option>
                                                    </select>
                                                </td>
                                                <td class="text-center" style="width: 80px;"><button type="submit"
                                                        id="inner_filter"
                                                        class="btn btn-primary">{$_L['Filter']}</button></td>
                                            </tr> -->
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div> <!-- Row end-->

{/block}

{block name="script"}
<script>
    
$(document).ready(function() {
$('#toggle-demo').bootstrapToggle();
    var $ib_data_panel = $("#ib_data_panel");

    $ib_data_panel.block({ message:block_msg });

    var $employee = $('#employee_id');
    var $pay_for = $('#pay_for');
    var $amount = $('#amount');
    var $request = $('#request');
    var $status = $('#status');
    
    $employee.select2({
        theme: "bootstrap"
    });

    $request.select2({
        theme: "bootstrap"
    });

    $status.select2({
        theme:"bootstrap"
    });


    var _url = $("#_url").val();

    $.fn.modal.defaults.width = '650px';
    var $modal = $('#ajax-modal');


    var selected = [];
    var ib_act_hidden = $("#ib_act_hidden");
    function ib_btn_trigger() {
        if(selected.length > 0){
            ib_act_hidden.show(200);
        }
        else{
            ib_act_hidden.hide(200);
        }
    }


    // $(".cdelete").click(function (e) {

    //     e.preventDefault();
    //     id = this.id;
    //     var sure_msg = $('#sure_msg').val();

    //     bootbox.confirm(sure_msg, function (result) {

    //         if (result) {

    //             var _url = $("#_url").val();

    //             window.location.href = _url + "hrm/delete_salary/" + id;
    //         }
    //     });
    // });

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    var $daterange = $("#daterange");

    $daterange.daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale: {
            format: 'YYYY/MM/DD'
        }
    }, cb);

    cb(start, end);

    var ib_dt = $('#ib_dt').DataTable( {

        "serverSide": true,
        "ajax": {
            "url": base_url + "hrm/tr_list/",
            "type": "POST",
            "data": function ( d ) {
                d.employee = $employee.val();
                d.amount = $amount.val();
                d.pay_for = $pay_for.val();
                d.request = $request.val();
                d.status = $status.val();
                d.daterange = $daterange.val();
            }
        },
        "pageLength": 20,
        autoWidth: false,
        responsive: false,
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
        "orderCellsTop": true,
        "columnDefs": [
            { "orderable": false, "targets": 8 },
            { "orderable": false, "targets": 1 },
            { "orderable": false, "targets": 0 }
        ],
        "order": [[ 1, 'desc' ]],
        "scrollX": true,
        "initComplete": function () {
            $ib_data_panel.unblock();
            listen_change();
        },
        "drawCallback": function() {
            listen_change();
            ib_autonumeric();
            toggle_button_triger();
        }
    });

    var $ib_filter = $("#ib_filter");
   
    $ib_filter.on('click', function(e) {
        e.preventDefault();

        $ib_data_panel.block({ message:block_msg });

        ib_dt.ajax.reload(
            function () {
                $ib_data_panel.unblock();
                listen_change();
                $('.i-checks').iCheck('uncheck');
            }
        );
    });
 
    // var $ib_inner_filter = $("#inner_filter");
    
    // $ib_inner_filter.on('click', function(e) {
    //     e.preventDefault();

    //     $ib_data_panel.block({ message:block_msg });

    //     ib_dt.ajax.reload(
    //         function () {
    //             $ib_data_panel.unblock();
    //             listen_change();
    //             $('.i-checks').iCheck('uncheck');
    //         }
    //     );
    // });

    $('.new-salary').on('click', function(e){
        
        e.preventDefault();

        $('body').modalmanager('loading');

        $modal.load(_url + 'hrm/create_salary/', '', function () {

            $modal.modal();

        });

    })

    $ib_data_panel.on('click', '.cdelete', function(e){

        e.preventDefault();
        var id = this.id;
        bootbox.confirm(_L['are_you_sure'], function(result) {
            if(result){

                $.get( _url + "hrm/delete_salary/"+id, function( data ) {
                    $ib_data_panel.block({ message:block_msg });

                    ib_dt.ajax.reload(
                        function () {
                            $ib_data_panel.unblock();
                            listen_change();
                            $('.i-checks').iCheck('uncheck');
                        }
                    );
                });


            }
        });

    });

    $ib_data_panel.on('click', '.cedit', function(e) {

        e.preventDefault();
        var id = this.id;

        $('body').modalmanager('loading');

        $modal.load(_url + 'hrm/edit_salary/'+id, '', function () {

            $modal.modal();

        });
    });

    $ib_data_panel.on('click', '.cview', function(e) {

        e.preventDefault();
        var id = this.id;

        $('body').modalmanager('loading');

        $modal.load(_url + 'hrm/view_salary/'+id, '', function () {

            $modal.modal();

        });
    });

    $ib_data_panel.on('change', '.check-status', function(e) {
        e.preventDefault()
        var post_data = $(this).prop('checked') ? 'yes' : 'no';
        var id = this.id;
        $.post(_url + 'hrm/update_status', {
            'id' : id,
            'value':post_data
        }).done(function(data){
            if ($.isNumeric(data)){
                // toastr.success('updated status successful');
                ib_dt.ajax.reload(
                    function () {
                        $ib_data_panel.unblock();
                        listen_change();
                        $('.i-checks').iCheck('uncheck');
                    }
                );
            }
            else {
                toastr.error(data);
            }
        })
        $(this).prop('checked')
    })

    $modal.on('click', '.modal_submit', function (e) {

        e.preventDefault();

        $modal.modal('loading');

        $.post(_url + 'hrm/salary_post', $("#mrform").serialize())
            .done(function (data) {
                if ($.isNumeric(data)) {
                    window.location.reload();
                }
                else {
                    $modal.modal('loading');
                    toastr.error(data);
                }
            });
    });

    $("#delete_multiple_salaries").click(function(e){
        e.preventDefault();
        bootbox.confirm(_L['are_you_sure'], function(result) {
            if(result){
                $.redirect(_url + "hrm/delete_salaries/",{ ids: selected});
            }
        });

    });

    function listen_change() {

        var i_checks = $('.i-checks');
        i_checks.iCheck({
            checkboxClass: 'icheckbox_square-blue'
        });

        i_checks.on('ifChanged', function (event) {

            var id = $(this)[0].id;

            var index = $.inArray(id, selected);

            if($(this).iCheck('update')[0].checked){

                if(id == 'd_select_all'){

                    //   ib_dt.rows().select();

                    i_checks.iCheck('check');

                    return;
                }

                selected.push( id );

                //  $(this).closest('tr').toggleClass('selected');

                ib_btn_trigger();

            }
            else{

                if(id == 'd_select_all'){

                    i_checks.iCheck('uncheck');

                    return;
                }

                selected.splice( index, 1 );

                //  $(this).closest('tr').toggleClass('selected');

                ib_btn_trigger();

            }

        });
    }

    function toggle_button_triger(){
        $('.check-status').bootstrapToggle({
            on: 'Yes',
            off: 'No'
        });
    }

    listen_change();
    toggle_button_triger();

    
    function ib_autonumeric() {
        $('.amount').autoNumeric('init', {

            aSign: '{$config['currency_code']} ',
            dGroup: {$config['thousand_separator_placement']},
            aPad: {$config['currency_decimal_digits']},
            pSign: '{$config['currency_symbol_position']}',
            aDec: '{$config['dec_point']}',
            aSep: '{$config['thousands_sep']}',
            vMax: '9999999999999999.00',
            vMin: '-9999999999999999.00'

        });

    }

    ib_autonumeric();

});

</script>
{/block}
