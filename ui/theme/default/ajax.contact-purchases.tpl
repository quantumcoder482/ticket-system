

<a href="{$_url}purchases/add/1/{$cid}/" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> {$_L['New Purchase Order']}</a>

<hr>

<h4> {$_L['Total Invoice Amount']}: <span class="amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}">{$total_invoice_amount}</span></h4>
<h4> {$_L['Total Paid Amount']}: <span class="amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}">{$total_paid_amount}</span></h4>
<h4> {$_L['Total Un Paid Amount']}: <span class="amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}">{$total_unpaid_amount}</span></h4>

<hr>

<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>
        <th>#</th>
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

    {foreach $i as $ds}
        <tr>
            <td  data-value="{$ds['id']}"><a href="{$_url}purchases/view/{$ds['id']}/">{$ds['invoicenum']}{if $ds['cn'] neq ''} {$ds['cn']} {else} {$ds['id']} {/if}</a> </td>

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
</table>