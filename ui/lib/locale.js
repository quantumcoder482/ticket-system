$(document).ready(function () {

    var $home_currency = $("#home_currency");
    var $currency_code = $("#currency_code");
    $("#tzone").select2();
    $("#country").select2();
    $home_currency.select2();

    var data_symbol = "";

    $home_currency.change(function(){

        data_symbol = $(this).find(':selected').data('symbol');

        $currency_code.val(data_symbol);



    });



});