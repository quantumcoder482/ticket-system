{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="exampleInputEmail1">{$_L['Application URL']}:</label>
                <input type="text" class="form-control" onClick="this.setSelectionRange(0, this.value.length)" value="{$api_url}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Add API Access']}</h5>

                </div>
                <div class="ibox-content" id="ibox_form">


                    <form class="form-horizontal" method="post" id="tform" role="form" action="{$_url}settings/api_post/">



                        <div class="form-group">
                            <label for="label" class="col-sm-2 control-label">{$_L['Label']}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="label" name="label">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>



    </div>

    <div class="row">


        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['API Access']}</h5>

                </div>
                <div class="ibox-content">

                    <table class="table table-bordered sys_table">
                        <thead>
                        <tr>
                            <th width="20%">{$_L['Label']}</th>
                            <th width="60%">{$_L['API Key']}</th>
                            <th>{$_L['Manage']}</th>

                        </tr>
                        </thead>
                        <tbody>

                        {foreach $d as $ds}
                            <tr>
                                <td> {$ds['label']} </td>
                                <td><input class="form-control input-sm" type="text" onClick="this.setSelectionRange(0, this.value.length)" value="{$ds['apikey']}"></td>
                                <td>
                                    <a href="{$_url}settings/api_regen/{$ds['id']}/" class="btn btn-info btn-xs"><i class="fa fa-refresh"></i> {$_L['Re Generate Key']}</a>
                                    <a href="{$_url}settings/api_delete/{$ds['id']}/" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                                </td>
                            </tr>

                            {foreachelse}
                            <tr>

                                <td colspan="3">{$_L['No results found']} </td>

                            </tr>
                        {/foreach}

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

    <input type="hidden" id="_lan_no_results_found" value="{$_L['No results found']}">
{/block}
