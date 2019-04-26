$(function() {

    var _url = $("#_url").val();

    var $ib_editor_canvas = $("#ib_editor_canvas");

    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/php");

    var $editor_file = $("#editor_file");

    var $ib_btn_save = $("#ib_btn_save");


    $editor_file.change(function() {

        $ib_editor_canvas.block({ message: block_msg });

        $.get( _url + "editor/" + $editor_file.val() + "/", function( data ) {
            $ib_editor_canvas.unblock();
            editor.$blockScrolling = Infinity;
            editor.setValue(data, -1);
            editor.setValue(data, 1);
        });




    });


    $ib_btn_save.on('click', function(e) {

        e.preventDefault();
        $ib_editor_canvas.block({ message: block_msg });

        var codes = editor.getValue();

        $.post( _url + "editor/save/", { file: $editor_file.val(), codes: codes })
            .done(function( data ) {
                $ib_editor_canvas.unblock();
                toastr.success(data);

            });

    });


});