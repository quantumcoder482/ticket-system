{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        {*<div class="col-md-12">*}
        {*<div class="ibox float-e-margins">*}
        {*<div class="ibox-title">*}
        {*<h5>{$_L['Favicon']}</h5>*}


        {*</div>*}
        {*<div class="ibox-content">*}



        {**}


        {*</div>*}
        {*</div>*}
        {*</div>*}
        <div class="col-md-6">


            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Logo']}</h5>


                </div>
                <div class="ibox-content">

                    <img class="logo" src="{$app_url}storage/system/{$config['logo_default']}" style="max-height: 40px;" alt="Logo">
                    <br><br>

                    <form role="form" name="logo" enctype="multipart/form-data" method="post"
                          action="{$_url}settings/logo-post/">
                        <div class="form-group">
                            <label for="file">{$_L['File']}</label>
                            <input type="file" id="file" name="file">

                            <p class="help-block">{$_L['This will replace existing logo']}</p>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>


                </div>
            </div>


            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Logo']} Inverse [ Optional ]</h5>


                </div>
                <div class="ibox-content">

                    <img class="logo" src="{$app_url}storage/system/{$config['logo_inverse']}" alt="Logo"  style="max-height: 40px; background: #2196F3">
                    <br><br>

                    <form role="form" name="logo" enctype="multipart/form-data" method="post"
                          action="{$_url}settings/logo-inverse-post/">
                        <div class="form-group">
                            <label for="file">{$_L['File']}</label>
                            <input type="file" id="file" name="file">

                            <p class="help-block">Upload Transparent png image.</p>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>


                </div>
            </div>





            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Client Portal Custom Scripts']}</h5>


                </div>
                <div class="ibox-content">


                    <form role="form" name="logo" method="post"
                          action="{$_url}settings/custom_scripts/">
                        <div class="form-group">
                            <label for="header_scripts">{$_L['Header Scripts']}</label>

                            <textarea class="form-control" id="header_scripts" name="header_scripts"
                                      rows="4">{$config['header_scripts']}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="footer_scripts">{$_L['Footer Scripts']}</label>

                            <textarea class="form-control" id="footer_scripts" name="footer_scripts"
                                      rows="4">{$config['footer_scripts']}</textarea>

                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>


                </div>
            </div>


        </div>


        <div class="col-md-6">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Invoice']}</h5>


                </div>
                <div class="ibox-content">


                    <table class="table table-hover">
                        <tbody>

                        <tr>
                            <td width="80%"><label for="config_invoice_show_watermark">{$_L['Show Watermark']} </label></td>
                            <td> <input type="checkbox" {if get_option('invoice_show_watermark') eq '1'}checked{/if} data-toggle="toggle" data-size="small" data-on="{$_L['Yes']}" data-off="{$_L['No']}" id="config_invoice_show_watermark"></td>
                        </tr>



                        </tbody>
                    </table>


                </div>
            </div>


        </div>



    </div>


{/block}

{block name="script"}


    <script>

        $(function () {

            $('#config_invoice_show_watermark').change(function() {



                if($(this).prop('checked')){

                    $.post( base_url+'settings/update_option/', { opt: "invoice_show_watermark", val: "1" })
                        .done(function( data ) {

                            toastr.success('Saved.');
                           // location.reload();
                        });

                }
                else{
                    $.post( base_url+'settings/update_option/', { opt: "invoice_show_watermark", val: "0" })
                        .done(function( data ) {

                            toastr.success('Saved.');
                        });
                }
            });

        })

    </script>

{/block}
