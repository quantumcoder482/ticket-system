
    <a href="{$_url}orders/add/" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> {$_L['Add New Order']}</a>

    <hr>

    <table class="table table-bordered table-hover sys_table">
        <thead>
        <tr>
            <th>#</th>
            <th>{$_L['Order']} #</th>
            <th>{$_L['Date']}</th>
            <th>{$_L['Customer']}</th>
            <th>{$_L['Total']}</th>
            <th>{$_L['Status']}</th>

        </tr>
        </thead>
        <tbody>

        {foreach $d as $ds}

            <tr>

                <td><a href="{$_url}orders/view/{$ds['id']}/">{$ds['id']}</a> </td>
                <td>

                    <a href="{$_url}orders/view/{$ds['id']}/">{$ds['ordernum']}</a>

                </td>

                <td> {date( $config['df'], strtotime({$ds['date_added']}))} </td>
                <td>{$ds['cname']}</td>

                <td>
                    {$ds['amount']}

                </td>
                <td>
                    {if $ds['status'] eq 'Active'}
                        <span class="label label-success">{ib_lan_get_line($_L[$ds['status']])}</span>
                    {else}
                        <span class="label label-danger">{ib_lan_get_line($_L[$ds['status']])}</span>
                    {/if}
                </td>
            </tr>

        {/foreach}

        </tbody>
    </table>


