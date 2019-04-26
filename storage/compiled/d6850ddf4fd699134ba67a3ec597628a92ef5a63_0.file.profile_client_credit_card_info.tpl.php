<?php
/* Smarty version 3.1.33, created on 2019-04-18 22:34:43
  from '/home/pscope/public_html/ui/theme/default/profile_client_credit_card_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb8ae2b65bd81_41347421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6850ddf4fd699134ba67a3ec597628a92ef5a63' => 
    array (
      0 => '/home/pscope/public_html/ui/theme/default/profile_client_credit_card_info.tpl',
      1 => 1553599355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb8ae2b65bd81_41347421 (Smarty_Internal_Template $_smarty_tpl) {
?><form class="form-horizontal" role="form" id="credit_card_from">
    <fieldset>
        <legend><?php echo $_smarty_tpl->tpl_vars['_L']->value['Credit Card Information'];?>
</legend>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value) {?>
                        value="<?php echo $_smarty_tpl->tpl_vars['credit_card']->value->card_holder_name;?>
"
                    <?php } else { ?>
                    value="<?php echo $_smarty_tpl->tpl_vars['contact']->value->account;?>
"
                <?php }?>>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="card-number">Card Number</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number"
                       <?php if ($_smarty_tpl->tpl_vars['credit_card']->value) {?>
                           value="<?php echo $_smarty_tpl->tpl_vars['credit_card']->value->card_number;?>
"
                       <?php }?>
                >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-xs-3">
                        <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
                            <option value="">Month</option>
                            <option value="01" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '01') {?>
                                selected
                                    <?php }?>>Jan (01)</option>
                            <option value="02" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '02') {?>
                            selected
                                    <?php }?>>Feb (02)</option>
                            <option value="03" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '03') {?>
                            selected
                                    <?php }?>>Mar (03)</option>
                            <option value="04" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '04') {?>
                            selected
                                    <?php }?>>Apr (04)</option>
                            <option value="05" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '05') {?>
                            selected
                                    <?php }?>>May (05)</option>
                            <option value="06" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '06') {?>
                            selected
                                    <?php }?>>June (06)</option>
                            <option value="07" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '07') {?>
                            selected
                                    <?php }?>>July (07)</option>
                            <option value="08" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '08') {?>
                            selected
                                    <?php }?>>Aug (08)</option>
                            <option value="09" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '09') {?>
                            selected
                                    <?php }?>>Sep (09)</option>
                            <option value="10" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '10') {?>
                            selected
                                    <?php }?>>Oct (10)</option>
                            <option value="11" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '11') {?>
                            selected
                                    <?php }?>>Nov (11)</option>
                            <option value="12" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_month == '12') {?>
                            selected
                                    <?php }?>>Dec (12)</option>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <select class="form-control" name="expiry-year">
                            <option value="18" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_year == '18') {?>
                            selected
                                    <?php }?>>2018</option>
                            <option value="19"<?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_year == '19') {?>
                            selected
                                    <?php }?>>2019</option>
                            <option value="20"<?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_year == '20') {?>
                            selected
                                    <?php }?>>2020</option>
                            <option value="21"<?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_year == '21') {?>
                            selected
                                    <?php }?>>2021</option>
                            <option value="22"<?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_year == '22') {?>
                            selected
                                    <?php }?>>2022</option>
                            <option value="23"<?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_year == '23') {?>
                            selected
                                    <?php }?>>2023</option>
                            <option value="24"<?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_year == '24') {?>
                            selected
                                    <?php }?>>2024</option>
                            <option value="25"<?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_year == '25') {?>
                            selected
                                    <?php }?>>2025</option>
                            <option value="26"<?php if ($_smarty_tpl->tpl_vars['credit_card']->value && $_smarty_tpl->tpl_vars['credit_card']->value->expiry_year == '26') {?>
                            selected
                                    <?php }?>>2026</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code" <?php if ($_smarty_tpl->tpl_vars['credit_card']->value) {?>
                    value="<?php echo $_smarty_tpl->tpl_vars['credit_card']->value->cvv;?>
"
                        <?php }?>>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="button" id="save_credit_card" class="btn btn-primary">Save</button>
            </div>
        </div>
    </fieldset>
    <input type="hidden" name="contact_id" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
</form><?php }
}
