<?php
/* Smarty version 3.1.33, created on 2019-03-25 18:23:16
  from '/Users/razib/Documents/valet/suite/apps/bpr/views/modal_search_staff.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9954d4852b79_41471141',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae68895abc751fc2bb9b59ea9c3c63a98a2f04f4' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/bpr/views/modal_search_staff.tpl',
      1 => 1553552561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9954d4852b79_41471141 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        Search Staff
    </h3>
</div>
<div class="modal-body">


    <form class="form-horizontal" method="post" action="">
        <div class="form-group">
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="fa fa-search"></span>
                    </div>

                    <input type="text" name="name" id="foo_filter_staff" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
..."/>

                </div>
            </div>

        </div>
    </form>

    <table class="table table-bordered table-hover sys_table" id="staff_table" data-filter="#foo_filter_staff" data-page-size="10">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Phone</th>
            <th>City</th>
            <th>
                State
            </th>
            <th>Proficiency</th>
            <th class="text-right" width="140px;">&nbsp;</th>
        </tr>
        </thead>
        <tbody>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['staffs']->value, 'staff');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['staff']->value) {
?>
            <tr>
                <td  data-value="<?php echo $_smarty_tpl->tpl_vars['staff']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['staff']->value->id;?>
 </td>
                <td><?php echo $_smarty_tpl->tpl_vars['staff']->value->fullname;?>
 </td>
                <td><?php echo $_smarty_tpl->tpl_vars['staff']->value->username;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['staff']->value->phonenumber;?>
</td>
                <td> -- </td>
                <td> -- </td>
                <td>

                    --

                </td>

                <td class="text-right">
                    <button type="button" class="btn btn-primary btn-sm assign_to_partner" data-id="<?php echo $_smarty_tpl->tpl_vars['staff']->value->id;?>
" data-dismiss="modal">Assign</button>

                </td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </tbody>

        <tfoot>
        <tr>
            <td colspan="8">
                <ul class="pagination">
                </ul>
            </td>
        </tr>
        </tfoot>

    </table>


</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Close'];?>
</button>
</div><?php }
}
