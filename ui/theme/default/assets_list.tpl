{extends file="$layouts_admin"}
{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/footable/css/footable.core.min.css" />
{/block}
{block name="content"}


    <div class="row">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="file-manager">
                        <h5>{$_L['Assets']}</h5>
                        <div class="hr-line-dashed"></div>

                        <a href="{$_url}assets/asset" class="btn btn-primary btn-block add_asset">{$_L['Add an asset']}</a>
                        <div class="hr-line-dashed"></div>
                        <h5>{$_L['Categories']}</h5>
                        <ul class="folder-list" style="padding: 0">
                            <li><a href="{$_url}assets/list"><i class="fa fa-folder"></i> {$_L['All categories']}</a></li>
                            {foreach $categories as $category}
                                <li><a href="{$_url}assets/list/{$category->id}"><i class="fa fa-folder"></i> {$category->name}</a></li>
                            {/foreach}
                        </ul>

                        <a href="javascript:;" id="btnNewCategory" class="btn btn-primary btn-block">{$_L['New category']}</a>

                        {if $selected_category}
                            <a href="javascript:;" onclick="confirmThenGoToUrl(event,'delete/asset-category/{$category->id}');" class="btn btn-danger btn-block">{$_L['Delete']}</a>
                        {/if}

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">

            <div class="panel">
                <div class="panel-body">

                    <h3>{$_L['Total']}: <span class="amount">{$assets_value}</span></h3>

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
                            <th>{$_L['Name']}</th>
                            <th>{$_L['Date purchased']}</th>
                            <th>{$_L['Supported until']}</th>
                            <th>{$_L['Price']}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $assets as $asset}
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

            $('#btnNewCategory').click(function (e) {
                e.preventDefault();


                bootbox.prompt({
                    title: "{$_L['Category Name']}",
                    buttons: {
                        'cancel': {
                            label: '{$_L['Cancel']}'
                        },
                        'confirm': {
                            label: '{$_L['OK']}'
                        }
                    },
                    callback: function(result) {
                        if (result === null) {

                        } else {
                            $.post( "{$_url}assets/category-post", { category: result } ).done(function() {
                                location.reload();
                            });
                        }
                    }
                });


            });


        });



    </script>


{/block}