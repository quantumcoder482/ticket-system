<?php
/* Smarty version 3.1.33, created on 2018-12-03 05:30:49
  from '/Users/razib/Documents/valet/suite/apps/hostbilling/views/server.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c0505d9226201_58470356',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dbaaf8518d872f70d17f2d3eadc5986a501bd99e' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/hostbilling/views/server.tpl',
      1 => 1543833045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c0505d9226201_58470356 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10855883005c0505d92231d2_77054617', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5290123365c0505d9224432_75263233', "script");
}
/* {block "content"} */
class Block_10855883005c0505d92231d2_77054617 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10855883005c0505d92231d2_77054617',
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
                            <select class="form-control">
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
class Block_5290123365c0505d9224432_75263233 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_5290123365c0505d9224432_75263233',
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
