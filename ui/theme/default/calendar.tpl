{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default" style="min-height: 400px;" id="calendar_wrap">

                <div class="panel-body">


                    <div id="calendar"></div>


                </div>
            </div>
        </div>



    </div>

    <div id="modal_add_event" class="modal fade-scale" tabindex="-1" data-width="800" style="display: none;">
        <form id="ib_modal_form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="modal_title">{$_L['Add Event']}</h4>
            </div>
            <div class="modal-body">
                <div class="row">





                    <div class="form-group col-md-12">
                        <label for="title">{$_L['Event Name']}</label>
                        <input type="text" class="form-control" id="title" name="title" value="" required>
                    </div>



                    <div class="form-group col-md-6">
                        <label for="start">{$_L['Start Date']}</label>
                        <input type="text" class="form-control datepicker" id="start" placeholder="Select Date" name="start" value="{$mdate}">
                    </div>

                    <div class="form-group col-md-6" id="start_time_div">
                        <label for="start_time">{$_L['Start Time']}</label>
                        <div class="input-group clockpicker">

                            <input type="text" id="start_time" name="start_time" class="form-control" value="09:30">
                            <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
                        </div>
                    </div>



                    <div class="form-group col-md-6">
                        <label for="end">{$_L['End Date']}</label>
                        <input type="text" class="form-control datepicker" id="end" name="end" value="">
                    </div>

                    <div class="form-group col-md-6" id="end_time_div">
                        <label for="end_time">{$_L['End Time']}</label>
                        <div class="input-group clockpicker">

                            <input type="text" class="form-control" id="end_time" name="end_time" value="11:30">
                            <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
                        </div>
                    </div>



                    <div class="form-group col-md-12">

                        <input class="i-checks" type="checkbox" name="all_day_event" value="yes" id="all_day_event">
                        <label for="all_day_event">{$_L['All day event']}</label>


                    </div>


                    <div class="form-group col-md-12">
                        <label for="color">{$_L['Color']}</label>
                        <input type="text" class="form-control color" id="color" name="color" value="#2196f3">
                    </div>


                    <div class="form-group col-md-12">
                        <label for="description">{$_L['Description']}</label>
                        <textarea id="description" name="description" class="form-control" rows="5"></textarea>
                    </div>



                    <input type="hidden" id="ib_act" name="ib_act" value="create">
                    <input type="hidden" id="event_id" name="event_id" value="0">






                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="btn_del_event" class="btn btn-danger"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                <button type="button" data-dismiss="modal" class="btn btn-warning">{$_L['Close']}</button>
                <button type="submit" id="btn_save_event" class="btn btn-primary">{$_L['Submit']}</button>
            </div>
        </form>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_event" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>

{/block}

{block name="script"}




    <script type="text/javascript" src="{$app_url}ui/lib/fc/fc.js?ver=306"></script>

    {if $config['language'] neq 'en'}
        <script type="text/javascript" src="{$app_url}ui/lib/fc/lang/{getFCLocale($clx_language_code)}.js"></script>
    {/if}

    <script>
        $(function() {

            var _url = $("#_url").val();

            var $calendar_wrap = $("#calendar_wrap");

            var ib_date_picker_options = {
                format: ib_date_format_picker
            };


            var $modal = $("#modal_add_event");

            var $ib_modal_form = $("#ib_modal_form");

            var $start = $('#start');

            var start_picker = $start.pickadate(ib_date_picker_options);
            var picker = start_picker.pickadate('picker');

            var $ib_act = $("#ib_act");
            var $event_id = $("#event_id");

            var $end = $('#end');

            var end_picker = $end.pickadate(ib_date_picker_options);
            var picker2 = end_picker.pickadate('picker');

            var $description = $("#description");
            var $title = $("#title");

            var $all_day_event = $("#all_day_event");

            var $start_time_div = $("#start_time_div");
            var $end_time_div = $("#end_time_div");

            var $btn_del_event = $("#btn_del_event");

            var $start_time = $('#start_time');
            var $end_time = $('#end_time');

            $btn_del_event.hide();

            $btn_del_event.on('click', function(e) {

                e.preventDefault();

                bootbox.confirm(_L['are_you_sure'], function(result) {

                    if(result){

                        window.location.href = _url + "delete/event/" + $event_id.val();

                    }

                });

            });


            $('#color').spectrum({
                preferredFormat: "hex",
                showInput: true,
                showPalette: true,
                palette: [["#F44336", "#E91E63", "#9C27B0", "#673AB7", "#3F51B5", "#2196F3", "#03A9F4", "#00BCD4", "#009688", "#4CAF50", "#8BC34A", "#CDDC39", "#FFEB3B", "#FFC107", "#FF9800", "#FF5722", "#795548", "#9E9E9E", "#607D8B", "#000000"]],
                color: "#2196f3"
            });


            function view_event(id) {

                $btn_del_event.show();

                $ib_act.val('edit');
                $event_id.val(id);

                $.post(_url + 'calendar/view_event/' + id + '/').success(function(data) {
                    $modal.modal('show');
                    $title.val(data.title);
                    $modal_title.html(data.title);
                    $description.html(data.description);
                    $start.val(data.start_date);
                    $end.val(data.end_date);
                    picker.set('select', data.start_date, { format: ib_date_format_picker });
                    picker2.set('select', data.end_date, { format: ib_date_format_picker });
                    $start_time.val(data.start_time);
                    $end_time.val(data.end_time);

                    if(data.allDay == 1){
                        $start_time_div.hide();
                        $end_time_div.hide();
                        //  $all_day_event.iCheck('check');
                    }
                    else{
                        $start_time_div.show();
                        $end_time_div.show();
                        //  $all_day_event.iCheck('uncheck');
                    }



                });
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
                lang: '{getFCLocale($clx_language_code)}',
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
                    element.attr('onclick', event.onclick);
                    element.attr('data-toggle', 'tooltip');
                    if (!event.url) {
                        element.click(function() {
                            view_event(event.eventid);
                        });
                    }
                },
                eventStartEditable: false,
                dayClick: function(date) {
                    $modal.modal('show');
                    date = date.toDate();

                    $ib_act.val('create');

                    $btn_del_event.hide();

                    $.post(_url+'calendar/js_date',{ date:date }).success(function(data){

                        $start.val(data);
                        $title.val("");
                        $description.html();
                        $end.val(data);
                        picker.set('select', data, { format: ib_date_format_picker });
                        picker2.set('select', data, { format: ib_date_format_picker });

                    });




                    return false;
                },
                firstDay: parseInt(ib_calendar_first_day),
            };




            $('#calendar').fullCalendar(ib_calendar_options);

            $('.clockpicker').clockpicker({
                donetext: 'Done'

            });

            $all_day_event.iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue'
            });


            // $(".colors div").click(function(){
            //
            //     $("#event_color").val($(this).attr("data-ib"));
            //
            //     if (!$(this).hasClass("active")) {
            //         // Remove the class from anything that is active
            //         $(".colors div.active").removeClass("active");
            //         // And make this active
            //         $(this).addClass("active");
            //     }
            // });






            var ib_validate = $ib_modal_form.parsley();

            ib_validate.on('form:submit', function() {
                $modal.modal('loading');
                $.post( _url + "calendar/save_event/", $ib_modal_form.serialize())
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
                        }

                    });


                return false;

            });





            var $modal_title = $("#modal_title");

            var txt_original_title = $modal_title.html();


            $title.bind("change paste keyup", function() {
                var txt_title = $(this).val();
                if(txt_title.trim() == ''){

                    $modal_title.html(txt_original_title);

                }
                else{
                    $modal_title.html(txt_title);
                }

            });



            $all_day_event.on('ifChecked', function(){

                $start_time_div.hide("slow");
                $end_time_div.hide("slow");

            });

            $all_day_event.on('ifUnchecked', function(){

                $start_time_div.show("slow");
                $end_time_div.show("slow");

            });





            $(".add_event").on('click', function(e) {
                e.preventDefault();
                $modal.modal('show');

            });



        });



    </script>
{/block}