<?php
/* Smarty version 3.1.33, created on 2018-11-02 13:40:37
  from '/Users/razib/Documents/valet/suite/ui/theme/default/modal_sms_invoice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bdc8c1514fff4_36085630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11bec7a76d9b2ecdb4e88abfc2e3ea665e35b825' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/modal_sms_invoice.tpl',
      1 => 1511372851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bdc8c1514fff4_36085630 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        <?php echo $_smarty_tpl->tpl_vars['_L']->value['Send SMS'];?>

    </h3>
</div>
<div class="modal-body">



    <form class="form-horizontal" id="ib_modal_form">

        <input type="hidden" id="smsInvoiceId" name="smsInvoiceId" value="<?php echo $_smarty_tpl->tpl_vars['invoice_id']->value;?>
">

        <div class="form-group"><label class="col-lg-2 control-label" for="from">From </label>

            <div class="col-lg-6"><input type="text" name="sms_from" id="sms_from" class="form-control " value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sms_sender_name'];?>
">

            </div>
        </div>

        <div class="form-group"><label class="col-lg-2 control-label" for="sms_to">To </label>

            <div class="col-lg-6">
                <input type="text" name="sms_to" id="sms_to" class="form-control " value="<?php echo $_smarty_tpl->tpl_vars['to']->value;?>
">



            </div>
        </div>

        <div class="form-group"><label class="col-lg-2 control-label" for="message">SMS </label>

            <div class="col-lg-6">

                <textarea class="form-control" name="message" id="message" rows="4"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</textarea>

                <input type="hidden" name="template_id" id="template_id" value="">

                <p class="help-block" id="sms-counter">
                    Remaining: <span class="remaining"></span> | Length: <span class="length"></span> | Messages: <span class="messages"></span>
                </p>



            </div>
        </div>

    </form>

</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</button>
    <button class="btn btn-primary modal_submit" type="submit" id="btnModalSMSSend"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Send'];?>
</button>
</div><?php }
}
