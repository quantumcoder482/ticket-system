{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">



        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">

                    <a href="{$_url}contacts/group_email/{$gid}/" id="send_group_email" class="btn btn-primary mb-md"><i class="fa fa-paper-plane"></i> {$_L['Send Email']}</a>
                    <br>

                    <table class="table table-bordered table-hover sys_table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{$_L['Name']}</th>
                            <th>{$_L['Company Name']}</th>
                            <th>{$_L['Email']}</th>
                            <th>{$_L['Phone']}</th>
                            <th class="text-right">{$_L['Manage']}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $d as $ds}

                            <tr>

                                <td><a href="{$_url}contacts/view/{$ds['id']}/">{$ds['id']}</a> </td>

                                <td><a href="{$_url}contacts/view/{$ds['id']}/">{$ds['account']}</a> </td>
                                <td>{$ds['company']}</td>

                                <td>
                                    {$ds['email']}

                                </td>
                                <td>
                                    {$ds['phone']}
                                </td>
                                <td class="text-right">
                                    <a href="{$_url}contacts/view/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> {$_L['View']}</a>

                                    <a href="#" class="btn btn-danger btn-xs cdelete" id="uid{$ds['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
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