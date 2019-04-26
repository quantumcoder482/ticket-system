{extends file="$layouts_admin"}
{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/dp/dist/datepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/dropzone/dropzone.css" />
{/block}
{block name="content"}

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <h3>{$_L['Add an employee']}</h3>
                    <div class="hr-line-dashed"></div>
                    <form method="post" id="mainForm">
                        <div class="form-group">
                            <label for="inputName">{$_L['Name']}</label>
                            <input class="form-control" id="inputName" name="name" {if $employee} value="{$employee->name}" {/if}>
                        </div>


                        <div class="form-group">
                            <label>{$_L['Email']}</label>
                            <input class="form-control" type="email" name="email" {if $employee} value="{$employee->email}" {/if}>
                        </div>

                        <div class="form-group">
                            <label>{$_L['Phone']}</label>
                            <input class="form-control" type="text" name="phone" {if $employee} value="{$employee->phone}" {/if}>
                        </div>


                        <div class="form-group">
                            <label>{$_L['Job title']}</label>
                            <input class="form-control" name="job_title" {if $employee} value="{$employee->job_title}" {/if}>
                        </div>

                        <div class="form-group">
                            <label>{$_L['Address']}</label>
                            <input class="form-control" name="address" {if $employee} value="{$employee->address_line_1}" {/if}>
                        </div>

                        <div class="form-group">
                            <label>{$_L['City']}</label>
                            <input class="form-control" name="city" {if $employee} value="{$employee->city}" {/if}>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{$_L['State Region']}</label>
                                    <input class="form-control" name="state" {if $employee} value="{$employee->state}" {/if}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{$_L['ZIP Postal Code']}</label>
                                    <input class="form-control" name="zip" {if $employee} value="{$employee->zip}" {/if}>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{$_L['Country']}</label>
                            <select class="form-control" name="country">
                                {if $employee}
                                    {Countries::all($employee->country)}
                                    {else}
                                    {Countries::all($config['country'])}
                                {/if}
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{$_L['Date Joined']}</label>
                            <input class="form-control" name="date_hired" datepicker
                                   data-date-format="yyyy-mm-dd" data-auto-close="true"  {if $employee} value="{$employee->date_hired}" {else} value="{date('Y-m-d')}" {/if}>
                        </div>

                        <div class="form-group">
                            <label>{$_L['Pay frequency']}</label>
                            <select class="form-control" name="pay_frequency">
                                <option value="Monthly" {if $employee && $employee->pay_frequency == 'Monthly'} selected{/if}>{$_L['Monthly']}</option>
                                <option value="Hourly" {if $employee && $employee->pay_frequency == 'Hourly'} selected{/if}>{$_L['Hourly']}</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>{$_L['Amount']}</label>
                            <input class="form-control amount" name="amount" {if $employee} value="{$employee->amount}" {/if}>
                        </div>


                        <div class="form-group">
                            <label>{$_L['Summary']}</label>
                            <textarea class="form-control" rows="10" name="summary">{if $employee}{$employee->summary}{/if}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{$_L['Facebook Profile']}</label>
                            <input class="form-control" type="text" name="facebook" {if $employee} value="{$employee->facebook}" {/if}>
                        </div>

                        <div class="form-group">
                            <label>{$_L['Linkedin Profile']}</label>
                            <input class="form-control" type="text" name="linkedin" {if $employee} value="{$employee->linkedin}" {/if}>
                        </div>

                        <div class="form-group">
                            <label>{$_L['Twitter']}</label>
                            <input class="form-control" type="text" name="twitter" {if $employee} value="{$employee->linkedin}" {/if}>
                        </div>

                        <div class="form-group">
                            {if $employee}
                                <input type="hidden" name="employee_id" value="{$employee->id}">
                                <input type="hidden" name="file_link" id="file_link" value="{$employee->image}">
                                {else}
                                <input type="hidden" name="file_link" id="file_link" value="">
                            {/if}

                            <button class="btn btn-primary" id="btnSubmit" type="submit">{$_L['Save']}</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>


            <div class="col-md-6">

                {if $employee}
                <div class="panel">
                    <div class="panel-body">
                        <a href="javascript:;" onclick="confirmThenGoToUrl(event,'delete/employee/{$employee->id}');" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                {/if}

                <div class="panel">
                    <div class="panel-body" id="ibox_form">

                        <h3>{$_L['Image']}</h3>

                        <div class="hr-line-dashed"></div>

                        <form action="" class="dropzone" id="upload_container">

                            <div class="dz-message">
                                <h3> <i class="fa fa-cloud-upload"></i>  {$_L['Drop File Here']}</h3>
                                <br />
                                <span class="note">{$_L['Click to Upload']}</span>
                            </div>

                        </form>

                        <div class="hr-line-dashed"></div>

                        {*<a href="#" class="btn btn-danger">Remove image</a>*}
                    </div>
                </div>


                {if isset($config['employee_proficiencies']) && $config['employee_proficiencies'] == 1}

                    <div class="panel">
                        <div class="panel-body">
                            <h3>Proficiencies</h3>
                            <div class="hr-line-dashed"></div>

                            {foreach $departments as $department}

                                <div class="checkbox" style="margin-bottom: 20px;">
                                    <div class="i-checks"><label> <input name="sales_edit" class="ib_checkbox" type="checkbox" value="yes"> <span style="margin-left: 15px;">{$department->dname}</span></label></div>
                                </div>

                            {/foreach}


                        </div>
                    </div>

                {/if}


            </div>





    </div>

{/block}

{block name=script}

    <script type="text/javascript" src="{$app_url}ui/lib/dp/dist/datepicker.min.js"></script>
    <script type="text/javascript" src="{$app_url}ui/lib/numeric.js"></script>
    <script type="text/javascript" src="{$app_url}ui/lib/dropzone/dropzone.js"></script>


    <script>

        Dropzone.autoDiscover = false;

        $(function () {


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


            $('.amount').autoNumeric('init', {

                aSign: '{$config['currency_code']} ',
                dGroup: {$config['thousand_separator_placement']},
                aPad: {$config['currency_decimal_digits']},
                pSign: '{$config['currency_symbol_position']}',
                aDec: '{$config['dec_point']}',
                aSep: '{$config['thousands_sep']}',
                vMax: '9999999999999999.00',
                vMin: '-9999999999999999.00'

            });

            var $file_link = $("#file_link");

            var upload_resp;

            var ib_file = new Dropzone("#upload_container",
                {
                    url: _url + "hrm/upload-employee-image/",
                    maxFiles: 1
                }
            );


            ib_file.on("sending", function() {

                ib_submit.prop('disabled', true);

            });

            ib_file.on("success", function(file,response) {

                ib_submit.prop('disabled', false);

                upload_resp = response;

                if(upload_resp.success == 'Yes'){

                    toastr.success(upload_resp.msg);
                    $file_link.val(upload_resp.file);


                }
                else{
                    toastr.error(upload_resp.msg);
                }


            });




            $('#btnSubmit').click(function (e) {
                e.preventDefault();

                $.post( "{$_url}hrm/employee-post", $('#mainForm').serialize() ).done(function() {
                    window.location = '{$_url}hrm/employees';
                }).fail(function(data) {
                    console.log(data.responseText);
                    spNotify(data.responseText,'error');
                });
            });
        })

    </script>


{/block}