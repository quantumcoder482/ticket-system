Dropzone.autoDiscover = false;

$(document).ready(function () {




    var upload_resp;



    function updateDiv(){
        //   $("#application_ajaxrender").html('Loading...');
        $('#ibox_form').block({ message: null });




        var btnsearch = $("#search");

        //btnsearch.html(_L['Searching']);
        //btnsearch.addClass("btn-danger");
        var _url = $("#_url").val();
        $.post(_url + 'search/ps/', {

            txtsearch: $('#txtsearch').val(),
            stype: $('#stype').val()

        })
            .done(function (data) {
                var sbutton = $("#search");
                var result =  $("#application_ajaxrender");
                //sbutton.html('Search');
                //sbutton.removeClass("btn-danger");

                $('#ibox_form').unblock();
                result.html(data);
                result.show();
            });

    }

    updateDiv();

    $("#search").click(function (e) {
        e.preventDefault();
        updateDiv();
    });
    var $modal = $('#ajax-modal');
    var sysrender = $('#application_ajaxrender');
    sysrender.on('click', '.cdelete', function(e){
        e.preventDefault();
        var id = this.id;
        var lan_msg = $("#_lan_are_you_sure").val();
        bootbox.confirm(lan_msg, function(result) {
            if(result){
                var _url = $("#_url").val();
                window.location.href = _url + "delete/ps/" + id + '/';
            }
        });
    });

    sysrender.on('click', '.cedit', function(e){
        e.preventDefault();
        var vid = this.id;
        var id = vid.replace("e", "");
        id = id.replace("t", "");

        // var id = $(this).closest('tr').attr('id');
        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');
        var _url = $("#_url").val();
        $modal.load(_url + 'ps/edit-form/' + id, '', function(){
            $modal.modal();
            $('.amount').autoNumeric('init', {
                vMax: '9999999999999999.00',
                vMin: '-9999999999999999.00'
            });

            $('#description').redactor(
                {
                    minHeight: 200 // pixels
                }
            );

            new Clipboard('.ib_btn_copy');

            var $file_link = $("#file_link");
            var ib_submit = $("#update");

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

        });
    });

    $modal.on('click', '#update', function(){
        $modal.modal('loading');

        var _url = $("#_url").val();
        $.post(_url + 'ps/edit-post/', $('#edit_form').serialize(), function(data){

            var _url = $("#_url").val();
            if ($.isNumeric(data)) {

                location.reload();
            }
            else {

                $modal
                    .modal('loading')
                    .find('.modal-body')
                    .prepend('<div class="alert alert-danger fade in">' + data +

                        '</div>');

            }

        });

    });





});