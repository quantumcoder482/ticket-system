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

                            <th>{$_L['Date']}</th>
                            <th>{$_L['Customer']}</th>
                            <th>{$_L['Invoice']}</th>
                            <th>{$_L['IP']}</th>
                            <th>{$_L['Country']}</th>
                            <th>{$_L['City']}</th>
                            <th>{$_L['Browser']}</th>

                        </tr>
                        </thead>
                        <tbody>
                        {foreach $d as $ds}
                            <tr>

                                <td>{date( $config['df']|cat:' H:i:s', strtotime($ds['viewed_at']))}</td>
                                <td><a href="{$_url}contacts/view/{$ds['cid']}">{$ds['customer']}</a> </td>
                                <td><a href="{$_url}invoices/view/{$ds['iid']}">{$ds['iid']}</a> </td>
                                <td>{$ds['ip']}</td>
                                <td>{$ds['country']}</td>
                                <td>{$ds['city']}</td>
                                <td>{$ds['browser']}</td>
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