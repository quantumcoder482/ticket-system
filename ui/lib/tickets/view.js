Dropzone.autoDiscover = false;
$(function() {

    var _url = $("#_url").val();

    var $ib_form_submit = $("#ib_form_submit");

    var $create_ticket = $("#create_ticket");


    $('.sysedit').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']], // no style button
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],

            ['table', ['table']], // no table button
            ['view', ['codeview']], // no table button
            //['help', ['help']] //no help button
        ]
    });





    var upload_resp;


    var ib_file = new Dropzone("#upload_container",
        {
            url: _url + "client/tickets/upload_file/",
            maxFiles: 10,
            acceptedFiles: "image/jpeg,image/png,image/gif"
        }
    );

    ib_file.on("sending", function() {

        $ib_form_submit.prop('disabled', true);

    });

    ib_file.on("success", function(file,response) {

        $ib_form_submit.prop('disabled', false);

        upload_resp = response;

        if(upload_resp.success == 'Yes'){

            toastr.success(upload_resp.msg);
            // $file_link.val(upload_resp.file);
            // files.push(upload_resp.file);
            //
            // console.log(files);

            $('#attachments').val(function(i,val) {
                return val + (!val ? '' : ',') + upload_resp.file;
            });


        }
        else{
            toastr.error(upload_resp.msg);
        }







    });



    $ib_form_submit.on('click', function(e) {
        e.preventDefault();
        $create_ticket.block({ message: block_msg });
        $.post( _url + "client/tickets/add_reply/", {  message: $('.sysedit').code(), attachments: $("#attachments").val(), f_tid: $("#f_tid").val()} )
            .done(function( data ) {

                if(data.success == "Yes"){
                    location.reload();
                }

                else {
                    $create_ticket.unblock();
                    toastr.error(data.msg);
                }

            });


    });


});