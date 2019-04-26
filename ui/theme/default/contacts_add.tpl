{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">

        <div class="col-md-12">



            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Add Contact']}</h5>

                    <a href="{$_url}contacts/import_csv/" class="btn btn-xs btn-primary btn-rounded pull-right"><i class="fa fa-bars"></i> Import Contacts</a>

                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform">

                        <div class="row">
                            <div class="col-md-6 col-sm-12">


                                <div class="form-group"><label class="col-md-4 control-label" for="account">{$_L['Full Name']}<small class="red">*</small> </label>

                                    <div class="col-lg-8"><input type="text" id="account" name="account" class="form-control" autofocus>

                                    </div>
                                </div>




                                <div class="form-group"><label class="col-md-4 control-label" for="account">{$_L['Code']}</label>

                                    <div class="col-lg-8"><input type="text" id="code" name="code" class="form-control" value="{$predict_customer_number}">

                                    </div>
                                </div>

                                <div class="form-group"><label class="col-md-4 control-label" for="display_name">{$config['contact_extra_field']} </label>

                                    <div class="col-lg-8">

                                        <input type="text" id="display_name" name="display_name" class="form-control">

                                    </div>
                                </div>

                                {*<div class="form-group"><label class="col-md-4 control-label" for="company">{$_L['Company Name']}</label>*}

                                {*<div class="col-lg-8"><input type="text" id="company" name="company" class="form-control">*}

                                {*</div>*}
                                {*</div>*}

                                <div class="form-group"><label class="col-md-4 control-label" for="cid">{$_L['Company']}</label>

                                    <div class="col-lg-8">

                                        <select id="cid" name="cid" class="form-control">
                                            <option value="0">{$_L['None']}</option>
                                            {foreach $companies as $company}
                                                <option value="{$company['id']}" {if $c_selected_id eq ($company['id'])}selected{/if}>{$company['company_name']}</option>
                                            {/foreach}
                                        </select>
                                        <span class="help-block"><a href="#" class="add_company"><i class="fa fa-plus"></i> {$_L['New Company']}</a> </span>

                                    </div>
                                </div>


                                {if $config['show_business_number'] eq '1'}

                                    <div class="form-group"><label class="col-md-4 control-label" for="business_number">{$config['label_business_number']}</label>

                                        <div class="col-lg-8"><input type="text" id="business_number" name="business_number" class="form-control">

                                        </div>
                                    </div>

                                {/if}




                                <div class="form-group"><label class="col-md-4 control-label" for="cid">{$_L['Type']}</label>

                                    <div class="col-lg-8">


                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="i-checks" name="customer" value="Customer" {if $contact_type eq 'customer'}checked{/if}>
                                                {$_L['Customer']}
                                            </label>
                                        </div>

                                        {if $config['suppliers'] eq '1'}
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="i-checks" name="supplier" value="Supplier" {if $contact_type eq 'supplier'}checked{/if}>
                                                    {$_L['Supplier']}
                                                </label>
                                            </div>
                                        {/if}

                                    </div>
                                </div>


                                <div class="form-group"><label class="col-md-4 control-label" for="email">{$_L['Email']}</label>

                                    <div class="col-lg-8"><input type="text" id="email" name="email" class="form-control">

                                    </div>
                                </div>


                                <div class="form-group"><label class="col-md-4 control-label" for="secondary_email">{$_L['Secondary Email']}</label>

                                    <div class="col-lg-8"><input type="text" id="secondary_email" name="secondary_email" class="form-control">

                                    </div>
                                </div>


                                <div class="form-group"><label class="col-md-4 control-label" for="phone">{$_L['Phone']}</label>

                                    <div class="col-lg-8"><input type="text" id="phone" name="phone" class="form-control">

                                    </div>
                                </div>



                                {if $config['fax_field'] eq '1'}

                                    <div class="form-group"><label class="col-md-4 control-label" for="fax">{$_L['Fax']}</label>

                                        <div class="col-lg-8"><input type="text" id="fax" name="fax" class="form-control">

                                        </div>
                                    </div>

                                {/if}














                                <div class="form-group"><label class="col-md-4 control-label" for="address">{$_L['Address']}</label>

                                    <div class="col-lg-8"><input type="text" id="address" name="address" class="form-control">

                                    </div>
                                </div>


                                <div class="form-group"><label class="col-md-4 control-label" for="city">{$_L['City']}</label>

                                    <div class="col-lg-8"><input type="text" id="city" name="city" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-4 control-label" for="state">{$_L['State Region']}</label>

                                    <div class="col-lg-8"><input type="text" id="state" name="state" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-4 control-label" for="zip">{$_L['ZIP Postal Code']} </label>

                                    <div class="col-lg-8"><input type="text" id="zip" name="zip" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-md-4 control-label" for="country">{$_L['Country']}</label>

                                    <div class="col-lg-8">

                                        <select name="country" id="country" class="form-control">
                                            <option value="">{$_L['Select Country']}</option>
                                            {$countries}
                                        </select>

                                    </div>
                                </div>

                                {*run foreach*}

                                {foreach $fs as $f}
                                    <div class="form-group"><label class="col-md-4 control-label" for="cf{$f['id']}">{$f['fieldname']}</label>
                                        {if ($f['fieldtype']) eq 'text'}


                                            <div class="col-lg-8">
                                                <input type="text" id="cf{$f['id']}" name="cf{$f['id']}" class="form-control">
                                                {if ($f['description']) neq ''}
                                                    <span class="help-block">{$f['description']}</span>
                                                {/if}

                                            </div>

                                        {elseif ($f['fieldtype']) eq 'password'}

                                            <div class="col-lg-8">
                                                <input type="password" id="cf{$f['id']}" name="cf{$f['id']}" class="form-control">
                                                {if ($f['description']) neq ''}
                                                    <span class="help-block">{$f['description']}</span>
                                                {/if}
                                            </div>

                                        {elseif ($f['fieldtype']) eq 'dropdown'}
                                            <div class="col-lg-8">
                                                <select id="cf{$f['id']}" name="cf{$f['id']}" class="form-control">
                                                    {foreach explode(',',$f['fieldoptions']) as $fo}
                                                        <option value="{$fo}">{$fo}</option>
                                                    {/foreach}
                                                </select>
                                                {if ($f['description']) neq ''}
                                                    <span class="help-block">{$f['description']}</span>
                                                {/if}
                                            </div>


                                        {elseif ($f['fieldtype']) eq 'textarea'}

                                            <div class="col-lg-8">
                                                <textarea id="cf{$f['id']}" name="cf{$f['id']}" class="form-control" rows="3"></textarea>
                                                {if ($f['description']) neq ''}
                                                    <span class="help-block">{$f['description']}</span>
                                                {/if}
                                            </div>

                                        {else}
                                        {/if}
                                    </div>
                                {/foreach}

                                <div class="form-group"><label class="col-md-4 control-label" for="tags">{$_L['Tags']}</label>

                                    <div class="col-lg-8">
                                        {*<input type="text" id="tags" name="tags" style="width:100%">*}
                                        <select name="tags[]" id="tags" class="form-control" multiple="multiple">
                                            {foreach $tags as $tag}
                                                <option value="{$tag['text']}">{$tag['text']}</option>
                                            {/foreach}

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">


                                <div class="form-group"><label class="col-md-4 control-label" for="currency">{$_L['Currency']}</label>

                                    <div class="col-lg-8">
                                        <select id="currency" name="currency" class="form-control">

                                            {foreach $currencies as $currency}
                                                <option value="{$currency['id']}"
                                                        {if $config['home_currency'] eq ($currency['cname'])}selected="selected" {/if}>{$currency['cname']}</option>
                                                {foreachelse}
                                                <option value="0">{$config['home_currency']}</option>
                                            {/foreach}

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-md-4 control-label" for="group">{$_L['Group']}</label>

                                    <div class="col-lg-8">
                                        <select class="form-control" name="group" id="group">
                                            <option value="0">{$_L['None']}</option>
                                            {foreach $gs as $g}
                                                <option value="{$g['id']}" {if $g_selected_id eq ($g['id'])}selected{/if}>{$g['gname']}</option>
                                            {/foreach}
                                        </select>
                                        <span class="help-block"><a href="#" id="add_new_group">{$_L['Add New Group']}</a> </span>
                                    </div>
                                </div>


                                {if $config['customer_custom_username']}
                                    <div class="form-group"><label class="col-md-4 control-label" for="username">{$_L['Username']}</label>

                                        <div class="col-lg-8"><input type="text" id="username" name="username" class="form-control">

                                        </div>
                                    </div>
                                {/if}

                                <div class="form-group"><label class="col-md-4 control-label" for="password">{$_L['Password']}</label>

                                    <div class="col-lg-8"><input type="password" id="password" name="password" class="form-control">

                                    </div>
                                </div>

                                <div class="form-group"><label class="col-md-4 control-label" for="cpassword">{$_L['Confirm Password']}</label>

                                    <div class="col-lg-8"><input type="password" id="cpassword" name="cpassword" class="form-control">

                                    </div>
                                </div>



                                {if isset($config['add_contact_remove_welcome_email'])}

                                    <input type="hidden" name="send_client_signup_email" id="send_client_signup_email" value="No">
                                    {else}

                                    <div class="form-group"><label class="col-md-4 control-label" for="send_client_signup_email">{$_L['Welcome Email']}</label>

                                        <div class="col-lg-8">


                                            <input type="checkbox" checked data-toggle="toggle" data-size="small" data-on="{$_L['Yes']}" data-off="{$_L['No']}" id="send_client_signup_email" name="send_client_signup_email" value="Yes">


                                            <span class="help-block">{$_L['Send Client Signup Email']}</span>

                                        </div>
                                    </div>

                                {/if}




                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-lg-10">




                                        <button class="md-btn md-btn-primary waves-effect waves-light" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Save']}</button> | <a href="{$_url}contacts/list/">{$_L['Or Cancel']}</a>


                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_msg_add_new_group" id="_msg_add_new_group" value="{$_L['Add New Group']}">
    <input type="hidden" name="_msg_group_name" id="_msg_group_name" value="{$_L['Group Name']}">







{/block}

{block name="script"}
    <script>
        $(document).ready(function () {
            $(".progress").hide();
            $("#emsg").hide();
            var _url = $("#_url").val();


            var i_checks = $('.i-checks');
            i_checks.iCheck({
                checkboxClass: 'icheckbox_square-blue'
            });


            $('#tags').select2({
                tags: true,
                tokenSeparators: [','],
                theme: "bootstrap"
            });

            var $cid = $('#cid');

            $cid.select2({
                theme: "bootstrap"
            });

            $country = $("#country");

            $country.select2({
                theme: "bootstrap"
            });


            //
            $("#submit").click(function (e) {
                e.preventDefault();
                $('#ibox_form').block({ message:block_msg });
                var _url = $("#_url").val();
                $.post(_url + 'contacts/add-post/', $( "#rform" ).serialize())
                    .done(function (data) {
                        var sbutton = $("#submit");
                        var _url = $("#_url").val();
                        if ($.isNumeric(data)) {

                            window.location = _url + 'contacts/view/' + data;
                        }
                        else {
                            $('#ibox_form').unblock();
                            var body = $("html, body");
                            body.animate({ scrollTop:0 }, '1000', 'swing');
                            $("#emsgbody").html(data);
                            $("#emsg").show("slow");
                        }
                    });
            });

            var _msg_add_new_group = $("#_msg_add_new_group").val();
            var _msg_group_name = $("#_msg_group_name").val();


            var ib_form_bootbox = "<form class=\"form-horizontal push-10\" method=\"post\" onsubmit=\"return false;\">\n    <div class=\"form-group\">\n        <div class=\"col-xs-12\">\n            <div class=\"form-material floating\">\n                <input class=\"form-control\" type=\"text\" id=\"group_name\" name=\"group_name\">\n                <label for=\"envato_api_key\">" + _msg_group_name + "</label>\n                           </div>\n        </div>\n    </div>\n\n</form>";


            var box =   bootbox.dialog({
                    title: _msg_add_new_group,
                    message: ib_form_bootbox,
                    buttons: {
                        success: {
                            label: "Save",
                            className: "btn-primary",
                            callback: function () {
                                // var name = $('#name').val();
                                // var answer = $("input[name='awesomeness']:checked").val();
                                // Example.show("Hello " + name + ". You've chosen <b>" + answer + "</b>");

                                var group_name_val = $('#group_name').val();

                                if(group_name_val != ''){


                                    $.post( _url + "contacts/add_group/", { group_name: group_name_val })
                                        .done(function( data ) {

                                            if ($.isNumeric(data)) {

                                                window.location = _url + 'contacts/add/{$contact_type}/' + data + '/' + $cid.val();

                                            }

                                            else {
                                                bootbox.alert(data);
                                            }

                                        });


                                }


                            }
                        }
                    },
                    show: false
                }
            );





            $("#add_new_group").click(function(e){

                e.preventDefault();

                box.modal('show');


            });


            box.on("shown.bs.modal", function() {

                var group_name = $('#group_name');
                setTimeout(function(){
                    group_name.focus();
                }, 1000);

            });





            $.fn.modal.defaults.width = '700px';

            var $modal = $('#ajax-modal');

            $('[data-toggle="tooltip"]').tooltip();

            $('.add_company').on('click', function(e){

                e.preventDefault();

                $('body').modalmanager('loading');

                $modal.load( _url + 'contacts/modal_add_company/', '', function(){

                    $modal.modal();

                    $("#ajax-modal .country").select2({
                        theme: "bootstrap"
                    });

                });
            });


            $modal.on('click', '.modal_submit', function(e){

                e.preventDefault();

                $modal.modal('loading');

                $.post( _url + "contacts/add_company_post/", $("#ib_modal_form").serialize())
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            window.location = base_url + 'contacts/add/{$contact_type}/' + $("#group").val() + '/' + data;

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
                        }

                    });

            });




            {if $config['show_business_number'] eq '1'}


            var $business_number = $("#business_number");

            var $address = $("#address");

            var $city = $("#city");

            var $state = $("#state");

            var $zip = $("#zip");



            function getBusinessDetails() {

                if($cid.val() === '0'){
                   // $business_number.val('');
                    return;
                }

                $.getJSON( base_url + "contacts/get_company_details/" +  $cid.val(), function( data ) {

                    console.log(data);

                    if(data.success === false){

                    }
                    else{

                        $business_number.val(data.business_number);

                        $address.val(data.address1);

                        $city.val(data.city);

                        $state.val(data.state);

                        $zip.val(data.zip);

                        $country.val(data.country).trigger('change');

                    }

                });
            }

            getBusinessDetails();


            $cid.change(function () {

                getBusinessDetails();


            });


            {/if}





        });
    </script>
{/block}


