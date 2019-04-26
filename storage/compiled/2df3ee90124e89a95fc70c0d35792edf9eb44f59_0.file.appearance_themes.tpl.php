<?php
/* Smarty version 3.1.33, created on 2019-02-21 14:08:12
  from '/Users/razib/Documents/valet/suite/ui/theme/default/appearance_themes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c6ef71c2e6c90_80394405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2df3ee90124e89a95fc70c0d35792edf9eb44f59' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/appearance_themes.tpl',
      1 => 1550776079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c6ef71c2e6c90_80394405 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1424702875c6ef71c2aa009_65540592', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_1424702875c6ef71c2aa009_65540592 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1424702875c6ef71c2aa009_65540592',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Themes'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
appearance/themes_post/">


                        <div class="form-group">
                            <label for="theme"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Theme'];?>
</label>
                            <select name="theme" id="theme" class="form-control">
                                
                                
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, (($tmp = @$_smarty_tpl->tpl_vars['themes']->value)===null||$tmp==='' ? array() : $tmp), 'theme');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['theme']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
"
                                            <?php if ($_smarty_tpl->tpl_vars['config']->value['theme'] == $_smarty_tpl->tpl_vars['theme']->value) {?>selected="selected" <?php }?>><?php echo ucfirst($_smarty_tpl->tpl_vars['theme']->value);?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nstyle"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Style'];?>
</label>
                            <select name="nstyle" id="nstyle" class="form-control">
                                <option value="light_blue" <?php if ($_smarty_tpl->tpl_vars['config']->value['nstyle'] == 'light_blue') {?>selected="selected" <?php }?>>Light blue</option>
                                <option value="purple" <?php if ($_smarty_tpl->tpl_vars['config']->value['nstyle'] == 'purple') {?>selected="selected" <?php }?>>Purple</option>
                                <option value="indigo_blue" <?php if ($_smarty_tpl->tpl_vars['config']->value['nstyle'] == 'indigo_blue') {?>selected="selected" <?php }?>>Indigo blue</option>
                                <option value="dark" <?php if ($_smarty_tpl->tpl_vars['config']->value['nstyle'] == 'dark') {?>selected="selected" <?php }?>>Dark sf</option>

                                <option value="blue_extra" <?php if ($_smarty_tpl->tpl_vars['config']->value['nstyle'] == 'blue_extra') {?>selected="selected" <?php }?>>Blue extra</option>

                            </select>
                        </div>




                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                    </form>

                </div>
            </div>










        </div>




    </div>
<?php
}
}
/* {/block "content"} */
}
