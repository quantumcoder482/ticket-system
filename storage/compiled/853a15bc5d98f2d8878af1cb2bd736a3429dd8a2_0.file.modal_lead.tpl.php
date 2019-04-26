<?php
/* Smarty version 3.1.33, created on 2018-11-08 18:53:19
  from '/Users/razib/Documents/valet/suite/ui/theme/default/modal_lead.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be4cc6f6fcd88_22920367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '853a15bc5d98f2d8878af1cb2bd736a3429dd8a2' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/modal_lead.tpl',
      1 => 1494511922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be4cc6f6fcd88_22920367 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        <?php if ($_smarty_tpl->tpl_vars['act']->value == 'edit') {?>
            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>

            <?php } elseif ($_smarty_tpl->tpl_vars['act']->value == 'view') {?>
            <?php echo $_smarty_tpl->tpl_vars['lead']->value->salutation;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->first_name;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->middle_name;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->last_name;?>

        <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['_L']->value['New Lead'];?>

        <?php }?>
    </h3>
</div>
<div class="modal-body">



    <?php if ($_smarty_tpl->tpl_vars['act']->value == 'edit' || $_smarty_tpl->tpl_vars['act']->value == 'new') {?>

        <form class="form-horizontal" id="ib_modal_form">



            <div class="row">

                <div class="col-md-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="is_public" checked> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Public'];?>

                        </label>
                    </div>
                </div>

                <div class="col-md-4">

                </div>

                <div class="col-md-4">

                </div>


            </div>

            <div class="row">







                <div class="col-md-12">



                    <div class="form-group"><label class="col-md-12" for="status"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</label>
                        <div class="col-md-12">
                            <select class="selectpicker" id="status" name="status">

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ls']->value, 's');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
?>
                                    <?php if ($_smarty_tpl->tpl_vars['act']->value == 'edit') {?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['sname'];?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value['status'] == $_smarty_tpl->tpl_vars['s']->value['sname']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['s']->value['sname'];?>
</option>
                                        <?php } else { ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['sname'];?>
" <?php if ($_smarty_tpl->tpl_vars['s']->value['is_default'] == '1') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['s']->value['sname'];?>
</option>
                                    <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                            </select>
                        </div>
                    </div>


                    <div class="form-group"><label class="col-md-12" for="salutation"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Salutation'];?>
</label>
                        <div class="col-md-12">
                            <select class="selectpicker" id="salutation" name="salutation">
                                <option value="None">--<?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
--</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['salutations']->value, 'salutation');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['salutation']->value) {
?>
                                    <?php if ($_smarty_tpl->tpl_vars['act']->value == 'edit') {?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['salutation']->value['sname'];?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value['salutation'] == $_smarty_tpl->tpl_vars['salutation']->value['sname']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['salutation']->value['sname'];?>
</option>
                                    <?php } else { ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['salutation']->value['sname'];?>
"><?php echo $_smarty_tpl->tpl_vars['salutation']->value['sname'];?>
</option>
                                    <?php }?>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group"><label class="col-md-12" for="first_name"><?php echo $_smarty_tpl->tpl_vars['_L']->value['First Name'];?>
</label>
                        <div class="col-md-12">
                            <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['first_name'];?>
">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-md-12" for="first_name"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Middle Name'];?>
</label>
                        <div class="col-md-12">
                            <input type="text" id="middle_name" name="middle_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['middle_name'];?>
">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-md-12" for="last_name"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Last Name'];?>
<small class="red">*</small></label>

                        <div class="col-md-12"><input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['last_name'];?>
">

                        </div>

                    </div>

                    <div class="form-group"><label class="col-md-12" for="title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Title'];?>
</label>
                        <div class="col-md-12">
                            <input type="text" id="title" name="title" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-md-12" for="company"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company'];?>
</label>
                        <div class="col-md-12">
                            <select class="selectpicker" id="company" name="company">
                                <option value="None">--<?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
--</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['companies']->value, 'company');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['company']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['company']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value['company'] == $_smarty_tpl->tpl_vars['company']->value['company_name']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['company']->value['company_name'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>

                        </div>
                    </div>

                    <div class="form-group"><label class="col-md-12" for="email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</label>
                        <div class="col-md-12">
                            <input type="text" id="email" name="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['email'];?>
">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-md-12" for=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</label>
                        <div class="col-md-12">
                            <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['phone'];?>
">
                        </div>
                    </div>




                    <div class="form-group"><label class="col-md-12" for="source"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Source'];?>
</label>
                        <div class="col-md-12">
                            <select class="selectpicker" id="source" name="source">
                                <option value="None">--<?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
--</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sources']->value, 'source');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['source']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['source']->value['sname'];?>
"><?php echo $_smarty_tpl->tpl_vars['source']->value['sname'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group"><label class="col-md-12" for="industry"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Industry'];?>
</label>
                        <div class="col-md-12">
                            <select class="selectpicker" id="industry" name="industry">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['industries']->value, 'industry');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['industry']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['industry']->value['industry'];?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value['industry'] == $_smarty_tpl->tpl_vars['industry']->value['industry']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['industry']->value['industry'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>


                                                                                                                    
                                                                                                                    


                    <fieldset>
                        <legend><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</legend>

                        <div class="form-group"><label class="col-md-12" for="street"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Street'];?>
</label>
                            <div class="col-md-12">
                                <textarea class="form-control" id="street" name="street" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="form-group"><label class="col-md-12" for="city"><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
</label>
                            <div class="col-md-12">
                                <input type="text" id="company" name="city" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['city'];?>
">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-md-12" for="state"><?php echo $_smarty_tpl->tpl_vars['_L']->value['State Region'];?>
</label>
                            <div class="col-md-12">
                                <input type="text" id="state" name="state" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['state'];?>
">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-md-12" for="zip"><?php echo $_smarty_tpl->tpl_vars['_L']->value['ZIP Postal Code'];?>
</label>
                            <div class="col-md-12">
                                <input type="text" id="zip" name="zip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['zip'];?>
">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-md-12" for="country"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
</label>
                            <div class="col-md-12">
                                <input type="text" id="country" name="country" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['country'];?>
">
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</legend>

                        <div class="form-group"><label class="col-md-12" for="memo"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Memo'];?>
</label>
                            <div class="col-md-12">
                                <textarea class="form-control" id="memo" name="memo" rows="4"></textarea>
                            </div>
                        </div>


                        </fieldset>



                </div>




            </div>




            <input type="hidden" name="act" id="act" value="<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
">
            <input type="hidden" name="lid" id="lid" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['lid'];?>
">
        </form>


        <?php } else { ?>


        <div class="row">
            <div class="col-md-3 ib_profile_width">

                <div class="panel panel-default" id="ibox_panel">

                    <div class="panel-body">
                        <div class="thumb-info mb-md">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/profile-place-holder.jpg" class="img-thumbnail img-responsive" alt=" ">
                            <div class="thumb-info-title">
                                <span class="thumb-info-inner"><?php echo $_smarty_tpl->tpl_vars['lead']->value->salutation;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->first_name;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->middle_name;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->last_name;?>
</span>

                            </div>
                        </div>





                        <h5 class="text-muted"><?php echo $_smarty_tpl->tpl_vars['lead']->value->email;?>
</h5>
                        <h5 class="text-muted"><?php echo $_smarty_tpl->tpl_vars['lead']->value->phone;?>
</h5>







                    </div>

                                                                                            
                        

                                                                                                
                                                                    


                </div>

            </div>

            <div class="col-md-9">

                <!-- START TIMELINE -->
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo $_smarty_tpl->tpl_vars['lead']->value->salutation;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->first_name;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->middle_name;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->last_name;?>
</h5>
                    </div>

                    <div class="ibox-content" id="ibox_form" style="position: static; zoom: 1;">


                        <div id="application_ajaxrender" style="min-height: 200px;">
                            <p>

                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Name'];?>
: </strong> <?php echo $_smarty_tpl->tpl_vars['lead']->value->salutation;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->first_name;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->middle_name;?>
 <?php echo $_smarty_tpl->tpl_vars['lead']->value->last_name;?>
 <br>
                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company Name'];?>
: </strong> <?php echo $_smarty_tpl->tpl_vars['lead']->value->company;?>
 <br>
                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
: </strong>  <?php echo $_smarty_tpl->tpl_vars['lead']->value->email;?>
  <br>
                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
: </strong>  <?php echo $_smarty_tpl->tpl_vars['lead']->value->phone;?>
  <br>
                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
: </strong>  <?php echo $_smarty_tpl->tpl_vars['lead']->value->street;?>
  <br>
                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
: </strong>  <?php echo $_smarty_tpl->tpl_vars['lead']->value->city;?>
  <br>
                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['State Region'];?>
: </strong>  <?php echo $_smarty_tpl->tpl_vars['lead']->value->state;?>
  <br>
                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['ZIP Postal Code'];?>
: </strong>  <?php echo $_smarty_tpl->tpl_vars['lead']->value->zip;?>
  <br>
                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
: </strong>  <?php echo $_smarty_tpl->tpl_vars['lead']->value->country;?>
  <br>




                            </p>

                            <hr>

                            <a href="#" class="md-btn md-btn-primary act_convert_to_customer"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Convert to Customer'];?>
</a>

                            <input type="hidden" name="v_lid" id="v_lid" value="<?php echo $_smarty_tpl->tpl_vars['lead']->value->id;?>
">

                            <hr>

                            <textarea class="form-control" id="v_memo" name="v_memo" rows="6"><?php echo $_smarty_tpl->tpl_vars['lead']->value->memo;?>
</textarea>

                            <button type="button" id="memo_update" class="btn btn-primary btn-block mt-sm act_memo_update"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>


                            </div>

                    </div>
                </div>
                <!-- END TIMELINE -->

            </div>

        </div>


    <?php }?>




</div>
<div class="modal-footer">

    <?php if ($_smarty_tpl->tpl_vars['act']->value == 'edit' || $_smarty_tpl->tpl_vars['act']->value == 'new') {?>

    <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>

    <?php } else { ?>

        <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Close'];?>
</button>

    <?php }?>
</div>

<div id="modal_search_address" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Stack Two</h4>
    </div>
    <div class="modal-body">
        <p>One fine body…</p>
        <p>One fine body…</p>
        <input class="form-control" type="text" data-tabindex="1">
        <input class="form-control" type="text" data-tabindex="2">
        <button class="btn btn-default" data-toggle="modal" href="#stack3">Launch modal</button>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
        <button type="button" class="btn btn-primary">Ok</button>
    </div>
</div><?php }
}
