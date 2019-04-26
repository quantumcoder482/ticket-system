<?php
/* Smarty version 3.1.33, created on 2018-11-01 09:44:11
  from '/Users/razib/Documents/valet/suite/ui/theme/default/sms_settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bdb032b4c78f4_98352171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a1fa83533e0a0daf6efdb7357938ac00bee9aa1' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/sms_settings.tpl',
      1 => 1541058027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bdb032b4c78f4_98352171 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7699828185bdb032b488dc9_13784893', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2576533215bdb032b4c4be3_71047615', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_7699828185bdb032b488dc9_13784893 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7699828185bdb032b488dc9_13784893',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Settings'];?>
</h4>
                </div>
                <div class="panel-body">

                    <form id="spForm" method="post" action="">

                        <div class="form-group">
                            <label for="sms_api_handler">API Handler</label>
                            <select class="form-control" id="sms_api_handler" name="sms_api_handler">
                                <option value="Nexmo" <?php if ($_smarty_tpl->tpl_vars['config']->value['sms_api_handler'] == 'Nexmo') {?>selected<?php }?>>Nexmo</option>
                                <option value="Twilio" <?php if ($_smarty_tpl->tpl_vars['config']->value['sms_api_handler'] == 'Twilio') {?>selected<?php }?>>Twilio</option>

                                <option value="Routesms" <?php if ($_smarty_tpl->tpl_vars['config']->value['sms_api_handler'] == 'Routesms') {?>selected<?php }?>>Routesms</option>
                                <option value="Alanood" <?php if ($_smarty_tpl->tpl_vars['config']->value['sms_api_handler'] == 'Alanood') {?>selected<?php }?>>Alanood [UAE]</option>

                                <option value="Textlocal_in" <?php if ($_smarty_tpl->tpl_vars['config']->value['sms_api_handler'] == 'Textlocal_in') {?>selected<?php }?>>Textlocal India</option>

                                <option value="Msg91" <?php if ($_smarty_tpl->tpl_vars['config']->value['sms_api_handler'] == 'Msg91') {?>selected<?php }?>>Msg91</option>

                                <option value="Custom" <?php if ($_smarty_tpl->tpl_vars['config']->value['sms_api_handler'] == 'Custom') {?>selected<?php }?>>Custom</option>
                            </select>
                        </div>


                        <div class="form-group" id="block_sms_sender_name">
                            <label for="sms_sender_name">Sender ID</label>
                            <input class="form-control" id="sms_sender_name" name="sms_sender_name" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sms_sender_name'];?>
">
                        </div>


                        <div class="form-group" id="block_sms_req_url">
                            <label for="sms_req_url">HTTP API URL</label>
                            <input class="form-control" id="sms_req_url" name="sms_req_url" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sms_req_url'];?>
">
                        </div>

                        <div class="form-group" id="block_sms_request_method">
                            <label for="sms_request_method">HTTP Request Method</label>

                            <select class="form-control" id="sms_request_method" name="sms_request_method">
                                <option value="GET" <?php if ($_smarty_tpl->tpl_vars['config']->value['sms_request_method'] == 'GET') {?>selected<?php }?>>GET</option>
                                <option value="POST" <?php if ($_smarty_tpl->tpl_vars['config']->value['sms_request_method'] == 'POST') {?>selected<?php }?>>POST</option>
                            </select>
                        </div>

                        <div class="form-group" id="block_sms_http_params">
                            <label for="sms_http_params">HTTP Parameters</label>
                            <textarea class="form-control" name="sms_http_params" id="sms_http_params" rows="4"><?php echo $_smarty_tpl->tpl_vars['config']->value['sms_http_params'];?>
</textarea>
                            <span>You can use this format  to=={{to}},from=={{from}},message=={{message}} as placeholder.</span>
                        </div>

                        <div class="form-group" id="block_sms_auth_username">
                            <label for="sms_auth_username" id="labelUsername">SID</label>
                            <input class="form-control" id="sms_auth_username" name="sms_auth_username" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sms_auth_username'];?>
">
                        </div>

                        <div class="form-group" id="block_sms_auth_password">
                            <label for="sms_auth_password" id="labelPassword">Token</label>
                            <input class="form-control" id="sms_auth_password" name="sms_auth_password" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sms_auth_password'];?>
">
                        </div>



                        <div class="form-group">
                            <button type="submit" id="saveSmsCredentials" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                        </div>



                    </form>

                </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_2576533215bdb032b4c4be3_71047615 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_2576533215bdb032b4c4be3_71047615',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>





    <?php echo '<script'; ?>
>



        $(function () {




            var $block_sms_req_url = $("#block_sms_req_url");
            var $block_sms_request_method = $("#block_sms_request_method");

            var $block_sms_sender_name = $("#block_sms_sender_name");

            var $block_sms_auth_username = $("#block_sms_auth_username");
            var $block_sms_auth_password = $("#block_sms_auth_password");

            var $block_sms_http_params = $("#block_sms_http_params");



            function customParams(status) {



                if(status === 'show'){

                    $block_sms_sender_name.hide();
                    $block_sms_auth_username.hide();
                    $block_sms_auth_password.hide();



                    $block_sms_req_url.show();
                    $block_sms_request_method.show();
                    $block_sms_http_params.show();

                }
                else{

                    $block_sms_sender_name.show();
                    $block_sms_auth_username.show();
                    $block_sms_auth_password.show();

                    $block_sms_req_url.hide();
                    $block_sms_request_method.hide();
                    $block_sms_http_params.hide();

                }

            }


            <?php if (($_smarty_tpl->tpl_vars['config']->value['sms_api_handler']) != 'Custom') {?>
            customParams('hide');
            <?php } else { ?>
            customParams('show');
            <?php }?>

            var $save = $("#saveSmsCredentials");

            $save.on('click', function (e) {
                e.preventDefault();

                $save.prop('disabled',true);

                $.post(base_url + 'sms/init/save-sms-credentials/', $('#spForm').serialize()).done(function (data) {

                    spNotify(data,'success');
                    $save.prop('disabled',false);


                });

            });

            var $sms_api_handler = $("#sms_api_handler");

            function prepareDriver() {
                var $sms_api_handler_val = $sms_api_handler.val();

                switch ($sms_api_handler_val) {
                    case 'Nexmo':

                        customParams('hide');

                        $("#labelUsername").html("API Key");
                        $("#labelPassword").html("API Secret");


                        break;


                    case 'Twilio':

                        customParams('hide');

                        $("#labelUsername").html("SID");
                        $("#labelPassword").html("Token");

                        break;

                    case 'Routesms':

                        customParams('hide');
                        $block_sms_req_url.show();

                        $("#labelUsername").html("Username");
                        $("#labelPassword").html("Password");

                        break;

                    case 'Alanood':

                        customParams('hide');
                        $block_sms_req_url.show();

                        $("#labelUsername").html("Username");
                        $("#labelPassword").html("Password");

                        break;


                    case 'Msg91':

                        customParams('hide');

                        $("#labelUsername").html("Authkey");
                        $block_sms_auth_password.hide();

                        break;



                    case 'Textlocal_in':

                        customParams('hide');
                     //   $block_sms_req_url.show();

                        $("#labelUsername").html("Username");
                        $("#labelPassword").html("Hash / Password");

                        break;

                    case 'Custom':

                        $("#labelUsername").html("Username");
                        $("#labelPassword").html("Password");

                        customParams('show');



                        break;



                }
            }

            prepareDriver();

            $sms_api_handler.on('change',function () {

                prepareDriver();


            });



        })
    <?php echo '</script'; ?>
>

<?php
}
}
/* {/block "script"} */
}
