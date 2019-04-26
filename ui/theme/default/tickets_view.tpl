{extends file="$layouts_client"}

{block name="content"}

    <!-- row -->
    <div class="row">
        <div class="col-md-12" id="create_ticket">

            <h3>{$d->subject}</h3>




            <!-- The time line -->
            <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="mmnt">
                    {strtotime($d->created_at)}
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    {*<i class="fa fa-envelope bg-blue"></i>*}



                    {if $user['img'] eq 'gravatar'}
                        <img src="http://www.gravatar.com/avatar/{($user['email'])|md5}?s=30" class="img-time-line" alt="{$user['fullname']}">
                    {elseif $user['img'] eq ''}
                        <img class="img-time-line" src="{$app_url}ui/lib/imgs/default-user-avatar.png" alt="">
                    {else}
                        <img src="{$user['img']}" class="img-time-line" alt="{$user['account']}">
                    {/if}

                    <div class="timeline-item">
                        {*<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>*}

                        <h3 class="timeline-header"><a href="javascript:void(0)">{$d->account}</a></h3>

                        <div class="timeline-body">
                            {$d->message}
                        </div>

                        {if ($d->attachments) neq ''}
                            <div class="timeline-footer">
                                {Tickets::gen_link_attachments($d->attachments)}
                            </div>
                        {/if}


                    </div>
                </li>

                {foreach $replies as $reply}
                    <li class="time-label">
                  <span class="mmnt">
                    {strtotime($reply['created_at'])}
                  </span>
                    </li>
                    <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            {*<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>*}

                            <h3 class="timeline-header"><a href="javascript:void(0)">{$reply['replied_by']}</a></h3>

                            <div class="timeline-body">
                                {$reply['message']}
                            </div>

                            {if ($reply['attachments']) neq ''}
                                <div class="timeline-footer">
                                    {Tickets::gen_link_attachments($reply['attachments'])}
                                </div>
                            {/if}


                        </div>
                    </li>
                {/foreach}

                <!-- END timeline item -->
                <!-- timeline item -->
                <li class="time-label">
                  <span>
                   {$_L['Add Reply']}
                  </span>
                </li>
                <li>
                    {if $user['img'] eq 'gravatar'}
                        <img src="http://www.gravatar.com/avatar/{($user['email'])|md5}?s=30" class="img-time-line" alt="{$user['fullname']}">
                    {elseif $user['img'] eq ''}
                        <img class="img-time-line" src="{$app_url}ui/lib/imgs/default-user-avatar.png" alt="">
                    {else}
                        <img src="{$user['img']}" class="img-time-line" alt="{$user['account']}">
                    {/if}

                    <div class="timeline-item">



                        <div class="timeline-body">
                            <form id="create_ticket" class="form-horizontal push-10-t push-10" method="post">






                                <div class="form-group">
                                    <div class="col-xs-12">

                                        <textarea id="content"  class="form-control sysedit" name="content"></textarea>
                                        <div class="help-block"><a data-toggle="modal" href="#modal_add_item"><i class="fa fa-paperclip"></i> {$_L['Attach File']}</a> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">

                                        <input type="hidden" name="attachments" id="attachments" value="">
                                        <input type="hidden" name="f_tid" id="f_tid" value="{$d->id}">

                                        <button class="btn btn-primary" id="ib_form_submit" type="submit"><i class="fa fa-send push-5-r"></i> {$_L['Submit']}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {*<div class="timeline-footer">*}
                        {*<a class="btn btn-primary btn-xs">Read more</a>*}
                        {*<a class="btn btn-danger btn-xs">Delete</a>*}
                        {*</div>*}
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->

                <!-- END timeline item -->
                <!-- timeline time label -->

                <!-- /.timeline-label -->
                <!-- timeline item -->

                <!-- END timeline item -->
                <!-- timeline item -->

                <!-- END timeline item -->
                <li>
                    <i class="fa fa-life-ring bg-gray"></i>
                </li>
            </ul>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


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