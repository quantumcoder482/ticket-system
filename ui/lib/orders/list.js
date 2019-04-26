$(function () {
    $('.footable').footable();

    var _url = $("#_url").val();

    $(".cdelete").click(function (e) {
        e.preventDefault();
        var oid = this.id;
        bootbox.confirm(_L['are_you_sure'], function(result) {
            if(result){
                window.location.href = _url + "delete/order/" + oid + '/';
            }
        });
    });

});