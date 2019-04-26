$(function() {

    var $modal = $('#ajax-modal');


    $('.app_details').on('click', function(e){

        $.fn.modal.defaults.width = '90%';
        e.preventDefault();
        var id = $(this).data("id");



        $('body').modalmanager('loading');

        $modal.load( base_url + 'apps/modal_view_app/'+ id + '/', '', function(){

            $modal.modal();

            updateDiv('summary',base_url,id,cb);

        });


    });

});