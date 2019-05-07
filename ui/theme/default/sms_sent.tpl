{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <!-- <h5>{$_L['Records']} {$paginator['found']}
                        . {$_L['Page']} {$paginator['page']} {$_L['of']} {$paginator['lastpage']}. </h5> -->




                </div>
                <div class="ibox-content" id="application_ajaxrender">


                    <table class="table table-bordered table-hover sys_table footable" id="sys_logs" data-page-size="20">
                        <thead>
                        <tr>
                            <th width="5%">{$_L['ID']}</th>
                            <th>{$_L['Date']}</th>
                            <th>{$_L['Sent To']}</th>
                            <th width="60%">{$_L['Message']}</th>
                            <th>{$_L['Manage']}</th>

                        </tr>
                        </thead>
                        <tbody>
                        {foreach $d as $ds}
                            <tr>
                                <td>{$ds['id']}</td>
                                <td>{date( $config['df'], strtotime($ds['created_at']))}</td>
                                <td>{urldecode($ds['sms_to'])}</td>
                                <td>{urldecode($ds['sms'])}</td>
                                <td><a href="{$_url}delete/sms/{$ds['id']}/" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> {$_L['Delete']}</a></td>

                            </tr>
                        {/foreach}
                        </tbody>
                   
                        <tfoot>
                            <tr>
                                <td style="text-align: left;" colspan="5">
                                    <ul class="pagination">
                                    </ul>
                                </td>
                            </tr>
                        </tfoot>
                   
                    </table>
                </div>


            </div>
        </div>
    </div>

{/block}
{block name=script}
<script type="text/javascript">
    var _url = $("#_url").val();
    $('.footable').footable();
</script>
{/block}