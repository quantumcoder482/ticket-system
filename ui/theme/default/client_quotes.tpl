{extends file="$layouts_client"}

{block name="content"}

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><h5>{$_L['Total']} : {$total_quotes}</h5></h5>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>

                        <th width="30%">{$_L['Subject']}</th>
                        <th>{$_L['Amount']}</th>
                        <th>{$_L['Date Created']}</th>
                        <th>{$_L['Expiry Date']}</th>
                        {*<th>{$_L['Stage']}</th>*}

                        <th class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>

                    {foreach $d as $ds}
                        <tr>

                            <td><a href="{$_url}client/q/{$ds['id']}/token_{$ds['vtoken']}/" target="_blank">{$ds['subject']}</a> </td>
                            <td class="amount">{$ds['total']}</td>
                            <td>{date( $config['df'], strtotime($ds['datecreated']))}</td>
                            <td>{date( $config['df'], strtotime($ds['validuntil']))}</td>


                            <td class="text-right">
                                <a href="{$_url}client/q/{$ds['id']}/token_{$ds['vtoken']}/" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-check"></i></a>

                                <a href="{$_url}client/qpdf/{$ds['id']}/token_{$ds['vtoken']}/dl/" class="btn btn-primary btn-xs" ><i class="fa fa-file-pdf-o"></i> </a>
                                <a href="{$_url}client/qpdf/{$ds['id']}/token_{$ds['vtoken']}/" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> </a>
                            </td>
                        </tr>

                        {foreachelse}

                        <tr>
                            <td colspan="7">
                                {$_L['No Data Available']}
                            </td>
                        </tr>

                    {/foreach}

                    </tbody>
                </table>
            </div>


        </div>
    </div>

{/block}