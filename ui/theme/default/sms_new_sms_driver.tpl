{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">



        <div class="col-md-6">



            <div class="panel panel-default">
                <div class="panel-body">

                    <form role="form" name="accadd" method="post" action="{$_url}sms/init/new_sms_driver_step_2">
                        <div class="form-group">
                            <label for="handler">SMS Gateway Provider</label>
                            <select class="form-control" id="handler" name="handler">
                                <option value="nexmo">Nexmo</option>
                                <option value="twilio">Twilio</option>
                                <option value="infobip">Infobip</option>
                                <option value="plivo">Plivo</option>
                                <option value="msg91">Msg91</option>
                                <option value="other">Other</option>

                            </select>

                        </div>




                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Next</button>
                    </form>


                </div>

            </div>
        </div>



    </div>

{/block}