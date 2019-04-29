Dropzone.autoDiscover = false;
$(function() {

    var _url = $("#_url").val();
    var $ib_form_submit = $("#ib_form_submit");
    var $create_ticket = $("#create_ticket");

    $('#fileuplod_error_msg').hide();
    $('#filetitle_error_msg').hide();

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


    // ticket create in message

    var upload_resp;


    var ib_file = new Dropzone("#upload_container",
        {
            url: _url + "client/tickets/upload_file/",
            maxFiles: 10,
            accpetedFiles: "image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document",
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



    // file upload


    var fileupload_resp;
    var $btn_add_file = $('#btn_add_file');
    var $fileupload_form = $('#fileupload_form');


    var ib_file_upload = new Dropzone("#fileupload_container",
        {
            url: _url + "client/tickets/upload_file/",
            maxFiles: 10,
            accpetedFiles: "image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document",
        }
    );

    ib_file_upload.on("sending", function () {

        $btn_add_file.prop('disabled', true);

    });

    ib_file_upload.on("success", function (file, response) {

        $btn_add_file.prop('disabled', false);

        fileupload_resp = response;

        if (fileupload_resp.success == 'Yes') {

            toastr.success(fileupload_resp.msg);
            // $file_link.val(upload_resp.file);
            // files.push(upload_resp.file);
            //
            // console.log(files);

            $('#file_link').val(function (i, val) {
                return val + (!val ? '' : ',') + fileupload_resp.file;
            });

            $('#fileuplod_error_msg').hide();


        }
        else {
            toastr.error(upload_resp.msg);
        }
    });



    $btn_add_file.on('click', function (e) {
        e.preventDefault();

        if ($('#file_link').val() != '' && $('#doc_title').val() != '' ){
            $fileupload_form.block({ message: block_msg });
            $.post(_url + "client/tickets/add_reply/", { message: $('#doc_title').val(), attachments: $('#file_link').val(), f_tid: $("#file_tid").val() })
                .done(function (data) {

                    if (data.success == "Yes") {
                        location.reload();
                    }

                    else {
                        $create_ticket.unblock();
                        toastr.error(data.msg);
                    }

                }); 
                
        }else{
            if ($('#file_link').val() == ''){
                $('#fileuplod_error_msg').show();
            }

            if ($('#doc_title').val() == '') {
                $('#filetitle_error_msg').show();
            }    
        } 
        
        
    });

});

var check_title = function(){
    if ($('#doc_title').val() == '') {
        $('#filetitle_error_msg').show();
    }else{
        $('#filetitle_error_msg').hide();
    }
}
