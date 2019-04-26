


<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        {if $f_type eq 'edit'}
            {$_L['Edit']}
        {else}
            {$_L['New Company']}
        {/if}
    </h3>
</div>
<div class="modal-body">



    <form class="form-horizontal" id="ib_modal_form">


        <div class="row">
            <div class="col-md-6">



                <div class="form-group">
                    <label class="col-md-12" for="company_name">{$_L['Company Name']}<small class="red">*</small></label>

                    <div class="col-md-12"><input type="text" id="company_name" name="company_name" class="form-control" value="{$val['company_name']}">

                    </div>


                </div>


                <div class="form-group">
                    <label class="col-md-12" for="code">{$_L['Code']}<small class="red">*</small></label>

                    <div class="col-md-12"><input type="text" id="code" name="code" class="form-control" value="{$val['code']}">

                    </div>


                </div>

                {if $config['show_business_number'] eq '1'}


                    <div class="form-group">
                        <label class="col-md-12" for="business_number">{$config['label_business_number']}</label>

                        <div class="col-md-12"><input type="text" id="business_number" name="business_number" class="form-control" value="{$val['business_number']}">

                        </div>


                    </div>


                {/if}


                <div class="form-group"><label class="col-md-12" for="url">{$_L['URL']}</label>

                    <div class="col-md-12"><input type="text" id="url" name="url" class="form-control" value="{$val['url']}">

                    </div>


                </div>


                <div class="form-group"><label class="col-md-12" for="email">{$_L['Email']}</label>

                    <div class="col-md-12"><input type="text" id="email" name="email" class="form-control" value="{$val['email']}">

                    </div>


                </div>


                <div class="form-group"><label class="col-md-12" for="phone">{$_L['Phone']}</label>

                    <div class="col-md-12"><input type="text" id="phone" name="phone" class="form-control" value="{$val['phone']}">

                    </div>


                </div>


                {if $config['fax_field'] eq '1'}


                    <div class="form-group"><label class="col-md-12" for="fax">{$_L['Fax']}</label>

                        <div class="col-md-12"><input type="text" id="fax" name="fax" class="form-control" value="{$val['fax']}">

                        </div>


                    </div>



                {/if}


                <div class="form-group"><label class="col-md-12" for="logo_url">{$_L['Logo URL']}</label>

                    <div class="col-md-12"><input type="text" id="logo_url" name="logo_url" class="form-control" value="{$val['logo_url']}">

                    </div>


                </div>






            </div>

            <div class="col-md-6">

                <div class="form-group"><label class="col-md-12" for="c_address1">{$_L['Address']}</label>

                    <div class="col-lg-12"><input type="text" id="c_address1" name="address1" class="form-control" value="{$val['address1']}">

                    </div>


                </div>

                <div class="form-group"><label class="col-md-12" for="c_city">{$_L['City']}</label>

                    <div class="col-md-12"><input type="text" id="c_city" name="city" class="form-control" value="{$val['city']}">

                    </div>


                </div>

                <div class="form-group"><label class="col-md-12" for="c_state">{$_L['State Region']}</label>


                    <div class="col-md-12"><input type="text" id="c_state" name="state" class="form-control" value="{$val['state']}"></div>


                </div>

                <div class="form-group"><label class="col-md-12" for="c_zip">{$_L['ZIP Postal Code']}</label>

                    <div class="col-md-12"><input type="text" id="c_zip" name="zip" class="form-control" value="{$val['zip']}"></div>


                </div>

                <div class="form-group"><label class="col-md-12" for="c_country">{$_L['Country']}</label>

                    <div class="col-md-12">
                        <select name="country" id="c_country" class="form-control country">
                            <option value="">{$_L['Select Country']}</option>
                            {$countries}
                        </select>
                    </div>


                </div>



            </div>
        </div>



        <input type="hidden" name="f_type" id="f_type" value="{$f_type}">
        <input type="hidden" name="cid" id="cid" value="{$val['cid']}">
    </form>

</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Cancel']}</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i class="fa fa-check"></i> {$_L['Save']}</button>
</div>