{extends file="$layouts_admin"}

{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/s2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/footable/css/footable.core.min.css" />
{/block}

{block name="content"}
<div class="row">

    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <form method="POST" id="frm_filter">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date_range">Date range</label>
                                <input class="form-control" id="date_range" name="date_range" value="{$date_range}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="">{$_L['All']}</option>
                                    <option value="Not Started" {if $status eq 'Not Started'}selected{/if}>Not Started</option>
                                    <option value="In Progress" {if $status eq 'In Progress'}selected{/if}>In Progress</option>
                                    <option value="Completed" {if $status eq 'Completed'}selected{/if}>Completed</option>
                                    <option value="Deferred" {if $status eq 'Deferred'}selected{/if}>Deferred</option>
                                    <option value="Waiting" {if $status eq 'Waiting'}selected{/if}>Waiting</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ticket_id">Ticket ID</label>
                                <input class="form-control" id="ticket_id" name="ticket_id" value="{$ticket_id}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="task_name">Task Name</label>
                                <select id="task_name" name="task_name" class="form-control">
                                    <option value="">{$_L['All']}</option>
                                    <option value="Plagiarism Check" {if $task_name eq 'Plagiarism Check'}selected{/if}>Plagiarism Check</option>
                                    <option value="Peer-Review" {if $task_name eq 'Peer-Review'}selected{/if}>Peer-Review</option>
                                    <option value="Proofreading" {if $task_name eq 'Proofreading'}selected{/if}>Proofreading</option>
                                    <option value="Layout Editing" {if $task_name eq 'Layout Editing'}selected{/if}>Layout Editing</option>
                                    <option value="Galley Correction" {if $task_name eq 'Galley Correction'}selected{/if}>Galley Correction</option>
                                    <option value="Publishing" {if $task_name eq 'Publishing'}selected{/if}>Publishing</option>
                                </select>
                            </div>
                        </div>
                        {if $user['user_type'] eq 'Admin'}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="staff_id">Staff</label>
                                <select id="staff_id" name="staff_id" class="form-control">
                                    <option value="">{$_L['All']}</option>
                                    {foreach $staffs as $st}
                                        <option value="{$st['id']}" {if $st['id'] eq $staff_id }selected{/if}>{$st['fullname']}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                        {else}
                        <div class="col-md-4">&nbsp;</div>
                        {/if}

                        <div class="col-md-4">
                            <div class="form-group">

                            </div>
                        </div>

                        <input type="hidden" id="date_range_data" name="date_range_data" value="{$date_range}">

                        <div class="col-md-4">
                            <div class="form-group">
                                <button class="btn btn-primary" style="margin-top: 10px;" id="filter">Filter</button>
                            </div>
                        </div>
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
                            {foreach $tasks_not_started as $tns}
                            <article class="kanban-entry cursor-move" id="item_{$tns['id']}" draggable="true">
                                <div class="kanban-entry-inner">
                                    <div class="kanban-label">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="javascript:void(0)" id="v_{$tns['id']}"
                                                    class="v_item">{$tns['title']}</a>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">

                                                {if $tns['cid'] != 0 && $tns['cid'] != '' &&
                                                isset($contacts[$tns['cid']][0]->account)}
                                                <div style="margin-bottom: 15px;">
                                                    {$contacts[$tns['cid']][0]->account}
                                                </div>

                                                {/if}

                                                {if $tns['tid'] != 0 && $tns['tid'] != '' &&
                                                isset($tickets[$tns['tid']][0]->tid)}
                                                <div style="margin-bottom: 15px;">
                                                    Ticket: {$tickets[$tns['tid']][0]->tid}
                                                </div>

                                                {/if}



                                                <img src="{getAdminImage($tns['aid'])}" class="img-circle"
                                                    style="max-width: 30px; margin-bottom: 5px;"
                                                    alt="{$tns['created_by']}"> {$tns['created_by']}


                                            </div>


                                            <div class="col-md-12">

                                                <small>{$_L['Created']}: <span
                                                        class="mmnt">{strtotime({$tns['created_at']})}</span></small>
                                                <br>
                                                <small>{$_L['Due Date']}: {date( $config['df'],
                                                    strtotime($tns['due_date']))}</small>

                                                {if isset($tns['priority'])}
                                                <br>
                                                {if strtolower($tns['priority']) == 'critical' ||
                                                strtolower($tns['priority']) == 'high'}
                                                <span class="label label-danger">{$tns['priority']}</span>
                                                {else}
                                                <span class="label label-info">{$tns['priority']}</span>
                                                {/if}

                                                {/if}
                                                {*<br>*}
                                                {*<a href="javascript:void(0)" class="c_delete" id="d_{$tns['id']}"><i
                                                        class="fa fa-trash"></i> </a>*}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </article>

                            {/foreach}
                        </div>
                    </div>


                </div>

                <div class="panel panel-primary kanban-col">
                    <div class="panel-heading">

                        In Progress

                    </div>
                    <div class="panel-body">
                        <div id="in_progress" class="kanban-centered kanban-droppable-area">


                            {foreach $tasks_in_progress as $tns}
                            <article class="kanban-entry cursor-move" id="item_{$tns['id']}" draggable="true">
                                <div class="kanban-entry-inner">
                                    <div class="kanban-label">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="javascript:void(0)" id="v_{$tns['id']}"
                                                    class="v_item">{$tns['title']}</a>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                {if $tns['cid'] != 0 && $tns['cid'] != '' &&
                                                isset($contacts[$tns['cid']][0]->account)}
                                                <div style="margin-bottom: 15px;">
                                                    {$contacts[$tns['cid']][0]->account}
                                                </div>

                                                {/if}

                                                {if $tns['tid'] != 0 && $tns['tid'] != '' &&
                                                isset($tickets[$tns['tid']][0]->tid)}
                                                <div style="margin-bottom: 15px;">
                                                    Ticket: {$tickets[$tns['tid']][0]->tid}
                                                </div>

                                                {/if}
                                                <img src="{getAdminImage($tns['aid'])}" class="img-circle"
                                                    style="max-width: 30px; margin-bottom: 5px;"
                                                    alt="{$tns['created_by']}"> {$tns['created_by']}


                                            </div>


                                            <div class="col-md-12">

                                                <small class="mmnt">{strtotime({$tns['created_at']})}</small>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </article>

                            {/foreach}


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


                            {foreach $tasks_completed as $tns}
                            <article class="kanban-entry cursor-move" id="item_{$tns['id']}" draggable="true">
                                <div class="kanban-entry-inner">
                                    <div class="kanban-label">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="javascript:void(0)" id="v_{$tns['id']}"
                                                    class="v_item">{$tns['title']}</a>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                {if $tns['cid'] != 0 && $tns['cid'] != '' &&
                                                isset($contacts[$tns['cid']][0]->account)}
                                                <div style="margin-bottom: 15px;">
                                                    {$contacts[$tns['cid']][0]->account}
                                                </div>

                                                {/if}

                                                {if $tns['tid'] != 0 && $tns['tid'] != '' &&
                                                isset($tickets[$tns['tid']][0]->tid)}
                                                <div style="margin-bottom: 15px;">
                                                    Ticket: {$tickets[$tns['tid']][0]->tid}
                                                </div>

                                                {/if}
                                                <img src="{getAdminImage($tns['aid'])}" class="img-circle"
                                                    style="max-width: 30px; margin-bottom: 5px;"
                                                    alt="{$tns['created_by']}"> {$tns['created_by']}


                                            </div>


                                            <div class="col-md-12">

                                                <small class="mmnt">{strtotime({$tns['created_at']})}</small>
                                                {*<br>*}
                                                {*<a href="javascript:void(0)" class="c_delete" id="d_{$tns['id']}"><i
                                                        class="fa fa-trash"></i> </a>*}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </article>

                            {/foreach}


                        </div>
                    </div>

                </div>

                <div class="panel panel-blue-grey kanban-col">
                    <div class="panel-heading">

                        Deferred

                    </div>
                    <div class="panel-body">
                        <div id="deferred" class="kanban-centered kanban-droppable-area">


                            {foreach $tasks_deferred as $tns}
                            <article class="kanban-entry cursor-move" id="item_{$tns['id']}" draggable="true">
                                <div class="kanban-entry-inner">
                                    <div class="kanban-label">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="javascript:void(0)" id="v_{$tns['id']}"
                                                    class="v_item">{$tns['title']}</a>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                {if $tns['cid'] != 0 && $tns['cid'] != '' &&
                                                isset($contacts[$tns['cid']][0]->account)}
                                                <div style="margin-bottom: 15px;">
                                                    {$contacts[$tns['cid']][0]->account}
                                                </div>

                                                {/if}

                                                {if $tns['tid'] != 0 && $tns['tid'] != '' &&
                                                isset($tickets[$tns['tid']][0]->tid)}
                                                <div style="margin-bottom: 15px;">
                                                    Ticket: {$tickets[$tns['tid']][0]->tid}
                                                </div>

                                                {/if}
                                                <img src="{getAdminImage($tns['aid'])}" class="img-circle"
                                                    style="max-width: 30px; margin-bottom: 5px;"
                                                    alt="{$tns['created_by']}"> {$tns['created_by']}


                                            </div>


                                            <div class="col-md-12">

                                                <small class="mmnt">{strtotime({$tns['created_at']})}</small>
                                                {*<br>*}
                                                {*<a href="javascript:void(0)" class="c_delete" id="d_{$tns['id']}"><i
                                                        class="fa fa-trash"></i> </a>*}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </article>

                            {/foreach}


                        </div>
                    </div>

                </div>

                <div class="panel panel-grey kanban-col" style="border-right: 1px solid #ffffff;">
                    <div class="panel-heading">

                        Waiting on editor approval

                    </div>
                    <div class="panel-body">
                        <div id="waiting_on_someone" class="kanban-centered kanban-droppable-area">


                            {foreach $tasks_waiting as $tns}
                            <article class="kanban-entry cursor-move" id="item_{$tns['id']}" draggable="true">
                                <div class="kanban-entry-inner">
                                    <div class="kanban-label">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="javascript:void(0)" id="v_{$tns['id']}"
                                                    class="v_item">{$tns['title']}</a>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                {if $tns['cid'] != 0 && $tns['cid'] != '' &&
                                                isset($contacts[$tns['cid']][0]->account)}
                                                <div style="margin-bottom: 15px;">
                                                    {$contacts[$tns['cid']][0]->account}
                                                </div>

                                                {/if}

                                                {if $tns['tid'] != 0 && $tns['tid'] != '' &&
                                                isset($tickets[$tns['tid']][0]->tid)}
                                                <div style="margin-bottom: 15px;">
                                                    Ticket: {$tickets[$tns['tid']][0]->tid}
                                                </div>

                                                {/if}
                                                <img src="{getAdminImage($tns['aid'])}" class="img-circle"
                                                    style="max-width: 30px; margin-bottom: 5px;"
                                                    alt="{$tns['created_by']}"> {$tns['created_by']}


                                            </div>


                                            <div class="col-md-12">

                                                <small class="mmnt">{strtotime({$tns['created_at']})}</small>
                                                {*<br>*}
                                                {*<a href="javascript:void(0)" class="c_delete" id="d_{$tns['id']}"><i
                                                        class="fa fa-trash"></i> </a>*}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </article>
                            {/foreach}


                        </div>
                    </div>

                </div>
                <!--sütun bitiş-->


            </div>
        </div>



    </div>

</div>

<div class="md-fab-wrapper">
    <!-- <a class="md-fab md-fab-primary waves-effect waves-light add_task" href="#">
        <i class="fa fa-plus"></i>
    </a> -->
</div>
{/block}

{block name="script"}
<script type="text/javascript" src="{$app_url}ui/lib/footable/js/footable.all.min.js"></script>
<script>
    {literal}

    var _url = $('#_url').val();

    $(function () {

        var $status = $('#status');
        var $ticket_id = $('#ticket_id');
        var $task_name = $('#task_name');
        var $staff_id = $('#staff_id');

        $status.select2({
            theme:"bootstrap"
        });

        $task_name.select2({
            theme:"bootstrap"
        });

        $staff_id.select2({
            theme:"bootstrap"
        });



        $('.footable').footable();

        function cb(start, end) {
            $('#date_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        
        var $date_range_data = $('#date_range_data');

        if( $date_range_data.val() == '') {
            var start = moment().subtract(7, 'days');
            var end = moment();
            cb(start, end);
        } else{
            var date_array = $date_range_data.val().split(' - ');
            var start_string = date_array[0].split('/').join('-').trim();
            var end_string = date_array[1].split('/').join('-').trim();
            var start = moment(start_string);
            var end = moment(end_string);
            cb(start, end);

        }

        var $date_range = $("#date_range");

        $date_range.daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            locale: {
                format: 'YYYY/MM/DD'
            }
        }, cb);

        // 

        $('#filter').on('click', function(e){
            e.preventDefault();
            var $post_url = base_url+'tasks';
            $('#frm_filter').attr('action', $post_url);
            $('#frm_filter').submit();

        });



        for (var a = dragula($(".kanban-droppable-area").toArray()), r = a.containers, o = r.length, l = 0; l < o; l++)$(r[l]).addClass("dragula dragula-vertical");
        a.on("drop", function (a, r, o, l) {


            var item = a.id;
            var target = r.id;

            $.post(base_url + 'tasks/set_status/', { task_id: item, target: target }, function (data) {
                //   $(".kanban-col").unblock();

            })

        });

        $modal = $("#ajax-modal");

        $(".mmnt").each(function () {
            //   alert($( this ).html());
            var ut = $(this).html();
            $(this).html(moment.unix(ut).fromNow());
        });


        var rel_type_val;

        $(".add_task").on('click', function (e) {
            e.preventDefault();

            $('body').modalmanager('loading');

            $modal.load(base_url + 'tasks/create/', '', function () {

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

                $("#aid").select2({
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


        $modal.on('click', '.modal_submit', function (e) {

            e.preventDefault();

            $modal.modal('loading');

            $.post(base_url + "tasks/post/", {
                    title:$('#title').val(), 
                    start_date:$('#start_date').val(), 
                    due_date: $('#due_date').val(),
                    cid:$('#cid').val(), 
                    aid:$('#aid').val(),
                    description: tinyMCE.activeEditor.getContent(), 
                    status:$('#task_status').val(),
                    task_id:$('#task_id').val()
                })
                .done(function (data) {

                    if ($.isNumeric(data)) {

                        window.location = base_url + 'tasks/list/' + data;

                    }

                    else {
                        $modal.modal('loading');
                        toastr.error(data);
                    }

                });

        });


        $('.v_item').on('click', function (e) {
            e.preventDefault();
            $('body').modalmanager('loading');

            $modal.load(base_url + 'tasks/view/' + this.id, '', function () {

                $modal.modal();




            });


        });


        $modal.on('click', '.c_delete', function (e) {
            e.preventDefault();
            var tid = this.id;
            bootbox.confirm(_L['are_you_sure'], function (result) {
                if (result) {

                    $.get(base_url + "delete/tasks/" + tid, function (data) {
                        location.reload();
                    });


                }
            });

        });


        $modal.on('click', '.c_edit', function (e) {
            e.preventDefault();
            var tid = this.id;

            $('body').modalmanager('loading');

            $modal.load(base_url + 'tasks/create/' + tid, '', function () {
                $('body').modalmanager('loading');
                $modal.modal();
                ib_editor("#description");
                var ib_date_picker_options = {
                    format: ib_date_format_picker
                };


                var jq_title = $('#title').val();

                $('#title').keyup(function () {

                    var live_val = $(this).val();
                    if (live_val == '') {
                        $("#txt_modal_header").html(jq_title);
                    }
                    else {
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

                $("#aid").select2({
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

    function setPreDefinedContent(event,predefined_reply_id) {

        $('#modal_predefined_replies').modal('hide');

        $.get( _url + "tickets/admin/get-predefined-reply/" + predefined_reply_id, function( data ) {
            tinyMCE.activeEditor.setContent(data);
        });

    }

    {/literal}
</script>
{/block}