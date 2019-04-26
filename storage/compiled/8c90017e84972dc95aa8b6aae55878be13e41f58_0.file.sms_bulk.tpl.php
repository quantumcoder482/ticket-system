<?php
/* Smarty version 3.1.33, created on 2018-11-02 13:44:30
  from '/Users/razib/Documents/valet/suite/ui/theme/default/sms_bulk.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bdc8cfeec3939_21752575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c90017e84972dc95aa8b6aae55878be13e41f58' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/sms_bulk.tpl',
      1 => 1511373053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bdc8cfeec3939_21752575 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20558138995bdc8cfeebbdc0_32619229', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_20558138995bdc8cfeebbdc0_32619229 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_20558138995bdc8cfeebbdc0_32619229',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">

                    <div id="result"></div>

                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/init/send_post/" method="post" id="iform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="from">From </label>

                            <div class="col-lg-6"><input type="text" name="from" id="from" class="form-control " value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sms_sender_name'];?>
">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="sms_to">To </label>

                            <div class="col-lg-6">

                                <select multiple="multiple" id="contacts" name="contacts[]">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['c']->value, 'cs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['phone'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['account'];?>
 - <?php echo $_smarty_tpl->tpl_vars['cs']->value['phone'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>

                                <span class="help-block">
                                <a href="#" id="ib_select_all">Select All</a> |
                                <a href="#" id="ib_de_select_all">De Select All</a>
                            </span>

                            </div>
                        </div>


                        <div class="form-group"><label class="col-lg-2 control-label" for="message">SMS </label>

                            <div class="col-lg-6">

                                <textarea class="form-control" name="message" id="message" rows="4"></textarea>

                                <p class="help-block" id="sms-counter">
                                    Remaining: <span class="remaining"></span> | Length: <span class="length"></span> | Messages: <span class="messages"></span>
                                </p>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-6">
                                <button class="btn btn-primary" type="submit" id="send"><i
                                            class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Send'];?>
</button>
                            </div>
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
}
