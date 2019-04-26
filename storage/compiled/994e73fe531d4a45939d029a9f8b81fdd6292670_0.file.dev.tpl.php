<?php
/* Smarty version 3.1.33, created on 2018-11-08 03:49:44
  from '/Users/razib/Documents/valet/suite/ui/theme/default/dev.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be3f8a827f184_48746197',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '994e73fe531d4a45939d029a9f8b81fdd6292670' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/dev.tpl',
      1 => 1541666982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be3f8a827f184_48746197 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7125563095be3f8a8276c65_07253883', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_7125563095be3f8a8276c65_07253883 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7125563095be3f8a8276c65_07253883',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">
                <div class="panel-body">

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/reset/" class="btn btn-danger">Reset Demo</a>


                </div>

            </div>
        </div>



    </div>

    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">

                    <h3> Set Demo </h3>



                    <hr>

                    <ul>

                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/us">United States</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/uae">United Arab Emirates</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/se">Sweden</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/bd">Bangladesh</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/no">Norway</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/au">Australia</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/ca">Canada</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/ca_quebec">Canada - Quebec</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/id">Indonesia</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/">Malaysia</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/in">India</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/br">Brazil</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/fr">French</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/de">Germany</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/it">Italy</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/dk">Denmark</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/uk">United Kingdom</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/pt">Portugal</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/tr">Turkey</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/sa">Saudi Arabia</a> </li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/ma">Morocco</a> </li>



                    </ul>


                </div>
            </div>
        </div>



    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_company" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>
<?php
}
}
/* {/block "content"} */
}
