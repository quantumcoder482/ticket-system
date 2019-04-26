{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        Search Transaction
                    </h5>

                </div>
                <div class="ibox-content" id="ibox_form">

                    <div class="ibox-content">
                        <form id="invform" method="post">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-horizontal">


                                        <div class="form-group">
                                            <label for="inputEmail3"
                                                   class="col-sm-4 control-label">{$_L['From Date']}</label>

                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="fdate" name="idate" datepicker
                                                       data-date-format="yyyy-mm-dd" data-auto-close="true"
                                                       value="{$fdate}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="inputEmail3"
                                                   class="col-sm-4 control-label">{$_L['To Date']}</label>

                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="tdate" name="idate" datepicker
                                                       data-date-format="yyyy-mm-dd" data-auto-close="true"
                                                       value="{$tdate}">
                                            </div>
                                        </div>







                                        <div class="form-group">
                                            <label for="cn"
                                                   class="col-sm-4 control-label">{$_L['Description']}</label>

                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="cn" name="cn">

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-horizontal">

                                        <div class="form-group">
                                            <label for="cid" class="col-sm-4 control-label">{$_L['Account']}</label>

                                            <div class="col-sm-8">
                                                <select id="account" name="account" class="form-control">
                                                    <option value="">{$_L['Choose an Account']}</option>
                                                    {foreach $d as $ds}
                                                        <option value="{$ds['account']}">{$ds['account']}</option>
                                                    {/foreach}


                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cid" class="col-sm-4 control-label">{$_L['Customer']}</label>

                                            <div class="col-sm-8">
                                                <select id="cid" name="cid" class="form-control">
                                                    <option value="">{$_L['Select Contact']}...</option>
                                                    {foreach $c as $cs}
                                                        <option value="{$cs['id']}">{$cs['account']} {if $cs['email'] neq ''}- {$cs['email']}{/if}</option>
                                                    {/foreach}

                                                </select>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="cid" class="col-sm-4 control-label">{$_L['Category']}</label>

                                            <div class="col-sm-8">
                                                <select id="cats" name="cats" class="form-control">
                                                    <option value="">...</option>
                                                    <option value="Uncategorized">{$_L['Uncategorized']}</option>

                                                    {foreach $cats as $cat}
                                                        <option value="{$cat['name']}">{$cat['name']}</option>
                                                    {/foreach}


                                                </select>

                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="inputPassword3"
                                                   class="col-sm-4 control-label">{$_L['Type']}</label>

                                            <div class="col-sm-8">
                                                <select class="form-control" name="duedate" id="duedate">
                                                    <option value="due_on_receipt" selected>{$_L['All Transactions']}</option>
                                                    <option value="days3">{$_L['Income']}</option>
                                                    <option value="days5">{$_L['Expense']}</option>
                                                    <option value="days7">{$_L['Transfer']}</option>
                                                </select>
                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-right">
                                        <input type="hidden" id="_dec_point" name="_dec_point" value="{$config['dec_point']}">
                                        <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> {$_L['Save Invoice']}
                                        </button>
                                    </div>
                                </div>
                            </div>





                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                <h3>Transactions</h3>
                                <hr>
                            </div>
                        </div>

                    </div>






                </div>
            </div>
        </div>

    </div>


    <input type="hidden" id="_lan_no_results_found" value="{$_L['No results found']}">
{/block}