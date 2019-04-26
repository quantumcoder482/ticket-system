{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">

                    <h3 style="color: #2f96f3;">{$_L['Order']} # {$order->id}</h3>
                    <hr>

                    {if has_access($user->roleid,'orders','edit')}
                        <a href="javascript:;" onclick="confirmThenGoToUrl(event,'orders/set/{$order->id}/Active/');" class="md-btn md-btn-success waves-effect waves-light"><i class="fa fa-check"></i>  {$_L['Accept']} </a>
                        <a href="javascript:;" onclick="confirmThenGoToUrl(event,'orders/set/{$order->id}/Pending/');"  class="md-btn md-btn-primary waves-effect waves-light"><i class="fa fa-clock-o"></i>  {$_L['Pending']} </a>
                        <a href="javascript:;" onclick="confirmThenGoToUrl(event,'orders/set/{$order->id}/Cancelled/');" class="md-btn md-btn-warning waves-effect waves-light"><i class="fa fa-times"></i>  {$_L['Cancel']} </a>
                    {/if}

                    {if has_access($user->roleid,'orders','delete')}
                        <a href="javascript:;" onclick="confirmThenGoToUrl(event,'delete/order/{$order->id}/');" class="md-btn md-btn-danger waves-effect waves-light"><i class="fa fa-trash"></i>  {$_L['Delete']} </a>
                    {/if}


                    <hr>


                    <h4>{$_L['Available Module for this Order']}</h4>

                    <a href="{$_url}orders/module/{$order->id}/" onclick="confirmThenGoToUrl(event,'orders/set/{$order->id}/Active/');" class="md-btn md-btn-primary waves-effect waves-light"><i class="fa fa-plus"></i>  {$_L['Default']} </a>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="well">
                                <h4>{$_L['Order Number']} - {$order->ordernum}</h4>
                                <p><strong>{$_L['Customer']}: </strong> {$order->cname}</p>
                                <p><strong>{$_L['Product_Service']}: </strong> {$order->stitle}</p>
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
                                    <p><strong>{$_L['Invoice']}: </strong> <a href="{$_url}invoices/view/{$order->iid}/">{$order->iid}</a> </p>
                                {/if}



                            </div>
                        </div>
                        <div class="col-md-8">

                            <h4>{$_L['Activation Message']}</h4>
                            <hr>
                            <form method="post" id="ib_form">
                                <div class="form-group">
                                    <label for="activation_subject">{$_L['Subject']}</label>
                                    <input type="text" class="form-control" id="activation_subject" name="activation_subject" value="{$order->activation_subject}">
                                </div>
                                <div class="form-group">
                                    <label for="activation_message">{$_L['Message']}</label>
                                    <textarea class="form-control" id="activation_message" name="activation_message" rows="3">{$order->activation_message}</textarea>
                                </div>

                                <input type="hidden" name="oid" id="oid" value="{$order->id}">

                                <button type="submit" id="btn_activation_message_save" class="md-btn md-btn-success"><i class="fa fa-check"></i> {$_L['Save']}</button>
                                <button type="submit" id="btn_activation_message_send" class="md-btn md-btn-primary"><i class="fa fa-send"></i> {$_L['Send']}</button>

                            </form>


                        </div>
                    </div>



                </div>
            </div>
        </div>



    </div>
{/block}
