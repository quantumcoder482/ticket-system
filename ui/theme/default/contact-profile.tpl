{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12 m-t-md">
            <div class="alert alert-danger" id="emsg">
                <span id="emsgbody"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">

            <section class="panel">
                <div class="panel-body">
                    <div class="thumb-info mb-md">
                        {if $d['img'] eq 'gravatar'}
                            <img src="http://www.gravatar.com/avatar/{($d['email'])|md5}?s=400" class="img-thumbnail img-responsive" alt="{$d['fname']} {$d['lname']}">
                        {elseif $d['img'] eq ''}
                            <img src="{$app_url}storage/system/profile-icon.png" class="img-thumbnail img-responsive" alt="{$d['fname']} {$d['lname']}">
                        {else}
                            <img src="{$d['img']}" class="img-thumbnail img-responsive" alt="{$d['fname']} {$d['lname']}">
                        {/if}
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{$d['fname']} {$d['lname']}</span>

                        </div>
                    </div>





                    <h5 class="text-muted">{$d['email']}</h5>
                    {if $d['phone'] neq ''}
                        <h5 class="text-muted">{$d['phone']}</h5>
                    {/if}







                </div>
            </section>






        </div>
        <div class="col-md-4">
            <section class="panel">
                <div class="panel-body">








                    <table class="table table-hover margin bottom">
                        <thead>
                        <tr>

                            <th colspan="3">Contact Summary</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td> Total Income
                            </td>
                            <td class="text-center"><span class="label label-primary">$483.00</span></td>
                            <td class="text-center"><button class="btn btn-outline btn-primary btn-xs" type="button"><i class="fa fa-plus"></i></button></td>

                        </tr>
                        <tr>

                            <td> Total Expense
                            </td>
                            <td class="text-center"><span class="label label-danger">$483.00</span></td>
                            <td class="text-center"><button class="btn btn-outline btn-danger btn-xs" type="button"><i class="fa fa-minus"></i></button></td>

                        </tr>

                        </tbody>
                    </table>

                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Add New <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Invoice</a></li>
                            <li><a href="#">Order</a></li>
                            <li><a href="#">Income Entry</a></li>
                            <li><a href="#">Expense Entry</a></li>

                        </ul>
                    </div>

                    <a class="btn btn-danger cdelete" href="#" id="{$d['id']}"><i class="fa fa-paste"></i> Delete This Contact</a>


                </div>
            </section>

        </div>
        <div class="col-md-5">
            <section class="panel">
                <div class="panel-body">






                    <h5 class="text-muted">Contact Notes</h5>

                    <textarea class="form-control" id="notes" rows="6">{$d['notes']}</textarea>
                    <button type="button" id="note_update" class="btn btn-primary btn-block mt-sm">Save</button>




                </div>
            </section>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="active">
                        <a href="#overview" data-toggle="tab"><i class="fa fa-send-o"></i> Activity</a>
                    </li>
                    {*<li class="">*}
                    {*<a href="#todo" data-toggle="tab"><i class="fa fa-tasks"></i> Tasks</a>*}
                    {*</li>*}
                    <li class="">
                        <a href="#edit" data-toggle="tab">Edit</a>
                    </li>

                    {*<li class="">*}
                    {*<a href="#edit" data-toggle="tab">Orders</a>*}
                    {*</li>*}

                    <li class="">
                        <a href="#tab_invoices" data-toggle="tab">Invoices</a>
                    </li>

                    <li class="">
                        <a href="#edit" data-toggle="tab">Transactions</a>
                    </li>

                    {*<li class="">*}
                    {*<a href="#edit" data-toggle="tab">Supports</a>*}
                    {*</li>*}

                    {*<li class="">*}
                    {*<a href="#edit" data-toggle="tab">Emails</a>*}
                    {*</li>*}

                    <li class="">
                        <a href="#more" data-toggle="tab">More</a>
                    </li>



                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">

                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>{$d['account']}</h5>
                            </div>

                            <div class="ibox-content inspinia-timeline">
                                <section class="activity-post mb-xlg">
                                    <form method="get" action="/">
                                        <textarea name="message-text" id="msg" data-plugin-textarea-autosize="" placeholder="What's on your mind?" rows="1" style="overflow: hidden; word-wrap: break-word; resize: none; height: 37px;"></textarea>
                                        <input type="hidden" id="activity-type" value="">
                                        <input type="hidden" id="cid" value="{$d['id']}">
                                    </form>
                                    <div class="compose-box-footer">
                                        <ul class="compose-toolbar">
                                            <li class="clickable"><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                                            <li class="clickable"><a href="#"><i class="fa fa-phone"></i></a></li>
                                            <li class="clickable"><a href="#"><i class="fa fa-send-o"></i></a></li>
                                            <li class="clickable"><a href="#"><i class="fa fa-file-pdf-o"></i></a></li>
                                            <li class="clickable"><a href="#"><i class="fa fa-life-ring"></i></a></li>
                                            <li class="clickable"><a href="#"><i class="fa fa-credit-card"></i></a></li>
                                            <li class="clickable"><a href="#"><i class="fa fa-location-arrow"></i></a></li>
                                            <li class="clickable"><a href="#"><i class="fa fa-reply"></i></a></li>
                                            <li class="clickable"><a href="#"><i class="fa fa-tasks"></i></a></li>
                                            <li class="clickable"><a href="#"><i class="fa fa-truck"></i></a></li>
                                        </ul>
                                        <ul class="compose-btn">
                                            <li>

                                                <a class="btn btn-primary btn-xs" id="acf-post">Post</a>
                                            </li>
                                        </ul>
                                    </div>
                                </section>
                                <div class="mt-lg"> </div>
                                {foreach $ac as $acs}
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="{$acs['icon']}"></i>
                                                <span class="sdate">{$acs['stime']}</span>
                                                <br>
                                                <small class="text-navy"><span class="mmnt">{$acs['stime']}</span></small>
                                            </div>
                                            <div class="col-xs-9 content no-top-border">
                                                <p class="m-b-xs"><strong>{$acs['oname']}</strong></p>

                                                <p>{$acs['msg']}</p>
                                                <p><a href="{$_url}contacts/activity-delete/{$acs['cid']}/{$acs['id']}" class="btn btn-danger btn-xs">Delete</a> </p>

                                            </div>
                                        </div>
                                    </div>
                                {/foreach}









                            </div>
                        </div>
                    </div>
                    <div id="edit" class="tab-pane">

                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Edit Contact</h5>

                            </div>
                            <div class="ibox-content">


                                <form class="form-horizontal" id="rform">

                                    <div class="form-group"><label class="col-lg-2 control-label" for="fname">First Name</label>

                                        <div class="col-lg-10"><input type="text" id="fname" name="fname" class="form-control" value="{$d['fname']}" autocomplete="off">

                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label" for="lname">Last Name</label>

                                        <div class="col-lg-10"><input type="text" id="lname" name="lname" class="form-control" value="{$d['lname']}" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label" for="company">Company</label>

                                        <div class="col-lg-10"><input type="text" id="company" name="company" class="form-control" value="{$d['company']}" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label" for="email">Email</label>

                                        <div class="col-lg-10"><input type="text" id="email" name="email" class="form-control" value="{$d['email']}" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label" for="phone">Phone</label>

                                        <div class="col-lg-10"><input type="text" id="phone" name="phone" class="form-control" value="{$d['phone']}" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label" for="address">Address</label>

                                        <div class="col-lg-10"><input type="text" id="address" name="address" class="form-control" value="{$d['address']}" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label" for="city">City</label>

                                        <div class="col-lg-10"><input type="text" id="city" name="city" class="form-control" value="{$d['city']}" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label" for="state">State/Region</label>

                                        <div class="col-lg-10"><input type="text" id="state" name="state" class="form-control" value="{$d['state']}" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label" for="zip">ZIP/Postal Code </label>

                                        <div class="col-lg-10"><input type="text" id="zip" name="zip" class="form-control" value="{$d['zip']}" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label" for="country">Country</label>

                                        <div class="col-lg-10">

                                            <select name="country" id="country">

                                                {$countries}
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">

                                            <button class="btn btn-sm btn-primary" type="submit" id="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div id="tab_invoices" class="tab-pane">

                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>More Options</h5>

                            </div>
                            <div class="ibox-content">

                                jjj


                            </div>
                        </div>

                    </div>

                    <div id="more" class="tab-pane">

                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>More Options</h5>

                            </div>
                            <div class="ibox-content">
                                <div id="croppic"></div>

                                <button type="button" id="cropContainerHeaderButton" class="btn btn-info">Upload Picture</button>
                                <button type="button" id="opt_gravatar" class="btn btn-info">Use Gravatar</button>
                                <button type="button" id="no_image" class="btn btn-default">No Image</button>
                                <div class="mt-lg"> </div>
                                <form class="form-horizontal" id="more">

                                    <div class="form-group"><label class="col-lg-2 control-label" for="picture">Picture</label>

                                        <div class="col-lg-10"><input type="text" id="picture" readonly name="picture" class="form-control"  value="{$d['img']}" autocomplete="off">

                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label" for="facebook">Facebook Profile</label>

                                        <div class="col-lg-10"><input type="text" id="facebook" name="facebook" class="form-control" value="{$d['facebook']}" autocomplete="off">

                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label" for="google">Google Plus Profile</label>

                                        <div class="col-lg-10"><input type="text" id="google" name="google" class="form-control" value="{$d['google']}" autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label" for="linkedin">Linkedin Profile</label>

                                        <div class="col-lg-10"><input type="text" id="linkedin" name="linkedin" value="{$d['linkedin']}" class="form-control" autocomplete="off">

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">

                                            <button class="btn btn-sm btn-primary" type="submit" id="more_submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
{/block}