{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Support Ticket Departments']}</h5>

                </div>
                <div class="ibox-content">
                    <a data-toggle="modal" href="#modal_add_item" class="btn btn-success mb-md"><i class="fa fa-plus"></i> {$_L['Add New Department']}</a>

                    <a href="{$_url}tickets/admin/departments_reorder/" class="btn btn-primary mb-md"><i class="fa fa-arrows"></i> {$_L['Reorder']}</a>
                    <br>
                    <table class="table table-bordered table-hover sys_table">
                        <thead>
                        <tr>

                            <th>{$_L['Department Name']}</th>
                            <th>{$_L['Description']}</th>
                            <th>{$_L['Email']}</th>
                            <th>{$_L['Status']}</th>
                            <th class="text-right">{$_L['Manage']}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $ds as $d}
                            <tr>

                                <td>{$d['dname']}</td>
                                <td>{$d['description']}</td>
                                <td>{$d['email']}</td>

                                <td>
                                    {if $d['hidden'] eq 'Yes'}
                                        <span class="label label-danger">{$_L['Inactive']}</span>
                                    {else}
                                        <span class="label label-success">{$_L['Active']}</span>
                                    {/if}

                                </td>

                                <td class="text-right">

                                    <a href="#" class="btn btn-info btn-sm item_edit" id="e{$d['id']}"><i class="fa fa-pencil-square-o"></i> {$_L['Edit']}</a>
                                    <a href="#" class="btn btn-danger btn-sm cdelete" id="d{$d['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>

                                </td>
                            </tr>
                        {/foreach}

                        </tbody>
                    </table>

                </div>
            </div>



        </div>



    </div>


    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="600" style="display: none;">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">{$_L['Add New Department']}</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">

                    <form id="ib_modal_form">


                        <div class="form-group">
                            <label for="department_name">{$_L['Name']}</label>
                            <input type="text" name="department_name" class="form-control" id="department_name">
                        </div>



                        <div class="form-group">
                            <label for="email">{$_L['Email']}</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="host">{$_L['Host']}</label>
                            <input type="text" class="form-control" id="host" name="host">
                        </div>

                        <div class="form-group">
                            <label for="password">{$_L['Password']}</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="port">IMAP Port</label>
                            <input type="text" class="form-control" id="port" name="port">
                        </div>



                        <div class="form-group">
                            <label for="encryption">Encryption</label>
                            <label class="radio-inline">
                                <input type="radio" name="encryption" value="tls"> TLS
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="encryption" value="ssl"> SSL
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="encryption" value=""> No Encryption
                            </label>
                        </div>



                        <hr>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="hidden" name="hidden" value="1"> Hide from client?
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="delete_after_import" name="delete_after_import" value="1"> Delete mail after import?
                                </label>
                            </div>
                        </div>



                    </form>
                </div>




            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
            <button type="button" id="btn_modal_action" class="btn btn-primary">Save</button>

        </div>

    </div>

{/block}