$(function() {

    var _url = $("#_url").val();


    tinymce.init({
        selector: '#activation_message',
        // language: ib_lang,
        relative_urls: false,
        remove_script_host: false,
        removed_menuitems: 'newdocument',
        forced_root_block : false,
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
        setup: function(ed) {
            ed.on('init', function() {
                this.getDoc().body.style.fontSize = '14px';
            });
        },
        table_default_styles: {
            width: '100%'
        },
        plugins: [
            'advlist autoresize autolink lists link image charmap print preview hr anchor pagebreak codesample',
            'searchreplace wordcount visualblocks visualchars code',
            'media nonbreaking save table contextmenu directionality',
            'paste textcolor colorpicker textpattern imagetools responsivefilemanager'
        ],
        toolbar1: 'fontselect fontsizeselect  insertfile | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        toolbar2: '| responsivefilemanager | undo redo rtl print preview media image | forecolor backcolor link | codesample',
      //  image_advtab: true ,
       // external_filemanager_path: app_url+ "system/lib/filemanager/",
      //  filemanager_title:"File Manager" ,
       // external_plugins: { "filemanager" : app_url + "system/lib/filemanager/plugin.min.js"}
    });

    var $btn_activation_message_save = $("#btn_activation_message_save");
    var $btn_activation_message_send = $("#btn_activation_message_send");
    var $ib_form = $("#ib_form");

    $btn_activation_message_save.on('click', function(e) {
        e.preventDefault();

        $ib_form.block({ message: block_msg });
        $.post( _url + "orders/save_activation/", {

            oid: $('#oid').val(),
            activation_subject: $('#activation_subject').val(),
            activation_message: tinyMCE.activeEditor.getContent(),
            send_email: 'no'

        })
            .done(function( data ) {

                $ib_form.unblock();

                if ($.isNumeric(data)) {

                    toastr.success(_L['data_updated']);

                }

                else {
                    toastr.error(data);
                }

            });

    });



    $btn_activation_message_send.on('click', function(e) {
        e.preventDefault();

        $ib_form.block({ message: block_msg });
        $.post( _url + "orders/save_activation/", {

            oid: $('#oid').val(),
            activation_subject: $('#activation_subject').val(),
            activation_message: tinyMCE.activeEditor.getContent(),
            send_email: 'yes'

        })
            .done(function( data ) {

                $ib_form.unblock();

                if ($.isNumeric(data)) {

                    toastr.success(_L['email_sent']);

                }

                else {
                    toastr.error(data);
                }

            });

    });


});