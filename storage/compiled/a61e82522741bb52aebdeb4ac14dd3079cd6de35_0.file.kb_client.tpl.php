<?php
/* Smarty version 3.1.33, created on 2018-10-30 05:47:15
  from '/Users/razib/Documents/valet/suite/ui/theme/default/kb_client.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bd828a3ee14a9_17938006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a61e82522741bb52aebdeb4ac14dd3079cd6de35' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/kb_client.tpl',
      1 => 1527519203,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bd828a3ee14a9_17938006 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11797489665bd828a3edbea5_34642406', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1854041715bd828a3ee07f8_22457096', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_client']->value));
}
/* {block "content"} */
class Block_11797489665bd828a3edbea5_34642406 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11797489665bd828a3edbea5_34642406',
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
class Block_1854041715bd828a3ee07f8_22457096 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1854041715bd828a3ee07f8_22457096',
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
