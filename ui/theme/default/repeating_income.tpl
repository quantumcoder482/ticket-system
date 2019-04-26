{extends file="$layouts_admin"}

{block name="content"}

{/block}

{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-8" style="padding-left: 1px">
        <section class="panel">

            <div class="panel-body">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" method="post" id="tform" role="form">
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">{$_L['Description']}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">{$_L['Amount']}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control amount" id="amount"  data-a-sign="{$config['currency_code']} " data-d-group="2" name="amount">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">First Occurrence {$_L['Date']}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  value="{$mdate}" name="date" id="date" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">
                            <span class="help-block">Put Upcoming Future Date Here</span>
                        </div>
                    </div>





                    <div class="form-group">
                        <label for="frequency" class="col-sm-3 control-label">Frequency</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="frequency" name="frequency">
                                <option value="Monthly">{$_L['Monthly']}</option>
                                <option value="Weekly">{$_L['Weekly']}</option>
                                <option value="Bi Weekly">{$_L['Bi_Weekly']}</option>
                                <option value="Weekly">{$_L['Everyday']}</option>
                                <option value="Every 30 Days">{$_L['Every_30_Days']}</option>
                                <option value="Every 2 Month">{$_L['Every_2_Month']}</option>
                                <option value="Quarterly">{$_L['Quarterly']}</option>
                                <option value="Every 6 Month">{$_L['Every_6_Month']}</option>
                                <option value="Yearly">{$_L['Yearly']}</option>
                                <option value="Once Only">{$_L['Once_Only']}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">{$_L['Number_of_Payment']}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="np" name="np">
                            <span class="help-block">{$_L['frequency_help']}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="account" class="col-sm-3 control-label">{$_L['Account']}</label>
                        <div class="col-sm-9">
                            <select id="account" name="account">
                                <option value="">Choose an {$_L['Account']}</option>
                                {foreach $d as $ds}
                                    <option value="{$ds['account']}">{$ds['account']}</option>
                                {/foreach}


                            </select>
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="col-sm-3">
                            &nbsp;
                        </div>
                        <div class="col-sm-9">
                            <h4><a href="#" id="a_toggle">Advanced</a> </h4>
                        </div>
                    </div>
                    <div id="a_hide">
                        <div class="form-group">
                            <label for="cats" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-9">
                                <select id="cats" name="cats">
                                    <option value="Uncategorized">{$_L['Uncategorized']}</option>
                                    {foreach $cats as $cat}
                                        <option value="{$cat['name']}">{$cat['name']}</option>
                                    {/foreach}


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tags" class="col-sm-3 control-label">Tags</label>
                            <div class="col-sm-9">
                                <input type="text" id="tags" style="width: 100%" name="tags">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Payer</label>
                            <div class="col-sm-9">
                                <select id="payer" name="payer">
                                    <option value="">Choose an {$_L['Account']}</option>
                                    {foreach $prs as $ps}
                                        <option value="{$ps['account']}">{$ps['account']}</option>
                                    {/foreach}


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Method</label>
                            <div class="col-sm-9">
                                <select id="pmethod" name="pmethod">
                                    <option value="">Select Payment Method</option>
                                    {foreach $pms as $pm}
                                        <option value="{$pm['name']}">{$pm['name']}</option>
                                    {/foreach}


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ref" class="col-sm-3 control-label">Ref#</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ref" name="ref">
                                <span class="help-block">e.g. Transaction ID, Check No.</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

</div>



{include file="sections/footer.tpl"}
