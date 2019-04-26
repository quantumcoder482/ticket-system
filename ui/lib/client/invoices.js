$(function() {

    option = {
        title : {
            text: 'Invoice Summary',
            subtext: ib_customer_name,
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient : 'vertical',
            x : 'left',
            data:[_L['Paid'],_L['Unpaid'],_L['Partially Paid'],_L['Cancelled']]
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, title : _L['Data View'],
                    readOnly: false,
                magicType : {
                    show: true,
                    type: ['pie', 'funnel'],
                    option: {
                        funnel: {
                            x: '25%',
                            width: '50%',
                            funnelAlign: 'left',
                            max: 1548
                        }
                    }
                },
                    lang: [_L['Data View'], _L['Cancel'], _L['Reset']] },
                restore : {show: true, title : 'Reset'},
                saveAsImage : {show: true, title : _L['Save as Image'],
                    type : 'png',
                    lang : [_L['Click to Save']]}
            }
        },
        calculable : true,
        series : [
            {
                name:'Invoice',
                type:'pie',
                color: [
                    ib_c1,ib_c2,ib_c3,ib_c4
                ],
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:ib_count_paid, name:_L['Paid']},
                    {value:ib_count_unpaid, name:_L['Unpaid']},
                    {value:ib_count_partially_paid, name:_L['Partially Paid']},
                    {value:ib_count_cancelled, name:_L['Cancelled']}
                ]
            }
        ]
    };

    var chart = echarts.init(document.getElementById('invoice_summary'));
    chart.setOption(option);

});