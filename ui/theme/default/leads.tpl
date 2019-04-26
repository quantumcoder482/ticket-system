{extends file="$layouts_admin"}

{block name="content"}



    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">

                    <a href="#" class="btn btn-primary add_item waves-effect waves-light" id="add_item"><i class="fa fa-plus"></i> {$_L['New Lead']}</a>
                    {*<a href="#" class="btn btn-primary add_item waves-effect waves-light" id="import_leads"><i class="fa fa-table"></i> {$_L['Import Leads']}</a>*}

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">


                    <div class="row">
                        <div class="col-md-3 col-sm-6">

                            <form>

                                <div class="form-group">
                                    <label for="filter_first_name">{$_L['First Name']}</label>
                                    <input type="text" id="filter_first_name" name="filter_first_name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="filter_middle_name">{$_L['Middle Name']}</label>
                                    <input type="text" id="filter_middle_name" name="filter_middle_name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="filter_last_name">{$_L['Last Name']}</label>
                                    <input type="text" id="filter_last_name" name="filter_last_name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="filter_email">{$_L['Email']}</label>
                                    <input type="email" id="filter_email" name="filter_email" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="filter_salutation">{$_L['Salutation']}</label>
                                    <input type="text" id="filter_salutation" name="filter_salutation" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="filter_company">{$_L['Company']}</label>
                                    <input type="text" id="filter_company" name="filter_company" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="filter_phone">{$_L['Phone']}</label>
                                    <input type="text" id="filter_phone" name="filter_phone" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="filter_status">{$_L['Status']}</label>
                                    <input type="text" id="filter_status" name="filter_status" class="form-control">
                                </div>








                                <button type="submit" id="ib_filter" class="btn btn-primary">{$_L['Filter']}</button>

                                <br>
                            </form>


                        </div>
                        <div class="col-md-9 col-sm-6 ib_right_panel">


                            <div class="table-responsive" id="ib_data_panel">


                                <table class="table table-bordered table-hover display" id="ib_dt">
                                    <thead>
                                    <tr class="heading">
                                        <th>{$_L['ID']}</th>
                                        <th>{$_L['Name']}</th>
                                        <th>{$_L['Title']}</th>
                                        <th>{$_L['Company']}</th>

                                        <th>{$_L['Phone']}</th>

                                        <th>{$_L['Email']}</th>
                                        <th>{$_L['Status']}</th>
                                        <th>{$_L['Owner']}</th>

                                        <th>{$_L['Manage']}</th>
                                    </tr>
                                    </thead>




                                </table>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_item" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>

{/block}
