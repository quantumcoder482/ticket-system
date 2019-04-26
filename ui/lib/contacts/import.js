Dropzone.autoDiscover = false;
$(function() {
    var _url = $("#_url").val();
    var ib_file = new Dropzone("#upload_container",
        {
            url: _url + "contacts/csv_upload/",
            maxFiles: 1,
            acceptedFiles: ".csv"
        }
    );

    //ib_file.on("addedfile", function(file) {
    //
    //});

    ib_file.on("success", function(file) {

        var _msg_importing = $('#_msg_importing').val();
        $('#uploading_inside').block({
            message: "<h3>" + _msg_importing +"</h3>" ,
            css: {
                padding:        0,
                margin:         0,
                width:          '30%',
                top:            '40%',
                left:           '35%',
                textAlign:      'center',
                color:          '#FFFFFF',
                border:         '0',
                backgroundColor:'transparent',
                cursor:         'wait'
            }
        });
        //   $('#uploading_inside').block({ message: null });

        var _url = $("#_url").val();

        $.post(_url + 'contacts/csv_uploaded/', {

            name: file.name

        })
            .done(function (data) {
                //location.reload();

                window.location.replace(_url + "contacts/list/");


            });
    });




});