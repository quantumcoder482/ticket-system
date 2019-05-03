{extends file="$layouts_client"}

{block name="content"}

<!-- row -->

<div class="row">
    <div class="col-md-12">
        <a href="{$_url}client/tickets/all/" class="btn btn-primary btn-sm" style="margin-bottom: 15px;"><i
                class="fa fa-long-arrow-left"></i> Back to the List</a>


        <div class="panel panel-default" id="t_options">


            <div class="panel-body">
                <h3>ID: {$d->tid} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {$d->subject}</h3>
                <hr>

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#details"><i class="fa fa-th"></i> Details</a></li>
                    <li><a data-toggle="tab" href="#tasks"><i class="fa fa-tasks"></i> Tasks</a></li>
                    <li><a data-toggle="tab" href="#uploads"><i class="fa fa-upload"></i> Uploads</a></li>
                    <li><a data-toggle="tab" href="#downloads"><i class="fa fa-download"></i> Downloads</a></li>
                    <li><a data-toggle="tab" href="#comments"><i class="fa fa-comments"></i> Comments</a></li>

                </ul>

                <div class="tab-content">
                    <div id="details" class="tab-pane fade in active ib-tab-box">

                        <div class="row" style="margin:20px 20px">
                            <div class="col-md-6">
                                <div class="row">
                                    <p>
                                        <span class="label label-default inline-block"> {$_L['Status']}: <span id="inline_status">{$d->status}</span></span>
                                    </p>
                                    <p>
                                        <span class="label label-default inline-block"> {$_L['Priority']}: {$d->urgency} </span>
                                    </p>
                                    <br>
                                    <p><strong>Created on:</strong> {$d->created_at}</p>
                                    <p><strong>Updated on:</strong> {$d->updated_at}</p>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <form>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Abstract</label>
                                                <hr>
                                                <div >{$d->message}</div>
                                                    
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:20px 20px">
                            <hr>
                            <h4>Previous Conversations</h4>

                            <table class="table table-hover">
                                <tbody>
                                    {foreach $o_tickets as $o_ticket}

                                    {if $o_ticket['id'] == $d->id}
                                    {continue}
                                    {/if}
                                    <tr>
                                        <td>
                                            <em class="mmnt">{strtotime($o_ticket['created_at'])}</em>
                                            <br>
                                            <p>
                                                <a href="#">{$o_ticket['subject']}</a>
                                            </p>

                                            <span class="label label-default inline-block"> {$_L['Status']}:
                                                {$d->status} </span> &nbsp;
                                            <span class="label label-default inline-block"> {$_L['Priority']}:
                                                {$d->urgency} </span> &nbsp;

                                        </td>
                                    </tr>
                                    {foreachelse}
                                    <tr>
                                        <td>
                                            No Data Available
                                        </td>
                                    </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="tid" id="tid" value="{$d->id}">
                    </div>

                    <div id="tasks" class="tab-pane fade ib-tab-box">
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <h3>All Tasks</h3>
                                <hr>
                                <div id="tasks_list" class="table-responsive"></div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div style="float:right; margin-right:30px">
                                    <p style="">
                                        <h3>Task Overview</h3>
                                    </p>
                                    <p>1. Editorial Review</p>
                                    <p>2. Plagiarism Check</p>
                                    <p>3. Peer-review</p>
                                    <p>4. Proofreading</p>
                                    <p>5. Layout Editing</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="uploads" class="tab-pane fade ib-tab-box">
                        <div class="row" style="padding:20px 20px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <a data-toggle="modal" href="#modal_upload_file"
                                                class="btn btn-primary upload_file waves-effect waves-light"
                                                id="upload_file"><i class="fa fa-plus"></i> {$_L['New File Upload']}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <form class="form-horizontal" method="post" action="">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-search"></span>
                                                            </div>
                                                            <input type="text" name="name" id="foo_filter"
                                                                class="form-control" placeholder="{$_L['Search']}..." />

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <table class="table table-bordered table-hover sys_table footable"
                                                id="footable_tbl" data-filter="#foo_filter" data-page-size="20">
                                                <thead>
                                                    <tr>

                                                        <th class="text-right" data-sort-ignore="true" width="20px;">
                                                            {$_L['Type']}</th>

                                                        <th data-sort-ignore="true">{$_L['Title']}</th>

                                                        <th width="200px" data-sort-ignore="true">{$_L['Created At']}
                                                        </th>

                                                        <th class="text-center" data-sort-ignore="true" width="100px;">
                                                            {$_L['Manage']}</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    {foreach $upload_files as $at}

                                                    <tr>

                                                        <td style="text-align:center">
                                                            <h3>
                                                                {if $at['file_mime_type'] eq 'jpg' ||
                                                                $at['file_mime_type']
                                                                eq 'png' || $at['file_mime_type'] eq 'gif'}
                                                                <i class="fa fa-file-image-o"></i>
                                                                {elseif $at['file_mime_type'] eq 'pdf'}
                                                                <i class="fa fa-file-pdf-o"></i>
                                                                {elseif $at['file_mime_type'] eq 'zip'}
                                                                <i class="fa fa-file-archive-o"></i>
                                                                {elseif $at['file_mime_type'] eq 'doc' ||
                                                                $at['file_mime_type'] eq 'docx'}
                                                                <i class="fa fa-file-word-o"></i>
                                                                {else}
                                                                <i class="fa fa-file"></i>
                                                                {/if}
                                                            </h3>
                                                        </td>
                                                        <td>
                                                            {$at['message']}
                                                        </td>
                                                        <td>
                                                            <span class="">
                                                                {$at['created_at']}
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{$attachment_path}{$at['attachment']}" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-search"></i> </a>
                                                            <!-- <a href="{$_url}client/tickets/download/{$at['id']}/{$at['attachment']}" class="btn btn-success btn-xs"><i class="fa fa-download"></i> </a> -->
                                                        </td>
                                                    </tr>

                                                    {/foreach}

                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <td colspan="4">
                                                            <ul class="pagination">
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tfoot>

                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="downloads" class="tab-pane fade ib-tab-box">
                        <div class="row" style="padding:20px 20px">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <form class="form-horizontal" method="post" action="">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-search"></span>
                                                            </div>
                                                            <input type="text" name="name" id="foo_filter"
                                                                class="form-control" placeholder="{$_L['Search']}..." />

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <table class="table table-bordered table-hover sys_table footable"
                                                id="footable_tbl" data-filter="#foo_filter" data-page-size="20">
                                                <thead>
                                                    <tr>

                                                        <th class="text-right" data-sort-ignore="true" width="20px;">
                                                            {$_L['Type']}</th>

                                                        <th data-sort-ignore="true">{$_L['Title']}</th>

                                                        <th width="200px" data-sort-ignore="true">{$_L['Created At']}
                                                        </th>

                                                        <th class="text-center" data-sort-ignore="true" width="100px;">
                                                            {$_L['Manage']}</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    {foreach $download_files as $at}

                                                    <tr>

                                                        <td style="text-align:center">
                                                            <h3>
                                                                {if $at['file_mime_type'] eq 'jpg' ||
                                                                $at['file_mime_type']
                                                                eq 'png' || $at['file_mime_type'] eq 'gif'}
                                                                <i class="fa fa-file-image-o"></i>
                                                                {elseif $at['file_mime_type'] eq 'pdf'}
                                                                <i class="fa fa-file-pdf-o"></i>
                                                                {elseif $at['file_mime_type'] eq 'zip'}
                                                                <i class="fa fa-file-archive-o"></i>
                                                                {elseif $at['file_mime_type'] eq 'doc' ||
                                                                $at['file_mime_type'] eq 'docx'}
                                                                <i class="fa fa-file-word-o"></i>
                                                                {else}
                                                                <i class="fa fa-file"></i>
                                                                {/if}
                                                            </h3>
                                                        </td>
                                                        <td>
                                                            {$at['message']}
                                                        </td>
                                                        <td>
                                                            <span class="">
                                                                {$at['created_at']}
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{$attachment_path}{$at['attachment']}" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-search"></i> </a>
                                                            <!-- <a href="{$_url}client/tickets/download/{$at['id']}/{$at['attachment']}" class="btn btn-success btn-xs"><i class="fa fa-download"></i> </a> -->
                                                        </td>
                                                    </tr>

                                                    {/foreach}

                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <td colspan="4">
                                                            <ul class="pagination">
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tfoot>

                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="comments" class="tab-pane fade ib-tab-box">
                        <div class="row" style="background:#EEEEEF; padding:20px 20px">
                            <ul class="timeline">
                                <!-- timeline time label -->
                                <li class="time-label">
                                    <span class="">
                                        {$d->created_at}
                                    </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    {*<i class="fa fa-envelope bg-blue"></i>*}
                                    {if $user['img'] eq 'gravatar'}
                                    <img src="http://www.gravatar.com/avatar/{($user['email'])|md5}?s=30"
                                        class="img-time-line" alt="{$user['fullname']}">
                                    {elseif $user['img'] eq ''}
                                    <img class="img-time-line" src="{$app_url}ui/lib/imgs/default-user-avatar.png"
                                        alt="">
                                    {else}
                                    <img src="{$user['img']}" class="img-time-line" alt="{$user['account']}">
                                    {/if}

                                    <div class="timeline-item">
                                        {*<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>*}

                                        <h3 class="timeline-header"><a href="javascript:void(0)">{$d->account}</a></h3>

                                        <div class="timeline-body">
                                            {$d->message}
                                        </div>

                                    </div>
                                </li>

                                {foreach $replies as $reply}
                                
                                {if $reply['attachments'] neq ''}
                                {continue}
                                {/if}
                                
                                <li class="time-label">
                                    <span class="">
                                        {$reply['created_at']}
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope bg-blue"></i>

                                    <div class="timeline-item">
                                        {*<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>*}

                                        <h3 class="timeline-header"><a
                                                href="javascript:void(0)">{$reply['replied_by']}</a></h3>

                                        <div class="timeline-body">
                                            {$reply['message']}
                                        </div>

                                        {if ($reply['attachments']) neq ''}
                                        <div class="timeline-footer">
                                            {Tickets::gen_link_attachments($reply['attachments'])}
                                        </div>
                                        {/if}


                                    </div>
                                </li>
                                {/foreach}

                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li class="time-label">
                                    <span>
                                        {$_L['Add Reply']}
                                    </span>
                                </li>
                                <li>
                                    {if $user['img'] eq 'gravatar'}
                                    <img src="http://www.gravatar.com/avatar/{($user['email'])|md5}?s=30"
                                        class="img-time-line" alt="{$user['fullname']}">
                                    {elseif $user['img'] eq ''}
                                    <img class="img-time-line" src="{$app_url}ui/lib/imgs/default-user-avatar.png"
                                        alt="">
                                    {else}
                                    <img src="{$user['img']}" class="img-time-line" alt="{$user['account']}">
                                    {/if}

                                    <div class="timeline-item">
                                        <div class="timeline-body">
                                            <form id="create_ticket" class="form-horizontal push-10-t push-10"
                                                method="post">
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <textarea id="content" class="form-control sysedit"
                                                            name="content"></textarea>
                                                        <!-- <div class="help-block"><a data-toggle="modal"
                                                                href="#modal_add_item"><i class="fa fa-paperclip"></i>
                                                                {$_L['Attach File']}</a> </div> -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">

                                                        <input type="hidden" name="attachments" id="attachments"
                                                            value="">
                                                        <input type="hidden" name="f_tid" id="f_tid" value="{$d->id}">

                                                        <button class="btn btn-primary" id="ib_form_submit"
                                                            type="submit"><i class="fa fa-send push-5-r"></i>
                                                            {$_L['Submit']}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        {*<div class="timeline-footer">*}
                                            {*<a class="btn btn-primary btn-xs">Read more</a>*}
                                            {*<a class="btn btn-danger btn-xs">Delete</a>*}
                                            {*</div>*}
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->

                                <!-- END timeline item -->
                                <!-- timeline time label -->

                                <!-- /.timeline-label -->
                                <!-- timeline item -->

                                <!-- END timeline item -->
                                <!-- timeline item -->

                                <!-- END timeline item -->
                                <li>
                                    <i class="fa fa-life-ring bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>




<!-- /.row -->


<div id="modal_add_item" class="modal fade" tabindex="-1" data-width="600" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add File</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form action="" class="dropzone" id="upload_container">
                    <div class="dz-message">
                        <h3> <i class="fa fa-cloud-upload"></i> Drop File Here</h3>
                        <br />
                        <span class="note">Or Click to Upload</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">

        <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>

    </div>
</div>


<div id="modal_upload_file" class="modal fade" tabindex="-2" data-width="760" style="display: none;">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-upload"></i> {$_L['New File Upload']}</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form id="fileupload_form">
                    <div class="form-group">
                        <label for="doc_title">{$_L['Title']}</label>
                        <input type="text" class="form-control" id="doc_title" name="doc_title"  onfocusout="check_title()">
                    </div>

                </form>
                <span id="filetitle_error_msg" style="display:block; color:red; display:none"><i
                        class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please input title </span>
                <hr>
                <form action="" class="dropzone" id="fileupload_container">
                    <div class="dz-message">
                        <h3> <i class="fa fa-cloud-upload"></i> {$_L['Drop File Here']}</h3>
                        <br />
                        <span class="note">{$_L['Click to Upload']}</span>
                    </div>

                </form>
                <hr>
                <span id="fileuplod_error_msg" style="display:block; color:red; display:none"><i class="fa fa-exclamation-triangle"aria-hidden="true"></i> Please select file </span> 
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="file_link" id="file_link" value="">
        <input type="hidden" name="file_tid" id="file_tid" value="{$d->id}">
        <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>
        <button type="button" id="btn_add_file" class="btn btn-primary">{$_L['Submit']}</button>
    </div>

    <input type="hidden" name="tab_name" id="tab_name" value="{$tab}">
    <input type="hidden" name="t_id" id="t_id" value="{$d->id}">

</div>


{/block}

{block name="script"}
<script type="text/javascript" src="{$app_url}ui/lib/footable/js/footable.all.min.js"></script>
<script src="{$app_url}ui/lib/easytimer.min.js"></script>
<script type="text/javascript" src="{$app_url}ui/lib/s2/js/select2.min.js"></script>
<script type="text/javascript">

    $(function(){

        $tab = $('#tab_name').val();
        switch($tab){
            case 'details':
                $('.nav-tabs a[href="#details"]').tab('show');
                break;
            case 'tasks':
                $('.nav-tabs a[href="#tasks"]').tab('show');
                break;
            case 'uploads':
                $('.nav-tabs a[href="#uploads"]').tab('show');
                break;
            case 'downloads':
                $('.nav-tabs a[href="#downloads"]').tab('show');
                break;
            case 'comments':
                $('.nav-tabs a[href="#comments"]').tab('show');
                read_client();
                break;
        }

        
        $('a[data-toggle="tab"]').on('click', function(e){
            var tab_name = $(e.target).attr('href');
            if(tab_name == "#comments"){
                read_client();
            }
        });

        function read_client(){

            $.post( base_url + "client/tickets/client_read/", { "id":tid } )
                .done(function( data ) {

                    if($.isNumeric(data)){
                        console.log('change read status');
                    }
                    else {
                    
                    }
                });

        }

        $('#notes').redactor({
            minHeight: 300, // pixels
            plugins: ['fontcolor'],
            toolbar: false,
        });

        var footable_tbl = $("#footable_tbl");
        footable_tbl.footable();

        function loadTasks() {

            $("#tasks_list").html(block_msg);

            $.get(base_url + "client/tickets/tasks_list/" + tid, function (data) {

                $("#tasks_list").html(data);

            });
        }

        loadTasks();
        
        setInterval(function(){
            loadTasks();
        }, 60000);



    });
    



</script>

{/block}