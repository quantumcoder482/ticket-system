{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Automation']}</h5>

                </div>
                <div class="ibox-content">

                    <form class="form-horizontal" method="post" action="{$_url}settings/consolekey_regen/">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">{$_L['Security Token']}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ckey" value="{$config['ckey']}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> {$_L['Re Generate Key']}</button>
                            </div>
                        </div>
                    </form>

                    <p>{$_L['to_enable_automation']}</p>
                    <br>
                    <p class="text-primary text-center">{$_L['Create the following Cron Job using GET']}</p>
                    <input type="text" class="form-control" value="GET {$_url}console/{$config['ckey']}/">
                    <h3 class="text-primary text-center">{$_L['Or']}</h3>
                    <p class="text-primary text-center">{$_L['Create the following Cron Job using PHP']}</p>
                    <input type="text" class="form-control" value="php-cgi -f {getcwd()}/index.php a=CLI ng=console/{$config['ckey']}/">
                    <h3 class="text-primary text-center">{$_L['Or']}</h3>
                    <p class="text-primary text-center">{$_L['Create the following Cron Job using WGET']}</p>
                    <input type="text" class="form-control" value="WGET '{$_url}console/{$config['ckey']}/'">
                    <hr>
                    <h3>{$_L['Settings']}</h3>
                    <hr>
                    <form method="post" action="{$_url}settings/automation-post/">

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="sys_csw" name="accounting_snapshot" value="on" {if ($arcs['accounting_snapshot']) eq 'Active'}checked{/if}> {$_L['Generate Daily Accounting Snapshot']}
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="sys_csw" name="recurring_invoice" value="on" {if ($arcs['recurring_invoice']) eq 'Active'}checked{/if}> {$_L['Generate Recurring Invoices']}
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="sys_csw" name="notify" value="on" {if ($arcs['notify']) eq 'Active'}checked{/if}> {$_L['Enable Email Notifications']}
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{$_L['Send Notifications To']}: </label>
                            <input type="email" class="form-control" id="notifyemail" name="notifyemail" value="{$arcs['notifyemail']}">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Save Changes']}</button>
                    </form>
                </div>
            </div>



        </div>



    </div>
{/block}
