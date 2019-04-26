{extends file="$layouts_client"}

{block name="content"}
    <section class="panel panel-with-borders">
        <div class="panel-body">
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
                                    <img src="{$_url}ui/lib/imgs/item_placeholder.png">
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
                    <a class="btn btn-primary" href="{$_url}cart/add/{$item->id}">
                        <i class="fa fa-shopping-cart"></i>
                        {$_L['Buy Now']}
                    </a>

                </div>
            </div>
        </div>
    </section>
{/block}