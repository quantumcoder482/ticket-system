<?php
/* Smarty version 3.1.33, created on 2018-11-12 04:28:27
  from '/Users/razib/Documents/valet/suite/ui/theme/default/tickets_departments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be947bb3e2d19_06464660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59dd33022ec0ba8cc0af0e8c96c446956a6920c1' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/tickets_departments.tpl',
      1 => 1542014898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be947bb3e2d19_06464660 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3420504855be947bb3dabe8_41192479', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_3420504855be947bb3dabe8_41192479 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_3420504855be947bb3dabe8_41192479',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Support Ticket Departments'];?>
</h5>

                </div>
                <div class="ibox-content">
                    <a data-toggle="modal" href="#modal_add_item" class="btn btn-success mb-md"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New Department'];?>
</a>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/departments_reorder/" class="btn btn-primary mb-md"><i class="fa fa-arrows"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Reorder'];?>
</a>
                    <br>
                    <table class="table table-bordered table-hover sys_table">
                        <thead>
                        <tr>

                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Department Name'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</th>
                            <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ds']->value, 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
?>
                            <tr>

                                <td><?php echo $_smarty_tpl->tpl_vars['d']->value['dname'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['d']->value['description'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
</td>

                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['d']->value['hidden'] == 'Yes') {?>
                                        <span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Inactive'];?>
</span>
                                    <?php } else { ?>
                                        <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Active'];?>
</span>
                                    <?php }?>

                                </td>

                                <td class="text-right">

                                    <a href="#" class="btn btn-info btn-sm item_edit" id="e<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><i class="fa fa-pencil-square-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
                                    <a href="#" class="btn btn-danger btn-sm cdelete" id="d<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>

                                </td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </tbody>
                    </table>

                </div>
            </div>



        </div>



    </div>


    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="600" style="display: none;">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New Department'];?>
</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">

                    <form id="ib_modal_form">


                        <div class="form-group">
                            <label for="department_name"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</label>
                            <input type="text" name="department_name" class="form-control" id="department_name">
                        </div>



                        <div class="form-group">
                            <label for="email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="host"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Host'];?>
</label>
                            <input type="text" class="form-control" id="host" name="host">
                        </div>

                        <div class="form-group">
                            <label for="password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="port">IMAP Port</label>
                            <input type="text" class="form-control" id="port" name="port">
                        </div>



                        <div class="form-group">
                            <label for="encryption">Encryption</label>
                            <label class="radio-inline">
                                <input type="radio" name="encryption" value="tls"> TLS
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="encryption" value="ssl"> SSL
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="encryption" value=""> No Encryption
                            </label>
                        </div>



                        <hr>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="hidden" name="hidden" value="1"> Hide from client?
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="delete_after_import" name="delete_after_import" value="1"> Delete mail after import?
                                </label>
                            </div>
                        </div>



                    </form>
                </div>




            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
            <button type="button" id="btn_modal_action" class="btn btn-primary">Save</button>

        </div>

    </div>

<?php
}
}
/* {/block "content"} */
}
