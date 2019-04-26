{extends file="$layouts_admin"}

{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/footable/css/footable.core.min.css" />
{/block}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Manage_Users']}</h5>

                </div>
                <div class="ibox-content">
                    <a href="{$_url}settings/users-add" class="btn btn-primary"><i class="fa fa-plus"></i> {$_L['Add_New_User']}</a>
                    <br>
                    <br>

                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input type="text" name="name" id="foo_filter" class="form-control" placeholder="{$_L['Search']}..."/>

                                </div>
                            </div>

                        </div>
                    </form>

                    <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
                        <thead>
                        <tr>
                            <th style="width: 60px;">{$_L['Avatar']}</th>
                            <th>{$_L['Username']}</th>
                            <th>{$_L['Full_Name']}</th>
                            <th>{$_L['Type']}</th>
                            <th>{$_L['Manage']}</th>
                        </tr>
                        </thead>

                        {foreach $d as $ds}
                            <tr>
                                <td>{if $ds['img'] eq 'gravatar'}
                                        <img src="http://www.gravatar.com/avatar/{($ds['username'])|md5}?s=60" class="img-circle" alt="{$user['fullname']}">
                                    {elseif $ds['img'] eq ''}
                                        <img src="{$app_url}ui/lib/imgs/default-user-avatar.png" style="max-height: 60px;" alt="">
                                    {else}
                                        <img src="{$app_url}/{$ds['img']}" class="img-circle" style="max-height: 60px;" alt="{$ds['fullname']}">
                                    {/if}</td>
                                <td>{$ds['username']}</td>
                                <td>{$ds['fullname']}</td>
                                <td>{ib_lan_get_line($ds['user_type'])}</td>
                                <td>
                                    <a href="{$_url}settings/users-edit/{$ds['id']}" class="btn btn-inverse"><i class="fa fa-pencil"></i> </a>
                                    {if ($_user['username']) neq ($ds['username'])}
                                        <a href="{$_url}settings/users-delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger cdelete"><i class="fa fa-trash"></i> </a>
                                    {/if}
                                </td>
                            </tr>
                        {/foreach}

                        <tfoot>
                        <tr>
                            <td colspan="5">
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

{block name="script"}

    <script type="text/javascript" src="{$app_url}ui/lib/footable/js/footable.all.min.js"></script>

    <script>
        $(function () {
            $('.footable').footable();
        });
    </script>

{/block}
