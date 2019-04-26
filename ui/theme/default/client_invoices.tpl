{extends file="$layouts_client"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="row" id="d_ajax_summary">

                        <div class="col-md-4">

                            <table class="table">

                                <tbody>
                                <tr><td>{$_L['Paid']}: </td> <td><span class="amount">{$total_paid_amount}</span> </td></tr>
                                <tr><td>{$_L['Unpaid']}: </td> <td><span class="amount">{$total_unpaid_amount}</span> </td></tr>
                                <tr><td>{$_L['Partially Paid']}: </td> <td><span class="amount">{$total_partially_paid_amount}</span> </td></tr>
                                <tr><td>{$_L['Cancelled']}: </td> <td><span class="amount">{$total_cancelled_amount}</span> </td></tr>
                                <tr><td>&nbsp; </td> <td></td></tr>


                                </tbody>
                            </table>

                            <h3>{$_L['Total Unpaid Amount']}: <span class="amount">{$total_unpaid_amount}</span></h3>

                            {if $config['add_fund']}
                                <h3>{$_L['Balance']}: <span class="amount">{$user->balance}</span></h3>
                                <h3>{$_L['Due']}: <span class="amount">{$due_amount}</span></h3>
                            {/if}

                        </div>


                        <div class="col-md-8">


                            <div class="" style="height:350px" id="invoice_summary"></div>

                        </div>


                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">


            <h5>{$_L['Total']} : {$total_invoice}</h5>


        </div>
        <div class="ibox-content">

            <div class="table-responsive">

                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        {*<th>{$_L['Account']}</th>*}
                        <th>{$_L['Amount']}</th>
                        <th>{$_L['Invoice Date']}</th>
                        <th>{$_L['Due Date']}</th>
                        <th>
                            {$_L['Status']}
                        </th>
                        {*<th>{$_L['Type']}</th>*}
                        <th class="text-right" width="100px">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>

                    {foreach $d as $ds}
                        <tr>
                            <td><a target="_blank"
                                   href="{$_url}client/iview/{$ds['id']}/token_{$ds['vtoken']}/">{$ds['invoicenum']}{if $ds['cn'] neq ''} {$ds['cn']} {else} {$ds['id']} {/if}</a>
                            </td>
                            {*<td>{$ds['account']} </td>*}
                            <td class="amount"
                                data-a-sign="{if $ds['currency_symbol'] eq ''} {$config['currency_code']} {else} {$ds['currency_symbol']}{/if} ">{$ds['total']}</td>
                            <td>{date( $config['df'], strtotime($ds['date']))}</td>
                            <td>{date( $config['df'], strtotime($ds['duedate']))}</td>
                            <td>

                                {if $ds['status'] eq 'Unpaid'}
                                    <span class="label label-danger">{ib_lan_get_line($ds['status'])}</span>
                                {elseif $ds['status'] eq 'Paid'}
                                    <span class="label label-success">{ib_lan_get_line($ds['status'])}</span>
                                {elseif $ds['status'] eq 'Partially Paid'}
                                    <span class="label label-info">{ib_lan_get_line($ds['status'])}</span>
                                {elseif $ds['status'] eq 'Cancelled'}
                                    <span class="label">{ib_lan_get_line($ds['status'])}</span>
                                {else}
                                    {ib_lan_get_line($ds['status'])}
                                {/if}


                            </td>
                            {*<td>*}
                            {*{if $ds['r'] eq '0'}*}
                            {*<span class="label label-success"><i class="fa fa-dot-circle-o"></i> {$_L['Onetime']}</span>*}
                            {*{else}*}
                            {*<span class="label label-success"><i class="fa fa-repeat"></i> {$_L['Recurring']}</span>*}
                            {*{/if}*}
                            {*</td>*}
                            <td class="text-right">
                                <a target="_blank" href="{$_url}client/iview/{$ds['id']}/token_{$ds['vtoken']}/"
                                   class="btn btn-primary btn-xs"><i class="fa fa-check"></i> </a>
                                <a href="{$_url}client/ipdf/{$ds['id']}/token_{$ds['vtoken']}/dl/"
                                   class="btn btn-primary btn-xs"><i class="fa fa-file-pdf-o"></i> </a>
                                <a target="_blank" href="{$_url}iview/print/{$ds['id']}/token_{$ds['vtoken']}/"
                                   class="btn btn-primary btn-xs"><i class="fa fa-print"></i> </a>

                            </td>
                        </tr>
                        {foreachelse}
                        <tr>
                            <td colspan="8">
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