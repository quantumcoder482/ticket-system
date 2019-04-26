{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Add Deposit']}</h5>

                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" method="post" id="tform" role="form">

                        <div class="form-group">
                            <label for="account" class="col-sm-3 control-label">{$_L['Account']}</label>
                            <div class="col-sm-9">
                                <select id="account" name="account" class="form-control">
                                    <option value="">{$_L['Choose an Account']}</option>
                                    {foreach $d as $ds}
                                        <option value="{$ds['id']}">{$ds['account']}</option>
                                    {/foreach}


                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-sm-3 control-label">{$_L['Code']}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="code" name="code" value="{predict_next_serial($config,'income')}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="date" class="col-sm-3 control-label">{$_L['Date']}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="{$mdate}" name="date" id="date" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">{$_L['Description']}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="description" name="description">
                                <div class="help-block"><a data-toggle="modal" href="#modal_add_item"><i class="fa fa-paperclip"></i> {$_L['Attach File']}</a> </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="currency" class="col-sm-3 control-label">{$_L['Currency']}</label>
                            <div class="col-sm-9">
                                <select id="currency" name="currency" class="form-control">

                                    {foreach $currencies as $currency}
                                        <option value="{$currency['iso_code']}" {if $config['home_currency'] eq $currency['iso_code']}selected{/if}
                                                {if isset($currencies_all[$currency['iso_code']])}
                                            data-a-sign="{$currencies_all[$currency['iso_code']]['symbol']}" data-a-sep="{$currencies_all[$currency['iso_code']]['thousands_separator']}" data-a-dec="{$currencies_all[$currency['iso_code']]['decimal_mark']}" {if ($currencies_all[$currency['iso_code']]['symbol_first'] == true)} data-p-sign="p" {else} data-p-sign="s" {/if}
                                                {/if}>{$currency['iso_code']}</option>
                                    {/foreach}


                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="amount" class="col-sm-3 control-label">{$_L['Amount']}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="amount" name="amount">
                            </div>
                        </div>




                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="cats" class="col-sm-3 control-label">{$_L['Category']}</label>
                                <div class="col-sm-9">
                                    <select id="cats" name="cats" class="form-control">
                                        <option value="Uncategorized">{$_L['Uncategorized']}</option>

                                        {foreach $cats as $cat}
                                            <option value="{$cat['name']}">{$cat['name']}</option>
                                        {/foreach}


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags" class="col-sm-3 control-label">{$_L['Tags']}</label>
                                <div class="col-sm-9">
                                    <select name="tags[]" id="tags"  class="form-control" multiple="multiple">
                                        {foreach $tags as $tag}
                                            <option value="{$tag['text']}">{$tag['text']}</option>
                                        {/foreach}

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="payer" class="col-sm-3 control-label">{$_L['Payer']}</label>
                                <div class="col-sm-9">
                                    <select id="payer" name="payer" class="form-control">
                                        <option value="">{$_L['Choose Contact']}</option>
                                        {foreach $p as $ps}
                                            <option value="{$ps['id']}">{$ps['account']}</option>
                                        {/foreach}


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">{$_L['Method']}</label>
                                <div class="col-sm-9">
                                    <select id="pmethod" name="pmethod" class="form-control">
                                        <option value="">{$_L['Select Payment Method']}</option>
                                        {foreach $pms as $pm}
                                            <option value="{$pm['name']}">{$pm['name']}</option>
                                        {/foreach}


                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status" class="col-sm-3 control-label">{$_L['Status']}</label>
                                <div class="col-sm-9">

                                    <select class="form-control" name="status" id="status">
                                        <option value="Cleared">{$_L['Cleared']}</option>
                                        <option value="Uncleared">{$_L['Uncleared']}</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ref" class="col-sm-3 control-label">{$_L['Ref']}#</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ref" name="ref">
                                    <span class="help-block">{$_L['ref_example']}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="hidden" name="attachments" id="attachments" value="">
                                <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>




        </div>

        <div class="col-lg-8 col-md-6 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Recent Deposits']}</h5>

                </div>
                <div class="ibox-content">

                    <table class="table table-bordered sys_table">
                        <thead>
                        <tr>
                            <th>{$_L['Account']}</th>
                            <th width="50%">{$_L['Description']}</th>
                            <th>{$_L['Amount']}</th>

                        </tr>
                        </thead>
                        <tbody>

                        {foreach $tr as $trs}
                            <tr>

                                <td>{$trs['account']}</td>

                                <td><a href="{$_url}transactions/manage/{$trs['id']}/">
                                        {if $trs['attachments'] neq ''}
                                            <i class="fa fa-paperclip"></i>
                                        {/if}
                                        {$trs['description']}



                                    </a>
                                    {if $trs['code'] neq ''}
                                        <br>
                                        {$trs['code']}
                                    {/if}
                                </td>
                                <td class="amount"
                                {if isset($currencies_all[$trs['currency_iso_code']])}
                                    data-a-sign="{$currencies_all[$trs['currency_iso_code']]['symbol']}" data-a-sep="{$currencies_all[$trs['currency_iso_code']]['thousands_separator']}" data-a-dec="{$currencies_all[$trs['currency_iso_code']]['decimal_mark']}" {if ($currencies_all[$trs['currency_iso_code']]['symbol_first'] == true)} data-p-sign="p" {else} data-p-sign="s" {/if}
                                {/if}
                                >{$trs['amount']}</td>
                            </tr>
                        {/foreach}

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>


    <input type="hidden" id="_lan_no_results_found" value="{$_L['No results found']}">

    <div id="modal_add_item" class="modal fade-scale" tabindex="-1" data-width="600" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">× </button>
            <h4 class="modal-title">{$_L['Attach File']}</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">
                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  {$_L['Drop File Here']}</h3>
                            <br />
                            <span class="note">{$_L['Click to Upload']}</span>
                        </div>

                    </form>


                </div>




            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>

        </div>
    </div>


{/block}

{block name="script"}


    <script>

        Dropzone.autoDiscover = false;

        jQuery(document).ready(function() {


            var $currency = $('#currency');
            var $amount = $("#amount");


            function clxAmountSingleFieldAutoNumeric(amountId) {
                $(amountId).autoNumeric('destroy');
                $(amountId).autoNumeric('init', {
                    aSign: $currency.find(':selected').data('a-sign'),
                    dGroup: {$config['thousand_separator_placement']},
                    aPad: {$config['currency_decimal_digits']},
                    pSign: $currency.find(':selected').data('p-sign'),
                    aDec: $currency.find(':selected').data('a-dec'),
                    aSep: $currency.find(':selected').data('a-sep'),
                    vMax: '9999999999999999.00',
                    vMin: '-9999999999999999.00'

                });
            }

            $currency.on('change',function (event) {
                clxAmountSingleFieldAutoNumeric('#amount');
            });



            clxAmountSingleFieldAutoNumeric('#amount');

            function ib_autonumeric() {
                $('.amount').autoNumeric('init', {
                    vMax: '9999999999999999.00',
                    vMin: '-9999999999999999.00'

                });

            }


            ib_autonumeric();




            $('[data-toggle="datepicker"]').datepicker();

            $("#account").select2({
                    theme: "bootstrap",
                    language: {
                        noResults: function () {
                            return $("#_lan_no_results_found").val();
                        }
                    }
                }
            );
            $("#cats").select2({
                    theme: "bootstrap",
                    language: {
                        noResults: function () {
                            return $("#_lan_no_results_found").val();
                        }
                    }
                }
            );
            $("#pmethod").select2({
                    theme: "bootstrap",
                    language: {
                        noResults: function () {
                            return $("#_lan_no_results_found").val();
                        }
                    }
                }
            );
            $("#payer").select2({
                    theme: "bootstrap",
                    language: {
                        noResults: function () {
                            return $("#_lan_no_results_found").val();
                        }
                    }
                }
            );

            $('#tags').select2({
                tags: true,
                tokenSeparators: [','],
                theme: "bootstrap",
                language: {
                    noResults: function () {
                        return $("#_lan_no_results_found").val();
                    }
                }
            });


            $("#emsg").hide();


            var _url = $("#_url").val();


            var upload_resp;

            var $ib_form_submit = $("#submit");


            var ib_file = new Dropzone("#upload_container",
                {
                    url: _url + "transactions/handle_attachment/",
                    maxFiles: 1,
                    acceptedFiles: "image/*,application/pdf"
                }
            );


            ib_file.on("sending", function() {

                $ib_form_submit.prop('disabled', true);

            });

            ib_file.on("success", function(file,response) {

                $ib_form_submit.prop('disabled', false);

                upload_resp = response;

                if(upload_resp.success == 'Yes'){

                    toastr.success(upload_resp.msg);
                    // $file_link.val(upload_resp.file);
                    // files.push(upload_resp.file);
                    //
                    // console.log(files);

                    $('#attachments').val(function(i,val) {
                        return val + (!val ? '' : ',') + upload_resp.file;
                    });


                }
                else{
                    toastr.error(upload_resp.msg);
                }







            });


            $ib_form_submit.click(function (e) {
                e.preventDefault();
                $('#ibox_form').block({ message: null });
                var _url = $("#_url").val();
                $.post(_url + 'transactions/deposit-post/', {


                    account: $('#account').val(),
                    date: $('#date').val(),

                    amount: $('#amount').val(),
                    cats: $('#cats').val(),
                    description: $('#description').val(),
                    attachments: $('#attachments').val(),
                    tags: $('#tags').val(),
                    payer: $('#payer').val(),
                    pmethod: $('#pmethod').val(),
                    ref: $('#ref').val(),
                    currency: $currency.val(),
                    status: $('#status').val(),
                    code: $('#code').val(),

                })
                    .done(function (data) {
                        var sbutton = $("#submit");
                        var _url = $("#_url").val();
                        if ($.isNumeric(data)) {

                            location.reload();
                        }
                        else {
                            $('#ibox_form').unblock();
                            var body = $("html, body");
                            body.animate({ scrollTop:0 }, '1000', 'swing');
                            $("#emsgbody").html(data);
                            $("#emsg").show("slow");
                        }
                    });
            });




        });



    </script>
{/block}
