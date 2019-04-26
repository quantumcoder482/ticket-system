{extends file="$layouts_admin"}

{block name="content"}



    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">
                <div class="panel-body">

                    <a href="{$_url}sms/init/new_sms_driver/" class="btn btn-primary add_company waves-effect waves-light"><i class="fa fa-plus"></i> New SMS Driver</a>


                </div>

            </div>
        </div>



    </div>

    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">



                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="bold">Name</th>
                                <th class="bold">URL</th>
                                <th class="bold">Username</th>
                                <th class="text-center bold">{$_L['Manage']}</th>
                            </tr>
                            </thead>
                            <tbody>


                            {foreach $d as $ds}
                                <tr>
                                    <td>{$ds['dname']}</td>
                                    <td>{$ds['url']}</td>
                                    <td>{$ds['username']}</td>
                                    <td class="text-right">
                                        <a href="{$_url}" class="btn btn-inverse btn-xs cedit"><i class="fa fa-pencil"></i> </a>


                                        <a href="{$_url}sms/init/delete_driver/{$ds['id']}" class="btn btn-danger btn-xs cdelete" data-toggle="tooltip" title="{$_L['Delete']}"><i class="fa fa-trash"></i> </a>
                                    </td>

                                </tr>
                            {/foreach}






                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>



    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_company" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>




{/block}