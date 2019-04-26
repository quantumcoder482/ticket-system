{extends file="$layouts_admin"}

{block name="content"}


    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header">{$_L['Invoices']}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li><a class="nav-link" href="{$_url}reports/invoices">{$_L['Invoices']}</a></li>
                    <li class="active"><a class="nav-link active show" href="{$_url}reports/invoices_summary">{$_L['Summary']}</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show">
                        <div class="panel-body panel-body-with-border">

                            <h3>{$_L['Invoices']} - {$_L['Paid']} [ {$_L['Last 12 Months']} ]</h3>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="container_sales_chart" id="container_sales_chart" style="min-height: 450px;"></div>
                                </div>
                                <div class="col-md-3">
                                    <a class="dashboard-stat green" href="javascript:void(0);">
                                        <div class="visual">
                                            <i class="icon-credit-card-1"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span class="amount">{$total_invoice}</span>
                                            </div>
                                            <div class="desc text-right"> {$_L['Total Invoice']} </div>
                                        </div>
                                    </a>

                                    {if $all_data}
                                        <a class="dashboard-stat purple" href="javascript:void(0);">
                                            <div class="visual">
                                                <i class="fa fa-cubes"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span class="amount">{$total_invoice_items}</span>
                                                </div>
                                                <div class="desc text-right"> {$_L['Sales Count']} </div>
                                            </div>
                                        </a>
                                    {/if}

                                    <a class="dashboard-stat blue" href="javascript:void(0);">
                                        <div class="visual">
                                            <i class="fa fa-calculator"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span class="amount">{$total_invoice_amount}</span>
                                            </div>
                                            <div class="desc text-right"> {$_L['Total Amount']} </div>
                                        </div>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>


{/block}


{block name="script"}

    <script src="{$app_url}ui/lib/chartjs.min.js?ver={$file_build}"></script>

    <script>

        jQuery(document).ready(function() {

            var container_sales_chart = document.getElementById("container_sales_chart");
            var salesChart = echarts.init(container_sales_chart);

            var salesChartOption;

            salesChartOption = {
                color: ['#2196f3'],
                tooltip : {
                    trigger: 'axis',
                    axisPointer : {
                        type : 'shadow'
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
                        data : [
                            {foreach $m['display'] as $m}
                            '{$m}',
                            {/foreach}
                        ],
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
                        name:'{$_L['Amount']}',
                        type:'bar',
                        barWidth: '60%',
                        data:[
                            {foreach $m['data'] as $d}
                            {$d},
                            {/foreach}
                        ]
                    }
                ]
            };

            salesChart.setOption(salesChartOption, true);


        });



    </script>
{/block}