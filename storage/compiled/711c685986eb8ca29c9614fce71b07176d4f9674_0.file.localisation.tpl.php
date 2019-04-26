<?php
/* Smarty version 3.1.33, created on 2018-11-08 02:58:41
  from '/Users/razib/Documents/valet/suite/ui/theme/default/localisation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be3ecb1b97486_73053730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '711c685986eb8ca29c9614fce71b07176d4f9674' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/localisation.tpl',
      1 => 1506420890,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be3ecb1b97486_73053730 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19685633695be3ecb1a82458_68436423', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_19685633695be3ecb1a82458_68436423 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19685633695be3ecb1a82458_68436423',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">


        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Localisation'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="localisation" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/lc-post/">


                        <div class="form-group">
                            <label for="tzone"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Timezone'];?>
</label>
                            <select name="tzone" id="tzone">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tlist']->value, 'label', false, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value => $_smarty_tpl->tpl_vars['label']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"
                                            <?php if ($_smarty_tpl->tpl_vars['config']->value['timezone'] == $_smarty_tpl->tpl_vars['value']->value) {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="country"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default Country'];?>
</label>
                            <select name="country" id="country">
                                <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Country'];?>
</option>
                                <?php echo $_smarty_tpl->tpl_vars['countries']->value;?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="df"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date Format'];?>
</label>
                            <select class="form-control" name="df" id="df">
                                <option value="d/m/Y" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'd/m/Y') {?> selected="selected" <?php }?>><?php echo date('d/m/Y');?>
</option>
                                <option value="d.m.Y" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'd.m.Y') {?> selected="selected" <?php }?>><?php echo date('d.m.Y');?>
</option>
                                <option value="d-m-Y" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'd-m-Y') {?> selected="selected" <?php }?>><?php echo date('d-m-Y');?>
</option>
                                <option value="m/d/Y" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'm/d/Y') {?> selected="selected" <?php }?>><?php echo date('m/d/Y');?>
</option>
                                <option value="Y/m/d" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'Y/m/d') {?> selected="selected" <?php }?>><?php echo date('Y/m/d');?>
</option>
                                <option value="Y-m-d" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'Y-m-d') {?> selected="selected" <?php }?>><?php echo date('Y-m-d');?>
</option>
                                                                                                
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="lan"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default_Language'];?>
</label>
                            <select class="form-control" name="lan" id="lan">


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
" <?php if ($_smarty_tpl->tpl_vars['config']->value['language'] == $_smarty_tpl->tpl_vars['language']->value['iso_code']) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cformat"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currency Format'];?>
</label>
                            <select class="form-control" name="cformat" id="cformat">
                                <option value="1" <?php if (($_smarty_tpl->tpl_vars['config']->value['dec_point'] == '.') && ($_smarty_tpl->tpl_vars['config']->value['thousands_sep'] == '')) {?> selected="selected" <?php }?>>
                                    1234.56
                                </option>
                                <option value="2" <?php if (($_smarty_tpl->tpl_vars['config']->value['dec_point'] == '.') && ($_smarty_tpl->tpl_vars['config']->value['thousands_sep'] == ',')) {?> selected="selected" <?php }?>>
                                    1,234.56
                                </option>
                                <option value="3" <?php if (($_smarty_tpl->tpl_vars['config']->value['dec_point'] == ',') && ($_smarty_tpl->tpl_vars['config']->value['thousands_sep'] == '')) {?> selected="selected" <?php }?>>
                                    1234,56
                                </option>
                                <option value="4" <?php if (($_smarty_tpl->tpl_vars['config']->value['dec_point'] == ',') && ($_smarty_tpl->tpl_vars['config']->value['thousands_sep'] == '.')) {?> selected="selected" <?php }?>>
                                    1.234,56
                                </option>
                            </select>
                        </div>

                                                                        
                                                                                                
                        

                        <div class="form-group">
                            <label for="home_currency"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Home Currency'];?>
</label>
                                                        


                            <select name="home_currency" id="home_currency">

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'currency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->value) {
?>

                                    <option data-symbol="<?php echo $_smarty_tpl->tpl_vars['currency']->value['symbol'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['currency']->value['code'];?>
" <?php if (($_smarty_tpl->tpl_vars['config']->value['home_currency'] == $_smarty_tpl->tpl_vars['currency']->value['code'])) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['currency']->value['symbol'];?>
 - <?php echo $_smarty_tpl->tpl_vars['currency']->value['name'];?>
 [ <?php echo $_smarty_tpl->tpl_vars['currency']->value['code'];?>
 ]</option>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </select>


                        </div>

                        <div class="form-group">
                            <label for="currency_code"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currency Symbol'];?>
</label>
                            <input type="text" class="form-control" id="currency_code" name="currency_code"
                                   value="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
">
                            <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Keep it blank if currency code'];?>
</span>
                        </div>

                        <div class="form-group">
                            <label for="currency_symbol_position"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currency Symbol Position'];?>
</label>
                            <select class="form-control" name="currency_symbol_position" id="currency_symbol_position">

                                <option value="p" <?php if (($_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'] == 'p')) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Left'];?>
</option>
                                <option value="s" <?php if (($_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'] == 's')) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Right'];?>
</option>




                            </select>
                        </div>

                        <div class="form-group">
                            <label for="currency_decimal_digits"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currency Decimal Digits'];?>
</label>
                            <select class="form-control" name="currency_decimal_digits" id="currency_decimal_digits">

                                <option value="false" <?php if (($_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'] == 'false')) {?> selected="selected" <?php }?>>0 (e.g. 100)</option>
                                <option value="true" <?php if (($_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'] == 'true')) {?> selected="selected" <?php }?>>2 (e.g. 100.00)</option>




                            </select>
                        </div>

                        <div class="form-group">
                            <label for="thousand_separator_placement"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Thousand Separator Placement'];?>
</label>
                            <select class="form-control" name="thousand_separator_placement" id="thousand_separator_placement">

                                <option value="2" <?php if (($_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'] == '2')) {?> selected="selected" <?php }?>>2 (e.g. - 22,22,22,333)</option>
                                <option value="3" <?php if (($_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'] == '3')) {?> selected="selected" <?php }?>>3 (e.g. - 333,333,333)</option>
                                <option value="4" <?php if (($_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'] == '4')) {?> selected="selected" <?php }?>>4 (e.g. - 4,4444,4444)</option>




                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                    </form>

                </div>
            </div>


        </div>

        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Charset n Collation'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="localisation" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/lc-charset-post">


                        <div class="form-group">
                            <label for="coll"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Set Charset n Collation'];?>
</label>
                            <select class="form-control" name="coll" id="coll">
                                <option value=""></option>
                                <optgroup label="armscii8" title="ARMSCII-8 Armenian">
                                    <option value="armscii8_bin"
                                            title="Armenian, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'armscii8_bin') {?> selected="selected" <?php }?>>
                                        armscii8_bin
                                    </option>
                                    <option value="armscii8_general_ci"
                                            title="Armenian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'armscii8_general_ci') {?> selected="selected" <?php }?>>
                                        armscii8_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="ascii" title="US ASCII">
                                    <option value="ascii_bin"
                                            title="West European (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ascii_bin') {?> selected="selected" <?php }?>>
                                        ascii_bin
                                    </option>
                                    <option value="ascii_general_ci"
                                            title="West European (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ascii_general_ci') {?> selected="selected" <?php }?>>
                                        ascii_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="big5" title="Big5 Traditional Chinese">
                                    <option value="big5_bin"
                                            title="Traditional Chinese, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'big5_bin') {?> selected="selected" <?php }?>>
                                        big5_bin
                                    </option>
                                    <option value="big5_chinese_ci"
                                            title="Traditional Chinese, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'big5_chinese_ci') {?> selected="selected" <?php }?>>
                                        big5_chinese_ci
                                    </option>
                                </optgroup>
                                <optgroup label="binary" title="Binary pseudo charset">
                                    <option value="binary" title="Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'binary') {?> selected="selected" <?php }?>>
                                        binary
                                    </option>
                                </optgroup>
                                <optgroup label="cp1250" title="Windows Central European">
                                    <option value="cp1250_bin"
                                            title="Central European (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1250_bin') {?> selected="selected" <?php }?>>
                                        cp1250_bin
                                    </option>
                                    <option value="cp1250_croatian_ci"
                                            title="Croatian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1250_croatian_ci') {?> selected="selected" <?php }?>>
                                        cp1250_croatian_ci
                                    </option>
                                    <option value="cp1250_czech_cs"
                                            title="Czech, case-sensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1250_czech_cs') {?> selected="selected" <?php }?>>
                                        cp1250_czech_cs
                                    </option>
                                    <option value="cp1250_general_ci"
                                            title="Central European (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1250_general_ci') {?> selected="selected" <?php }?>>
                                        cp1250_general_ci
                                    </option>
                                    <option value="cp1250_polish_ci"
                                            title="Polish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1250_polish_ci') {?> selected="selected" <?php }?>>
                                        cp1250_polish_ci
                                    </option>
                                </optgroup>
                                <optgroup label="cp1251" title="Windows Cyrillic">
                                    <option value="cp1251_bin"
                                            title="Cyrillic (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == '') {?> selected="selected" <?php }?>>
                                        cp1251_bin
                                    </option>
                                    <option value="cp1251_bulgarian_ci"
                                            title="Bulgarian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1251_bulgarian_ci') {?> selected="selected" <?php }?>>
                                        cp1251_bulgarian_ci
                                    </option>
                                    <option value="cp1251_general_ci"
                                            title="Cyrillic (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1251_general_ci') {?> selected="selected" <?php }?>>
                                        cp1251_general_ci
                                    </option>
                                    <option value="cp1251_general_cs"
                                            title="Cyrillic (multilingual), case-sensitive <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1251_general_cs') {?> selected="
                                            selected
                                    " <?php }?>">
                                    cp1251_general_cs
                                    </option>
                                    <option value="cp1251_ukrainian_ci"
                                            title="Ukrainian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1251_ukrainian_ci') {?> selected="selected" <?php }?>>
                                        cp1251_ukrainian_ci
                                    </option>
                                </optgroup>
                                <optgroup label="cp1256" title="Windows Arabic">
                                    <option value="cp1256_bin"
                                            title="Arabic, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1256_bin') {?> selected="selected" <?php }?>>
                                        cp1256_bin
                                    </option>
                                    <option value="cp1256_general_ci"
                                            title="Arabic, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1256_general_ci') {?> selected="selected" <?php }?>>
                                        cp1256_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="cp1257" title="Windows Baltic">
                                    <option value="cp1257_bin"
                                            title="Baltic (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1257_bin') {?> selected="selected" <?php }?>>
                                        cp1257_bin
                                    </option>
                                    <option value="cp1257_general_ci"
                                            title="Baltic (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1257_general_ci') {?> selected="selected" <?php }?>>
                                        cp1257_general_ci
                                    </option>
                                    <option value="cp1257_lithuanian_ci"
                                            title="Lithuanian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp1257_lithuanian_ci') {?> selected="selected" <?php }?>>
                                        cp1257_lithuanian_ci
                                    </option>
                                </optgroup>
                                <optgroup label="cp850" title="DOS West European">
                                    <option value="cp850_bin"
                                            title="West European (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp850_bin') {?> selected="selected" <?php }?>>
                                        cp850_bin
                                    </option>
                                    <option value="cp850_general_ci"
                                            title="West European (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp850_general_ci') {?> selected="selected" <?php }?>>
                                        cp850_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="cp852" title="DOS Central European">
                                    <option value="cp852_bin"
                                            title="Central European (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp852_bin') {?> selected="selected" <?php }?>>
                                        cp852_bin
                                    </option>
                                    <option value="cp852_general_ci"
                                            title="Central European (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp852_general_ci') {?> selected="selected" <?php }?>>
                                        cp852_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="cp866" title="DOS Russian">
                                    <option value="cp866_bin"
                                            title="Russian, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp866_bin') {?> selected="selected" <?php }?>>
                                        cp866_bin
                                    </option>
                                    <option value="cp866_general_ci"
                                            title="Russian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp866_general_ci') {?> selected="selected" <?php }?>>
                                        cp866_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="cp932" title="SJIS for Windows Japanese">
                                    <option value="cp932_bin"
                                            title="Japanese, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp932_bin') {?> selected="selected" <?php }?>>
                                        cp932_bin
                                    </option>
                                    <option value="cp932_japanese_ci"
                                            title="Japanese, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'cp932_japanese_ci') {?> selected="selected" <?php }?>>
                                        cp932_japanese_ci
                                    </option>
                                </optgroup>
                                <optgroup label="dec8" title="DEC West European">
                                    <option value="dec8_bin"
                                            title="West European (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'dec8_bin') {?> selected="selected" <?php }?>>
                                        dec8_bin
                                    </option>
                                    <option value="dec8_swedish_ci"
                                            title="Swedish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'dec8_swedish_ci') {?> selected="selected" <?php }?>>
                                        dec8_swedish_ci
                                    </option>
                                </optgroup>
                                <optgroup label="eucjpms" title="UJIS for Windows Japanese">
                                    <option value="eucjpms_bin"
                                            title="Japanese, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'eucjpms_bin') {?> selected="selected" <?php }?>>
                                        eucjpms_bin
                                    </option>
                                    <option value="eucjpms_japanese_ci"
                                            title="Japanese, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'eucjpms_japanese_ci') {?> selected="selected" <?php }?>>
                                        eucjpms_japanese_ci
                                    </option>
                                </optgroup>
                                <optgroup label="euckr" title="EUC-KR Korean">
                                    <option value="euckr_bin"
                                            title="Korean, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'euckr_bin') {?> selected="selected" <?php }?>>
                                        euckr_bin
                                    </option>
                                    <option value="euckr_korean_ci"
                                            title="Korean, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'euckr_korean_ci') {?> selected="selected" <?php }?>>
                                        euckr_korean_ci
                                    </option>
                                </optgroup>
                                <optgroup label="gb2312" title="GB2312 Simplified Chinese">
                                    <option value="gb2312_bin"
                                            title="Simplified Chinese, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'gb2312_bin') {?> selected="selected" <?php }?>>
                                        gb2312_bin
                                    </option>
                                    <option value="gb2312_chinese_ci"
                                            title="Simplified Chinese, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'gb2312_chinese_ci') {?> selected="selected" <?php }?>>
                                        gb2312_chinese_ci
                                    </option>
                                </optgroup>
                                <optgroup label="gbk" title="GBK Simplified Chinese">
                                    <option value="gbk_bin"
                                            title="Simplified Chinese, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'gbk_bin') {?> selected="selected" <?php }?>>
                                        gbk_bin
                                    </option>
                                    <option value="gbk_chinese_ci"
                                            title="Simplified Chinese, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'gbk_chinese_ci') {?> selected="selected" <?php }?>>
                                        gbk_chinese_ci
                                    </option>
                                </optgroup>
                                <optgroup label="geostd8" title="GEOSTD8 Georgian">
                                    <option value="geostd8_bin"
                                            title="Georgian, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'geostd8_bin') {?> selected="selected" <?php }?>>
                                        geostd8_bin
                                    </option>
                                    <option value="geostd8_general_ci"
                                            title="Georgian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'geostd8_general_ci') {?> selected="selected" <?php }?>>
                                        geostd8_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="greek" title="ISO 8859-7 Greek">
                                    <option value="greek_bin"
                                            title="Greek, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'greek_bin') {?> selected="selected" <?php }?>>
                                        greek_bin
                                    </option>
                                    <option value="greek_general_ci"
                                            title="Greek, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'greek_general_ci') {?> selected="selected" <?php }?>>
                                        greek_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="hebrew" title="ISO 8859-8 Hebrew">
                                    <option value="hebrew_bin"
                                            title="Hebrew, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'hebrew_bin') {?> selected="selected" <?php }?>>
                                        hebrew_bin
                                    </option>
                                    <option value="hebrew_general_ci"
                                            title="Hebrew, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'hebrew_general_ci') {?> selected="selected" <?php }?>>
                                        hebrew_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="hp8" title="HP West European">
                                    <option value="hp8_bin"
                                            title="West European (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'hp8_bin') {?> selected="selected" <?php }?>>
                                        hp8_bin
                                    </option>
                                    <option value="hp8_english_ci"
                                            title="English, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'hp8_english_ci') {?> selected="selected" <?php }?>>
                                        hp8_english_ci
                                    </option>
                                </optgroup>
                                <optgroup label="keybcs2" title="DOS Kamenicky Czech-Slovak">
                                    <option value="keybcs2_bin"
                                            title="Czech-Slovak, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'keybcs2_bin') {?> selected="selected" <?php }?>>
                                        keybcs2_bin
                                    </option>
                                    <option value="keybcs2_general_ci"
                                            title="Czech-Slovak, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'keybcs2_general_ci') {?> selected="selected" <?php }?>>
                                        keybcs2_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="koi8r" title="KOI8-R Relcom Russian">
                                    <option value="koi8r_bin"
                                            title="Russian, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'koi8r_bin') {?> selected="selected" <?php }?>>
                                        koi8r_bin
                                    </option>
                                    <option value="koi8r_general_ci"
                                            title="Russian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'koi8r_general_ci') {?> selected="selected" <?php }?>>
                                        koi8r_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="koi8u" title="KOI8-U Ukrainian">
                                    <option value="koi8u_bin"
                                            title="Ukrainian, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'koi8u_bin') {?> selected="selected" <?php }?>>
                                        koi8u_bin
                                    </option>
                                    <option value="koi8u_general_ci"
                                            title="Ukrainian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'koi8u_general_ci') {?> selected="selected" <?php }?>>
                                        koi8u_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="latin1" title="cp1252 West European">
                                    <option value="latin1_bin"
                                            title="West European (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin1_bin') {?> selected="selected" <?php }?>>
                                        latin1_bin
                                    </option>
                                    <option value="latin1_danish_ci"
                                            title="Danish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin1_danish_ci') {?> selected="selected" <?php }?>>
                                        latin1_danish_ci
                                    </option>
                                    <option value="latin1_general_ci"
                                            title="West European (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin1_general_ci') {?> selected="selected" <?php }?>>
                                        latin1_general_ci
                                    </option>
                                    <option value="latin1_general_cs"
                                            title="West European (multilingual), case-sensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin1_general_cs') {?> selected="selected" <?php }?>>
                                        latin1_general_cs
                                    </option>
                                    <option value="latin1_german1_ci"
                                            title="German (dictionary), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin1_german1_ci') {?> selected="selected" <?php }?>>
                                        latin1_german1_ci
                                    </option>
                                    <option value="latin1_german2_ci"
                                            title="German (phone book), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin1_german2_ci') {?> selected="selected" <?php }?>>
                                        latin1_german2_ci
                                    </option>
                                    <option value="latin1_spanish_ci"
                                            title="Spanish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin1_spanish_ci') {?> selected="selected" <?php }?>>
                                        latin1_spanish_ci
                                    </option>
                                    <option value="latin1_swedish_ci"
                                            title="Swedish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin1_swedish_ci') {?> selected="selected" <?php }?>>
                                        latin1_swedish_ci
                                    </option>
                                </optgroup>
                                <optgroup label="latin2" title="ISO 8859-2 Central European">
                                    <option value="latin2_bin"
                                            title="Central European (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin2_bin') {?> selected="selected" <?php }?>>
                                        latin2_bin
                                    </option>
                                    <option value="latin2_croatian_ci"
                                            title="Croatian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin2_croatian_ci') {?> selected="selected" <?php }?>>
                                        latin2_croatian_ci
                                    </option>
                                    <option value="latin2_czech_cs"
                                            title="Czech, case-sensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin2_czech_cs') {?> selected="selected" <?php }?>>
                                        latin2_czech_cs
                                    </option>
                                    <option value="latin2_general_ci"
                                            title="Central European (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin2_general_ci') {?> selected="selected" <?php }?>>
                                        latin2_general_ci
                                    </option>
                                    <option value="latin2_hungarian_ci"
                                            title="Hungarian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin2_hungarian_ci') {?> selected="selected" <?php }?>>
                                        latin2_hungarian_ci
                                    </option>
                                </optgroup>
                                <optgroup label="latin5" title="ISO 8859-9 Turkish">
                                    <option value="latin5_bin"
                                            title="Turkish, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin5_bin') {?> selected="selected" <?php }?>>
                                        latin5_bin
                                    </option>
                                    <option value="latin5_turkish_ci"
                                            title="Turkish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin5_turkish_ci') {?> selected="selected" <?php }?>>
                                        latin5_turkish_ci
                                    </option>
                                </optgroup>
                                <optgroup label="latin7" title="ISO 8859-13 Baltic">
                                    <option value="latin7_bin"
                                            title="Baltic (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin7_bin') {?> selected="selected" <?php }?>>
                                        latin7_bin
                                    </option>
                                    <option value="latin7_estonian_cs"
                                            title="Estonian, case-sensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin7_general_ci') {?> selected="selected" <?php }?>>
                                        latin7_estonian_cs
                                    </option>
                                    <option value="latin7_general_ci"
                                            title="Baltic (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin7_general_ci') {?> selected="selected" <?php }?>>
                                        latin7_general_ci
                                    </option>
                                    <option value="latin7_general_cs"
                                            title="Baltic (multilingual), case-sensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'latin7_general_cs') {?> selected="selected" <?php }?>>
                                        latin7_general_cs
                                    </option>


                                </optgroup>
                                <optgroup label="macce" title="Mac Central European">
                                    <option value="macce_bin"
                                            title="Central European (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'macce_bin') {?> selected="selected" <?php }?>>
                                        macce_bin
                                    </option>
                                    <option value="macce_general_ci"
                                            title="Central European (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'macce_general_ci') {?> selected="selected" <?php }?>>
                                        macce_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="macroman" title="Mac West European">
                                    <option value="macroman_bin"
                                            title="West European (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'macroman_bin') {?> selected="selected" <?php }?>>
                                        macroman_bin
                                    </option>
                                    <option value="macroman_general_ci"
                                            title="West European (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'macroman_general_ci') {?> selected="selected" <?php }?>>
                                        macroman_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="sjis" title="Shift-JIS Japanese">
                                    <option value="sjis_bin"
                                            title="Japanese, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'sjis_bin') {?> selected="selected" <?php }?>>
                                        sjis_bin
                                    </option>
                                    <option value="sjis_japanese_ci"
                                            title="Japanese, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'sjis_japanese_ci') {?> selected="selected" <?php }?>>
                                        sjis_japanese_ci
                                    </option>
                                </optgroup>
                                <optgroup label="swe7" title="7bit Swedish">
                                    <option value="swe7_bin"
                                            title="Swedish, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'swe7_bin') {?> selected="selected" <?php }?>>
                                        swe7_bin
                                    </option>
                                    <option value="swe7_swedish_ci"
                                            title="Swedish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'swe7_swedish_ci') {?> selected="selected" <?php }?>>
                                        swe7_swedish_ci
                                    </option>
                                </optgroup>
                                <optgroup label="tis620" title="TIS620 Thai">
                                    <option value="tis620_bin" title="Thai, Binary">tis620_bin</option>
                                    <option value="tis620_thai_ci"
                                            title="Thai, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'tis620_thai_ci') {?> selected="selected" <?php }?>>
                                        tis620_thai_ci
                                    </option>
                                </optgroup>
                                <optgroup label="ucs2" title="UCS-2 Unicode">
                                    <option value="ucs2_bin"
                                            title="Unicode (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_bin') {?> selected="selected" <?php }?>>
                                        ucs2_bin
                                    </option>
                                    <option value="ucs2_croatian_ci"
                                            title="Croatian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_croatian_ci') {?> selected="selected" <?php }?>>
                                        ucs2_croatian_ci
                                    </option>
                                    <option value="ucs2_czech_ci"
                                            title="Czech, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_czech_ci') {?> selected="selected" <?php }?>>
                                        ucs2_czech_ci
                                    </option>
                                    <option value="ucs2_danish_ci"
                                            title="Danish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_danish_ci') {?> selected="selected" <?php }?>>
                                        ucs2_danish_ci
                                    </option>
                                    <option value="ucs2_esperanto_ci"
                                            title="Esperanto, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_esperanto_ci') {?> selected="selected" <?php }?>>
                                        ucs2_esperanto_ci
                                    </option>
                                    <option value="ucs2_estonian_ci"
                                            title="Estonian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_estonian_ci') {?> selected="selected" <?php }?>>
                                        ucs2_estonian_ci
                                    </option>
                                    <option value="ucs2_general_ci"
                                            title="Unicode (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_general_ci') {?> selected="selected" <?php }?>>
                                        ucs2_general_ci
                                    </option>
                                    <option value="ucs2_general_mysql500_ci"
                                            title="Unicode (multilingual)" <?php if ($_smarty_tpl->tpl_vars['col']->value == '') {?> selected="ucs2_general_mysql500_ci" <?php }?>>
                                        ucs2_general_mysql500_ci
                                    </option>
                                    <option value="ucs2_german2_ci"
                                            title="German (phone book), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_german2_ci') {?> selected="selected" <?php }?>>
                                        ucs2_german2_ci
                                    </option>
                                    <option value="ucs2_hungarian_ci"
                                            title="Hungarian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_hungarian_ci') {?> selected="selected" <?php }?>>
                                        ucs2_hungarian_ci
                                    </option>
                                    <option value="ucs2_icelandic_ci"
                                            title="Icelandic, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_icelandic_ci') {?> selected="selected" <?php }?>>
                                        ucs2_icelandic_ci
                                    </option>
                                    <option value="ucs2_latvian_ci"
                                            title="Latvian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_latvian_ci') {?> selected="selected" <?php }?>>
                                        ucs2_latvian_ci
                                    </option>
                                    <option value="ucs2_lithuanian_ci"
                                            title="Lithuanian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_lithuanian_ci') {?> selected="selected" <?php }?>>
                                        ucs2_lithuanian_ci
                                    </option>
                                    <option value="ucs2_persian_ci"
                                            title="Persian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_persian_ci') {?> selected="selected" <?php }?>>
                                        ucs2_persian_ci
                                    </option>
                                    <option value="ucs2_polish_ci"
                                            title="Polish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == '') {?> selected="selected" <?php }?>>
                                        ucs2_polish_ci
                                    </option>
                                    <option value="ucs2_roman_ci"
                                            title="West European, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_roman_ci') {?> selected="selected" <?php }?>>
                                        ucs2_roman_ci
                                    </option>
                                    <option value="ucs2_romanian_ci"
                                            title="Romanian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_romanian_ci') {?> selected="selected" <?php }?>>
                                        ucs2_romanian_ci
                                    </option>
                                    <option value="ucs2_sinhala_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_sinhala_ci') {?> selected="selected" <?php }?>>
                                        ucs2_sinhala_ci
                                    </option>
                                    <option value="ucs2_slovak_ci"
                                            title="Slovak, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_slovak_ci') {?> selected="selected" <?php }?>>
                                        ucs2_slovak_ci
                                    </option>
                                    <option value="ucs2_slovenian_ci"
                                            title="Slovenian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_slovenian_ci') {?> selected="selected" <?php }?>>
                                        ucs2_slovenian_ci
                                    </option>
                                    <option value="ucs2_spanish2_ci"
                                            title="Traditional Spanish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_spanish2_ci') {?> selected="selected" <?php }?>>
                                        ucs2_spanish2_ci
                                    </option>
                                    <option value="ucs2_spanish_ci"
                                            title="Spanish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_spanish_ci') {?> selected="selected" <?php }?>>
                                        ucs2_spanish_ci
                                    </option>
                                    <option value="ucs2_swedish_ci"
                                            title="Swedish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_swedish_ci') {?> selected="selected" <?php }?>>
                                        ucs2_swedish_ci
                                    </option>
                                    <option value="ucs2_turkish_ci"
                                            title="Turkish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_turkish_ci') {?> selected="selected" <?php }?>>
                                        ucs2_turkish_ci
                                    </option>
                                    <option value="ucs2_unicode_520_ci"
                                            title="Unicode (multilingual)" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_unicode_520_ci') {?> selected="selected" <?php }?>>
                                        ucs2_unicode_520_ci
                                    </option>
                                    <option value="ucs2_unicode_ci"
                                            title="Unicode (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_unicode_ci') {?> selected="selected" <?php }?>>
                                        ucs2_unicode_ci
                                    </option>
                                    <option value="ucs2_vietnamese_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ucs2_vietnamese_ci') {?> selected="selected" <?php }?>>
                                        ucs2_vietnamese_ci
                                    </option>
                                </optgroup>
                                <optgroup label="ujis" title="EUC-JP Japanese">
                                    <option value="ujis_bin"
                                            title="Japanese, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ujis_bin') {?> selected="selected" <?php }?>>
                                        ujis_bin
                                    </option>
                                    <option value="ujis_japanese_ci"
                                            title="Japanese, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'ujis_japanese_ci') {?> selected="selected" <?php }?>>
                                        ujis_japanese_ci
                                    </option>
                                </optgroup>
                                <optgroup label="utf16" title="UTF-16 Unicode">
                                    <option value="utf16_bin"
                                            title="unknown, Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_bin') {?> selected="selected" <?php }?>>
                                        utf16_bin
                                    </option>
                                    <option value="utf16_croatian_ci"
                                            title="Croatian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_croatian_ci') {?> selected="selected" <?php }?>>
                                        utf16_croatian_ci
                                    </option>
                                    <option value="utf16_czech_ci"
                                            title="Czech, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == '') {?> selected="selected" <?php }?>>
                                        utf16_czech_ci
                                    </option>
                                    <option value="utf16_danish_ci"
                                            title="Danish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_danish_ci') {?> selected="selected" <?php }?>>
                                        utf16_danish_ci
                                    </option>
                                    <option value="utf16_esperanto_ci"
                                            title="Esperanto, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_esperanto_ci') {?> selected="selected" <?php }?>>
                                        utf16_esperanto_ci
                                    </option>
                                    <option value="utf16_estonian_ci"
                                            title="Estonian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_estonian_ci') {?> selected="selected" <?php }?>>
                                        utf16_estonian_ci
                                    </option>
                                    <option value="utf16_general_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_general_ci') {?> selected="selected" <?php }?>>
                                        utf16_general_ci
                                    </option>
                                    <option value="utf16_german2_ci"
                                            title="German (phone book), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_german2_ci') {?> selected="selected" <?php }?>>
                                        utf16_german2_ci
                                    </option>
                                    <option value="utf16_hungarian_ci"
                                            title="Hungarian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_hungarian_ci') {?> selected="selected" <?php }?>>
                                        utf16_hungarian_ci
                                    </option>
                                    <option value="utf16_icelandic_ci"
                                            title="Icelandic, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_icelandic_ci') {?> selected="selected" <?php }?>>
                                        utf16_icelandic_ci
                                    </option>
                                    <option value="utf16_latvian_ci"
                                            title="Latvian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_latvian_ci') {?> selected="selected" <?php }?>>
                                        utf16_latvian_ci
                                    </option>
                                    <option value="utf16_lithuanian_ci"
                                            title="Lithuanian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_lithuanian_ci') {?> selected="selected" <?php }?>>
                                        utf16_lithuanian_ci
                                    </option>
                                    <option value="utf16_persian_ci"
                                            title="Persian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_persian_ci') {?> selected="selected" <?php }?>>
                                        utf16_persian_ci
                                    </option>
                                    <option value="utf16_polish_ci"
                                            title="Polish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_polish_ci') {?> selected="selected" <?php }?>>
                                        utf16_polish_ci
                                    </option>
                                    <option value="utf16_roman_ci"
                                            title="West European, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_roman_ci') {?> selected="selected" <?php }?>>
                                        utf16_roman_ci
                                    </option>
                                    <option value="utf16_romanian_ci"
                                            title="Romanian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_romanian_ci') {?> selected="selected" <?php }?>>
                                        utf16_romanian_ci
                                    </option>
                                    <option value="utf16_sinhala_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_sinhala_ci') {?> selected="selected" <?php }?>>
                                        utf16_sinhala_ci
                                    </option>
                                    <option value="utf16_slovak_ci"
                                            title="Slovak, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_slovak_ci') {?> selected="selected" <?php }?>>
                                        utf16_slovak_ci
                                    </option>
                                    <option value="utf16_slovenian_ci"
                                            title="Slovenian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_slovenian_ci') {?> selected="selected" <?php }?>>
                                        utf16_slovenian_ci
                                    </option>
                                    <option value="utf16_spanish2_ci"
                                            title="Traditional Spanish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_spanish2_ci') {?> selected="selected" <?php }?>>
                                        utf16_spanish2_ci
                                    </option>
                                    <option value="utf16_spanish_ci"
                                            title="Spanish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_spanish_ci') {?> selected="selected" <?php }?>>
                                        utf16_spanish_ci
                                    </option>
                                    <option value="utf16_swedish_ci"
                                            title="Swedish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_swedish_ci') {?> selected="selected" <?php }?>>
                                        utf16_swedish_ci
                                    </option>
                                    <option value="utf16_turkish_ci"
                                            title="Turkish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_turkish_ci') {?> selected="selected" <?php }?>>
                                        utf16_turkish_ci
                                    </option>
                                    <option value="utf16_unicode_520_ci"
                                            title="Unicode (multilingual)" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_unicode_520_ci') {?> selected="selected" <?php }?>>
                                        utf16_unicode_520_ci
                                    </option>
                                    <option value="utf16_unicode_ci"
                                            title="Unicode (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_unicode_ci') {?> selected="selected" <?php }?>>
                                        utf16_unicode_ci
                                    </option>
                                    <option value="utf16_vietnamese_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16_vietnamese_ci') {?> selected="selected" <?php }?>>
                                        utf16_vietnamese_ci
                                    </option>
                                </optgroup>
                                <optgroup label="utf16le" title="UTF-16LE Unicode">
                                    <option value="utf16le_bin" title="unknown, Binary">utf16le_bin</option>
                                    <option value="utf16le_general_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf16le_general_ci') {?> selected="selected" <?php }?>>
                                        utf16le_general_ci
                                    </option>
                                </optgroup>
                                <optgroup label="utf32" title="UTF-32 Unicode">
                                    <option value="utf32_bin" title="unknown, Binary">utf32_bin</option>
                                    <option value="utf32_croatian_ci"
                                            title="Croatian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_croatian_ci') {?> selected="selected" <?php }?>>
                                        utf32_croatian_ci
                                    </option>
                                    <option value="utf32_czech_ci"
                                            title="Czech, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_czech_ci') {?> selected="selected" <?php }?>>
                                        utf32_czech_ci
                                    </option>
                                    <option value="utf32_danish_ci"
                                            title="Danish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_danish_ci') {?> selected="selected" <?php }?>>
                                        utf32_danish_ci
                                    </option>
                                    <option value="utf32_esperanto_ci"
                                            title="Esperanto, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_esperanto_ci') {?> selected="selected" <?php }?>>
                                        utf32_esperanto_ci
                                    </option>
                                    <option value="utf32_estonian_ci"
                                            title="Estonian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_estonian_ci') {?> selected="selected" <?php }?>>
                                        utf32_estonian_ci
                                    </option>
                                    <option value="utf32_general_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_general_ci') {?> selected="selected" <?php }?>>
                                        utf32_general_ci
                                    </option>
                                    <option value="utf32_german2_ci"
                                            title="German (phone book), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_german2_ci') {?> selected="selected" <?php }?>>
                                        utf32_german2_ci
                                    </option>
                                    <option value="utf32_hungarian_ci"
                                            title="Hungarian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_hungarian_ci') {?> selected="selected" <?php }?>>
                                        utf32_hungarian_ci
                                    </option>
                                    <option value="utf32_icelandic_ci"
                                            title="Icelandic, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_icelandic_ci') {?> selected="selected" <?php }?>>
                                        utf32_icelandic_ci
                                    </option>
                                    <option value="utf32_latvian_ci"
                                            title="Latvian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_latvian_ci') {?> selected="selected" <?php }?>>
                                        utf32_latvian_ci
                                    </option>
                                    <option value="utf32_lithuanian_ci"
                                            title="Lithuanian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_lithuanian_ci') {?> selected="selected" <?php }?>>
                                        utf32_lithuanian_ci
                                    </option>
                                    <option value="utf32_persian_ci"
                                            title="Persian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_persian_ci') {?> selected="selected" <?php }?>>
                                        utf32_persian_ci
                                    </option>
                                    <option value="utf32_polish_ci"
                                            title="Polish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_polish_ci') {?> selected="selected" <?php }?>>
                                        utf32_polish_ci
                                    </option>
                                    <option value="utf32_roman_ci"
                                            title="West European, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_roman_ci') {?> selected="selected" <?php }?>>
                                        utf32_roman_ci
                                    </option>
                                    <option value="utf32_romanian_ci"
                                            title="Romanian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_romanian_ci') {?> selected="selected" <?php }?>>
                                        utf32_romanian_ci
                                    </option>
                                    <option value="utf32_sinhala_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_sinhala_ci') {?> selected="selected" <?php }?>>
                                        utf32_sinhala_ci
                                    </option>
                                    <option value="utf32_slovak_ci"
                                            title="Slovak, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_slovak_ci') {?> selected="selected" <?php }?>>
                                        utf32_slovak_ci
                                    </option>
                                    <option value="utf32_slovenian_ci"
                                            title="Slovenian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_slovenian_ci') {?> selected="selected" <?php }?>>
                                        utf32_slovenian_ci
                                    </option>
                                    <option value="utf32_spanish2_ci"
                                            title="Traditional Spanish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_spanish2_ci') {?> selected="selected" <?php }?>>
                                        utf32_spanish2_ci
                                    </option>
                                    <option value="utf32_spanish_ci"
                                            title="Spanish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_spanish_ci') {?> selected="selected" <?php }?>>
                                        utf32_spanish_ci
                                    </option>
                                    <option value="utf32_swedish_ci"
                                            title="Swedish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_swedish_ci') {?> selected="selected" <?php }?>>
                                        utf32_swedish_ci
                                    </option>
                                    <option value="utf32_turkish_ci"
                                            title="Turkish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_turkish_ci') {?> selected="selected" <?php }?>>
                                        utf32_turkish_ci
                                    </option>
                                    <option value="utf32_unicode_520_ci"
                                            title="Unicode (multilingual)" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_unicode_520_ci') {?> selected="selected" <?php }?>>
                                        utf32_unicode_520_ci
                                    </option>
                                    <option value="utf32_unicode_ci"
                                            title="Unicode (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_unicode_ci') {?> selected="selected" <?php }?>>
                                        utf32_unicode_ci
                                    </option>
                                    <option value="utf32_vietnamese_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf32_vietnamese_ci') {?> selected="selected" <?php }?>>
                                        utf32_vietnamese_ci
                                    </option>
                                </optgroup>
                                <optgroup label="utf8" title="UTF-8 Unicode">
                                    <option value="utf8_bin"
                                            title="Unicode (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_bin') {?> selected="selected" <?php }?>>
                                        utf8_bin
                                    </option>
                                    <option value="utf8_croatian_ci"
                                            title="Croatian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_croatian_ci') {?> selected="selected" <?php }?>>
                                        utf8_croatian_ci
                                    </option>
                                    <option value="utf8_czech_ci"
                                            title="Czech, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_czech_ci') {?> selected="selected" <?php }?>>
                                        utf8_czech_ci
                                    </option>
                                    <option value="utf8_danish_ci"
                                            title="Danish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_danish_ci') {?> selected="selected" <?php }?>>
                                        utf8_danish_ci
                                    </option>
                                    <option value="utf8_esperanto_ci"
                                            title="Esperanto, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_esperanto_ci') {?> selected="selected" <?php }?>>
                                        utf8_esperanto_ci
                                    </option>
                                    <option value="utf8_estonian_ci"
                                            title="Estonian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_estonian_ci') {?> selected="selected" <?php }?>>
                                        utf8_estonian_ci
                                    </option>
                                    <option value="utf8_general_ci" title="Unicode (multilingual), case-insensitive"
                                            <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_general_ci') {?> selected="selected" <?php }?>>utf8_general_ci
                                    </option>
                                    <option value="utf8_general_mysql500_ci"
                                            title="Unicode (multilingual)" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_general_mysql500_ci') {?> selected="selected" <?php }?>>
                                        utf8_general_mysql500_ci
                                    </option>
                                    <option value="utf8_german2_ci"
                                            title="German (phone book), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_german2_ci') {?> selected="selected" <?php }?>>
                                        utf8_german2_ci
                                    </option>
                                    <option value="utf8_hungarian_ci"
                                            title="Hungarian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_hungarian_ci') {?> selected="selected" <?php }?>>
                                        utf8_hungarian_ci
                                    </option>
                                    <option value="utf8_icelandic_ci"
                                            title="Icelandic, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_icelandic_ci') {?> selected="selected" <?php }?>>
                                        utf8_icelandic_ci
                                    </option>
                                    <option value="utf8_latvian_ci"
                                            title="Latvian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_latvian_ci') {?> selected="selected" <?php }?>>
                                        utf8_latvian_ci
                                    </option>
                                    <option value="utf8_lithuanian_ci"
                                            title="Lithuanian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_lithuanian_ci') {?> selected="selected" <?php }?>>
                                        utf8_lithuanian_ci
                                    </option>
                                    <option value="utf8_persian_ci"
                                            title="Persian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_persian_ci') {?> selected="selected" <?php }?>>
                                        utf8_persian_ci
                                    </option>
                                    <option value="utf8_polish_ci"
                                            title="Polish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_polish_ci') {?> selected="selected" <?php }?>>
                                        utf8_polish_ci
                                    </option>
                                    <option value="utf8_roman_ci"
                                            title="West European, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_roman_ci') {?> selected="selected" <?php }?>>
                                        utf8_roman_ci
                                    </option>
                                    <option value="utf8_romanian_ci"
                                            title="Romanian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_romanian_ci') {?> selected="selected" <?php }?>>
                                        utf8_romanian_ci
                                    </option>
                                    <option value="utf8_sinhala_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_sinhala_ci') {?> selected="selected" <?php }?>>
                                        utf8_sinhala_ci
                                    </option>
                                    <option value="utf8_slovak_ci"
                                            title="Slovak, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_slovak_ci') {?> selected="selected" <?php }?>>
                                        utf8_slovak_ci
                                    </option>
                                    <option value="utf8_slovenian_ci"
                                            title="Slovenian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_slovenian_ci') {?> selected="selected" <?php }?>>
                                        utf8_slovenian_ci
                                    </option>
                                    <option value="utf8_spanish2_ci"
                                            title="Traditional Spanish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_spanish2_ci') {?> selected="selected" <?php }?>>
                                        utf8_spanish2_ci
                                    </option>
                                    <option value="utf8_spanish_ci"
                                            title="Spanish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_spanish_ci') {?> selected="selected" <?php }?>>
                                        utf8_spanish_ci
                                    </option>
                                    <option value="utf8_swedish_ci"
                                            title="Swedish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_swedish_ci') {?> selected="selected" <?php }?>>
                                        utf8_swedish_ci
                                    </option>
                                    <option value="utf8_turkish_ci"
                                            title="Turkish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_turkish_ci') {?> selected="selected" <?php }?>>
                                        utf8_turkish_ci
                                    </option>
                                    <option value="utf8_unicode_520_ci"
                                            title="Unicode (multilingual)" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_unicode_520_ci') {?> selected="selected" <?php }?>>
                                        utf8_unicode_520_ci
                                    </option>
                                    <option value="utf8_unicode_ci"
                                            title="Unicode (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_unicode_ci') {?> selected="selected" <?php }?>>
                                        utf8_unicode_ci
                                    </option>
                                    <option value="utf8_vietnamese_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8_vietnamese_ci') {?> selected="selected" <?php }?>>
                                        utf8_vietnamese_ci
                                    </option>
                                </optgroup>
                                <optgroup label="utf8mb4" title="UTF-8 Unicode">
                                    <option value="utf8mb4_bin"
                                            title="Unicode (multilingual), Binary" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_bin') {?> selected="selected" <?php }?>>
                                        utf8mb4_bin
                                    </option>
                                    <option value="utf8mb4_croatian_ci"
                                            title="Croatian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_croatian_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_croatian_ci
                                    </option>
                                    <option value="utf8mb4_czech_ci"
                                            title="Czech, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_czech_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_czech_ci
                                    </option>
                                    <option value="utf8mb4_danish_ci"
                                            title="Danish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_danish_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_danish_ci
                                    </option>
                                    <option value="utf8mb4_esperanto_ci"
                                            title="Esperanto, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_esperanto_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_esperanto_ci
                                    </option>
                                    <option value="utf8mb4_estonian_ci"
                                            title="Estonian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_estonian_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_estonian_ci
                                    </option>
                                    <option value="utf8mb4_general_ci"
                                            title="Unicode (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_general_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_general_ci
                                    </option>
                                    <option value="utf8mb4_german2_ci"
                                            title="German (phone book), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_german2_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_german2_ci
                                    </option>
                                    <option value="utf8mb4_hungarian_ci"
                                            title="Hungarian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_hungarian_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_hungarian_ci
                                    </option>
                                    <option value="utf8mb4_icelandic_ci"
                                            title="Icelandic, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_icelandic_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_icelandic_ci
                                    </option>
                                    <option value="utf8mb4_latvian_ci"
                                            title="Latvian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_latvian_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_latvian_ci
                                    </option>
                                    <option value="utf8mb4_lithuanian_ci"
                                            title="Lithuanian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_lithuanian_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_lithuanian_ci
                                    </option>
                                    <option value="utf8mb4_persian_ci"
                                            title="Persian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_persian_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_persian_ci
                                    </option>
                                    <option value="utf8mb4_polish_ci"
                                            title="Polish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == '') {?> selected="selected" <?php }?>>
                                        utf8mb4_polish_ci
                                    </option>
                                    <option value="utf8mb4_roman_ci"
                                            title="West European, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_roman_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_roman_ci
                                    </option>
                                    <option value="utf8mb4_romanian_ci"
                                            title="Romanian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_romanian_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_romanian_ci
                                    </option>
                                    <option value="utf8mb4_sinhala_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_sinhala_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_sinhala_ci
                                    </option>
                                    <option value="utf8mb4_slovak_ci"
                                            title="Slovak, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == '') {?> selected="selected" <?php }?>>
                                        utf8mb4_slovak_ci
                                    </option>
                                    <option value="utf8mb4_slovenian_ci"
                                            title="Slovenian, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_slovenian_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_slovenian_ci
                                    </option>
                                    <option value="utf8mb4_spanish2_ci"
                                            title="Traditional Spanish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_spanish2_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_spanish2_ci
                                    </option>
                                    <option value="utf8mb4_spanish_ci"
                                            title="Spanish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_spanish_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_spanish_ci
                                    </option>
                                    <option value="utf8mb4_swedish_ci"
                                            title="Swedish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_swedish_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_swedish_ci
                                    </option>
                                    <option value="utf8mb4_turkish_ci"
                                            title="Turkish, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_turkish_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_turkish_ci
                                    </option>
                                    <option value="utf8mb4_unicode_520_ci"
                                            title="Unicode (multilingual)" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_unicode_520_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_unicode_520_ci
                                    </option>
                                    <option value="utf8mb4_unicode_ci"
                                            title="Unicode (multilingual), case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_unicode_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_unicode_ci
                                    </option>
                                    <option value="utf8mb4_vietnamese_ci"
                                            title="unknown, case-insensitive" <?php if ($_smarty_tpl->tpl_vars['col']->value == 'utf8mb4_vietnamese_ci') {?> selected="selected" <?php }?>>
                                        utf8mb4_vietnamese_ci
                                    </option>
                                </optgroup>
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
