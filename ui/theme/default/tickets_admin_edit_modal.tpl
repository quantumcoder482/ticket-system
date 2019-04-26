<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        {$_L['Edit']}
    </h3>
</div>
<div class="modal-body" style="padding: 0; min-height: 300px;">

    <textarea id="edit_content" class="form-control" name="content">{$ticket->message}</textarea>

</div>
<div class="modal-footer">

    <input type="hidden" name="edit_type" value="{$type}" id="edit_type">
    <input type="hidden" name="edit_tid" value="{$ticket->id}" id="edit_tid">
    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>
    <button class="btn btn-primary update_ticket_message" type="submit" id="update_ticket_message"><i class="fa fa-check"></i> {$_L['Save']}</button>

</div>