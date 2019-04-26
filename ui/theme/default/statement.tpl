{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['View Statement']}</h5>

                </div>
                <div class="ibox-content">

                    <form class="form-horizontal" method="post" action="{$_url}reports/statement-view" id="tform" role="form">
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">{$_L['Account']}</label>
                            <div class="col-sm-9">
                                <select id="account" name="account">
                                    <option value="">{$_L['Choose an Account']}</option>
                                    {foreach $d as $ds}
                                        <option value="{$ds['account']}">{$ds['account']}</option>
                                    {/foreach}


                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="fdate" class="col-sm-3 control-label">{$_L['From Date']}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="{$tdate}" name="fdate" id="fdate" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tdate" class="col-sm-3 control-label">{$_L['To Date']}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="{$mdate}" name="tdate" id="tdate" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stype" class="col-sm-3 control-label">{$_L['Type']}</label>
                            <div class="col-sm-9">
                                <select id="stype" name="stype" class="form-control">
                                    <option value="all" selected="selected">{$_L['All Transactions']}</option>
                                    <option value="credit">{$_L['Credit']}</option>
                                    <option value="debit">{$_L['Debit']}</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" id="submit" class="btn btn-primary">{$_L['View Statement']}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>



        </div>



    </div>




{/block}
