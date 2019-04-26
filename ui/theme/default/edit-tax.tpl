{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Edit TAX']}</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="accadd" method="post" action="{$_url}settings/edit-tax-post/">
                        <div class="form-group">
                            <label for="taxname">{$_L['Name']}</label>
                            <input type="text" class="form-control" id="taxname" name="taxname" value="{$d['name']}">
                        </div>
                        <div class="form-group">
                            <label for="taxrate">{$_L['Rate']}</label>
                            <input type="text" class="form-control amount" id="taxrate" name="taxrate" data-a-sign="{$config['currency_code']} "  data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-d-group="2" value="{if $ib_money_format_apply}{{$d['rate']}}{else}{$d['rate'] + 0}{/if}">
                        </div>

                        <input type="hidden" id="tid" name="tid" value="{$d['id']}">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button> | {$_L['Or']} <a href="{$_url}tax/list/"> {$_L['Back To The List']}</a>
                    </form>

                </div>
            </div>



        </div>



    </div>
{/block}
