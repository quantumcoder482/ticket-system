{extends file="$layouts_admin"}

{block name="content"}

{/block}

{include file="sections/header.tpl"}
<div class="row">
    <div class="widget-1 col-md-6 col-sm-12">
        <div class="panel  {if $t['status'] eq 'Uncleared'} panel-default {else} panel-success {/if}">
            <div class="panel-heading">
                <h3 class="panel-title">{$t['description']}</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{$_url}repeating/edit-post">
                    <div class="form-group">
                        <label for="description">{$_L['Description']}</label>
                        <input type="text" class="form-control" id="description" name="description" value="{$t['description']}">
                    </div>

                    <div class="form-group">
                        <label for="amount">{$_L['Amount']}</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="{$t['amount']}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="account">{$_L['Account']}</label>
                        <select id="account" name="account" disabled>
                            {foreach $d as $ds}
                                <option value="{$ds['account']}" {if $ds['account'] eq $t['account']}selected="selected" {/if}>{$ds['account']}</option>
                            {/foreach}


                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dp1">{$_L['Date']}</label>
                        <div class="input-append date" id="date" data-date-format="dd-mm-yyyy">

                            <div class="input-group">
													<span class="input-group-addon">
													<i class="glyphicon glyphicon-calendar"></i>
													</span>
                                <input type="text" class="form-control"  value="{$t['date']}" name="date" id="dp1">
                            </div>


                        </div>
                    </div>




                    {if $icat eq '1'}
                        <div class="form-group">
                            <label for="cats">{$_L['Category']}</label>
                            <select id="cats" name="cats">
                                <option value="Uncategorized">{$_L['Uncategorized']}</option>
                                {foreach $cats as $cat}
                                    <option value="{$cat['name']}" {if $cat['name'] eq $t['category']}selected="selected" {/if}>{$cat['name']}</option>
                                {/foreach}


                            </select>
                        </div>
                    {/if}

                    <div class="form-group">
                        <label for="pmethod">{$_L['Payment Method']}</label>

                        <select id="pmethod" name="pmethod">

                            {foreach $pms as $pm}
                                <option value="{$pm['name']}" {if $pm['name'] eq $t['method']}selected="selected" {/if}>{$pm['name']}</option>
                            {/foreach}


                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ref">{$_L['Ref']}#</label>
                        <input type="text" class="form-control" id="ref" name="ref" value="{$t['ref']}">
                        <span class="help-block">{$_L['ref_help']}</span>
                    </div>

                    {*<div class="form-group">*}
                        {*<label for="eo">{$_L['Edit_Option']}#</label>*}
                        {*<select class="form-control" id="eo" name="eo">*}
                            {*<option value="single">{$_L['Edit_Single_Occurrence']}</option>*}
                            {*<option value="all">{$_L['Edit_All_Occurrence']}</option>*}

                        {*</select>*}
                    {*</div>*}

                    <input type="hidden" name="id" value="{$t['id']}">
                    {if $t['status'] eq 'Uncleared'} <button type="submit" class="btn btn-primary">{$_L['Submit']}</button> {else} <button type="submit" disabled class="btn btn-primary">{$_L['Payment_Cleared']}</button> {/if}

                </form>
            </div>
        </div>
    </div> <!-- Widget-1 end-->
    <div class="widget-2 col-md-6 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{$_L['Manage']}</h3>
            </div>
            <div class="panel-body">
             {if $t['status'] eq 'Uncleared'}
                 <h3>{$_L['Enter_Transaction']}</h3>

                 <a href="{$_url}repeating/confirm/{$t['id']}" class="btn btn-primary">{$_L['Confirm']}</a> <br>

                 <h3>Mark as Paid</h3>

                 <a href="{$_url}repeating/mark-paid/{$t['id']}" class="btn btn-primary">{$_L['Confirm']}</a> <br>
                 This will mark as Paid without adding transaction.
                 <h3>Partial Payment</h3>
                 <form class="form-inline" role="form" method="post" action="{$_url}repeating/partial-payment/{$t['id']}">
                     <div class="form-group">
                         <label class="sr-only" for="amount">{$_L['Amount']}</label>
                         <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter amount">
                     </div>

                     <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>$f[
                 </form>
{else}
     <h3>{$_L['Payment_Cleared']} : {$t['pdate']}</h3>
             {/if}

                <h3>{$_L['Delete']}</h3>
                <p>{$_L['tr_delete_warning']}</p>
               <a href="{$_url}repeating/delete-single/{$t['id']}" class="btn btn-danger">{$_L['Delete_Single_Occurrence']}</a>
               <a href="{$_url}repeating/delete-multiple/{$t['id']}" class="btn btn-danger">{$_L['Delete_All_Occurrence']}</a>







            </div>
        </div>
    </div>
    <!-- Widget-2 end-->
</div>


{include file="sections/footer.tpl"}
