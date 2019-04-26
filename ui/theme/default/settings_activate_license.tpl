{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Activate License</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="accadd" method="post" action="{$_url}settings/activate_license_post/">

                        <div class="form-group">
                            <label for="fullname">Your Full Name</label>
                            <input type="text" required class="form-control" id="fullname" name="fullname" value="{$user['fullname']}">

                        </div>

                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" required class="form-control" id="email" name="email" value="{$user['username']}">

                        </div>
                        <div class="form-group">
                            <label for="purchase_code">Purchase Code</label>
                            <input type="text" required class="form-control" id="purchase_code" name="purchase_code">
                            <span class="help-block"><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">How To Get Your Envato Purchase Code?</a> </span>
                        </div>




                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>

                </div>
            </div>



        </div>



    </div>
{/block}
