$(function() {

    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue'
    });

    $('input[type=radio][name=user_type]').on('ifClicked', function(event){
        var ib_selected = this.value;
        var perms_checkbox = $('.ib_checkbox');
        if (ib_selected == 'Admin') {
            perms_checkbox.iCheck('check');
            perms_checkbox.iCheck('disable');
        } else {
            perms_checkbox.iCheck('enable');
            perms_checkbox.iCheck('uncheck');
        }
    });


});