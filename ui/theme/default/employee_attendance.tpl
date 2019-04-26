{extends file="$layouts_admin"}
{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/dp/dist/datepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/footable/css/footable.core.min.css" />
{/block}
{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>{$_L['Date']}</label>
                        <input class="form-control" id="inputDate" style="max-width: 250px;" name="date" datepicker
                               data-date-format="yyyy-mm-dd" data-auto-close="true"  value="{$date}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h3>{$_L['Mark Attendance']}</h3>
                    <p>{date( $config['df'], strtotime($date))}</p>
                    <div class="hr-line-dashed"></div>


                    <div class="col-md-12">

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
                                <th width="200px;">{$_L['Name']}</th>
                                <th width="100px;">{$_L['Status']}</th>
                                <th>{$_L['Note']}</th>
                            </tr>
                            </thead>
                            <tbody>

                            {foreach $employees as $employee}
                                <tr>
                                    <td>{$employee->name} </td>
                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-size="small" data-on="{$_L['Present']}" data-off="{$_L['Absent']}">
                                    </td>
                                    <td>
                                    <div class="form-group">
                                        <input class="form-control">
                                    </div>
                                    </td>
                                </tr>
                            {/foreach}

                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="3">
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

{block name=script}
    <script type="text/javascript" src="{$app_url}ui/lib/footable/js/footable.all.min.js"></script>
    <script type="text/javascript" src="{$app_url}ui/lib/dp/dist/datepicker.min.js"></script>
    <script>
        $(function () {
            $('.footable').footable();
            var $inputDate = $('#inputDate');
            $inputDate.on('change',function () {
                window.location = '{$_url}hrm/attendance/' + $inputDate.val()
            });
        })
    </script>


{/block}