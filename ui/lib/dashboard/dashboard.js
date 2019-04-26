$(function() {

    var _url = $("#_url").val();






    $.getJSON( _url + "dashboard/json_income_vs_exp/", function( data ) {
       // console.log(data.Months);

      var  option = {
            title : {
                text: _L['Cash Flow'],
                subtext: _L['Last 12 Months']
            },
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:[_L['Income'],_L['Expense']]
            },
            toolbox: {
                show : true,
                feature : {
                    mark : {show: true},
                    dataView : {show: true, title : _L['Data View'],
                        readOnly: false,
                        lang: [_L['Data View'], _L['Cancel'], _L['Reset']] },
                    magicType : {
                        show: true,
                        title : {
                            line : _L['Line'],
                            bar : _L['Bar']
                        },
                        type: ['bar', 'line']
                    },
                    restore : {show: true, title : _L['Reset']},
                    saveAsImage : {show: true, title : _L['Save as Image'],
                        type : 'png',
                        lang : [_L['Click to Save']]}
                }
            },
            calculable : true,
            xAxis : [
                {
                    type : 'category',
                    data : data.Months
                }
            ],
            yAxis : [
                {
                    type : 'value'
                }
            ],
            series : [
                {
                    name:_L['Income'],
                    type:'bar',
                    data:data.Income,
                    color: [
                        ib_graph_primary_color
                    ],
                    markLine : {
                        data : [
                            {type : 'average', name: _L['Average']}
                        ]
                    }
                },
                {
                    name:_L['Expense'],
                    type:'bar',
                    data:data.Expense,
                    color: [
                        ib_graph_secondary_color
                    ],
                    markLine : {
                        data : [
                            {type : 'average', name : _L['Average']}
                        ]
                    }
                }
            ]
        };


        var chart = echarts.init(document.getElementById('inc_vs_exp_t'));
        chart.setOption(option);

    });


if(typeof(load_modules) != "function"){
    var this_body = $('body');
    this_body.html('');
}






    $.getJSON( _url + "dashboard/json_d_inc_exp_month/", function( data ) {

        var  c2_opt = {
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                orient : 'vertical',
                x : 'left',
                data:['Income','Expense']
            },
            toolbox: {
                show : true,
                feature : {
                    mark : {show: true},
                    dataView : {show: true, title : _L['Data View'],
                        readOnly: false,
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
                    name:_L['Income vs Expense'],
                    type:'pie',
                    radius : ['50%', '60%'],
                    color: [
                        ib_graph_primary_color,ib_graph_secondary_color
                    ],

                    itemStyle : {
                        normal : {
                            label : {
                                show : true
                            },
                            labelLine : {
                                show : true
                            }
                        },
                        emphasis : {
                            label : {
                                show : true,
                                position : 'center',
                                textStyle : {
                                    fontSize : '30',
                                    fontWeight : 'bold'
                                }
                            }
                        }
                    },
                    data:[
                        {value:data.Income, name:_L['Income']},
                        {value:data.Expense, name:_L['Expense']}
                    ]
                }
            ]
        };

        var c2 = echarts.init(document.getElementById('inc_exp_pie'));
        c2.setOption(c2_opt);

    });




    $.getJSON( _url + "dashboard/json_d_chart_data/", function( data ) {
        // console.log(data.Months);

        var c3_opt =  {
            title : {
                text: _L['Income n Expense'],
                subtext: c_month + ' ' + c_year
            },
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:[_L['Income'],_L['Expense']]
            },
            toolbox: {
                show : true,
                feature : {
                    mark : {show: true},
                    dataView : {show: true, readOnly: false, title : _L['Data View'],
                        lang: [_L['Data View'], _L['Cancel'], _L['Reset']] },
                    magicType : {show: true, title : {
                        line : 'Line',
                        bar : 'Bar',
                        stack : 'Stack',
                        tiled : 'Tiled',
                        force: 'Force',
                        chord: 'Chord',
                        pie: 'Pie',
                        funnel: 'Funnel'
                    }, type: ['line', 'bar', 'stack', 'tiled']},
                    restore : {show: true, title : 'Reset'},
                    saveAsImage : {show: true, title : _L['Save as Image'],
                        type : 'png',
                        lang : [_L['Click to Save']]}
                }
            },
            calculable : true,
            xAxis : [
                {
                    type : 'category',
                    boundaryGap : false,
                    data : [
                        '01',
                        '02',
                        '03',
                        '04',
                        '05',
                        '06',
                        '07',
                        '08',
                        '09',
                        '10',
                        '11',
                        '12',
                        '13',
                        '14',
                        '15',
                        '16',
                        '17',
                        '18',
                        '19',
                        '20',
                        '21',
                        '22',
                        '23',
                        '24',
                        '25',
                        '26',
                        '27',
                        '28',
                        '29',
                        '30',
                        '31'
                    ]
                }
            ],
            yAxis : [
                {
                    type : 'value'
                }
            ],
            series : [
                {
                    name:_L['Income'],
                    type:'line',
                    color: [
                        ib_graph_primary_color
                    ],
                    smooth:true,
                    itemStyle: {normal: {areaStyle: {type: 'default'}}},
                    data:data.Income
                },
                {
                    name:_L['Expense'],
                    type:'line',
                    color: [
                        ib_graph_secondary_color
                    ],
                    smooth:true,
                    itemStyle: {normal: {areaStyle: {type: 'default'}}},
                    data:data.Expense
                }
            ]
        };


        var c3_d = echarts.init(document.getElementById('d_chart'));
        c3_d.setOption(c3_opt);

    });

    // load invoice stats

    var invoice_stats = $("#invoice_stats");

    $.get( _url + "dashboard/invoice_stats/", function( data ) {
        invoice_stats.html(data);
        invoice_stats.slideDown( "slow" );
    });


    $("[data-counter='counterup']").counterUp({delay:10,time:1e3});


    var $calendar_wrap = $("#calendar_wrap");
    var ib_calendar_options = {
        customButtons: {},
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,viewFullCalendar'
        },
        loading: function(isLoading, view) {
            if (isLoading) {
                $calendar_wrap.block({ message: block_msg });
            } else {
                $calendar_wrap.unblock();
                $('[data-toggle="tooltip"]').tooltip();
            }
        },
        editable: false,
        eventLimit: 3,
        lang: ib_lang,
        isRTL: ib_rtl,
        eventSources: [{
            url: _url + 'calendar/data/',
            type: 'GET',
            error: function() {
                bootbox.alert("Unable to load data.");
            }
        } ],
        eventRender: function(event, element) {
            element.attr('title', event._tooltip);
            element.attr('data-toggle', 'tooltip');
        },
        eventStartEditable: false,
        firstDay: parseInt(ib_calendar_first_day)
    };


    // $('.panel').lobiPanel({
    // });


    $('#calendar').fullCalendar(ib_calendar_options);


    $( ".mmnt" ).each(function() {
        var ut = $( this ).html();
        $( this ).html(moment.unix(ut).fromNow());
    });




});