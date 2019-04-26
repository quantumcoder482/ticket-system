{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">

                    <div id="result"></div>

                    <form class="form-horizontal" action="{$_url}sms/init/send_post/" method="post" id="iform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="from">From </label>

                            <div class="col-lg-6"><input type="text" name="from" id="from" class="form-control " value="{$config['sms_sender_name']}">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="sms_to">To </label>

                            <div class="col-lg-6">

                                <select multiple="multiple" id="contacts" name="contacts[]">
                                    {foreach $c as $cs}
                                        <option value="{$cs['phone']}">{$cs['account']} - {$cs['phone']}</option>
                                    {/foreach}
                                </select>

                                <span class="help-block">
                                <a href="#" id="ib_select_all">Select All</a> |
                                <a href="#" id="ib_de_select_all">De Select All</a>
                            </span>

                            </div>
                        </div>


                        <div class="form-group"><label class="col-lg-2 control-label" for="message">SMS </label>

                            <div class="col-lg-6">

                                <textarea class="form-control" name="message" id="message" rows="4"></textarea>

                                <p class="help-block" id="sms-counter">
                                    Remaining: <span class="remaining"></span> | Length: <span class="length"></span> | Messages: <span class="messages"></span>
                                </p>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-6">
                                <button class="btn btn-primary" type="submit" id="send"><i
                                            class="fa fa-check"></i> {$_L['Send']}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>


{/block}