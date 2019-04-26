<?php
/* Smarty version 3.1.33, created on 2018-10-29 18:33:26
  from '/Users/razib/Documents/valet/suite/ui/theme/default/contacts_files.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bd78ab67b01e4_45814245',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b582941ce19427a75182c4c52d1dbb3ba6caf8f' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/contacts_files.tpl',
      1 => 1493577818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bd78ab67b01e4_45814245 (Smarty_Internal_Template $_smarty_tpl) {
?>

<form class="form-horizontal" id="rform">


    <div class="form-group"><label class="col-lg-2 control-label" for="c_file"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Files'];?>
</label>

        <div class="col-lg-10">

            <select name="c_file" id="c_file" class="form-control">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['files']->value, 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['file']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['file']->value['title'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            </select>

        </div>
    </div>


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">

            <button class="btn btn-primary" type="submit" id="assign_file"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
        </div>
    </div>

</form>
<hr>
<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>

        <th class="text-right" data-sort-ignore="true" width="20px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</th>

        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Title'];?>
</th>

        <th class="text-right" data-sort-ignore="true" width="100px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>

    </tr>
    </thead>
    <tbody>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>

        <tr>

            <td>
                <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'jpg' || $_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'png' || $_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'gif') {?>
                    <i class="fa fa-file-image-o"></i>
                <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'pdf') {?>
                    <i class="fa fa-file-pdf-o"></i>
                <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'zip') {?>
                    <i class="fa fa-file-archive-o"></i>
                <?php } else { ?>
                    <i class="fa fa-file"></i>
                <?php }?>
            </td>


            <td>

                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
documents/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['title'];?>
</a>

            </td>

            <td class="text-right">

                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/remove_file/<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-success btn-xs"><i class="fa fa-times"></i> </a>

            </td>


        </tr>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </tbody>
</table>
<?php }
}
