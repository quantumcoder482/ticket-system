Dropzone.autoDiscover = false;
$(function() {

    var _url = $("#_url").val();

    var $ib_form_submit = $("#ib_form_submit");

    var $create_ticket = $("#create_ticket");
    var $ib_box = $("#ib_box");



    ib_editor("#content");

    $("#cid").select2({
            theme: "bootstrap"
        }
    );


    var upload_resp;


    var ib_file = new Dropzone("#upload_container",
        {
            url: _url + "tickets/admin/upload_file/",
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
        $ib_box.block({ message: block_msg });
        $.post( _url + "tickets/admin/add_post/", { cid: $("#cid").val(), subject: $("#subject").val(), department: $("#department").val(), urgency: $("#urgency").val(), message: tinyMCE.activeEditor.getContent(), attachments: $("#attachments").val()} )
            .done(function( data ) {

                if(data.success == "Yes"){
                    window.location.href = _url + "tickets/admin/view/" + data.id + "/";
                }

                else {
                    $ib_box.unblock();
                    toastr.error(data.msg);
                    //  console.log(data);
                }

            });


    });




});