
<form class="form-horizontal" id="rform">

    <div class="form-group"><label class="col-lg-2 control-label" for="account">{$_L['Account Name']}</label>

        <div class="col-lg-10"><input type="text" id="account" name="account" class="form-control" value="{$d['account']}">

        </div>
    </div>


    <div class="form-group"><label class="col-lg-2 control-label" for="code">{$_L['Code']}</label>

        <div class="col-lg-10"><input type="text" id="code" name="code" class="form-control" value="{$d['code']}">

        </div>
    </div>

    {*<div class="form-group"><label class="col-lg-2 control-label" for="company">{$_L['Company Name']}</label>*}

        {*<div class="col-lg-10"><input type="text" id="company" name="company" class="form-control" value="{$d['company']}">*}

        {*</div>*}
    {*</div>*}


    <div class="form-group"><label class="col-lg-2 control-label" for="company_id">{$_L['Company']}</label>

        <div class="col-lg-10">

            <select id="company_id" name="company_id" class="form-control">
                <option value="0">{$_L['None']}</option>
                {foreach $companies as $company}
                    <option value="{$company['id']}" {if $d->cid eq ($company['id'])}selected{/if}>{$company['company_name']}</option>
                {/foreach}
            </select>

        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label" for="edit_email">{$_L['Email']}</label>

        <div class="col-lg-10"><input type="text" id="edit_email" name="edit_email" class="form-control" value="{$d['email']}">

        </div>
    </div>




    <div class="form-group"><label class="col-lg-2 control-label" for="phone">{$_L['Phone']}</label>

        <div class="col-lg-10"><input type="text" id="phone" name="phone" class="form-control" value="{$d['phone']}">

        </div>
    </div>


    {if $config['show_business_number'] eq '1'}

        <div class="form-group">

            <label class="col-lg-2 control-label" for="business_number">{$config['label_business_number']}</label>

            <div class="col-lg-10">

                <input type="text" id="business_number" name="business_number" class="form-control" value="{$d['business_number']}">

            </div>
        </div>

    {/if}

    {if $config['fax_field']}

        <div class="form-group"><label class="col-lg-2 control-label" for="phone">{$_L['Fax']}</label>

            <div class="col-lg-10"><input type="text" id="fax" name="fax" class="form-control" value="{$d['fax']}">

            </div>
        </div>

    {/if}



    <div class="form-group"><label class="col-lg-2 control-label" for="address">{$_L['Address']}</label>

        <div class="col-lg-10"><input type="text" id="address" name="address" class="form-control" value="{$d['address']}">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="city">{$_L['City']}</label>

        <div class="col-lg-10"><input type="text" id="city" name="city" class="form-control" value="{$d['city']}">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="state">{$_L['State Region']}</label>

        <div class="col-lg-10"><input type="text" id="state" name="state" class="form-control" value="{$d['state']}">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="zip">{$_L['ZIP Postal Code']} </label>

        <div class="col-lg-10"><input type="text" id="zip" name="zip" class="form-control" value="{$d['zip']}">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="country">{$_L['Country']}</label>

        <div class="col-lg-10">

            <select name="country" id="country" class="form-control">
                <option value="">{$_L['Select Country']}</option>
                {$countries}
            </select>

        </div>
    </div>


    <div class="form-group"><label class="col-lg-2 control-label" for="group">{$_L['Group']} </label>

        <div class="col-lg-10">

            <select class="form-control" name="group" id="group">
                <option value="0" {if ($d['gid']) eq 0}selected{/if}>{$_L['None']}</option>
                {foreach $gs as $g}
                    <option value="{$g['id']}" {if ($d['gid']) eq ($g['id'])}selected{/if}>{$g['gname']}</option>
                {/foreach}
            </select>

        </div>
    </div>


    {if $config['accounting'] eq '1'}

        <div class="form-group"><label class="col-md-2 control-label" for="currency">{$_L['Currency']}</label>

            <div class="col-lg-10">
                <select id="currency" name="currency" class="form-control">

                    {foreach $currencies as $currency}
                        <option value="{$currency['id']}"
                                {if ($d['currency']) eq ($currency['id'])}selected="selected" {/if}>{$currency['cname']}</option>
                        {foreachelse}
                        <option value="0">{$config['home_currency']}</option>
                    {/foreach}

                </select>
            </div>
        </div>

    {/if}



    {if $config['client_dashboard'] eq '1'}

    {if $config['customer_custom_username']}

        <div class="form-group"><label class="col-lg-2 control-label" for="username">{$_L['Username']} </label>

            <div class="col-lg-10">

                <input type="text" id="username" name="username" class="form-control" value="{$d['username']}">


            </div>
        </div>


        {/if}


        <div class="form-group"><label class="col-lg-2 control-label" for="password">{$_L['Password']} </label>

            <div class="col-lg-10">

                {* github @nebadom *}

                <input type="password" id="password" name="password" class="form-control" autocomplete="new-password">

                <span class="help-block">{$_L['password_change_help']}</span>

            </div>
        </div>

    {/if}



    {foreach $fs as $f}
        <div class="form-group"><label class="col-lg-2 control-label" for="cf{$f['id']}">{$f['fieldname']}</label>
            {if ($f['fieldtype']) eq 'text'}


                <div class="col-lg-10">
                    <input type="text" id="cf{$f['id']}" name="cf{$f['id']}" class="form-control" value="{if get_custom_field_value($f['id'],$d['id']) neq ''} {get_custom_field_value($f['id'],$d['id'])}{/if}">
                    {if ($f['description']) neq ''}
                        <span class="help-block">{$f['description']}</span>
                    {/if}

                </div>

            {elseif ($f['fieldtype']) eq 'password'}

                <div class="col-lg-10">
                    <input type="password" id="cf{$f['id']}" name="cf{$f['id']}" class="form-control" value="{if get_custom_field_value($f['id'],$d['id']) neq ''} {get_custom_field_value($f['id'],$d['id'])}{/if}">
                    {if ($f['description']) neq ''}
                        <span class="help-block">{$f['description']}</span>
                    {/if}
                </div>

            {elseif ($f['fieldtype']) eq 'dropdown'}
                <div class="col-lg-10">
                    <select id="cf{$f['id']}" name="cf{$f['id']}" class="form-control">
                        {foreach explode(',',$f['fieldoptions']) as $fo}
                            <option value="{$fo}" {if get_custom_field_value($f['id'],$d['id']) eq $fo} selected="selected" {/if}>{$fo}</option>
                        {/foreach}
                    </select>
                    {if ($f['description']) neq ''}
                        <span class="help-block">{$f['description']}</span>
                    {/if}
                </div>


            {elseif ($f['fieldtype']) eq 'textarea'}

                <div class="col-lg-10">
                    <textarea id="cf{$f['id']}" name="cf{$f['id']}" class="form-control" rows="3">{if get_custom_field_value($f['id'],$d['id']) neq ''} {get_custom_field_value($f['id'],$d['id'])}{/if}</textarea>
                    {if ($f['description']) neq ''}
                        <span class="help-block">{$f['description']}</span>
                    {/if}
                </div>

            {else}
            {/if}
        </div>
    {/foreach}
    <div class="form-group"><label class="col-lg-2 control-label" for="tags">{$_L['Tags']}</label>

        <div class="col-lg-10">

            {*<input type="text" id="tags" name="tags" style="width:100%" value="{$d['tags']}">*}
            <select name="tags[]" id="tags"  class="form-control" multiple="multiple">
                {foreach $tags as $tag}
                    <option value="{$tag['text']}" {if in_array($tag['text'],$dtags)}selected="selected"{/if}>{$tag['text']}</option>
                {/foreach}

            </select>

        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">

            <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Submit']}</button>
        </div>
    </div>
    <input type="hidden" name="fcid" id="fcid" value="{$d['id']}">
</form>