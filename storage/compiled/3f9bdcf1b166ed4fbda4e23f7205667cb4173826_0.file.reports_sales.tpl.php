<?php
/* Smarty version 3.1.33, created on 2018-12-04 15:10:23
  from '/Users/razib/Documents/valet/suite/ui/theme/default/reports_sales.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c06df2fb6d478_63806932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f9bdcf1b166ed4fbda4e23f7205667cb4173826' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/reports_sales.tpl',
      1 => 1526554014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c06df2fb6d478_63806932 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10690633115c06df2fb61275_05994934', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19643207015c06df2fb6c149_49612477', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_10690633115c06df2fb61275_05994934 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10690633115c06df2fb61275_05994934',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default" id="calendar_wrap">
                <h3 class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Calendar'];?>
 [ <?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice'];?>
 ] </h3>
                <div class="panel-body">


                    
                    <div id="calendar"></div>

                </div>

            </div>

        </div>

        <div class="col-md-12">

            <div class="panel panel-default">
                <h3 class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sales'];?>
 </h3>
                <div class="panel-body">


                    <table class="table table-striped table-responsive table-bordered dataTable" id="sales_items">
                        <thead>
                        <tr>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Qty'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['invoice_items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['qty'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['total'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['duedate'];?>
</td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Qty'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>

            </div>

        </div>




    </div>
<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_19643207015c06df2fb6c149_49612477 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_19643207015c06df2fb6c149_49612477',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>





    <?php echo '<script'; ?>
>
        

        var $calendar_wrap = $("#calendar_wrap");

        function view_event(id) {


        }

        var ib_calendar_options = {
            customButtons: {},
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,viewFullCalendar'
            },
            loading: function(isLoading, view) {
                if (isLoading) {
                    $calendar_wrap.block({ message: block_msg });
                } else {
                    $calendar_wrap.unblock();
                    $('[data-toggle="tooltip"]').tooltip();
                }
            },
            editable: true,
            eventLimit: 3,
            lang: ib_lang,
            isRTL: ib_rtl,
            eventSources: [{
                url: base_url + 'reports/sales_invoice_calendar',
                type: 'GET',
                error: function() {
                    bootbox.alert("Unable to load data.");
                }
            } ],
            eventRender: function(event, element) {
                element.attr('title', event._tooltip);
                element.attr('onclick', event.onclick);
                element.attr('data-toggle', 'tooltip');
                if (!event.url) {
                    element.click(function() {
                        view_event(event.eventid);
                    });
                }
            },
            eventStartEditable: false,

            firstDay: 0,
        };




        $('#calendar').fullCalendar(ib_calendar_options);

        
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'script'} */
}
