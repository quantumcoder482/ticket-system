<?php
/* Smarty version 3.1.33, created on 2018-11-28 05:15:09
  from '/Users/razib/Documents/valet/suite/apps/notes/views/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bfe6aad544eb0_51064369',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c8fbd20e295c657aa6fd5edf562438765fcc6c0' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/notes/views/add.tpl',
      1 => 1529076790,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bfe6aad544eb0_51064369 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14517773165bfe6aad525353_39645334', "content");
}
/* {block "content"} */
class Block_14517773165bfe6aad525353_39645334 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14517773165bfe6aad525353_39645334',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">

                    <h3>Add Note</h3>

                    <hr>

                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
notes/app/save">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" name="title" id="title">
                        </div>

                        <div class="form-group">
                            <label for="contents">Contents</label>
                            <textarea class="form-control" rows="10" id="contents" name="contents"></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>

                    </form>


                </div>
            </div>
        </div>



    </div>



<?php
}
}
/* {/block "content"} */
}
