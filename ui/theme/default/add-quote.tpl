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
                                <textarea class="form-control" id="customer_notes" name="customer_notes" rows="6">
                                    I/we certify that I/we have participated sufficiently in the intellectual content,
                                    conception and design of this work or the analysis and interpretation of the data
                                    (when applicable), as well as the writing of the manuscript, to take public
                                    responsibility for it and have agreed to have my/our name listed as a contributor.
                                    I/we believe the manuscript represents valid work. Neither this manuscript nor one
                                    with substantially similar content under my/our authorship has been published or is
                                    being considered for publication elsewhere, except as described in the covering
                                    letter. I/we certify that all the data collected during the study is presented in
                                    this manuscript and no data from the study has been or will be published separately.
                                    I/we attest that, if requested by the editors, I/we will provide the
                                    data/information or will cooperate fully in obtaining and providing the
                                    data/information on which the manuscript is based, for examination by the editors or
                                    their assignees. I/we also certify that we have taken all necessary permissions from
                                    our institution and/or department for conducting and publishing the present work.

                                    Financial interests, direct or indirect, that exist or may be perceived to exist for
                                    individual contributors in connection with the content of this paper have been
                                    disclosed in the cover letter. Sources of outside support of the project are named
                                    in the cover letter.

                                    I/We hereby transfer(s), assign(s), or otherwise convey(s) all copyright ownership,
                                    including any and all rights incidental thereto, exclusively to the Journal, in the
                                    event that such work is published by the Journal. The Journal shall own the work,
                                    including 1) copyright; 2) the right to grant permission to republish the article in
                                    whole or in part, with or without fee; 3) the right to produce preprints or reprints
                                    and translate into languages other than English for sale or free distribution; and
                                    4) the right to republish the work in a collection of articles in any other
                                    mechanical or electronic format. We give the rights to the corresponding author to
                                    make necessary changes as per the request of the journal, do the rest of the
                                    correspondence on our behalf and he/she will act as the guarantor for the manuscript
                                    on our behalf.

                                    All persons who have made substantial contributions to the work reported in the
                                    manuscript, but who are not contributors, are named in the Acknowledgment and have
                                    given me/us their written permission to be named. If I/we do not include an
                                    Acknowledgment that means I/we have not received substantial contributions from non
                                    -contributors and no contributor has been omitted.
                                </textarea>
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