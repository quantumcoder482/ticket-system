{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="widget-1 col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{$_L['Repeating_Income']}</h3>
                </div>
                <div class="panel-body">
                    <h3 id="month"></h3>
                    <div class="pull-right form-inline">
                        <div class="btn-group">
                            <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
                            <button class="btn btn-default" data-calendar-nav="today">This Month</button>
                            <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
                        </div>

                    </div>
                    <br>
                    <br>
                    <div id="calendar"></div>
                </div>
            </div>
        </div> <!-- Widget-1 end-->

        <!-- Widget-2 end-->
    </div>
{/block}
