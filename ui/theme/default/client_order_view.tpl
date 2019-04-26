{extends file="$layouts_client"}

{block name="content"}
    <div class="panel panel-default">

        <div class="panel-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="well">
                        <h4>{$_L['Order Number']} - {$order->ordernum}</h4>
                        <p><strong>{$_L['Customer']}: </strong> {$order->cname}</p>
                        {*<p><strong>{$_L['Product_Service']}: </strong> {$order->stitle}</p>*}
                        <p><strong>{$_L['Amount']}: </strong> <span class="amount">{$order->amount}</span> </p>
                        <p><strong>{$_L['Date']}: </strong>{date( $config['df'], strtotime($order->date_added))}</p>
                        <p><strong>{$_L['Status']}: </strong>

                            {if $order->status eq 'Active'}
                                <span class="label label-success">{ib_lan_get_line($_L[$order->status])}</span>
                            {else}
                                <span class="label label-danger">{ib_lan_get_line($_L[$order->status])}</span>
                            {/if}
                        </p>
                        {if $order->iid neq '0'}
                            <p><strong>{$_L['Invoice']}: </strong> {$order->iid} </p>
                        {/if}



                    </div>
                </div>
                <div class="col-md-8">
                    <h4>{$_L['Product_Service']}</h4>

                    <hr>

                    <div class="table-responsive">
                        <table class="table invoice-items">
                            <thead>
                            <tr class="h5 text-dark">

                                <th id="cell-item" class="text-semibold">{$_L['Item']}</th>

                                <th id="cell-price" class="text-center text-semibold">{$_L['Price']}</th>
                                {*<th id="cell-qty" class="text-center text-semibold">{$_L['Quantity']}</th>*}
                                <th id="cell-qty" class="text-center text-semibold">{$_L['Quantity']}</th>
                                <th id="cell-total" class="text-center text-semibold">{$_L['Total']}</th>
                            </tr>
                            </thead>
                            <tbody>

                            {foreach $orderItems as $item}
                                <tr>

                                    <td class="text-semibold text-dark">{$item->item_name}</td>

                                    <td class="text-center amount" data-a-sign="{$config['currency_code']} ">{$item->unit_price}</td>
                                    <td class="text-right">{$item->quantity}</td>
                                    <td class="text-center amount" data-a-sign="{$config['currency_code']} ">{$item->total}</td>
                                </tr>
                            {/foreach}

                            <tr class="h5 text-dark">

                                <td colspan="3" class="text-right"><strong>{$_L['Total']}</strong></td>


                                <td class="text-center amount" data-a-sign="{$config['currency_code']} ">{$order->amount}</td>

                            </tr>

                            </tbody>
                        </table>

                    </div>



                    <hr>

                    <h4>{$_L['Activation Message']}</h4>
                    <hr>

                    <h4>{$order->activation_subject}</h4>

                    <hr>


                    {$order->activation_message}


                </div>
            </div>




        </div>
    </div>
{/block}
