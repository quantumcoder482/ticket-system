{extends file="$layouts_admin"}
{block name="style"}

{/block}
{block name="content"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><i class="fa fa-bell-o"></i> Notifications ({$notification_type})</h5>
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
                            <th class="text-center" data-sortable="false" style="width:100px">Assigned to Staff</th>
                            <th>Notification</th>
                            <th>Date</th>
                            <th>Submission ID</th>
                            <th class="text-center" width="100px" data-sortable="false">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        {foreach $notifications as $key => $d}
                        <tr>

                            {if $notification_type eq 'public'}
                                <td data-value="{$d['userid']}" data-sorting="false" id="img{$d['userid']}" alt="Avatar" style="text-align:center">

                                    {if $d['assigned_name'] eq ''}
                                       &nbsp;
{*                                    <img src="{$app_url}ui/lib/imgs/default-user-avatar.png" alt="" width="35px" height="35px">*}
                                    {else}
{*                                    <img src="{$app_url}{$d['img']}" class="img-circle" alt="{$d['account']}" width="35px" height="35px">*}
                                        <span style="color:#428bca;">{$d['assigned_name']}</span>
                                    {/if}

                                </td>

                                <td class="" data-value="" id="">
                                    {if $d['attachments'] eq ''}
                                        <i class="fa fa-commenting-o" style="font-size: 2rem"></i>&nbsp;
                                    {else}
                                        <i class="fa fa-paperclip" style="font-size: 2rem"></i>&nbsp;
                                    {/if}
                                    <a href="{$_url}contacts/view/{$d['userid']}" style="margin-left: 10px">{$d['account']}</a>
                                    {if $d['attachments'] eq ''}
                                        has replied
                                    {else}
                                        has attached file
                                    {/if}
                                    {if ($d['admin_read'] neq 'yes' && $user['user_type'] eq 'Admin') || ($d['staff_read'] neq 'yes' && $user['user_type'] neq 'Admin')}
                                        <span class="btn btn-xs" style="background:red; color:white">Unread</span>
                                    {/if}
                                </td>

                                <td data-value="{strtotime($d['created_date'])}">
                                    <span>{$d['updated_at']}</span>
                                </td>

                                <td data-value="{$d['ticket_id']}">
                                    <span>{$d['ticket_id']}</span>
                                </td>
                                <td class="text-center" data-sorting="false">
                                    {if $d['attachments'] eq ''}
                                        <a href="{$_url}tickets/admin/view/{$d['tid']}/comments"
                                            class="btn btn-primary btn-md add_page" id="{$d['id']}" data-toggle="tooltip"
                                            data-placement="top" title="View">
                                            View
                                        </a>
                                    {else}
                                        <a href="{$_url}tickets/admin/view/{$d['tid']}/downloads"
                                           class="btn btn-primary btn-md add_page" id="{$d['id']}" data-toggle="tooltip"
                                           data-placement="top" title="View">
                                            View
                                        </a>
                                    {/if}


                                </td>
                            {else}
                                <td data-value="{$d['admin']}" data-sorting="false" id="img{$d['admin']}" alt="Avatar" style="text-align:center">

                                    {if $d['assigned_name'] eq ''}
{*                                        <img src="{$app_url}ui/lib/imgs/default-user-avatar.png" alt="" width="35px" height="35px">*}
                                        &nbsp;
                                    {else}
{*                                        <img src="{$app_url}{$d['img']}" class="img-circle" alt="{$d['account']}" width="35px" height="35px">*}
                                        <span style="color:#428bca;">{$d['assigned_name']}</span>
                                    {/if}

                                </td>

                                <td class="" data-value="" id="">
                                    <i class="fa fa-commenting-o" style="font-size: 2rem"></i>&nbsp;
                                    <a href="#">{$d['account']}</a> has replied

                                    {if ($d['admin_read'] neq 'yes' && $user['user_type'] eq 'Admin') || ($d['staff_read'] neq 'yes' && $user['user_type'] neq 'Admin')}
                                        <span class="btn btn-xs" style="background:red; color:white">Unread</span>
                                    {/if}
                                </td>

                                <td data-value="{strtotime($d['created_date'])}">
                                    <span>{$d['updated_at']}</span>
                                </td>

                                <td data-value="{$d['ticket_id']}">
                                    <span>{$d['ticket_id']}</span>
                                </td>
                                <td class="text-center" data-sorting="false">
                                    {if $d['attachments'] eq ''}
                                        <a href="{$_url}tickets/admin/view/{$d['tid']}/comments"
                                           class="btn btn-primary btn-md add_page" id="{$d['id']}" data-toggle="tooltip"
                                           data-placement="top" title="View">
                                            View
                                        </a>
                                    {else}
                                        <a href="{$_url}tickets/admin/view/{$d['tid']}/downloads"
                                           class="btn btn-primary btn-md add_page" id="{$d['id']}" data-toggle="tooltip"
                                           data-placement="top" title="View">
                                            View
                                        </a>
                                    {/if}


                                </td>
                            {/if}

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
<input type="hidden" id="user_type" name="user_type" value="{$user['user_type']}" />
<input type="hidden" id="notification_type" name="notification_type" value="{$notification_type}" />
{/block}
{block name=script}
<script type="text/javascript">
    var _url = $("#_url").val();
    var user_type = $('#user_type').val();
    var notification_type = $('#notification_type').val();
    $('.footable').footable();

    $('#mark_read').on('click', function(e){
        if(user_type == "Admin"){
            var mark_path = (notification_type == 'public')? _url+'util/mark_all_read/public' : _url+'util/mark_all_read/internal';
        }else {
            var mark_path = (notification_type == 'public')? _url+'util_staff/mark_all_read/public' : _url+'util_staff/mark_all_read/internal';
        }

        $.get(mark_path, function(data){
            if($.isNumeric(data)){
                location.reload();
            }
        });

    });
</script>
{/block}