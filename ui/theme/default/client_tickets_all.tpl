{extends file="$layouts_client"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>{$_L['List Tickets']}</h5>
                    <a href="{$_url}client/tickets/new/" class="btn btn-xs pull-right btn-primary"><i class="icon-mail"></i> {$_L['Open New Ticket']}</a>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:140px">ID</th>
                                <th class="text-center" style="width:100px">Status</th>
                                <th> Title </th>
                            </tr>
                        </thead>
                        <tbody>

                        {foreach $ds as $d}
                            <tr>
                                <td class="text-center" style="width: 140px;"><a href="{$_url}client/tickets/view/{$d['id']}/">{$d['tid']}</a></td>
                                <td class="hidden-xs hidden-sm hidden-md text-center" style="width: 100px;">
                                    {if $d['status'] eq 'New' || $d['status'] eq 'Accepted' || $d['status'] eq 'Published' || $d['status'] eq 'Under Layout Editing' || $d['status'] eq 'Under Galley Correction'}
                                        <span class="label label-success">{$d['status']}</span>
                                    {elseif $d['status'] eq 'In Progress' || $d['status'] eq 'Awaiting Publication' || $d['status'] eq 'Under Plagiarism Check' || $d['status'] eq 'Under Peer-Review' || $d['status'] eq 'Under Proofreading'}
                                        <span class="label label-primary">{$d['status']}</span>
                                    {elseif $d['status'] eq 'Rejected' || $d['status'] eq 'Withdrawn' }
                                        <span class="label label-danger">{$d['status']}</span>
                                    {elseif $d['status'] eq 'Scheduled for Current Issue' || $d['status'] eq 'Scheduled for Next Issue' || $d['status'] eq 'Scheduled for Special Issue'}
                                        <span class="label label-warning">{$d['status']}</span>
                                    {/if}
                                </td>
                                <td>
                                    <a href="{$_url}client/tickets/view/{$d['id']}/">{$d['subject']}</a>
                                    <div class="text-muted">
                                        <em>{$_L['Updated']} </em> <em class="mmnt">{strtotime($d['updated_at'])}</em> by <a href="{$_url}tickets/client/view/{$d['id']}/">{$d['last_reply']}</a>
                                    </div>
                                </td>


                            </tr>

                            {foreachelse}
                            <tr><td align="center" style="border-top: none">{$_L['You do not have any Tickets']}</td></tr>
                        {/foreach}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




{/block}