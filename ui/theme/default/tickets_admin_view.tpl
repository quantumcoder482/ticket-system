{extends file="$layouts_admin"}

{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/s2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/footable/css/footable.core.min.css" />
{/block}

{block name="content"}




    <div class="row">
        <div class="col-md-12">
            <a href="{$_url}tickets/admin/list/" class="btn btn-primary btn-sm" style="margin-bottom: 15px;"><i
                        class="fa fa-long-arrow-left"></i> Back to the List</a>


            <div class="panel panel-default" id="t_options">


                <div class="panel-body">
                    <h3>{$d->subject}</h3>
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

                            <span class="label label-default inline-block"> {$_L['Priority']}: {$d->urgency} </span> &nbsp;

                            <span class="label label-default inline-block"> {$_L['Status']}: <span id="inline_status">{$d->status}</span></span>
                            <hr>
                            <p><strong>Ticket:</strong> {$d->tid}</p>
                            <p><strong>Customer:</strong> <a href="{$_url}contacts/view/{$d->userid}">{$d->account}</a></p>


                            <p>
                                <strong>Time:</strong> <span id="timeSpent">{if $ticket->ttotal eq ''}00:00:00{else}{$ticket->ttotal}{/if}</span>
                            </p>



                            <div class="form-group">

                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {*<input class="form-control" type="text" id="editable_hour" name="editable_hour" value="{$hh}">*}
                                        <label>HH</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>3</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>MM</label>
                                        <select class="form-control">
                                            <option>5</option>
                                            <option>10</option>
                                            <option>15</option>
                                        </select>
                                    </div>
                                </div>

                            </div>



                            {*<div class="btn-group" role="group" aria-label="...">*}
                                {*<button id="startButton" type="button" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Start timer"><i class="fa fa-play"></i></button>*}
                                {*<button id="pauseButton" type="button" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Pause timer"><i class="fa fa-pause"></i></button>*}
                                {*<button id="stopButton" type="button" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Stop timer">*}
                                {*<i class="fa fa-stop"></i>*}
                                {*</button>*}
                            {*</div>*}

                            <hr>




                            <a class="btn btn-primary" href="#" id="add_reply">Add Reply</a>

                            {if $can_edit_sales}
                                {if $invoice}
                                    <a class="btn btn-success" href="{$_url}invoices/view/{$invoice->id}" id="add_reply">View invoice</a>
                                {else}
                                    <a class="btn btn-success" id="convertToInvoice" href="javascript:;">Create invoice</a>
                                {/if}
                            {/if}


                            <a class="cdelete btn btn-danger" href="#" id="t{$d->id}"><i class="icon-trash"></i> </a>

                            <hr>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <div class="form-material floating">
                                            <select class="form-control" id="editable_department" name="editable_department" size="1">
                                                <option value="None">None</option>
                                                {foreach $departments as $dep}
                                                    <option value="{$dep['id']}" {if $department eq $dep['dname']} selected{/if}>{$dep['dname']}</option>
                                                {/foreach}
                                            </select>
                                            <label for="editable_department">{$_L['Department']}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <div class="form-group">
                                            <label for="editable_assigned_to">Assigned to</label>
                                            <select class="form-control" id="editable_assigned_to" name="editable_assigned_to" size="1">
                                                <option value="None">None</option>
                                                {foreach $ads as $ad}
                                                    <option value="{$ad['id']}" {if $d->aid eq $ad['id']} selected{/if}>{$ad['fullname']} State | City | Expertise</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <div class="form-material floating">
                                            <select class="form-control" id="editable_status" name="editable_status" size="1">
                                                <option value="Open" {if $d->status eq 'Open'} selected{/if}>Open</option>
                                                <option value="On Hold" {if $d->status eq 'On Hold'} selected{/if}>On Hold</option>
                                                <option value="Escalated" {if $d->status eq 'Escalated'} selected{/if}>Escalated</option>
                                                <option value="Closed" {if $d->status eq 'Closed'} selected{/if}>Closed</option>

                                            </select>
                                            <label for="editable_status">Status</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="editable_email" name="editable_email" value="{$d->email}">
                                        <label for="editable_cc">Email</label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="editable_cc" name="editable_cc" value="{$d->cc}">
                                        <label for="editable_cc">CC</label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="editable_bcc" name="editable_bcc" value="{$d->bcc}">
                                        <label for="editable_bcc">BCC</label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="editable_phone" name="editable_phone" value="{if $c}{$c->phone}{/if}">
                                        <label for="editable_phone">Phone</label>
                                    </div>
                                </div>
                            </div>





                            <input type="hidden" name="tid" id="tid" value="{$d->id}">



                            <div class="row">
                                <div class="col-xs-12">
                                    <form>

                                        <hr>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Note</label>
                                            <textarea class="form-control" name="notes" id="notes" rows="3"
                                                      placeholder="Add Note...">{$d->notes}</textarea>
                                        </div>

                                        <button type="submit" id="btn_save_note" class="btn btn-primary">{$_L['Save']}</button>

                                    </form>
                                </div>
                            </div>


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
                                            <p><a href="{$_url}tickets/admin/view/{$o_ticket['id']}">{$o_ticket['subject']}</a></p>
                                            <span class="label label-default inline-block"> {$_L['Status']}: {$d->status} </span> &nbsp;
                                            <span class="label label-default inline-block"> {$_L['Priority']}: {$d->urgency} </span> &nbsp;

                                        </td>
                                    </tr>

                                    {foreachelse}
                                    <tr>
                                        <td>

                                            No Data Available

                                        </td>
                                    </tr>
                                {/foreach}

                                {*<tr>*}
                                {*<td>*}
                                {*<em class="mmnt">1486754289</em>*}
                                {*<br>*}
                                {*<p><a href="#">How to do this?</a></p>*}

                                {*</td>*}
                                {*</tr>*}

                                </tbody>
                            </table>

                        </div>

                        <div id="tasks" class="tab-pane fade ib-tab-box">


                            <form id="ib_add_group" class="form-horizontal push-10-t push-10" method="post">

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="task_subject" name="task_subject">
                                            <label for="task_subject">Task</label>

                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary" id="btn_add_task" type="submit"> Save</button>
                                        <div id="tasks_tools"  style="display: none;">
                                            <hr>
                                            {*<button class="btn btn-green" id="btn_mark_tasks_completed" type="button"><i class="fa fa-check push-5-r"></i> Completed</button>*}
                                            {*<button class="btn btn-warning" id="btn_mark_tasks_not_started" type="button"><i class="fa fa-check push-5-r"></i> Not Started</button>*}
                                            {*<hr>*}
                                            {*<button class="btn btn-danger" id="btn_delete_tasks" type="button"><i class="fa fa-trash push-5-r"></i> Delete</button>*}

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-green no-shadow" id="btn_mark_tasks_completed" data-toggle="tooltip" data-placement="top" title="Mark as Completed"><i class="fa fa-check"></i></button>
                                                <button type="button" class="btn btn-primary no-shadow" id="btn_mark_tasks_not_started" data-toggle="tooltip" data-placement="top" title="Mark as Not Started"><i class="fa fa-clock-o"></i></button>
                                                <button type="button" class="btn btn-danger no-shadow" id="btn_delete_tasks" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                            </div>


                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div id="tasks_list">

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
                                                                    class="form-control"
                                                                    placeholder="{$_L['Search']}..." />

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <table class="table table-bordered table-hover sys_table footable"
                                                    id="footable_tbl" data-filter="#foo_filter" data-page-size="20">
                                                    <thead>
                                                        <tr>

                                                            <th class="text-right" data-sort-ignore="true"
                                                                width="20px;">
                                                                {$_L['Type']}</th>

                                                            <th data-sort-ignore="true">{$_L['Title']}</th>

                                                            <th width="200px" data-sort-ignore="true">{$_L['Created At']}
                                                            </th>

                                                            <th class="text-center" data-sort-ignore="true"
                                                                width="100px;">
                                                                {$_L['Manage']}</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        {foreach $attachment_files as $at}

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
                                                                <span class="mmnt">
                                                                    {strtotime($at['created_at'])}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{$attachment_path}{$at['attachment']}" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-search"></i> </a>
                                                                <!-- <a href="{$_url}client/tickets/download/{$at['id']}/{$at['attachment']}" class="btn btn-success btn-xs"><i class="fa fa-download"></i> </a> -->
                                                                <a href="#" class="btn btn-danger btn-xs reply_delete" id="{$at['id']}"><i class="fa fa-trash" aria-hidden="true"></i></a>

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
                                                                    class="form-control"
                                                                    placeholder="{$_L['Search']}..." />

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <table class="table table-bordered table-hover sys_table footable"
                                                    id="footable_tbl" data-filter="#foo_filter" data-page-size="20">
                                                    <thead>
                                                        <tr>

                                                            <th class="text-right" data-sort-ignore="true"
                                                                width="20px;">
                                                                {$_L['Type']}</th>

                                                            <th data-sort-ignore="true">{$_L['Title']}</th>

                                                            <th width="200px" data-sort-ignore="true">{$_L['Created At']}
                                                            </th>

                                                            <th class="text-center" data-sort-ignore="true"
                                                                width="100px;">
                                                                {$_L['Manage']}</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        {foreach $attachment_files as $at}

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
                                                                <span class="mmnt">
                                                                    {strtotime($at['created_at'])}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{$attachment_path}{$at['attachment']}" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-search"></i></a>
                                                                <!-- <a href="{$_url}client/tickets/download/{$at['id']}/{$at['attachment']}" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a> -->
                                                                <a href="#" class="btn btn-danger btn-xs reply_delete" id="{$at['id']}"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                            <div class="row" style="background:#EEEEEF; padding:20px 20px" id="create_ticket">
                                <!-- The time line -->
                                <ul class="timeline">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="mmnt">
                                            {strtotime($d->created_at)}
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        {*<i class="fa fa-envelope bg-blue"></i>*}


                                        {if $d->admin neq '0'}
                                            {if $user['img'] eq 'gravatar'}
                                                <img src="http://www.gravatar.com/avatar/{($user['email'])|md5}?s=30"
                                                    class="img-time-line" alt="{$user['fullname']}">
                                            {elseif $user['img'] eq ''}
                                                <img class="img-time-line" src="{$app_url}ui/lib/imgs/default-user-avatar.png" alt="">
                                            {else}
                                                <img src="{$user['img']}" class="img-time-line" alt="{$user['account']}">
                                            {/if}

                                        {elseif ($c)}

                                            {if $c->img eq 'gravatar'}
                                                <img src="http://www.gravatar.com/avatar/{($user['email'])|md5}?s=30"
                                                    class="img-time-line" alt="{$user['fullname']}">
                                            {elseif $c->img eq ''}
                                                <img class="img-time-line" src="{$app_url}ui/lib/imgs/default-user-avatar.png" alt="">
                                            {else}
                                                <img src="{$c->img}" class="img-time-line" alt="{$user['account']}">
                                            {/if}

                                        {else}



                                        {/if}


                                        <div class="timeline-item">
                                            {*<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>*}


                                            <h3 class="timeline-header"><a href="javascript:void(0)">{$d->account}</a></h3>

                                            <div class="timeline-body">
                                                {$d->message}
                                                <hr>

                                                <a href="#" class="btn btn-warning btn-xs t_edit" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="{$_L['Edit']}" id="et{$d->id}"><i
                                                            class="glyphicon glyphicon-pencil"></i> </a>
                                            </div>

                                            {if ($d->attachments) neq ''}
                                                <div class="timeline-footer">
                                                    {Tickets::gen_link_attachments($d->attachments)}
                                                </div>
                                            {/if}


                                        </div>
                                    </li>

                                    {foreach $replies as $reply}
                                        <li class="time-label">
                            <span class="mmnt">
                                {strtotime($reply['created_at'])}
                            </span>
                                        </li>
                                        <li>
                                            {*<i class="fa fa-envelope bg-blue"></i>*}


                                            {if $reply['admin'] neq '0'}
                                                <img src="{getAdminImage($reply['admin'],30)}" class="img-time-line">
                                            {elseif ($c)}

                                                {if $c->img eq ''}
                                                    <img class="img-time-line" src="{$app_url}ui/lib/imgs/default-user-avatar.png"
                                                        alt="">
                                                {else}
                                                    <img src="{$c->img}" class="img-time-line" alt="{$user['account']}">
                                                {/if}

                                            {else}



                                            {/if}

                                            <div class="timeline-item">
                                                {*<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>*}

                                                <h3 class="timeline-header"><a href="javascript:void(0)">{$reply['replied_by']}</a></h3>

                                                <div class="timeline-body" {if $reply['reply_type'] eq 'internal'} style="background: #FFF6D9;" {/if}>
                                                    {$reply['message']}

                                                    <hr>

                                                    <a href="#" class="btn btn-warning btn-xs no-shadow reply_edit"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="{$_L['Edit']}" id="er{$reply['id']}"><i
                                                                class="glyphicon glyphicon-pencil"></i> </a> &nbsp;
                                                    <a href="#" class="btn btn-danger btn-xs no-shadow reply_delete"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="{$_L['Delete']}" id="dr{$reply['id']}"><i
                                                                class="glyphicon glyphicon-trash"></i> </a> &nbsp;

                                                    {if $reply['reply_type'] eq 'internal'} <a href="#" class="btn btn-primary btn-xs no-shadow reply_make_public"
                                                                                            data-toggle="tooltip" data-placement="top" title=""
                                                                                            data-original-title="{$_L['Public']}" id="rp{$reply['id']}"><i
                                                                class="fa fa-globe"></i> </a> {/if}

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
                            <span class="bg-green" id="section_add_reply">
                            Add Reply
                            </span>
                                    </li>
                                    <li>
                                        {if $user['img'] eq ''}
                                            <img class="img-time-line" src="{$app_url}ui/lib/imgs/default-user-avatar.png" alt="">
                                        {else}
                                            <img src="{$user['img']}" class="img-time-line" alt="{$user['account']}">
                                        {/if}

                                        <div class="timeline-item">


                                            <div class="timeline-body">
                                                <form class="form-horizontal push-10-t push-10" method="post">

                                                    <ul class="nav nav-pills">
                                                        <li class="active" id="reply_public"><a href="#">Public</a></li>
                                                        <li id="reply_internal"><a href="#">Internal</a></li>

                                                    </ul>

                                                    <div class="form-group">
                                                        <div class="col-xs-12">

                                                        <textarea id="content" class="form-control sysedit"
                                                                name="content"></textarea>
                                                            <div class="help-block">
                                                                <a data-toggle="modal" href="#modal_add_item"><i
                                                                            class="fa fa-paperclip"></i> Attach File</a>
                                                                | <a data-toggle="modal" href="#modal_predefined_replies"><i
                                                                            class="fa fa-align-left"></i> Predefined reply</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {*<div class="form-group">*}
                                                    {*<div class="col-xs-12">*}
                                                    {*<label for="exampleInputPassword1">Status</label>*}
                                                    {*<select class="form-control">*}
                                                    {*<option>Closed</option>*}
                                                    {*<option>Pending</option>*}
                                                    {*<option>Active</option>*}
                                                    {*</select>*}
                                                    {*</div>*}
                                                    {*</div>*}


                                                    <div class="form-group">
                                                        <div class="col-xs-12">

                                                            <input type="hidden" name="attachments" id="attachments" value="">
                                                            <input type="hidden" name="f_tid" id="f_tid" value="{$d->id}">
                                                            <input type="hidden" name="cid" id="cid" value="{$d->userid}">

                                                            <button class="btn btn-primary" id="ib_form_submit" type="submit"><i
                                                                        class="fa fa-send push-5-r"></i> Submit
                                                            </button>
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
                                <!-- /.col -->
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

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
                            <h3><i class="fa fa-cloud-upload"></i> Drop File Here</h3>
                            <br/>
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


    <div id="modal_predefined_replies" class="modal fade" tabindex="-1" data-width="800" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Predefined replies</h4>
        </div>
        <div class="modal-body">
            <div class="row">


                <div class="col-md-12">

                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input type="text" name="name" id="foo_filter" class="form-control" placeholder="{$_L['Search']}..."/>

                                </div>
                            </div>

                        </div>
                    </form>

                    <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
                        <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $predefined_replies as $predefined_replie}
                            <tr>
                                <td><a href="javascript:;" onclick="setPreDefinedContent(event,'{$predefined_replie->id}');">{$predefined_replie->title}</a> </td>
                            </tr>
                        {/foreach}

                        </tbody>

                        <tfoot>
                        <tr>
                            <td>
                                <ul class="pagination">
                                </ul>
                            </td>
                        </tr>
                        </tfoot>

                    </table>
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
                            <input type="text" class="form-control" id="doc_title" name="doc_title"
                                onfocusout="check_title()">
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
                    <span id="fileuplod_error_msg" style="display:block; color:red; display:none"><i
                            class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select file </span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="file_link" id="file_link" value="">
            <input type="hidden" name="file_tid" id="file_tid" value="{$d->id}">
            <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>
            <button type="button" id="btn_add_file" class="btn btn-primary">{$_L['Submit']}</button>
        </div>

    </div>


{/block}

{block name="script"}

    <script type="text/javascript" src="{$app_url}ui/lib/footable/js/footable.all.min.js"></script>
    <script src="{$app_url}ui/lib/easytimer.min.js"></script>
    <script type="text/javascript" src="{$app_url}ui/lib/s2/js/select2.min.js"></script>


    <script>

        Dropzone.autoDiscover = false;
        $(function() {

            var _url = $("#_url").val();

            var $ib_form_submit = $("#ib_form_submit");

            var $create_ticket = $("#create_ticket");

            $('.footable').footable();
            ib_editor("#content",200);

            var $modal = $('#ajax-modal');

            var reply_type = 'public';


            var upload_resp;


            var ib_file = new Dropzone("#upload_container",
                {
                    url: _url + "tickets/client/upload_file/",
                    maxFiles: 10,
                    accpetedFiles: "image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                }
            );

            ib_file.on("sending", function() {

                $ib_form_submit.prop('disabled', true);

            });


            // Ticket convert to invoice

            $('#convertToInvoice').on('click',function (e) {
                e.preventDefault();

                bootbox.confirm('Are you sure?', function (yes) {
                    if(yes)
                        {
                            window.location = '{$_url}invoices/create-from-ticket/{$d->id}';
                        }
                });

            });


            ib_file.on("success", function(file,response) {

                $ib_form_submit.prop('disabled', false);

                upload_resp = response;

                if(upload_resp.success == 'Yes'){

                    toastr.success(upload_resp.msg);
                    // $file_link.val(upload_resp.file);
                    // files.push(upload_resp.file);
                    //
                    // console.log(files);

                    $('#attachments').val(function(i,val) {
                        return val + (!val ? '' : ',') + upload_resp.file;
                    });


                }
                else{
                    toastr.error(upload_resp.msg);
                }

            });



            $ib_form_submit.on('click', function(e) {
                e.preventDefault();
                $create_ticket.block({ message: block_msg });
                $.post( _url + "tickets/admin/add_reply/", {  message: tinyMCE.activeEditor.getContent(), reply_type: reply_type, attachments: $("#attachments").val(), f_tid: $("#f_tid").val()} )
                    .done(function( data ) {

                        if(data.success == "Yes"){
                            location.reload();
                        }

                        else {
                            $create_ticket.unblock();
                            toastr.error(data.msg);
                        }

                    });


            });


            //

            $('#fileuplod_error_msg').hide();
            $('#filetitle_error_msg').hide();

            var fileupload_resp;
            var $btn_add_file = $('#btn_add_file');
            var $fileupload_form = $('#fileupload_form');


            var ib_file_upload = new Dropzone("#fileupload_container",
                {
                    url: _url + "tickets/client/upload_file/",
                    maxFiles: 10,
                    accpetedFiles:
                        "image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                }
            );

            ib_file_upload.on("sending", function () {

                $btn_add_file.prop('disabled', true);

            });

            ib_file_upload.on("success", function (file, response) {

                $btn_add_file.prop('disabled', false);

                fileupload_resp = response;

                if (fileupload_resp.success == 'Yes') {

                    toastr.success(fileupload_resp.msg);
                    // $file_link.val(upload_resp.file);
                    // files.push(upload_resp.file);
                    //
                    // console.log(files);

                    $('#file_link').val(function (i, val) {
                        return val + (!val ? '' : ',') + fileupload_resp.file;
                    });

                    $('#fileuplod_error_msg').hide();


                }
                else {
                    toastr.error(upload_resp.msg);
                }
            });



            $btn_add_file.on('click', function (e) {
                e.preventDefault();

                if ($('#file_link').val() != '' && $('#doc_title').val() != '') {
                    $fileupload_form.block({ message: block_msg });
                    $.post(_url + "tickets/admin/add_reply/", { message: $('#doc_title').val(), reply_type:reply_type, attachments: $('#file_link').val(), f_tid: $("#file_tid").val() })
                        .done(function (data) {

                            if (data.success == "Yes") {
                                location.reload();
                            }

                            else {
                                $create_ticket.unblock();
                                toastr.error(data.msg);
                            }

                        });

                } else {
                    if ($('#file_link').val() == '') {
                        $('#fileuplod_error_msg').show();
                    }

                    if ($('#doc_title').val() == '') {
                        $('#filetitle_error_msg').show();
                    }
                }


            });


            // End of fileuplaod         


            $("#add_reply").on('click', function(e) {
                e.preventDefault();

                $('html, body').animate({
                    scrollTop: $("#section_add_reply").offset().top - 60
                }, 500);

                tinyMCE.activeEditor.focus();

            });

            $('#notes').redactor(
                {
                    minHeight: 150, // pixels
                    plugins: ['fontcolor']
                }
            );

            $("#btn_save_note").on('click', function(e) {
                e.preventDefault();

                $('#t_options').block({ message: null });

                $.post(base_url + 'tickets/admin/save_note', {
                    tid: $('#tid').val(),

                    notes: $('#notes').val()

                })
                    .done(function () {
                        toastr.success(_L['Saved Successfully']);
                        $('#t_options').unblock();

                    });

            });

            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        window.location.href = base_url + "tickets/admin/delete/" + id;
                    }
                });
            });


            $(".t_edit").click(function (e) {
                e.preventDefault();
                var id = this.id;

                $('body').modalmanager('loading');


                $modal.load( base_url + 'tickets/admin/edit_modal/'+id, '', function(){

                    $modal.modal();

                    ib_editor("#edit_content",300,true,false);

                });
            });


            $(".reply_edit").click(function (e) {
                e.preventDefault();
                var id = this.id;

                $('body').modalmanager('loading');


                $modal.load( base_url + 'tickets/admin/edit_modal/'+id+'/reply', '', function(){

                    $modal.modal();

                    ib_editor("#edit_content",300,true,false);

                });
            });


            $(".c_view").click(function (e) {
                e.preventDefault();
                var id = this.id;

                $('body').modalmanager('loading');

                $modal.load( base_url + 'tickets/admin/view_modal/'+id, '', function(){

                    $modal.modal();

                });
            });


            $('[data-toggle="tooltip"]').tooltip();

            $modal.on('hidden.bs.modal', function () {
                location.reload();
            });

            $modal.on('click', '.update_ticket_message', function(e){

                e.preventDefault();

                $modal.modal('loading');

                $.post( _url + "tickets/admin/edit_modal_post/", {
                    tid: $('#edit_tid').val(),
                    type: $('#edit_type').val(),
                    message: tinyMCE.activeEditor.getContent()

                })
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
                        }

                    });

            });


            $(".reply_delete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        window.location.href = base_url + "tickets/admin/delete_reply/" + id;
                    }
                });
            });




            {literal}

            $("#editable_cc").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_cc',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $("#editable_bcc").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_bcc',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $("#editable_email").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_email',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $("#editable_phone").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_phone',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $("#editable_hour").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_hour',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });

            $("#editable_minute").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_minute',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $("#editable_department").on("change",function(e){
                $.post(base_url + 'tickets/admin/update_department',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $('#editable_assigned_to').select2({
                theme: "bootstrap",
            })
                .on("change", function (e) {

                    $.post(base_url + 'tickets/admin/update_assigned_to',{id: tid, value: $("#editable_assigned_to option:selected").val()},function (data) {
                        if ($.isNumeric(data)) {

                            toastr.success(_L['Saved Successfully']);

                        }

                        else {

                            toastr.error(data);
                        }
                    })
                });


            // $("#editable_assigned_to").on("change",function(e){
            //
            // });

            $("#editable_status").on("change",function(e){
                $.post(base_url + 'tickets/admin/update_status',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                        $("#inline_status").html($("#editable_status option:selected").text());

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });

            {/literal}



            var $reply_public = $("#reply_public");
            var $reply_internal = $("#reply_internal");


            $reply_public.click(function (e) {
                e.preventDefault();
                $(this).addClass('active');
                $reply_internal.removeClass('active');
                reply_type = 'public';
                tinymce.activeEditor.getBody().style.backgroundColor = '#FFFFFF';
            });


            $reply_internal.click(function (e) {
                e.preventDefault();
                $(this).addClass('active');
                $reply_public.removeClass('active');
                reply_type = 'internal';
                tinymce.activeEditor.getBody().style.backgroundColor = '#FFF6D9';
            });


            $(".reply_make_public").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        window.location.href = base_url + "tickets/admin/reply_make_public/" + id;
                    }
                });
            });

            function loadTasks() {

                $("#tasks_list").html(block_msg);

                $.get( base_url + "tickets/admin/tasks_list/"+tid, function( data ) {

                    $("#tasks_list").html(data);

                    $('.i-checks').iCheck({
                        checkboxClass: 'icheckbox_square-blue',
                        radioClass: 'icheckbox_square-blue',
                        increaseArea: '20%' // optional
                    });

                    $('.i-checks').on('ifChanged', function (event) {

                        var i_check_id = $(this)[0].id;

                        if($(this).iCheck('update')[0].checked){

                            $.get(base_url + 'tickets/admin/set_task_completed/'+i_check_id,function () {
                                loadTasks();
                            });

                        }
                        else{

                            $.get(base_url + 'tickets/admin/set_task_not_started/'+i_check_id,function () {
                                loadTasks();
                            });

                        }

                    });

                });
            }


            loadTasks();


            $("#btn_add_task").click(function (e) {
                e.preventDefault();



                if($("#task_subject").val() == ''){

                    $("#task_subject").focus();

                }

                else {

                    $("#btn_add_task").prop('disabled', true);

                    $.post( base_url + "tasks/post/", { title: $("#task_subject").val(), rel_type: 'Ticket', tid: tid, rel_id: tid, cid: {$ticket->userid}, priority: '{$ticket->urgency}' })
                        .done(function( data ) {

                            $("#btn_add_task").prop('disabled', false);

                            if ($.isNumeric(data)) {

                                $("#task_subject").val('');

                                loadTasks();

                            }
                            else{
                                toastr.error(data);
                            }

                        });

                }
            });

            var task_id;

            function has_selected_task_items() {
                if($('.selected').length > 0){

                    $("#tasks_tools").show(200);

                }
                else{
                    $("#tasks_tools").hide(200);
                }
            }

            $("#tasks_list").on('click', '.task_item', function () {

                task_id = this.id;



                if($("#" + task_id).hasClass('selected')){
                    $("#" + task_id).removeClass('selected');
                }
                else{
                    $("#" + task_id).addClass('selected');
                }

                has_selected_task_items();


                // alert(task_id);


            });

            $("#btn_mark_tasks_completed").on('click',function (e) {
                e.preventDefault();
                var arrayOfIds = $.map($(".selected"), function(n, i){
                    return n.id;
                });

                $("#btn_mark_tasks_completed").prop('disabled', true);

                $.post( base_url + "tickets/admin/do_task/", { action: 'completed', ids: arrayOfIds })
                    .done(function( data ) {

                        $("#btn_mark_tasks_completed").prop('disabled', false);

                        loadTasks();

                        $("#tasks_tools").hide(200);

                    });

            });


            $("#btn_mark_tasks_not_started").on('click',function (e) {
                e.preventDefault();
                var arrayOfIds = $.map($(".selected"), function(n, i){
                    return n.id;
                });

                $("#btn_mark_tasks_completed").prop('disabled', true);

                $.post( base_url + "tickets/admin/do_task/", { action: 'not_started', ids: arrayOfIds })
                    .done(function( data ) {

                        $("#btn_mark_tasks_completed").prop('disabled', false);

                        loadTasks();

                        $("#tasks_tools").hide(200);

                    });

            });


            $("#btn_delete_tasks").on('click',function (e) {
                e.preventDefault();

                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        var arrayOfIds = $.map($(".selected"), function(n, i){
                            return n.id;
                        });

                        $("#btn_delete_tasks").prop('disabled', true);

                        $.post( base_url + "tickets/admin/do_task/", { action: 'delete', ids: arrayOfIds })
                            .done(function( data ) {

                                $("#btn_delete_tasks").prop('disabled', false);

                                loadTasks();

                                $("#tasks_tools").hide(200);

                            });
                    }
                });



            });




            var timer = new Timer();
            var processing = false;

            $('#startButton').click(function () {
                timer.start({
                    startValues: [0,{$timeSpent},0,0,0]
                });
            });

            $('#pauseButton').click(function () {
                timer.pause();
                if(processing === false)
                {
                    processing = true;
                    $.post( base_url + "tickets/admin/log_time", { total_time: timer.getTimeValues().toString(), ticket_id: '{$ticket->id}' })
                        .done(function( data ) {
                            processing = false;
                        });
                }
            });



            var $i = 0;

            timer.addEventListener('secondsUpdated', function (e) {
                $('#timeSpent').html(timer.getTimeValues().toString());

                $i++;

                if($i>10 && processing === false)
                    {
                      //  console.log(timer.getTimeValues());
                        processing = true;
                        $.post( base_url + "tickets/admin/log_time", { total_time: timer.getTimeValues().toString(), ticket_id: '{$ticket->id}' })
                            .done(function( data ) {
                                processing = false;
                                $i = 0;
                            });
                    }

            });

            timer.addEventListener('started', function (e) {
                $('#timeSpent').html(timer.getTimeValues().toString());
            });





        });

        function setPreDefinedContent(event,predefined_reply_id) {

            $('#modal_predefined_replies').modal('hide');

            $.get( "{$_url}tickets/admin/get-predefined-reply/" + predefined_reply_id, function( data ) {
                tinyMCE.activeEditor.setContent(data);
            });


        }

        var check_title = function () {
            if ($('#doc_title').val() == '') {
                $('#filetitle_error_msg').show();
            } else {
                $('#filetitle_error_msg').hide();
            }
        }

    </script>
{/block}