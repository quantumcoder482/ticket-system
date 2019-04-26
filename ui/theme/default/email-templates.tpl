{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="#" id="add_new_template" class="btn btn-primary">{$_L['Add New Template']}</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="ib-search-bar " style="padding: 0">
                        <div class="input-group">
                            <input type="text" class="form-control" id="ib_search_input" placeholder="{$_L['Search']}..." autofocus> </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">

        <div class="col-lg-12">
            <div class="mail-box-header">


                <h3>
                    {$_L['Email Templates']}
                </h3>

            </div>
            <div class="mail-box" id="application_ajaxrender">

                <table class="table table-hover table-mail filter-table" id="tbl_email_templates">
                    <tbody>


                    {foreach $d as $ds}
                        <tr class="read">

                            <td><a  class="ve" id="f{$ds['id']}" href="#">{ib_lan_get_line($ds['tplname'])}</a>  </td>
                            <td><a  class="ve" id="s{$ds['id']}" href="#">{$ds['subject']}</a></td>
                            <td class=""></td>
                            <td class="text-right">
                                {if $ds['send'] eq 'Yes'}
                                    <span class="label label-success"> {$_L['Active']} </span>
                                {else}
                                    <span class="label label-danger"> {$_L['Inactive']} </span>
                                {/if}
                                &nbsp;
                                {if $ds['core'] eq 'Yes'}
                                    <span class="label label-warning"> {$_L['System']} </span>
                                {else}
                                    <span class="label label-info"> {$_L['Custom']} </span>
                                {/if}

                            </td>

                            <td class="text-right">

                                <a href="javascript:void(0)" class="btn btn-primary btn-xs ve" id="b{$ds['id']}" data-toggle="tooltip" data-placement="top" title="{$_L['View']}"><i class="fa fa-file-text-o"></i></a>
                                <a href="{$_url}settings/clone_email_template/{$ds['id']}/" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="{$_L['Clone']}"><i class="fa fa-files-o"></i></a>


                                {if $ds['core'] neq 'Yes'}
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs cdelete" id="ed{$ds['id']}" data-toggle="tooltip" data-placement="top" title="{$_L['Delete']}"><i class="fa fa-trash"></i></a>
                                {/if}

                            </td>

                        </tr>
                    {/foreach}

                    </tbody>
                </table>


            </div>
        </div>
    </div>
{/block}