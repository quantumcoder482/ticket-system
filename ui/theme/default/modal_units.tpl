<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        {if $f_type eq 'edit'}
            {$_L['Edit']}
        {else}
            {$_L['Create New']}
        {/if}
    </h3>
</div>
<div class="modal-body">

    <form class="form-horizontal" id="ib_modal_form">

        <div class="form-group"><label class="col-lg-4 control-label" for="name">{$_L['Name']}<small class="red">*</small></label>

            <div class="col-lg-8"><input type="text" id="name" name="name" class="form-control" value="{$val['name']}">

            </div>


        </div>


        <div class="form-group"><label class="col-lg-4 control-label" for="type">{$_L['Type']}</label>

            <div class="col-lg-8">

                <select class="form-control" id="type" name="type">
                    <option value="Piece" {if $val['name'] eq 'Piece'}selected{/if}>Piece</option>
                    <option value="Weight" {if $val['name'] eq 'Weight'}selected{/if}>Weight</option>
                    <option value="Time" {if $val['name'] eq 'Time'}selected{/if}>Time</option>
                    <option value="Dimension" {if $val['name'] eq 'Dimension'}selected{/if}>Dimension</option>

                    <option value="Surface" {if $val['name'] eq 'Surface'}selected{/if}>Surface</option>

                    <option value="Volume" {if $val['name'] eq 'Volume'}selected{/if}>Volume</option>


                </select>

            </div>


        </div>









        {if $f_type eq 'edit'}
            <input type="hidden" name="uid" id="uid" value="{$val['uid']}">
        {else}
            <input type="hidden" name="uid" id="uid" value="0">
        {/if}


        <input type="hidden" name="f_type" id="f_type" value="{$f_type}">

    </form>

</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Cancel']}</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i class="fa fa-check"></i> {$_L['Save']}</button>
</div>