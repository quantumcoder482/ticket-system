{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h3>{$_L['Payroll']}</h3>
                    <div class="hr-line-dashed"></div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{$_L['Month']}</th>
                            <th>{$_L['Total Amount']}</th>
                            <th>{$_L['Status']}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {ib_lan_get_line(date('F'))}
                            </td>
                            <td>0.00</td>
                            <td>{$_L['Not processed']}</td>
                            <td>
                                <a href="{$_url}hrm/run-payroll" class="btn btn-primary">{$_L['Run payroll']}</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

{/block}

{block name=script}

    <script>

    </script>


{/block}