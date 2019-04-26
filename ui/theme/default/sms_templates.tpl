{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{$_L['SMS Templates']}</h4>
                </div>
                <div class="panel-body">

                    <table class="table table-condensed table-hover table-bordered">
                        <thead>
                        <tr>


                            <th>{$_L['Name']}</th>
                            <th width="70%">{$_L['Message']}</th>
                            <th>{$_L['Manage']}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $templates as $template}
                            <tr>

                                <td>{$template->tpl}</td>
                                <td>{$template->sms}</td>
                                <td> <a href="{$_url}sms/init/edit/{$template->id}" class="btn btn-sm btn-inverse">{$_L['Edit']}</a> </td>
                            </tr>
                        {/foreach}

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
{/block}