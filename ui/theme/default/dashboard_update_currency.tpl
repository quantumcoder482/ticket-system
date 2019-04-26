
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Update Exchange Rate</h3>
</div>
<div class="modal-body">
    <ul class="nav nav-tabs">

        {assign "tab_class" "active"}
        {foreach $currencies as $currency}
            <li class="{$tab_class}"><a href="#tab_{$currency->iso_code}" data-toggle="tab">{$currency->iso_code}</a></li>
            {assign "tab_class" ""}
        {/foreach}


        {*<li><a href="#tab2" data-toggle="tab">Tab 2</a></li>*}
    </ul>

    <form method="post" id="ib_currency_update_form">

        <div class="tab-content">
            {assign "tab_class" "active"}

            {foreach $currencies as $currency}

            <div class="tab-pane {$tab_class}" id="tab_{$currency->iso_code}">

                <br>
                <div class="form-group">
                    <label for="rate_{$currency->iso_code}">{$_L['Base Conversion Rate']}</label>
                    <input type="text" class="form-control" id="rate_{$currency->iso_code}" name="rate_{$currency->iso_code}" value="{$currency->rate}">

                </div>

            </div>
                {assign "tab_class" ""}
            {/foreach}

        </div>
    </form>


</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
    <button type="button" class="btn btn-primary update_currency_submit">Save</button>
</div>