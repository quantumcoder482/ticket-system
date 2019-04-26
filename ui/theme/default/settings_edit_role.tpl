{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['New Role']}</h5>

                </div>
                <div class="ibox-content">


                    <form action="{$_url}settings/edit_role_post/" method="post" accept-charset="utf-8">
                        <div class="form-group"><label for="rname" class="control-label"> <small class="req text-danger">* </small>Role Name</label><input type="text" id="rname" name="rname" class="form-control" value="{$role->rname}"></div>

                        <hr>


                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-bordered roles no-margin">
                                    <thead>
                                    <tr>
                                        <th class="bold">{$_L['Permission']}</th>
                                        <th class="text-center bold">{$_L['View']}</th>
                                        <th class="text-center bold">{$_L['Edit']}</th>
                                        <th class="text-center bold">{$_L['Create']}</th>
                                        <th class="text-center text-danger bold">{$_L['Delete']}</th>
                                        <th class="bold">{$_L['All Data']} <br><small>view all data or only self created data</small></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    {foreach $permissions as $permission}

                                        <tr data-id="{$permission['id']}">
                                            <td class="bold">{$permission['pname']}</td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <div class="i-checks"><label  style="padding-left: 0"> <input name="{$permission['shortname']}_view" class="ib_checkbox" type="checkbox" value="yes" {if Misc::check_permission_by_role_id($role->id,$permission['id'],'view')}checked{/if}></label></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <div class="i-checks"><label> <input name="{$permission['shortname']}_edit" class="ib_checkbox" type="checkbox" value="yes" {if Misc::check_permission_by_role_id($role->id,$permission['id'],'edit')}checked{/if}></label></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <div class="i-checks"><label> <input name="{$permission['shortname']}_create" class="ib_checkbox" type="checkbox" value="yes" {if Misc::check_permission_by_role_id($role->id,$permission['id'],'create')}checked{/if}></label></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox checkbox-danger">
                                                    <div class="i-checks"><label> <input name="{$permission['shortname']}_delete" class="ib_checkbox" type="checkbox" value="yes" {if Misc::check_permission_by_role_id($role->id,$permission['id'],'delete')}checked{/if}></label></div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="checkbox checkbox-danger">
                                                    <div class="i-checks"><label> <input name="{$permission['shortname']}_all_data" class="ib_checkbox" type="checkbox" value="yes" {if Misc::check_permission_by_role_id($role->id,$permission['id'],'all_data')}checked{/if}></label></div>
                                                </div>
                                            </td>

                                        </tr>

                                    {/foreach}

                                    </tbody>
                                </table>

                                <input type="hidden" name="rid" id="rid" value="{$role->id}">

                                <button class="md-btn md-btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Save']}</button>                        </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>



    </div>
{/block}
