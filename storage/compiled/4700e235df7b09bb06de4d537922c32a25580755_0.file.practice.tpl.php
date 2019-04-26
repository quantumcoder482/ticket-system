<?php
/* Smarty version 3.1.33, created on 2018-11-21 05:17:42
  from '/Users/razib/Documents/valet/suite/apps/legal/views/practice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf530c65bc9f1_79496967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4700e235df7b09bb06de4d537922c32a25580755' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/legal/views/practice.tpl',
      1 => 1542795460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf530c65bc9f1_79496967 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10236808515bf530c65b3422_75985319', "style");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8854279255bf530c65b5f21_98822554', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6987484195bf530c65b9a71_42748518', "script");
?>

<?php }
/* {block "style"} */
class Block_10236808515bf530c65b3422_75985319 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_10236808515bf530c65b3422_75985319',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/dp/dist/datepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/dropzone/dropzone.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/sn/summernote.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/sn/summernote-bs3.css" />
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_8854279255bf530c65b5f21_98822554 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8854279255bf530c65b5f21_98822554',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-8">
            <div class="ibox ">
                <div class="ibox-title">
                    <h3>Add practice</h3>

                </div>
                <div class="ibox-content">

                    <form>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input class="form-control" name="date">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Practice No.</label>
                                    <input class="form-control" name="date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cause instant PART</label>
                                    <select class="form-control" name="party_1">
                                        <option>Search...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>LAWYER   Cause instant PART</label>
                                    <select class="form-control" name="party_1">
                                        <option>Search...</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Part called in question</label>
                                    <select class="form-control" name="party_1">
                                        <option>Search...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>LAWYER   Called in question PART</label>
                                    <select class="form-control" name="party_1">
                                        <option>Search...</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Mediation title</label>
                            <input class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Mediation object</label>
                            <textarea class="form-control" id="richTextArea"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input class="form-control" style="max-width: 200px;">
                        </div>

                        <div class="form-group">
                            <label>Mediator user</label>
                            <select class="form-control" name="party_1">
                                <option>Search...</option>
                            </select>
                        </div>

                        <h4>Dates of the meetings related to the practice</h4>
                        <div class="hr-line-dashed"></div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Start time</label>
                                    <input class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>End time</label>
                                    <input class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Note</label>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add more</a>
                        </div>

                        <h4>Payments</h4>
                        <div class="hr-line-dashed"></div>

                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h3>Upload documents</h3>

                </div>
                <div class="ibox-content">

                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['Drop File Here'];?>
</h3>
                            <br />
                            <span class="note"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Click to Upload'];?>
</span>
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
class Block_6987484195bf530c65b9a71_42748518 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_6987484195bf530c65b9a71_42748518',
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
ui/lib/dropzone/dropzone.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/sn/summernote.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        var files = [];
        Dropzone.autoDiscover = false;
        $(function () {

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
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
