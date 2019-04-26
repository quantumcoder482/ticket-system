

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        {$item->name}
    </h3>
</div>
<div class="modal-body">



    <div class="row">
        <div class="col-lg-4">
            <div class="cui-ecommerce--catalog--item">
                <div class="cui-ecommerce--catalog--item--img">
                    <div class="cui-ecommerce--catalog--item--like cui-ecommerce--catalog--item--like__selected">
                        <i class="icmn-heart3 cui-ecommerce--catalog--item--like--liked"><!-- --></i>
                        <i class="icmn-heart4 cui-ecommerce--catalog--item--like--unliked"><!-- --></i>
                    </div>
                    <a href="javascript: void(0);">
                        {if $item->image neq ''}
                            <img src="{$app_url}storage/items/{$item->image}" class="img-responsive">
                        {else}
                            <img src="{$app_url}ui/lib/imgs/item_placeholder.png">
                        {/if}
                    </a>


                </div>
            </div>

        </div>
        <div class="col-lg-8">

            <h3>{$item->name}</h3>
            <h4>{ib_money_format($item->sales_price,$config)}</h4>

            <hr>
            <div class="cui-ecommerce--product--descr">
                {$item->description}
            </div>
            <hr>


            <form class="form-inline" id="form_add_to_cart">
                <div class="form-group">

                    <input type="number" class="form-control" id="form_item_quantity" name="form_item_quantity" placeholder="Quantity" value="1">
                    <input type="hidden" id="form_item_id" name="form_item_id" value="{$item->id}">

                </div>
                <button type="submit" class="btn btn-primary add_to_cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
            </form>

        </div>
    </div>




</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Cancel']}</button>
    {*<button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i class="fa fa-check"></i> {$_L['Save']}</button>*}
</div>