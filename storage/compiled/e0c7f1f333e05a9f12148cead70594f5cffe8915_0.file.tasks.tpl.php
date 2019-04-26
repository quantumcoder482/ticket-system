<?php
/* Smarty version 3.1.33, created on 2019-02-21 17:55:51
  from '/Users/razib/Documents/valet/suite/ui/theme/default/tasks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c6f2c7770d6a0_22294244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0c7f1f333e05a9f12148cead70594f5cffe8915' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/tasks.tpl',
      1 => 1550789747,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c6f2c7770d6a0_22294244 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16395370385c6f2c776d77b7_68705119', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11344460275c6f2c7770c926_27516533', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_16395370385c6f2c776d77b7_68705119 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16395370385c6f2c776d77b7_68705119',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">

        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label>Date range</label>
                            <input class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">


            <div style="overflow: auto;">

                <div style="min-width: 1545px; max-width: 1545px;">

                    <!--sütun başlangıç-->
                    <div class="panel panel-deep-orange kanban-col">
                        <div class="panel-heading">

                            Not Started

                        </div>

                        <div class="panel-body">
                            <div id="not_started" class="kanban-centered kanban-droppable-area">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks_not_started']->value, 'tns');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tns']->value) {
?>
                                    <article class="kanban-entry cursor-move" id="item_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" draggable="true">
                                        <div class="kanban-entry-inner">
                                            <div class="kanban-label">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" id="v_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" class="v_item"><?php echo $_smarty_tpl->tpl_vars['tns']->value['title'];?>
</a>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <?php if ($_smarty_tpl->tpl_vars['tns']->value['cid'] != 0 && $_smarty_tpl->tpl_vars['tns']->value['cid'] != '' && isset($_smarty_tpl->tpl_vars['contacts']->value[$_smarty_tpl->tpl_vars['tns']->value['cid']][0]->account)) {?>
                                                            <div style="margin-bottom: 15px;">
                                                                <?php echo $_smarty_tpl->tpl_vars['contacts']->value[$_smarty_tpl->tpl_vars['tns']->value['cid']][0]->account;?>

                                                            </div>

                                                        <?php }?>

                                                        <?php if ($_smarty_tpl->tpl_vars['tns']->value['tid'] != 0 && $_smarty_tpl->tpl_vars['tns']->value['tid'] != '' && isset($_smarty_tpl->tpl_vars['tickets']->value[$_smarty_tpl->tpl_vars['tns']->value['tid']][0]->tid)) {?>
                                                            <div style="margin-bottom: 15px;">
                                                                Ticket: <?php echo $_smarty_tpl->tpl_vars['tickets']->value[$_smarty_tpl->tpl_vars['tns']->value['tid']][0]->tid;?>

                                                            </div>

                                                        <?php }?>



                                                        <img src="<?php echo getAdminImage($_smarty_tpl->tpl_vars['tns']->value['aid']);?>
" class="img-circle" style="max-width: 30px; margin-bottom: 5px;" alt="<?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>



                                                    </div>


                                                    <div class="col-md-12">

                                                        <small><?php echo $_smarty_tpl->tpl_vars['_L']->value['Created'];?>
: <span class="mmnt"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tns']->value['created_at'];
$_prefixVariable1 = ob_get_clean();
echo strtotime($_prefixVariable1);?>
</span></small> <br>
                                                        <small><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due Date'];?>
: <?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['tns']->value['due_date']));?>
</small>

                                                        <?php if (isset($_smarty_tpl->tpl_vars['tns']->value['priority'])) {?>
                                                            <br>
                                                            <?php if (strtolower($_smarty_tpl->tpl_vars['tns']->value['priority']) == 'critical' || strtolower($_smarty_tpl->tpl_vars['tns']->value['priority']) == 'high') {?>
                                                                <span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['tns']->value['priority'];?>
</span>
                                                                <?php } else { ?>
                                                                <span class="label label-info"><?php echo $_smarty_tpl->tpl_vars['tns']->value['priority'];?>
</span>
                                                            <?php }?>

                                                        <?php }?>
                                                                                                                                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </article>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>


                    </div>

                    <div class="panel panel-primary kanban-col">
                        <div class="panel-heading">

                            In Progress

                        </div>
                        <div class="panel-body">
                            <div id="in_progress" class="kanban-centered kanban-droppable-area">


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks_in_progress']->value, 'tns');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tns']->value) {
?>
                                    <article class="kanban-entry cursor-move" id="item_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" draggable="true">
                                        <div class="kanban-entry-inner">
                                            <div class="kanban-label">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" id="v_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" class="v_item"><?php echo $_smarty_tpl->tpl_vars['tns']->value['title'];?>
</a>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <?php if ($_smarty_tpl->tpl_vars['tns']->value['cid'] != 0 && $_smarty_tpl->tpl_vars['tns']->value['cid'] != '' && isset($_smarty_tpl->tpl_vars['contacts']->value[$_smarty_tpl->tpl_vars['tns']->value['cid']][0]->account)) {?>
                                                            <div style="margin-bottom: 15px;">
                                                                <?php echo $_smarty_tpl->tpl_vars['contacts']->value[$_smarty_tpl->tpl_vars['tns']->value['cid']][0]->account;?>

                                                            </div>

                                                        <?php }?>

                                                        <?php if ($_smarty_tpl->tpl_vars['tns']->value['tid'] != 0 && $_smarty_tpl->tpl_vars['tns']->value['tid'] != '' && isset($_smarty_tpl->tpl_vars['tickets']->value[$_smarty_tpl->tpl_vars['tns']->value['tid']][0]->tid)) {?>
                                                            <div style="margin-bottom: 15px;">
                                                                Ticket: <?php echo $_smarty_tpl->tpl_vars['tickets']->value[$_smarty_tpl->tpl_vars['tns']->value['tid']][0]->tid;?>

                                                            </div>

                                                        <?php }?>
                                                        <img src="<?php echo getAdminImage($_smarty_tpl->tpl_vars['tns']->value['aid']);?>
" class="img-circle" style="max-width: 30px; margin-bottom: 5px;" alt="<?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>



                                                    </div>


                                                    <div class="col-md-12">

                                                        <small class="mmnt"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tns']->value['created_at'];
$_prefixVariable2 = ob_get_clean();
echo strtotime($_prefixVariable2);?>
</small>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </article>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </div>
                        </div>

                    </div>
                    <!--sütun bitiş-->
                    <!--sütun başlangıç-->
                    <div class="panel panel-light-green kanban-col">
                        <div class="panel-heading">

                            Completed

                        </div>
                        <div class="panel-body">
                            <div id="completed" class="kanban-centered kanban-droppable-area">


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks_completed']->value, 'tns');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tns']->value) {
?>
                                    <article class="kanban-entry cursor-move" id="item_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" draggable="true">
                                        <div class="kanban-entry-inner">
                                            <div class="kanban-label">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" id="v_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" class="v_item"><?php echo $_smarty_tpl->tpl_vars['tns']->value['title'];?>
</a>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <?php if ($_smarty_tpl->tpl_vars['tns']->value['cid'] != 0 && $_smarty_tpl->tpl_vars['tns']->value['cid'] != '' && isset($_smarty_tpl->tpl_vars['contacts']->value[$_smarty_tpl->tpl_vars['tns']->value['cid']][0]->account)) {?>
                                                            <div style="margin-bottom: 15px;">
                                                                <?php echo $_smarty_tpl->tpl_vars['contacts']->value[$_smarty_tpl->tpl_vars['tns']->value['cid']][0]->account;?>

                                                            </div>

                                                        <?php }?>

                                                        <?php if ($_smarty_tpl->tpl_vars['tns']->value['tid'] != 0 && $_smarty_tpl->tpl_vars['tns']->value['tid'] != '' && isset($_smarty_tpl->tpl_vars['tickets']->value[$_smarty_tpl->tpl_vars['tns']->value['tid']][0]->tid)) {?>
                                                            <div style="margin-bottom: 15px;">
                                                                Ticket: <?php echo $_smarty_tpl->tpl_vars['tickets']->value[$_smarty_tpl->tpl_vars['tns']->value['tid']][0]->tid;?>

                                                            </div>

                                                        <?php }?>
                                                        <img src="<?php echo getAdminImage($_smarty_tpl->tpl_vars['tns']->value['aid']);?>
" class="img-circle" style="max-width: 30px; margin-bottom: 5px;" alt="<?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>



                                                    </div>


                                                    <div class="col-md-12">

                                                        <small class="mmnt"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tns']->value['created_at'];
$_prefixVariable3 = ob_get_clean();
echo strtotime($_prefixVariable3);?>
</small>
                                                                                                                                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </article>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </div>
                        </div>

                    </div>

                    <div class="panel panel-blue-grey kanban-col">
                        <div class="panel-heading">

                            Deferred

                        </div>
                        <div class="panel-body">
                            <div id="deferred" class="kanban-centered kanban-droppable-area">


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks_deferred']->value, 'tns');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tns']->value) {
?>
                                    <article class="kanban-entry cursor-move" id="item_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" draggable="true">
                                        <div class="kanban-entry-inner">
                                            <div class="kanban-label">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" id="v_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" class="v_item"><?php echo $_smarty_tpl->tpl_vars['tns']->value['title'];?>
</a>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <?php if ($_smarty_tpl->tpl_vars['tns']->value['cid'] != 0 && $_smarty_tpl->tpl_vars['tns']->value['cid'] != '' && isset($_smarty_tpl->tpl_vars['contacts']->value[$_smarty_tpl->tpl_vars['tns']->value['cid']][0]->account)) {?>
                                                            <div style="margin-bottom: 15px;">
                                                                <?php echo $_smarty_tpl->tpl_vars['contacts']->value[$_smarty_tpl->tpl_vars['tns']->value['cid']][0]->account;?>

                                                            </div>

                                                        <?php }?>

                                                        <?php if ($_smarty_tpl->tpl_vars['tns']->value['tid'] != 0 && $_smarty_tpl->tpl_vars['tns']->value['tid'] != '' && isset($_smarty_tpl->tpl_vars['tickets']->value[$_smarty_tpl->tpl_vars['tns']->value['tid']][0]->tid)) {?>
                                                            <div style="margin-bottom: 15px;">
                                                                Ticket: <?php echo $_smarty_tpl->tpl_vars['tickets']->value[$_smarty_tpl->tpl_vars['tns']->value['tid']][0]->tid;?>

                                                            </div>

                                                        <?php }?>
                                                        <img src="<?php echo getAdminImage($_smarty_tpl->tpl_vars['tns']->value['aid']);?>
" class="img-circle" style="max-width: 30px; margin-bottom: 5px;" alt="<?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>



                                                    </div>


                                                    <div class="col-md-12">

                                                        <small class="mmnt"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tns']->value['created_at'];
$_prefixVariable4 = ob_get_clean();
echo strtotime($_prefixVariable4);?>
</small>
                                                                                                                                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </article>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </div>
                        </div>

                    </div>

                    <div class="panel panel-grey kanban-col" style="border-right: 1px solid #ffffff;">
                        <div class="panel-heading">

                            Waiting on someone else

                        </div>
                        <div class="panel-body">
                            <div id="waiting_on_someone" class="kanban-centered kanban-droppable-area">


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks_waiting']->value, 'tns');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tns']->value) {
?>
                                    <article class="kanban-entry cursor-move" id="item_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" draggable="true">
                                        <div class="kanban-entry-inner">
                                            <div class="kanban-label">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" id="v_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" class="v_item"><?php echo $_smarty_tpl->tpl_vars['tns']->value['title'];?>
</a>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <?php if ($_smarty_tpl->tpl_vars['tns']->value['cid'] != 0 && $_smarty_tpl->tpl_vars['tns']->value['cid'] != '' && isset($_smarty_tpl->tpl_vars['contacts']->value[$_smarty_tpl->tpl_vars['tns']->value['cid']][0]->account)) {?>
                                                            <div style="margin-bottom: 15px;">
                                                                <?php echo $_smarty_tpl->tpl_vars['contacts']->value[$_smarty_tpl->tpl_vars['tns']->value['cid']][0]->account;?>

                                                            </div>

                                                        <?php }?>

                                                        <?php if ($_smarty_tpl->tpl_vars['tns']->value['tid'] != 0 && $_smarty_tpl->tpl_vars['tns']->value['tid'] != '' && isset($_smarty_tpl->tpl_vars['tickets']->value[$_smarty_tpl->tpl_vars['tns']->value['tid']][0]->tid)) {?>
                                                            <div style="margin-bottom: 15px;">
                                                                Ticket: <?php echo $_smarty_tpl->tpl_vars['tickets']->value[$_smarty_tpl->tpl_vars['tns']->value['tid']][0]->tid;?>

                                                            </div>

                                                        <?php }?>
                                                        <img src="<?php echo getAdminImage($_smarty_tpl->tpl_vars['tns']->value['aid']);?>
" class="img-circle" style="max-width: 30px; margin-bottom: 5px;" alt="<?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>



                                                    </div>


                                                    <div class="col-md-12">

                                                        <small class="mmnt"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tns']->value['created_at'];
$_prefixVariable5 = ob_get_clean();
echo strtotime($_prefixVariable5);?>
</small>
                                                                                                                                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </article>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </div>
                        </div>

                    </div>
                    <!--sütun bitiş-->


                </div>
            </div>



        </div>

    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_task" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_11344460275c6f2c7770c926_27516533 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_11344460275c6f2c7770c926_27516533',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        

        $(function () {

            for (var a = dragula($(".kanban-droppable-area").toArray()), r = a.containers, o = r.length, l = 0; l < o; l++)$(r[l]).addClass("dragula dragula-vertical");
            a.on("drop", function (a, r, o, l) {


                var item = a.id;
                var target = r.id;

                $.post(base_url + 'tasks/set_status/',{task_id : item, target: target},function (data) {
                    //   $(".kanban-col").unblock();

                })

            });

            $modal = $("#ajax-modal");

            $( ".mmnt" ).each(function() {
                //   alert($( this ).html());
                var ut = $( this ).html();
                $( this ).html(moment.unix(ut).fromNow());
            });


            var rel_type_val;

            $(".add_task").on('click',function (e) {
                e.preventDefault();

                $('body').modalmanager('loading');

                $modal.load( base_url + 'tasks/create/', '', function(){

                    $modal.modal();
                    ib_editor("#description");
                    var ib_date_picker_options = {
                        format: ib_date_format_picker
                    };



                    var $start_date = $('#start_date');

                    $start_date.datetimepicker({
                        format: 'YYYY-MM-DD'
                    });

                    var $due_date = $('#due_date');

                    $due_date.datetimepicker({
                        format: 'YYYY-MM-DD'
                    });

                    $("#cid").select2({
                        theme: "bootstrap"
                    });

                });


            });




            // function updateRelParams() {
            //
            //     rel_type_val = $("#rel_type").val();
            //
            //     if(rel_type_val != 'None'){
            //
            //         $("#rel_id_input").show();
            //         $("#lbl_rel_id").html(rel_type_val);
            //
            //
            //
            //         var rel_id_select2 = $("#rel_id").select2({
            //             theme: "bootstrap",
            //             ajax: {
            //                 url: base_url + "json/"+rel_type_val,
            //                 processResults: function (data, params) {
            //                     return {
            //                         results: data
            //
            //                     };
            //                 },
            //                 delay: 250,
            //                 cache: false
            //
            //             }
            //         });
            //
            //
            //
            //
            //     }
            //
            //     else{
            //         $("#rel_id_input").hide();
            //     }
            // }


            $modal.on('click', '.modal_submit', function(e){

                e.preventDefault();

                $modal.modal('loading');

                $.post( base_url + "tasks/post/", $("#ib-modal-form").serialize())
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            window.location = base_url + 'tasks/list/' + data;

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
                        }

                    });

            });


            $('.v_item').on('click',function (e) {
                e.preventDefault();
                $('body').modalmanager('loading');

                $modal.load( base_url + 'tasks/view/'+this.id, '', function(){

                    $modal.modal();




                });


            });


            $modal.on('click', '.c_delete', function(e){
                e.preventDefault();
                var tid = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){

                        $.get( base_url + "delete/tasks/"+tid, function( data ) {
                            location.reload();
                        });


                    }
                });

            });


            $modal.on('click', '.c_edit', function(e){
                e.preventDefault();
                var tid = this.id;

                $('body').modalmanager('loading');

                $modal.load( base_url + 'tasks/create/'+tid, '', function(){
                    $('body').modalmanager('loading');
                    $modal.modal();
                    ib_editor("#description");
                    var ib_date_picker_options = {
                        format: ib_date_format_picker
                    };


                    var jq_title = $('#title').val();

                    $('#title').keyup(function () {

                        var live_val = $(this).val();
                        if(live_val == ''){
                            $("#txt_modal_header").html(jq_title);
                        }
                        else{
                            $("#txt_modal_header").html(live_val);
                        }


                    });

                    var $start_date = $('#start_date');

                    $start_date.datetimepicker({
                        format: 'YYYY-MM-DD'
                    });

                    var $due_date = $('#due_date');

                    $due_date.datetimepicker({
                        format: 'YYYY-MM-DD'
                    });


                    $("#cid").select2({
                        theme: "bootstrap"
                    });

                    // $("#rel_type").select2({
                    //     theme: "bootstrap"
                    // })
                    //     .on("change", function(e) {
                    //         updateRelParams();
                    //     });

                });

            });


        });

        
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
