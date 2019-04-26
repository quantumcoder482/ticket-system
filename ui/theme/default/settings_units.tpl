{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">
                <div class="panel-body">

                    <a href="#" class="btn btn-primary add_item" id="add_unit"><i class="fa fa-plus"></i> {$_L['Create New']}</a>


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
                                <th class="bold">{$_L['Unit']}</th>
                                <th class="bold">{$_L['Type']}</th>
                                <th class="text-center bold">{$_L['Manage']}</th>
                            </tr>
                            </thead>
                            <tbody>


                            {foreach $units as $unit}
                                <tr data-id="{$unit['id']}">
                                    <td> <a class="cedit" id="ae{$unit['id']}" href="#">{$unit['name']}</a>

                                    </td>
                                    <td>{$unit['type']}</td>
                                    <td class="text-right">
                                        <a href="{$_url}" id="be{$unit['id']}" class="btn btn-inverse btn-xs cedit" data-toggle="tooltip" title="{$_L['Edit']}"><i class="fa fa-pencil"></i> </a>


                                        <a href="#" class="btn btn-danger btn-xs cdelete" id="c{$unit['id']}" data-toggle="tooltip" title="{$_L['Delete']}"><i class="fa fa-trash"></i> </a>
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
{/block}
