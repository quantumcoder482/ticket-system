{extends file="$layouts_admin"}

{block name="content"}
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{$_L['Total']} : {$total_quote}</h5>
        </div>
        <div class="ibox-content">

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

            <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{$_L['Account']}</th>
                    <th width="30%">{$_L['Subject']}</th>
                    <th>{$_L['Amount']}</th>
                    <th>{$_L['Date Created']}</th>
                    <th>{$_L['Expiry Date']}</th>
                    <th>{$_L['Stage']}</th>

                    <th class="text-right">{$_L['Manage']}</th>
                </tr>
                </thead>
                <tbody>

                {foreach $d as $ds}
                    <tr>
                        <td data-value="{$ds['id']}"><a href="{$_url}quotes/view/{$ds['id']}/">{$ds['invoicenum']}{if $ds['cn'] neq ''} {$ds['cn']} {else} {$ds['id']} {/if}</a> </td>
                        <td><a href="{$_url}contacts/view/{$ds['userid']}/">{$ds['account']}</a> </td>
                        <td><a href="{$_url}quotes/view/{$ds['id']}/">{$ds['subject']}</a> </td>
                        <td class="amount">{$ds['total']}</td>
                        <td>{date( $config['df'], strtotime($ds['datecreated']))}</td>
                        <td>{date( $config['df'], strtotime($ds['validuntil']))}</td>
                        <td>
                            {if $ds['stage'] eq 'Dead'}
                                <span class="label label-default">{$_L['Dead']}</span>
                            {elseif $ds['stage'] eq 'Lost'}
                                <span class="label label-danger">{$_L['Lost']}</span>
                            {elseif $ds['stage'] eq 'Accepted'}
                                <span class="label label-success">{$_L['Accepted']}</span>
                            {elseif $ds['stage'] eq 'Draft'}
                                <span class="label label-info">{$_L['Draft']}</span>
                            {elseif $ds['stage'] eq 'Delivered'}
                                <span class="label label-info">{$_L['Delivered']}</span>
                            {else}
                                <span class="label label-info">{$ds['stage']}</span>
                            {/if}

                        </td>

                        <td class="text-right">
                            <a href="{$_url}quotes/view/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> {$_L['View']}</a>
                            <a href="{$_url}quotes/edit/{$ds['id']}/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>
                            <a href="#" class="btn btn-danger btn-xs cdelete" id="iid{$ds['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                        </td>
                    </tr>
                {/foreach}

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="8">
                        <ul class="pagination">
                        </ul>
                    </td>
                </tr>
                </tfoot>
            </table>
            {$paginator['contents']}
        </div>
    </div>
{/block}