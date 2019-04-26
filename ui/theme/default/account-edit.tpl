{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="widget-1 col-md-6 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{$_L['Edit_Account']}</h3>
                </div>
                <div class="panel-body">
                    <form role="form" name="accadd" method="post" action="{$_url}accounts/edit-post">
                        <div class="form-group">
                            <label for="account">{$_L['Account_Title']}</label>
                            <input type="text" class="form-control" id="account" name="account" value="{$d->account}">
                        </div>
                        <div class="form-group">
                            <label for="description">{$_L['Description']}</label>
                            <input type="text" class="form-control" id="description" name="description" value="{$d->description}">
                        </div>


                        <div class="form-group">
                            <label for="account_number">{$_L['Account Number']}</label>
                            <input type="text" class="form-control" id="account_number" name="account_number" value="{$d->account_number}">
                        </div>

                        <div class="form-group">
                            <label for="contact_person">{$_L['Contact Person']}</label>
                            <input type="text" class="form-control" id="contact_person" name="contact_person" value="{$d->contact_person}">
                        </div>

                        <div class="form-group">
                            <label for="contact_phone">{$_L['Phone']}</label>
                            <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{$d->contact_phone}">
                        </div>

                        <div class="form-group">
                            <label for="ib_url">{$_L['Internet Banking URL']}</label>
                            <input type="text" class="form-control" id="ib_url" name="ib_url" value="{$d->ib_url}">
                        </div>

                        {*{foreach $currencies as $currency}*}

                            {*<div class="form-group">*}
                                {*<label for="balance_{$currency[0]->iso_code}">{$_L['Current balance']} [ {$currency[0]->iso_code} ]</label>*}
                                {*<input type="text" class="form-control amount" id="balance_{$currency[0]->iso_code}" name="balance_{$currency[0]->iso_code}" data-a-sign="{$currency[0]->symbol} "  data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-d-group="3" value="{Account::getBalance($d->id,$currency[0]->id)}">*}
                            {*</div>*}

                        {*{/foreach}*}

                        <input type="hidden" name="id" value="{$d['id']}">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>
                </div>
            </div>
        </div> <!-- Widget-1 end-->

        <!-- Widget-2 end-->
    </div>
{/block}


