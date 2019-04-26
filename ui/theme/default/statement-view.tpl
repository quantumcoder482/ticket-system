{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{$account} {$_L['Statement']} [{date( $config['df'], strtotime($fdate))} - {date( $config['df'], strtotime($tdate))}]</h5>

            </div>
            <div class="ibox-content">

                <table class="table table-bordered sys_table">
                    <th>{$_L['Date']}</th>




                    <th>{$_L['Description']}</th>
                    <th class="text-right">{$_L['Dr']}</th>
                    <th class="text-right">{$_L['Cr']}</th>
                    <th class="text-right">{$_L['Balance']}</th>

                    {foreach $d as $ds}
                        <tr>
                            <td>{date( $config['df'], strtotime($ds['date']))}</td>
                            <td>{$ds['description']}</td>


                            <td class="text-right">{$config['currency_code']} {number_format($ds['dr'],2,$config['dec_point'],$config['thousands_sep'])}</td>
                            <td class="text-right">{$config['currency_code']} {number_format($ds['cr'],2,$config['dec_point'],$config['thousands_sep'])}</td>
                            <td class="text-right"><span {if $ds['bal'] < 0}class="text-red"{/if}>{$config['currency_code']} {number_format($ds['bal'],2,$config['dec_point'],$config['thousands_sep'])}</span></td>

                        </tr>
                    {/foreach}



                </table>
                <div class="row">
                    <div class="col-md-8">
                        &nbsp;
                    </div>
                    <div class="col-md-2" style="text-align: right"> <form class="form-horizontal" method="post" action="{$_url}export/printable" target="_blank">
                            <input type="hidden" name="fdate" value="{$fdate}">
                            <input type="hidden" name="tdate" value="{$tdate}">
                            <input type="hidden" name="stype" value="{$stype}">
                            <input type="hidden" name="account" value="{$account}">
                            <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-print"></i> {$_L['Export for Print']}</button>

                        </form></div>
                    <div class="col-md-2" style="text-align: right"> <form class="form-horizontal" method="post" action="{$_url}export/pdf">
                            <input type="hidden" name="fdate" value="{$fdate}">
                            <input type="hidden" name="tdate" value="{$tdate}">
                            <input type="hidden" name="stype" value="{$stype}">
                            <input type="hidden" name="account" value="{$account}">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i> {$_L['Export to PDF']}</button>
                        </form></div>
                </div>
            </div>
        </div>



        <!-- Widget-2 end-->
    </div>
    <!-- Row end-->


    <!-- Row end-->


    <!-- Row end-->
{/block}
