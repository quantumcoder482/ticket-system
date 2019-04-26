{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins" id="ui_settings">
                <div class="ibox-title">
                    <h5>{$_L['User Interface']}</h5>


                </div>
                <div class="ibox-content">
                    <table class="table table-hover">
                        <tbody>



                        <tr>
                            <td width="80%"><label for="config_rtl">{$_L['Enable RTL']} </label></td>
                            <td><input type="checkbox" {if get_option('rtl') eq '1'}checked{/if} data-toggle="toggle"
                                       data-size="small" data-on="{$_L['Yes']}" data-off="{$_L['No']}" id="config_rtl"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_mininav">{$_L['Fold Sidebar Default']} </label></td>
                            <td><input type="checkbox" {if get_option('mininav') eq '1'}checked{/if} data-toggle="toggle"
                                       data-size="small" data-on="{$_L['Yes']}" data-off="{$_L['No']}" id="config_mininav">
                            </td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_hide_footer">{$_L['Hide Footer Copyright']} </label></td>
                            <td><input type="checkbox" {if get_option('hide_footer') eq '1'}checked{/if}
                                       data-toggle="toggle" data-size="small" data-on="{$_L['Yes']}" data-off="{$_L['No']}"
                                       id="config_hide_footer"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_show_sidebar_header">Show sidebar header </label></td>
                            <td><input type="checkbox" {if get_option('show_sidebar_header') eq '1'}checked{/if}
                                       data-toggle="toggle" data-size="small" data-on="{$_L['Yes']}" data-off="{$_L['No']}"
                                       id="config_show_sidebar_header"></td>
                        </tr>


                        </tbody>
                    </table>

                    <hr>

                    <div class="form-group">
                        <label for="contentAnimation">{$_L['Content Animation']}</label>
                        <select name="contentAnimation" id="contentAnimation" class="form-control">

                            <option value="" {if $config['contentAnimation'] eq ''}selected{/if}>{$_L['None']}</option>

                            {$ca_options}

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="contact_set_view_mode">{$_L['Customers View Mode']}</label>
                        <select name="contact_set_view_mode" id="contact_set_view_mode" class="form-control">

                            <option value="tbl" {if $config['contact_set_view_mode'] eq 'tbl'}selected{/if}>{$_L['Table']}</option>
                            <option value="card" {if $config['contact_set_view_mode'] eq 'card'}selected{/if}>{$_L['Card']}</option>
                            <option value="search" {if $config['contact_set_view_mode'] eq 'search'}selected{/if}>{$_L['Search']}</option>



                        </select>
                    </div>


                </div>
            </div>
        </div>



    </div>
{/block}

{block name="script"}
    <script>
        $(document).ready(function () {



            var _url = $("#_url").val();







            $('#config_rtl').change(function() {

                $('#ui_settings').block({ message: null });


                if($(this).prop('checked')){

                    $.post( _url+'settings/update_option/', { opt: "rtl", val: "1" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });

                }
                else{
                    $.post( _url+'settings/update_option/', { opt: "rtl", val: "0" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });
                }
            });

            $('#config_mininav').change(function() {

                $('#ui_settings').block({ message: null });


                if($(this).prop('checked')){

                    $.post( _url+'settings/update_option/', { opt: "mininav", val: "1" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });

                }
                else{
                    $.post( _url+'settings/update_option/', { opt: "mininav", val: "0" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });
                }
            });

            $('#config_hide_footer').change(function() {

                $('#ui_settings').block({ message: null });


                if($(this).prop('checked')){

                    $.post( _url+'settings/update_option/', { opt: "hide_footer", val: "1" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });

                }
                else{
                    $.post( _url+'settings/update_option/', { opt: "hide_footer", val: "0" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });
                }
            });

            $('#config_show_sidebar_header').change(function() {

                $('#ui_settings').block({ message: null });


                if($(this).prop('checked')){

                    $.post( _url+'settings/update_option/', { opt: "show_sidebar_header", val: "1" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });

                }
                else{
                    $.post( _url+'settings/update_option/', { opt: "show_sidebar_header", val: "0" })
                        .done(function( data ) {
                            $('#ui_settings').unblock();
                            location.reload();
                        });
                }
            });



            var $contentAnimation = $("#contentAnimation");


            $contentAnimation.change(function() {

                $('#ui_settings').block({ message: null });

                $.post( _url+'settings/update_option/', { opt: "contentAnimation", val: $contentAnimation.val() })
                    .done(function( data ) {
                        $('#ui_settings').unblock();
                        location.reload();
                    });


            });

            var $contact_set_view_mode = $("#contact_set_view_mode");

            $contact_set_view_mode.change(function() {

                window.location = base_url + 'contacts/set_view_mode/' + $contact_set_view_mode.val() + '/';


            });



        });
    </script>
{/block}
