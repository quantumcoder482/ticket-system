{extends file="$layouts_admin"}
{block name="style"}

{/block}
{block name="content"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><i class="fa fa-bell-o"></i> Notification</h5>
                <div class="ibox-tools">
                    <a href="#" id="mark_read" class="btn btn-primary btn-sm">Mark as Read</a>
                </div>
            </div>
            <div class="ibox-content">
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
                    <input type="hidden" id="sure_msg" value="{$_L['are_you_sure']}" />
                </form>
                <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter"
                    data-page-size="20">
                    <thead>
                        <tr>
                            <th class="text-center" data-sortable="false" style="width:100px">User</th>
                            <th>Notification</th>
                            <th>Date</th>
                            <th class="text-center" width="100px" data-sortable="false">View</th>
                        </tr>
                    </thead>
                    <tbody>

                        {foreach $notifications as $key => $d}
                        <tr>

                            <td data-value="{$d['userid']}" data-sorting="false" id="img{$d['userid']}" alt="Avatar" style="text-align:center">

                                {if $d['img'] eq ''}
                                <img src="{$app_url}ui/lib/imgs/default-user-avatar.png" alt="" width="35px" height="35px">
                                {else}
                                <img src="{$app_url}{$d['img']}" class="img-circle" alt="{$d['account']}" width="35px" height="35px">
                                {/if}

                            </td>

                            <td class="" data-value="" id="">
                                <a href="{$_url}contacts/view/{$d['userid']}">{$d['account']}</a> has replied to your submission and
                                awaits your response.
                                {if $d['admin_read'] neq 'yes'}
                                    <span class="btn btn-xs" style="background:red; color:white">Unread</span>
                                {/if}
                            </td>

                            <td data-value="{strtotime($d['created_date'])}">
                                <span>{$d['updated_at']}</span>
                            </td>

                            <td class="text-center" data-sorting="false">
                                <a href="{$_url}tickets/admin/view/{$d['tid']}/comments"
                                    class="btn btn-primary btn-md add_page" id="{$d['id']}" data-toggle="tooltip"
                                    data-placement="top" title="View">
                                    View
                                </a>
                            </td>
                        </tr>
                        {/foreach}

                    </tbody>
                    <tfoot>
                        <tr>
                            <td style="text-align: right;" colspan="11">
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

{/block}
{block name=script}
<script type="text/javascript">
    var _url = $("#_url").val();
    $('.footable').footable();

    $('#mark_read').on('click', function(e){
        $.get(_url+'util/mark_all_read', function(data){
            if($.isNumeric(data)){
                location.reload();
            }
        });

    });
</script>
{/block}