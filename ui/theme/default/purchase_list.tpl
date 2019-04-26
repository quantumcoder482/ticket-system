{extends file="$layouts_admin"}

{block name="content"}


    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header">{$_L['Purchase Orders']}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-meadow">
                            <span class="amount" data-a-sign="{$config['currency_code']} ">{$invoice_paid_amount}</span>
                        </h3>
                        <small>{$_L['Paid']}</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar-check-o"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                            <span style="width: {$p['Paid']['percentage']}%;" class="progress-bar progress-bar-primary bg-green-meadow">
                                                <span class="sr-only">{$p['Paid']['percentage']}%</span>
                                            </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> {$_L['Percentage']} </div>
                        <div class="status-number"> {$p['Paid']['percentage']}% </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red">
                            <span class="amount" data-a-sign="{$config['currency_code']} ">{$invoice_un_paid_amount}</span>
                        </h3>
                        <small>{$_L['Unpaid']}</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar-check-o"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                            <span style="width: {$p['Unpaid']['percentage']}%;" class="progress-bar progress-bar-primary bg-red">
                                                <span class="sr-only">{$p['Unpaid']['percentage']}%</span>
                                            </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> {$_L['Percentage']} </div>
                        <div class="status-number"> {$p['Unpaid']['percentage']}% </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue">
                            <span class="amount" data-a-sign="{$config['currency_code']} ">{$invoice_partially_paid_amount}</span>
                        </h3>
                        <small>{$_L['Partially Paid']}</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar-check-o"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                            <span style="width: {$p['Partially Paid']['percentage']}%;" class="progress-bar progress-bar-primary green-sharp">
                                                <span class="sr-only">{$p['Partially Paid']['percentage']}%</span>
                                            </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> {$_L['Percentage']} </div>
                        <div class="status-number"> {$p['Partially Paid']['percentage']}% </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-hoki">
                            <span class="amount" data-a-sign="{$config['currency_code']} ">{$invoice_cancelled_amount}</span>
                        </h3>
                        <small>{$_L['Cancelled']}</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar-check-o"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                            <span style="width: {$p['Cancelled']['percentage']}%;" class="progress-bar progress-bar-primary bg-blue-hoki">
                                                <span class="sr-only">{$p['Cancelled']['percentage']}%</span>
                                            </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> {$_L['Percentage']} </div>
                        <div class="status-number"> {$p['Cancelled']['percentage']}% </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {*{if $view_type == 'filter'}*}
                    {*<h5>{$_L['Total']} : {$total_invoice}</h5>*}
                    {*{else}*}
                    {*<h5>{$paginator['found']} {$_L['Records']}. {if $paginator['found'] > 0}{$_L['Page']} {$paginator['page']} {$_L['of']} {$paginator['lastpage']}.{/if}</h5>*}
                    {*{/if}*}

                    {$_L['Purchase Orders']}


                    <div class="ibox-tools">
                        {*{if $view_type neq 'filter'}*}
                        {*<a href="{$_url}invoices/list/filter/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> {$_L['Filter']}</a>*}
                        {*{else}*}
                        {*<a href="{$_url}invoices/list/" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> {$_L['Back']}</a>*}
                        {*{/if}*}
                        {*<a href="{$_url}invoices/list-recurring/" class="btn btn-success btn-xs"><i class="fa fa-repeat"></i> {$_L['Manage Recurring Invoices']}</a>*}
                        <a href="{$_url}purchases/add/" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> {$_L['New Purchase Order']}</a>
                        <a href="{$_url}reports/purchases/" class="btn btn-primary btn-xs"><i class="fa fa-bar-chart"></i> {$_L['View Reports']}</a>

                    </div>
                </div>
                <div class="ibox-content">




                    {if $view_type == 'filter'}
                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" name="name" id="foo_filter" class="form-control" placeholder="{$_L['Search']}..."/>

                                    </div>
                                </div>

                            </div>
                        </form>
                    {/if}

                    <table class="table table-bordered table-hover sys_table footable" {if $view_type == 'filter'} data-filter="#foo_filter" data-page-size="50" {/if}>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{$_L['Account']}</th>
                            <th>{$_L['Amount']}</th>
                            <th>{$_L['Issued at']}</th>
                            {*<th>{$_L['Due Date']}</th>*}
                            <th>
                                {$_L['Status']}
                            </th>
                            <th>{$_L['Type']}</th>
                            <th class="text-right" width="120px;">{$_L['Manage']}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $d as $ds}
                            <tr>
                                <td data-value="{$ds['id']}"><a href="{$_url}purchases/view/{$ds['id']}/">{$ds['invoicenum']}{if $ds['cn'] neq ''} {$ds['cn']} {else} {$ds['id']} {/if}</a> </td>
                                <td><a href="{$_url}contacts/view/{$ds['userid']}/">{$ds['account']}</a> </td>
                                <td class="amount" data-a-sign="{if $ds['currency_symbol'] eq ''} {$config['currency_code']} {else} {$ds['currency_symbol']}{/if} ">{$ds['total']}</td>
                                <td data-value="{strtotime($ds['date'])}">{date( $config['df'], strtotime($ds['date']))}</td>
                                {*<td data-value="{strtotime($ds['duedate'])}">{date( $config['df'], strtotime($ds['duedate']))}</td>*}
                                <td>

                                    {*{if $ds['status'] eq 'Unpaid'}*}
                                        {*<span class="label label-danger">{ib_lan_get_line($ds['status'])}</span>*}
                                    {*{elseif $ds['status'] eq 'Paid'}*}
                                        {*<span class="label label-success">{ib_lan_get_line($ds['status'])}</span>*}
                                    {*{elseif $ds['status'] eq 'Partially Paid'}*}
                                        {*<span class="label label-info">{ib_lan_get_line($ds['status'])}</span>*}
                                    {*{elseif $ds['status'] eq 'Cancelled'}*}
                                        {*<span class="label">{ib_lan_get_line($ds['status'])}</span>*}
                                    {*{else}*}
                                        {*{ib_lan_get_line($ds['status'])}*}
                                    {*{/if}*}

                                    {if $ds['stage'] eq 'Dead'}
                                        <span class="label label-default">{$_L['Dead']}</span>
                                    {elseif $ds['stage'] eq 'Lost'}
                                        <span class="label label-danger">{$_L['Lost']}</span>
                                    {elseif $ds['stage'] eq 'Accepted'}
                                        <span class="label label-success">{$_L['Accepted']}</span>
                                    {elseif $ds['stage'] eq 'Draft'}
                                        <span class="label label-info">{$_L['Draft']}</span>
                                    {elseif $ds['stage'] eq 'Delivered'}
                                        <span class="label label-info">{$_L['Delivered']}</span>
                                    {else}
                                        <span class="label label-info">{$ds['stage']}</span>
                                    {/if}


                                </td>
                                <td>
                                    {if $ds['r'] eq '0'}
                                        <span class="label label-default"><i class="fa fa-dot-circle-o"></i> {$_L['Onetime']}</span>
                                    {else}
                                        <span class="label label-default"><i class="fa fa-repeat"></i> {$_L['Recurring']}</span>
                                    {/if}
                                </td>
                                <td class="text-right">


                                    <a href="{$_url}purchases/view/{$ds['id']}/" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="{$_L['View']}"><i class="fa fa-file-text-o"></i></a>
                                    <a href="{$_url}purchases/clone/{$ds['id']}/" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="{$_L['Clone']}"><i class="fa fa-files-o"></i></a>
                                    <a href="{$_url}purchases/edit/{$ds['id']}/" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="{$_L['Edit']}"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger btn-xs cdelete" id="iid{$ds['id']}" data-toggle="tooltip" data-placement="top" title="{$_L['Delete']}"><i class="fa fa-trash"></i></a>


                                </td>
                            </tr>
                        {/foreach}

                        </tbody>

                        {if $view_type == 'filter'}
                            <tfoot>
                            <tr>
                                <td colspan="8">
                                    <ul class="pagination">
                                    </ul>
                                </td>
                            </tr>
                            </tfoot>
                        {/if}

                    </table>
                    {$paginator['contents']}
                </div>
            </div>
        </div>
    </div>
{/block}