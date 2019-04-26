<div id="no-more-tables">
    <table class="table table-bordered sys_table">
        <th>{$_L['Date']}</th>
        <th>{$_L['Account']}</th>
        <th>{$_L['Type']}</th>

        <th class="text-right">{$_L['Amount']}</th>

        <th>{$_L['Description']}</th>
        <th class="text-right">{$_L['Dr']}</th>
        <th class="text-right">{$_L['Cr']}</th>
        <th class="text-right">{$_L['Balance']}</th>
        <th>{$_L['Manage']}</th>
        {foreach $tr as $ds}
            <tr class="{if $ds['cr'] eq '0.00'}warning {else}info{/if}">
                <td>{date( $config['df'], strtotime($ds['date']))}</td>
                <td>{$ds['account']}</td>
                <td>{ib_lan_get_line($ds['type'])}</td>

                <td class="text-right amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}">{$ds['amount']}</td>
                <td>{$ds['description']}</td>

                <td class="text-right amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}">{$ds['dr']}</td>

                <td class="text-right amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}">{$config['currency_code']} {$ds['cr']}</td>

                <td class="text-right amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}"><span {if $ds['bal'] < 0}class="text-red"{/if}>{$config['currency_code']} {$ds['bal']}</span></td>

                <td><a href="{$_url}transactions/manage/{$ds['id']}/">{$_L['Manage']}</a></td>
            </tr>
        {/foreach}
    </table>
    </div>
