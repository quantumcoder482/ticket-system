<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="txt_modal_header">
        {if $edit}
            {*{$_L['Edit']}*}
            {$task['title']}
        {else}
            {$_L['Add New']}
        {/if}
    </h3>
</div>
<div class="modal-body">


    <form id="ib-modal-form" method="post">

        {*<div class="form-group">*}
            {*<label for="">{$_L['']}</label>*}
            {*<input type="text" class="form-control" id="" name="" value="">*}
        {*</div>*}

        <div class="form-group">
            <label for="title">{$_L['Subject']}</label>
            <input type="text" class="form-control" id="title" name="title" value="{$task['title']}">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date">{$_L['Start Date']}</label>
                    <input type="text" class="form-control" id="start_date" name="start_date" value="{$task['started']}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="due_date">{$_L['Due Date']}</label>
                    <input type="text" class="form-control" id="due_date" name="due_date" value="{$task['due_date']}">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class='form-group'>
                    <label for="cid">Related Author</label>

                    <select id="cid" name="cid" class="form-control">
                        <option value="">{$_L['Select Contact']}...</option>
                        {foreach $c as $cs}
                            <option value="{$cs->id}"
                                    {if $task['cid'] eq ($cs['id'])}selected="selected" {/if}>{$cs->account} {if $cs->email neq ''}- {$cs->email}{/if}</option>
                        {/foreach}

                    </select>

                </div>
            </div>
            <div class="col-md-6">
                <div class='form-group'>
                    <label for="aid">Related Staff</label>

                    <select id="aid" name="aid" class="form-control">
                        {foreach $ads as $aid}
                        <option value="{$aid['id']}" {if $task['aid'] eq ($aid['id'])}selected="selected" {/if}>{$aid['fullname']}</option>
                        {/foreach}

                    </select>

                </div>
            </div>
        </div>

        {*<div class="row">*}
            {*<div class="col-md-6">*}
                {*<div class="form-group">*}
                    {*<label for="priority">{$_L['Priority']}</label>*}
                    {*<select class="form-control" id="priority" name="priority">*}
                        {*<option value="" {if $task['priority'] == 'None' || $task['priority'] == ''} selected {/if}>{$_L['None']}</option>*}
                        {*<option value="Low" {if $task['priority'] == 'Low'} selected {/if}>{$_L['Low']}</option>*}
                        {*<option value="Medium" {if $task['priority'] == 'Medium'} selected {/if}>{$_L['Medium']}</option>*}
                        {*<option value="High" {if $task['priority'] == 'High'} selected {/if}>{$_L['High']}</option>*}
                        {*<option value="Urgent" {if $task['priority'] == 'Urgent'} selected {/if}>{$_L['Urgent']}</option>*}
                    {*</select>*}
                {*</div>*}
            {*</div>*}

        {*</div>*}

        {*<div class="row">*}
            {*<div class="col-md-6">*}
                {*<div class="form-group">*}
                    {*<label for="rel_type">{$_L['Related To']}</label>*}
                    {*<select class="form-control" id="rel_type" name="rel_type">*}
                        {*<option value="None">--{$_L['None']}--</option>*}
                        {*{foreach $relations as $relation}*}
                            {*<option>{$relation}</option>*}
                        {*{/foreach}*}
                    {*</select>*}
                {*</div>*}
            {*</div>*}
            {*<div class="col-md-6">*}
                {*<div class="form-group" style="display: none;" id="rel_id_input">*}
                    {*<label for="rel_id" id="lbl_rel_id"></label>*}
                    {*<select class="form-control" id="rel_id">*}
                        {*<option value="None">--{$_L['None']}--</option>*}
                    {*</select>*}
                {*</div>*}
            {*</div>*}
        {*</div>*}



        <div class="form-group" >
            <label for="subject">{$_L['Description']}</label>
            <textarea class="form-control" id="description" name="description" rows="10">{$task['description']}</textarea>
            <div class="help-block">
                <a data-toggle="modal" href="#modal_predefined_replies" id="add_predefined"><i class="fa fa-align-left"></i> Predefined reply</a>
            </div>
        </div>

    
        <input type="hidden" id="task_status" name="task_status" value="{$task['status']}">
        <input type="hidden" id="task_id" name="task_id" value="{$task['id']}">
    </form>

</div>
<div class="modal-footer">


    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Cancel']}</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i
                class="fa fa-check"></i> {$_L['Save']}</button>
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
