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
                {if $ds['status'] eq 'New' || $ds['status'] eq 'Accepted' || $ds['status'] eq 'Published' || $ds['status'] eq 'Under Layout Editing' || $ds['status'] eq 'Under Galley Correction'}
                    <span class="label label-success">{$ds['status']}</span>
                {elseif $ds['status'] eq 'In Progress' || $ds['status'] eq 'Awaiting Publication' || $ds['status'] eq 'Under Plagiarism Check' || $ds['status'] eq 'Under Peer-Review'}
                    <span class="label label-primary">{$ds['status']}</span>
                {elseif $ds['status'] eq 'Rejected' || $ds['status'] eq 'Withdrawn' }
                    <span class="label label-danger">{$ds['status']}</span>
                {elseif $ds['status'] eq 'Scheduled for Current Issue' || $ds['status'] eq 'Scheduled for Next Issue' || $ds['status'] eq 'Scheduled for Special Issue'}
                    <span class="label label-warning">{$ds['status']}</span>
                {else}
                    <span class="label label-primary">{$ds['status']}</span>
                {/if}

            </td>
        </tr>
    {/foreach}

    </tbody>
</table>