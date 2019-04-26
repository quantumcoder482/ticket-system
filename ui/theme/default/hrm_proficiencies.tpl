{extends file="$layouts_admin"}


{block name="content"}


    <div class="row">

        <div class="col-md-4">

            <div class="panel">
                <div class="panel-body">

                    <h3>Add new proficiency</h3>

                    <div class="hr-line-dashed"></div>

                    <form method="post" id="mainForm">

                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

        <div class="col-md-8">

            <div class="panel">
                <div class="panel-body">

                    <h3>Proficiencies</h3>

                    <div class="hr-line-dashed"></div>

                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input type="text" name="name" id="foo_filter" class="form-control" placeholder="{$_L['Search']}..."/>

                                </div>
                            </div>

                        </div>
                    </form>

                    <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Manage</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $proficiencies as $proficiency}
                            <tr>
                                <td  data-value="{$end_user->id}"><a href="{$_url}bpr/admin/end-user/{$end_user->id}">{$end_user->name}</a> </td>


                                <td>
                                    <a href="{$_url}bpr/admin/end-user/{$end_user->id}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-xs" onclick="confirmThenGoToUrl(event,'bpr/admin/end-user-delete/{$end_user->id}');" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>

                            </tr>
                        {/foreach}

                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="5">
                                <ul class="pagination">
                                </ul>
                            </td>
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

        $(function () {

        })

    </script>


{/block}