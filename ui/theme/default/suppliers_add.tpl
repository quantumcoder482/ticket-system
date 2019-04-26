{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">

        <div class="col-md-12">



            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>{$_L['Add Supplier']}</h5>

                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><label class="col-md-4 control-label" for="account">{$_L['Full Name']}<small class="red">*</small> </label>

                                    <div class="col-lg-8"><input type="text" id="account" name="account" class="form-control" autofocus>

                                    </div>
                                </div>



                                <div class="form-group"><label class="col-md-4 control-label" for="cid">{$_L['Company']}</label>

                                    <div class="col-lg-8">

                                        <select id="cid" name="cid" class="form-control">
                                            <option value="0">{$_L['None']}</option>
                                            {foreach $companies as $company}
                                                <option value="{$company['id']}" {if $c_selected_id eq ($company['id'])}selected{/if}>{$company['company_name']}</option>
                                            {/foreach}
                                        </select>
                                        <span class="help-block"><a href="#" class="add_company"><i class="fa fa-plus"></i> {$_L['New Company']}</a> </span>

                                    </div>
                                </div>

                                <div class="form-group"><label class="col-md-4 control-label" for="email">{$_L['Email']}</label>

                                    <div class="col-lg-8"><input type="text" id="email" name="email" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-4 control-label" for="phone">{$_L['Phone']}</label>

                                    <div class="col-lg-8"><input type="text" id="phone" name="phone" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-4 control-label" for="address">{$_L['Address']}</label>

                                    <div class="col-lg-8"><input type="text" id="address" name="address" class="form-control">

                                    </div>
                                </div>


                                <div class="form-group"><label class="col-md-4 control-label" for="city">{$_L['City']}</label>

                                    <div class="col-lg-8"><input type="text" id="city" name="city" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-4 control-label" for="state">{$_L['State Region']}</label>

                                    <div class="col-lg-8"><input type="text" id="state" name="state" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-4 control-label" for="zip">{$_L['ZIP Postal Code']} </label>

                                    <div class="col-lg-8"><input type="text" id="zip" name="zip" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-4 control-label" for="country">{$_L['Country']}</label>

                                    <div class="col-lg-8">

                                        <select name="country" id="country" class="form-control">
                                            <option value="">{$_L['Select Country']}</option>
                                            {$countries}
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group"><label class="col-md-4 control-label" for="currency">{$_L['Currency']}</label>

                                    <div class="col-lg-8">
                                        <select id="currency" name="currency" class="form-control">

                                            {foreach $currencies as $currency}
                                                <option value="{$currency['id']}"
                                                        {if $config['home_currency'] eq ($currency['cname'])}selected="selected" {/if}>{$currency['cname']}</option>
                                                {foreachelse}
                                                <option value="0">{$config['home_currency']}</option>
                                            {/foreach}

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-md-4 control-label" for="tags">{$_L['Tags']}</label>

                                    <div class="col-lg-8">
                                        {*<input type="text" id="tags" name="tags" style="width:100%">*}
                                        <select name="tags[]" id="tags" class="form-control" multiple="multiple">
                                            {foreach $tags as $tag}
                                                <option value="{$tag['text']}">{$tag['text']}</option>
                                            {/foreach}

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-lg-10">

                                        <button class="md-btn md-btn-primary waves-effect waves-light" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Save']}</button> | <a href="{$_url}contacts/list/">{$_L['Or Cancel']}</a>


                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_msg_add_new_group" id="_msg_add_new_group" value="{$_L['Add New Group']}">
    <input type="hidden" name="_msg_group_name" id="_msg_group_name" value="{$_L['Group Name']}">



{/block}