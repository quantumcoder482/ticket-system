{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins"  id="iform">
                <div class="ibox-title">
                    <h5>{$_L['Send Email']}</h5>

                </div>
                <div class="ibox-content">

                    <form class="form-horizontal" method="post">

                        <div class="mail-box">


                            <div class="mail-body">


                                <div class="form-group"><label class="col-sm-2 control-label" for="emails">{$_L['To']}:</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" id="emails" multiple="multiple">

                                            {foreach $ds as $d}
                                                <option value="{$d['email']}" selected>{$d['email']}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                {*<div class="form-group"><label class="col-sm-2 control-label" for="cc">{$_L['Cc']}:</label>*}

                                {*<div class="col-sm-10"><input type="text" id="cc" name="cc" class="form-control" value=""></div>*}
                                {*</div>*}

                                {*<div class="form-group"><label class="col-sm-2 control-label" for="bcc">{$_L['Bcc']}:</label>*}

                                {*<div class="col-sm-10"><input type="text" id="bcc" name="bcc" class="form-control" value=""></div>*}
                                {*</div>*}

                                <div class="form-group"><label class="col-sm-2 control-label" for="subject">{$_L['Subject']}:</label>

                                    <div class="col-sm-10"><input type="text" id="subject" name="subject" class="form-control" value=""></div>
                                </div>

                            </div>

                            <div class="mail-text">

                                <textarea id="content"  class="form-control sysedit" name="content"></textarea>

                                <div class="clearfix"></div>
                            </div>
                            <div class="mail-body text-right">

                                <button type="submit" id="send_email"  class="btn btn-sm btn-primary"><i class="fa fa-paper-plane-o"></i> {$_L['Send']}</button>
                            </div>
                            <div class="clearfix"></div>



                        </div>

                    </form>

                </div>
            </div>



        </div>



    </div>
{/block}
