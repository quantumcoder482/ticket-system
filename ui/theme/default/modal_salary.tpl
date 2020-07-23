<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        {if $type eq 'edit'}
            {$_L['Edit']}
        {elseif $type eq 'view'}
            {$_L['View']}
        {else}
            New Salary
        {/if}
    </h3>
</div>

<div class="modal-body">

    <div class="row">
        <form class="form-horizontal" id="mrform">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content" id="ib_modal_form">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="m_date">Date <small class="red">*</small></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control datepicker" value="{$salary['date']}" name="m_date" id="m_date" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true" autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="m_pay_for">Pay for<small class="red">*</small></label>
                            <div class="col-md-8">
                                <input type="text" id="m_pay_for" name="m_pay_for" class="form-control" value="{$salary['pay_for']}" autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="m_amount">Sales Price <small class="red">*</small></label>

                            <div class="col-md-8">
                                <input type="text" id="m_amount" name="m_amount" class="form-control amount" value="{$salary['amount']}" autocomplete="off" data-a-sign="{$config['currency_code']} "  data-a-dec="{$config['dec_point']}" data-a-sep="{$config['thousands_sep']}" data-d-group="2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="m_employee_id">Employee <small class="red">*</small></label>
                            <div class="col-md-8">
                                <select id="m_employee_id" name="m_employee_id" style="width:100%" class="form-control">
                                    {foreach $employees as $emp}
                                        <option value="{$emp['id']}" {if $emp['id'] eq $salary['employee_id']} selected {/if}> {$emp['fullname']}</option>
                                    {/foreach}
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="m_status">PayOut Status <small class="red">*</small></label>

                            <div class="col-md-8">
                                <select class="form-control" style="width:100%" id="m_status" name="m_status">
                                    {foreach $payout_status as $p}
                                        <option value="{$p}" {if $p eq $salary['status']} selected {/if}> {$p}</option>
                                    {/foreach}
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="m_request">Request <small class="red">*</small></label>

                            <div class="col-md-8">
                                <select class="form-control" style="width:100%" id="m_request" name="m_request">
                                    <option value="no" {if $salary['request'] eq 'no'} selected {/if}> No </option>
                                    <option value="yes" {if $salary['request'] eq 'yes' } selected {/if}> Yes </option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="sid" id="sid" value="{$salary['id']}">
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button> 
    
    {if $type eq 'edit'}
    <button type="submit" class="btn btn-primary modal_submit" id="modal_submit">
        <i class="fa fa-check"></i>{$_L['Update']}
    </button>
    {/if}
    
    {if $type eq 'create'}
    <button type="submit" class="btn btn-primary modal_submit" id="modal_submit">
        <i class="fa fa-check"></i>{$_L['Save']}
    </button>
    {/if}
</div>

{block name="script"}
<script>

    $(document).ready(function () {

        $(".progress").hide();
        $("#emsg").hide();
  
        $('#m_employee_id').select2({
            theme: "bootstrap"
        });

        $('#m_status').select2({
            theme:"bootstrap"
        });

        $('#m_request').select2({
            theme:"bootstrap"
        });

        $('.datepicker').datepicker();

        function ib_autonumeric() {
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

        }

        ib_autonumeric();


    });
</script>
{/block}