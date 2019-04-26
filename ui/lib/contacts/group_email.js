$(document).ready(function () {

    var _url = $("#_url").val();

    $("#emails").select2();

    $('.sysedit').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']], // no style button
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link']], // no insert buttons
            ['table', ['table']], // no table button
            ['view', ['codeview']], // no table button
            //['help', ['help']] //no help button
        ],
        focus: true
    });


    var btn_form_action = $("#send_email");

    var iform = $("#iform");


    btn_form_action.on('click', function(e) {
        e.preventDefault();

        iform.block({ message: block_msg });

        var body = $("html, body");
        body.animate({scrollTop:0}, '1000', 'swing');

        var emails = $("#emails").val();
       // var cc = $("#cc").val();
       // var bcc = $("#bcc").val();
        var subject = $("#subject").val();
        var msg = $('.sysedit').code();

        $.post(  _url + "contacts/group_email_post/", { emails: emails, subject: subject, msg: msg })
            .done(function( data ) {


                iform.unblock();


                toastr.success(data);

                btn_form_action.prop('disabled', true);


            });

    });



});