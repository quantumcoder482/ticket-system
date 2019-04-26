Dropzone.autoDiscover = false;
$(function() {

    var _url = $("#_url").val();

    $.fn.modal.defaults.width = '700px';

    var $modal = $('#ajax-modal');

    $('[data-toggle="tooltip"]').tooltip();

    var $btn_add_file = $("#btn_add_file");

    var $file_link = $("#file_link");

    var upload_resp;

    var footable_tbl = $("#footable_tbl");

    footable_tbl.footable();


    var ib_file = new Dropzone("#upload_container",
        {
            url: _url + "documents/upload/",
            maxFiles: 1
        }
    );


    ib_file.on("sending", function() {

        $btn_add_file.prop('disabled', true);

    });

    ib_file.on("success", function(file,response) {

        $btn_add_file.prop('disabled', false);

        upload_resp = response;

        if(upload_resp.success == 'Yes'){

            toastr.success(upload_resp.msg);
            $file_link.val(upload_resp.file);


        }
        else{
            toastr.error(upload_resp.msg);
        }


    });




    var $doc_title = $("#doc_title");

    var is_global = '0';


    $btn_add_file.on('click', function(e) {
        e.preventDefault();

        if ($('#is_global').is(":checked"))
        {
            is_global = '1';
        }

        $.post( _url + "documents/post/", { title: $doc_title.val(), file_link: $file_link.val(), is_global: is_global })
            .done(function( data ) {

                if ($.isNumeric(data)) {

                    location.reload();

                }

                else {
                    toastr.error(data);
                }




            });


    });


    $(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm(_L['are_you_sure'], function(result) {
            if(result){
                window.location.href = _url + "delete/document/" + id + '/';
            }
        });
    });




    $(".cedit").click(function (e) {
        e.preventDefault();
        var id = this.id;

        $('body').modalmanager('loading');

        $modal.load( _url + 'contacts/modal_add_company/'+ id + '/', '', function(){

            $modal.modal();

        });

    });




});