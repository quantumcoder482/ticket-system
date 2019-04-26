{extends file="$layouts_client"}

{block name="content"}
    <div class="row">
        <div class="col-md-9">
            <section class="panel panel-with-borders">
                <div class="panel-heading">
                    <h2>
                        {$_L['Catalog']}
                    </h2>
                </div>
                <div class="panel-body">
                    <div class="ib-ecom--catalog">
                        <div class="row">

                            {foreach $items as $item}
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="ib-ecom--catalog--item">
                                        <div class="ib-ecom--catalog--item--img">

                                            <a id="item_{$item['id']}" class="view-item" href="{$_url}client/view-item/{$item['id']}">

                                                {if $item['image'] neq ''}
                                                    <img src="{$app_url}storage/items/thumb{$item['image']}">
                                                {else}
                                                    <img src="{$app_url}ui/lib/imgs/item_placeholder.png">
                                                {/if}


                                            </a>
                                        </div>
                                        <div class="ib-ecom--catalog--item--title">
                                            <a href="{$_url}client/view-item/{$item['id']}">{$item['name']}</a>
                                            <div class="ib-ecom--catalog--item--price">
                                                {ib_money_format($item['sales_price'],$config)}
                                                {*<div class="ib-ecom--catalog--item--price--old">*}
                                                {*$754.00*}
                                                {*</div>*}
                                            </div>
                                        </div>
                                        {*<div class="ib-ecom--catalog--item--descr">*}
                                        {*<div class="ib-ecom--catalog--item--descr--sizes">*}
                                        {*<span data-toggle="tooltip" data-placement="right" title="" data-original-title="Size S">S</span>*}
                                        {*<span data-toggle="tooltip" data-placement="right" title="" data-original-title="Size M">M</span>*}
                                        {*<span data-toggle="tooltip" data-placement="right" title="" data-original-title="Size XL">XL</span>*}
                                        {*</div>*}
                                        {*Including Lenses*}
                                        {*</div>*}
                                    </div>
                                </div>
                            {/foreach}

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body" id="load_shopping_cart">

                </div>
            </div>

        </div>
    </div>
{/block}

{block name="script"}
    <script>
        $(function () {

            var $modal = $('#ajax-modal');

            var $load_shopping_cart = $("#load_shopping_cart");

            function loadShoppingCart() {

                $load_shopping_cart.html(block_msg);

                $.get( base_url + "client/ajax_shopping_cart", function( data ) {
                    $load_shopping_cart.html(data);
                });
            }

            loadShoppingCart();

            $('.view-item').click(function (e) {
                e.preventDefault();

                var item_id = this.id;

                $('body').modalmanager('loading');

                $modal.load( base_url + 'client/modal_view_item/' +  item_id, '', function(){
                    $modal.modal();



                });

            });


            $modal.on('click', '.add_to_cart', function(e) {

                e.preventDefault();



                var form_item_id = $('#form_item_id').val();
                var form_item_qty = $('#form_item_quantity').val();

                $.get( base_url + "client/ajax_add_item/"+form_item_id+'/'+form_item_qty, function( data ) {
                   // alert(data);
                    loadShoppingCart();
                });

                $modal.modal('toggle');


            });




        })
    </script>
{/block}