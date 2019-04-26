{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12 m-b-sm">

            <div class="pull-right">
                <a href="{$_url}contacts/list/" class="btn btn-xs btn-danger"><i class="fa fa-arrow-left"></i> {$_L['Cancel']}</a>
                <a href="{$app_url}storage/system/contacts.csv" class="btn btn-xs btn-primary"><i class="fa fa-download"></i> {$_L['Download Sample File']}</a>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default" id="uploading_inside">
                <div class="panel-body">
                    <form action="{$_url}contacts/csv_upload/" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  {$_L['Drop CSV File Here']}</h3>
                            <br />
                            <span class="note">{$_L['Or Click to Upload']}</span>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>


    <input type="hidden" id="_msg_importing" value="{$_L['Importing']} ...">
    <input type="hidden" id="_msg_are_you_sure" value="{$_L['are_you_sure']}">

{/block}