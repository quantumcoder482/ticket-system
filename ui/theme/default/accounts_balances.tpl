{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Financial Balances']}</h5>

                </div>
                <div class="ibox-content">


                    {*<a href="{$_url}accounts/clear-cache" class="btn btn-primary pull-right" style="margin-bottom: 20px;">{$_L['Clear cache']}</a>*}
                    <table class="table table-striped table-bordered">
                        <th>{$_L['Account']}</th>

                        {foreach $currencies as $currency}
                            <th class="text-right">{$_L['Balance']} [ {$currency->iso_code} ]</th>
                        {/foreach}


                        {foreach $accounts as $account}
                            <tr>
                                <td>{$account->account}</td>
                                {foreach $currencies as $currency}

                                    <td class="text-right amount" data-a-sign="{$currency->symbol} ">{Account::getBalance($account->id,$currency->id)}</td>
                                {/foreach}
                            </tr>
                        {/foreach}
                    </table>

                </div>
            </div>



        </div>



    </div>
{/block}

{block name='script'}
    <script type="text/javascript" src="{$app_url}/ui/lib/numeric.js"></script>

    <script>
        jQuery(document).ready(function() {



            $('.amount').autoNumeric('init', {


                dGroup: 3,
                aPad: true,
                pSign: 'p',
                aDec: '{$config['dec_point']}',
                aSep: '{$config['thousands_sep']}',
                vMax: '9999999999999999.00',
                vMin: '-9999999999999999.00'

            });



        });

    </script>
{/block}
