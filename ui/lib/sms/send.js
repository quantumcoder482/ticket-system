$(document).ready(function () {

    var _url = $("#_url").val();

    var send = $("#send");

    var result = $("#result");

    var iform = $( "#iform" );

    $('#message').countSms('#sms-counter');

    var $modal = $('#ajax-modal');

    var $modal_find_contact = $("#modal_find_contact");


    var $cid = $('#cid');

    var $sms_to = $("#sms_to");


    function ib_s2() {

       return  $cid.select2({
            theme: "bootstrap"
        });



    }

    ib_s2();


    $modal_find_contact.on('shown.bs.modal', function() {


        ib_s2().select2('open');





    });


    $cid.on("change", function() {



        $sms_to.val($cid.val());

        $modal_find_contact.modal('hide');

    });






    send.on('click', function(e) {


        e.preventDefault();

        iform.block({ message: null });


        $.post( _url + "sms/init/send_post/", iform.serialize())
            .done(function (data) {

                iform.unblock();

                result.html(data);

            });


    });



});