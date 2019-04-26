<?php
/* Smarty version 3.1.33, created on 2018-11-08 20:00:19
  from '/Users/razib/Documents/valet/suite/ui/theme/default/predefined_reply_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be4dc23e89ab6_57538237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d7f802ed06d22da6f9388282519704db40b1395' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/predefined_reply_edit.tpl',
      1 => 1541725217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be4dc23e89ab6_57538237 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8267478985be4dc23e85501_41791938', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13245227705be4dc23e89397_26340953', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_8267478985be4dc23e85501_41791938 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8267478985be4dc23e85501_41791938',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/predefined_reply_edit_post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['reply']->value->title;?>
">
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['reply']->value->message;?>
</textarea>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['reply']->value->id;?>
">
                            <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                        </div>


                    </form>

                    <div class="hr-line-dashed"></div>

                    <a class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/predefined_replies/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Back To The List'];?>
</a>

                </div>
            </div>
        </div>
    </div>

<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_13245227705be4dc23e89397_26340953 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_13245227705be4dc23e89397_26340953',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
>

        $(function () {
            var $message = $('#message');
            $message.redactor({
                minHeight: 200,
                paragraphize: false,
                replaceDivs: false,
                linebreaks: true
            });
        })

    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
