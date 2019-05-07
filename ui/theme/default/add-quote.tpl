{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        {$_L['quote_alias']}
                    </h5>

                </div>
                <div class="ibox-content" id="ibox_form">
                    <form id="invform" method="post">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="alert alert-danger" id="emsg">
                                    <span id="emsgbody"></span>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="subject">{$_L['Subject']}</label>
                                        <input type="text" class="form-control" name="subject" id="subject">
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-horizontal">





                                        <div class="form-group">
                                            <label for="cid" class="col-sm-4 control-label">{$_L['Customer']}</label>

                                            <div class="col-sm-8">
                                                <select id="cid" name="cid" class="form-control">
                                                    <option value="">{$_L['Select Contact']}...</option>
                                                    {foreach $c as $cs}
                                                        <option value="{$cs['id']}"
                                                                {if $p_cid eq ($cs['id'])}selected="selected" {/if}>{$cs['account']} {if $cs['email'] neq ''}- {$cs['email']}{/if}</option>
                                                    {/foreach}

                                                </select>
                                                <span class="help-block"><a href="#" id="contact_add">| {$_L['Or Add New Customer']}</a> </span>
                                            </div>
                                        </div>

                                        {$extra_fields}

                                        <div class="form-group">
                                            <label for="inputPassword3"
                                                   class="col-sm-4 control-label">{$_L['Address']}</label>

                                            <div class="col-sm-8">
                                                <textarea id="address" readonly class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="invoicenum"
                                                   class="col-sm-4 control-label">{$_L['Quote Prefix']}</label>

                                            <div class="col-sm-4">

                                                <input type="text" class="form-control" id="invoicenum" name="invoicenum" value="{$config['quotation_code_prefix']}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cn"
                                                   class="col-sm-4 control-label">{$_L['Quote']} #</label>

                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="cn" name="cn" value="{str_pad($config['quotation_code_current_number'], $config['number_pad'], '0', STR_PAD_LEFT)}">
                                                {*<span class="help-block">{$_L['quote_number_help']}</span>*}
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label for="idate"
                                                   class="col-sm-4 control-label">{$_L['Date Created']}</label>

                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="idate" name="idate" datepicker
                                                       data-date-format="yyyy-mm-dd" data-auto-close="true"
                                                       value="{$idate}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="edate"
                                                   class="col-sm-4 control-label">Month Published</label>

                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="edate" name="edate" datepicker
                                                       data-date-format="yyyy-mm-dd" data-auto-close="true"
                                                       value="{ib_after_1_month()}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="stage"
                                                   class="col-sm-4 control-label">{$_L['Stage']}</label>

                                            <div class="col-sm-8">
                                                <select class="form-control" name="stage" id="stage">
                                                    <option value="Draft">{$_L['Draft']}</option>
                                                    <option value="Accepted">{$_L['Accepted']}</option>
                                                     <option value="Declined">Declined</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <div class="form-group">
                                        <label for="proposal_text">{$_L['Proposal Text']}</label>
                                        <textarea class="form-control" id="proposal_text" name="proposal_text" rows="6"></textarea>
                                        <span class="help-block">{$_L['quote_help_top']}</span>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="customer_notes">{$_L['Customer Notes']}</label>
                                <textarea class="form-control" id="customer_notes" name="customer_notes" rows="6"></textarea>
                                <span class="help-block">{$_L['quote_help_footer']}</span>
                            </div>

                            <div class="text-right">
                                <input type="hidden" id="_dec_point" name="_dec_point" value="{$config['dec_point']}">
                                <input type="hidden" id="taxed_type" name="taxed_type" value="individual">
                                <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> {$_L['Save']}
                                </button>
                            </div>


                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>

    {* lan variables *}

    <input type="hidden" id="_lan_set_discount" value="{$_L['Set Discount']}">
    <input type="hidden" id="_lan_discount" value="{$_L['Discount']}">
    <input type="hidden" id="_lan_discount_type" value="{$_L['Discount Type']}">
    <input type="hidden" id="_lan_percentage" value="{$_L['Percentage']}">
    <input type="hidden" id="_lan_fixed_amount" value="{$_L['Fixed Amount']}">
    <input type="hidden" id="_lan_btn_save" value="{$_L['Save']}">
    <input type="hidden" id="_lan_no_results_found" value="{$_L['No results found']}">


{/block}