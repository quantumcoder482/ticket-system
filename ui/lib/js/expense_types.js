$(document).ready(function () {

    var _url = $("#_url").val();








    var _msg_add_new_expense_type = $("#_msg_add_new_expense_type").val();
    var _msg_expense_type = $("#_msg_expense_type").val();
    var _msg_edit = $("#_msg_edit").val();
    var _msg_ok = $("#_msg_ok").val();
    var _msg_cancel = $("#_msg_cancel").val();


    var ib_form_bootbox = "<form class=\"form-horizontal push-10\" method=\"post\" onsubmit=\"return false;\">\n    <div class=\"form-group\">\n        <div class=\"col-xs-12\">\n            <div class=\"form-material floating\">\n                <input class=\"form-control\" type=\"text\" id=\"expense_type\" name=\"expense_type\">\n                <label for=\"expense_type\">" + _msg_expense_type + "</label>\n                           </div>\n        </div>\n    </div>\n\n</form>";


    var box =   bootbox.dialog({
            title: _msg_add_new_expense_type,
            message: ib_form_bootbox,
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-primary",
                    callback: function () {
                        // var name = $('#name').val();
                        // var answer = $("input[name='awesomeness']:checked").val();
                        // Example.show("Hello " + name + ". You've chosen <b>" + answer + "</b>");

                        var expense_type_val = $('#expense_type').val();

                        $.post(  _url + "settings/add_expense_type/", { expense_type: expense_type_val })
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





    $("#add_new_expense_type").click(function(e){

        e.preventDefault();

        box.modal('show');


    });


    box.on("shown.bs.modal", function() {

        var expense_type = $('#expense_type');
        setTimeout(function(){
            expense_type.focus();
        }, 1000);

    });


    $(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm(_L['are_you_sure'], function(result) {
            if(result){
                var _url = $("#_url").val();
                window.location.href = _url + "delete/expense_type/" + id;
            }
        });
    });


    $(".edit_expense_type").click(function (e) {
        e.preventDefault();

        var eid = this.id;

        // alert(eid);

        var e_expense_type = $( this ).attr( "data-name" );





        bootbox.prompt({
            title: _msg_edit,
            value: e_expense_type,
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
                    $.post(  _url + "settings/e_expense_type_edit/", { id: eid, e_expense_type: result })
                        .done(function( data ) {
                            location.reload();
                        });
                }
            }
        });

    });




});