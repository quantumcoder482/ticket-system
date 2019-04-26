{extends file="$layouts_admin"}

{block name="style"}
    <style>
        .contact-box {
            background-color: #ffffff;
            border: 1px solid #e7eaec;
            padding: 20px;
            margin-bottom: 20px;
        }

        .contact-box > a {
            color: inherit;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .rounded-circle {
            border-radius: 50%!important;
        }


    </style>
{/block}
{block name="content"}

    <div class="row">
        <div class="col-md-6">
            <h3>Employees</h3>
        </div>

        <div class="col-md-6 text-right">
            <a href="{$_url}hrm/employee" class="btn btn-primary">{$_L['Add an employee']}</a>

        </div>

    </div>

    <div class="hr-line-dashed"></div>
    <div class="row">

        {foreach $employees as $employee}

            <div class="col-lg-4">
                <div class="contact-box">
                    <a class="row" href="{$_url}hrm/employee/{$employee->id}">
                        <div class="col-xs-4">
                            <div class="text-center">
                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="{$app_url}storage/employees/employee_default.png">
                                <div class="m-t-xs font-bold">
                                    {$employee->job_title}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <h3><strong>{$employee->name}</strong></h3>
                            <p><i class="fa fa-envelope-o"></i> {$employee->email}</p>
                            <address>
                                <strong>
                                    {if $employee->pay_frequency == 'Monthly'}
                                        {$_L['Monthly']}
                                        {elseif $employee->pay_frequency == 'Hourly'}
                                        {$_L['Hourly']}
                                        {else}
                                        {$employee->pay_frequency}
                                    {/if}
                                     | <span class="amount">{$employee->amount}</span> </strong><br>
                                {$_L['Date Joined']}: {date( $config['df'], strtotime($employee->date_hired))}<br>
                                <div class="hr-line-dashed"></div>
                                {if $employee->address_line_1 != ''}{$employee->address_line_1} <br> {/if} {if $employee->city != ''}{$employee->city} <br>
                                {/if} {if $employee->state != ''}{$employee->state}{/if} {if $employee->zip != ''}{$employee->zip}{/if} <br>

                                {if $employee->phone != ''}{$employee->phone}
                                    <abbr title="Phone">P:</abbr> {$employee->phone}
                                {/if}


                            </address>
                        </div>
                    </a>
                </div>
            </div>

            {foreachelse}

            <p>No data to display</p>
        {/foreach}


    </div>


{/block}

{block name=script}

    <script type="text/javascript" src="{$app_url}ui/lib/numeric.js"></script>

    <script>

        $(function () {

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
        })

    </script>


{/block}