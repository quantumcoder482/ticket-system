<section class="activity-post mb-xlg">
    <form method="get" action="/">
        <textarea name="message-text" id="msg" data-plugin-textarea-autosize="" placeholder="{$_L['Add Activity']}..." rows="1" style="overflow: hidden; word-wrap: break-word; resize: none; height: 200px;"></textarea>
        <input type="hidden" id="activity-type" value="">

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

                <a class="btn btn-primary btn-xs" id="acf-post"><i class="fa fa-arrow-right"></i> {$_L['Post']}</a>
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
                <span class="sdate">{date( $config['df'], $acs['stime'])}</span>
                <br>
                <small class="text-navy"><span class="mmnt">{$acs['stime']}</span></small>
            </div>
            <div class="col-xs-9 content no-top-border">
                <p class="m-b-xs"><strong>{$acs['oname']}</strong></p>

                <p>{$acs['msg']}</p>
                <p>
                    <a href="#" class="btn btn-info btn-xs activity_edit" id="activity_{$acs['id']}"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>
                    <a href="{$_url}contacts/activity-delete/{$acs['cid']}/{$acs['id']}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                </p>

            </div>
        </div>
    </div>
{/foreach}