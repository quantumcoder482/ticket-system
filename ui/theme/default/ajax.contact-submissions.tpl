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
                {if $ds['status'] eq 'New' || $ds['status'] eq 'Accepted' || $ds['status'] eq 'Published'}
                    <span class="label label-success">{$ds['status']}</span>
                {elseif $ds['status'] eq 'In Progress' || $ds['status'] eq 'Awaiting Publication'}
                    <span class="label label-primary">{$ds['status']}</span>
                {elseif $ds['status'] eq 'Rejected' || $ds['status'] eq 'Withdrawn' }
                    <span class="label label-danger">{$ds['status']}</span>
                {/if}

            </td>
        </tr>
    {/foreach}

    </tbody>
</table>