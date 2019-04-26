{extends file="$layouts_admin"}

{block name="content"}


    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header">{$_L['Invoices']}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">


                    <div class="containerInvoicesVsExpense" id="containerInvoicesVsExpense" style="min-height: 450px;"></div>

                </div>
            </div>
        </div>
    </div>
{/block}

{block name="script"}

    <script src="{$app_url}ui/lib/chartjs.min.js?ver={$file_build}"></script>

    <script>

        jQuery(document).ready(function() {


            var containerInvoicesVsExpense = document.getElementById("containerInvoicesVsExpense");
            var chartInvoicesVsExpense = echarts.init(containerInvoicesVsExpense);


            var optionInvoicesVsExpense = {
                title: {
                    text: '{$_L['Invoices Vs Expense']}'
                },
                tooltip : {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'cross',
                        label: {
                            backgroundColor: '#6a7985'
                        }
                    }
                },
                legend: {
                    data:['{$_L['Total Invoice']}','{$_L['Total Paid']}','{$_L['Total Expense']}','{$config['expense_type_1']}','{$config['expense_type_2']}']
                },
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                grid: {
                    left: '2%',
                    right: '2%',
                    bottom: '15%',
                    containLabel: true
                },
                xAxis : [
                    {
                        type : 'category',
                        boundaryGap : false,
                        data : [{foreach $m['display'] as $m}
                            '{$m}',
                            {/foreach}],
                        axisTick: {
                            alignWithLabel: true
                        },
                        axisLabel : {
                            rotate : 45,
                            interval : 0
                        }
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                series : [
                    {
                        name:'{$_L['Total Invoice']}',
                        type:'line',
                        stack: '{$_L['Amount']}',
                        areaStyle: { normal: {

                        }
                        },
                        data:[
                            {foreach $m['invoice_total'] as $d_invoice_total}
                            {$d_invoice_total},
                            {/foreach}
                        ]
                    },
                    {
                        name:'{$_L['Total Paid']}',
                        type:'line',
                        stack: '{$_L['Amount']}',
                        areaStyle: { normal: {

                        } },
                        data:[
                            {foreach $m['invoice_paid'] as $d_invoice_paid}
                            {$d_invoice_paid},
                            {/foreach}
                        ]
                    },
                    {
                        name:'{$_L['Total Expense']}',
                        type:'line',
                        stack: '{$_L['Amount']}',
                        areaStyle: { normal: {

                        } },
                        data:[
                            {foreach $m['expense_total'] as $d_expense_total}
                            {$d_expense_total},
                            {/foreach}
                        ]
                    },
                    {
                        name:'{$config['expense_type_1']}',
                        type:'line',
                        stack: '{$_L['Amount']}',
                        areaStyle: { normal: {

                        } },
                        data:[
                            {foreach $m['expense_type_1'] as $d_expense_type_1}
                            {$d_expense_type_1},
                            {/foreach}
                        ]
                    },
                    {
                        name:'{$config['expense_type_2']}',
                        type:'line',
                        stack: '{$_L['Amount']}',
                        label: {
                            normal: {
                                show: true,
                                position: 'top'
                            }
                        },
                        areaStyle: { normal: {

                        } },
                        data:[
                            {foreach $m['expense_type_2'] as $d_expense_type_2}
                            {$d_expense_type_2},
                            {/foreach}
                        ]
                    }
                ]
            };


            chartInvoicesVsExpense.setOption(optionInvoicesVsExpense, true);



        });



    </script>
{/block}