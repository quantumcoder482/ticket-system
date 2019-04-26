{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="mail-box">


                        <div class="mail-body">

                            <form class="form-horizontal" method="get">
                                <div class="form-group"><label class="col-sm-2 control-label" for="toemail">{$_L['To']}:</label>

                                    <div class="col-sm-10">
                                    <textarea class="form-control" rows="5" id="emails" name="emails">{foreach $contacts as $contact}{$contact['account']} <{$contact['email']}>
{/foreach}</textarea>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">{$_L['Subject']}:</label>

                                    <div class="col-sm-10"><input type="text" id="subject" name="subject" class="form-control" value=""></div>
                                </div>
                            </form>

                        </div>

                        <div class="mail-text">

                            <textarea id="content"  class="form-control sysedit" name="content"></textarea>

                            <div class="clearfix"></div>
                        </div>
                        <div class="mail-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <a href="#" class="choose_from_template" id="choose_from_template"><i class="fa fa-file-text"></i> {$_L['Choose from Template']}</a>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="submit" id="send_email"  class="btn btn-sm btn-primary"><i class="fa fa-paper-plane-o"></i> {$_L['Send']}</button>
                                </div>
                            </div>
                            {*<button type="submit" id="send_email"  class="btn btn-sm btn-primary"><i class="fa fa-paper-plane-o"></i> {$_L['Send']}</button>*}
                        </div>
                        <div class="clearfix"></div>



                    </div>

                </div>

            </div>

        </div>

    </div>
{/block}