{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header">{$_L['Payments']}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Payments']}</h5>

                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <form class="form-horizontal" method="post" action="{$_url}customers/list/">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" name="name" id="foo_filter" class="form-control" placeholder="{$_L['Search']}..."/>

                                    </div>
                                </div>

                            </div>
                        </form>
                        <table class="table table-bordered sys_table footable" data-filter="#foo_filter" data-page-size="50">
                            <thead>
                            <tr>
                                <th>{$_L['Invoice']}#</th>
                                <th>{$_L['Date']}</th>
                                <th>{$_L['Account']}</th>


                                <th class="text-right">{$_L['Amount']}</th>

                                <th>{$_L['Transaction ID']}</th>

                                <th class="text-right">{$_L['Cr']}</th>
                                <th class="text-right">{$_L['Balance']}</th>
                                <th>{$_L['Manage']}</th>
                            </tr>

                            </thead>

                            {foreach $d as $ds}
                                <tr class="{if $ds['cr'] eq '0.00'}warning {else}info{/if}">
                                    <td>{$ds['iid']}</td>
                                    <td>{date( $config['df'], strtotime($ds['date']))}</td>
                                    <td>{$ds['account']}</td>
                                    <td class="text-right amount">{$ds['amount']}</td>
                                    <td>{$ds['description']}</td>
                                    <td class="text-right amount">{$ds['cr']}</td>
                                    <td class="text-right"><span class="amount{if $ds['bal'] < 0} text-red{/if}" >{$ds['bal']}</span></td>
                                    <td><a href="{$_url}transactions/manage/{$ds['id']}">{$_L['Manage']}</a></td>
                                </tr>
                            {/foreach}

                            <tfoot>
                            <tr>
                                <td colspan="8">
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

    </div>
{/block}
