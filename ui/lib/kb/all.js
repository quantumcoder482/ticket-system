function deleteKb(kbid) {
    bootbox.confirm(_L['are_you_sure'], function(result) {
        if(result){
            window.location.href = base_url + "kb/a/delete/" + kbid;
        }
    });
}

$(function() {

    $(".kb_view").on('click',function (e) {
        e.preventDefault();
        iModal.ajax(base_url + "kb/a/a_view/"+this.id, $(this).html());
    });


    $('#tbl_articles').filterTable({
        inputSelector: '#ib_search_input',
        ignoreColumns: [1],
        minRows: 1
    });


});