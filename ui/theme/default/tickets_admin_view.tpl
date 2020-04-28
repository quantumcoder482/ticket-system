{extends file="$layouts_admin"}

{block name="style"}
<link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/s2/css/select2.min.css" />
<link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/footable/css/footable.core.min.css" />
<style type="text/css">
    @media only screen and (max-width: 860px){
        #details .label{
            display: inline-block;
            margin-bottom: 20px;
        }
    }
    hr {
        clear: both;
    }
    #modal_review label{
        font-weight: normal;
        font-size: 14px;
    }
    #modal_review textarea{
        width: 100%;
    }
</style>
{/block}

{block name="content"}

<div class="row">
    <div class="col-md-12">
        <a href="{$_url}tickets/admin/list/" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">
            <i class="fa fa-long-arrow-left"></i> Back to the List</a>


        <div class="panel panel-default" id="t_options">

            <div class="panel-body">
                <div style="float:left; margin-right: 10px"><h3>ID: {$d->tid} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="submission_title">{$d->subject}</span></h3></div>
                {if $user['user_type'] eq 'Admin'}
                    <a data-toggle="modal" href="#modal_change_title" id="edit_title"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                {/if}
                <hr>
                <ul class="nav nav-tabs">
                    {if $user['user_type'] eq 'Reviewer'}
                        <li><a data-toggle="tab" href="#uploads"><i class="fa fa-upload"></i> Uploads</a></li>
                        <li class="active"><a data-toggle="tab" href="#downloads"><i class="fa fa-download"></i> Downloads</a></li>
                        <li><a data-toggle="tab" href="#comments"><i class="fa fa-comments"></i> Comments</a></li>
                        <li style="display:none !important"><a data-toggle="tab" href="#inactivated">In-activated</a></li>
                    {else}
                    <li class="active"><a data-toggle="tab" href="#details"><i class="fa fa-th"></i> Details</a></li>
                    <li><a data-toggle="tab" href="#tasks"><i class="fa fa-tasks"></i> Tasks</a></li>
                    <li><a data-toggle="tab" href="#uploads"><i class="fa fa-upload"></i> Uploads</a></li>
                    <li><a data-toggle="tab" href="#downloads"><i class="fa fa-download"></i> Downloads</a></li>
                    <li><a data-toggle="tab" href="#comments"><i class="fa fa-comments"></i> Comments</a></li>
                    {/if}
                </ul>

                <div class="tab-content">
                    <div id="details" class="tab-pane fade in active ib-tab-box">
                       
                        <p></p>
                        <div class="col-md-6 col-xs-12" style="float:left; padding: 5px 15px">
                            <span class="label label-default"> {$_L['Priority']}: <span
                                    id='priority_status'>{$d->urgency}</span> </span> &nbsp;

                            {if $d->status eq 'New' || $d->status eq 'Accepted' || $d->status eq 'Published' || $d->status
                            eq 'Under Layout Editing' || $d->status eq 'Under Galley Correction'}

                                <span class="label label-success" style="font-size: 2rem; border-radius: 99999px">
                                    <span id="inline_status">{$d->status}</span>
                                </span>

                            {elseif $d->status eq 'In Progress' || $d->status eq 'Awaiting Publication' || $d->status eq
                            'Under Plagiarism Check' || $d->status eq 'Under Peer-Review'}

                                <span class="label label-primary" style="font-size: 2rem; border-radius: 99999px">
                                    <span id="inline_status">{$d->status}</span>
                                </span>

                            {elseif $d->status eq 'Rejected' || $d->status eq 'Withdrawn'}

                                <span class="label label-danger" style="font-size: 2rem; border-radius: 99999px">
                                    <span id="inline_status">{$d->status}</span>
                                </span>

                            {elseif $d->status eq 'Scheduled for Current Issue' || $d->status eq 'Scheduled for Next Issue'
                            || $d->status eq 'Scheduled for Special Issue'}

                                <span class="label label-warning" style="font-size: 2rem; border-radius: 99999px">
                                    <span id="inline_status">{$d->status}</span>
                                </span>

                            {else}

                                <span class="label label-success" style="font-size: 2rem; border-radius: 99999px">
                                    <span id="inline_status">{$d->status}</span>
                                </span>

                            {/if}
                        </div>
                        <div class="col-md-6 col-xs-12" style="font-weight: 600; font-size: 1.5rem; padding: 5px 15px; margin-bottom: 15px;">Payment Status: &nbsp;&nbsp;&nbsp;
                            {if $d->payment_status eq '' || $d->payment_status eq 'Not generated'}
                                <span id="payment_status" class="label-primary" style="border:0">Not generated</span>
                            {elseif $d->payment_status eq 'Paid'}
                                <span id="payment_status" class="label-success" style="border:0">Paid</span>
                            {elseif $d->payment_status eq 'Unpaid'}
                                <span id="payment_status" class="label-danger" style="border:0">Unpaid</span>
                            {/if}
                        </div>

                        <hr>
                        <div class="col-md-12 col-xs-12" style="clear:both; padding:15px;">
                            <p><strong>Submission ID:</strong> {$d->tid}</p>
                            <p><strong>Author:</strong> <a href="{$_url}contacts/view/{$d->userid}">{$d->account}</a></p>
                            <p><strong>Received on:</strong> {$d->created_at}</p>
                            <p><strong>Updated on:</strong> {$d->updated_at}</p>
                        </div>
                        <hr>


                        <div class="form-group">
                            <div class="col-md-4 col-xs-12">
                                <div class="form-material floating">
                                    <select class="form-control" id="priority" name="priority"  style="margin-bottom:20px">
                                        <option value="Normal" {if $d->urgency eq 'Normal'} selected {/if}>Normal
                                        </option>
                                        <option value="Fast" {if $d->urgency eq 'Fast'} selected {/if}>Fast
                                        </option>
                                    </select>
                                    <label for="priority">{$_L['Priority']}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-xs-12">
                                <div class="form-material floating">
                                    <select class="form-control" id="processing_for" name="processing_for"  style="margin-bottom:20px">
                                        <option value="Not Scheduled" {if $d->processing_for eq 'Not Scheduled'} selected {/if}>Not Scheduled
                                        </option>
                                        <option value="Current Issue" {if $d->processing_for eq 'Current Issue'} selected {/if}>Current Issue
                                        </option>
                                        <option value="Next Issue" {if $d->processing_for eq 'Next Issue'} selected {/if}>Next Issue
                                        </option>
                                        <option value="Special Issue" {if $d->processing_for eq 'Special Issue'} selected {/if}>Special Issue
                                        </option>
                                    </select>
                                    <label for="processing_for">Processing For</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-xs-12">
                                <div class="form-material floating">
                                    <select class="form-control" id="payment" name="payment"  style="margin-bottom:20px">
                                        <option value="Not generated" {if $d->payment_status eq 'Not generated'} selected {/if}>Not generated
                                        </option>
                                        <option value="Paid" {if $d->payment_status eq 'Paid'} selected {/if}>Paid
                                        </option>
                                        <option value="Unpaid" {if $d->payment_status eq 'Unpaid'} selected {/if}>Unpaid
                                        </option>
                                    </select>
                                    <label for="payment">Payment Status</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-xs-12">
                                <div class="form-material floating">
                                    <select class="form-control" id="editable_department" name="editable_department"  style="margin-bottom:20px">
                                        <option value="">None</option>
                                        {foreach $departments as $dep}
                                            <option value="{$dep['id']}" {if $department eq $dep['dname']} selected{/if}>{$dep['dname']} </option>
                                            {/foreach} 
                                    </select> 
                                    <label for="editable_department">{$_L['Department']}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                           <div class="col-md-4 col-xs-12">
                               <div class="form-material floating">
                                   <select class="form-control" id="assigned_reviewer" name="assigned_reviewer"  style="margin-bottom:20px">
                                       <option value="None">None</option>
                                       {foreach $reviewers as $reviewer}
                                           <option value="{$reviewer['id']}" {if $d->rid eq $reviewer['id']}
                                           selected{/if}>{$reviewer['fullname']} </option>
                                       {/foreach}
                                   </select>
                                   <label for="assigned_reviewer">Assigned Reviewer</label>
                               </div>
                           </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-material floating">
                                    <select class="form-control" name="ttype" id="ttype"  style="margin-bottom:20px">
                                        <option value="Original Article" {if $d->ttype eq 'Original Article'} selected
                                            {/if}>Original Article</option>
                                        <option value="Review Article" {if $d->ttype eq 'Review Article'} selected
                                            {/if}>Review Article</option>
                                        <option value="Short Communication" {if $d->ttype eq 'Short Communication'}
                                            selected {/if}>Short Communication</option>
                                        <option value="Case Report" {if $d->ttype eq 'Case Report'} selected {/if}>Case
                                            Report</option>
                                        <option value="Editorial Note" {if $d->ttype eq 'Editorial Note'} selected
                                            {/if}>Editorial Note</option>
                                    </select>
                                    <label for="ttype">Type of Submission</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-material floating">
                                    <select class="form-control" id="editable_assigned_to" name="editable_assigned_to"  style="margin-bottom:20px">
                                        <option value="None">None</option>
                                        {foreach $ads as $ad}
                                        <option value="{$ad['id']}" {if $d->aid eq $ad['id']}
                                            selected{/if}>{$ad['fullname']} </option>
                                        {/foreach}
                                    </select>
                                    <label for="editable_assigned_to">Assigned to</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-material floating">
                                    <select class="form-control" id="editable_status" name="editable_status"  style="margin-bottom:20px">
                                        <option value="New" {if $d->status eq 'New'} selected{/if}>New</option>
                                        <option value="In Progress" {if $d->status eq 'In Progress'}
                                            selected{/if}>In Progress</option>
                                        <option value="Under Plagiarism Check" {if $d->status eq 'Under Plagiarism Check'}
                                            selected{/if}>Under Plagiarism Check</option>
                                        <option value="Under Peer-Review" {if $d->status eq 'Under Peer-Review'}
                                            selected{/if}>Under Peer-Review</option>
                                        <option value="Accepted" {if $d->status eq 'Accepted'}
                                            selected{/if}>Accepted</option>
                                        <option value="Under Proofreading" {if $d->status eq 'Under Proofreading'}
                                        selected{/if}>Under Proofreading</option>
                                        <option value="Under Layout Editing" {if $d->status eq 'Under Layout Editing'}
                                            selected{/if}>Under Layout Editing</option>
                                        <option value="Under Galley Correction" {if $d->status eq 'Under Galley Correction'}
                                            selected{/if}>Under Galley Correction</option>
                                        <option value="Scheduled for Current Issue" {if $d->status eq 'Scheduled for Current Issue'}
                                            selected{/if}>Scheduled for Current Issue</option>
                                        <option value="Scheduled for Next Issue" {if $d->status eq 'Scheduled for Next Issue'}
                                            selected{/if}>Scheduled for Next Issue</option>
                                        <option value="Scheduled for Special Issue" {if $d->status eq 'Scheduled for Special Issue'}
                                            selected{/if}>Scheduled for Special Issue</option>
                                        <option value="Published" {if $d->status eq 'Published'}
                                            selected{/if}>Published</option>
                                        <option value="Rejected" {if $d->status eq 'Rejected'}
                                            selected{/if}>Rejected</option>
                                        <option value="Withdrawn" {if $d->status eq 'Withdrawn'}
                                            selected{/if}>Withdrawn</option>
                                        <option value="Awaiting Publication" {if $d->status eq 'Awaiting Publication'}
                                            selected{/if}>Awaiting Publication</option>

                                    </select>
                                    <label for="editable_status">Status</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group"  style="margin-bottom:20px">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-material floating">
                                    <select class="form-control" id="activation" name="activation"  style="margin-bottom:20px">
                                        <option value="Active" {if $d->activation eq 'Active'} selected {/if}>Active
                                        </option>
                                        <option value="InActive" {if $d->activation eq 'InActive'} selected {/if}>InActive
                                        </option>
                                    </select>
                                    <label for="activation">Submission</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="editable_email" name="editable_email"
                                        value="{$d->email}">
                                    <label for="editable_cc">Email</label>

                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="editable_phone" name="editable_phone"
                                        value="{if $c}{$c->phone}{/if}">
                                    <label for="editable_phone">Phone</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="editable_bcc" name="editable_bcc"
                                        value="{$d->bcc}">
                                    <label for="editable_bcc">BCC</label>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="editable_cc" name="editable_cc"
                                        value="{$d->cc}">
                                    <label for="editable_cc">CC</label>

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

                                    <button type="submit" id="btn_save_note"
                                        class="btn btn-primary">{$_L['Save']}</button>

                                </form>
                            </div>
                        </div>


                        <hr>

                        <h4>Other Submissions</h4>

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
                                            <a href="{$_url}tickets/admin/view/{$o_ticket['id']}">{$o_ticket['subject']}</a>
                                        </p>

                                        {if $o_ticket['status'] eq 'New' || $o_ticket['status'] eq 'Accepted' || $o_ticket['status'] eq 'Published' }

                                            <span class="label label-success inline-block"> {$_L['Status']}: {$o_ticket['status']}</span> &nbsp;

                                        {elseif $o_ticket['status'] eq 'In Progress' || $o_ticket['status'] eq 'Awaiting Publication'}

                                            <span class="label label-primary inline-block"> {$_L['Status']}: {$o_ticket['status']}</span> &nbsp;

                                        {elseif $o_ticket['status'] eq 'Rejected' || $o_ticket['status'] eq 'Withdrawn'}

                                            <span class="label label-danger inline-block"> {$_L['Status']}: {$o_ticket['status']}</span> &nbsp;

                                        {else}

                                            <span class="label label-default inline-block"> {$_L['Status']}: {$o_ticket['status']}</span> &nbsp;

                                        {/if}

                                        <span class="label label-default inline-block"> {$_L['Priority']}: {$o_ticket['urgency']}</span> &nbsp;

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

                                </div>
                            </div>
                        </form>

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
                                    <p>1. Plagiarism Check</p>
                                    <p>2. Peer-Review</p>
                                    <p>3. Proofreading</p>
                                    <p>4. Layout Editing</p>
                                    <p>5. Galley Correction</p>
                                    <p>6. Publishing</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">

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
                                                    <article class="kanban-entry cursor-move" id="item_{$tns['id']}"
                                                        draggable="true">
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



                                                                        <img src="{getAdminImage($tns['aid'])}"
                                                                            class="img-circle"
                                                                            style="max-width: 30px; margin-bottom: 5px;"
                                                                            alt="{$tns['created_by']}">
                                                                        {$tns['created_by']}


                                                                    </div>


                                                                    <div class="col-md-12">

                                                                        <small>{$_L['Created']}: <span
                                                                                class="mmnt">{strtotime({$tns['created_at']})}</span></small>
                                                                        <br>
                                                                        <small>{$_L['Due Date']}: {date(
                                                                            $config['df'],
                                                                            strtotime($tns['due_date']))}</small>

                                                                        {if isset($tns['priority'])}
                                                                        <br>
                                                                        {if strtolower($tns['priority']) ==
                                                                        'critical' ||
                                                                        strtolower($tns['priority']) == 'high'}
                                                                        <span
                                                                            class="label label-danger">{$tns['priority']}</span>
                                                                        {else}
                                                                        <span
                                                                            class="label label-info">{$tns['priority']}</span>
                                                                        {/if}

                                                                        {/if}
                                                                        {*<br>*}
                                                                        {*<a href="javascript:void(0)" class="c_delete"
                                                                            id="d_{$tns['id']}"><i
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
                                                    <article class="kanban-entry cursor-move" id="item_{$tns['id']}"
                                                        draggable="true">
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
                                                                        <img src="{getAdminImage($tns['aid'])}"
                                                                            class="img-circle"
                                                                            style="max-width: 30px; margin-bottom: 5px;"
                                                                            alt="{$tns['created_by']}">
                                                                        {$tns['created_by']}


                                                                    </div>


                                                                    <div class="col-md-12">

                                                                        <small
                                                                            class="mmnt">{strtotime({$tns['created_at']})}</small>

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
                                                    <article class="kanban-entry cursor-move" id="item_{$tns['id']}"
                                                        draggable="true">
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
                                                                        <img src="{getAdminImage($tns['aid'])}"
                                                                            class="img-circle"
                                                                            style="max-width: 30px; margin-bottom: 5px;"
                                                                            alt="{$tns['created_by']}">
                                                                        {$tns['created_by']}


                                                                    </div>


                                                                    <div class="col-md-12">

                                                                        <small
                                                                            class="mmnt">{strtotime({$tns['created_at']})}</small>
                                                                        {*<br>*}
                                                                        {*<a href="javascript:void(0)" class="c_delete"
                                                                            id="d_{$tns['id']}"><i
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
                                                    <article class="kanban-entry cursor-move" id="item_{$tns['id']}"
                                                        draggable="true">
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
                                                                        <img src="{getAdminImage($tns['aid'])}"
                                                                            class="img-circle"
                                                                            style="max-width: 30px; margin-bottom: 5px;"
                                                                            alt="{$tns['created_by']}">
                                                                        {$tns['created_by']}


                                                                    </div>


                                                                    <div class="col-md-12">

                                                                        <small
                                                                            class="mmnt">{strtotime({$tns['created_at']})}</small>
                                                                        {*<br>*}
                                                                        {*<a href="javascript:void(0)" class="c_delete"
                                                                            id="d_{$tns['id']}"><i
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

                                        <div class="panel panel-grey kanban-col"
                                            style="border-right: 1px solid #ffffff;">
                                            <div class="panel-heading">

                                                Waiting on editor approval

                                            </div>
                                            <div class="panel-body">
                                                <div id="waiting_on_someone"
                                                    class="kanban-centered kanban-droppable-area">


                                                    {foreach $tasks_waiting as $tns}
                                                    <article class="kanban-entry cursor-move" id="item_{$tns['id']}"
                                                        draggable="true">
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
                                                                        <img src="{getAdminImage($tns['aid'])}"
                                                                            class="img-circle"
                                                                            style="max-width: 30px; margin-bottom: 5px;"
                                                                            alt="{$tns['created_by']}">
                                                                        {$tns['created_by']}


                                                                    </div>


                                                                    <div class="col-md-12">

                                                                        <small
                                                                            class="mmnt">{strtotime({$tns['created_at']})}</small>
                                                                        {*<br>*}
                                                                        {*<a href="javascript:void(0)" class="c_delete"
                                                                            id="d_{$tns['id']}"><i
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

                                            <a data-toggle="modal" href="#modal_internal_upload_file"
                                                class="btn btn-primary upload_file waves-effect waves-light" style="margin-left: 20px"
                                                id="internal_upload_file"><i class="fa fa-plus"></i> Internal Upload File</a>

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
                                                        <th width="200px" data-sort-ignore="true">{$_L['Created At']} </th>
                                                        <th class="text-center" data-sort-ignore="true" width="100px;">
                                                            {$_L['Manage']}
                                                        </th>
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
                                                            <a href="{$attachment_path}{$at['attachment']}"
                                                                class="btn btn-success btn-xs" target="_blank"><i
                                                                    class="fa fa-search"></i> </a>
                                                            <!-- <a href="{$_url}client/tickets/download/{$at['id']}/{$at['attachment']}" class="btn btn-success btn-xs"><i class="fa fa-download"></i> </a> -->
                                                            <a href="#" class="btn btn-danger btn-xs reply_delete"
                                                                id="{$at['id']}"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></a>

                                                        </td>
                                                    </tr>

                                                    {/foreach}

                                                    {foreach $internal_files as $at}

                                                    <tr style="background-color: #FFF6D9;">

                                                        <td style="text-align:center;">
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
                                                            <a href="{$attachment_path}{$at['attachment']}"
                                                                class="btn btn-success btn-xs" target="_blank"><i
                                                                    class="fa fa-search"></i> </a>
                                                            <!-- <a href="{$_url}client/tickets/download/{$at['id']}/{$at['attachment']}" class="btn btn-success btn-xs"><i class="fa fa-download"></i> </a> -->
                                                            <a href="#" class="btn btn-danger btn-xs reply_delete"
                                                                id="{$at['id']}"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="#" class="btn btn-primary btn-xs reply_make_public" data-toggle="tooltip" data-placement="top" title=""
                                                               data-original-title="{$_L['Public']}" id="rp{$at['id']}"><i class="fa fa-globe" aria-hidden="true"></i></a>
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
                            {if $user['user_type'] eq 'Admin'}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <a data-toggle="modal" href="#modal_admin_attach_file"
                                                class="btn btn-primary upload_file waves-effect waves-light"
                                                id="admin_attach_file"><i class="fa fa-plus"></i> {$_L['New File Upload']}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {/if}
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
                                                            <a href="{$attachment_path}{$at['attachment']}"
                                                                class="btn btn-success btn-xs" target="_blank"><i
                                                                    class="fa fa-search"></i></a>
                                                            <!-- <a href="{$_url}client/tickets/download/{$at['id']}/{$at['attachment']}" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a> -->
                                                            <a href="#" class="btn btn-danger btn-xs reply_delete"
                                                                id="{$at['id']}"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></a>
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
                                    <span class="">
                                        {$d->created_at}
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
                                    <img class="img-time-line" src="{$app_url}ui/lib/imgs/default-user-avatar.png"
                                        alt="">
                                    {else}
                                    <img src="{$user['img']}" class="img-time-line" alt="{$user['account']}">
                                    {/if}

                                    {elseif ($c)}

                                    {if $c->img eq 'gravatar'}
                                    <img src="http://www.gravatar.com/avatar/{($user['email'])|md5}?s=30"
                                        class="img-time-line" alt="{$user['fullname']}">
                                    {elseif $c->img eq ''}
                                    <img class="img-time-line" src="{$app_url}ui/lib/imgs/default-user-avatar.png"
                                        alt="">
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
                                            {if $user->user_type neq 'Reviewer'}
                                            <a href="#" class="btn btn-warning btn-xs t_edit" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="{$_L['Edit']}"
                                                id="et{$d->id}"><i class="glyphicon glyphicon-pencil"></i> </a>
                                            {/if}
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

                                        <h3 class="timeline-header"><a
                                                href="javascript:void(0)">{$reply['replied_by']}</a></h3>

                                        <div class="timeline-body"
                                            {if $reply['reply_type'] eq 'internal' } style="background: #FFF6D9;"
                                            {elseif $reply['reply_type'] eq 'review'}style="background: #BCCFF5;"
                                            {/if}> {$reply['message']} <hr>

                                            <a href="#" class="btn btn-warning btn-xs no-shadow reply_edit"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="{$_L['Edit']}" id="er{$reply['id']}"><i
                                                    class="glyphicon glyphicon-pencil"></i> </a> &nbsp;
                                            <a href="#" class="btn btn-danger btn-xs no-shadow reply_delete"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="{$_L['Delete']}" id="dr{$reply['id']}"><i
                                                    class="glyphicon glyphicon-trash"></i> </a> &nbsp;

                                            {if $user['user_type'] neq 'Reviewer' && ($reply['reply_type'] eq 'internal' || $reply['reply_type'] eq 'review')} <a href="#"
                                                class="btn btn-primary btn-xs no-shadow reply_make_public"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="{$_L['Public']}" id="rp{$reply['id']}"><i class="fa fa-globe"></i> </a> {/if}
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
                                    <img class="img-time-line" src="{$app_url}ui/lib/imgs/default-user-avatar.png"
                                        alt="">
                                    {else}
                                    <img src="{$user['img']}" class="img-time-line" alt="{$user['account']}">
                                    {/if}

                                    <div class="timeline-item">


                                        <div class="timeline-body">
                                            <form class="form-horizontal push-10-t push-10" method="post">

                                                <ul class="nav nav-pills">
                                                    {if $user['user_type'] eq 'Reviewer'}
                                                        <li class="active" id="reply_review"><a href="#">Review</a></li>
                                                    {else}
                                                        <li class="active" id="reply_public"><a href="#">Public</a></li>
                                                        <li id="reply_internal"><a href="#">Internal</a></li>
                                                        <li id="reply_review"><a href="#">Review</a></li>
                                                    {/if}
                                                </ul>

                                                <div class="form-group">
                                                    <div class="col-xs-12">

                                                        <textarea id="content" class="form-control sysedit" name="content"></textarea>
                                                        <div class="help-block">
                                                            <!-- <a data-toggle="modal" href="#modal_add_item"><i
                                                                            class="fa fa-paperclip"></i> Attach File</a> -->
                                                            {if $user['user_type'] eq 'Reviewer'}
                                                                <a data-toggle="modal" href="#modal_review"><i
                                                                            class="fa fa-align-left"></i> Review Form</a>
                                                            {else}
                                                                <a data-toggle="modal" href="#modal_predefined_replies"><i
                                                                    class="fa fa-align-left"></i> Predefined reply</a>&nbsp;&nbsp;
                                                                <a data-toggle="modal" href="#modal_review"><i
                                                                            class="fa fa-align-left"></i> Review Form</a>
                                                            {/if}
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

                                                        <input type="hidden" name="attachments" id="attachments"
                                                            value="">
                                                        <input type="hidden" name="f_tid" id="f_tid" value="{$d->id}">
                                                        <input type="hidden" name="cid" id="ccid" value="{$d->userid}">

                                                        <button class="btn btn-primary" id="ib_form_submit"
                                                            type="submit"><i class="fa fa-send push-5-r"></i> Submit
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

                    <div id="inactivated" class="tab-pane fade ib-tab-box">
                        <div class="row" style="background:#EEEEEF; padding:20px 20px">
                            This Submission inactivated now
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div id="modal_change_title" class="modal fade" tabindex="-1" data-width="600" style="display:none">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Change title</h4>
    </div>
    <div class="modal-body">
        <div class="col-md-12">
            <div class="form-group" style="margin-bottom:30px">
                <label for="modal_submission_title">Submission Title</label>
                <input type="text" class="form-control" id="modal_submission_title" name="modal_submission_title" value="{$d->subject}">
            </div>
            <div class="form-group" style="text-align:right">
                <button type="button" id="save_title" class="btn btn-primary">Save</button>
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

<div id="modal_predefined_replies" class="modal fade predefined" tabindex="-1" data-width="800" style="display: none;">
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
                                <input type="text" name="name" id="foo_filter" class="form-control"
                                    placeholder="{$_L['Search']}..." />

                            </div>
                        </div>

                    </div>
                </form>

                <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter"
                    data-page-size="50">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>

                        {foreach $predefined_replies as $predefined_replie}
                        <tr>
                            <td><a href="javascript:;"
                                    onclick="setPreDefinedContent(event,'{$predefined_replie->id}');">{$predefined_replie->title}</a>
                            </td>
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

<div id="modal_review" class="modal fade review" tabindex="-1" data-width="800" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Review Form</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" method="post" id="frm_review" name="frm_review" action="">
                    <div class="form-group">
                        <label class="col-md-8 " for="q1">Is the title suitable for its content?</label>
                        <div class="col-md-4">
                            <select id="q1" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q2">Is the abstract is informative, including main finding and significance?</label>
                        <div class="col-md-4">
                            <select id="q2" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q3">Is the introduction part contain sufficient?</label>
                        <div class="col-md-4">
                            <select id="q3" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q4"> Is the introduction part Informative?</label>
                        <div class="col-md-4">
                            <select id="q4" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q5">Are the materials and methods clear?</label>
                        <div class="col-md-4">
                            <select id="q5" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q6">Are the materials and methods adequate?</label>
                        <div class="col-md-4">
                            <select id="q6" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q7">Are the materials and methods ethical?</label>
                        <div class="col-md-4">
                            <select id="q7" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q8">Are the results efficient?</label>
                        <div class="col-md-4">
                            <select id="q8" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q9">Are the results satisfactory with statistical analysis?</label>
                        <div class="col-md-4">
                            <select id="q9" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q10">Are the results well presented?</label>
                        <div class="col-md-4">
                            <select id="q10" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q11"> Are the tables Satisfactory?</label>
                        <div class="col-md-4">
                            <select id="q11" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q12">Are the tables clear?</label>
                        <div class="col-md-4">
                            <select id="q12" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q13">Are the tables necessary?</label>
                        <div class="col-md-4">
                            <select id="q13" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q14">Are the tables adequate in number?</label>
                        <div class="col-md-4">
                            <select id="q14" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q15">Are the figures satisfactory?</label>
                        <div class="col-md-4">
                            <select id="q15" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q16">Are the figures clear/in good quality of art?</label>
                        <div class="col-md-4">
                            <select id="q16" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q17">Are the figures necessary?</label>
                        <div class="col-md-4">
                            <select id="q17" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q18">Are the figures adequate in number?</label>
                        <div class="col-md-4">
                            <select id="q18" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q19">Does the discussion part include other relevant studies?</label>
                        <div class="col-md-4">
                            <select id="q18" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q20">Are the references suitable?</label>
                        <div class="col-md-4">
                            <select id="q20" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q21">Are the references sufficient?</label>
                        <div class="col-md-4">
                            <select id="q21" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q22">Are the references up to date?</label>
                        <div class="col-md-4">
                            <select id="q22" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q23">Are the references adequate in number?</label>
                        <div class="col-md-4">
                            <select id="q23" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q24">Would you suggest reduction in any part of the manuscript?</label>
                        <div class="col-md-4">
                            <select id="q24" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q25">Would you suggest addition in any part of the manuscript?</label>
                        <div class="col-md-4">
                            <select id="q25" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q26">Is the quality of scientific language satisfactory?</label>
                        <div class="col-md-4">
                            <select id="q26" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q27">Is the acknowledgement included?</label>
                        <div class="col-md-4">
                            <select id="q27" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q28">Is the ethical consideration included?</label>
                        <div class="col-md-4">
                            <select id="q28" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q29">Is the funding information included?</label>
                        <div class="col-md-4">
                            <select id="q29" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 " for="q30">Is the conflict of interest expressed?</label>
                        <div class="col-md-4">
                            <select id="q30" name="questions[]" class="form-control">
                                <option value="No" selected="selected" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 " for="general_remark">General remarks and recommendations to Author:</label>
                        <div class="col-md-6">
                            <textarea id="general_remark" name="general_remark" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 " for="final_recommendation">Final Recommendations:</label>
                        <div class="col-md-6">
                            <textarea id="final_recommendation" name="final_recommendation" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 " for="reason_rejection">Reasons for Rejection:</label>
                        <div class="col-md-6">
                            <textarea id="reason_rejection" name="reason_rejection" rows="3"></textarea>
                        </div>
                    </div>

                </form>


            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
        <button type="button" id="attach_review_form" class="btn btn-primary">Submit</button>
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
                            onfocusout="check_title(this)">
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
                <span id="fileupload_error_msg" style="display:block; color:red; display:none"><i
                        class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select file </span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
       
        <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>
        <button type="button" id="btn_add_file" class="btn btn-primary">{$_L['Submit']}</button>
    </div>

</div>

<div id="modal_internal_upload_file" class="modal fade" tabindex="-2" data-width="760" style="display: none;">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-upload"></i> New Internal File Upload</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form id="internal_fileupload_form">
                    <div class="form-group">
                        <label for="internal_upload_title">{$_L['Title']}</label>
                        <input type="text" class="form-control" id="internal_upload_title" name="internal_upload_title"
                            onfocusout="check_title(this)">
                    </div>

                </form>
                <span id="internal_title_error_msg" style="display:block; color:red; display:none"><i
                        class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please input title </span>
                <hr>
                <form action="" class="dropzone" id="internal_fileupload_container">
                    <div class="dz-message">
                        <h3> <i class="fa fa-cloud-upload"></i> {$_L['Drop File Here']}</h3>
                        <br />
                        <span class="note">{$_L['Click to Upload']}</span>
                    </div>

                </form>
                <hr>
                <span id="internal_fileupload_error_msg" style="display:block; color:red; display:none"><i
                        class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select file </span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>
        <button type="button" id="btn_internal_file" class="btn btn-primary">{$_L['Submit']}</button>
    </div>

</div>

<div id="modal_admin_attach_file" class="modal fade" tabindex="-2" data-width="760" style="display: none;">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-upload"></i> {$_L['New File Upload']}</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form id="admin_attach_form">
                    <div class="form-group">
                        <label for="admin_attach_title">{$_L['Title']}</label>
                        <input type="text" class="form-control" id="admin_attach_title" name="admin_attach_title"
                            onfocusout="check_title(this)">
                    </div>

                </form>
                <span id="adminattach_title_error_msg" style="display:block; color:red; display:none"><i
                        class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please input title </span>
                <hr>
                <form action="" class="dropzone" id="admin_attach_upload_container">
                    <div class="dz-message">
                        <h3> <i class="fa fa-cloud-upload"></i> {$_L['Drop File Here']}</h3>
                        <br />
                        <span class="note">{$_L['Click to Upload']}</span>
                    </div>

                </form>
                <hr>
                <span id="admin_attach_upload_error_msg" style="display:block; color:red; display:none"><i
                        class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select file </span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>
        <button type="button" id="btn_admin_attach" class="btn btn-primary">{$_L['Submit']}</button>
    </div>

</div>


<!-- Page Variables -->
<input type="hidden" name="file_link" id="file_link" value="">
<input type="hidden" name="internal_upload_file_link" id="internal_upload_file_link" value="">
<input type="hidden" name="admin_attach_file_link" id="admin_attach_file_link" value="">
<input type="hidden" name="file_tid" id="file_tid" value="{$d->id}">

<input type="hidden" name="tab_name" id="tab_name" value="{$tab}">
<input type="hidden" name="t_id" id="t_id" value="{$d->id}">
<input type="hidden" name="user_type" id="user_type" value="{$user['user_type']}">

{/block}

{block name="script"}

<script type="text/javascript" src="{$app_url}ui/lib/footable/js/footable.all.min.js"></script>
<script src="{$app_url}ui/lib/easytimer.min.js"></script>
<script type="text/javascript" src="{$app_url}ui/lib/s2/js/select2.min.js"></script>

<script>

    Dropzone.autoDiscover = false;

    $(function () {

        // Global Variables
        var _url = $("#_url").val();
        var $activation = $("#activation").val();
        var user_type = $('#user_type').val();

        // Tabs & Navigations setting

        $tab = $('#tab_name').val();

        if($activation === "Active"){
            if(user_type == 'Reviewer'){
                $('.nav-tabs a[href="#comments"]').tab('show');
                switch ($tab) {
                    case 'downloads':
                        $('.nav-tabs a[href="#downloads"]').tab('show');
                        read_admin('downloads');
                        break;
                    case 'comments':
                        $('.nav-tabs a[href="#comments"]').tab('show');
                        read_admin('comments');
                        break;
                    default:
                        $('.nav-tabs a[href="#comments"]').tab('show');
                }
            } else {
                switch ($tab) {
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
                        read_admin('downloads');
                        break;
                    case 'comments':
                        $('.nav-tabs a[href="#comments"]').tab('show');
                        read_admin('comments');
                        break;
                }

            }

        } else {
            if(user_type == 'Reviewer'){
                $('.nav-tabs a[href="#inactivated"]').tab('show');
            }else {
                $('.nav-tabs a[href="#details"]').tab('show');
            }
        }

        $('a[data-toggle="tab"]').on('click', function(e){
            if($activation == 'InActive'){
                toastr.error("This Submission was inactived");
                e.preventDefault();
                return false;
            }else{
                var tab_name = $(e.target).attr('href');
                if(tab_name == '#comments'){
                    read_admin('comments');
                }else if(tab_name == '#downloads'){
                    read_admin('downloads')
                }
            }
        });

        function read_admin(tab_name) {
            $.post(_url + "tickets/admin/admin_read/", {
                id: tid,
                tab: tab_name
            })
            .done(function (data) {
                if ($.isNumeric(data)) {
                    console.log('changed read status');
                } else {

                }
            });
        }

        // Change Title
        $('#save_title').on("click", function(e) {
            e.preventDefault();
            var t = $('#modal_submission_title').val();
            $.post(_url + "tickets/admin/update_title", {
                id: tid,
                title: t
            })
            .done(function(response){
                var data  = JSON.parse(response);
                if(data.status != 'error'){
                    toastr.success('Successfully changed submission title');
                    $('#submission_title').text(data.message)
                    $('#modal_change_title').modal('hide');
                }else {
                    toastr.error(data.message);
                    // $('#modal_change_title').modal('hide');
                }
            });
        });

        var $ib_form_submit = $("#ib_form_submit");
        var $create_ticket = $("#create_ticket");
        var $modal = $('#ajax-modal');
        var reply_type = 'public';
        var upload_resp;

        // Reviewer reply type
        if(user_type == 'Reviewer'){
            reply_type = 'review';
        }else {
            reply_type = 'public';
        }


        $('.footable').footable();
        ib_editor("#content", 200);

        var ib_file = new Dropzone("#upload_container", {
            url: _url + "tickets/client/upload_file/",
            maxFiles: 10,
            accpetedFiles: "image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
        });

        ib_file.on("sending", function () {
            $ib_form_submit.prop('disabled', true);
        });


        // Ticket convert to invoice

        $('#convertToInvoice').on('click', function (e) {
            e.preventDefault();
            bootbox.confirm('Are you sure?', function (yes) {
                if (yes) {
                    window.location = '{$_url}invoices/create-from-ticket/{$d->id}';
                }
            });
        });

        ib_file.on("success", function (file, response) {
            $ib_form_submit.prop('disabled', false);
            upload_resp = response;
            if (upload_resp.success == 'Yes') {
                toastr.success(upload_resp.msg);
                // $file_link.val(upload_resp.file);
                // files.push(upload_resp.file);
                //
                // console.log(files);
                $('#attachments').val(function (i, val) {
                    return val + (!val ? '' : ',') + upload_resp.file;
                });
            } else {
                toastr.error(upload_resp.msg);
            }
        });

        $ib_form_submit.on('click', function (e) {
            e.preventDefault();
            var tid = $('#t_id').val();
            $create_ticket.block({
                message: block_msg
            });

            $.post(_url + "tickets/admin/add_reply/", {
                message: tinyMCE.activeEditor.getContent(),
                reply_type: reply_type,
                attachments: $("#attachments").val(),
                f_tid: $("#f_tid").val()
            })
            .done(function (data) {
                if (data.success == "Yes") {
                    location.href = _url + 'tickets/admin/view/' + tid + '/comments';
                } else {
                    $create_ticket.unblock();
                    toastr.error(data.msg);
                }
            });
        });

        //  File upload(admin upload, internal upload, admin attachent for client)
        //  Admin & Staff file upload

        $('#fileupload_error_msg').hide();
        $('#filetitle_error_msg').hide();
        $('#internal_title_error_msg').hide();
        $('#internal_fileupload_error_msg').hide();
        $('#adminattach_title_error_msg').hide();
        $('#admin_attach_upload_error_msg').hide();

        var fileupload_resp;
        var $btn_add_file = $('#btn_add_file');
        var $fileupload_form = $('#fileupload_form');


        var ib_file_upload = new Dropzone("#fileupload_container", {
            url: _url + "tickets/client/upload_file/",
            maxFiles: 10,
            accpetedFiles: "image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document",
        });

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


            } else {
                toastr.error(upload_resp.msg);
            }
        });

        $btn_add_file.on('click', function (e) {
            e.preventDefault();
            var tid = $('#t_id').val();

            if ($('#file_link').val() != '' && $('#doc_title').val() != '') {
                $fileupload_form.block({
                    message: block_msg
                });
                $.post(_url + "tickets/admin/add_reply/", {
                    message: $('#doc_title').val(),
                    reply_type: reply_type,
                    attachments: $('#file_link').val(),
                    f_tid: $("#file_tid").val()
                })
                    .done(function (data) {

                        if (data.success == "Yes") {
                            location.href = _url + 'tickets/admin/view/' + tid + '/uploads';
                        } else {
                            $create_ticket.unblock();
                            toastr.error(data.msg);
                        }

                    });

            } else {
                if ($('#file_link').val() == '') {
                    $('#fileupload_error_msg').show();
                }

                if ($('#doc_title').val() == '') {
                    $('#filetitle_error_msg').show();
                }
            }


        });

        // Admin internal file upload

        var $btn_internal_file = $('#btn_internal_file');
        var $internal_upload_form = $('#internal_fileupload_form');


        var internal_upload = new Dropzone("#internal_fileupload_container", {
            url: _url + "tickets/client/upload_file/",
            maxFiles: 10,
            accpetedFiles: "image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document",
        });

        internal_upload.on("sending", function () {

            $btn_internal_file.prop('disabled', true);

        });

        internal_upload.on("success", function (file, response) {

            $btn_internal_file.prop('disabled', false);

            fileupload_resp = response;

            if (fileupload_resp.success == 'Yes') {

                toastr.success(fileupload_resp.msg);
                // $file_link.val(upload_resp.file);
                // files.push(upload_resp.file);
                //
                // console.log(files);

                $('#internal_upload_file_link').val(function (i, val) {
                    return val + (!val ? '' : ',') + fileupload_resp.file;
                });

                $('#internal_fileupload_error_msg').hide();


            } else {
                toastr.error(upload_resp.msg);
            }
        });

        $btn_internal_file.on('click', function (e) {
            e.preventDefault();
            var tid = $('#t_id').val();

            if ($('#internal_upload_file_link').val() != '' && $('#internal_upload_title').val() != '') {
                $internal_upload_form.block({
                    message: block_msg
                });

                $.post(_url + "tickets/admin/add_reply/", {
                    message: $('#internal_upload_title').val(),
                    reply_type: 'internal',
                    attachments: $('#internal_upload_file_link').val(),
                    f_tid: $("#file_tid").val()
                })
                    .done(function (data) {

                        if (data.success == "Yes") {
                            location.href = _url + 'tickets/admin/view/' + tid + '/uploads';
                        } else {
                            $create_ticket.unblock();
                            toastr.error(data.msg);
                        }

                    });

            } else {
                if ($('#internal_upload_file_link').val() == '') {
                    $('#internal_fileupload_error_msg').show();
                }

                if ($('#internal_upload_title').val() == '') {
                    $('#internal_title_error_msg').show();
                }
            }

        });

        // Admin attach file

        var $btn_admin_attach = $('#btn_admin_attach');
        var $admin_attach_form = $('#admin_attach_form');


        var admin_attach_upload = new Dropzone("#admin_attach_upload_container", {
            url: _url + "tickets/client/upload_file/",
            maxFiles: 10,
            accpetedFiles: "image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document",
        });

        admin_attach_upload.on("sending", function () {

            $btn_admin_attach.prop('disabled', true);

        });

        admin_attach_upload.on("success", function (file, response) {

            $btn_admin_attach.prop('disabled', false);

            fileupload_resp = response;

            if (fileupload_resp.success == 'Yes') {

                toastr.success(fileupload_resp.msg);
                // $file_link.val(upload_resp.file);
                // files.push(upload_resp.file);
                //
                // console.log(files);

                $('#admin_attach_file_link').val(function (i, val) {
                    return val + (!val ? '' : ',') + fileupload_resp.file;
                });

                $('#admin_attach_upload_error_msg').hide();


            } else {
                toastr.error(upload_resp.msg);
            }
        });

        $btn_admin_attach.on('click', function (e) {
            e.preventDefault();
            var tid = $('#t_id').val();

            if ($('#admin_attach_file_link').val() != '' && $('#admin_attach_title').val() != '') {
                $admin_attach_form.block({
                    message: block_msg
                });
                $.post(_url + "tickets/admin/add_reply/", {
                    message: $('#admin_attach_title').val(),
                    reply_type: 'admin_attachement',
                    attachments: $('#admin_attach_file_link').val(),
                    f_tid: $("#file_tid").val()
                })
                    .done(function (data) {

                        if (data.success == "Yes") {
                            location.href = _url + 'tickets/admin/view/' + tid + '/downloads';
                        } else {
                            $create_ticket.unblock();
                            toastr.error(data.msg);
                        }

                    });

            } else {
                if ($('#admin_attach_file_link').val() == '') {
                    $('#admin_attach_upload_error_msg').show();
                }

                if ($('#admin_attach_title').val() == '') {
                    $('#adminattach_title_error_msg').show();
                }
            }

        });


        /*  Details Tab */

        $("#add_reply").on('click', function (e) {
            e.preventDefault();

            // $('.nav-tabs a:last').tab('show');
            $('.nav-tabs a[href="#comments"]').tab('show');

            $('html, body').animate({
                scrollTop: $("#section_add_reply").offset().top - 60
            }, 500);

            tinyMCE.activeEditor.focus();

        });

        $('#notes').redactor({
            minHeight: 150, // pixels
            plugins: ['fontcolor']
        });

        $("#btn_save_note").on('click', function (e) {
            e.preventDefault();

            $('#t_options').block({
                message: null
            });

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
            bootbox.confirm(_L['are_you_sure'], function (result) {
                if (result) {
                    window.location.href = base_url + "tickets/admin/delete/" + id;
                }
            });
        });

        $(".t_edit").click(function (e) {
            e.preventDefault();
            var id = this.id;

            $('body').modalmanager('loading');


            $modal.load(base_url + 'tickets/admin/edit_modal/' + id, '', function () {

                $modal.modal();

                ib_editor("#edit_content", 300, true, false);

            });
        });

        $(".reply_edit").click(function (e) {
            e.preventDefault();
            var id = this.id;

            $('body').modalmanager('loading');


            $modal.load(base_url + 'tickets/admin/edit_modal/' + id + '/reply', '', function () {

                $modal.modal();

                ib_editor("#edit_content", 300, true, false);

            });
        });

        $(".c_view").click(function (e) {
            e.preventDefault();
            var id = this.id;

            $('body').modalmanager('loading');

            $modal.load(base_url + 'tickets/admin/view_modal/' + id, '', function () {

                $modal.modal();

            });
        });

        $('[data-toggle="tooltip"]').tooltip();

        $modal.on('hidden.bs.modal', function () {
            location.reload();
        });

        $modal.on('click', '.update_ticket_message', function (e) {
            e.preventDefault();

            $modal.modal('loading');

            $.post(_url + "tickets/admin/edit_modal_post/", {
                tid: $('#edit_tid').val(),
                type: $('#edit_type').val(),
                message: tinyMCE.activeEditor.getContent()

            })
            .done(function (data) {

                if ($.isNumeric(data)) {

                    location.reload();

                } else {
                    $modal.modal('loading');
                    toastr.error(data);
                }

            });

        });

        $(".reply_delete").click(function (e) {
            e.preventDefault();
            var id = this.id;
            bootbox.confirm(_L['are_you_sure'], function (result) {
                if (result) {
                    window.location.href = base_url + "tickets/admin/delete_reply/" + id;
                }
            });
        });


        {literal}

        $("#editable_cc").on("blur", function (e) {
            $.post(base_url + 'tickets/admin/update_cc', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if ($.isNumeric(data)) {

                    toastr.success(_L['Saved Successfully']);

                } else {

                    toastr.error(data);
                }
            })
        });

        $("#editable_bcc").on("blur", function (e) {
            $.post(base_url + 'tickets/admin/update_bcc', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if ($.isNumeric(data)) {

                    toastr.success(_L['Saved Successfully']);

                } else {

                    toastr.error(data);
                }
            })
        });

        $("#editable_email").on("blur", function (e) {
            $.post(base_url + 'tickets/admin/update_email', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if ($.isNumeric(data)) {

                    toastr.success(_L['Saved Successfully']);

                } else {

                    toastr.error(data);
                }
            })
        });

        $("#editable_phone").on("blur", function (e) {
            $.post(base_url + 'tickets/admin/update_phone', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if ($.isNumeric(data)) {

                    toastr.success(_L['Saved Successfully']);

                } else {

                    toastr.error(data);
                }
            })
        });

        $("#editable_hour").on("blur", function (e) {
            $.post(base_url + 'tickets/admin/update_hour', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if ($.isNumeric(data)) {

                    toastr.success(_L['Saved Successfully']);

                } else {

                    toastr.error(data);
                }
            })
        });

        $("#editable_minute").on("blur", function (e) {
            $.post(base_url + 'tickets/admin/update_minute', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if ($.isNumeric(data)) {

                    toastr.success(_L['Saved Successfully']);

                } else {

                    toastr.error(data);
                }
            })
        });

        $("#editable_department").on("change", function (e) {
            $.post(base_url + 'tickets/admin/update_department', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if ($.isNumeric(data)) {

                    toastr.success(_L['Saved Successfully']);

                } else {

                    toastr.error(data);
                }
            })
        });

        $('#ttype').on('change', function (e) {
            // e.preventDefault();
            $.post(base_url + 'tickets/admin/update_ttype', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if ($.isNumeric(data)) {
                    toastr.success(_L['Saved Successfully']);
                } else {
                    toastr.error(data);
                }
            })
        });

        $("#priority").on("change", function (e) {
            $.post(base_url + 'tickets/admin/update_priority', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if (data == 'Normal' || data == 'Fast') {
                    $('#priority_status').text(data);
                    toastr.success(_L['Saved Successfully']);

                } else {

                    toastr.error(data);
                }
            })
        });

        $("#processing_for").on("change", function (e) {
            $.post(base_url + 'tickets/admin/update_processing_for', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if (data == 'Not Scheduled' || data == 'Current Issue' || data == 'Special Issue' || data == 'Next Issue') {
                    toastr.success(_L['Saved Successfully']);
                } else {
                    toastr.error(data);
                }
            })
        });

        $("#payment").on("change", function (e) {
            $.post(base_url + 'tickets/admin/update_payment_status', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if (data == 'Not generated' || data == 'Paid' || data == 'Unpaid') {
                    $('#payment_status').text(data);
                    toastr.success(_L['Saved Successfully']);
                } else {
                    toastr.error(data);
                }
            })
        });

        $("#activation").on("change", function (e) {
            $.post(base_url + 'tickets/admin/update_activation', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if (data == 'Active' || data == 'InActive') {

                    toastr.success(_L['Saved Successfully']);
                    $activation = data;
                } else {

                    toastr.error(data);
                }
            })
        });

        $('#assigned_reviewer').on("change", function (e) {

            $.post(base_url + 'tickets/admin/update_assigned_reviewer', {
                id: tid,
                value: $("#assigned_reviewer option:selected").val()
            }, function (data) {
                if (data.success == true) {

                    toastr.success(_L['Saved Successfully']);

                } else {

                    toastr.error(data);
                }
            })
        });

        $('#editable_assigned_to').on("change", function (e) {

            $.post(base_url + 'tickets/admin/update_assigned_to', {
                id: tid,
                value: $("#editable_assigned_to option:selected").val()
            }, function (data) {
                if (data.success == true) {

                    toastr.success(_L['Saved Successfully']);

                } else {

                    toastr.error(data);
                }
            })
        });

        $("#editable_status").on("change", function (e) {
            $.post(base_url + 'tickets/admin/update_status', {
                id: tid,
                value: $(this).val()
            }, function (data) {
                if ($.isNumeric(data)) {

                    toastr.success(_L['Saved Successfully']);

                    $("#inline_status").html($("#editable_status option:selected").text());
                    window.location.reload();

                } else {

                    toastr.error(data);
                }
            })
        });

        {/literal}


        /**
            Comments Tab
        */

        var $reply_public = $("#reply_public");
        var $reply_internal = $("#reply_internal");
        var $reply_review = $("#reply_review");

        $reply_public.click(function (e) {
            e.preventDefault();
            $(this).addClass('active');
            $reply_internal.removeClass('active');
            $reply_review.removeClass('active');
            reply_type = 'public';
            tinymce.activeEditor.getBody().style.backgroundColor = '#FFFFFF';
        });

        $reply_internal.click(function (e) {
            e.preventDefault();
            $(this).addClass('active');
            $reply_public.removeClass('active');
            $reply_review.removeClass('active');
            reply_type = 'internal';
            tinymce.activeEditor.getBody().style.backgroundColor = '#FFF6D9';
        });

        $reply_review.click(function (e) {
            e.preventDefault();
            $(this).addClass('active');
            $reply_public.removeClass('active');
            $reply_internal.removeClass('active');
            reply_type = 'review';
            tinymce.activeEditor.getBody().style.backgroundColor = '#BCCFF5';
        });

        // function set_review_background(){
        //     if(user_type == 'Reviewer'){
        //         $('#content').focus();
        //         tinymce.activeEditor.getBody().style.backgroundColor = '#0087E0';
        //     }
        // }
        // set_review_background();

        $(".reply_make_public").click(function (e) {
            e.preventDefault();
            var id = this.id;
            bootbox.confirm(_L['are_you_sure'], function (result) {
                if (result) {
                    window.location.href = base_url + "tickets/admin/reply_make_public/" +
                        id;
                }
            });
        });

        $("#attach_review_form").click(function(e) {
            e.preventDefault();
            // var questions = $("input")
            var form_data = $('#frm_review').serialize();

            $.post(base_url + 'tickets/admin/note_review', form_data, function(data){
                $("#modal_review").modal('hide');
                tinyMCE.activeEditor.setContent(data);
            });

        });


        /*  
            Task management 
        */

        function loadTasks() {

            $("#tasks_list").html(block_msg);

            $.get(base_url + "tickets/admin/tasks_list/" + tid, function (data) {

                $("#tasks_list").html(data);

            });
        }

        loadTasks();

        $("#btn_add_task").click(function (e) {
            e.preventDefault();

            if ($("#task_subject").val() == '') {

                $("#task_subject").focus();

            } else {

                $("#btn_add_task").prop('disabled', true);

                $.post(base_url + "tasks/post/", {
                    title: $("#task_subject").val(),
                    rel_type: 'Ticket',
                    tid: tid,
                    rel_id: tid,
                    cid: {$ticket->userid},
                    priority: '{$ticket->urgency}'
                })
                    .done(function (data) {

                        $("#btn_add_task").prop('disabled', false);

                        if ($.isNumeric(data)) {

                            $("#task_subject").val('');

                            location.href = _url + 'tickets/admin/view/' + tid + '/tasks';
                            // loadTasks();

                        } else {
                            toastr.error(data);
                        }

                    });

            }
        });

        for (var a = dragula($(".kanban-droppable-area").toArray()), r = a.containers, o = r.length, l = 0; l < o; l++) $(r[l]).addClass("dragula dragula-vertical");
        a.on("drop", function (a, r, o, l) {
            var item = a.id;
            var target = r.id;

            $.post(base_url + 'tasks/set_status/', {
                task_id: item,
                target: target
            }, function (data) {
                // $(".kanban-col").unblock();
                loadTasks();

            })

        });

        $modal.on('click', '.modal_submit', function (e) {

            e.preventDefault();

            $modal.modal('loading');

            $.post(base_url + "tasks/post/", {
                title: $('#title').val(),
                start_date: $('#start_date').val(),
                due_date: $('#due_date').val(),
                cid: $('#cid').val(),
                aid: $('#aid').val(),
                tid: tid,
                description: tinyMCE.activeEditor.getContent(),
                status: $('#task_status').val(),
                task_id: $('#task_id').val()
            })
                .done(function (data) {

                    if ($.isNumeric(data)) {

                        location.href = _url + 'tickets/admin/view/' + tid + '/tasks';
                        // window.location = base_url + 'tasks/list/' + data;

                    } else {
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
            var ttid = this.id;
            bootbox.confirm(_L['are_you_sure'], function (result) {
                if (result) {

                    $.get(base_url + "delete/tasks/" + ttid, function (data) {
                        location.href = _url + 'tickets/admin/view/' + tid +
                            '/tasks';

                    });


                }
            });

        });


        $modal.on('click', '.c_edit', function (e) {
            e.preventDefault();
            var ttid = this.id;

            $('body').modalmanager('loading');

            $modal.load(base_url + 'tasks/create/' + ttid, '', function () {
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
                    } else {
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

    function setPreDefinedContent(event, predefined_reply_id) {

        $('.predefined').modal('hide');

        $.get("{$_url}tickets/admin/get-predefined-reply/" + predefined_reply_id, function (data) {
            tinyMCE.activeEditor.setContent(data);
        });


    }

    var check_title = function (element) {
        switch (element.id) {
            case 'doc_title':
                if($('#doc_title').val() == ''){
                    $('#filetitle_error_msg').show();
                }else {
                    $('#filetitle_error_msg').hide();
                }
                break;
            case 'internal_upload_title':
                if($('#internal_upload_title').val() == ''){
                    $('#internal_title_error_msg').show();
                }else {
                    $('#internal_title_error_msg').hide();
                }
                break;
            case 'admin_attach_title':
                if($('#admin_attach_title').val() == ''){
                    $('#adminattach_title_error_msg').show();
                }else {
                    $('#adminattach_title_error_msg').hide();
                }
                break;
        }
    }

</script>
{/block}