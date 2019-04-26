<?php
/* Smarty version 3.1.33, created on 2019-03-25 18:02:35
  from '/Users/razib/Documents/valet/suite/apps/bpr/views/modal_end_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c994ffb7b2aa4_81829798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efbdf20778a29d317cdd446621a116a7e32555e8' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/bpr/views/modal_end_user.tpl',
      1 => 1553551257,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c994ffb7b2aa4_81829798 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?>
            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>

        <?php } else { ?>
            Create new end user
        <?php }?>
    </h3>
</div>
<div class="modal-body">

    <form method="post" id="formEndUser">


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type">
                        <option value="ABE" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->type == 'ABE') {?> selected <?php }?>>ABE</option>
                        <option value="ABS" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->type == 'ABS') {?> selected <?php }?>>ABS</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Contact Name</label>
                    <input class="form-control" name="name" <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->name;?>
" <?php }?>>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputName">Company</label>
                    <input class="form-control" id="company" name="company"  <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->company;?>
" <?php }?>>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->email;?>
" <?php }?>>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Office Phone</label>
                            <input class="form-control" name="office_phone" <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->office_phone;?>
" <?php }?>>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Extension</label>
                            <input class="form-control" name="office_phone_extension" <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->office_phone_extension;?>
" <?php }?>>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mobile Phone</label>
                    <input class="form-control" name="mobile_phone" <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->mobile_phone;?>
" <?php }?>>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Fax</label>
                    <input class="form-control" name="fax" <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->fax;?>
" <?php }?>>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label>Address</label>
            <input class="form-control" name="address" <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->address;?>
" <?php }?>>
        </div>

        <div class="form-group">
            <label>City</label>
            <input class="form-control" name="city" <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->city;?>
" <?php }?>>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>State</label>
                    <select class="form-control" name="state">
                        <option value="">None</option>
                        <option value="AL" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'AL') {?> selected <?php }?>>Alabama</option>
                        <option value="AK" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'AK') {?> selected <?php }?>>Alaska</option>
                        <option value="AZ" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'AZ') {?> selected <?php }?>>Arizona</option>
                        <option value="AR" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'AR') {?> selected <?php }?>>Arkansas</option>
                        <option value="CA" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'CA') {?> selected <?php }?>>California</option>
                        <option value="CO" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'CO') {?> selected <?php }?>>Colorado</option>
                        <option value="CT" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'CT') {?> selected <?php }?>>Connecticut</option>
                        <option value="DE" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'DE') {?> selected <?php }?>>Delaware</option>
                        <option value="DC" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'DC') {?> selected <?php }?>>District Of Columbia</option>
                        <option value="FL" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'FL') {?> selected <?php }?>>Florida</option>
                        <option value="GA" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'GA') {?> selected <?php }?>>Georgia</option>
                        <option value="HI" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'HI') {?> selected <?php }?>>Hawaii</option>
                        <option value="ID" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'ID') {?> selected <?php }?>>Idaho</option>
                        <option value="IL" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'IL') {?> selected <?php }?>>Illinois</option>
                        <option value="IN" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'IN') {?> selected <?php }?>>Indiana</option>
                        <option value="IA" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'IA') {?> selected <?php }?>>Iowa</option>
                        <option value="KS" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'KS') {?> selected <?php }?>>Kansas</option>
                        <option value="KY" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'KY') {?> selected <?php }?>>Kentucky</option>
                        <option value="LA" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'LA') {?> selected <?php }?>>Louisiana</option>
                        <option value="ME" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'ME') {?> selected <?php }?>>Maine</option>
                        <option value="MD" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'MD') {?> selected <?php }?>>Maryland</option>
                        <option value="MA" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'MA') {?> selected <?php }?>>Massachusetts</option>
                        <option value="MI" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'MI') {?> selected <?php }?>>Michigan</option>
                        <option value="MN" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'MN') {?> selected <?php }?>>Minnesota</option>
                        <option value="MS" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'MS') {?> selected <?php }?>>Mississippi</option>
                        <option value="MO" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'MO') {?> selected <?php }?>>Missouri</option>
                        <option value="MT" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'MT') {?> selected <?php }?>>Montana</option>
                        <option value="NE" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'NE') {?> selected <?php }?>>Nebraska</option>
                        <option value="NV" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'NV') {?> selected <?php }?>>Nevada</option>
                        <option value="NH" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'NH') {?> selected <?php }?>>New Hampshire</option>
                        <option value="NJ" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'NJ') {?> selected <?php }?>>New Jersey</option>
                        <option value="NM" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'NM') {?> selected <?php }?>>New Mexico</option>
                        <option value="NY" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'NY') {?> selected <?php }?>>New York</option>
                        <option value="NC" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'NC') {?> selected <?php }?>>North Carolina</option>
                        <option value="ND" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'ND') {?> selected <?php }?>>North Dakota</option>
                        <option value="OH" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'OH') {?> selected <?php }?>>Ohio</option>
                        <option value="OK" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'OK') {?> selected <?php }?>>Oklahoma</option>
                        <option value="OR" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'OR') {?> selected <?php }?>>Oregon</option>
                        <option value="PA" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'PA') {?> selected <?php }?>>Pennsylvania</option>
                        <option value="RI" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'RI') {?> selected <?php }?>>Rhode Island</option>
                        <option value="SC" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'SC') {?> selected <?php }?>>South Carolina</option>
                        <option value="SD" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'SD') {?> selected <?php }?>>South Dakota</option>
                        <option value="TN" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'TN') {?> selected <?php }?>>Tennessee</option>
                        <option value="TX" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'TX') {?> selected <?php }?>>Texas</option>
                        <option value="UT" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'UT') {?> selected <?php }?>>Utah</option>
                        <option value="VT" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'VT') {?> selected <?php }?>>Vermont</option>
                        <option value="VA" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'VA') {?> selected <?php }?>>Virginia</option>
                        <option value="WA" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'WA') {?> selected <?php }?>>Washington</option>
                        <option value="WV" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'WV') {?> selected <?php }?>>West Virginia</option>
                        <option value="WI" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'WI') {?> selected <?php }?>>Wisconsin</option>
                        <option value="WY" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->state == 'WY') {?> selected <?php }?>>Wyoming</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>ZIP / Postal code</label>
                    <input class="form-control" name="zip" <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->zip;?>
" <?php }?>>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Department'];?>
</label>
                    <select class="form-control" name="department">
                        <option value="">None</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departments']->value, 'department');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['department']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['department']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['end_user']->value && $_smarty_tpl->tpl_vars['end_user']->value->department_id == $_smarty_tpl->tpl_vars['department']->value->id) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['department']->value->dname;?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Model</label>
                    <input class="form-control" name="model" <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->model;?>
" <?php }?>>
                </div>
            </div>
        </div>



    </form>

</div>
<div class="modal-footer">

    <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->id;?>
">
    <?php } else { ?>
        <input type="hidden" name="id" value="">
    <?php }?>

    <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</button>
    <button class="btn btn-primary btnEndUser" type="submit" id="btnEndUser"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
</div><?php }
}
