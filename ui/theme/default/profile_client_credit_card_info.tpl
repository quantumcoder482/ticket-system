<form class="form-horizontal" role="form" id="credit_card_from">
    <fieldset>
        <legend>{$_L['Credit Card Information']}</legend>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name" {if $credit_card}
                        value="{$credit_card->card_holder_name}"
                    {else}
                    value="{$contact->account}"
                {/if}>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="card-number">Card Number</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number"
                       {if $credit_card}
                           value="{$credit_card->card_number}"
                       {/if}
                >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-xs-3">
                        <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
                            <option value="">Month</option>
                            <option value="01" {if $credit_card && $credit_card->expiry_month == '01'}
                                selected
                                    {/if}>Jan (01)</option>
                            <option value="02" {if $credit_card && $credit_card->expiry_month == '02'}
                            selected
                                    {/if}>Feb (02)</option>
                            <option value="03" {if $credit_card && $credit_card->expiry_month == '03'}
                            selected
                                    {/if}>Mar (03)</option>
                            <option value="04" {if $credit_card && $credit_card->expiry_month == '04'}
                            selected
                                    {/if}>Apr (04)</option>
                            <option value="05" {if $credit_card && $credit_card->expiry_month == '05'}
                            selected
                                    {/if}>May (05)</option>
                            <option value="06" {if $credit_card && $credit_card->expiry_month == '06'}
                            selected
                                    {/if}>June (06)</option>
                            <option value="07" {if $credit_card && $credit_card->expiry_month == '07'}
                            selected
                                    {/if}>July (07)</option>
                            <option value="08" {if $credit_card && $credit_card->expiry_month == '08'}
                            selected
                                    {/if}>Aug (08)</option>
                            <option value="09" {if $credit_card && $credit_card->expiry_month == '09'}
                            selected
                                    {/if}>Sep (09)</option>
                            <option value="10" {if $credit_card && $credit_card->expiry_month == '10'}
                            selected
                                    {/if}>Oct (10)</option>
                            <option value="11" {if $credit_card && $credit_card->expiry_month == '11'}
                            selected
                                    {/if}>Nov (11)</option>
                            <option value="12" {if $credit_card && $credit_card->expiry_month == '12'}
                            selected
                                    {/if}>Dec (12)</option>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <select class="form-control" name="expiry-year">
                            <option value="18" {if $credit_card && $credit_card->expiry_year == '18'}
                            selected
                                    {/if}>2018</option>
                            <option value="19"{if $credit_card && $credit_card->expiry_year == '19'}
                            selected
                                    {/if}>2019</option>
                            <option value="20"{if $credit_card && $credit_card->expiry_year == '20'}
                            selected
                                    {/if}>2020</option>
                            <option value="21"{if $credit_card && $credit_card->expiry_year == '21'}
                            selected
                                    {/if}>2021</option>
                            <option value="22"{if $credit_card && $credit_card->expiry_year == '22'}
                            selected
                                    {/if}>2022</option>
                            <option value="23"{if $credit_card && $credit_card->expiry_year == '23'}
                            selected
                                    {/if}>2023</option>
                            <option value="24"{if $credit_card && $credit_card->expiry_year == '24'}
                            selected
                                    {/if}>2024</option>
                            <option value="25"{if $credit_card && $credit_card->expiry_year == '25'}
                            selected
                                    {/if}>2025</option>
                            <option value="26"{if $credit_card && $credit_card->expiry_year == '26'}
                            selected
                                    {/if}>2026</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code" {if $credit_card}
                    value="{$credit_card->cvv}"
                        {/if}>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="button" id="save_credit_card" class="btn btn-primary">Save</button>
            </div>
        </div>
    </fieldset>
    <input type="hidden" name="contact_id" value="{$cid}">
</form>