{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['General Settings']}</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="accadd" method="post" action="{$_url}settings/app-post">
                        <div class="form-group">
                            <label for="company">{$_L['Application Name']}</label>
                            <input type="text" class="form-control" id="company" name="company"
                                   value="{$config['CompanyName']}">
                            <span class="help-block">{$_L['This Name will be']}</span>
                        </div>


                        {*<div class="form-group">*}
                        {*<label for="theme">{$_L['Theme']}</label>*}
                        {*<select name="theme" id="theme" class="form-control">*}
                        {*<option value="softhash" {if $config['theme'] eq 'softhash'}selected="selected" {/if}>Softhash</option>*}

                        {* by Max Mendez [ github user Akiracr ] *}

                        {*{foreach $themes|default:array() as $theme}*}
                        {*<option value="{$theme}"*}
                        {*{if $config['theme'] eq $theme}selected="selected" {/if}>{ucfirst($theme)}</option>*}
                        {*{/foreach}*}

                        {*</select>*}
                        {*</div>*}
                        {*<div class="form-group">*}
                        {*<label for="nstyle">{$_L['Style']}</label>*}
                        {*<select name="nstyle" id="nstyle" class="form-control">*}
                        {*<option value="dark" {if $config['nstyle'] eq 'dark'}selected="selected" {/if}>Dark</option>*}
                        {*<option value="light" {if $config['nstyle'] eq 'light'}selected="selected" {/if}>Light</option>*}
                        {*<option value="blue" {if $config['nstyle'] eq 'blue'}selected="selected" {/if}>Blue</option>*}
                        {*</select>*}
                        {*</div>*}

                        <div class="form-group">
                            <label for="default_landing_page">{$_L['Default Landing Page']}</label>
                            <select name="default_landing_page" id="default_landing_page" class="form-control">
                                <option value="login"
                                        {if $config['default_landing_page'] eq 'login'}selected="selected" {/if}>{$_L['Admin Login']}</option>
                                <option value="client/login"
                                        {if $config['default_landing_page'] eq 'client/login'}selected="selected" {/if}>{$_L['Client Login']}</option>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="opt_dashboard">{$_L['Dashboard']}</label>
                            <select name="dashboard" id="opt_dashboard" class="form-control">
                                <option value="canvas"
                                        {if $config['dashboard'] eq 'canvas'}selected="selected" {/if}>Canvas</option>



                            </select>
                        </div>





                        <hr>

                        <div class="form-group">
                            <label for="caddress">{$_L['Pay To Address']}</label>

                            <textarea class="form-control" id="caddress" name="caddress"
                                      rows="3">{$config['caddress']}</textarea>
                            {*<span class="help-block">{$_L['You can use html tag']}</span>*}
                        </div>


                        {*<hr>*}

                        {*<div class="form-group">*}
                            {*<label for="customer_code">Customer code</label>*}
                            {*<input type="text" class="form-control" id="show_quantity_as" name="show_quantity_as" value="{$config['show_quantity_as']}">*}

                        {*</div>*}


                        {*<hr>*}

                        <div class="form-group">
                            <label for="inputTaxSystem">{$_L['Tax System']}</label>
                            <select name="tax_system" id="inputTaxSystem" class="form-control">

                                <option value="default" {if $config['tax_system'] eq 'default'}selected="selected" {/if}>Default</option>
                                <option value="ca_quebec" {if $config['tax_system'] eq 'ca_quebec'}selected="selected" {/if}>Quebec Canada</option>
                                <option value="India" {if $config['tax_system'] eq 'India'}selected="selected" {/if}>India</option>

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="inputBusinessLocation">{$_L['Business Location']}</label>
                            {if $config['tax_system']  eq 'default'}

                                <input type="text" class="form-control" id="inputBusinessLocation" name="business_location"
                                       value="{$config['business_location']}">
                                {elseif $config['tax_system'] eq 'India'}
                                <select name="business_location" id="inputBusinessLocation" class="form-control">

                                    {foreach Tax::indianStates() as $state}
                                        <option value="{$state['name']}" {if $config['business_location'] eq $state['name']}selected{/if}>{$state['name']}</option>
                                    {/foreach}

                                </select>

                                {else}
                                <input type="text" class="form-control" id="inputBusinessLocation" name="business_location"
                                       value="{$config['business_location']}">
                            {/if}
                        </div>



                        <div class="form-group">

                            {if $config['tax_system'] == 'India'}

                                <label for="vat_number">GSTIN</label>

                            {else}

                                <label for="vat_number">{$_L['Vat number']}</label>

                            {/if}


                            <input type="text" class="form-control" id="vat_number" name="vat_number"
                                   {if isset($config['vat_number'])} value="{$config['vat_number']}" {/if}>
                        </div>





                        <div class="form-group">

                            <label for="invoice_terms">{$_L['Default Invoice Terms']}</label>

                            <textarea class="form-control" id="invoice_terms" name="invoice_terms"
                                      rows="3">{$config['invoice_terms']}</textarea>

                        </div>

                        <div class="form-group">
                            <label for="iai">{$_L['Invoice Starting']} #</label>
                            <input type="text" class="form-control" id="iai" name="iai">
                            <span class="help-block">{$_L['Enter to set the next invoice']}
                                - <strong>{$ai}</strong> ({$_L['Keep Blank for']})</span>
                        </div>



                        <div class="form-group">
                            <label for="show_quantity_as">{$_L['Default']} : {$_L['Show quantity as']}</label>
                            <input type="text" class="form-control" id="show_quantity_as" name="show_quantity_as" value="{$config['show_quantity_as']}">

                        </div>

                        <div class="form-group">
                            <label for="pdf_font">{$_L['PDF Font']}</label>
                            <select name="pdf_font" id="pdf_font" class="form-control">
                                <option value="default" {if $config['pdf_font'] eq 'default'}selected="selected" {/if}>Default
                                    [Faster PDF Creation with Less Memory]
                                </option>
                                <option value="Helvetica" {if $config['pdf_font'] eq 'Helvetica'}selected="selected" {/if}>
                                    Helvetica
                                </option>
                                <option value="dejavusanscondensed"
                                        {if $config['pdf_font'] eq 'dejavusanscondensed'}selected="selected" {/if}>
                                    dejavusanscondensed [Embed fonts with supports UTF8]
                                </option>

                                <option value="AdobeCJK" {if $config['pdf_font'] eq 'AdobeCJK'}selected="selected" {/if}>
                                    AdobeCJK [Adobe Asian Font pack]
                                </option>

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="i_driver">{$_L['Invoice Creation Method']}</label>
                            <select name="i_driver" id="i_driver" class="form-control">
                                <option value="default"
                                        {if $config['i_driver'] eq 'default'}selected="selected" {/if}>{$_L['Legacy']}</option>
                                <option value="v2"
                                        {if $config['i_driver'] eq 'v2'}selected="selected" {/if}>{$_L['New']}</option>


                            </select>
                        </div>




                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>

                </div>
            </div>







            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Google reCAPTCHA</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="accadd" method="post" action="{$_url}settings/recaptcha_post/">

                        <div class="form-group">
                            <label for="recaptcha">{$_L['Enable Recaptcha']}</label>
                            <select name="recaptcha" id="recaptcha" class="form-control">
                                <option value="1"
                                        {if $config['recaptcha'] eq '1'}selected="selected" {/if}>{$_L['Yes']}</option>
                                <option value="0"
                                        {if $config['recaptcha'] eq '0'}selected="selected" {/if}>{$_L['No']}</option>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recaptcha_sitekey">{$_L['Recaptcha']} {$_L['Site Key']}</label>
                            <input type="text" class="form-control" id="recaptcha_sitekey" name="recaptcha_sitekey" value="{$config['recaptcha_sitekey']}">

                        </div>

                        <div class="form-group">
                            <label for="recaptcha_secretkey">{$_L['Recaptcha']} {$_L['Secret Key']}</label>
                            <input type="text" class="form-control" id="recaptcha_secretkey" name="recaptcha_secretkey" value="{$config['recaptcha_secretkey']}">

                        </div>



                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>

                </div>
            </div>


            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Other Settings']}</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" method="post" action="{$_url}settings/other-settings-post/">


                        <div class="form-group">
                            <label for="customer_code_prefix">Customer Code Prefix</label>
                            <input type="text" class="form-control" name="customer_code_prefix" value="{$config['customer_code_prefix']}">

                        </div>

                        <div class="form-group">
                            <label for="customer_code_current_number">Customer Code Number</label>
                            <input type="text" class="form-control" name="customer_code_current_number" value="{$config['customer_code_current_number']}">

                        </div>

                        <div class="form-group">
                            <label for="invoice_code_prefix">Invoice Prefix</label>
                            <input type="text" class="form-control" name="invoice_code_prefix" value="{$config['invoice_code_prefix']}">

                        </div>

                        <div class="form-group">
                            <label for="invoice_code_current_number">Invoice Number</label>
                            <input type="text" class="form-control" name="invoice_code_current_number" value="{$config['invoice_code_current_number']}">

                        </div>

                        <div class="form-group">
                            <label for="purchase_code_prefix">Purchase Order Prefix</label>
                            <input type="text" class="form-control" name="purchase_code_prefix" value="{$config['purchase_code_prefix']}">

                        </div>

                        <div class="form-group">
                            <label for="purchase_code_current_number">Purchase Order Number</label>
                            <input type="text" class="form-control" name="purchase_code_current_number" value="{$config['purchase_code_current_number']}">

                        </div>

                        <div class="form-group">
                            <label for="quotation_code_prefix">Quote Prefix</label>
                            <input type="text" class="form-control" name="quotation_code_prefix" value="{$config['quotation_code_prefix']}">

                        </div>

                        <div class="form-group">
                            <label for="quotation_code_current_number">Quote Number</label>
                            <input type="text" class="form-control" name="quotation_code_current_number" value="{$config['quotation_code_current_number']}">

                        </div>

                        <div class="form-group">
                            <label for="income_code_prefix">Income Code Prefix</label>
                            <input type="text" class="form-control" name="income_code_prefix" value="{$config['income_code_prefix']}">

                        </div>

                        <div class="form-group">
                            <label for="income_code_current_number">Income Code Number</label>
                            <input type="text" class="form-control" name="income_code_current_number" value="{$config['income_code_current_number']}">

                        </div>


                        <div class="form-group">
                            <label for="expense_code_prefix">Expense Code Prefix</label>
                            <input type="text" class="form-control" name="expense_code_prefix" value="{$config['expense_code_prefix']}">

                        </div>

                        <div class="form-group">
                            <label for="customer_code_current_number">Expense Code Number</label>
                            <input type="text" class="form-control" name="expense_code_current_number" value="{$config['expense_code_current_number']}">

                        </div>


                        <div class="form-group">
                            <label for="contact_extra_field">Contact Extra Field Name</label>
                            <input type="text" class="form-control" name="contact_extra_field" value="{$config['contact_extra_field']}">

                        </div>




                        <div class="form-group">
                            <label for="gmap_api_key">Google Maps {$_L['API Key']}</label>
                            <input type="text" class="form-control" id="gmap_api_key" name="gmap_api_key" value="{$config['gmap_api_key']}">

                        </div>

                        <div class="form-group">
                            <label for="slack_webhook_url">Slack webhook url</label>
                            <input type="text" class="form-control" id="slack_webhhok_url" name="slack_webhook_url" value="{$config['slack_webhook_url']}">

                        </div>




                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>

                </div>
            </div>

            <div class="ibox float-e-margins" id="additional_settings">
                <div class="ibox-title">
                    <h5>{$_L['Additional Settings']}</h5>


                </div>
                <div class="ibox-content">
                    <table class="table table-hover">
                        <tbody>

                        <tr>
                            <td width="80%"><label for="url_rewrite">{$_L['URL Rewrite']} </label>
                                <br>
                                <p>Please do not enable this, unless you are sure.</p>
                            </td>
                            <td><input type="checkbox" {if get_option('url_rewrite') eq '1'}checked{/if}
                                       data-toggle="toggle" data-size="small" data-on="{$_L['Yes']}" data-off="{$_L['No']}"
                                       id="url_rewrite"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label
                                        for="console_notify_invoice_created">{$_L['cron_invoice_created']} </label></td>
                            <td><input type="checkbox" {if get_option('console_notify_invoice_created') eq '1'}checked{/if}
                                       data-toggle="toggle" data-size="small" data-on="{$_L['Yes']}" data-off="{$_L['No']}"
                                       id="console_notify_invoice_created"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="maxmind_installed">Enable Maxmind GeoLite2 </label>
                                <br>
                                <p>Store mmdb file here- /storage/mmdb/GeoLite2-City.mmdb</p>
                            </td>
                            <td><input type="checkbox" {if get_option('maxmind_installed') eq '1'}checked{/if}
                                       data-toggle="toggle" data-size="small" data-on="{$_L['Yes']}" data-off="{$_L['No']}"
                                       id="maxmind_installed"></td>
                        </tr>


                        </tbody>
                    </table>


                </div>
            </div>


        </div>


        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['App Version']}: {$version_number}</h5>

                </div>
                <div class="ibox-content" id="updateStatus">


                    <h4 class="text-center">Build: {$config['build']}</h4>


                </div>
            </div>





        </div>


    </div>
{/block}

{block name="script"}

{/block}
