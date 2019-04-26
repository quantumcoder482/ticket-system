{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Roles']}</h5>

                </div>
                <div class="ibox-content">
                    <a href="{$_url}settings/add_role/" class="btn btn-success" id="add_new_group"><i class="fa fa-plus"></i> New Role</a>
                    <hr>



                    <div class="table-responsive">
                        <table class="table table-bordered roles no-margin">
                            <thead>
                            <tr>
                                <th class="bold">{$_L['Name']}</th>
                                <th class="text-center bold">{$_L['Manage']}</th>
                            </tr>
                            </thead>
                            <tbody>


                            {foreach $roles as $role}
                                <tr data-id="1">
                                    <td>{$role['rname']}</td>
                                    <td class="text-right">

                                        <a href="{$_url}settings/edit_role/{$role['id']}/" class="btn btn-inverse btn-xs"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>
                                        <a href="{$_url}delete/role/{$role['id']}/" class="btn btn-danger btn-xs cdelete" id="uid118"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                                    </td>



                                </tr>
                            {/foreach}






                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>



    </div>
{/block}
