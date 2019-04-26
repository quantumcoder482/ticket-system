{extends file="$layouts_admin"}



{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{$_L['SMS Templates']}</h4>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" action="{$_url}sms/init/edit_post/" method="post" id="spForm">






                        <div class="form-group"><label class="col-lg-2 control-label" for="message">SMS </label>

                            <div class="col-lg-6">

                                <textarea class="form-control" name="message" id="message" rows="4">{$template->sms}</textarea>

                                <input type="hidden" name="template_id" id="template_id" value="{$template->id}">

                                <p class="help-block" id="sms-counter">
                                    Remaining: <span class="remaining"></span> | Length: <span class="length"></span> | Messages: <span class="messages"></span>
                                </p>



                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-6">
                                <button class="btn btn-primary" type="submit" id="save"><i
                                            class="fa fa-check"></i> {$_L['Save']}</button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
{/block}

{block name="script"}


    <script type="text/javascript" src="{$app_url}ui/lib/sms/sms_counter.js"></script>

    <script>
        $(function () {




            $('#message').countSms('#sms-counter');

            var $save = $("#save");

            $save.on('click', function (e) {
                e.preventDefault();

                $save.prop('disabled',true);

                $.post(base_url + 'sms/init/edit_post/', $('#spForm').serialize()).done(function (data) {

                    spNotify(data,'success');
                    $save.prop('disabled',false);


                });

            })
        })
    </script>

{/block}