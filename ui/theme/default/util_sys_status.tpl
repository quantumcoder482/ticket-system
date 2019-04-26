{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">

        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Application Environment']}</h5>

                </div>
                <div class="ibox-content">

                    <table class="table table-bordered sys_table">
                        <tbody>

                        <tr>
                            <td width="300px;">Time</td>
                            <td><span id="clock"></span> </td>
                        </tr>

                        <tr>
                            <td>BASE URL</td>
                            <td>{$app_url}</td>
                        </tr>

                        <tr>
                            <td>Application Stage</td>
                            <td>{$app_stage}</td>
                        </tr>

                        <tr>
                            <td>Default Language</td>
                            <td>{$config['language']}</td>
                        </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Server Environment']}</h5>
                    <div class="ibox-tools">
                        <a href="{$_url}util/sys_status_dl/" class="btn btn-primary btn-xs"><i class="fa fa-download"></i> {$_L['Download']} </a>
                    </div>
                </div>
                <div class="ibox-content">

                    {$pinfo}

                </div>
            </div>
        </div>

    </div>
{/block}
