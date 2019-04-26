<?php
/* Smarty version 3.1.33, created on 2019-04-18 01:19:56
  from '/home/pscope/public_html/ui/theme/default/users-add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb808fc818da9_84797880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cf62a2b6787649c87bab8f83a52cab063e57a5c' => 
    array (
      0 => '/home/pscope/public_html/ui/theme/default/users-add.tpl',
      1 => 1553599355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb808fc818da9_84797880 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2974250155cb808fc7f3ba9_51366248', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_2974250155cb808fc7f3ba9_51366248 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2974250155cb808fc7f3ba9_51366248',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New User'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-post">
                        <div class="form-group">
                            <label for="username"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Username'];?>
</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="fullname"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Name'];?>
</label>
                            <input type="text" class="form-control" id="fullname" name="fullname">
                        </div>
                        <div class="form-group">
                                                                                                                
                                                        
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['User'];?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</label>

                            <div class="i-checks"><label> <input type="radio" value="Admin" name="user_type" checked> <i></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Administrator'];?>
 </label></div>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
?>
                                <div class="i-checks"><label> <input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['role']->value['id'];?>
" name="user_type"> <i></i> <?php echo $_smarty_tpl->tpl_vars['role']->value['rname'];?>
 </label></div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                        </div>




                        <div class="form-group">
                            <label for="password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="cpassword"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Confirm Password'];?>
</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword">
                        </div>


                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Job title'];?>
</label>
                            <input class="form-control" name="job_title" <?php if ($_smarty_tpl->tpl_vars['employee']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['employee']->value->job_title;?>
" <?php }?>>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>
                            <input class="form-control" name="address" <?php if ($_smarty_tpl->tpl_vars['employee']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['employee']->value->address_line_1;?>
" <?php }?>>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
</label>
                            <input class="form-control" name="city" <?php if ($_smarty_tpl->tpl_vars['employee']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['employee']->value->city;?>
" <?php }?>>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['State Region'];?>
</label>
                                    <input class="form-control" name="state" <?php if ($_smarty_tpl->tpl_vars['employee']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['employee']->value->state;?>
" <?php }?>>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['ZIP Postal Code'];?>
</label>
                                    <input class="form-control" name="zip" <?php if ($_smarty_tpl->tpl_vars['employee']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['employee']->value->zip;?>
" <?php }?>>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
</label>
                            <select class="form-control" name="country">
                                <?php if ($_smarty_tpl->tpl_vars['employee']->value) {?>
                                    <?php echo Countries::all($_smarty_tpl->tpl_vars['employee']->value->country);?>

                                <?php } else { ?>
                                    <?php echo Countries::all($_smarty_tpl->tpl_vars['config']->value['country']);?>

                                <?php }?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date Joined'];?>
</label>
                            <input class="form-control" name="date_hired" datepicker
                                   data-date-format="yyyy-mm-dd" data-auto-close="true"  <?php if ($_smarty_tpl->tpl_vars['employee']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['employee']->value->date_hired;?>
" <?php } else { ?> value="<?php echo date('Y-m-d');?>
" <?php }?>>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Pay frequency'];?>
</label>
                            <select class="form-control" name="pay_frequency">
                                <option value="Monthly" <?php if ($_smarty_tpl->tpl_vars['employee']->value && $_smarty_tpl->tpl_vars['employee']->value->pay_frequency == 'Monthly') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Monthly'];?>
</option>
                                <option value="Hourly" <?php if ($_smarty_tpl->tpl_vars['employee']->value && $_smarty_tpl->tpl_vars['employee']->value->pay_frequency == 'Hourly') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Hourly'];?>
</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</label>
                            <input class="form-control amount" name="amount" <?php if ($_smarty_tpl->tpl_vars['employee']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['employee']->value->amount;?>
" <?php }?>>
                        </div>


                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Summary'];?>
</label>
                            <textarea class="form-control" rows="10" name="summary"><?php if ($_smarty_tpl->tpl_vars['employee']->value) {
echo $_smarty_tpl->tpl_vars['employee']->value->summary;
}?></textarea>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Facebook Profile'];?>
</label>
                            <input class="form-control" type="text" name="facebook" <?php if ($_smarty_tpl->tpl_vars['employee']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['employee']->value->facebook;?>
" <?php }?>>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Linkedin Profile'];?>
</label>
                            <input class="form-control" type="text" name="linkedin" <?php if ($_smarty_tpl->tpl_vars['employee']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['employee']->value->linkedin;?>
" <?php }?>>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Twitter'];?>
</label>
                            <input class="form-control" type="text" name="twitter" <?php if ($_smarty_tpl->tpl_vars['employee']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['employee']->value->linkedin;?>
" <?php }?>>
                        </div>


                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                        <?php echo $_smarty_tpl->tpl_vars['_L']->value['Or'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</a>
                    </form>

                </div>
            </div>



        </div>

        <div class="col-md-6">
            <?php if (isset($_smarty_tpl->tpl_vars['config']->value['employee_proficiencies']) && $_smarty_tpl->tpl_vars['config']->value['employee_proficiencies'] == 1) {?>

                <div class="panel">
                    <div class="panel-body">
                        <h3>Proficiencies</h3>
                        <div class="hr-line-dashed"></div>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departments']->value, 'department');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['department']->value) {
?>

                            <div class="checkbox" style="margin-bottom: 20px;">
                                <div class="i-checks"><label> <input name="sales_edit" class="ib_checkbox" type="checkbox" value="yes"> <span style="margin-left: 15px;"><?php echo $_smarty_tpl->tpl_vars['department']->value->dname;?>
</span></label></div>
                            </div>

                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                    </div>
                </div>

            <?php }?>
        </div>



    </div>



<?php
}
}
/* {/block "content"} */
}
