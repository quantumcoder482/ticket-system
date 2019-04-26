<?php
/* Smarty version 3.1.33, created on 2019-01-21 06:18:38
  from '/Users/razib/Documents/valet/suite/ui/theme/default/client_profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c45aa8ebb6021_78797354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ac5c9d28b7f24b8c0fa7adb861cdbbf16c99175' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/client_profile.tpl',
      1 => 1548069516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c45aa8ebb6021_78797354 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13618448385c45aa8eba1b52_94928295', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4194745635c45aa8ebb5826_63600892', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_client']->value));
}
/* {block "content"} */
class Block_13618448385c45aa8eba1b52_94928295 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13618448385c45aa8eba1b52_94928295',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-4">
            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] == '') {?>
                        <a href="javascript:;" onclick="upload_profile_picture();"><img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png" class="img-circle" style="max-width: 128px;" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value->account;?>
"></a>
                    <?php } else { ?>
                        <a href="javascript:;" onclick="upload_profile_picture();">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;
echo $_smarty_tpl->tpl_vars['user']->value->img;?>
" class="img-circle" style="max-width: 128px;" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value->account;?>
">
                        </a>
                    <?php }?>

                    <form enctype="multipart/form-data" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/profile-picture-upload" id="form_profile_picture">
                        <input type="file" id="file_profile_picture" name="file" style="display: none;" />
                    </form>

                    <h3 style="margin-top: 20px; margin-bottom: 20px;"><?php echo $_smarty_tpl->tpl_vars['user']->value->account;?>
</h3>

                    <address>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->company != '') {?>
                            <?php echo $_smarty_tpl->tpl_vars['user']->value->company;?>

                            <br>
                            <?php echo $_smarty_tpl->tpl_vars['user']->value->account;?>

                            <br>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['user']->value->account;?>

                            <br>
                        <?php }?>
                        <?php echo $_smarty_tpl->tpl_vars['user']->value->address;?>
 <br>
                        <?php echo $_smarty_tpl->tpl_vars['user']->value->city;?>
 <br>
                        <?php echo $_smarty_tpl->tpl_vars['user']->value->state;?>
 - <?php echo $_smarty_tpl->tpl_vars['user']->value->zip;?>
 <br>
                        <?php echo $_smarty_tpl->tpl_vars['user']->value->country;?>

                        <br>
                        <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['user']->value->phone;?>

                        <br>
                        <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>


                        <?php if ($_smarty_tpl->tpl_vars['config']->value['show_business_number'] == '1') {?>

                          <br>

                            <strong><?php echo $_smarty_tpl->tpl_vars['config']->value['label_business_number'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['user']->value->business_number;?>


                        <?php }?>


                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cf']->value, 'cfs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cfs']->value) {
?>
                            <br>
                            <strong><?php echo $_smarty_tpl->tpl_vars['cfs']->value['fieldname'];?>
: </strong> <?php echo get_custom_field_value($_smarty_tpl->tpl_vars['cfs']->value['id'],$_smarty_tpl->tpl_vars['user']->value->id);?>

                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </address>


                    <a class="btn btn-primary" href="javascript:;" onclick="upload_profile_picture();"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Upload Picture'];?>
</a>

                    <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] != '') {?>
                        <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/remove-profile-picture"><?php echo $_smarty_tpl->tpl_vars['_L']->value['No Image'];?>
</a>
                    <?php }?>




                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">


                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit Profile'];?>
</h5>


                </div>
                <div class="ibox-content">


                    <form class="form-horizontal" id="iform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="account"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account Name'];?>
</label>

                            <div class="col-lg-10"><input type="text" id="account" name="account" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>
">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="company"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company Name'];?>
</label>

                            <div class="col-lg-10"><input type="text" id="company" name="company" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['company'];?>
">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="edit_email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</label>

                            <div class="col-lg-10"><input type="text" id="edit_email" name="edit_email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="phone"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</label>

                            <div class="col-lg-10"><input type="text" id="phone" name="phone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['phone'];?>
">

                            </div>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['config']->value['show_business_number'] == '1') {?>

                            <div class="form-group">

                                <label class="col-lg-2 control-label" for="business_number"><?php echo $_smarty_tpl->tpl_vars['config']->value['label_business_number'];?>
</label>

                                <div class="col-lg-10">

                                    <input type="text" id="business_number" name="business_number" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['business_number'];?>
">

                                </div>
                            </div>

                        <?php }?>

                        <div class="form-group"><label class="col-lg-2 control-label" for="address"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>

                            <div class="col-lg-10"><input type="text" id="address" name="address" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['address'];?>
">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="city"><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
</label>

                            <div class="col-lg-10"><input type="text" id="city" name="city" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['city'];?>
">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="state"><?php echo $_smarty_tpl->tpl_vars['_L']->value['State Region'];?>
</label>

                            <div class="col-lg-10"><input type="text" id="state" name="state" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['state'];?>
">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="zip"><?php echo $_smarty_tpl->tpl_vars['_L']->value['ZIP Postal Code'];?>
 </label>

                            <div class="col-lg-10"><input type="text" id="zip" name="zip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['zip'];?>
">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="country"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
</label>

                            <div class="col-lg-10">

                                <select name="country" id="country" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Country'];?>
</option>
                                    <?php echo $_smarty_tpl->tpl_vars['countries']->value;?>

                                </select>

                            </div>
                        </div>



                        <div class="form-group"><label class="col-lg-2 control-label" for="password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
 </label>

                            <div class="col-lg-10">
                                <input type="password" id="password" name="password" class="form-control">

                                <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['password_change_help'];?>
</span>

                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">

                                <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
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
/* {block "script"} */
class Block_4194745635c45aa8ebb5826_63600892 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_4194745635c45aa8ebb5826_63600892',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>

        var $file_profile_picture = $("#file_profile_picture");

        function upload_profile_picture()
        {
            $file_profile_picture.click();
        }

        $(function () {
            $file_profile_picture.change(function() {
                $('#form_profile_picture').submit();
            });
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
