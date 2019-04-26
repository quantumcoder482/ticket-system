<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        {$d->title}
    </h3>
</div>
<div class="modal-body" style="font-size: 14px;">

    <div class="row">


        <div class="col-md-12">
            <a href="javascript:void(0)" class="btn btn-danger c_delete" id="d_{$d->id}">{$_L['Delete']}</a>
            <a href="javascript:void(0)" class="btn btn-warning c_edit" id="e_{$d->id}">{$_L['Edit']}</a>
            <hr>



            <div class="row">
                <div class="col-md-6">
                    <h4>{$_L['Description']}</h4>
                    <hr>
                    {if $d->description eq ''}
                        <p>{$_L['No Data Available']}</p>
                    {else}
                        {$d->description}
                    {/if}
                </div>
                <div class="col-md-6 text-right">

                    <p><strong>{$_L['Due Date']}:</strong> {date( $config['df'], strtotime($d->due_date))}</p>
                    {if $contact}
                        <p><strong>Related customer:</strong> <a href="{$_url}contacts/view/{$contact->id}">{$contact->account}</a></p>
                    {/if}

                    {if $ticket}
                        <p><strong>Ticket:</strong> <a href="{$_url}tickets/admin/view/{$ticket->id}">{$ticket->tid}</a></p>
                    {/if}

                </div>
            </div>



        </div>



    </div>

</div>
<div class="modal-footer">

    <input type="hidden" id="task_id" name="task_id" value="{$d->id}">
    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>
</div>