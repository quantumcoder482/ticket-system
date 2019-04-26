$(document).ready(function () {

    var _url = $("#_url").val();

    var send = $("#send");

    var result = $("#result");

    var iform = $( "#iform" );

    $('#message').countSms('#sms-counter');

    var contacts = $("#contacts");

    contacts.multiSelect({
        selectableHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='Search...'>",
        selectionHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='Search...'>",
        afterInit: function(ms){
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                .on('keydown', function(e){
                    if (e.which === 40){
                        that.$selectableUl.focus();
                        return false;
                    }
                });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                .on('keydown', function(e){
                    if (e.which == 40){
                        that.$selectionUl.focus();
                        return false;
                    }
                });
        },
        afterSelect: function(){
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function(){
            this.qs1.cache();
            this.qs2.cache();
        }
    });


    $('#ib_select_all').click(function(){
        contacts.multiSelect('select_all');
        return false;
    });
    $('#ib_de_select_all').click(function(){
        contacts.multiSelect('deselect_all');
        return false;
    });








    send.on('click', function(e) {


        e.preventDefault();

        iform.block({ message: null });


        $.post( _url + "sms/init/bulk_post/", iform.serialize())
            .done(function (data) {

                iform.unblock();

                result.html(data);

            });


    });



});