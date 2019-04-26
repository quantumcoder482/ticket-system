<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        {if $act eq 'edit'}
            {$_L['Edit']}
            {elseif $act eq 'view'}
            {$lead->salutation} {$lead->first_name} {$lead->middle_name} {$lead->last_name}
        {else}
            {$_L['New Lead']}
        {/if}
    </h3>
</div>
<div class="modal-body">



    {if $act eq 'edit' || $act eq 'new'}

        <form class="form-horizontal" id="ib_modal_form">



            <div class="row">

                <div class="col-md-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="is_public" checked> {$_L['Public']}
                        </label>
                    </div>
                </div>

                <div class="col-md-4">

                </div>

                <div class="col-md-4">

                </div>


            </div>

            <div class="row">







                <div class="col-md-12">



                    <div class="form-group"><label class="col-md-12" for="status">{$_L['Status']}</label>
                        <div class="col-md-12">
                            <select class="selectpicker" id="status" name="status">

                                {foreach $ls as $s}
                                    {if $act eq 'edit'}
                                        <option value="{$s['sname']}" {if $val['status'] eq $s['sname']}selected{/if}>{$s['sname']}</option>
                                        {else}
                                        <option value="{$s['sname']}" {if $s['is_default'] eq '1'}selected{/if}>{$s['sname']}</option>
                                    {/if}
                                {/foreach}

                            </select>
                        </div>
                    </div>


                    <div class="form-group"><label class="col-md-12" for="salutation">{$_L['Salutation']}</label>
                        <div class="col-md-12">
                            <select class="selectpicker" id="salutation" name="salutation">
                                <option value="None">--{$_L['None']}--</option>
                                {foreach $salutations as $salutation}
                                    {if $act eq 'edit'}
                                        <option value="{$salutation['sname']}" {if $val['salutation'] eq $salutation['sname']}selected{/if}>{$salutation['sname']}</option>
                                    {else}
                                        <option value="{$salutation['sname']}">{$salutation['sname']}</option>
                                    {/if}

                                {/foreach}
                            </select>
                        </div>
                    </div>


                    <div class="form-group"><label class="col-md-12" for="first_name">{$_L['First Name']}</label>
                        <div class="col-md-12">
                            <input type="text" id="first_name" name="first_name" class="form-control" value="{$val['first_name']}">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-md-12" for="first_name">{$_L['Middle Name']}</label>
                        <div class="col-md-12">
                            <input type="text" id="middle_name" name="middle_name" class="form-control" value="{$val['middle_name']}">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-md-12" for="last_name">{$_L['Last Name']}<small class="red">*</small></label>

                        <div class="col-md-12"><input type="text" id="last_name" name="last_name" class="form-control" value="{$val['last_name']}">

                        </div>

                    </div>

                    <div class="form-group"><label class="col-md-12" for="title">{$_L['Title']}</label>
                        <div class="col-md-12">
                            <input type="text" id="title" name="title" class="form-control" value="{$val['title']}">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-md-12" for="company">{$_L['Company']}</label>
                        <div class="col-md-12">
                            <select class="selectpicker" id="company" name="company">
                                <option value="None">--{$_L['None']}--</option>
                                {foreach $companies as $company}
                                    <option value="{$company['id']}" {if $val['company'] eq $company['company_name']}selected{/if}>{$company['company_name']}</option>
                                {/foreach}
                            </select>

                        </div>
                    </div>

                    <div class="form-group"><label class="col-md-12" for="email">{$_L['Email']}</label>
                        <div class="col-md-12">
                            <input type="text" id="email" name="email" class="form-control" value="{$val['email']}">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-md-12" for="">{$_L['Phone']}</label>
                        <div class="col-md-12">
                            <input type="text" id="phone" name="phone" class="form-control" value="{$val['phone']}">
                        </div>
                    </div>




                    <div class="form-group"><label class="col-md-12" for="source">{$_L['Source']}</label>
                        <div class="col-md-12">
                            <select class="selectpicker" id="source" name="source">
                                <option value="None">--{$_L['None']}--</option>
                                {foreach $sources as $source}
                                    <option value="{$source['sname']}">{$source['sname']}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>


                    <div class="form-group"><label class="col-md-12" for="industry">{$_L['Industry']}</label>
                        <div class="col-md-12">
                            <select class="selectpicker" id="industry" name="industry">
                                {foreach $industries as $industry}
                                    <option value="{$industry['industry']}" {if $val['industry'] eq $industry['industry']}selected{/if}>{$industry['industry']}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>


                    {*<div class="form-group"><label class="col-md-12" for="">{$_L['No. of Employees']}</label>*}
                        {*<div class="col-md-12">*}
                            {*<input type="text" id="" name="" class="form-control" value="{$val['']}">*}
                        {*</div>*}
                    {*</div>*}

                    {*<div class="form-group"><label class="col-md-12" for="rating">{$_L['Rating']}</label>*}
                        {*<div class="col-md-12">*}
                            {*<input type="text" id="rating" name="rating" class="form-control" value="{$val['rating']}">*}
                        {*</div>*}
                    {*</div>*}



                    <fieldset>
                        <legend>{$_L['Address']}</legend>

                        <div class="form-group"><label class="col-md-12" for="street">{$_L['Street']}</label>
                            <div class="col-md-12">
                                <textarea class="form-control" id="street" name="street" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="form-group"><label class="col-md-12" for="city">{$_L['City']}</label>
                            <div class="col-md-12">
                                <input type="text" id="company" name="city" class="form-control" value="{$val['city']}">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-md-12" for="state">{$_L['State Region']}</label>
                            <div class="col-md-12">
                                <input type="text" id="state" name="state" class="form-control" value="{$val['state']}">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-md-12" for="zip">{$_L['ZIP Postal Code']}</label>
                            <div class="col-md-12">
                                <input type="text" id="zip" name="zip" class="form-control" value="{$val['zip']}">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-md-12" for="country">{$_L['Country']}</label>
                            <div class="col-md-12">
                                <input type="text" id="country" name="country" class="form-control" value="{$val['country']}">
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>{$_L['Description']}</legend>

                        <div class="form-group"><label class="col-md-12" for="memo">{$_L['Memo']}</label>
                            <div class="col-md-12">
                                <textarea class="form-control" id="memo" name="memo" rows="4"></textarea>
                            </div>
                        </div>


                        </fieldset>



                </div>




            </div>




            <input type="hidden" name="act" id="act" value="{$act}">
            <input type="hidden" name="lid" id="lid" value="{$val['lid']}">
        </form>


        {else}


        <div class="row">
            <div class="col-md-3 ib_profile_width">

                <div class="panel panel-default" id="ibox_panel">

                    <div class="panel-body">
                        <div class="thumb-info mb-md">
                            <img src="{$app_url}storage/system/profile-place-holder.jpg" class="img-thumbnail img-responsive" alt=" ">
                            <div class="thumb-info-title">
                                <span class="thumb-info-inner">{$lead->salutation} {$lead->first_name} {$lead->middle_name} {$lead->last_name}</span>

                            </div>
                        </div>





                        <h5 class="text-muted">{$lead->email}</h5>
                        <h5 class="text-muted">{$lead->phone}</h5>







                    </div>

                    {*<div class="panel-body list-group border-bottom m-t-n-lg">*}
                        {*<a href="#" id="summary" class="list-group-item active"><span class="fa fa-bar-chart-o"></span> Summary </a>*}
                        {*<a href="#" id="activity" class="list-group-item"><span class="fa fa-tasks"></span> Activity</a>*}
                        {*<a href="#" id="invoices" class="list-group-item"><span class="fa fa-credit-card"></span> Invoices<span class="label label-info pull-right">0</span></a>*}

                        {*<a href="#" id="quotes" class="list-group-item"><span class="fa fa-file-text-o"></span> Quotes<span class="label label-info pull-right">0</span></a>*}


                        {*<a href="#" id="orders" class="list-group-item"><span class="fa fa-server"></span> Orders</a>*}
                        {*<a href="#" id="files" class="list-group-item"><span class="fa fa-file-o"></span> Files</a>*}
                        {*<a href="#" id="transactions" class="list-group-item"><span class="fa fa-th-list"></span> Transactions</a>*}
                        {*<a href="#" id="email" class="list-group-item"><span class="fa fa-envelope-o"></span> Email</a>*}

                        {*<a href="#" id="edit" class="list-group-item"><span class="fa fa-pencil"></span> Edit</a>*}
                        {*<a href="#" id="more" class="list-group-item"><span class="fa fa-bars"></span> More</a>*}
                    {*</div>*}



                </div>

            </div>

            <div class="col-md-9">

                <!-- START TIMELINE -->
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{$lead->salutation} {$lead->first_name} {$lead->middle_name} {$lead->last_name}</h5>
                    </div>

                    <div class="ibox-content" id="ibox_form" style="position: static; zoom: 1;">


                        <div id="application_ajaxrender" style="min-height: 200px;">
                            <p>

                                <strong>{$_L['Full Name']}: </strong> {$lead->salutation} {$lead->first_name} {$lead->middle_name} {$lead->last_name} <br>
                                <strong>{$_L['Company Name']}: </strong> {$lead->company} <br>
                                <strong>{$_L['Email']}: </strong>  {$lead->email}  <br>
                                <strong>{$_L['Phone']}: </strong>  {$lead->phone}  <br>
                                <strong>{$_L['Address']}: </strong>  {$lead->street}  <br>
                                <strong>{$_L['City']}: </strong>  {$lead->city}  <br>
                                <strong>{$_L['State Region']}: </strong>  {$lead->state}  <br>
                                <strong>{$_L['ZIP Postal Code']}: </strong>  {$lead->zip}  <br>
                                <strong>{$_L['Country']}: </strong>  {$lead->country}  <br>




                            </p>

                            <hr>

                            <a href="#" class="md-btn md-btn-primary act_convert_to_customer"> {$_L['Convert to Customer']}</a>

                            <input type="hidden" name="v_lid" id="v_lid" value="{$lead->id}">

                            <hr>

                            <textarea class="form-control" id="v_memo" name="v_memo" rows="6">{$lead->memo}</textarea>

                            <button type="button" id="memo_update" class="btn btn-primary btn-block mt-sm act_memo_update">{$_L['Save']}</button>


                            </div>

                    </div>
                </div>
                <!-- END TIMELINE -->

            </div>

        </div>


    {/if}




</div>
<div class="modal-footer">

    {if $act eq 'edit' || $act eq 'new'}

    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Cancel']}</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i class="fa fa-check"></i> {$_L['Save']}</button>

    {else}

        <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>

    {/if}
</div>

<div id="modal_search_address" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Stack Two</h4>
    </div>
    <div class="modal-body">
        <p>One fine body…</p>
        <p>One fine body…</p>
        <input class="form-control" type="text" data-tabindex="1">
        <input class="form-control" type="text" data-tabindex="2">
        <button class="btn btn-default" data-toggle="modal" href="#stack3">Launch modal</button>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
        <button type="button" class="btn btn-primary">Ok</button>
    </div>
</div>