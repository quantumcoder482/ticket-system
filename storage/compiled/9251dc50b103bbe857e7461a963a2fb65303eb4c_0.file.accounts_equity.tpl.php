<?php
/* Smarty version 3.1.33, created on 2018-11-27 07:28:57
  from '/Users/razib/Documents/valet/suite/ui/theme/default/accounts_equity.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bfd38899ff941_67124174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9251dc50b103bbe857e7461a963a2fb65303eb4c' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/accounts_equity.tpl',
      1 => 1543320856,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bfd38899ff941_67124174 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16151173755bfd38899ef425_14369447', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20547688575bfd38899fe698_85303860', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_16151173755bfd38899ef425_14369447 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16151173755bfd38899ef425_14369447',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">

                    <h3><?php echo $_smarty_tpl->tpl_vars['account']->value->account;?>
</h3>

                    <div class="hr-line-dashed"></div>

                    <form method="post" id="mainForm">

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'currency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->value) {
?>

                            <div class="form-group">
                                <label for="balance_<?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Initial Balance'];?>
 [ <?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
 ]</label>
                                <input type="text" class="form-control amount" id="balance_<?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
" name="balance_<?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
" <?php if (isset($_smarty_tpl->tpl_vars['currencies_all']->value[$_smarty_tpl->tpl_vars['currency']->value->iso_code])) {?>
                                    data-a-sign="<?php echo $_smarty_tpl->tpl_vars['currencies_all']->value[$_smarty_tpl->tpl_vars['currency']->value->iso_code]['symbol'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['currencies_all']->value[$_smarty_tpl->tpl_vars['currency']->value->iso_code]['thousands_separator'];?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['currencies_all']->value[$_smarty_tpl->tpl_vars['currency']->value->iso_code]['decimal_mark'];?>
" <?php if (($_smarty_tpl->tpl_vars['currencies_all']->value[$_smarty_tpl->tpl_vars['currency']->value->iso_code]['symbol_first'] == true)) {?> data-p-sign="p" <?php } else { ?> data-p-sign="s" <?php }?>
                                <?php }?> data-d-group="3">
                            </div>

                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        <input type="hidden" name="account_id" value="<?php echo $_smarty_tpl->tpl_vars['account']->value->id;?>
">

                        <button class="btn btn-primary" type="submit" id="btnSubmit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
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
/* {block 'script'} */
class Block_20547688575bfd38899fe698_85303860 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_20547688575bfd38899fe698_85303860',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/numeric.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>

        $(function () {

            $('.amount').autoNumeric('init', {
                vMax: '9999999999999999.00',
                vMin: '-9999999999999999.00'
            });

            $('#btnSubmit').click(function (e) {
                e.preventDefault();
                $.post("<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/equity-post", $('#mainForm').serialize()).done(function () {
                    window.location = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/list';
                }).fail(function (data) {
                    spNotify(data.responseText, 'error');
                });

            });

        })

    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
