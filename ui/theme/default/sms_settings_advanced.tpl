{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form method="post" action="{$_url}sms/settings/post/">
                                <div class="form-group">
                                    <label for="sms_request_method">Request Method</label>
                                    <select class="form-control" name="sms_request_method" id="sms_request_method">
                                        <option value="GET" {if $_c['sms_request_method'] eq 'GET'}selected{/if}>GET</option>
                                        <option value="POST" {if $_c['sms_request_method'] eq 'POST'}selected{/if}>POST</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sms_req_url">Request URL &amp; Params</label>
                                    <textarea class="form-control" rows="3" name="sms_req_url" id="sms_req_url">{$_c['sms_req_url']}</textarea>
                                </div>


                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="well well-sm">
                                <h3>Available Params</h3>
                                <hr>
                                <strong>{literal}{{from}}{/literal}</strong> : From / Sender ID <br>
                                <strong>{literal}{{to}}{/literal}</strong> : To / Mobile Phone Number / Receiver <br>
                                <strong>{literal}{{sms}}{/literal}</strong> : SMS / Message Body / Message Contents / Message Text <br>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{/block}