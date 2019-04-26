function deleteKb(kbid) {
    bootbox.confirm(_L['are_you_sure'], function(result) {
        if(result){
            window.location.href = base_url + "kb/a/delete/" + kbid;
        }
    });
}

function loadKbGroups() {

    var $div_groups = $("#div_groups");

    $div_groups.html(block_msg);

    $.get( base_url + "kb/a/ajax_groups/"+$("#kbid").val(), function( data ) {
        $div_groups.html(data);
        $('.ib_input_groups').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'icheckbox_square-blue',
            increaseArea: '20%' // optional
        });

    });

}

$(function() {

    loadKbGroups();

    ib_editor("#description");

    var ib_form_submit = $("#ib_form_submit");

    var kb_add_area = $("#kb_add_area");

    ib_form_submit.on('click', function(e) {
        e.preventDefault();
        kb_add_area.block({ message: block_msg });
        var selected_groups = [];

        $('.ib_input_groups').filter(':checked').each(function() {
            selected_groups.push(this.id);
        });
        console.log(selected_groups);
        $.post( base_url + "kb/a/save/", {title: $("#title").val(), description: tinyMCE.activeEditor.getContent(), kbid: $("#kbid").val(),groups: selected_groups})
            .done(function (data) {
                if ($.isNumeric(data)) {

                    window.location = base_url + 'kb/a/edit/' + data;

                }
                else {
                    kb_add_area.unblock();
                    toastr.error(data);

                }
            });

    });


    $(".kb_view").on('click',function (e) {
        e.preventDefault();
        iModal.ajax(base_url + "kb/a/a_view/"+this.id, $(this).html());
    });

    $("#ib_add_group_submit").on('click',function (e) {
        e.preventDefault();

        $("#ib_add_group").block({message: block_msg});

        $.post(base_url + 'kb/a/group_create/', { gname: $("#gname").val()}, function (data) {

            $("#ib_add_group").unblock();

            $("#gname").val('');

            loadKbGroups();

        })

    })


});