{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Expense Types</h5>

                </div>
                <div class="ibox-content">
                    <a href="#" class="btn btn-success" id="add_new_expense_type"><i class="fa fa-plus"></i> Add New Expense Type</a>
                    <a href="{$_url}reorder/expense_types/" class="btn btn-primary"><i class="fa fa-download"></i> {$_L['Reorder']}</a>

                    <br>
                    <br>
                    <table class="table table-striped table-bordered">
                        <th>{$_L['Type']}</th>
                        <th>{$_L['Manage']}</th>
                        {foreach $e as $g}
                            <tr>
                                <td>{$g['name']}</td>

                                <td>
                                    <a href="#" class="btn btn-xs btn-warning edit_expense_type" id="e{$g['id']}" data-name="{$g['name']}"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>

                                    <a href="{$_url}settings/users-delete/{$g['id']}" id="d_{$g['id']}" class="btn btn-xs btn-danger cdelete"><i class="fa fa-trash"></i> {$_L['Delete']}</a>

                                </td>
                            </tr>
                        {/foreach}


                    </table>

                </div>
            </div>



        </div>



    </div>

    <input type="hidden" name="_msg_add_new_expense_type" id="_msg_add_new_expense_type" value="Add New Expense Type">
    <input type="hidden" name="_msg_expense_type" id="_msg_expense_type" value="Expense Type">
    <input type="hidden" name="_msg_edit" id="_msg_edit" value="{$_L['Edit']}">
    <input type="hidden" name="_msg_ok" id="_msg_ok" value="{$_L['OK']}">
    <input type="hidden" name="_msg_cancel" id="_msg_cancel" value="{$_L['Cancel']}">


{/block}
