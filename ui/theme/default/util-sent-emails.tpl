{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Records']} {$paginator['found']}
                        . {$_L['Page']} {$paginator['page']} {$_L['of']} {$paginator['lastpage']}. </h5>
                    {*<a href="#" class="btn btn-primary btn-sm pull-right" id="clear_logs"><i class="fa fa-list"></i> {$_L['Clear Old Data']}</a>*}



                </div>
                <div class="ibox-content" id="application_ajaxrender">


                    <table class="table table-bordered sys_table" id="sys_logs">
                        <thead>
                        <tr>
                            <th width="5%">{$_L['ID']}</th>
                            <th>{$_L['Date']}</th>
                            <th>{$_L['Sent To']}</th>
                            <th width="60%">{$_L['Subject']}</th>
                            <th>{$_L['Manage']}</th>

                        </tr>
                        </thead>
                        <tbody>
                        {foreach $d as $ds}
                            <tr>
                                <td>{$ds['id']}</td>
                                <td>{date( $config['df'], strtotime($ds['date']))}</td>
                                <td>{$ds['email']}</td>
                                <td>{$ds['subject']}</td>
                                <td><a href="{$_url}util/view-email/{$ds['id']}/" class="btn btn-primary btn-outline btn-xs"><i class="fa fa-envelope-o"></i> {$_L['View']}</a></td>

                            </tr>
                        {/foreach}
                        </tbody>
                    </table>

                    {$paginator['contents']}

                </div>


            </div>
        </div>
    </div>
{/block}