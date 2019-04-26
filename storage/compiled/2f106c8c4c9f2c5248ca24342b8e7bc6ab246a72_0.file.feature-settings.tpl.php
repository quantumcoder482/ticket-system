<?php
/* Smarty version 3.1.33, created on 2019-04-18 22:42:43
  from '/home/pscope/public_html/ui/theme/default/feature-settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb8b00be44324_60501554',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f106c8c4c9f2c5248ca24342b8e7bc6ab246a72' => 
    array (
      0 => '/home/pscope/public_html/ui/theme/default/feature-settings.tpl',
      1 => 1553599355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb8b00be44324_60501554 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12565130615cb8b00be08b19_68757130', "style");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11009150225cb8b00be0b6d4_30411820', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7737412765cb8b00be36c62_81720487', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_12565130615cb8b00be08b19_68757130 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_12565130615cb8b00be08b19_68757130',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/editable/css/bootstrap-editable.css" rel="stylesheet">

<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_11009150225cb8b00be0b6d4_30411820 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11009150225cb8b00be0b6d4_30411820',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-6">



            <div class="ibox float-e-margins" id="ui_settings">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Choose Features'];?>
</h5>


                </div>
                <div class="ibox-content">
                    <table class="table table-hover">
                        <tbody>

                        <tr>
                            <td width="80%"><label for="config_accounting"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Accounting'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('accounting') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_accounting"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_invoicing"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoicing'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('invoicing') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_invoicing"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_invoice_receipt_number"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoicing'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_L']->value['Receipt Number'];?>
</label></td>
                            <td> <input type="checkbox" <?php if (get_option('invoice_receipt_number') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_invoice_receipt_number"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_show_business_number"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoicing'];?>
 - Show Business Number</label></td>
                            <td> <input type="checkbox" <?php if (get_option('show_business_number') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_show_business_number"></td>
                        </tr>

                        <tr>
                            <td width="80%">
                                <label for="add_fund_minimum_deposit">Business Number Label Name </label> <br>

                            </td>
                            <td> <div class="form-material floating">
                                    <input class="form-control" type="text" id="label_business_number" name="add_fund_minimum_deposit" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['label_business_number'];?>
">
                                    <label for="label_business_number">Name</label>

                                </div></td>
                        </tr>



                        <tr>
                            <td width="80%"><label for="config_quotes"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Quotes'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('quotes') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_quotes"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_delivery_challans"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Delivery Challans'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('delivery_challans') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_delivery_challans"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_companies"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Companies'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('companies') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_companies"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_fax_field"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Fax'];?>
 field </label></td>
                            <td> <input type="checkbox" <?php if (get_option('fax_field') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_fax_field"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_leads"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Leads'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('leads') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_leads"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_orders"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Orders'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('orders') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_orders"></td>
                        </tr>

                        <?php if ($_smarty_tpl->tpl_vars['config']->value['orders'] == '1') {?>

                            <tr>
                                <td width="80%">
                                    <label for="config_order_method">Order Method </label> <br>
                                </td>
                                <td>

                                    <select class="form-control" name="config_order_method" id="config_order_method">
                                        <option value="default" <?php if ($_smarty_tpl->tpl_vars['config']->value['order_method'] == 'default') {?> selected<?php }?>>Default</option>
                                        <option value="create_invoice_later" <?php if ($_smarty_tpl->tpl_vars['config']->value['order_method'] == 'create_invoice_later') {?> selected<?php }?>>Place Order, Create Invoice Later</option>

                                    </select>

                                </td>
                            </tr>





                        <?php }?>

                        <tr>
                            <td width="80%"><label for="config_support"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Support'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('support') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_support"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_kb"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Knowledgebase'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('kb') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_kb"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_hrm"><?php echo $_smarty_tpl->tpl_vars['_L']->value['HRM'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('hrm') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_hrm"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_projects"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Projects'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('projects') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_projects"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_tasks"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tasks'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('tasks') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_tasks"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_create_task_from_ticket"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Create tasks automatically from ticket'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('create_task_from_ticket') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_create_task_from_ticket"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_calendar"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Calendar'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('calendar') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_calendar"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_documents"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Documents'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('documents') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_documents"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_suppliers"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Suppliers'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('suppliers') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_suppliers"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_purchase"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Purchase'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('purchase') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_purchase"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_inventory"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Inventory'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('inventory') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_inventory"></td>
                        </tr>





                        <tr>
                            <td width="80%"><label for="config_sms"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMS'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('sms') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_sms"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_plugins"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Plugins'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('plugins') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_plugins"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_client_drive">Client Drive </label></td>
                            <td> <input type="checkbox" <?php if (get_option('client_drive') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_client_drive"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_allow_customer_registration"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Client Registration'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('allow_customer_registration') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_allow_customer_registration"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_recaptcha_in_client_login">Enable Recaptcha in Client Login </label></td>
                            <td> <input type="checkbox" <?php if (isset($_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_client_login']) && $_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_client_login'] == 1) {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_recaptcha_in_client_login"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_recaptcha_in_admin_login">Enable Recaptcha in Admin Login </label></td>
                            <td> <input type="checkbox" <?php if (isset($_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login']) && $_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login'] == 1) {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_recaptcha_in_admin_login"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_customer_custom_username"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Username'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('customer_custom_username') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_customer_custom_username"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_contact_list_show_company_column">Customer list show company </label></td>
                            <td> <input type="checkbox" <?php if (get_option('contact_list_show_company_column') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_contact_list_show_company_column"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_contact_list_show_group_column">Customer list show group </label></td>
                            <td> <input type="checkbox" <?php if (get_option('contact_list_show_group_column') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_contact_list_show_group_column"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_tickets_assigned_sms_notification">Send sms notification to admin when ticket is assigned </label></td>
                            <td> <input type="checkbox" <?php if (get_option('tickets_assigned_sms_notification') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_tickets_assigned_sms_notification"></td>
                        </tr>

                        <tr>
                            <td width="80%">
                                <label for="add_contact_remove_welcome_email">Admin - Disable customer welcome email ?</label> <br>

                            </td>
                            <td> <input type="checkbox" <?php if (get_option('add_contact_remove_welcome_email') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="add_contact_remove_welcome_email"></td>
                        </tr>


                        <tr>
                            <td width="80%">
                                <label for="config_add_fund"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Fund'];?>
 </label> <br>
                                <span>Option to enabled Add Fund to Client</span>
                            </td>
                            <td> <input type="checkbox" <?php if (get_option('add_fund') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_add_fund"></td>
                        </tr>




                        <?php if ($_smarty_tpl->tpl_vars['config']->value['add_fund'] == '1') {?>

                            <tr>
                                <td width="80%">
                                    <label for="add_fund_minimum_deposit">Minimum Deposit </label> <br>
                                    <span>Enter the minimum amount a client can add in a single transaction.</span>
                                </td>
                                <td> <div class="form-material floating">
                                        <input class="form-control" type="text" id="add_fund_minimum_deposit" name="add_fund_minimum_deposit" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['add_fund_minimum_deposit'];?>
">
                                        <label for="add_fund_minimum_deposit">Amount</label>

                                    </div></td>
                            </tr>


                            <tr>
                                <td width="80%">
                                    <label for="add_fund_maximum_deposit">Maximum Deposit </label> <br>
                                    <span>Enter the maximum amount a client can add in a single transaction.</span>
                                </td>
                                <td> <div class="form-material floating">
                                        <input class="form-control" type="text" id="add_fund_maximum_deposit" name="add_fund_maximum_deposit" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['add_fund_maximum_deposit'];?>
">
                                        <label for="add_fund_maximum_deposit">Amount</label>

                                    </div></td>
                            </tr>

                            <tr>
                                <td width="80%">
                                    <label for="config_add_fund_client"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Fund'];?>
 From Client Portal</label> <br>
                                    <span>Adding of funds by clients from the client dashboard.</span>
                                </td>
                                <td> <input type="checkbox" <?php if (get_option('add_fund_client') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_add_fund_client"></td>
                            </tr>



                        <?php }?>


                                                                                                
                        </tbody>
                    </table>



                </div>
            </div>


        </div>

        <div class="col-md-6">

                                                

                                
                    
                    
                                                                                        
                    

                            


        </div>



    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_7737412765cb8b00be36c62_81720487 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_7737412765cb8b00be36c62_81720487',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
>

        $(function () {

                var _url = $("#_url").val();
                $('#config_accounting').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "accounting", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "accounting", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });

                $('#config_invoicing').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "invoicing", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "invoicing", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_kb').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "kb", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "kb", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });

                $('#config_quotes').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "quotes", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "quotes", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_orders').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "orders", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "orders", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_documents').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "documents", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "documents", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_inventory').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "inventory", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "inventory", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


            $('#add_contact_remove_welcome_email').change(function() {

                $('#ui_settings').block({ message: null });


                if($(this).prop('checked')){

                    $.post( _url+'settings/update_option/', { opt: "add_contact_remove_welcome_email", val: "1" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });

                }
                else{
                    $.post( _url+'settings/update_option/', { opt: "add_contact_remove_welcome_email", val: "0" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });
                }
            });



                $('#config_leads').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "leads", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "leads", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_suppliers').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "suppliers", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "suppliers", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_support').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "support", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "support", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_purchase').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "purchase", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "purchase", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_tasks').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "tasks", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "tasks", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_calendar').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "calendar", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "calendar", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_hrm').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "hrm", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "hrm", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_companies').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "companies", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "companies", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_plugins').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "plugins", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "plugins", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });

                $('#config_customer_custom_username').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "customer_custom_username", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "customer_custom_username", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_projects').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "projects", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "projects", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_add_fund').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "add_fund", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "add_fund", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_invoice_receipt_number').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "invoice_receipt_number", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "invoice_receipt_number", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $("#add_fund_minimum_deposit").on("blur",function(e){
                    $('#ui_settings').block({ message: null });
                    $.post(base_url + 'settings/update_option/',{ opt: "add_fund_minimum_deposit", val: $("#add_fund_minimum_deposit").val() },function (data) {
                        if ($.isNumeric(data)) {
                            $('#ui_settings').unblock();
                            toastr.success(_L['Saved Successfully']);

                        }

                        else {
                            $('#ui_settings').unblock();
                            toastr.error(data);
                        }
                    })
                });

                $("#add_fund_maximum_deposit").on("blur",function(e){
                    $('#ui_settings').block({ message: null });
                    $.post(base_url + 'settings/update_option/',{ opt: "add_fund_maximum_deposit", val: $("#add_fund_maximum_deposit").val() },function (data) {
                        if ($.isNumeric(data)) {
                            $('#ui_settings').unblock();
                            toastr.success(_L['Saved Successfully']);

                        }

                        else {
                            $('#ui_settings').unblock();
                            toastr.error(data);
                        }
                    })
                });


                $("#config_order_method").on("change",function(e){
                    $('#ui_settings').block({ message: null });
                    $.post(base_url + 'settings/update_option/',{ opt: "order_method", val: $("#config_order_method").val() },function (data) {
                        if (data === 'ok') {
                            $('#ui_settings').unblock();
                            toastr.success(_L['Saved Successfully']);

                        }

                        else {
                            $('#ui_settings').unblock();
                            toastr.error(data);
                        }
                    })
                });


                $('#config_add_fund_client').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "add_fund_client", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "add_fund_client", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_allow_customer_registration').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "allow_customer_registration", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "allow_customer_registration", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });

                $('#config_client_drive').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "client_drive", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "client_drive", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_show_business_number').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "show_business_number", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "show_business_number", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $("#label_business_number").on("blur",function(e){
                    $('#ui_settings').block({ message: null });
                    $.post(base_url + 'settings/update_option/',{ opt: "label_business_number", val: $("#label_business_number").val() },function (data) {
                        toastr.success(_L['Saved Successfully']);
                        $('#ui_settings').unblock();
                    })
                });


                $('#config_fax_field').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "fax_field", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "fax_field", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_sms').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "sms", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "sms", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_recaptcha_in_client_login').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "config_recaptcha_in_client_login", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "config_recaptcha_in_client_login", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_recaptcha_in_admin_login').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "config_recaptcha_in_admin_login", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "config_recaptcha_in_admin_login", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_contact_list_show_company_column').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "contact_list_show_company_column", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "contact_list_show_company_column", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_contact_list_show_group_column').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "contact_list_show_group_column", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "contact_list_show_group_column", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


                $('#config_tickets_assigned_sms_notification').change(function() {

                    $('#ui_settings').block({ message: null });


                    if($(this).prop('checked')){

                        $.post( _url+'settings/update_option/', { opt: "tickets_assigned_sms_notification", val: "1" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });

                    }
                    else{
                        $.post( _url+'settings/update_option/', { opt: "tickets_assigned_sms_notification", val: "0" })
                            .done(function( data ) {
                                $('#ui_settings').unblock();
                                location.reload();
                            });
                    }
                });


            $('#config_delivery_challans').change(function() {

                $('#ui_settings').block({ message: null });


                if($(this).prop('checked')){

                    $.post( _url+'settings/update_option/', { opt: "delivery_challans", val: "1" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });

                }
                else{
                    $.post( _url+'settings/update_option/', { opt: "delivery_challans", val: "0" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });
                }
            });


            $('#config_create_task_from_ticket').change(function() {

                $('#ui_settings').block({ message: null });


                if($(this).prop('checked')){

                    $.post( _url+'settings/update_option/', { opt: "create_task_from_ticket", val: "1" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });

                }
                else{
                    $.post( _url+'settings/update_option/', { opt: "create_task_from_ticket", val: "0" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });
                }
            });




        })

    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
