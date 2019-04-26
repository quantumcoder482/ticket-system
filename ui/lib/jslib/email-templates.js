$(document).ready(function () {

    var $modal = $('#ajax-modal');
    var sysrender = $('#application_ajaxrender');

    var _url = $("#_url").val();

    var page_refresh = false;

    $('#tbl_email_templates').filterTable({
        inputSelector: '#ib_search_input',
        ignoreColumns: [4]
    });

    sysrender.on('click', '.ve', function(e){
        e.preventDefault();
        var vid = this.id;
        var id = vid.replace("f", "");
         id = id.replace("s", "");
         id = id.replace("b", "");


        // var id = $(this).closest('tr').attr('id');
        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');
        $modal.load( _url + 'settings/email-templates-view/' + id, '', function(){
            $modal.modal();
            ib_editor('.sysedit');
        });
    });


    $modal.on('click', '#update', function(){
        $modal.modal('loading');

        page_refresh = true;

       //  console.log(page_refresh);

        var _url = $("#_url").val();
        $.post(_url + 'settings/update-email-template', {


            message: tinyMCE.activeEditor.getContent(),
            subject: $('#subject').val(),
            tplname: $('#tplname').val(),

            id: $('#sid').val(),
            send: $('#send').val()

        }).done(function (data) {
            var _url = $("#_url").val();
            $modal
                .modal('loading')
                .find('.modal-body')
                .prepend('<div class="alert alert-success fade in">' + data +

                '</div>');
            $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                $(".alert").alert('close');
            });
        });

    });


    $modal.on('hidden.bs.modal', function () {
        // console.log(page_refresh);
        // if(page_refresh){
        //     location.reload();
        // }
        location.reload();
    });

    $(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm(_L['are_you_sure'], function(result) {
            if(result){
                window.location.href = base_url + "delete/email-templates/" + id + '/';
            }
        });
    });


    $("#add_new_template").on('click', function(e) {
        e.preventDefault();
        $('body').modalmanager('loading');
        $modal.load( base_url + 'settings/email-templates-view/', '', function(){
            $modal.modal();
            ib_editor('.sysedit');
        });
    });



});