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
                        <tbody>

                        {foreach $ds as $d}
                            <tr>
                                <td class="text-center" style="width: 140px;"><a href="{$_url}client/tickets/view/{$d['tid']}/">#{$d['tid']}</a></td>
                                <td class="hidden-xs hidden-sm hidden-md text-center" style="width: 100px;">
                                    <span class="label label-success">{if isset($_L[$d['status']])}
                                    {$_L[$d['status']]}
                                    {else}
                                    {$d['status']}
                                    {/if}</span>
                                </td>
                                <td>
                                    <a href="{$_url}client/tickets/view/{$d['tid']}/">{$d['subject']}</a>
                                    <div class="text-muted">
                                        <em>{$_L['Updated']} </em> <em class="mmnt">{strtotime($d['updated_at'])}</em> by <a href="{$_url}tickets/client/view/{$d['tid']}/">{$d['last_reply']}</a>
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