{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">


        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Income Reports']} </h5>

                </div>
                <div class="ibox-content">

                    {foreach $currencies as $currency}

                        <div class="row">
                            <div class="col-md-12">
                                <h4>{$_L['Income Summary']} [ {$currency->iso_code} ]</h4>
                            </div>
                            <div class="col-md-3">
                                <a class="dashboard-stat blue" href="{$_url}transactions/deposit/">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="amount" data-a-sign="{$currency->symbol} ">{$total_income_all_time}</span>
                                        </div>
                                        <div class="desc"> {$_L['Total Income']} </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a class="dashboard-stat blue" href="{$_url}transactions/deposit/">
                                    <div class="visual">
                                        <i class="fa fa-line-chart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="amount" data-a-sign="{$currency->symbol} ">{Transaction::totalAmount('Income',$currency->id,'current_month',$all_data)}</span>
                                        </div>
                                        <div class="desc"> {$_L['Total Income This Month']} </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a class="dashboard-stat blue" href="{$_url}transactions/deposit/">
                                    <div class="visual">
                                        <i class="fa fa-calculator"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="amount" data-a-sign="{$currency->symbol} ">{Transaction::totalAmount('Income',$currency->id,'current_week',$all_data)}</span>
                                        </div>
                                        <div class="desc"> {$_L['Total Income This Week']} </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a class="dashboard-stat blue" href="{$_url}transactions/deposit/">
                                    <div class="visual">
                                        <i class="fa fa-columns"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="amount" data-a-sign="{$currency->symbol} ">{Transaction::totalAmount('Income',$currency->id,'last_30_days',$all_data)}</span>
                                        </div>
                                        <div class="desc"> {$_L['Total Income Last 30 days']} </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    {/foreach}



                    <hr>
                    <h4>{$_L['Last 20 deposit Income']}</h4>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <th>{$_L['Date']}</th>
                        <th>{$_L['Account']}</th>
                        <th>{$_L['Type']}</th>
                        <th>{$_L['Category']}</th>
                        <th class="text-right">{$_L['Amount']}</th>
                        <th>{$_L['Payer']}</th>



                        <th>{$_L['Description']}</th>

                        <th class="text-right">{$_L['Cr']}</th>


                        {foreach $d as $ds}
                            <tr>
                                <td>{date( $config['df'], strtotime($ds['date']))}</td>
                                <td>{$ds['account']}</td>
                                <td>{ib_lan_get_line($ds['type'])}</td>
                                <td>{if $ds['category'] == 'Uncategorized'}{$_L['Uncategorized']} {else} {$ds['category']} {/if}</td>
                                <td class="text-right">{$config['currency_code']} {number_format($ds['amount'],2,$config['dec_point'],$config['thousands_sep'])}</td>
                                <td>{$ds['payer']}</td>



                                <td>{$ds['description']}</td>

                                <td class="text-right">{$config['currency_code']} {number_format($ds['cr'],2,$config['dec_point'],$config['thousands_sep'])}</td>


                            </tr>
                        {/foreach}



                    </table>
                    <hr>

                    <div id="placeholder" class="flot-placeholder"></div>
                    <hr>

                    <h4>Income by Categories</h4>

                    <div id="catChart" style="min-height: 500px;"></div>

                </div>
            </div>
        </div>

        <!-- Widget-2 end-->
    </div>
{/block}

{block name="script"}

    <script type="text/javascript" src="{$app_url}/ui/lib/numeric.js"></script>
    <script src="{$app_url}ui/lib/chartjs.min.js?ver={$file_build}"></script>

    <script>
        jQuery(document).ready(function() {



            $('.amount').autoNumeric('init', {


                dGroup: 3,
                aPad: true,
                pSign: 'p',
                aDec: '{$config['dec_point']}',
                aSep: '{$config['thousands_sep']}',
                vMax: '9999999999999999.00',
                vMin: '-9999999999999999.00'

            });


            var myChart = echarts.init(document.getElementById('placeholder'));

            // specify chart configuration item and data
            var option = {
                title: {
                    text: '{$_L['Monthly Income Graph']}'
                },
                tooltip: { },
                legend: {
                    data:['{$_L['Income']}']
                },
                calculable : true,
                xAxis: {
                  //  data: ["shirt","cardign","chiffon shirt","pants","heels","socks"]
                    type : 'category',
                    data: [
                        {foreach $m_data as $d}
                        "{$d['month']}",
                        {/foreach}
                    ],
                    axisLabel : {
                        rotate : 45,
                        interval : 0
                    }
                },
                yAxis: { },
                series: [{
                    name: '{$_L['Income']}',
                    type: 'bar',
                    color: [
                        '#{$config['graph_primary_color']}'
                    ],
                    data: [{foreach $m_data as $d}
                        {$d['value']},
                        {/foreach}]
                }]
            };

            // use configuration item and data specified to show chart
            myChart.setOption(option);




            var cat_option = {

                tooltip: {
                    trigger: 'item',
                    formatter: "{literal}{a} <br/>{b}: {c} ({d}%){/literal}"
                },
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data:[{foreach $cat_data as $d}
                        "{$d['category']}",
                        {/foreach}]
                },
                series: [
                    {
                        name:'{$_L['Income']}',
                        type:'pie',
                        radius: ['50%', '70%'],
                        avoidLabelOverlap: false,
                        color: [
                            '#2196f3',
                            '#46BE8A',
                            '#8E44AD',
                            '#FFCC29',
                            '#F37070'
                        ],
                        label: {
                            normal: {
                                show: false,
                                position: 'center'
                            },
                            emphasis: {
                                show: true,
                                textStyle: {
                                    fontSize: '30',
                                    fontWeight: 'bold'
                                }
                            }
                        },
                        labelLine: {
                            normal: {
                                show: false
                            }
                        },
                        data:[

                            {foreach $cat_data as $d}
                            { value:{$d['value']}, name:'{$d['category']}' },
                            {/foreach}

                        ]
                    }
                ]
            };


            var catChart = echarts.init(document.getElementById('catChart'));
            catChart.setOption(cat_option);

        });

    </script>

{/block}
