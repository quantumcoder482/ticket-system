

<form class="form-horizontal" id="rform">


    <div class="form-group"><label class="col-lg-2 control-label" for="c_file">{$_L['Files']}</label>

        <div class="col-lg-10">

            <select name="c_file" id="c_file" class="form-control">
                {foreach $files as $file}
                    <option value="{$file['id']}">{$file['title']}</option>
                {/foreach}

            </select>

        </div>
    </div>


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">

            <button class="btn btn-primary" type="submit" id="assign_file"><i class="fa fa-check"></i> {$_L['Submit']}</button>
        </div>
    </div>

</form>
<hr>
<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>

        <th class="text-right" data-sort-ignore="true" width="20px;">{$_L['Type']}</th>

        <th>{$_L['Title']}</th>

        <th class="text-right" data-sort-ignore="true" width="100px;">{$_L['Manage']}</th>

    </tr>
    </thead>
    <tbody>

    {foreach $d as $ds}

        <tr>

            <td>
                {if $ds['file_mime_type'] eq 'jpg' || $ds['file_mime_type'] eq 'png' || $ds['file_mime_type'] eq 'gif'}
                    <i class="fa fa-file-image-o"></i>
                {elseif $ds['file_mime_type'] eq 'pdf'}
                    <i class="fa fa-file-pdf-o"></i>
                {elseif $ds['file_mime_type'] eq 'zip'}
                    <i class="fa fa-file-archive-o"></i>
                {else}
                    <i class="fa fa-file"></i>
                {/if}
            </td>


            <td>

                <a href="{$_url}documents/view/{$ds['id']}/">{$ds['title']}</a>

            </td>

            <td class="text-right">

                <a href="{$_url}contacts/remove_file/{$cid}/{$ds['id']}/" class="btn btn-success btn-xs"><i class="fa fa-times"></i> </a>

            </td>


        </tr>

    {/foreach}

    </tbody>
</table>
