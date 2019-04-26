<?php
/* Smarty version 3.1.33, created on 2018-10-29 18:36:42
  from '/Users/razib/Documents/valet/suite/ui/theme/default/contacts_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bd78b7a94d485_95759310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8cdab635c60a7d6da9a2b1aa54f16333d1b540d8' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/contacts_list.tpl',
      1 => 1540372154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bd78b7a94d485_95759310 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17690710625bd78b7a93e784_85873468', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5548184695bd78b7a9474d9_46520304', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_17690710625bd78b7a93e784_85873468 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17690710625bd78b7a93e784_85873468',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/add/" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Customer'];?>
</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/import_csv/" class="btn btn-success"><i class="fa fa-upload"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Import'];?>
</a>




                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">



                    <div id="ib_act_hidden" style="display: none;">
                        <a href="#" id="send_group_email" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Send Email'];?>
</a>
                        <a href="#" id="assign_to_group" class="btn btn-primary"><i class="fa fa-users"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Assign to Group'];?>
</a>
                                                <a href="#" id="delete_multiple_customers" class="btn btn-danger"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>

                        <hr>
                    </div>

                    <div class="table-responsive" id="ib_data_panel">


                        <table class="table table-bordered table-hover display" id="ib_dt" width="100%">
                            <thead>
                            <tr class="heading">
                                <th><input id="d_select_all" type="checkbox" value="" name=""  class="i-checks"/></th>
                                <th>#</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Image'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>

                                <?php if ($_smarty_tpl->tpl_vars['show_company_column']->value) {?>

                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company Name'];?>
</th>

                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['show_group_column']->value) {?>

                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Group'];?>
</th>

                                <?php }?>


                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</th>
                                <th class="text-right" style="width: 80px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                            </tr>

                            <tr class="heading">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="text" id="account" name="account" class="form-control"></td>

                                <?php if ($_smarty_tpl->tpl_vars['show_company_column']->value) {?>

                                    <td><input type="text" id="filter_company" name="filter_company" class="form-control"></td>

                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['show_group_column']->value) {?>

                                    <td><input type="text" id="filter_group" name="filter_group" class="form-control"></td>

                                <?php }?>


                                <td><input type="email" id="filter_email" name="filter_email" class="form-control"></td>
                                <td><input type="text" id="filter_phone" name="filter_phone" class="form-control"></td>
                                <td class="text-right" style="width: 80px;"><button type="submit" id="ib_filter" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Filter'];?>
</button></td>
                            </tr>
                            </thead>




                        </table>
                    </div>



                </div>
            </div>
        </div>

    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_5548184695bd78b7a9474d9_46520304 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_5548184695bd78b7a9474d9_46520304',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        $(function() {

            var _url = $("#_url").val();

            var $ib_data_panel = $("#ib_data_panel");

            $ib_data_panel.block({ message:block_msg });

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


            $('[data-toggle="tooltip"]').tooltip();

            var ib_dt = $('#ib_dt').DataTable( {

                "serverSide": true,
                "ajax": {
                    "url": base_url + "contacts/json_list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
",
                    "type": "POST",
                    "data": function ( d ) {

                        d.account = $('#account').val();
                        d.email = $('#filter_email').val();

                        <?php if ($_smarty_tpl->tpl_vars['show_company_column']->value) {?>

                        d.company = $('#filter_company').val();

                        <?php }?>


                        <?php if ($_smarty_tpl->tpl_vars['show_group_column']->value) {?>

                        d.group = $('#filter_group').val();

                        <?php }?>


                        d.phone = $('#filter_phone').val();



                    }
                },
                "pageLength": 20,
                "rowCallback": function( row, data ) {
                    if ( $.inArray(data.DT_RowId, selected) !== -1 ) {
                        $(row).addClass('selected');

                    }
                },
                responsive: true,
                dom: "<'row'<'col-sm-6'i><'col-sm-6'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'><'col-sm-7'p>>",

                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    {
                        extend:    'pageLength',
                        text:      '<i class="fa fa-bars"></i>',
                        titleAttr: 'Entries'
                    },
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
                    }

                ],
                "orderCellsTop": true,
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="' + base_url +'contacts/view/'+ row[9] +'">'+ data +'</a>';
                        },
                        "targets": 3
                    },

                    { "orderable": false, "targets": 0 },

                    <?php if ($_smarty_tpl->tpl_vars['show_company_column']->value && $_smarty_tpl->tpl_vars['show_group_column']->value) {?>

                    { "orderable": false, "targets": 8 },

                    <?php } elseif ($_smarty_tpl->tpl_vars['show_company_column']->value && $_smarty_tpl->tpl_vars['show_group_column']->value == false) {?>

                    { "orderable": false, "targets": 7 },

                    <?php } elseif ($_smarty_tpl->tpl_vars['show_group_column']->value && $_smarty_tpl->tpl_vars['show_company_column']->value == false) {?>

                    { "orderable": false, "targets": 7 },

                    <?php } else { ?>

                    { "orderable": false, "targets": 6 },

                    <?php }?>


                    { "orderable": false, "targets": 2 },
                    { className: "text-center", "targets": [ 1 ] },
                    { "type": "html-num", "targets": 1 }
                ],
                "order": [[ 1, 'desc' ]],
                "scrollX": true,
                "initComplete": function () {
                    $ib_data_panel.unblock();

                    listen_change();
                },
                select: {
                    info: false
                }
            } );

            var $ib_filter = $("#ib_filter");


            $ib_filter.on('click', function(e) {
                e.preventDefault();

                $ib_data_panel.block({ message:block_msg });

                ib_dt.ajax.reload(
                    function () {
                        $ib_data_panel.unblock();
                        listen_change();
                    }
                );


            });


            // $('#ib_dt tbody').on('click', 'tr', function () {
            //     var id = this.id;
            //     var index = $.inArray(id, selected);
            //
            //     if ( index === -1 ) {
            //         selected.push( id );
            //     } else {
            //         selected.splice( index, 1 );
            //     }
            //
            //     $(this).toggleClass('selected');
            //
            //     ib_btn_trigger();
            //
            //
            //
            // } );


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

            listen_change();



            $('#ib_dt tbody').on('click', '.phone_number', function () {

                var phone_number = $(this).html();





            } );


            $ib_data_panel.on('click', '.cdelete', function(e){
                e.preventDefault();
                var lid = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){

                        $.get( base_url + "delete/crm-user/"+lid, function( data ) {
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

            $("#send_group_email").click(function(e){
                e.preventDefault();
                $.redirect(base_url + "handler/bulk_email/",{ type: "customers", ids: selected});
            });

            // $("#assign_to_group").click(function(e){
            //     e.preventDefault();
            //
            // });

            $('#assign_to_group').webuiPopover({
                type:'async',
                placement:'top',

                cache: false,
                width:'240',
                url: base_url + 'handler/groups/'
            });

            $('body').on('change', '#input_assign_group', function(e){

                $('.webui-popover').block({ message: block_msg});

                $.post( base_url + "contacts/set_group/", { gid: $('#input_assign_group').val(), ids: selected })
                    .done(function( data ) {

                        $('.webui-popover').unblock();
                        $ib_data_panel.block({ message:block_msg });
                        ib_dt.ajax.reload(
                            function () {
                                $ib_data_panel.unblock();
                                listen_change();
                                $('.i-checks').iCheck('uncheck');
                            }
                        );


                        toastr.success(data);


                    });



            });

            $("#delete_multiple_customers").click(function(e){
                e.preventDefault();
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        $.redirect(base_url + "delete/multiple/",{ type: "customers", ids: selected});
                    }
                });

            });




        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
