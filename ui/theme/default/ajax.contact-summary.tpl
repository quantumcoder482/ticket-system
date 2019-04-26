
<p>

    <strong>{$_L['Full Name']}: </strong> {$d['account']} <br>
   {if ($d['company']) neq ''}
       <strong>{$_L['Company Name']}: </strong> {$d['company']} <br>
   {/if}
    <strong>{$_L['Email']}: </strong> {if ($d['email']) neq ''} {$d['email']} {else} N/A {/if} <br>

    <strong>{$_L['Phone']}: </strong> {if ($d['phone']) neq ''} {$d['phone']} {else} N/A {/if} <br>

    {if $config['fax_field'] eq '1'}
        <strong>{$_L['Fax']}: </strong> {if ($d['fax']) neq ''} {$d['fax']} {else} N/A {/if} <br>
    {/if}

    <strong>{$_L['Address']}: </strong> {if ($d['address']) neq ''} {$d['address']} {else} N/A {/if} <br>
    <strong>{$_L['City']}: </strong> {if ($d['city']) neq ''} {$d['city']} {else} N/A {/if} <br>
    <strong>{$_L['State Region']}: </strong> {if ($d['state']) neq ''} {$d['state']} {else} N/A {/if} <br>
    <strong>{$_L['ZIP Postal Code']}: </strong> {if ($d['zip']) neq ''} {$d['zip']} {else} N/A {/if} <br>
    <strong>{$_L['Country']}: </strong> {if ($d['country']) neq ''} {$d['country']} {else} N/A {/if} <br>
    <strong>{$_L['Tags']}: </strong> {if ($d['tags']) neq ''} {$d['tags']} {else} N/A {/if} <br>
    <strong>{$_L['Group']}: </strong> {if ($d['gname']) neq ''} {$d['gname']} {else} N/A {/if} <br>

    {foreach $cf as $c}

        <strong>{$c['fieldname']}: </strong> {if get_custom_field_value($c['id'],$d['id']) neq ''} {get_custom_field_value($c['id'],$d['id'])} {else} N/A {/if} <br>

    {/foreach}

</p>

<hr>

<a href="{$_url}contacts/view/{$d->id}/edit/" class="btn btn-warning"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>


{if $config['add_fund'] eq '1'}
    <hr>

    <h3>{$_L['Balance']} : <span class="amount">{$d->balance}</span></h3>
    <a href="javascript:void(0)" class="btn btn-primary add_fund"><i class="fa fa-plus"></i> {$_L['Add Fund']}</a>
    <a href="javascript:void(0)" class="btn btn-danger return_fund"><i class="fa fa-minus"></i> {$_L['Return Fund']}</a>
{/if}

{if $config['client_dashboard'] eq '1'}
    <hr>

    {if $d->autologin neq ''}
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material floating open">
                        <input class="form-control" type="text" id="auto_login_url" name="auto_login_url" value="{$_url}client/autologin/{$d->autologin}">
                        <label for="auto_login_url">{$_L['Auto Login URL']}</label>
                    </div>
                    <p class="help-block">
                        <a href="{$_url}client/autologin/{$d->autologin}" target="_blank">{$_L['Login As Customer']}</a> |
                        <a href="{$_url}contacts/revoke_auto_login/{$d->id}/">{$_L['Revoke Auto Login']}</a> |
                        <a href="{$_url}contacts/gen_auto_login/{$d->id}/">{$_L['Re Generate URL']}</a>
                    </p>
                </div>
            </div>

        </form>

        {$extra_html_1}

    {else}
        <a href="{$_url}contacts/gen_auto_login/{$d->id}/" class="md-btn md-btn-primary"> {$_L['Create Auto Login URL']}</a>
    {/if}
{/if}






{if $config['accounting'] eq '1'}
    <hr>


    <table class="table table-hover margin bottom invoice-total">
        <thead>
        <tr>

            <th colspan="3">{$_L['Accounting Summary']}</th>

        </tr>
        </thead>
        <tbody>
        <tr>

            <td> {$_L['Total Income']}
            </td>
            <td class="text-center"><span class="label label-primary amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}">{$ti}</span></td>

        </tr>
        <tr>

            <td> {$_L['Total Expense']}
            </td>
            <td class="text-center"><span class="label label-danger amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}">{$te}</span></td>


        </tr>



        </tbody>
    </table>

    <table class="table invoice-total">
        <tbody>

        <tr>
            <td><strong>{$happened} :</strong></td>
            <td class="text-center"><strong><span class="label label-{$css_class} amount" data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-a-pad="{$config['currency_decimal_digits']}" data-p-sign="{$config['currency_symbol_position']}" data-a-sign="{$config['currency_code']} " data-d-group="{$config['thousand_separator_placement']}" style="font-size: 11px;">{$d_amount}</span></strong></td>
        </tr>
        </tbody>
    </table>
{/if}