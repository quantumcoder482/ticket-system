{extends file="$layouts_admin"}

{block name="content"}

{/block}


{include file="sections/header_paper.tpl"}

<div class="paper">
    <section class="panel">
        <div class="panel-body">
            {if isset($notify)}
                {$notify}
            {/if}

            <img class="logo" style="max-height: 40px; width: auto;" src="{$app_url}storage/system/logo.png" alt="Logo">

            <hr>

            <div class="row">

                <div class="col-md-12">

                    <form method="post" action="{$_url}client/register_post/" id="iform">
                        <div class="panel panel-default alt md-card">
                            <div class="panel-heading"><h2>Registration Form</h2></div>
                            <div class="panel-body">
                                <form action="" class="">
                                    <div class="form-group">
                                        <label for="fullname" class="control-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="control-label">Email Address</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="someone@example.com">
                                    </div>


                                    {*<div class="form-group">*}
                                    {*<label for="phone" class="control-label">Phone</label>*}
                                    {*<input type="text" class="form-control" id="phone" name="phone">*}
                                    {*</div>*}

                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="******">
                                    </div>
                                    <div class="form-group">
                                        <label for="password2" class="control-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="******">
                                    </div>



                                    {if $config['recaptcha'] eq '1'}
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="{$config['recaptcha_sitekey']}"></div>
                                        </div>
                                    {/if}


                                </form>
                            </div>
                            <div class="panel-footer">
                                <div class="clearfix">
                                    <a href="{$_url}client/login/" class="pull-left mt-xs">Already Registered? Login</a>
                                    <button type="submit" id="btn_form_action" class="btn btn-primary pull-right">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>

            </div>



        </div>
    </section>

</div>


{include file="sections/footer_paper.tpl"}