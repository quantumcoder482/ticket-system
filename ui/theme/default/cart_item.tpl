{extends file="layouts/paper.tpl"}

{block name="content"}
    <div class="paper">
        <section class="panel">
            <div class="panel-body">
                {if isset($notify)}
                    {$notify}
                {/if}

                <img class="logo" style="max-height: 40px; width: auto;" src="{$app_url}storage/system/logo.png" alt="Logo">

                <hr>

                <div class="row">

                    <div class="col-md-8">
                        <h3>{$item->name}</h3>

                        {if $item->image neq ''}
                            <hr>
                            <img src="{$app_url}storage/items/{$item->image}" class="img-responsive">
                        {/if}


                        <hr>

                        {$item->description}

                    </div>

                    <div class="col-md-4">
                        <div class="well">

                            <h3>Price: {ib_money_format($item->sales_price,$config)}</h3>
                            <hr>

                            <a href="{$_url}cart/add/{$item->id}" class="md-btn md-btn-primary">{$_L['Buy Now']}</a>

                        </div>
                    </div>

                </div>



            </div>
        </section>

    </div>
{/block}

