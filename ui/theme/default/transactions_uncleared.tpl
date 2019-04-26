{extends file="$layouts_admin"}

{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/footable/css/footable.core.min.css" />
{/block}

{block name="content"}

    <div class="row">
        <div class="col-md-12">

            <div class="panel">
                <div class="panel-body">

                    <form class="form-horizontal" method="post" action="">
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

                    <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
                        <thead>
                        <tr>
                            <th data-sort-ignore="true">&nbsp;</th>
                            <th>Date</th>
                            <th>Account</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $transactions as $transaction}
                            <tr>
                                <td>
                                    <a class="btn btn-primary" href="{$_url}transactions/mark-cleared/{$transaction->id}" data-toggle="tooltip" data-placement="top" title="{$_L['Mark as cleared']}"><i class="fa fa-check"></i> </a>
                                </td>
                                <td  data-value="{$transaction->id}">
                                    {date( $config['df'], strtotime($transaction->date))}
                                </td>
                                <td>{$transaction->account}</td>
                                <td>{$transaction->description}</td>
                                <td>{formatCurrency($transaction->amount,$transaction->currency_iso_code)}</td>

                            </tr>
                        {/foreach}

                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="5">
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

{block name="script"}
    <script type="text/javascript" src="{$app_url}ui/lib/footable/js/footable.all.min.js"></script>
    <script>
        $(function () {
            $('.footable').footable();
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
{/block}