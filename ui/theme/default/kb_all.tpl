{extends file="$layouts_admin"}

{block name="content"}



    <div class="row">
        <div class="col-md-12">


            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="ib-search-bar" style="margin-bottom: 30px;">
                        <div class="input-group">
                            <input type="text" class="form-control" id="ib_search_input" placeholder="{$_L['Search']}..." autofocus> </div>
                    </div>

                    <div>
                        <table class="table table-bordered filter-table" id="tbl_articles">
                            <thead>
                            <tr>
                                <th>{$_L['Title']}</th>
                                <th width="110px;">{$_L['Manage']}</th>
                            </tr>
                            </thead>
                            <tbody>

                            {foreach $articles as $article}

                                <tr>

                                    <td><a href="javascript:void(0)" id="k{$article['id']}" class="kb_view">{$article['title']}</a> </td>

                                    <td class="text-right">


                                        <a href="{$_url}kb/a/edit/{$article['id']}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> </a>
                                        <button class="btn btn-danger btn-xs" onclick="deleteKb({$article['id']})" id="da{$article['id']}"><i class="fa fa-trash"></i> </button>

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