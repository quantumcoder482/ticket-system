<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        {if $f_type eq 'edit'}
            {$_L['Edit']}
            {else}
            {$_L['New Currency']}
        {/if}
    </h3>
</div>
<div class="modal-body">

    <form class="form-horizontal" id="ib_modal_form">

        <div class="form-group"><label class="col-lg-4 control-label" for="iso_code">{$_L['Currency_Code']}</label>

            <div class="col-lg-8"><input type="text" id="iso_code" name="iso_code" class="form-control currencyCode" value="{$val['code']}">
                <span class="help-block">{$_L['Currency Example']}</span>
            </div>


        </div>

        {*<div class="form-group"><label class="col-lg-4 control-label" for="symbol">{$_L['Currency Symbol']}</label>*}

            {*<div class="col-lg-8"><input type="text" id="symbol" name="symbol" class="form-control" value="{$val['symbol']}">*}

            {*</div>*}
        {*</div>*}

        <div class="form-group"><label class="col-lg-4 control-label" for="rate">{$_L['Base Conversion Rate']}</label>

            <div class="col-lg-8">

                <input type="text" id="rate" name="rate" class="form-control" value="{$val['rate']}" >

                <span class="help-block">Enter the value of <strong id="selectedCurrency">1 {$val['code']}</strong> = How much {$home_currency->iso_code}?</span>

            </div>
        </div>

        <input type="hidden" name="f_type" id="f_type" value="{$f_type}">
        <input type="hidden" name="cid" id="cid" value="{$val['cid']}">
    </form>

</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Cancel']}</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i class="fa fa-check"></i> {$_L['Save']}</button>
</div>