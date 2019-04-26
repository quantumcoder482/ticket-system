<?php
/* Smarty version 3.1.33, created on 2019-02-07 06:33:29
  from '/Users/razib/Documents/valet/suite/apps/notes/views/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5c1789eb3848_90695085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8921f1c2cccb7676d924f34aa5b4774b433e03a' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/notes/views/view.tpl',
      1 => 1529078186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c5c1789eb3848_90695085 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2961803505c5c1789e9ceb1_38086211', "content");
}
/* {block "content"} */
class Block_2961803505c5c1789e9ceb1_38086211 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2961803505c5c1789e9ceb1_38086211',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">

                    <h3><?php echo $_smarty_tpl->tpl_vars['note']->value->title;?>
</h3>

                    <hr>

                    <?php echo $_smarty_tpl->tpl_vars['note']->value->contents;?>


                    <hr>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
notes/app/list" class="btn btn-primary">Back to the List</a>


                </div>
            </div>
        </div>



    </div>



<?php
}
}
/* {/block "content"} */
}
