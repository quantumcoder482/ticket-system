<?php
/* Smarty version 3.1.33, created on 2018-11-06 04:50:35
  from '/Users/razib/Documents/valet/suite/ui/theme/default/asset.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be163eb237388_45472213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b39926c11d05859b627a960537bd4c04212dae3' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/asset.tpl',
      1 => 1541497829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be163eb237388_45472213 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17585200475be163eb2244a9_90796327', "style");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12675887425be163eb225645_23494297', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20094556055be163eb233b06_55627243', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_17585200475be163eb2244a9_90796327 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_17585200475be163eb2244a9_90796327',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/dp/dist/datepicker.min.css" />
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_12675887425be163eb225645_23494297 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12675887425be163eb225645_23494297',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <h3>Add an asset</h3>
                    <div class="hr-line-dashed"></div>
                    <form method="post" id="mainForm">
                        <div class="form-group">
                            <label for="inputName">Name*</label>
                            <input class="form-control" id="inputName" name="name" <?php if ($_smarty_tpl->tpl_vars['asset']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['asset']->value->name;?>
" <?php }?>>
                        </div>
                        <div class="form-group">
                            <label>Date purchased</label>
                            <input class="form-control" name="date_purchased" datepicker
                                   data-date-format="yyyy-mm-dd" data-auto-close="true"  <?php if ($_smarty_tpl->tpl_vars['asset']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['asset']->value->date_purchased;?>
" <?php } else { ?> value="<?php echo date('Y-m-d');?>
" <?php }?>>
                        </div>
                        <div class="form-group">
                            <label>Supported until / Warranty</label>
                            <input class="form-control" name="supported_until" datepicker
                                   data-date-format="yyyy-mm-dd" data-auto-close="true" <?php if ($_smarty_tpl->tpl_vars['asset']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['asset']->value->supported_until;?>
" <?php } else { ?> value="<?php echo date('Y-m-d',strtotime('+1 year'));?>
" <?php }?>>
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Price</label>
                            <input class="form-control amount" id="inputPrice" name="price"  <?php if ($_smarty_tpl->tpl_vars['asset']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['asset']->value->price;?>
" <?php }?>>
                        </div>
                        <div class="form-group">
                            <label for="inputSerial">Serial</label>
                            <input class="form-control" id="inputSerial" name="serial"  <?php if ($_smarty_tpl->tpl_vars['asset']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['asset']->value->serial;?>
" <?php }?>>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
"
                                            <?php if ($_smarty_tpl->tpl_vars['asset']->value && $_smarty_tpl->tpl_vars['asset']->value->category_id == $_smarty_tpl->tpl_vars['category']->value->id) {?> selected <?php }?>
                                    ><?php echo $_smarty_tpl->tpl_vars['category']->value->name;?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" rows="10" name="notes"><?php if ($_smarty_tpl->tpl_vars['asset']->value) {
echo $_smarty_tpl->tpl_vars['asset']->value->notes;
}?></textarea>
                        </div>
                        <div class="form-group">
                            <?php if ($_smarty_tpl->tpl_vars['asset']->value) {?>
                            <input type="hidden" name="asset_id" value="<?php echo $_smarty_tpl->tpl_vars['asset']->value->id;?>
">
                            <?php }?>
                            <button class="btn btn-primary" id="btnSubmit" type="submit">Save</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['asset']->value) {?>
            <div class="col-md-6">

                <div class="panel">
                    <div class="panel-body">
                        <a href="javascript:;" onclick="confirmThenGoToUrl(event,'delete/asset/<?php echo $_smarty_tpl->tpl_vars['asset']->value->id;?>
');" class="btn btn-danger">Delete</a>
                    </div>
                </div>

            </div>


        <?php }?>


    </div>

<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_20094556055be163eb233b06_55627243 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_20094556055be163eb233b06_55627243',
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
>

        $(function () {

            $('.amount').autoNumeric('init', {

                aSign: '<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 ',
                dGroup: <?php echo $_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'];?>
,
                aPad: <?php echo $_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'];?>
,
                pSign: '<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
',
                aDec: '<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
',
                aSep: '<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
',
                vMax: '9999999999999999.00',
                vMin: '-9999999999999999.00'

            });

            $('#btnSubmit').click(function (e) {
                e.preventDefault();

                $.post( "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
assets/asset-post", $('#mainForm').serialize() ).done(function() {
                    window.location = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
assets/list';
                }).fail(function(data) {
                    console.log(data.responseText);
                    spNotify(data.responseText,'error');
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
