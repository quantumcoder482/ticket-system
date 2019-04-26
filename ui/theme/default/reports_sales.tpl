{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default" id="calendar_wrap">
                <h3 class="panel-heading">{$_L['Calendar']} [ {$_L['Invoice']} ] </h3>
                <div class="panel-body">


                    {*<div id="sale_chart" style="min-height: 548px;"></div>*}

                    <div id="calendar"></div>

                </div>

            </div>

        </div>

        <div class="col-md-12">

            <div class="panel panel-default">
                <h3 class="panel-heading">{$_L['Sales']} </h3>
                <div class="panel-body">


                    <table class="table table-striped table-responsive table-bordered dataTable" id="sales_items">
                        <thead>
                        <tr>
                            <th>{$_L['Item']}</th>
                            <th>{$_L['Qty']}</th>
                            <th>{$_L['Amount']}</th>
                            <th>{$_L['Total']}</th>
                            <th>{$_L['Date']}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $invoice_items as $item}
                            <tr>
                                <td>{$item['description']}</td>
                                <td>{$item['qty']}</td>
                                <td>{$item['amount']}</td>
                                <td>{$item['total']}</td>
                                <td>{$item['duedate']}</td>
                            </tr>
                        {/foreach}

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{$_L['Item']}</th>
                            <th>{$_L['Qty']}</th>
                            <th>{$_L['Amount']}</th>
                            <th>{$_L['Total']}</th>
                            <th>{$_L['Date']}</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>

            </div>

        </div>




    </div>
{/block}

{block name=script}




    <script>
        {literal}

        var $calendar_wrap = $("#calendar_wrap");

        function view_event(id) {


        }

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
            editable: true,
            eventLimit: 3,
            lang: ib_lang,
            isRTL: ib_rtl,
            eventSources: [{
                url: base_url + 'reports/sales_invoice_calendar',
                type: 'GET',
                error: function() {
                    bootbox.alert("Unable to load data.");
                }
            } ],
            eventRender: function(event, element) {
                element.attr('title', event._tooltip);
                element.attr('onclick', event.onclick);
                element.attr('data-toggle', 'tooltip');
                if (!event.url) {
                    element.click(function() {
                        view_event(event.eventid);
                    });
                }
            },
            eventStartEditable: false,

            firstDay: 0,
        };




        $('#calendar').fullCalendar(ib_calendar_options);

        {/literal}
    </script>
{/block}