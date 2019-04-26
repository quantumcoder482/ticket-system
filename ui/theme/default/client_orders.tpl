{extends file="$layouts_client"}

{block name="content"}
    <div class="panel panel-default">

        <div class="panel-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>

                        <th>{$_L['Date']}</th>

                        {*<th>{$_L['Title']}</th>*}

                        <th>{$_L['Order']} #</th>


                        <th>{$_L['Amount']}</th>
                        <th>{$_L['Status']}</th>

                    </tr>
                    </thead>
                    <tbody>

                    {foreach $d as $ds}

                        <tr>

                            <td> {date( $config['df'], strtotime({$ds['date_added']}))} </td>

                            {*<td>*}
                                {*<a href="{$_url}client/order_view/{$ds['id']}/{$ds['ordernum']}/">{$ds['stitle']}</a>*}


                            {*</td>*}

                            <td>

                                <a href="{$_url}client/order_view/{$ds['id']}/{$ds['ordernum']}/">{$ds['ordernum']}</a>

                            </td>




                            <td class="amount" data-a-sign="{$config['currency_code']} ">{$ds['amount']}</td>

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

            </div>




        </div>
    </div>
{/block}