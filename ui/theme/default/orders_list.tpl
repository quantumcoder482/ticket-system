{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">
                <div class="panel-body">

                    <a href="{$_url}orders/add/" class="md-btn md-btn-primary"><i class="fa fa-plus"></i> {$_L['Add New Order']}</a>


                </div>
                <div class="panel-body">

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

                    <table class="table table-bordered table-hover sys_table footable"  data-filter="#foo_filter" data-page-size="50">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{$_L['Order']} #</th>
                            <th>{$_L['Date']}</th>
                            <th>{$_L['Customer']}</th>
                            <th>{$_L['Total']}</th>
                            <th>{$_L['Status']}</th>
                            <th class="text-right" data-sort-ignore="true">{$_L['Manage']}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $d as $ds}

                            <tr>

                                <td><a href="{$_url}orders/view/{$ds['id']}/">{$ds['id']}</a> </td>
                                <td>

                                    <a href="{$_url}orders/view/{$ds['id']}/">{$ds['ordernum']}</a>

                                </td>

                                <td>
                                    {date( $config['df'], strtotime({$ds['date_added']}))}
                                </td>
                                <td><a href="{$_url}contacts/view/{$ds['cid']}/">{$ds['cname']}</a> </td>

                                <td class="amount">
                                    {$ds['amount']}

                                </td>
                                <td>
                                    {if $ds['status'] eq 'Active'}
                                        <span class="label label-success">{ib_lan_get_line($_L[$ds['status']])}</span>
                                    {else}
                                        <span class="label label-danger">{ib_lan_get_line($_L[$ds['status']])}</span>
                                    {/if}
                                </td>
                                <td class="text-right">
                                    <a href="{$_url}orders/view/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> </a>

                                    <a href="#" class="btn btn-danger btn-xs cdelete" id="uid{$ds['id']}"><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>

                        {/foreach}

                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="7">
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
