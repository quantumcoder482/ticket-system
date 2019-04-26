<?php
/* Smarty version 3.1.33, created on 2018-12-03 19:32:54
  from '/Users/razib/Documents/valet/suite/apps/hostbilling/views/admin_plan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c05cb36e2f081_82335780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00509e07b074514b55808a78b8d976a39d2366eb' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/hostbilling/views/admin_plan.tpl',
      1 => 1543883566,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c05cb36e2f081_82335780 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14664141245c05cb36e2c406_68304182', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20337554105c05cb36e2dc19_99973877', "script");
}
/* {block "content"} */
class Block_14664141245c05cb36e2c406_68304182 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14664141245c05cb36e2c406_68304182',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h3>Create hosting plan</h3>
                    <div class="hr-line-dashed"></div>
                    <form autocomplete="off" id="mainForm">

                        <div class="form-group">
                            <label>Plan name</label>
                            <input class="form-control" name="name" autocomplete="off" data-lpignore="true">
                        </div>

                        <div class="well">
                            <h4>Pricing</h4>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Monthly</label>
                                        <input class="form-control" name="monthly" autocomplete="off" data-lpignore="true">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Yearly</label>
                                        <input class="form-control" name="yearly" autocomplete="off" data-lpignore="true">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>2 Years</label>
                                        <input class="form-control" name="two_years" autocomplete="off" data-lpignore="true">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>3 Years</label>
                                        <input class="form-control" name="three_years" autocomplete="off" data-lpignore="true">
                                    </div>
                                </div>
                            </div>
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
class Block_20337554105c05cb36e2dc19_99973877 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_20337554105c05cb36e2dc19_99973877',
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
hostbilling/admin/plan-post", $('#mainForm').serialize() ).done(function() {
                    window.location = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
hostbilling/admin/plans';
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
