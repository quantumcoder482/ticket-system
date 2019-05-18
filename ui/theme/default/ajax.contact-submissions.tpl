<a href="{$_url}tickets/admin/create/" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> {$_L['Open Ticket']}</a>

<hr>

<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>
        <th>ID</th>
        <th>{$_L['Subject']}</th>
        <th>{$_L['Date Created']}</th>
        <th class="text-right" style="width: 100px;">{$_L['Status']}</th>
    </tr>
    </thead>
    <tbody>

    {foreach $s as $ds}
        <tr>
            <td><a href="{$_url}tickets/admin/view/{$ds['id']}">{$ds['tid']}</a></td>
            <td><a href="{$_url}tickets/admin/view/{$ds['id']}/">{$ds['subject']}</a> </td>
            <td>{date( $config['df'], strtotime($ds['created_at']))}</td>
            <td>
                {if $ds['status'] eq 'Open'}
                    <span class="label label-default">Open</span>
                {elseif $ds['status'] eq 'In Progress'}
                    <span class="label label-info">In Progress</span>
                {elseif $ds['status'] eq 'Accepted'}
                    <span class="label label-success">{$_L['Accepted']}</span>
                {elseif $ds['status'] eq 'Rejected'}
                    <span class="label label-danger">Rejected</span>
                {elseif $ds['status'] eq 'Withdrawn'}
                    <span class="label label-info">Withdrawn</span>
                {elseif $ds['status'] eq 'Published'}
                    <span class="label label-info">Published</span>
                {/if}

            </td>
        </tr>
    {/foreach}

    </tbody>
</table>