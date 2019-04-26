<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        {$_L['Edit']}
    </h3>
</div>
<div class="modal-body">

    <section class="activity-post mb-xlg">
        <form method="get" action="/" id="ib_modal_edit_activity_form">
            <textarea name="message_text" id="edit_activity_message" class="edit_activity"  data-plugin-textarea-autosize="" placeholder="{$_L['Add Activity']}..." rows="1" style="overflow: hidden; word-wrap: break-word; resize: none; height: 200px;">{$d->msg}</textarea>
            <input type="hidden" id="edit_activity_type" name="edit_activity_type" value="{$d->icon}">
            <input type="hidden" id="edit_activity_id" name="edit_activity_id" value="{$d->id}">


        </form>
        <div class="compose-box-footer">
            <ul class="compose-toolbar">
                <li class="clickable {if $d->icon eq 'fa fa-envelope-o'}action-active{/if}"><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                <li class="clickable {if $d->icon eq 'fa fa-phone'}action-active{/if}"><a href="#"><i class="fa fa-phone"></i></a></li>
                <li class="clickable {if $d->icon eq 'fa fa-send-o'}action-active{/if}"><a href="#"><i class="fa fa-send-o"></i></a></li>
                <li class="clickable {if $d->icon eq 'fa fa-file-pdf-o'}action-active{/if}"><a href="#"><i class="fa fa-file-pdf-o"></i></a></li>
                <li class="clickable {if $d->icon eq 'fa fa-life-ring'}action-active{/if}"><a href="#"><i class="fa fa-life-ring"></i></a></li>
                <li class="clickable {if $d->icon eq 'fa fa-credit-card'}action-active{/if}"><a href="#"><i class="fa fa-credit-card"></i></a></li>
                <li class="clickable {if $d->icon eq 'fa fa-location-arrow'}action-active{/if}"><a href="#"><i class="fa fa-location-arrow"></i></a></li>
                <li class="clickable {if $d->icon eq 'fa fa-reply'}action-active{/if}"><a href="#"><i class="fa fa-reply"></i></a></li>
                <li class="clickable {if $d->icon eq 'fa fa-tasks'}action-active{/if}"><a href="#"><i class="fa fa-tasks"></i></a></li>
                <li class="clickable {if $d->icon eq 'fa fa-truck'}action-active{/if}"><a href="#"><i class="fa fa-truck"></i></a></li>
            </ul>

        </div>
    </section>

</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="modal_activity_edit_cancel btn btn-danger">{$_L['Cancel']}</button>
    <button class="btn btn-primary modal_activity_submit" type="submit" id="modal_activity_submit"><i class="fa fa-check"></i> {$_L['Save']}</button>
</div>