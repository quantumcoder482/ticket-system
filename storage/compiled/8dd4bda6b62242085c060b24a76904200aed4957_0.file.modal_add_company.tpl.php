<?php
/* Smarty version 3.1.33, created on 2019-02-12 04:39:20
  from '/Users/razib/Documents/valet/suite/ui/theme/default/modal_add_company.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c629448c6d844_04804215',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dd4bda6b62242085c060b24a76904200aed4957' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/modal_add_company.tpl',
      1 => 1549964135,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c629448c6d844_04804215 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        <?php if ($_smarty_tpl->tpl_vars['f_type']->value == 'edit') {?>
            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>

        <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['_L']->value['New Company'];?>

        <?php }?>
    </h3>
</div>
<div class="modal-body">



    <form class="form-horizontal" id="ib_modal_form">


        <div class="row">
            <div class="col-md-6">



                <div class="form-group">
                    <label class="col-md-12" for="company_name"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company Name'];?>
<small class="red">*</small></label>

                    <div class="col-md-12"><input type="text" id="company_name" name="company_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['company_name'];?>
">

                    </div>


                </div>


                <div class="form-group">
                    <label class="col-md-12" for="code"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Code'];?>
<small class="red">*</small></label>

                    <div class="col-md-12"><input type="text" id="code" name="code" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['code'];?>
">

                    </div>


                </div>

                <?php if ($_smarty_tpl->tpl_vars['config']->value['show_business_number'] == '1') {?>


                    <div class="form-group">
                        <label class="col-md-12" for="business_number"><?php echo $_smarty_tpl->tpl_vars['config']->value['label_business_number'];?>
</label>

                        <div class="col-md-12"><input type="text" id="business_number" name="business_number" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['business_number'];?>
">

                        </div>


                    </div>


                <?php }?>


                <div class="form-group"><label class="col-md-12" for="url"><?php echo $_smarty_tpl->tpl_vars['_L']->value['URL'];?>
</label>

                    <div class="col-md-12"><input type="text" id="url" name="url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['url'];?>
">

                    </div>


                </div>


                <div class="form-group"><label class="col-md-12" for="email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</label>

                    <div class="col-md-12"><input type="text" id="email" name="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['email'];?>
">

                    </div>


                </div>


                <div class="form-group"><label class="col-md-12" for="phone"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</label>

                    <div class="col-md-12"><input type="text" id="phone" name="phone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['phone'];?>
">

                    </div>


                </div>


                <?php if ($_smarty_tpl->tpl_vars['config']->value['fax_field'] == '1') {?>


                    <div class="form-group"><label class="col-md-12" for="fax"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Fax'];?>
</label>

                        <div class="col-md-12"><input type="text" id="fax" name="fax" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['fax'];?>
">

                        </div>


                    </div>



                <?php }?>


                <div class="form-group"><label class="col-md-12" for="logo_url"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logo URL'];?>
</label>

                    <div class="col-md-12"><input type="text" id="logo_url" name="logo_url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['logo_url'];?>
">

                    </div>


                </div>






            </div>

            <div class="col-md-6">

                <div class="form-group"><label class="col-md-12" for="c_address1"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>

                    <div class="col-lg-12"><input type="text" id="c_address1" name="address1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['address1'];?>
">

                    </div>


                </div>

                <div class="form-group"><label class="col-md-12" for="c_city"><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
</label>

                    <div class="col-md-12"><input type="text" id="c_city" name="city" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['city'];?>
">

                    </div>


                </div>

                <div class="form-group"><label class="col-md-12" for="c_state"><?php echo $_smarty_tpl->tpl_vars['_L']->value['State Region'];?>
</label>


                    <div class="col-md-12"><input type="text" id="c_state" name="state" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['state'];?>
"></div>


                </div>

                <div class="form-group"><label class="col-md-12" for="c_zip"><?php echo $_smarty_tpl->tpl_vars['_L']->value['ZIP Postal Code'];?>
</label>

                    <div class="col-md-12"><input type="text" id="c_zip" name="zip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['zip'];?>
"></div>


                </div>

                <div class="form-group"><label class="col-md-12" for="c_country"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
</label>

                    <div class="col-md-12">
                        <select name="country" id="c_country" class="form-control country">
                            <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Country'];?>
</option>
                            <?php echo $_smarty_tpl->tpl_vars['countries']->value;?>

                        </select>
                    </div>


                </div>



            </div>
        </div>



        <input type="hidden" name="f_type" id="f_type" value="<?php echo $_smarty_tpl->tpl_vars['f_type']->value;?>
">
        <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['cid'];?>
">
    </form>

</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
</div><?php }
}
