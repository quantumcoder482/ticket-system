{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4>{$_L['Send SMS']}</h4>
                </div>
                <div class="panel-body">

                    <div id="result"></div>

                    <form class="form-horizontal" action="{$_url}sms/init/send_post/" method="post" id="iform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="from">{$_L['From']} </label>

                            <div class="col-lg-6"><input type="text" name="from" id="from" class="form-control " value="{$config['sms_sender_name']}">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="sms_to">{$_L['To']} </label>

                            <div class="col-lg-6">
                                <input type="text" name="sms_to" id="sms_to" class="form-control ">

                                <span class="help-block"><a data-toggle="modal" href="#modal_find_contact">| Or Choose from Contact</a> </span>

                            </div>
                        </div>


                        <div class="form-group"><label class="col-lg-2 control-label" for="sms_type">{$_L['Type']} </label>

                            <div class="col-lg-6">
                                <select class="form-control" name="sms_type" id="sms_type">
                                    <option value="text">Plain Text</option>
                                    <option value="flash">Flash Message</option>
                                    <option value="unicode" selected>Unicode</option>
                                    <option value="wap">Wap Push</option>
                                    <option value="vcal">vcal / vcard</option>
                                    <option value="binary">Binary</option>
                                </select>
                            </div>
                        </div>


                        {if $config['sms_api_handler'] eq 'Msg91'}

                            <div class="form-group"><label class="col-lg-2 control-label" for="sms_route">Route</label>

                                <div class="col-lg-6">
                                    <select class="form-control" name="sms_route" id="sms_route">
                                        <option value="4">Transactional</option>
                                        <option value="1">Promotional</option>
                                    </select>
                                </div>
                            </div>

                        {/if}


                        <div class="form-group"><label class="col-lg-2 control-label" for="message">{$_L['SMS']} </label>

                            <div class="col-lg-6">

                                <textarea class="form-control" name="message" id="message" rows="4"></textarea>

                                <p class="help-block" id="sms-counter">
                                    {$_L['Remaining']}: <span class="remaining"></span> | {$_L['Length']}: <span class="length"></span> | {$_L['Messages']}: <span class="messages"></span>
                                </p>

                                {*<p class="help-block"><a href="#">Choose from Template</a> </p>*}

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

    <div id="modal_find_contact" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">{$_L['Find Phone Number']}</h4>
        </div>
        <div class="modal-body">
            <div class="row">


                <select id="cid" name="cid" class="form-control">
                    <option value="">{$_L['Search Contact']}...</option>
                    {foreach $c as $cs}
                        <option value="{$cs['phone']}">{$cs['account']} - {$cs['phone']}  {if $cs['email'] neq ''} [ {$cs['email']} ]{/if}</option>
                    {/foreach}

                </select>



            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="file_link" id="file_link" value="">
            <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>

        </div>
    </div>


{/block}