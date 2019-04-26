$(document).ready(function () {

    ib_editor('#content',400,false);


    var btn_form_action = $("#send_email");

    var iform = $("#iform");
    var $modal = $('#ajax-modal');

    btn_form_action.on('click', function(e) {
        e.preventDefault();

        iform.block({ message: block_msg });

        var body = $("html, body");
        body.animate({scrollTop:0}, '1000', 'swing');

        var emails = $("#emails").html();
        // var cc = $("#cc").val();
        // var bcc = $("#bcc").val();
        var subject = $("#subject").val();
        var msg = tinyMCE.activeEditor.getContent();

        $.post(  base_url + "handler/bulk_email_post/", { emails: emails, subject: subject, msg: msg })
            .done(function( data ) {

                if ($.isNumeric(data)) {

                    iform.unblock();


                    toastr.success(_L['Email Sent']);

                    btn_form_action.prop('disabled', true);
                }
                else {
                    iform.unblock();
                    toastr.error(data);

                }




            });

    });




    $(".choose_from_template").on('click',function (e) {

        e.preventDefault();
        $('body').modalmanager('loading');

        $modal.load( base_url + 'handler/view_email_templates/', '', function(){

            $modal.modal();


            $('#tbl_email_templates').filterTable({
                inputSelector: '#ib_search_input',
                ignoreColumns: [2]
            })


        });

    });

    $modal.on('click', '.eml_select', function(e) {
        e.preventDefault();

        $('body').modalmanager('loading');

        var eml_id = this.id;

        $.getJSON(base_url + "handler/json_eml_tpl/"+eml_id, function (data) {

            $("#subject").val(data.subject);

            tinyMCE.activeEditor.setContent(data.message);

            $('body').modalmanager('loading');
            $modal.modal('hide');

        });

    });

});