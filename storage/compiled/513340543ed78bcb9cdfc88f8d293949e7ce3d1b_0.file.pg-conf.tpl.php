<?php
/* Smarty version 3.1.33, created on 2018-11-07 08:14:38
  from '/Users/razib/Documents/valet/suite/ui/theme/default/pg-conf.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be2e53e7a6561_92021774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '513340543ed78bcb9cdfc88f8d293949e7ce3d1b' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/pg-conf.tpl',
      1 => 1506420890,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be2e53e7a6561_92021774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10366183545be2e53e78b013_91027105', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1764248655be2e53e7a52a4_47966059', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_10366183545be2e53e78b013_91027105 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10366183545be2e53e78b013_91027105',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-<?php if ($_smarty_tpl->tpl_vars['extra_panel']->value == '') {?>12<?php } else { ?>6<?php }?>">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
</h5>

                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>
                    <form class="form-horizontal" method="post" id="pg-conf" role="form">

                        <?php if ((isset($_smarty_tpl->tpl_vars['icon_url']->value)) && ($_smarty_tpl->tpl_vars['icon_url']->value) != '') {?>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">&nbsp;</label>
                                <div class="col-sm-9">
                                    <img style="max-height: 64px;" src="<?php echo $_smarty_tpl->tpl_vars['icon_url']->value;?>
">
                                </div>
                            </div>
                        <?php }?>


                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
">
                            </div>
                        </div>

                                                                                                                                                
                        <div class="form-group">
                            <label for="value" class="col-sm-3 control-label">


                                <?php echo $_smarty_tpl->tpl_vars['label']->value['value'];?>




                            </label>
                            <div class="col-sm-9">



                                <?php echo $_smarty_tpl->tpl_vars['input']->value['value'];?>

                                <?php if (($_smarty_tpl->tpl_vars['help_txt']->value['value']) != '') {?>
                                    <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['help_txt']->value['value'];?>
</span>
                                <?php }?>
                            </div>
                        </div>





                        <?php if ((isset($_smarty_tpl->tpl_vars['label']->value['c1'])) && ($_smarty_tpl->tpl_vars['label']->value['c1']) != '') {?>
                            <div class="form-group">
                                <label for="c1" class="col-sm-3 control-label"> <?php echo $_smarty_tpl->tpl_vars['label']->value['c1'];?>
 </label>
                                <div class="col-sm-9">
                                    <?php echo $_smarty_tpl->tpl_vars['input']->value['c1'];?>

                                    <?php if (($_smarty_tpl->tpl_vars['help_txt']->value['c1']) != '') {?>
                                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['help_txt']->value['c1'];?>
</span>
                                    <?php }?>
                                </div>
                            </div>
                        <?php }?>

                        <?php if ((isset($_smarty_tpl->tpl_vars['label']->value['c2'])) && ($_smarty_tpl->tpl_vars['label']->value['c2']) != '') {?>

                            <div class="form-group">
                                <label for="c2" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['label']->value['c2'];?>
</label>
                                <div class="col-sm-9">
                                    <?php echo $_smarty_tpl->tpl_vars['input']->value['c2'];?>

                                    <?php if (($_smarty_tpl->tpl_vars['help_txt']->value['c2']) != '') {?>
                                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['help_txt']->value['c2'];?>
</span>
                                    <?php }?>
                                </div>
                            </div>

                        <?php }?>


                        <?php if ((isset($_smarty_tpl->tpl_vars['label']->value['c3'])) && ($_smarty_tpl->tpl_vars['label']->value['c3']) != '') {?>

                            <div class="form-group">
                                <label for="c3" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['label']->value['c3'];?>
</label>
                                <div class="col-sm-9">
                                    <?php echo $_smarty_tpl->tpl_vars['input']->value['c3'];?>

                                    <?php if (($_smarty_tpl->tpl_vars['help_txt']->value['c3']) != '') {?>
                                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['help_txt']->value['c3'];?>
</span>
                                    <?php }?>
                                </div>
                            </div>

                        <?php }?>



                        <?php if ((isset($_smarty_tpl->tpl_vars['label']->value['c4'])) && ($_smarty_tpl->tpl_vars['label']->value['c4']) != '') {?>

                            <div class="form-group">
                                <label for="c4" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['label']->value['c4'];?>
</label>
                                <div class="col-sm-9">
                                    <?php echo $_smarty_tpl->tpl_vars['input']->value['c4'];?>

                                    <?php if (($_smarty_tpl->tpl_vars['help_txt']->value['c4']) != '') {?>
                                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['help_txt']->value['c4'];?>
</span>
                                    <?php }?>
                                </div>
                            </div>

                        <?php }?>



                        <?php if ((isset($_smarty_tpl->tpl_vars['label']->value['c5'])) && ($_smarty_tpl->tpl_vars['label']->value['c5']) != '') {?>
                            <div class="form-group">
                                <label for="c5" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['label']->value['c5'];?>
</label>
                                <div class="col-sm-9">
                                    <?php echo $_smarty_tpl->tpl_vars['input']->value['c5'];?>

                                    <?php if (($_smarty_tpl->tpl_vars['help_txt']->value['c5']) != '') {?>
                                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['help_txt']->value['c5'];?>
</span>
                                    <?php }?>
                                </div>
                            </div>
                        <?php }?>


                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control">
                                    <option value="Active" <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] == 'Active') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Active'];?>
</option>
                                    <option value="Inactive" <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] == 'Inactive') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Inactive'];?>
</option>

                                </select>



                            </div>
                        </div>


                        <?php if ((isset($_smarty_tpl->tpl_vars['label']->value['mode'])) && ($_smarty_tpl->tpl_vars['label']->value['mode'])) {?>

                            <div class="form-group">
                                <label for="mode" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Mode'];?>
</label>
                                <div class="col-sm-9">
                                    <select name="mode" id="mode" class="form-control">
                                        <option value="Live" <?php if ($_smarty_tpl->tpl_vars['d']->value['mode'] == 'Live') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Live'];?>
</option>
                                        <option value="Sandbox" <?php if ($_smarty_tpl->tpl_vars['d']->value['mode'] == 'Sandbox') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sandbox'];?>
</option>

                                    </select>

                                    <?php if (($_smarty_tpl->tpl_vars['help_txt']->value['mode']) != '') {?>
                                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['help_txt']->value['mode'];?>
</span>
                                    <?php }?>

                                </div>
                            </div>

                        <?php }?>



                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="hidden" name="pgid" id="pgid" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                                <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                                | <?php echo $_smarty_tpl->tpl_vars['_L']->value['Or'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/pg/"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Back To The List'];?>
</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>


        <?php if ($_smarty_tpl->tpl_vars['extra_panel']->value != '') {?>
            <div class="col-md-6">
                <?php echo $_smarty_tpl->tpl_vars['extra_panel']->value;?>

            </div>
        <?php }?>

    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_1764248655be2e53e7a52a4_47966059 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1764248655be2e53e7a52a4_47966059',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        
        $(document).ready(function () {

            $("#emsg").hide();
            $("#submit").click(function (e) {
                e.preventDefault();
                $('#ibox_form').block({ message: null });
                var _url = $("#_url").val();
                $.post(_url + 'settings/pg-post/', {


                    name: $('#name').val(),
                    settings: $('#settings').val(),
                    pgid: $('#pgid').val(),
                    value: $('#value').val(),
                    status: $('#status').val(),
                    c1: $('#c1').val(),
                    c2: $('#c2').val(),
                    c3: $('#c3').val(),
                    c4: $('#c4').val(),
                    c5: $('#c5').val(),
                    mode: $('#mode').val()
                })
                    .done(function (data) {

                        setTimeout(function () {
                            var sbutton = $("#submit");
                            var _url = $("#_url").val();
                            if ($.isNumeric(data)) {

                                location.reload();
                            }
                            else {
                                $('#ibox_form').unblock();
                                var body = $("html, body");
                                body.animate({scrollTop:0}, '1000', 'swing');
                                $("#emsgbody").html(data);
                                $("#emsg").show("slow");
                            }
                        }, 2000);
                    });
            });
        });
        
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
