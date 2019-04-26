{extends file="$layouts_admin"}
{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/footable/css/footable.core.min.css" />
{/block}
{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header">{$_L['Delivery Challans']}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">

                    <a href="{$_url}sales/delivery_challan" class="btn btn-primary"><i class="fa fa-plus"></i> {$_L['New']}</a>

                    <div class="hr-line-dashed"></div>

                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input type="text" name="name" id="foo_filter" class="form-control" placeholder="{$_L['Search']}..."/>

                                </div>
                            </div>

                        </div>
                    </form>

                    <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
                        <thead>
                        <tr>
                            <th>{$_L['Number']}</th>
                            <th>{$_L['Customer']}</th>
                            <th>{$_L['Date']}</th>
                            <th>{$_L['Total']}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $delivery_notes as $delivery_note}
                            <tr>
                                <td  data-value="{$asset->id}"><a href="{$_url}assets/asset/{$asset->id}">{$asset->name}</a> </td>
                                <td>{date( $config['df'], strtotime($asset->date_purchased))}</td>
                                <td>{date( $config['df'], strtotime($asset->supported_until))}</td>
                                <td class="amount">{$asset->price}</td>

                            </tr>
                        {/foreach}

                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="5">
                                <ul class="pagination">
                                </ul>
                            </td>
                        </tr>
                        </tfoot>

                    </table>

                </div>
            </div>
        </div>
    </div>



{/block}

{block name=script}

    <script type="text/javascript" src="{$app_url}ui/lib/footable/js/footable.all.min.js"></script>
    <script type="text/javascript" src="{$app_url}ui/lib/numeric.js"></script>

    <script>


        $(function() {

            $('.footable').footable();

            $('.amount').autoNumeric('init', {

                aSign: '{$config['currency_code']} ',
                dGroup: {$config['thousand_separator_placement']},
                aPad: {$config['currency_decimal_digits']},
                pSign: '{$config['currency_symbol_position']}',
                aDec: '{$config['dec_point']}',
                aSep: '{$config['thousands_sep']}',
                vMax: '9999999999999999.00',
                vMin: '-9999999999999999.00'

            });



        });



    </script>


{/block}