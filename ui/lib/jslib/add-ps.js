Dropzone.autoDiscover = false;
$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();

    var _url = $("#_url").val();

    var ib_submit = $("#submit");

    var $file_link = $("#file_link");

    var upload_resp;

    $('#description').redactor(
        {
            minHeight: 200 // pixels
        }
    );

    var ib_file = new Dropzone("#upload_container",
        {
            url: _url + "ps/upload/",
            maxFiles: 1
        }
    );


    ib_file.on("sending", function() {

        ib_submit.prop('disabled', true);

    });

    ib_file.on("success", function(file,response) {

        ib_submit.prop('disabled', false);

        upload_resp = response;

        if(upload_resp.success == 'Yes'){

            toastr.success(upload_resp.msg);
            $file_link.val(upload_resp.file);


        }
        else{
            toastr.error(upload_resp.msg);
        }


    });


    ib_submit.click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        $.post(_url + 'ps/add-post/', $( "#rform" ).serialize())
            .done(function (data) {

                if ($.isNumeric(data)) {

                    location.reload();
                }
                else {
                    $('#ibox_form').unblock();

                    $("#emsgbody").html(data);
                    $("#emsg").show("slow");
                }
            });
    });
});