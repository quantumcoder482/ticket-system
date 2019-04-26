<?php
/* Smarty version 3.1.33, created on 2019-02-21 15:43:39
  from '/Users/razib/Documents/valet/suite/ui/theme/default/hrm_proficiencies.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c6f0d7b21ee64_14808281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8299c2f709e325800674c09c632a58781ad67fb' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/hrm_proficiencies.tpl',
      1 => 1550781816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c6f0d7b21ee64_14808281 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1014169795c6f0d7b2191f2_72477063', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9411568445c6f0d7b21e315_18938800', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_1014169795c6f0d7b2191f2_72477063 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1014169795c6f0d7b2191f2_72477063',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row">

        <div class="col-md-4">

            <div class="panel">
                <div class="panel-body">

                    <h3>Add new proficiency</h3>

                    <div class="hr-line-dashed"></div>

                    <form method="post" id="mainForm">

                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

        <div class="col-md-8">

            <div class="panel">
                <div class="panel-body">

                    <h3>Proficiencies</h3>

                    <div class="hr-line-dashed"></div>

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

                    <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Manage</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['proficiencies']->value, 'proficiency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['proficiency']->value) {
?>
                            <tr>
                                <td  data-value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->id;?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
bpr/admin/end-user/<?php echo $_smarty_tpl->tpl_vars['end_user']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['end_user']->value->name;?>
</a> </td>


                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
bpr/admin/end-user/<?php echo $_smarty_tpl->tpl_vars['end_user']->value->id;?>
" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-xs" onclick="confirmThenGoToUrl(event,'bpr/admin/end-user-delete/<?php echo $_smarty_tpl->tpl_vars['end_user']->value->id;?>
');" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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


<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_9411568445c6f0d7b21e315_18938800 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_9411568445c6f0d7b21e315_18938800',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




    <?php echo '<script'; ?>
>

        $(function () {

        })

    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
