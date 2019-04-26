<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        {$_L['Email Templates']}
    </h3>
</div>
<div class="modal-body">
    <div class="ib-search-bar" style="margin-bottom: 30px;">
        <div class="input-group">
            <input type="text" class="form-control" id="ib_search_input" placeholder="{$_L['Search']}..." autofocus> </div>
    </div>

    {* style="max-height: 400px; overflow-y: scroll;" *}
    <div>
        <table class="table table-bordered filter-table" id="tbl_email_templates">
            <thead>
            <tr>
                <th>{$_L['Name']}</th>
                <th width="60%">{$_L['Subject']}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            {foreach $tpls as $tpl}

                <tr>

                    <td>{$tpl['tplname']}</td>
                    <td>{$tpl['subject']}</td>
                    <td><a href="#" class="btn btn-primary eml_select btn-xs" id="es{$tpl['id']}"><i class="fa fa-files-o"></i> </a> </td>

                </tr>

            {/foreach}

            </tbody>
        </table>
    </div>


</div>
<div class="modal-footer">


    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Cancel']}</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i
                class="fa fa-check"></i> {$_L['Save']}</button>
</div>