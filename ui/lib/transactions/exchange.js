Dropzone.autoDiscover = false;
$(document).ready(function () {

    $('[data-toggle="datepicker"]').datepicker();

    $("#account").select2({
            theme: "bootstrap",
            language: {
                noResults: function () {
                    return $("#_lan_no_results_found").val();
                }
            }
        }
    );







    $("#emsg").hide();



    var _url = $("#_url").val();

    var $ib_form_submit = $("#submit");




    $ib_form_submit.click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        $.post(_url + 'transactions/deposit-post/', {


            account: $('#account').val(),
            date: $('#date').val(),

            amount: $('#amount').val(),
            cats: $('#cats').val(),
            description: $('#description').val(),
            attachments: $('#attachments').val(),
            tags: $('#tags').val(),
            payer: $('#payer').val(),
            pmethod: $('#pmethod').val(),
            ref: $('#ref').val()

        })
            .done(function (data) {
                var sbutton = $("#submit");
                var _url = $("#_url").val();
                if ($.isNumeric(data)) {

                    location.reload();
                }
                else {
                    $('#ibox_form').unblock();
                    var body = $("html, body");
                    body.animate({scrollTop:0}, '1000', 'swing');
                    $("#emsgbody").html(data);
                    $("#emsg").show("slow");
                }
            });
    });
});