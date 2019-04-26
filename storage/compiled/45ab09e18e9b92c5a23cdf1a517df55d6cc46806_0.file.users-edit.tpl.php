<?php
/* Smarty version 3.1.33, created on 2018-11-22 20:53:37
  from '/Users/razib/Documents/valet/suite/ui/theme/default/users-edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf75da164b0b6_31493114',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45ab09e18e9b92c5a23cdf1a517df55d6cc46806' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/users-edit.tpl',
      1 => 1542938015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf75da164b0b6_31493114 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18312932685bf75da1635b49_67073392', "style");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4179945185bf75da1637a08_93592200', "content");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14080459495bf75da16491e9_70616607', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_18312932685bf75da1635b49_67073392 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_18312932685bf75da1635b49_67073392',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php if ($_smarty_tpl->tpl_vars['d']->value['img'] != '') {?>

        <style>
            #croppic{

                background-image: url(<?php echo $_smarty_tpl->tpl_vars['app_url']->value;
echo $_smarty_tpl->tpl_vars['d']->value['img'];?>
);

            }
        </style>

    <?php }?>


<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_4179945185bf75da1637a08_93592200 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4179945185bf75da1637a08_93592200',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit User'];?>
</h5>

                </div>
                <div class="ibox-content" id="application_ajaxrender">

                    <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit-post">
                        <div class="form-group">
                            <label for="username"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Username'];?>
</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
">
                        </div>

                        <div class="form-group">
                            <label for="fullname"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Name'];?>
</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
">
                        </div>

                        <div class="form-group">
                            <label for="phonenumber"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</label>
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['phonenumber'];?>
">
                        </div>

                        <div class="form-group">
                            <label for="user_language"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default_Language'];?>
</label>
                            <select class="form-control" name="user_language" id="user_language">


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
" <?php if ($_smarty_tpl->tpl_vars['selected_language']->value == $_smarty_tpl->tpl_vars['language']->value['iso_code']) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </select>
                        </div>

                        <div class="form-group">
                            <div id="croppic"></div>

                            <button type="button" id="cropContainerHeaderButton" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Upload Picture'];?>
</button>
                                                        <button type="button" id="no_image" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['_L']->value['No Image'];?>
</button>
                        </div>

                        <div class="form-group">
                            <label for="fullname"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Picture'];?>
</label>
                            <input type="text" class="form-control picture" id="picture" readonly name="picture" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['img'];?>
">
                        </div>

                        <?php if (($_smarty_tpl->tpl_vars['user']->value['id']) != ($_smarty_tpl->tpl_vars['d']->value['id'])) {?>
                            <div class="form-group">


                                <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['User'];?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</label>

                                <div class="i-checks"><label> <input type="radio" value="Admin" name="user_type" <?php if ($_smarty_tpl->tpl_vars['d']->value->user_type == 'Admin') {?>checked<?php }?>> <i></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Administrator'];?>
 </label></div>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
?>
                                    <div class="i-checks"><label> <input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['role']->value['id'];?>
" name="user_type" <?php if ($_smarty_tpl->tpl_vars['d']->value->roleid == $_smarty_tpl->tpl_vars['role']->value['id']) {?>checked<?php }?>> <i></i> <?php echo $_smarty_tpl->tpl_vars['role']->value['rname'];?>
 </label></div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                            </div>
                        <?php }?>

                        <div class="form-group">
                            <label for="password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['password_change_help'];?>
</span>
                        </div>

                        <div class="form-group">
                            <label for="cpassword"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Confirm Password'];?>
</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword">
                        </div>

                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
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



            <div class="ibox float-e-margins" id="ui_settings">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Notifications'];?>
</h5>

                </div>
                <div class="ibox-content" id="application_ajaxrender">

                    <table class="table table-hover">
                        <tbody>




                        <tr>
                            <td width="80%"><label for="config_email_notify"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['user']->value->email_notify == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_email_notify"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_sms_notify"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMS'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['user']->value->sms_notify == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_sms_notify"></td>
                        </tr>






                        </tbody>
                    </table>

                </div>
            </div>


        </div>



    </div>


    <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                    </div>
                    <div class="modal-body">
                        <div class="avatar-body">

                            <!-- Upload image and data -->
                            <div class="avatar-upload">
                                <input type="hidden" class="avatar-src" name="avatar_src">
                                <input type="hidden" class="avatar-data" name="avatar_data">
                                <label for="avatarInput">Local upload</label>
                                <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                            </div>

                            <!-- Crop and preview -->
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="avatar-wrapper"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="avatar-preview preview-lg"></div>
                                    <div class="avatar-preview preview-md"></div>
                                    <div class="avatar-preview preview-sm"></div>
                                </div>
                            </div>

                            <div class="row avatar-btns">
                                <div class="col-md-9">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>



<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_14080459495bf75da16491e9_70616607 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_14080459495bf75da16491e9_70616607',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>







<?php echo '<script'; ?>
>




    $(function () {




        $('#config_email_notify').change(function() {

            $('#ui_settings').block({ message: null });


            if($(this).prop('checked')){

                $.post( base_url+'settings/set_notify/', { opt: "email_notify", val: "1" })
                    .done(function( data ) {
                        $('#ui_settings').unblock();
                        location.reload();
                    });

            }
            else{
                $.post( _url+'settings/set_notify/', { opt: "email_notify", val: "0" })
                    .done(function( data ) {
                        $('#ui_settings').unblock();
                        location.reload();
                    });
            }
        });

        $('#config_sms_notify').change(function() {

            $('#ui_settings').block({ message: null });


            if($(this).prop('checked')){

                $.post( base_url+'settings/set_notify/', { opt: "sms_notify", val: "1" })
                    .done(function( data ) {
                        $('#ui_settings').unblock();
                        location.reload();
                    });

            }
            else{
                $.post( _url+'settings/set_notify/', { opt: "sms_notify", val: "0" })
                    .done(function( data ) {
                        $('#ui_settings').unblock();
                        location.reload();
                    });
            }
        });


        var _url = $("#_url").val();


        var croppicHeaderOptions = {

            uploadUrl: _url + 'sys_imgcrop/save/',
            cropData:{
                "email":1,
                "rnd":"rnd"
            },
            cropUrl:  _url + 'sys_imgcrop/crop/',
            outputUrlId:'picture',
            customUploadButtonId:'cropContainerHeaderButton',
            modal:false,
            loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
            onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
            onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
            onImgDrag: function(){ console.log('onImgDrag') },
            onImgZoom: function(){ console.log('onImgZoom') },
            onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
            onAfterImgCrop:function(){ console.log('onAfterImgCrop') }
        }
        var croppic = new Croppic('croppic', croppicHeaderOptions);


        var sysrender = $('#application_ajaxrender');




        sysrender.on('click', '#no_image', function(e){
            e.preventDefault();
            $('#picture').val('');

        });


        // sysrender.on('click', '#opt_gravatar', function(e){
        //     e.preventDefault();
        //
        //     $('.picture').val('gravatar');
        //
        // });

        sysrender.on('click', '#more_submit', function(e){
            e.preventDefault();


            $('#ibox_form').block({ message: null });
            var _url = $("#_url").val();
            $.post(_url + 'contacts/edit-more/', {
                cid: $('#cid').val(),
                picture: $('#picture').val(),
                facebook: $('#facebook').val(),
                google: $('#google').val(),
                linkedin: $('#linkedin').val()

            })
                .done(function (data) {

                    setTimeout(function () {
                        var sbutton = $("#more_submit");
                        var _url = $("#_url").val();
                        if ($.isNumeric(data)) {

                            window.location = _url + 'contacts/view/' + data + '/';
                        }
                        else {
                            $('#ibox_form').unblock();

                            $("#emsgbody").html(data);
                            $("#emsg").show("slow");
                        }
                    }, 2000);
                });

        });


        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue'
        });

    })

<?php echo '</script'; ?>
>


<?php
}
}
/* {/block "script"} */
}
