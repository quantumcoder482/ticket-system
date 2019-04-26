{extends file="$layouts_client"}

{block name="content"}

    <div class="row">
        <div class="col-md-4">
            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    {if $user['img'] eq ''}
                        <a href="javascript:;" onclick="upload_profile_picture();"><img src="{$app_url}ui/lib/imgs/default-user-avatar.png" class="img-circle" style="max-width: 128px;" alt="{$user->account}"></a>
                    {else}
                        <a href="javascript:;" onclick="upload_profile_picture();">
                            <img src="{$app_url}{$user->img}" class="img-circle" style="max-width: 128px;" alt="{$user->account}">
                        </a>
                    {/if}

                    <form enctype="multipart/form-data" method="post" action="{$_url}client/profile-picture-upload" id="form_profile_picture">
                        <input type="file" id="file_profile_picture" name="file" style="display: none;" />
                    </form>

                    <h3 style="margin-top: 20px; margin-bottom: 20px;">{$user->account}</h3>

                    <address>
                        {if $user->company neq ''}
                            {$user->company}
                            <br>
                            {$user->account}
                            <br>
                        {else}
                            {$user->account}
                            <br>
                        {/if}
                        {$user->address} <br>
                        {$user->city} <br>
                        {$user->state} - {$user->zip} <br>
                        {$user->country}
                        <br>
                        <strong>{$_L['Phone']}:</strong> {$user->phone}
                        <br>
                        <strong>{$_L['Email']}:</strong> {$user->email}

                        {if $config['show_business_number'] eq '1'}

                          <br>

                            <strong>{$config['label_business_number']}:</strong> {$user->business_number}

                        {/if}


                        {foreach $cf as $cfs}
                            <br>
                            <strong>{$cfs['fieldname']}: </strong> {get_custom_field_value($cfs['id'],$user->id)}
                        {/foreach}

                    </address>


                    <a class="btn btn-primary" href="javascript:;" onclick="upload_profile_picture();">{$_L['Upload Picture']}</a>

                    {if $user['img'] neq ''}
                        <a class="btn btn-primary" href="{$_url}client/remove-profile-picture">{$_L['No Image']}</a>
                    {/if}




                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">


                    <h5>{$_L['Edit Profile']}</h5>


                </div>
                <div class="ibox-content">


                    <form class="form-horizontal" id="iform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="account">{$_L['Account Name']}</label>

                            <div class="col-lg-10"><input type="text" id="account" name="account" class="form-control" value="{$d['account']}">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="company">{$_L['Company Name']}</label>

                            <div class="col-lg-10"><input type="text" id="company" name="company" class="form-control" value="{$d['company']}">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="edit_email">{$_L['Email']}</label>

                            <div class="col-lg-10"><input type="text" id="edit_email" name="edit_email" class="form-control" value="{$d['email']}">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="phone">{$_L['Phone']}</label>

                            <div class="col-lg-10"><input type="text" id="phone" name="phone" class="form-control" value="{$d['phone']}">

                            </div>
                        </div>

                        {if $config['show_business_number'] eq '1'}

                            <div class="form-group">

                                <label class="col-lg-2 control-label" for="business_number">{$config['label_business_number']}</label>

                                <div class="col-lg-10">

                                    <input type="text" id="business_number" name="business_number" class="form-control" value="{$d['business_number']}">

                                </div>
                            </div>

                        {/if}

                        <div class="form-group"><label class="col-lg-2 control-label" for="address">{$_L['Address']}</label>

                            <div class="col-lg-10"><input type="text" id="address" name="address" class="form-control" value="{$d['address']}">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="city">{$_L['City']}</label>

                            <div class="col-lg-10"><input type="text" id="city" name="city" class="form-control" value="{$d['city']}">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="state">{$_L['State Region']}</label>

                            <div class="col-lg-10"><input type="text" id="state" name="state" class="form-control" value="{$d['state']}">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="zip">{$_L['ZIP Postal Code']} </label>

                            <div class="col-lg-10"><input type="text" id="zip" name="zip" class="form-control" value="{$d['zip']}">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="country">{$_L['Country']}</label>

                            <div class="col-lg-10">

                                <select name="country" id="country" class="form-control">
                                    <option value="">{$_L['Select Country']}</option>
                                    {$countries}
                                </select>

                            </div>
                        </div>



                        <div class="form-group"><label class="col-lg-2 control-label" for="password">{$_L['Password']} </label>

                            <div class="col-lg-10">
                                <input type="password" id="password" name="password" class="form-control">

                                <span class="help-block">{$_L['password_change_help']}</span>

                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">

                                <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>

{/block}

{block name="script"}
    <script>

        var $file_profile_picture = $("#file_profile_picture");

        function upload_profile_picture()
        {
            $file_profile_picture.click();
        }

        $(function () {
            $file_profile_picture.change(function() {
                $('#form_profile_picture').submit();
            });
        });
    </script>
{/block}