$(function() {

    var _url = $("#_url").val();

    $btn_modal_action = $("#btn_modal_action");

    $modal_add_item = $("#modal_add_item");

    $btn_modal_action.on('click', function(e) {
        e.preventDefault();
        $modal_add_item.block({ message: block_msg });
        $.post( _url + "tickets/admin/departments_post/", $("#ib_modal_form").serialize())
            .done(function( data ) {

                if ($.isNumeric(data)) {

                    location.reload();

                }

                else {
                    $modal_add_item.unblock();
                    toastr.error(data);
                }

            });

    });


    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });




    $(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Are you sure?', function(result) {
            if(result){

                window.location.href = _url + "tickets/admin/delete_department/" + id + "/";
            }
        });
    });




    var $modal = $('#ajax-modal');

    $('.item_edit').on('click', function(e){
        e.preventDefault();
        var id = this.id;
        $('body').modalmanager('loading');
        $modal.load( _url + 'tickets/admin/edit_department/'+ id + '/', '', function(){
            $modal.modal();
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    });




    $modal.on('click', '.test_imap', function(e){
        e.preventDefault();
        $modal.modal('loading');
        $.post( base_url + "tickets/admin/imap_test/", $("#edit_form").serialize())
            .done(function( data ) {

                if ($.isNumeric(data)) {
                    $modal.modal('loading');
                    toastr.success("Connected Successfully");

                }

                else {
                    $modal.modal('loading');
                    toastr.error(data);
                }

            });


    });


    $modal.on('click', '.edit_submit', function(e){
        e.preventDefault();
        $modal.modal('loading');

        $.post( _url + "tickets/admin/departments_edit/", $("#edit_form").serialize())
            .done(function( data ) {

                if ($.isNumeric(data)) {

                    location.reload();

                }

                else {
                    $modal.modal('loading');
                    toastr.error(data);
                }

            });


    });

});