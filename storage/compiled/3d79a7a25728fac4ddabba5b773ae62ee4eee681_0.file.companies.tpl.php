<?php
/* Smarty version 3.1.33, created on 2019-02-12 04:52:22
  from '/Users/razib/Documents/valet/suite/ui/theme/default/companies.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c629756c5d4b8_43710758',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d79a7a25728fac4ddabba5b773ae62ee4eee681' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/companies.tpl',
      1 => 1549965140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c629756c5d4b8_43710758 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_609361155c629756c43dd7_95198595', "content");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17463239185c629756c5a6f6_49463638', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_609361155c629756c43dd7_95198595 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_609361155c629756c43dd7_95198595',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">
                <div class="panel-body">

                    <a href="#" class="btn btn-primary add_company waves-effect waves-light" id="add_company"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['New Company'];?>
</a>


                </div>

            </div>
        </div>



    </div>

    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">


                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input type="text" name="name" id="foo_filter" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
..."/>

                                </div>
                            </div>

                        </div>
                    </form>


                    <div class="table-responsive">
                        <table class="table table-bordered table-hover footable" data-filter="#foo_filter" data-page-size="50">
                            <thead>
                            <tr>
                                <th class="bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logo'];?>
</th>
                                <th class="bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company Name'];?>
</th>
                                <th class="bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</th>
                                <th class="bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</th>
                                <th class="text-center bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['companies']->value, 'company');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['company']->value) {
?>
                                <tr data-id="<?php echo $_smarty_tpl->tpl_vars['company']->value['id'];?>
">
                                    <td>

                                        <?php if ($_smarty_tpl->tpl_vars['company']->value['logo_url'] != '') {?>
                                            <img style="max-height: 40px;" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/companies/<?php echo $_smarty_tpl->tpl_vars['company']->value['logo_url'];?>
">
                                        <?php } else { ?>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/assets/img/default_company.png">
                                        <?php }?>

                                    </td>
                                    <td>
                                        <a class="cview" id="ae<?php echo $_smarty_tpl->tpl_vars['company']->value['id'];?>
" href="#">
                                            <?php echo $_smarty_tpl->tpl_vars['company']->value['company_name'];?>

                                            <?php if ($_smarty_tpl->tpl_vars['company']->value['code'] != '') {?>
                                                <br>
                                                <?php echo $_smarty_tpl->tpl_vars['company']->value['code'];?>

                                            <?php }?>
                                        </a>
                                    </td>
                                    <td><a href="#" class="send_email"><?php echo $_smarty_tpl->tpl_vars['company']->value['email'];?>
</a> </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['company']->value['phone'];?>
</td>
                                    <td class="text-right">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
" id="be<?php echo $_smarty_tpl->tpl_vars['company']->value['id'];?>
" class="btn btn-inverse btn-xs cedit" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
"><i class="fa fa-pencil"></i> </a>


                                        <a href="#" class="btn btn-danger btn-xs cdelete" id="c<?php echo $_smarty_tpl->tpl_vars['company']->value['id'];?>
" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
"><i class="fa fa-trash"></i> </a>
                                    </td>

                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>






                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination">
                                    </ul>
                                </td>
                            </tr>
                            </tfoot>

                        </table>
                    </div>

                </div>
            </div>
        </div>



    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_company" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_17463239185c629756c5a6f6_49463638 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_17463239185c629756c5a6f6_49463638',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/footable/js/footable.all.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>

        $(function() {


            $('.footable').footable();

            //  var tab = $("#_active_tab").val();
            var tab = 'summary';


            function updateDiv(action,base_url,cid,cb){

                var $ibox_form = $('#ibox_form');
                $ibox_form.block({ message: block_msg });

                // if (window.history.replaceState) {
                //     window.history.replaceState( {} , '',  _url + 'contacts/view/'+ cid +'/' + action + '/' );
                // }


                $('.list-group a.active').removeClass('active');
                $("#"+action).addClass("active");



                $.post(base_url +  "contacts/company_" +action + '/', {
                    cid: cid

                })
                    .done(function (data) {

                        $("#application_ajaxrender").html(data);
                        $ibox_form.unblock();

                        cb();


                        $('.amount').autoNumeric('init');

                    });

            }

            var cb  =  function cb(){



                switch(tab) {
                    case "memo":

                        ib_editor('#v_memo',400);



                        break;





                    default:

                    //cb = function cb (){
                    //    //  return;
                    //};

                }




            };



            var _url = $("#_url").val();

            $.fn.modal.defaults.width = '700px';




            var $modal = $('#ajax-modal');

            $('[data-toggle="tooltip"]').tooltip();

            $('.add_company').on('click', function(e){

                e.preventDefault();

                $('body').modalmanager('loading');

                $modal.load( _url + 'contacts/modal_add_company/', '', function(){

                    $modal.modal();

                    $modal.css("width", "700px");
                    $modal.css("margin-left", "-349px");

                    $modal.modal();

                    $("#ajax-modal .country").select2({
                        theme: "bootstrap"
                    });

                });
            });



            function sendEmail(email,loader) {

                $('body').modalmanager('loading');

                $modal.load( base_url + 'handler/email/' + email + '/', '', function(){

                    $modal.modal();

                    if(loader){
                        $('body').modalmanager('loading');
                    }

                    ib_editor('#email_content',300,false);

                });

            }


            $modal.on('click', '.modal_submit', function(e){

                e.preventDefault();

                $modal.modal('loading');

                $.post( _url + "contacts/add_company_post/", $("#ib_modal_form").serialize())
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
                        }

                    });

            });

            $modal.on('click', '.cedit', function(e){

                e.preventDefault();
                var id = this.id;

                $('body').modalmanager('loading');

                $modal.css("width", "700px");
                $modal.css("margin-left", "-349px");

                $modal.load( _url + 'contacts/modal_add_company/'+ id + '/', '', function(){

                    $modal.modal();

                    $('body').modalmanager('loading');

                });

            });


            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        var _url = $("#_url").val();
                        window.location.href = _url + "delete/company/" + id + '/';
                    }
                });
            });


            $(".cedit").click(function (e) {
                e.preventDefault();
                var id = this.id;

                $('body').modalmanager('loading');



                $modal.load( _url + 'contacts/modal_add_company/'+ id + '/', '', function(){
                    $modal.modal();
                    $modal.css("width", "700px");
                    $modal.css("margin-left", "-349px");

                });

            });

            $(".cview").click(function (e) {
                $.fn.modal.defaults.width = '90%';
                e.preventDefault();
                var id = this.id;



                $('body').modalmanager('loading');

                $modal.load( base_url + 'contacts/modal_view_company/'+ id + '/', '', function(){

                    $modal.modal();

                    updateDiv('summary',base_url,id,cb);

                });

            });


            $modal.on('click', '.act_memo_update', function(e){

                e.preventDefault();

                $modal.modal('loading');

                $.post( base_url + "contacts/company_update_notes/", { id: $('#base_cid').val(), memo:$("#v_memo").val() })
                    .done(function( data ) {

                        $modal.modal('loading');
                        toastr.success(data);

                    });

            });







            $modal.on('click', '.li_memo', function(e){

                var cid = $('#base_cid').val();

                e.preventDefault();

                tab = 'memo';

                updateDiv(tab,base_url,cid,cb);

            });


            $modal.on('click', '.li_customers', function(e){

                var cid = $('#base_cid').val();

                e.preventDefault();

                tab = 'customers';

                updateDiv(tab,base_url,cid,cb);

            });

            $modal.on('click', '.li_summary', function(e){

                var cid = $('#base_cid').val();

                e.preventDefault();

                tab = 'summary';

                updateDiv(tab,base_url,cid,cb);

            });


            $modal.on('click', '.li_summary', function(e){

                var cid = $('#base_cid').val();

                e.preventDefault();

                tab = 'summary';

                updateDiv(tab,base_url,cid,cb);

            });

            $modal.on('click', '.li_invoices', function(e){

                var cid = $('#base_cid').val();

                e.preventDefault();

                tab = 'invoices';

                updateDiv(tab,base_url,cid,cb);

            });


            $modal.on('click', '.li_quotes', function(e){

                var cid = $('#base_cid').val();

                e.preventDefault();

                tab = 'quotes';

                updateDiv(tab,base_url,cid,cb);

            });


            $modal.on('click', '.li_orders', function(e){

                var cid = $('#base_cid').val();

                e.preventDefault();

                tab = 'orders';

                updateDiv(tab,base_url,cid,cb);

            });


            $modal.on('click', '.li_files', function(e){

                var cid = $('#base_cid').val();

                e.preventDefault();

                tab = 'files';

                updateDiv(tab,base_url,cid,cb);

            });


            $modal.on('click', '.li_transactions', function(e){

                var cid = $('#base_cid').val();

                e.preventDefault();

                tab = 'transactions';

                updateDiv(tab,base_url,cid,cb);

            });


            $modal.on('click', '.li_tickets', function(e){

                var cid = $('#base_cid').val();

                e.preventDefault();

                tab = 'tickets';

                updateDiv(tab,base_url,cid,cb);

            });


            $modal.on('click', '.send_email', function(e){
                e.preventDefault();
                sendEmail($(this).html(),true);

            });

            $("#ib_data_table").on('click', '.send_email', function(e){
                e.preventDefault();
                sendEmail($(this).html(),false);
            });


            $modal.on('click', '#btn_send_email', function(e){

                e.preventDefault();
                $modal.modal('loading');
                $.post( base_url + "handler/send_email_post/", {
                    to: $('#toemail').val(),
                    subject: $('#subject').val(),
                    message: tinyMCE.activeEditor.getContent()

                })
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
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
