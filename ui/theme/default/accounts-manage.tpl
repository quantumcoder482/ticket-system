{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Manage_Accounts']}</h5>

                </div>
                <div class="ibox-content">

                    <table class="table table-striped table-bordered">
                        <th>{$_L['Account']}</th>
                        <th>{$_L['Balance']}</th>
                        <th>{$_L['Manage']}</th>


                        {foreach $balances['banks'] as $bank}

                            <tr>
                                <td>
                                    <h4>{$bank->account}</h4>
                                </td>
                                <td>
                                    {if (isset($balances['balances'][$bank->id]))}



                                        <strong>{$_L['Equity']} (Initial balance): {formatCurrency($balances['total_equity_bank'][$bank->id],$balances['home_currency']->iso_code)}</strong> <br>
                                        <strong>{$_L['Total in']}: {formatCurrency($balances['total_in_bank'][$bank->id],$balances['home_currency']->iso_code)} </strong>  <br>
                                        <strong>{$_L['Total out']}: {formatCurrency($balances['total_out_bank'][$bank->id],$balances['home_currency']->iso_code)} </strong>  <br>

                                        <hr>

                                        <strong> {$_L['Balance']} (in home currency) : {formatCurrency($balances['balances'][$bank->id],$balances['home_currency']->iso_code)}</strong>

                                    {/if}
                                </td>
                                <td>


                                    <a href="{$_url}accounts/add-equity/{$bank->id}" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> {$_L['Record initial balance']}</a>

                                    <a href="{$_url}accounts/edit/{$bank->id}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>

                                    {if {$bank->ib_url} neq ''}
                                        <a href="{$bank->ib_url}" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-globe"></i></a>
                                    {/if}

                                    <a href="{$_url}accounts/delete/{$bank->id}" id="did{$bank->id}" class="cdelete btn btn-danger btn-xs"><i class="fa fa-trash"></i> {$_L['Delete']}</a>


                                </td>
                            </tr>

                        {/foreach}




                    </table>

                    <div class="hr-line-dashed"></div>

                    <h3>{$_L['Net Worth']} - {formatCurrency($balances['net_worth'],$balances['home_currency']->iso_code)}</h3>

                </div>
            </div>



        </div>



    </div>


    <input type="hidden" id="_lan_are_you_sure" value="{$_L['are_you_sure']}">


{/block}


{block name="script"}

    <script>
        $(function () {
            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                var lan_msg = $("#_lan_are_you_sure").val();
                bootbox.confirm(lan_msg, function(result) {
                    if(result){
                        var _url = $("#_url").val();
                        window.location.href = _url + "accounts/delete/" + id + '/';
                    }
                });
            });
        })
    </script>


{/block}
