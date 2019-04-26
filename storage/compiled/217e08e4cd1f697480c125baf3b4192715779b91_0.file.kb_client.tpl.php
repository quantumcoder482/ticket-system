<?php
/* Smarty version 3.1.33, created on 2019-04-18 01:15:55
  from '/home/pscope/public_html/ui/theme/default/kb_client.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb8080b60fca5_97938720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '217e08e4cd1f697480c125baf3b4192715779b91' => 
    array (
      0 => '/home/pscope/public_html/ui/theme/default/kb_client.tpl',
      1 => 1553599355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb8080b60fca5_97938720 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10246465855cb8080b6073f1_74305029', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15205901655cb8080b60f279_43867616', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_client']->value));
}
/* {block "content"} */
class Block_10246465855cb8080b6073f1_74305029 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10246465855cb8080b6073f1_74305029',
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

                            </tr>
                            </thead>
                            <tbody>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>

                                <tr>

                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kb/<?php echo $_smarty_tpl->tpl_vars['article']->value->slug;?>
" id="k<?php echo $_smarty_tpl->tpl_vars['article']->value->id;?>
" class="kb_view"><?php echo $_smarty_tpl->tpl_vars['article']->value->title;?>
</a> </td>



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
/* {block "script"} */
class Block_15205901655cb8080b60f279_43867616 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_15205901655cb8080b60f279_43867616',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/js/filtertable.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        $(function() {



            $('#tbl_articles').filterTable({
                inputSelector: '#ib_search_input',
                ignoreColumns: [1],
                minRows: 1
            });


        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
