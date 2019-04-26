{extends file="$layouts_client"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>List Tickets</h5>
                    <a href="{$_url}tickets/client/new/" class="btn btn-xs pull-right btn-primary"><i class="icon-mail"></i> Open New Ticket</a>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover table-vcenter">
                        <tbody>

                        {foreach $ds as $d}
                            <tr>
                                <td class="text-center" style="width: 140px;"><a href="{$_url}tickets/client/view/{$d['tid']}/">#{$d['tid']}</a></td>
                                <td class="hidden-xs hidden-sm hidden-md text-center" style="width: 100px;">
                                    <span class="label label-success">{$d['status']}</span>
                                </td>
                                <td>
                                    <a href="{$_url}tickets/client/view/{$d['tid']}/">{$d['subject']}</a>
                                    <div class="text-muted">
                                        <em>Updated </em> <em class="mmnt">{strtotime($d['updated_at'])}</em> by <a href="{$_url}tickets/client/view/{$d['tid']}/">{$d['last_reply']}</a>
                                    </div>
                                </td>


                            </tr>
                        {/foreach}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


{/block}




