{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Payment Gateways']}</h5>

                </div>
                <div class="ibox-content">
                    <a href="{$_url}reorder/pg/" class="btn btn-primary mb-md"><i class="fa fa-arrows"></i> {$_L['Reorder Payment Gateways']}</a>
                    <br>
                    <table class="table table-bordered table-hover sys_table">
                        <thead>
                        <tr>

                            <th>{$_L['Logo']}</th>
                            <th>{$_L['Gateway Name']}</th>
                            <th>{$_L['Setting Name']}</th>
                            <th>{$_L['Value']}</th>
                            <th>{$_L['Status']}</th>
                            <th class="text-right">{$_L['Manage']}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $d as $ds}
                            <tr>

                                <td>
                                    <a href="{$_url}settings/pg-conf/{$ds['id']}/">
                                        {if $ds['logo'] neq ''}
                                            <img src="{$app_url}{$ds['logo']}">
                                        {else}
                                            <img src="{$app_url}ui/lib/imgs/pg/{$ds['processor']}.png">
                                        {/if}

                                    </a>
                                </td>
                                <td><a href="{$_url}settings/pg-conf/{$ds['id']}/">{$ds['name']}</a> </td>
                                <td>{$ds['settings']}</td>
                                <td>{$ds['value']}</td>

                                <td>
                                    {if $ds['status'] eq 'Inactive'}
                                        <span class="label label-danger">{$_L['Inactive']}</span>
                                    {else}
                                        <span class="label label-success">{$_L['Active']}</span>
                                    {/if}

                                </td>

                                <td class="text-right">

                                    <a href="{$_url}settings/pg-conf/{$ds['id']}/" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"></i> {$_L['Edit']}</a>

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
