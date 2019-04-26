jQuery(document).ready(function() {

 //   var ib_body = $('#ib_body');

//     iModal.setEModalOptions({
//         loadingHtml: '<div class="row"><div class="col-md-2 col-md-offset-5">'+ block_msg +'</div></div>'
//
// });








});

PNotify.prototype.options.styling = "bootstrap3";

PNotify.prototype.options.stack.firstpos1 = 50;


function spNotify(text,type) {
    new PNotify({
        text: text,
        type: type,
        addclass: 'pnotify-center'
    });
}