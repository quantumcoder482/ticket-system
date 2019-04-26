{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Groups']}</h5>

                </div>
                <div class="ibox-content">
                    <a href="#" class="btn btn-success" id="add_new_group"><i class="fa fa-plus"></i> {$_L['Add New Group']}</a>
                    <a href="{$_url}reorder/groups/" class="btn btn-primary"><i class="fa fa-download"></i> {$_L['Reorder']}</a>

                    <br>
                    <br>
                    <table class="table table-striped table-bordered">
                        <th>{$_L['Group']}</th>
                        <th>{$_L['Manage']}</th>
                        {foreach $gs as $g}
                            <tr>
                                <td>{$g['gname']}</td>

                                <td>
                                    <a href="{$_url}contacts/find_by_group/{$g['id']}/" class="btn btn-xs btn-primary"><i class="fa fa-bars"></i> {$_L['List Contacts']}</a>
                                    <a href="#" class="btn btn-xs btn-warning edit_group" id="e{$g['id']}" data-name="{$g['gname']}"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>

                                    <a href="{$_url}settings/users-delete/{$g['id']}" id="g{$g['id']}" class="btn btn-xs btn-danger cdelete"><i class="fa fa-trash"></i> {$_L['Delete']}</a>

                                </td>
                            </tr>
                        {/foreach}


                    </table>

                </div>
            </div>



        </div>



    </div>

    <input type="hidden" name="_msg_add_new_group" id="_msg_add_new_group" value="{$_L['Add New Group']}">
    <input type="hidden" name="_msg_group_name" id="_msg_group_name" value="{$_L['Group Name']}">
    <input type="hidden" name="_msg_edit" id="_msg_edit" value="{$_L['Edit']}">
    <input type="hidden" name="_msg_ok" id="_msg_ok" value="{$_L['OK']}">
    <input type="hidden" name="_msg_cancel" id="_msg_cancel" value="{$_L['Cancel']}">


{/block}
