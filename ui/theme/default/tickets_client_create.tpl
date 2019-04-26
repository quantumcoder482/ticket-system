{extends file="$layouts_client"}

{block name="content"}

    <div class="paper">
        <section class="panel" id="ib_box">
            <div class="panel-body" style="font-size: 14px;">
                <div>
                    {if isset($notify)}
                        {$notify}
                    {/if}



                    <div class="login-brand text-center">
                        <img class="logo" src="{$app_url}storage/system/logo.png" alt="Logo">

                    </div>

                    <hr>

                    <form method="post" action="{$_url}tickets/client/create_post/" id="iform" name="iform">


                        {*<div class="form-group">*}
                        {*<label for=""></label>*}
                        {*<input type="text" class="form-control" id="" name="">*}
                        {*</div>*}

                        <div class="form-group">
                            <label for="account">Full Name</label>
                            <input type="text" class="form-control" id="account" name="account">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject">
                        </div>

                        <div class="form-group">
                            <label for="message">Description</label>
                            <textarea id="message"  class="form-control" name="message"></textarea>
                            <div class="help-block"><a data-toggle="modal" href="#modal_add_item"><i class="fa fa-paperclip"></i> Attach File</a> </div>
                        </div>

                        {if $_c['recaptcha'] eq '1'}
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="{$_c['recaptcha_sitekey']}"></div>
                            </div>
                        {/if}

                        <input type="hidden" name="attachments" id="attachments" value="">
                        <button type="submit" id="ib_form_submit" class="btn btn-primary">Create Ticket</button>
                    </form>


                </div>




            </div>
        </section>

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

