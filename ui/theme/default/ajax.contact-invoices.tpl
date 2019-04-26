<a href="{$_url}invoices/add/1/{$cid}/" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> {$_L['New Invoice']}</a>
<a href="{$_url}invoices/add/recurring/{$cid}/" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> {$_L['New Recurring Invoice']}</a>

<hr>

<h4> {$_L['Total Invoice Amount']}: <span class="amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}">{$total_invoice_amount}</span></h4>
<h4> {$_L['Total Paid Amount']}: <span class="amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}">{$total_paid_amount}</span></h4>
<h4> {$_L['Total Un Paid Amount']}: <span class="amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}">{$total_unpaid_amount}</span></h4>

<hr>

<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>
        <th>#</th>
        <th>{$_L['Account']}</th>
        <th>{$_L['Amount']}</th>
        <th>{$_L['Invoice Date']}</th>
        <th>{$_L['Due Date']}</th>
        <th>{$_L['Status']}</th>
        <th class="text-right">{$_L['Manage']}</th>
    </tr>
    </thead>
    <tbody>

    {foreach $invoices as $invoice}
        <tr>
            <td>{$invoice['invoicenum']}{if $invoice['cn'] neq ''} {$invoice['cn']} {else} {$invoice['id']} {/if}</td>
            <td>{$invoice['account']}</td>
            <td class="amount" data-a-sign="{if $invoice['currency_symbol'] eq ''} {$config['currency_code']} {else} {$invoice['currency_symbol']}{/if} ">{$invoice['total']}</td>
            <td>{date( $config['df'], strtotime($invoice['date']))}</td>
            <td>{date( $config['df'], strtotime($invoice['duedate']))}</td>
            <td>{ib_lan_get_line($invoice['status'])}</td>
            <td>
                <a href="{$_url}invoices/view/{$invoice['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> {$_L['View']}</a>
                <a href="{$_url}invoices/edit/{$invoice['id']}/" class="btn btn-info btn-xs"><i class="fa fa-repeat"></i> {$_L['Edit']}</a>
            </td>
        </tr>
    {/foreach}

    </tbody>
</table>