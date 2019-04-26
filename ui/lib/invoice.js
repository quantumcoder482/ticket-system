$(document).ready(function () {

    $('#notes').redactor(
        {
            minHeight: 200, // pixels
            plugins: ['fontcolor']
        }
    );

    var _url = $("#_url").val();

    function updateTax() {
        var sub_total = parseFloat($("#sub_total").html().replace(',', '.'));
        var discount = parseFloat($("#discount_amount_total").html().replace(',', '.'));
        var sub_total_after_discount = sub_total - discount;
        var ltbal = parseFloat($('#stax').val().replace(',', '.'));
        var tbal = (sub_total_after_discount*ltbal)/100;
        var ftbal = parseFloat(tbal).toFixed(2);
        var _dec_point = $("#_dec_point").val();
        if(_dec_point == ','){
            ftbal = ftbal.replace(".", ",");
        }
        else{
            ftbal = ftbal.replace(",", ".");
        }
        $('#taxtotal').html(ftbal);
    }

    function updateTotal() {

        var s_discount_amount = $('#discount_amount');
        var c_discount = s_discount_amount.val().replace(',', '.');
        if(c_discount == ''){
            c_discount = '0';
        }
        var c_discount_type = $('#discount_type').val();
        var d_a_t = $("#discount_amount_total");
        var s_t = $("#sub_total");
        var is_pt = $("#is_pt");
        if( c_discount_type == "p" ){

            var  ut_st = parseFloat(s_t.html().replace(',', '.'));

            var ut_c = parseFloat(c_discount);

            var ut_pt = (ut_st * ut_c)/100;

            var ut_pt_f = parseFloat(ut_pt).toFixed(2);

            d_a_t.html(ut_pt_f);

            if(c_discount != "0"){
                is_pt.html("(" + s_discount_amount.val() + "%)");
            }


        }else{
            d_a_t.html(c_discount);
            is_pt.html("");
        }

        // ===================================
        var total = 0;
        var d_a_t_val = parseFloat(d_a_t.html().replace(',', '.'));
        var d_a_t_val_to = parseFloat(d_a_t_val).toFixed(2);
        var sub_total = parseFloat(s_t.html().replace(',', '.'));
        var tax_total = parseFloat($("#taxtotal").html().replace(',', '.'));
      //  var disc_amount = parseFloat(c_discount.replace(',', '.'));

        if( !isNaN( sub_total ) ) {
            total = sub_total - d_a_t_val_to + tax_total;
        }
        ftbal = parseFloat(total).toFixed(2).replace(',', '.');
        var _dec_point = $("#_dec_point").val();
       if(_dec_point == ','){
        ftbal = ftbal.replace(".", ",");
       }
        $('#total').html(ftbal);


    }

    $('#tid').select2({
        theme: "bootstrap",
        language: {
            noResults: function () {
                return $("#_lan_no_results_found").val();
            }
        }
    })
        .on("change", function(e) {
            // mostly used event, fired to the original element when the value changes
            // log("change val=" + e.val);

            var tid = this.value;

            if(tid != ''){
                var _url = $("#_url").val();
                $.post(_url + 'tax/rate/', {
                    tid: tid

                })
                    .done(function (data) {
                        //   $('.taxed').val(data);
                      //  $('#stax').val(data).replace(',', '.');
                        // @since v2

                        $('#stax').val(data);
                        calculateTotal();
                        updateTax();
                    });
            }
            else{

                $('#stax').val('0.00');

                calculateTotal();
                updateTax();
                updateTotal();

            }

        });

    $('#invoice_items').on('change', 'select', function(){
     //   $('#taxtotal').html('dd');
        var taxrate = $('#stax').val().replace(',', '.');
       // $(this).val(taxrate);
        updateTax();
        updateTotal();
    });

   var item_remove = $('#item-remove');
    item_remove.hide();


    function calculateTotal() {
        var sum = 0,
            tbl = $('#invoice_items');
        tbl.find('.lvtotal').each(function( index, elem ) {
            var val = parseFloat($(elem).val().replace(',', '.'));
            if( !isNaN( val ) ) {
                sum += val;
            }
        });
        $('.qty').keyup(function(){
            var u_qty = $(this).val();
            var u_price = $(this).closest('tr').find(".item_price").val().replace(',', '.');
            if( !isNaN( u_qty ) ) {
                var n_ltotal = u_qty*u_price;
                n_ltotal = n_ltotal.toFixed(2);
                var _dec_point = $("#_dec_point").val();
                if(_dec_point == ','){

                    n_ltotal = String(n_ltotal);
                    n_ltotal = n_ltotal.replace(".", ",");

                }
                $(this).closest('tr').find(".lvtotal").val(n_ltotal);
                calculateTotal();
            }

            $('.amount').autoNumeric('init');

        });
        $('.item_price').keyup(function(){
            var u_qty = $(this).closest('tr').find(".qty").val().replace(',', '.');
            var u_price = $(this).val().replace(',', '.');
            if( !isNaN( u_price ) ) {
                var n_ltotal = u_qty*u_price;
                n_ltotal = n_ltotal.toFixed(2);
                var _dec_point = $("#_dec_point").val();
                if(_dec_point == ','){
                    n_ltotal = String(n_ltotal);
                    n_ltotal = n_ltotal.replace(".", ",");

                }
                $(this).closest('tr').find(".lvtotal").val(n_ltotal);
                calculateTotal();
            }

        });
        // tbl.find('input.total').html(sum.toFixed(2));
        var _dec_point = $("#_dec_point").val();
        if(_dec_point == ','){
            sum = sum.toFixed(2);
            sum = sum.replace(".", ",");
        }
        $("#sub_total").html(sum);



        //calculate tax

        updateTax();
        updateTotal();

    }

    function update_address(){
        var _url = $("#_url").val();
        var cid = $('#cid').val();
        if(cid != ''){
            $.post(_url + 'contacts/render-address/', {
                cid: cid

            })
                .done(function (data) {
                    var adrs = $("#address");


                    adrs.html(data);

                });
        }

    }
    update_address();
    $('#cid').select2({
        theme: "bootstrap",
        language: {
            noResults: function () {
                return $("#_lan_no_results_found").val();
            }
        }
    })
        .on("change", function(e) {
            // mostly used event, fired to the original element when the value changes
           // log("change val=" + e.val);
          //  alert(e.val);

            update_address();
        });






    item_remove.on('click', function(){
        $("#invoice_items tr.info").fadeOut(300, function(){
            $(this).remove();
            calculateTotal();
        });

    });

    var $modal = $('#ajax-modal');



    $('#item-add').on('click', function(){

        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');

        $modal.load( _url + 'ps/modal-list/', '', function(){
            $modal.modal();
        });
    });

    /*
    / @since v 2.0
     */

    $('#contact_add').on('click', function(e){
        e.preventDefault();
        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');

        $modal.load( _url + 'contacts/modal_add/', '', function(){
            $modal.modal();
            $("#ajax-modal .country").select2({
                theme: "bootstrap"
            });
        });
    });

    $('#blank-add').on('click', function(){
        $("#invoice_items").find('tbody')
            .append(
            '<tr> <td></td> <td><input type="text" class="form-control item_name" name="desc[]" value=""></td> <td><input type="text" class="form-control qty" value="" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td></tr>'
        );
        calculateTotal();
    });

    $('#invoice_items').on('click', '.item_name', function(){
$("tr").removeClass("info");
        $(this).closest('tr').addClass("info");
        item_remove.show();
    });

    $modal.on('click', '.update', function(){
        var tableControl= document.getElementById('items_table');
        $modal.modal('loading');
        $modal.modal('loading');
        //$modal
        //    .modal('loading')
        //    .find('.modal-body')
        //    .prepend('<div class="alert alert-info fade in">' +
        //    'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
        //    '</div>');

        // var obj = new Array();

        $('input:checkbox:checked', tableControl).each(function() {

            var item_code = $(this).closest('tr').find('td:eq(1)').text();
            var item_name = $(this).closest('tr').find('td:eq(2)').text();

            var item_price = $(this).closest('tr').find('td:eq(3)').text();

            //  obj.push(innertext);
            $("#invoice_items").find('tbody')
                .append(
                '<tr> <td>' + item_code + '</td> <td><input type="text" class="form-control item_name" name="desc[]" value="' + item_name + '"></td> <td><input type="text" class="form-control qty" value="1" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value="' + item_price + '"></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value="' + item_price + '"></td> </tr>'
            );
        });

        //  console.debug(obj); // Write it to the console
        calculateTotal();


        $modal.modal('hide');

    });


    $modal.on('click', '.contact_submit', function(e){
        e.preventDefault();
      //  var tableControl= document.getElementById('items_table');
        $modal.modal('loading');

        var _url = $("#_url").val();
        $.post(_url + 'contacts/add-post/', {


            account: $('#account').val(),
            company: $('#company').val(),
            address: $('#m_address').val(),

            city: $('#city').val(),
            state: $('#state').val(),
            zip: $('#zip').val(),
            country: $('#country').val(),
            phone: $('#phone').val(),
            email: $('#email').val()

        })
            .done(function (data) {

                var _url = $("#_url").val();
                if ($.isNumeric(data)) {

                    // location.reload();
                    var is_recurring = $('#is_recurring').val();
                    if(is_recurring == 'yes'){
                        window.location = _url + 'invoices/add/recurring/' + data + '/';
                    }
                    else{
                        window.location = _url + 'invoices/add/1/' + data + '/';
                    }

                }
                else {


                    $modal
                        .modal('loading')
                        .find('.modal-body')
                        .prepend('<div class="alert alert-danger fade in">' + data +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '</div>');
                    $("#cid").select2('data', {id: newID, text: newText});
                }
            });



    });



    $("#add_discount").click(function (e) {
        e.preventDefault();
        var s_discount_amount = $('#discount_amount');
        var c_discount = s_discount_amount.val();
        var c_discount_type = $('#discount_type').val();
        var p_checked = "";
        var f_checked = "";
        if( c_discount_type == "p" ){
            p_checked = 'checked="checked"';
        }else{
            f_checked = 'checked="checked"';
        }
        bootbox.dialog({
                title: $("#_lan_set_discount").val(),
                message: '<div class="row">  ' +
                '<div class="col-md-12"> ' +
                '<form class="form-horizontal"> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="set_discount">' + $("#_lan_discount").val() +'</label> ' +
                '<div class="col-md-4"> ' +
                '<input id="set_discount" name="set_discount" type="text" class="form-control input-md" value="' + c_discount + '"> ' +
                '</div> ' +
                '</div> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="set_discount_type">' + $("#_lan_discount_type").val() +'</label> ' +
                '<div class="col-md-4"> <div class="radio"> <label for="set_discount_type-0"> ' +
                '<input type="radio" name="set_discount_type" id="set_discount_type-0" value="p" ' + p_checked + '> ' +
                '' + $("#_lan_percentage").val() +' (%) </label> ' +
                '</div><div class="radio"> <label for="set_discount_type-1"> ' +
                '<input type="radio" name="set_discount_type" id="set_discount_type-1" value="f" ' + f_checked + '> ' + $("#_lan_fixed_amount").val() +' </label> ' +
                '</div> ' +
                '</div> </div>' +
                '</form> </div>  </div>',
                buttons: {
                    success: {
                        label: $("#_lan_btn_save").val(),
                        className: "btn-success",
                        callback: function () {
                            var discount_amount = $('#set_discount').val();
                            var discount_type = $("input[name='set_discount_type']:checked").val();
                            $('#discount_amount').val(discount_amount);
                            $('#discount_type').val(discount_type);
                            calculateTotal();
                            updateTax();
                            updateTotal();
                        }
                    }
                }
            }
        );
    });


    //var callbacks = $.Callbacks();
    //callbacks.add( updateTotal );
    //callbacks.fire(  alert('done') );


    $(".progress").hide();
    $("#emsg").hide();
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        $.post(_url + 'invoices/add-post/', $('#invform').serialize(), function(data){

            var sbutton = $("#submit");
            var _url = $("#_url").val();
            if ($.isNumeric(data)) {

                window.location = _url + 'invoices/view/' + data + '/';
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

    //function doStuff() {
    //    $('.amount').autoNumeric('init');
    //   // alert('dd');
    //}
    //setInterval(doStuff, 5000);

});