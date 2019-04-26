<?php
/* Smarty version 3.1.33, created on 2018-12-03 05:32:31
  from '/Users/razib/Documents/valet/suite/apps/hostbilling/views/admin_server.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c05063fcde731_38800914',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f91be0cdcb24d0c45c19b2840dd7a8706581d2dd' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/hostbilling/views/admin_server.tpl',
      1 => 1543833149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c05063fcde731_38800914 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7992000845c05063fcd4ba9_66532681', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20940512135c05063fcd75d5_62056565', "script");
}
/* {block "content"} */
class Block_7992000845c05063fcd4ba9_66532681 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7992000845c05063fcd4ba9_66532681',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <h3>Server</h3>
                    <div class="hr-line-dashed"></div>
                    <form autocomplete="off" id="mainForm">
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name="type">
                                <option value="cpanel">cPanel / WHM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>IP / Domain / Host</label>
                            <input class="form-control" name="host" autocomplete="off" data-lpignore="true">
                            <span class="help-block">e.g. example.com</span>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="username" autocomplete="off" data-lpignore="true">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" autocomplete="off" data-lpignore="true">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
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
class Block_20940512135c05063fcd75d5_62056565 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_20940512135c05063fcd75d5_62056565',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        $(function () {
            $('#mainForm').submit(function (e) {
                e.preventDefault();

                $.post( "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
hostbilling/admin/server-post", $('#mainForm').serialize() ).done(function() {
                    window.location = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
hostbilling/admin/servers';
                }).fail(function(data) {
                    spNotify(data.responseText,'error');
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
