$(document).ready(function () {

    var _url = $("#_url").val();








    var _msg_add_new_group = $("#_msg_add_new_group").val();
    var _msg_group_name = $("#_msg_group_name").val();
    var _msg_edit = $("#_msg_edit").val();
    var _msg_ok = $("#_msg_ok").val();
    var _msg_cancel = $("#_msg_cancel").val();


    var ib_form_bootbox = "<form class=\"form-horizontal push-10\" method=\"post\" onsubmit=\"return false;\">\n    <div class=\"form-group\">\n        <div class=\"col-xs-12\">\n            <div class=\"form-material floating\">\n                <input class=\"form-control\" type=\"text\" id=\"group_name\" name=\"group_name\">\n                <label for=\"envato_api_key\">" + _msg_group_name + "</label>\n                           </div>\n        </div>\n    </div>\n\n</form>";


    var box =   bootbox.dialog({
            title: _msg_add_new_group,
            message: ib_form_bootbox,
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-primary",
                    callback: function () {
                        // var name = $('#name').val();
                        // var answer = $("input[name='awesomeness']:checked").val();
                        // Example.show("Hello " + name + ". You've chosen <b>" + answer + "</b>");

                        var group_name_val = $('#group_name').val();

                        $.post(  _url + "contacts/add_group/", { group_name: group_name_val })
                            .done(function( data ) {

                                if ($.isNumeric(data)) {

                                    location.reload();

                                }

                                else {
                                    bootbox.alert(data);
                                }

                            });


                    }
                }
            },
            show: false
        }
    );





    $("#add_new_group").click(function(e){

        e.preventDefault();

        box.modal('show');


    });


    box.on("shown.bs.modal", function() {

        var group_name = $('#group_name');
        setTimeout(function(){
            group_name.focus();
        }, 1000);

    });


    $(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm(_L['are_you_sure'], function(result) {
            if(result){
                var _url = $("#_url").val();
                window.location.href = _url + "delete/crm-group/" + id;
            }
        });
    });


    $(".edit_group").click(function (e) {
        e.preventDefault();

        var eid = this.id;

       // alert(eid);

        var gname = $( this ).attr( "data-name" );





        bootbox.prompt({
            title: _msg_edit,
            value: gname,
            buttons: {
                'cancel': {
                    label: _msg_cancel
                },
                'confirm': {
                    label: _msg_ok
                }
            },
            callback: function(result) {
                if (result === null) {

                } else {
                    // alert(result);
                    $.post(  _url + "contacts/group_edit/", { id: eid, gname: result })
                        .done(function( data ) {
                            location.reload();
                        });
                }
            }
        });

    });




});