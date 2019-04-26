<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        Send Email
    </h3>
</div>
<div class="modal-body">

    <div class="mail-box">


        <div class="mail-body">

            <form class="form-horizontal" method="get">
                <div class="form-group"><label class="col-sm-2 control-label" for="toemail">{$_L['To']}:</label>

                    <div class="col-sm-10"><input type="text" id="toemail" name="toemail" class="form-control" value="{$email}"></div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" for="subject">{$_L['Subject']}:</label>

                    <div class="col-sm-10"><input type="text" id="subject" name="subject" class="form-control" value=""></div>
                </div>
            </form>

        </div>

        <div class="mail-text">

            <textarea id="email_content"  class="form-control sysedit" name="content"></textarea>

            <div class="clearfix"></div>
        </div>






    </div>

</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Cancel']}</button>
    <button class="btn btn-primary" type="submit" id="btn_send_email"><i class="fa fa-paper-plane-o"></i> {$_L['Send']}</button>
</div>