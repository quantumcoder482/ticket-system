{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" id="ib_panel">

                <div class="panel-body">

                    <input type="hidden" name="did" id="did" value="{$doc->id}">
                    <h3 style="color: #2f96f3;">{$doc->title}</h3>
                    <hr>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="is_global" name="is_global" {if $doc->is_global eq '1'}checked{/if}> {$_L['Available for all Customers']}
                        </label>
                    </div>

                    <hr>
                    <a href="{$_url}client/dl/{$doc->id}_{$doc->file_dl_token}" class="md-btn md-btn-primary waves-effect waves-light"><i class="fa fa-download"></i>  {$_L['Download']} </a>

                    {if has_access($user->roleid,'documents','delete')}
                        <a href="{$_url}delete/document/{$doc->id}/" class="md-btn md-btn-danger waves-effect waves-light"><i class="fa fa-trash"></i>  {$_L['Delete']} </a>
                    {/if}


                    <hr>

                    {if $ext eq 'jpg' || $ext eq 'png' || $ext eq 'gif'}
                        <img src="{$app_url}storage/docs/{$doc->file_path}" class="img-responsive" alt="{$doc->title}">
                    {/if}





                </div>
            </div>
        </div>



    </div>
{/block}
