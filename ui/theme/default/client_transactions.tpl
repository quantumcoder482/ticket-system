{extends file="$layouts_client"}

{block name="content"}

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Total']} : {count($d)} </h5>

                </div>
                <div class="ibox-content">

                    <div class="table-responsive">

                        <table class="table table-bordered sys_table">
                            <th>{$_L['Date']}</th>
                            <th>{$_L['Account']}</th>


                            <th class="text-right">{$_L['Amount']}</th>

                            <th>{$_L['Description']}</th>

                            {foreach $d as $ds}
                                <tr class="{if $ds['cr'] eq '0.00'}warning {else}info{/if}">
                                    <td>{date( $config['df'], strtotime($ds['date']))}</td>
                                    <td>{$ds['account']}</td>
                                    {*<td>{$ds['type']}</td>*}
                                    {* From v 2.4 Sadia Sharmin *}



                                    <td class="text-right">{$ds['amount']}</td>
                                    <td>{$ds['description']}</td>

                                    {*<td class="text-right"><span {if $ds['bal'] < 0}class="text-red"{/if}>{$config['currency_code']} {number_format($ds['bal'],2,$config['dec_point'],$config['thousands_sep'])}</span></td>*}
                                    {*<td><a href="{$_url}transactions/manage/{$ds['id']}">{$_L['Manage']}</a></td>*}
                                </tr>
                            {/foreach}



                        </table>

                    </div>



                </div>
            </div>

        </div>

        <!-- Widget-1 end-->

        <!-- Widget-2 end-->
    </div>

{/block}