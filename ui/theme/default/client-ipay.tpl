<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{$_L['Invoice']} - {$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if}</title>

    <link rel="shortcut icon" href="{$app_url}storage/icon/favicon.ico" type="image/x-icon" />

    <link href="{$theme}default/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$assets}/css/font-awesome.min.css?ver={$file_build}" rel="stylesheet">
    <link href="{$app_url}ui/lib/icheck/skins/square/blue.css" rel="stylesheet">
    <link href="{$app_url}ui/lib/css/animate.css" rel="stylesheet">
    <link href="{$app_url}ui/lib/toggle/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{$app_url}ui/lib/flag-icon/css/flag-icon.min.css" rel="stylesheet">
    <link href="{$assets}fonts/open-sans/open-sans.css?ver=4.0.1" rel="stylesheet">
    <link href="{$theme}default/css/style.css?ver={$file_build}" rel="stylesheet">
    <link href="{$theme}default/css/component.css?ver={$file_build}" rel="stylesheet">
    <link href="{$theme}default/css/custom.css?ver={$file_build}" rel="stylesheet">
    <link href="{$app_url}ui/lib/icons/css/ibilling_icons.css" rel="stylesheet">
    <link href="{$theme}default/css/material.css" rel="stylesheet">
    <link href="{$app_url}ui/lib/css/ribbon.css" rel="stylesheet">

    {if $config['rtl'] eq '1'}
        <link href="{$_theme}/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$_theme}/css/style-rtl.min.css" rel="stylesheet">
    {/if}

    {if isset($xheader)}
        {$xheader}
    {/if}

    {$config['header_scripts']}
    <style type="text/css">
        body {

            background-color: #FAFAFA;
            overflow-x: visible;
        }
        .paper {
            margin: 50px auto;

            border: 2px solid #DDD;
            background-color: #FFF;
            position: relative;
            width: 800px;
        }

        .panel {

            box-shadow: none;

        }

    </style>
</head>

<body class="fixed-nav">

<div class="paper">
    <section class="panel">
        <div class="panel-body" style="font-size: 14px;">
            <div class="invoice">
                {if isset($notify)}
                    {$notify}
                {/if}
                <header class="clearfix">
                    <div class="row">
                        <div class="col-sm-6 mt-md">
                            <h2 class="h2 mt-none mb-sm text-dark text-bold">{$_L['INVOICE']}</h2>
                            <h4 class="h4 m-none text-dark text-bold">#{$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if}</h4>
                        </div>
                        <div class="col-sm-6 text-right mt-md mb-md">

                            <h4> {$_L['Invoice Total']}: {ib_money_format($d['total'],$config,$d['currency_symbol'])} </h4>
                            {if ($d['credit']) neq '0.00'}
                                <h2> {$_L['Total Paid']}: {ib_money_format($d['credit'],$config,$d['currency_symbol'])}</h2>
                                <h2> {$_L['Amount Due']}: {ib_money_format($i_due,$config,$d['currency_symbol'])}</h2>
                            {/if}
                        </div>
                    </div>
                </header>

                <div class="bill-info">
                    <div class="row">

                        <div class="col-md-12">
                            {if isset($ins)}
                                {$ins}
                            {/if}
                        </div>


                        {if !isset($_no_proof_of_payment)}
                            <div class="col-md-12">
                                <hr>
                                <a data-toggle="modal" href="#modal_add_item" class="btn btn-primary ml-sm"><i class="fa fa-paperclip"></i> {$_L['Proof Of Payment']}</a>
                            </div>
                        {/if}


                    </div>
                </div>



            </div>




        </div>
    </section>

</div>

<div id="modal_add_item" class="modal fade" tabindex="-1" data-width="450" style="display: none;">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">{$_L['Upload']}</h4>
    </div>
    <div class="modal-body">
        <div class="row">

            <div class="col-md-12">

                <form>
                    <div class="form-group">
                        <label for="doc_title">{$_L['Title']}</label>
                        <input type="text" class="form-control" id="doc_title" name="doc_title" value="{$_L['INVOICE']}/{$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']}{/if}/{$_L['Proof Of Payment']}">

                    </div>



                </form>

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
        <input type="hidden" name="file_link" id="file_link" value="">
        <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>
        <button type="button" id="btn_add_file" class="btn btn-primary">{$_L['Submit']}</button>
    </div>

</div>


<input type="hidden" id="_url" name="_url" value="{$_url}">
<input type="hidden" id="_df" name="_df" value="{$config['df']}">
<input type="hidden" id="_lan" name="_lan" value="{$config['language']}">
<!-- END PRELOADER -->
<!-- Mainly scripts -->

<script>

    var _L = [];


    _L['Save'] = '{$_L['Save']}';
    _L['Submit'] = '{$_L['Submit']}';
    _L['Loading'] = '{$_L['Loading']}';
    _L['Media'] = '{$_L['Media']}';
    _L['OK'] = '{$_L['OK']}';
    _L['Cancel'] = '{$_L['Cancel']}';
    _L['Close'] = '{$_L['Close']}';
    _L['Close'] = '{$_L['Close']}';
    _L['are_you_sure'] = '{$_L['are_you_sure']}';
    _L['Saved Successfully'] = '{$_L['Saved Successfully']}';
    _L['Empty'] = '{$_L['Empty']}';

    var app_url = '{$app_url}';
    var base_url = '{$base_url}';

    {if ($config['animate']) eq '1'}
    var config_animate = 'Yes';
    {else}
    var config_animate = 'No';
    {/if}
    {$jsvar}
</script>



<script src="{$app_url}ui/lib/cloudonex.js"></script>

{if $config['language'] neq 'en'}

    <script src="{$app_url}ui/lib/moment/moment-with-locales.min.js"></script>

    <script>
        moment.locale('{$config['momentLocale']}');
    </script>

{else}

    <script src="{$app_url}ui/lib/moment/moment.min.js"></script>

{/if}


<script src="{$app_url}ui/lib/fancybox/fancybox.min.js?ver={$file_build}"></script>

<script src="{$app_url}ui/lib/app.js?ver={$file_build}"></script>
<script src="{$app_url}ui/lib/numeric.js?ver={$file_build}"></script>
<script src="{$app_url}ui/lib/toggle/bootstrap-toggle.min.js"></script>




<!-- iCheck -->
<script src="{$app_url}ui/lib/icheck/icheck.min.js"></script>
<script src="{$theme}default/js/theme.js?ver={$file_build}"></script>


{if isset($xfooter)}
    {$xfooter}
{/if}

{block name=script}{/block}

<script>

    {if !isset($_no_proof_of_payment)}
    Dropzone.autoDiscover = false;
    {/if}


    jQuery(document).ready(function() {
        // initiate layout and plugins


        matForms();

        {if isset($xjq)}
        {$xjq}
        {/if}



        var _url = base_url;

        var $modal = $('#ajax-modal');




        // attach file






        $('[data-toggle="tooltip"]').tooltip();




        {if !isset($_no_proof_of_payment)}

        $.fn.modal.defaults.width = '700px';

        var $btn_add_file = $("#btn_add_file");

        var $file_link = $("#file_link");

        var upload_resp;

        var ib_file = new Dropzone("#upload_container",
            {
                url: base_url + "client/upload/{$d->vtoken}/{$d->id}",
                maxFiles: 1
            }
        );


        ib_file.on("sending", function() {

            $btn_add_file.prop('disabled', true);

        });

        ib_file.on("success", function(file,response) {

            $btn_add_file.prop('disabled', false);

            upload_resp = response;

            if(upload_resp.success == 'Yes'){

                toastr.success(upload_resp.msg);
                $file_link.val(upload_resp.file);


            }
            else{
                toastr.error(upload_resp.msg);
            }


        });




        var $doc_title = $("#doc_title");


        $btn_add_file.on('click', function(e) {
            e.preventDefault();


            $.post( _url + "client/doc_payment_proof", { title: $doc_title.val(), file_link: $file_link.val(), rid: iid, rtype: 'invoice' })
                .done(function( data ) {

                    if ($.isNumeric(data)) {

                        //   location.reload();

                        window.location = _url + 'client/iview/'  + iid + '/' + i_token;



                    }

                    else {

                        toastr.error(data);
                    }




                });


        });

        {/if}



    });

</script>
{$config['footer_scripts']}
</body>

</html>
