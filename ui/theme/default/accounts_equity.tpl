{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">

                    <h3>{$account->account}</h3>

                    <div class="hr-line-dashed"></div>

                    <form method="post" id="mainForm">

                        {foreach $currencies as $currency}

                            <div class="form-group">
                                <label for="balance_{$currency->iso_code}">{$_L['Initial Balance']} [ {$currency->iso_code} ]</label>
                                <input type="text" class="form-control amount" id="balance_{$currency->iso_code}" name="balance_{$currency->iso_code}" {if isset($currencies_all[$currency->iso_code])}
                                    data-a-sign="{$currencies_all[$currency->iso_code]['symbol']}" data-a-sep="{$currencies_all[$currency->iso_code]['thousands_separator']}" data-a-dec="{$currencies_all[$currency->iso_code]['decimal_mark']}" {if ($currencies_all[$currency->iso_code]['symbol_first'] == true)} data-p-sign="p" {else} data-p-sign="s" {/if}
                                {/if} data-d-group="3">
                            </div>

                        {/foreach}

                        <input type="hidden" name="account_id" value="{$account->id}">

                        <button class="btn btn-primary" type="submit" id="btnSubmit">{$_L['Submit']}</button>

                    </form>

                </div>



            </div>
        </div>
    </div>

{/block}

{block name=script}

    <script type="text/javascript" src="{$app_url}ui/lib/numeric.js"></script>

    <script>

        $(function () {

            $('.amount').autoNumeric('init', {
                vMax: '9999999999999999.00',
                vMin: '-9999999999999999.00'
            });

            $('#btnSubmit').click(function (e) {
                e.preventDefault();
                $.post("{$_url}accounts/equity-post", $('#mainForm').serialize()).done(function () {
                    window.location = '{$_url}accounts/list';
                }).fail(function (data) {
                    spNotify(data.responseText, 'error');
                });

            });

        })

    </script>


{/block}