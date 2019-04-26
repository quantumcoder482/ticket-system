<?php
/* Smarty version 3.1.33, created on 2019-02-28 15:54:12
  from '/Users/razib/Documents/valet/suite/ui/theme/default/contacts_add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c784a744e5377_04881277',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a2b2b6e8e4dc535c46c16971423cbd5ee2bbc5c' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/contacts_add.tpl',
      1 => 1551387249,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c784a744e5377_04881277 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5415039835c784a744b6bf2_03223524', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17502014235c784a744e10f1_12351613', "script");
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_5415039835c784a744b6bf2_03223524 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5415039835c784a744b6bf2_03223524',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">

        <div class="col-md-12">



            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Contact'];?>
</h5>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/import_csv/" class="btn btn-xs btn-primary btn-rounded pull-right"><i class="fa fa-bars"></i> Import Contacts</a>

                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform">

                        <div class="row">
                            <div class="col-md-6 col-sm-12">


                                <div class="form-group"><label class="col-md-4 control-label" for="account"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Name'];?>
<small class="red">*</small> </label>

                                    <div class="col-lg-8"><input type="text" id="account" name="account" class="form-control" autofocus>

                                    </div>
                                </div>




                                <div class="form-group"><label class="col-md-4 control-label" for="account"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Code'];?>
</label>

                                    <div class="col-lg-8"><input type="text" id="code" name="code" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['predict_customer_number']->value;?>
">

                                    </div>
                                </div>

                                <div class="form-group"><label class="col-md-4 control-label" for="display_name"><?php echo $_smarty_tpl->tpl_vars['config']->value['contact_extra_field'];?>
 </label>

                                    <div class="col-lg-8">

                                        <input type="text" id="display_name" name="display_name" class="form-control">

                                    </div>
                                </div>

                                
                                
                                                                
                                <div class="form-group"><label class="col-md-4 control-label" for="cid"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company'];?>
</label>

                                    <div class="col-lg-8">

                                        <select id="cid" name="cid" class="form-control">
                                            <option value="0"><?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['companies']->value, 'company');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['company']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['company']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['c_selected_id']->value == ($_smarty_tpl->tpl_vars['company']->value['id'])) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['company']->value['company_name'];?>
</option>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>
                                        <span class="help-block"><a href="#" class="add_company"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['New Company'];?>
</a> </span>

                                    </div>
                                </div>


                                <?php if ($_smarty_tpl->tpl_vars['config']->value['show_business_number'] == '1') {?>

                                    <div class="form-group"><label class="col-md-4 control-label" for="business_number"><?php echo $_smarty_tpl->tpl_vars['config']->value['label_business_number'];?>
</label>

                                        <div class="col-lg-8"><input type="text" id="business_number" name="business_number" class="form-control">

                                        </div>
                                    </div>

                                <?php }?>




                                <div class="form-group"><label class="col-md-4 control-label" for="cid"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</label>

                                    <div class="col-lg-8">


                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="i-checks" name="customer" value="Customer" <?php if ($_smarty_tpl->tpl_vars['contact_type']->value == 'customer') {?>checked<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>

                                            </label>
                                        </div>

                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['suppliers'] == '1') {?>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="i-checks" name="supplier" value="Supplier" <?php if ($_smarty_tpl->tpl_vars['contact_type']->value == 'supplier') {?>checked<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Supplier'];?>

                                                </label>
                                            </div>
                                        <?php }?>

                                    </div>
                                </div>


                                <div class="form-group"><label class="col-md-4 control-label" for="email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</label>

                                    <div class="col-lg-8"><input type="text" id="email" name="email" class="form-control">

                                    </div>
                                </div>


                                <div class="form-group"><label class="col-md-4 control-label" for="secondary_email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Secondary Email'];?>
</label>

                                    <div class="col-lg-8"><input type="text" id="secondary_email" name="secondary_email" class="form-control">

                                    </div>
                                </div>


                                <div class="form-group"><label class="col-md-4 control-label" for="phone"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</label>

                                    <div class="col-lg-8"><input type="text" id="phone" name="phone" class="form-control">

                                    </div>
                                </div>



                                <?php if ($_smarty_tpl->tpl_vars['config']->value['fax_field'] == '1') {?>

                                    <div class="form-group"><label class="col-md-4 control-label" for="fax"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Fax'];?>
</label>

                                        <div class="col-lg-8"><input type="text" id="fax" name="fax" class="form-control">

                                        </div>
                                    </div>

                                <?php }?>














                                <div class="form-group"><label class="col-md-4 control-label" for="address"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>

                                    <div class="col-lg-8"><input type="text" id="address" name="address" class="form-control">

                                    </div>
                                </div>


                                <div class="form-group"><label class="col-md-4 control-label" for="city"><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
</label>

                                    <div class="col-lg-8"><input type="text" id="city" name="city" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-4 control-label" for="state"><?php echo $_smarty_tpl->tpl_vars['_L']->value['State Region'];?>
</label>

                                    <div class="col-lg-8"><input type="text" id="state" name="state" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-4 control-label" for="zip"><?php echo $_smarty_tpl->tpl_vars['_L']->value['ZIP Postal Code'];?>
 </label>

                                    <div class="col-lg-8"><input type="text" id="zip" name="zip" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-4 control-label" for="country"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
</label>

                                    <div class="col-lg-8">

                                        <select name="country" id="country" class="form-control">
                                            <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Country'];?>
</option>
                                            <?php echo $_smarty_tpl->tpl_vars['countries']->value;?>

                                        </select>

                                    </div>
                                </div>

                                
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fs']->value, 'f');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['f']->value) {
?>
                                    <div class="form-group"><label class="col-md-4 control-label" for="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['f']->value['fieldname'];?>
</label>
                                        <?php if (($_smarty_tpl->tpl_vars['f']->value['fieldtype']) == 'text') {?>


                                            <div class="col-lg-8">
                                                <input type="text" id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control">
                                                <?php if (($_smarty_tpl->tpl_vars['f']->value['description']) != '') {?>
                                                    <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                                                <?php }?>

                                            </div>

                                        <?php } elseif (($_smarty_tpl->tpl_vars['f']->value['fieldtype']) == 'password') {?>

                                            <div class="col-lg-8">
                                                <input type="password" id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control">
                                                <?php if (($_smarty_tpl->tpl_vars['f']->value['description']) != '') {?>
                                                    <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                                                <?php }?>
                                            </div>

                                        <?php } elseif (($_smarty_tpl->tpl_vars['f']->value['fieldtype']) == 'dropdown') {?>
                                            <div class="col-lg-8">
                                                <select id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, explode(',',$_smarty_tpl->tpl_vars['f']->value['fieldoptions']), 'fo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fo']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['fo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['fo']->value;?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                                <?php if (($_smarty_tpl->tpl_vars['f']->value['description']) != '') {?>
                                                    <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                                                <?php }?>
                                            </div>


                                        <?php } elseif (($_smarty_tpl->tpl_vars['f']->value['fieldtype']) == 'textarea') {?>

                                            <div class="col-lg-8">
                                                <textarea id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control" rows="3"></textarea>
                                                <?php if (($_smarty_tpl->tpl_vars['f']->value['description']) != '') {?>
                                                    <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                                                <?php }?>
                                            </div>

                                        <?php } else { ?>
                                        <?php }?>
                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <div class="form-group"><label class="col-md-4 control-label" for="tags"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tags'];?>
</label>

                                    <div class="col-lg-8">
                                                                                <select name="tags[]" id="tags" class="form-control" multiple="multiple">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['text'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['text'];?>
</option>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">


                                <div class="form-group"><label class="col-md-4 control-label" for="currency"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currency'];?>
</label>

                                    <div class="col-lg-8">
                                        <select id="currency" name="currency" class="form-control">

                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'currency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['currency']->value['id'];?>
"
                                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['home_currency'] == ($_smarty_tpl->tpl_vars['currency']->value['cname'])) {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['currency']->value['cname'];?>
</option>
                                                <?php
}
} else {
?>
                                                <option value="0"><?php echo $_smarty_tpl->tpl_vars['config']->value['home_currency'];?>
</option>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-md-4 control-label" for="group"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Group'];?>
</label>

                                    <div class="col-lg-8">
                                        <select class="form-control" name="group" id="group">
                                            <option value="0"><?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gs']->value, 'g');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['g']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['g_selected_id']->value == ($_smarty_tpl->tpl_vars['g']->value['id'])) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['g']->value['gname'];?>
</option>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>
                                        <span class="help-block"><a href="#" id="add_new_group"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New Group'];?>
</a> </span>
                                    </div>
                                </div>


                                <?php if ($_smarty_tpl->tpl_vars['config']->value['customer_custom_username']) {?>
                                    <div class="form-group"><label class="col-md-4 control-label" for="username"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Username'];?>
</label>

                                        <div class="col-lg-8"><input type="text" id="username" name="username" class="form-control">

                                        </div>
                                    </div>
                                <?php }?>

                                <div class="form-group"><label class="col-md-4 control-label" for="password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</label>

                                    <div class="col-lg-8"><input type="password" id="password" name="password" class="form-control">

                                    </div>
                                </div>

                                <div class="form-group"><label class="col-md-4 control-label" for="cpassword"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Confirm Password'];?>
</label>

                                    <div class="col-lg-8"><input type="password" id="cpassword" name="cpassword" class="form-control">

                                    </div>
                                </div>



                                <?php if (isset($_smarty_tpl->tpl_vars['config']->value['add_contact_remove_welcome_email'])) {?>

                                    <input type="hidden" name="send_client_signup_email" id="send_client_signup_email" value="No">
                                    <?php } else { ?>

                                    <div class="form-group"><label class="col-md-4 control-label" for="send_client_signup_email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Welcome Email'];?>
</label>

                                        <div class="col-lg-8">


                                            <input type="checkbox" checked data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="send_client_signup_email" name="send_client_signup_email" value="Yes">


                                            <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Send Client Signup Email'];?>
</span>

                                        </div>
                                    </div>

                                <?php }?>




                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-lg-10">




                                        <button class="md-btn md-btn-primary waves-effect waves-light" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button> | <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Or Cancel'];?>
</a>


                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_msg_add_new_group" id="_msg_add_new_group" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New Group'];?>
">
    <input type="hidden" name="_msg_group_name" id="_msg_group_name" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Group Name'];?>
">







<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_17502014235c784a744e10f1_12351613 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_17502014235c784a744e10f1_12351613',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            $(".progress").hide();
            $("#emsg").hide();
            var _url = $("#_url").val();


            var i_checks = $('.i-checks');
            i_checks.iCheck({
                checkboxClass: 'icheckbox_square-blue'
            });


            $('#tags').select2({
                tags: true,
                tokenSeparators: [','],
                theme: "bootstrap"
            });

            var $cid = $('#cid');

            $cid.select2({
                theme: "bootstrap"
            });

            $country = $("#country");

            $country.select2({
                theme: "bootstrap"
            });


            //
            $("#submit").click(function (e) {
                e.preventDefault();
                $('#ibox_form').block({ message:block_msg });
                var _url = $("#_url").val();
                $.post(_url + 'contacts/add-post/', $( "#rform" ).serialize())
                    .done(function (data) {
                        var sbutton = $("#submit");
                        var _url = $("#_url").val();
                        if ($.isNumeric(data)) {

                            window.location = _url + 'contacts/view/' + data;
                        }
                        else {
                            $('#ibox_form').unblock();
                            var body = $("html, body");
                            body.animate({ scrollTop:0 }, '1000', 'swing');
                            $("#emsgbody").html(data);
                            $("#emsg").show("slow");
                        }
                    });
            });

            var _msg_add_new_group = $("#_msg_add_new_group").val();
            var _msg_group_name = $("#_msg_group_name").val();


            var ib_form_bootbox = "<form class=\"form-horizontal push-10\" method=\"post\" onsubmit=\"return false;\">\n    <div class=\"form-group\">\n        <div class=\"col-xs-12\">\n            <div class=\"form-material floating\">\n                <input class=\"form-control\" type=\"text\" id=\"group_name\" name=\"group_name\">\n                <label for=\"envato_api_key\">" + _msg_group_name + "</label>\n                           </div>\n        </div>\n    </div>\n\n</form>";


            var box =   bootbox.dialog({
                    title: _msg_add_new_group,
                    message: ib_form_bootbox,
                    buttons: {
                        success: {
                            label: "Save",
                            className: "btn-primary",
                            callback: function () {
                                // var name = $('#name').val();
                                // var answer = $("input[name='awesomeness']:checked").val();
                                // Example.show("Hello " + name + ". You've chosen <b>" + answer + "</b>");

                                var group_name_val = $('#group_name').val();

                                if(group_name_val != ''){


                                    $.post( _url + "contacts/add_group/", { group_name: group_name_val })
                                        .done(function( data ) {

                                            if ($.isNumeric(data)) {

                                                window.location = _url + 'contacts/add/<?php echo $_smarty_tpl->tpl_vars['contact_type']->value;?>
/' + data + '/' + $cid.val();

                                            }

                                            else {
                                                bootbox.alert(data);
                                            }

                                        });


                                }


                            }
                        }
                    },
                    show: false
                }
            );





            $("#add_new_group").click(function(e){

                e.preventDefault();

                box.modal('show');


            });


            box.on("shown.bs.modal", function() {

                var group_name = $('#group_name');
                setTimeout(function(){
                    group_name.focus();
                }, 1000);

            });





            $.fn.modal.defaults.width = '700px';

            var $modal = $('#ajax-modal');

            $('[data-toggle="tooltip"]').tooltip();

            $('.add_company').on('click', function(e){

                e.preventDefault();

                $('body').modalmanager('loading');

                $modal.load( _url + 'contacts/modal_add_company/', '', function(){

                    $modal.modal();

                    $("#ajax-modal .country").select2({
                        theme: "bootstrap"
                    });

                });
            });


            $modal.on('click', '.modal_submit', function(e){

                e.preventDefault();

                $modal.modal('loading');

                $.post( _url + "contacts/add_company_post/", $("#ib_modal_form").serialize())
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            window.location = base_url + 'contacts/add/<?php echo $_smarty_tpl->tpl_vars['contact_type']->value;?>
/' + $("#group").val() + '/' + data;

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
                        }

                    });

            });




            <?php if ($_smarty_tpl->tpl_vars['config']->value['show_business_number'] == '1') {?>


            var $business_number = $("#business_number");

            var $address = $("#address");

            var $city = $("#city");

            var $state = $("#state");

            var $zip = $("#zip");



            function getBusinessDetails() {

                if($cid.val() === '0'){
                   // $business_number.val('');
                    return;
                }

                $.getJSON( base_url + "contacts/get_company_details/" +  $cid.val(), function( data ) {

                    console.log(data);

                    if(data.success === false){

                    }
                    else{

                        $business_number.val(data.business_number);

                        $address.val(data.address1);

                        $city.val(data.city);

                        $state.val(data.state);

                        $zip.val(data.zip);

                        $country.val(data.country).trigger('change');

                    }

                });
            }

            getBusinessDetails();


            $cid.change(function () {

                getBusinessDetails();


            });


            <?php }?>





        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
