<?php
/* Smarty version 3.1.33, created on 2018-11-10 03:47:28
  from '/Users/razib/Documents/valet/suite/ui/theme/default/kb_all.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be69b20257ad6_56988117',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a71d6cf8c7645f315a6662b0b06918c93f312c43' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/kb_all.tpl',
      1 => 1506990293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be69b20257ad6_56988117 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6307715315be69b2024fd61_43252350', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_6307715315be69b2024fd61_43252350 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_6307715315be69b2024fd61_43252350',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




    <div class="row">
        <div class="col-md-12">


            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="ib-search-bar" style="margin-bottom: 30px;">
                        <div class="input-group">
                            <input type="text" class="form-control" id="ib_search_input" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
..." autofocus> </div>
                    </div>

                    <div>
                        <table class="table table-bordered filter-table" id="tbl_articles">
                            <thead>
                            <tr>
                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Title'];?>
</th>
                                <th width="110px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>

                                <tr>

                                    <td><a href="javascript:void(0)" id="k<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="kb_view"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a> </td>

                                    <td class="text-right">


                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kb/a/edit/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> </a>
                                        <button class="btn btn-danger btn-xs" onclick="deleteKb(<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
)" id="da<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><i class="fa fa-trash"></i> </button>

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
