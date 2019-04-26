$(document).ready(function () {

    var _url = $("#_url").val();

    var ib_panel = $("#ib_panel");

    var did = $("#did").val();


    $('#is_global').change(function() {

        ib_panel.block({ message: block_msg });


        if($(this).prop('checked')){

            $.post( _url+'documents/set_global/', { did: did, val: "1" })
                .done(function( data ) {
                    ib_panel.unblock();
                    location.reload();
                });

        }
        else{
            $.post( _url+'documents/set_global/', { did: did, val: "0" })
                .done(function( data ) {
                    ib_panel.unblock();
                    location.reload();
                });
        }
    });






});