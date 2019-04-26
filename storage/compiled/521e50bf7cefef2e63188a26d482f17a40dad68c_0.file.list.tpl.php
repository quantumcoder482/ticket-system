<?php
/* Smarty version 3.1.33, created on 2018-11-28 05:15:10
  from '/Users/razib/Documents/valet/suite/apps/notes/views/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bfe6aae511b25_94022946',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '521e50bf7cefef2e63188a26d482f17a40dad68c' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/notes/views/list.tpl',
      1 => 1529077147,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bfe6aae511b25_94022946 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4489875965bfe6aae4f8d94_44240621', "content");
?>







<?php }
/* {block "content"} */
class Block_4489875965bfe6aae4f8d94_44240621 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4489875965bfe6aae4f8d94_44240621',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">
                <div class="panel-body">

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
notes/app/add" class="btn btn-primary add_event waves-effect waves-light"><i class="fa fa-plus"></i> Add Note</a>

                </div>

            </div>
        </div>



    </div>

    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">



                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="bold">Note Title</th>

                                <th class="text-center bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['notes']->value, 'note');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['note']->value) {
?>
                                <tr>
                                    <td>

                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
notes/app/view/<?php echo $_smarty_tpl->tpl_vars['note']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['note']->value->title;?>
</a>

                                    </td>

                                    <td class="text-right">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
notes/app/edit/<?php echo $_smarty_tpl->tpl_vars['note']->value->id;?>
" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
notes/app/delete/<?php echo $_smarty_tpl->tpl_vars['note']->value->id;?>
" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                                    </td>

                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>






                            </tbody>
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
}
