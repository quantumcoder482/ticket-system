<div class="table-responsive" id="ib_data_table">
    <table class="table table-bordered table-hover" id="tableDataTable">
        <thead>
        <tr>
            <th class="bold">{$_L['Name']}</th>
            <th class="bold">{$_L['URL']}</th>
            <th class="bold">{$_L['Username']}</th>
            <th class="text-center bold">{$_L['Manage']}</th>
        </tr>
        </thead>
        <tbody>


        {foreach $passwords as $password}
            <tr data-id="{$password['id']}">

                <td>{$password['name']}</td>
                <td>{$password['url']}</td>
                <td>{$password['username']}</td>
                <td class="text-right">

                    {if $password['url'] neq ''}
                        <a href="{$password['url']}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-globe"></i> </a>
                    {/if}

                    {*<a href="javascript:void(0);" id="v_{$password['id']}" class="btn btn-success btn-xs password_view"><i class="fa fa-list"></i> </a>*}

                    <a href="javascript:void(0);" class="btn btn-sm btn-info copy_to_clipboard" aria-label="{$password->username}"><i class="fa fa-clipboard"></i></a>

                    <a href="javascript:void(0);" class="btn btn-sm btn-warning copy_to_clipboard" aria-label="{$password->password}"><i class="fa fa-lock"></i></a>


                </td>

            </tr>
        {/foreach}






        </tbody>
    </table>
</div>