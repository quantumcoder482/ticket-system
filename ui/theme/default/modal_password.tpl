<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="txt_modal_header">
        {if $edit}
            {*{$_L['Edit']}*}
            {$password['name']}
        {else}
            {$_L['Add New']}
        {/if}
    </h3>
</div>
<div class="modal-body">


    <form id="spForm" method="post">



       <div class="row">
           <div class="col-md-6">
               <div class="form-group">
                   <label for="inputName">{$_L['Name']}</label>
                   <input type="text" class="form-control" id="inputName" name="name" value="{$password['name']}">
               </div>
           </div>
           <div class="col-md-6">
               <div class='form-group'>
                   <label for="inputClientId">{$_L['Customer']}</label>

                   <select id="inputClientId" name="client_id" class="form-control s2_contacts">
                       <option value="0">{$_L['None']}</option>
                       {foreach $c as $cs}
                           <option value="{$cs['id']}"
                                   {if $password['client_id'] eq ($cs['id'])}selected="selected" {/if}>{$cs['account']} {if $cs['email'] neq ''}- {$cs['email']}{/if}</option>
                       {/foreach}

                   </select>

               </div>
           </div>
       </div>

        <div class="form-group">
            <label for="inputUrl">{$_L['URL']}</label>
            <input type="text" class="form-control" id="inputUrl" name="url" value="{$password['url']}">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputUsername">{$_L['Username']}</label>
                    <input type="text" class="form-control" id="inputUsername" name="username" value="{$password['username']}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPassword">{$_L['Password']}</label>
                    <input type="text" class="form-control" id="inputPassword" name="password" value="{$password['password']}">
                </div>
            </div>
        </div>





        <div class="form-group">
            <label for="inputNotes">{$_L['Notes']}</label>
            <textarea class="form-control" id="inputNotes" name="description" rows="5">{$password['notes']}</textarea>
        </div>


        <input type="hidden" id="password_id" name="password_id" value="{$password['id']}">
    </form>

</div>
<div class="modal-footer">


    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Cancel']}</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i
                class="fa fa-check"></i> {$_L['Save']}</button>
</div>