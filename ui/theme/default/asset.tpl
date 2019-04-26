{extends file="$layouts_admin"}
{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/dp/dist/datepicker.min.css" />
{/block}
{block name="content"}

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <h3>Add an asset</h3>
                    <div class="hr-line-dashed"></div>
                    <form method="post" id="mainForm">
                        <div class="form-group">
                            <label for="inputName">Name*</label>
                            <input class="form-control" id="inputName" name="name" {if $asset} value="{$asset->name}" {/if}>
                        </div>
                        <div class="form-group">
                            <label>Date purchased</label>
                            <input class="form-control" name="date_purchased" datepicker
                                   data-date-format="yyyy-mm-dd" data-auto-close="true"  {if $asset} value="{$asset->date_purchased}" {else} value="{date('Y-m-d')}" {/if}>
                        </div>
                        <div class="form-group">
                            <label>Supported until / Warranty</label>
                            <input class="form-control" name="supported_until" datepicker
                                   data-date-format="yyyy-mm-dd" data-auto-close="true" {if $asset} value="{$asset->supported_until}" {else} value="{date('Y-m-d', strtotime('+1 year'))}" {/if}>
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Price</label>
                            <input class="form-control amount" id="inputPrice" name="price"  {if $asset} value="{$asset->price}" {/if}>
                        </div>
                        <div class="form-group">
                            <label for="inputSerial">Serial</label>
                            <input class="form-control" id="inputSerial" name="serial"  {if $asset} value="{$asset->serial}" {/if}>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <option value="">{$_L['None']}</option>
                                {foreach $categories as $category}
                                    <option value="{$category->id}"
                                            {if $asset && $asset->category_id == $category->id} selected {/if}
                                    >{$category->name}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" rows="10" name="notes">{if $asset}{$asset->notes}{/if}</textarea>
                        </div>
                        <div class="form-group">
                            {if $asset}
                            <input type="hidden" name="asset_id" value="{$asset->id}">
                            {/if}
                            <button class="btn btn-primary" id="btnSubmit" type="submit">Save</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>

        {if $asset}
            <div class="col-md-6">

                <div class="panel">
                    <div class="panel-body">
                        <a href="javascript:;" onclick="confirmThenGoToUrl(event,'delete/asset/{$asset->id}');" class="btn btn-danger">Delete</a>
                    </div>
                </div>

            </div>


        {/if}


    </div>

{/block}

{block name=script}

    <script type="text/javascript" src="{$app_url}ui/lib/dp/dist/datepicker.min.js"></script>
    <script type="text/javascript" src="{$app_url}ui/lib/numeric.js"></script>


    <script>

        $(function () {

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

            $('#btnSubmit').click(function (e) {
                e.preventDefault();

                $.post( "{$_url}assets/asset-post", $('#mainForm').serialize() ).done(function() {
                    window.location = '{$_url}assets/list';
                }).fail(function(data) {
                    console.log(data.responseText);
                    spNotify(data.responseText,'error');
                });
            });
        })

    </script>


{/block}