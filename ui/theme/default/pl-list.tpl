{extends file="$layouts_admin"}

{block name="style"}
    <style>
        .grid-item {
            width: 250px;
            padding-right: 20px;


        }

        .grid-item--width3 { width: 750px; }

        .product-imitation{
            padding: 25px;
        }


    </style>
{/block}


{block name="content"}
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default" id="uploading_inside">
                <div class="panel-body">
                    <form action="{$_url}settings/plugin_upload/" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  {$_L['plugin_drop_help']}</h3>
                            <br />
                            <span class="note">{$_L['plugin_upload_help']}</span>
                        </div>

                    </form>

                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>{$_L['Plugins']}</h5>

                        </div>
                        <div class="ibox-content">

                            <div class="project-list mt-md">
                                <div id="progressbar">
                                </div>

                                <div id="application_ajaxrender"><table class="table table-hover">
                                        <tbody>
                                        {$pl_html}
                                        </tbody>
                                    </table></div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-12">

            <div class="grid">


                {foreach $core_plugins as $core_plugin}
                    <div class="grid-item">
                        <div class="ibox">
                            <div class="ibox-content product-box">

                                <div class="product-imitation">
                                    <a href="javascript:void(0)" class="app_details"><img class="img-responsive" src="{$app_url}storage/system/plugins/{$core_plugin['image']}"></a>
                                </div>
                                <div class="product-desc">

                                    <a href="javascript:void(0)" class="app_details" data-id="1"><span class="product-price">
                                    Core
                                </span></a>


                                    <h3><a href="javascript:void(0)" class="app_details" data-id="1">{$core_plugin['name']}</a> </h3>




                                    <p class="m-t-xs">

                                        {$core_plugin['description']}

                                    </p>
                                    <hr>
                                    <div class="text-right">



                                        {if $config[$core_plugin['identity']]}
                                            <a href="{$_url}app_store/disable/{$core_plugin['identity']}/" class="btn btn-danger btn-sm app_details" data-id="1">Disable</a>
                                            {else}
                                            <a href="{$_url}app_store/enable/{$core_plugin['identity']}/" class="btn btn-primary btn-sm app_details" data-id="1">Enable</a>
                                        {/if}


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {/foreach}








            </div>

        </div>


    </div>




    <input type="hidden" id="_msg_unzipping" value="{$_L['Unzipping']} ...">
    <input type="hidden" id="_msg_are_you_sure" value="{$_L['are_you_sure']}">

{/block}

{block name="script"}
    <script src="{$app_url}ui/lib/masonry.pkgd.min.js"></script>

    <script>
        Dropzone.autoDiscover = false;
        $(function() {
            var _url = $("#_url").val();
            var ib_file = new Dropzone("#upload_container",
                {
                    url: _url + "settings/plugin_upload/",
                    maxFiles: 1,
                    acceptedFiles: ".zip"
                }
            );

            //ib_file.on("addedfile", function(file) {
            //
            //});

            ib_file.on("success", function(file) {

                var _msg_unzipping = $('#_msg_unzipping').val();
                $('#uploading_inside').block({
                    message: "<h3>" + _msg_unzipping +"</h3>" ,
                    css: {
                        padding:        0,
                        margin:         0,
                        width:          '30%',
                        top:            '40%',
                        left:           '35%',
                        textAlign:      'center',
                        color:          '#FFFFFF',
                        border:         '0',
                        backgroundColor:'transparent',
                        cursor:         'wait'
                    }
                });
                //   $('#uploading_inside').block({ message: null });

                var _url = $("#_url").val();
                $.post(_url + 'settings/plugin_unzip/', {

                    name: file.name

                })
                    .done(function (data) {

                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    });
            });



            $(".c_uninstall").click(function (e) {
                e.preventDefault();
                var _msg_are_you_sure = $('#_msg_are_you_sure').val();
                var to_url = this.href;
                bootbox.confirm(_msg_are_you_sure, function(result) {
                    if(result == true){
                        window.location = to_url;
                    }
                });



            });


            $('.grid').masonry({
                // options
                itemSelector: '.grid-item',
                columnWidth: 250
            });



        });
    </script>

{/block}