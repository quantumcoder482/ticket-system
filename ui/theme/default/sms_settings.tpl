{extends file="$layouts_admin"}



{block name="content"}
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{$_L['Settings']}</h4>
                </div>
                <div class="panel-body">

                    <form id="spForm" method="post" action="">

                        <div class="form-group">
                            <label for="sms_api_handler">API Handler</label>
                            <select class="form-control" id="sms_api_handler" name="sms_api_handler">
                                <option value="Nexmo" {if $config['sms_api_handler'] eq 'Nexmo'}selected{/if}>Nexmo</option>
                                <option value="Twilio" {if $config['sms_api_handler'] eq 'Twilio'}selected{/if}>Twilio</option>

                                <option value="Routesms" {if $config['sms_api_handler'] eq 'Routesms'}selected{/if}>Routesms</option>
                                <option value="Alanood" {if $config['sms_api_handler'] eq 'Alanood'}selected{/if}>Alanood [UAE]</option>

                                <option value="Textlocal_in" {if $config['sms_api_handler'] eq 'Textlocal_in'}selected{/if}>Textlocal India</option>

                                <option value="Msg91" {if $config['sms_api_handler'] eq 'Msg91'}selected{/if}>Msg91</option>

                                <option value="Custom" {if $config['sms_api_handler'] eq 'Custom'}selected{/if}>Custom</option>
                            </select>
                        </div>


                        <div class="form-group" id="block_sms_sender_name">
                            <label for="sms_sender_name">Sender ID</label>
                            <input class="form-control" id="sms_sender_name" name="sms_sender_name" value="{$config['sms_sender_name']}">
                        </div>


                        <div class="form-group" id="block_sms_req_url">
                            <label for="sms_req_url">HTTP API URL</label>
                            <input class="form-control" id="sms_req_url" name="sms_req_url" value="{$config['sms_req_url']}">
                        </div>

                        <div class="form-group" id="block_sms_request_method">
                            <label for="sms_request_method">HTTP Request Method</label>

                            <select class="form-control" id="sms_request_method" name="sms_request_method">
                                <option value="GET" {if $config['sms_request_method'] eq 'GET'}selected{/if}>GET</option>
                                <option value="POST" {if $config['sms_request_method'] eq 'POST'}selected{/if}>POST</option>
                            </select>
                        </div>

                        <div class="form-group" id="block_sms_http_params">
                            <label for="sms_http_params">HTTP Parameters</label>
                            <textarea class="form-control" name="sms_http_params" id="sms_http_params" rows="4">{$config['sms_http_params']}</textarea>
                            <span>You can use this format {literal} to=={{to}},from=={{from}},message=={{message}}{/literal} as placeholder.</span>
                        </div>

                        <div class="form-group" id="block_sms_auth_username">
                            <label for="sms_auth_username" id="labelUsername">SID</label>
                            <input class="form-control" id="sms_auth_username" name="sms_auth_username" value="{$config['sms_auth_username']}">
                        </div>

                        <div class="form-group" id="block_sms_auth_password">
                            <label for="sms_auth_password" id="labelPassword">Token</label>
                            <input class="form-control" id="sms_auth_password" name="sms_auth_password" value="{$config['sms_auth_password']}">
                        </div>



                        <div class="form-group">
                            <button type="submit" id="saveSmsCredentials" class="btn btn-primary">{$_L['Save']}</button>
                        </div>



                    </form>

                </div>
            </div>
        </div>
    </div>
{/block}

{block name="script"}




    <script>



        $(function () {




            var $block_sms_req_url = $("#block_sms_req_url");
            var $block_sms_request_method = $("#block_sms_request_method");

            var $block_sms_sender_name = $("#block_sms_sender_name");

            var $block_sms_auth_username = $("#block_sms_auth_username");
            var $block_sms_auth_password = $("#block_sms_auth_password");

            var $block_sms_http_params = $("#block_sms_http_params");



            function customParams(status) {



                if(status === 'show'){

                    $block_sms_sender_name.hide();
                    $block_sms_auth_username.hide();
                    $block_sms_auth_password.hide();



                    $block_sms_req_url.show();
                    $block_sms_request_method.show();
                    $block_sms_http_params.show();

                }
                else{

                    $block_sms_sender_name.show();
                    $block_sms_auth_username.show();
                    $block_sms_auth_password.show();

                    $block_sms_req_url.hide();
                    $block_sms_request_method.hide();
                    $block_sms_http_params.hide();

                }

            }


            {if ($config['sms_api_handler']) neq 'Custom'}
            customParams('hide');
            {else}
            customParams('show');
            {/if}

            var $save = $("#saveSmsCredentials");

            $save.on('click', function (e) {
                e.preventDefault();

                $save.prop('disabled',true);

                $.post(base_url + 'sms/init/save-sms-credentials/', $('#spForm').serialize()).done(function (data) {

                    spNotify(data,'success');
                    $save.prop('disabled',false);


                });

            });

            var $sms_api_handler = $("#sms_api_handler");

            function prepareDriver() {
                var $sms_api_handler_val = $sms_api_handler.val();

                switch ($sms_api_handler_val) {
                    case 'Nexmo':

                        customParams('hide');

                        $("#labelUsername").html("API Key");
                        $("#labelPassword").html("API Secret");


                        break;


                    case 'Twilio':

                        customParams('hide');

                        $("#labelUsername").html("SID");
                        $("#labelPassword").html("Token");

                        break;

                    case 'Routesms':

                        customParams('hide');
                        $block_sms_req_url.show();

                        $("#labelUsername").html("Username");
                        $("#labelPassword").html("Password");

                        break;

                    case 'Alanood':

                        customParams('hide');
                        $block_sms_req_url.show();

                        $("#labelUsername").html("Username");
                        $("#labelPassword").html("Password");

                        break;


                    case 'Msg91':

                        customParams('hide');

                        $("#labelUsername").html("Authkey");
                        $block_sms_auth_password.hide();

                        break;



                    case 'Textlocal_in':

                        customParams('hide');
                     //   $block_sms_req_url.show();

                        $("#labelUsername").html("Username");
                        $("#labelPassword").html("Hash / Password");

                        break;

                    case 'Custom':

                        $("#labelUsername").html("Username");
                        $("#labelPassword").html("Password");

                        customParams('show');



                        break;



                }
            }

            prepareDriver();

            $sms_api_handler.on('change',function () {

                prepareDriver();


            });



        })
    </script>

{/block}