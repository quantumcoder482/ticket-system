$(document).ready(function () {

    var _url = $("#_url").val();


    $('#caddress').redactor(
        {
            minHeight: 150 // pixels
        }
    );


    $('#url_rewrite').change(function() {

        $('#additional_settings').block({ message: null });



        if($(this).prop('checked')){

            bootbox.confirm("Warning ! Are You sure, you want to enable URL rewrite ? If your server does not support URL Rewrite, You may face, the application stopped working and 500 Internal Server Error. In that case, you will have to manually remove .htaccess file from your root directory and set value - 0 to url_rewrite in your sys_appconfig MySQL table. Click OK, if you are sure. Or Cancel it.", function(result) {
                if(result){
                    window.location.replace( _url+'settings/url_rewrite/yes/');
                }
                else{
                    location.reload();
                }
            });



        }
        else{

            window.location.replace( _url+'settings/url_rewrite/no/');

        }
    });

    $('#console_notify_invoice_created').change(function() {

        $('#additional_settings').block({ message: null });


        if($(this).prop('checked')){

            $.post( _url+'settings/update_option/', { opt: "console_notify_invoice_created", val: "1" })
                .done(function( data ) {
                    $('#additional_settings').unblock();
                    location.reload();
                });

        }
        else{
            $.post( _url+'settings/update_option/', { opt: "console_notify_invoice_created", val: "0" })
                .done(function( data ) {
                    $('#additional_settings').unblock();
                    location.reload();
                });
        }
    });


    $('#maxmind_installed').change(function() {

        $('#additional_settings').block({ message: null });


        if($(this).prop('checked')){

            $.post( _url+'settings/update_option/', { opt: "maxmind_installed", val: "1" })
                .done(function( data ) {
                    $('#additional_settings').unblock();
                    location.reload();
                });

        }
        else{
            $.post( _url+'settings/update_option/', { opt: "maxmind_installed", val: "0" })
                .done(function( data ) {
                    $('#additional_settings').unblock();
                    location.reload();
                });
        }
    });



});