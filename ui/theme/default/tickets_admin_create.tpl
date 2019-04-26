{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">

        <div class="col-md-12">
            <div class="ibox float-e-margins" id="ib_box">
                <div class="ibox-title">


                    <h5>{$_L['Open Ticket']}</h5>


                </div>
                <div class="ibox-content">


                    <form id="create_ticket" class="form-horizontal push-10-t push-10" method="post">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="cid">{$_L['Customer']}</label>

                                <select id="cid" name="cid" class="form-control">
                                    <option value="">{$_L['Customer']}...</option>
                                    {foreach $customers as $cs}
                                        <option value="{$cs['id']}"
                                                {if $p_cid eq ($cs['id'])}selected="selected" {/if}>{$cs['account']} {if $cs['email'] neq ''}- {$cs['email']}{/if}</option>
                                    {/foreach}

                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="subject" name="subject" autofocus>
                                    <label for="subject">{$_L['Subject']}</label>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="form-material floating">
                                    <select class="form-control" id="department" name="department" size="1">

                                        {foreach $deps as $dep}
                                            <option value="{$dep['id']}">{$dep['dname']}</option>
                                            {foreachelse}
                                            <option value="0">None</option>
                                        {/foreach}

                                    </select>
                                    <label for="department">{$_L['Department']}</label>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-material floating">
                                    <select class="form-control" id="urgency" name="urgency" size="1">
                                        <option value="High">High</option>
                                        <option value="Medium" selected>Medium</option>
                                        <option value="Low">Low</option>

                                    </select>
                                    <label for="urgency">Priority</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="content">{$_L['Message']}</label>
                                <textarea id="content"  class="form-control sysedit" name="content"></textarea>
                                <div class="help-block"><a data-toggle="modal" href="#modal_add_item"><i class="fa fa-paperclip"></i> Attach File</a> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">

                                <input type="hidden" name="attachments" id="attachments" value="">

                                <button class="btn btn-primary" id="ib_form_submit" type="submit"><i class="fa fa-send push-5-r"></i> Submit</button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>

    </div>

    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="600" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Add File</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">
                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  Drop File Here</h3>
                            <br />
                            <span class="note">Or Click to Upload</span>
                        </div>

                    </form>


                </div>




            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>

        </div>
    </div>

{/block}



