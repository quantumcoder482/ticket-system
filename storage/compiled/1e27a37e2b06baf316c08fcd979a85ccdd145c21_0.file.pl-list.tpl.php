<?php
/* Smarty version 3.1.33, created on 2018-11-03 16:11:53
  from '/Users/razib/Documents/valet/suite/ui/theme/default/pl-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bde0109cb96d7_87132829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e27a37e2b06baf316c08fcd979a85ccdd145c21' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/pl-list.tpl',
      1 => 1512837879,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bde0109cb96d7_87132829 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2331972035bde0109c77d62_54023211', "style");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9232862775bde0109c7ad63_13516063', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16599688155bde0109cb3c27_15628372', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_2331972035bde0109c77d62_54023211 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_2331972035bde0109c77d62_54023211',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style>
        .grid-item {
            width: 250px;
            padding-right: 20px;


        }

        .grid-item--width3 { width: 750px; }

        .product-imitation{
            padding: 25px;
        }


    </style>
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_9232862775bde0109c7ad63_13516063 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9232862775bde0109c7ad63_13516063',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default" id="uploading_inside">
                <div class="panel-body">
                    <form action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/plugin_upload/" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['plugin_drop_help'];?>
</h3>
                            <br />
                            <span class="note"><?php echo $_smarty_tpl->tpl_vars['_L']->value['plugin_upload_help'];?>
</span>
                        </div>

                    </form>

                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Plugins'];?>
</h5>

                        </div>
                        <div class="ibox-content">

                            <div class="project-list mt-md">
                                <div id="progressbar">
                                </div>

                                <div id="application_ajaxrender"><table class="table table-hover">
                                        <tbody>
                                        <?php echo $_smarty_tpl->tpl_vars['pl_html']->value;?>

                                        </tbody>
                                    </table></div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-12">

            <div class="grid">


                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['core_plugins']->value, 'core_plugin');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['core_plugin']->value) {
?>
                    <div class="grid-item">
                        <div class="ibox">
                            <div class="ibox-content product-box">

                                <div class="product-imitation">
                                    <a href="javascript:void(0)" class="app_details"><img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/plugins/<?php echo $_smarty_tpl->tpl_vars['core_plugin']->value['image'];?>
"></a>
                                </div>
                                <div class="product-desc">

                                    <a href="javascript:void(0)" class="app_details" data-id="1"><span class="product-price">
                                    Core
                                </span></a>


                                    <h3><a href="javascript:void(0)" class="app_details" data-id="1"><?php echo $_smarty_tpl->tpl_vars['core_plugin']->value['name'];?>
</a> </h3>




                                    <p class="m-t-xs">

                                        <?php echo $_smarty_tpl->tpl_vars['core_plugin']->value['description'];?>


                                    </p>
                                    <hr>
                                    <div class="text-right">



                                        <?php if ($_smarty_tpl->tpl_vars['config']->value[$_smarty_tpl->tpl_vars['core_plugin']->value['identity']]) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
app_store/disable/<?php echo $_smarty_tpl->tpl_vars['core_plugin']->value['identity'];?>
/" class="btn btn-danger btn-sm app_details" data-id="1">Disable</a>
                                            <?php } else { ?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
app_store/enable/<?php echo $_smarty_tpl->tpl_vars['core_plugin']->value['identity'];?>
/" class="btn btn-primary btn-sm app_details" data-id="1">Enable</a>
                                        <?php }?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>








            </div>

        </div>


    </div>




    <input type="hidden" id="_msg_unzipping" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Unzipping'];?>
 ...">
    <input type="hidden" id="_msg_are_you_sure" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['are_you_sure'];?>
">

<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_16599688155bde0109cb3c27_15628372 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_16599688155bde0109cb3c27_15628372',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/masonry.pkgd.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        Dropzone.autoDiscover = false;
        $(function() {
            var _url = $("#_url").val();
            var ib_file = new Dropzone("#upload_container",
                {
                    url: _url + "settings/plugin_upload/",
                    maxFiles: 1,
                    acceptedFiles: ".zip"
                }
            );

            //ib_file.on("addedfile", function(file) {
            //
            //});

            ib_file.on("success", function(file) {

                var _msg_unzipping = $('#_msg_unzipping').val();
                $('#uploading_inside').block({
                    message: "<h3>" + _msg_unzipping +"</h3>" ,
                    css: {
                        padding:        0,
                        margin:         0,
                        width:          '30%',
                        top:            '40%',
                        left:           '35%',
                        textAlign:      'center',
                        color:          '#FFFFFF',
                        border:         '0',
                        backgroundColor:'transparent',
                        cursor:         'wait'
                    }
                });
                //   $('#uploading_inside').block({ message: null });

                var _url = $("#_url").val();
                $.post(_url + 'settings/plugin_unzip/', {

                    name: file.name

                })
                    .done(function (data) {

                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    });
            });



            $(".c_uninstall").click(function (e) {
                e.preventDefault();
                var _msg_are_you_sure = $('#_msg_are_you_sure').val();
                var to_url = this.href;
                bootbox.confirm(_msg_are_you_sure, function(result) {
                    if(result == true){
                        window.location = to_url;
                    }
                });



            });


            $('.grid').masonry({
                // options
                itemSelector: '.grid-item',
                columnWidth: 250
            });



        });
    <?php echo '</script'; ?>
>

<?php
}
}
/* {/block "script"} */
}
