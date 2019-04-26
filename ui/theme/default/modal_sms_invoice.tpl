


<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        {$_L['Send SMS']}
    </h3>
</div>
<div class="modal-body">



    <form class="form-horizontal" id="ib_modal_form">

        <input type="hidden" id="smsInvoiceId" name="smsInvoiceId" value="{$invoice_id}">

        <div class="form-group"><label class="col-lg-2 control-label" for="from">From </label>

            <div class="col-lg-6"><input type="text" name="sms_from" id="sms_from" class="form-control " value="{$config['sms_sender_name']}">

            </div>
        </div>

        <div class="form-group"><label class="col-lg-2 control-label" for="sms_to">To </label>

            <div class="col-lg-6">
                <input type="text" name="sms_to" id="sms_to" class="form-control " value="{$to}">



            </div>
        </div>

        <div class="form-group"><label class="col-lg-2 control-label" for="message">SMS </label>

            <div class="col-lg-6">

                <textarea class="form-control" name="message" id="message" rows="4">{$message}</textarea>

                <input type="hidden" name="template_id" id="template_id" value="">

                <p class="help-block" id="sms-counter">
                    Remaining: <span class="remaining"></span> | Length: <span class="length"></span> | Messages: <span class="messages"></span>
                </p>



            </div>
        </div>

    </form>

</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Cancel']}</button>
    <button class="btn btn-primary modal_submit" type="submit" id="btnModalSMSSend"><i class="fa fa-check"></i> {$_L['Send']}</button>
</div>