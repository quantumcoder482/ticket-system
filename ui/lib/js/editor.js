function ib_editor(selector,height,border,remove_active) {



    border = typeof border !== 'undefined' ? border : true;
    remove_active = typeof remove_active !== 'undefined' ? remove_active : true;
    height = typeof height !== 'undefined' ? height : 400;

    if(remove_active){
        tinymce.remove();
    }

    tinymce.init({
        selector: selector,
        // language: ib_lang,
        relative_urls: false,
        autoresize_min_height: height,
        remove_script_host: false,
        removed_menuitems: 'newdocument',
        forced_root_block : false,
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
        setup: function(ed) {
            ed.on('init', function() {
                this.getDoc().body.style.fontSize = '14px';

                if(!border){
                    $(".mce-panel").css("border-width", "1px 0px 0px");
                    $(".activity-post").css("border-top", "none");
                }

            });
            ed.on('change', function () {
                ed.save();
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
        toolbar1: 'fontselect fontsizeselect  insertfile | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager | rtl preview media image | forecolor backcolor link | codesample',

       // image_advtab: true ,
       // external_filemanager_path: app_url+ "system/lib/filemanager/",
      //  filemanager_title:"File Manager" ,
     //   external_plugins: { "filemanager" : app_url + "ui/lib/tinymce/plugins/responsivefilemanager/plugin.min.js"}
    });

}