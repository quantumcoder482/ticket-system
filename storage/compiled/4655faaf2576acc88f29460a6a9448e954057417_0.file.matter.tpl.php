<?php
/* Smarty version 3.1.33, created on 2018-12-29 12:24:07
  from '/Users/razib/Documents/valet/suite/apps/legal/views/matter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c27adb76422b5_57507880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4655faaf2576acc88f29460a6a9448e954057417' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/legal/views/matter.tpl',
      1 => 1546104226,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c27adb76422b5_57507880 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7148712585c27adb7635635_25048368', "style");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11916102105c27adb7636a85_17883419', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1381955845c27adb76401a3_26412085', "script");
?>

<?php }
/* {block "style"} */
class Block_7148712585c27adb7635635_25048368 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_7148712585c27adb7635635_25048368',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/dp/dist/datepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/sn/summernote.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/sn/summernote-bs3.css" />
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_11916102105c27adb7636a85_17883419 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11916102105c27adb7636a85_17883419',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-8">
            <div class="ibox ">
                <div class="ibox-title">
                    <h3>Matter</h3>

                </div>
                <div class="ibox-content">

                    <form method="post" id="mainForm" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
legal/app/matter-post">

                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Client</label>
                                    <select class="form-control" name="contact_id">
                                        <option value="">Choose one...</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contacts']->value, 'contact');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['contact']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['contact']->value->account;?>
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
                                    <label>Client reference number</label>
                                    <input class="form-control" name="client_reference_number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input class="form-control" name="location">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Responsible solicitor</label>
                                    <select class="form-control" name="responsible_solicitor_id">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['staffs']->value, 'staff');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['staff']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['staff']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['user']->value->id == $_smarty_tpl->tpl_vars['staff']->value->id) {?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['staff']->value->fullname;?>
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
                                    <label>Originating solicitor</label>
                                    <select class="form-control" name="originating_solicitor_id">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['staffs']->value, 'staff');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['staff']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['staff']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['user']->value->id == $_smarty_tpl->tpl_vars['staff']->value->id) {?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['staff']->value->fullname;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Open date</label>
                                    <input class="form-control" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true" name="open_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Close date</label>
                                    <input class="form-control" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true" name="close_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pending date</label>
                                    <input class="form-control" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true" name="pending_date">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="richTextArea"></textarea>
                        </div>



                        <button type="submit" id="btnSubmit" class="btn btn-primary">Save</button>

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
class Block_1381955845c27adb76401a3_26412085 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1381955845c27adb76401a3_26412085',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/dp/dist/datepicker.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/numeric.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/sn/summernote.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>

        $(function () {

            $('[data-toggle="datepicker"]').datepicker();

            $('#richTextArea').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']], // no style button
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],

                    ['table', ['table']], // no table button
                    ['view', ['codeview']], // no table button
                    //['help', ['help']] //no help button
                ]
            });

            var $btnSubmit = $('#btnSubmit');
            var $mainForm = $('#mainForm');

            $mainForm.on('submit',function (e) {
                e.preventDefault();
                $btnSubmit.prop('disabled',true);
                $.post( "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
legal/app/matter-post", $mainForm.serialize() ).done(function() {
                    window.location = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
legal/app/matters';
                }).fail(function(data) {
                    spNotify(data.responseText,'error');
                    $btnSubmit.prop('disabled',false);
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
