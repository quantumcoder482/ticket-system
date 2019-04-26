{extends file="$layouts_paper"}

{block name="content"}
    <div class="paper">
        <section class="panel">
            <div class="panel-body">
                {if isset($notify)}
                    {$notify}
                {/if}

                <img class="logo" style="max-height: 40px; width: auto;" src="{$app_url}storage/system/{$config['logo_default']}"
                     alt="Logo">

                <hr>

                <div class="row">

                    <div class="col-md-12">

                        {if $cart && $cart->item_count > 0}
                            <table id="cart_summary" class="table table-bordered stock-management-off">
                                <thead>
                                <tr>
                                    <th width="120px;">{$_L['Product']}</th>
                                    <th>{$_L['Description']}</th>
                                    <th>{$_L['Unit price']}</th>
                                    <th width="100px;">{$_L['Quantity']}</th>
                                    <th>&nbsp;</th>
                                    <th class="text-right">{$_L['Total']}</th>
                                </tr>
                                </thead>

                                <tbody>


                                {foreach $items as $item}

                                    <tr>
                                        <td>
                                            <a href="{$_url}item/{$item['id']}">
                                                <img class="img-responsive" src="{Cart::getItemImage($item['id'])}" alt="{$item['name']}" >
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{$_url}item/{$item['id']}">{$item['name']}</a>
                                        </td>
                                        <td>
                                            {ib_money_format($item['price'],$config)}
                                        </td>

                                        <td class="cart_quantity text-center">

                                            <input class="form-control" size="2" type="text" autocomplete="off"  value="{$item['qty']}" disabled>
                                            <div style="margin-top: 10px;">
                                                <a class="btn btn-primary btn-xs" href="{$_url}cart/add/{$item['id']}"> <span><i class="fa fa-plus"></i></span> </a>
                                                <a class="btn btn-danger btn-xs" href="{$_url}cart/remove/{$item['id']}"> <span><i class="fa fa-minus"></i></span> </a>

                                            </div>
                                        </td>
                                        <td class="cart_delete text-center" data-title="Delete">
                                            <div>
                                                <a href="{$_url}cart/delete/{$item['id']}"><i class="icon-trash"></i></a>
                                            </div>
                                        </td>
                                        <td> {ib_money_format($item['price']*$item['qty'],$config)} </td>

                                    </tr>




                                {/foreach}


                                </tbody>

                                <tfoot>


                                <tr class="cart_total_price">
                                    <td rowspan="4" colspan="3" id="cart_voucher" class="cart_voucher">
                                    </td>
                                    <td colspan="2" class="text-right"><strong>{$_L['Total']}</strong></td>
                                    <td colspan="2"><strong>{ib_money_format($cart->total,$config)}</strong></td>
                                </tr>
                                </tfoot>

                            </table>

                            <p class="cart_navigation clearfix">
                                <a href="{$_url}cart/checkout/" class="btn btn-primary pull-right" title="Proceed to checkout">
                                    <span><i class="fa fa-shopping-cart"></i> {$_L['Proceed to checkout']}</span>
                                </a>

                                {*<a href="" class="btn btn-default">*}
                                {*<i class="icon-chevron-left left"></i>Continue shopping*}
                                {*</a>*}
                            </p>

                        {else}

                            <p>{$_L['Your Cart is empty']}</p>

                        {/if}


                    </div>

                </div>


            </div>
        </section>

    </div>
{/block}