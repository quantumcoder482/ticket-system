{extends file="$layouts_client"}

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

                            </tr>
                            </thead>
                            <tbody>

                            {foreach $articles as $article}

                                <tr>

                                    <td><a href="{$_url}kb/{$article->slug}" id="k{$article->id}" class="kb_view">{$article->title}</a> </td>



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

{block name="script"}

    <script src="{$app_url}ui/lib/js/filtertable.js"></script>

    <script>
        $(function() {



            $('#tbl_articles').filterTable({
                inputSelector: '#ib_search_input',
                ignoreColumns: [1],
                minRows: 1
            });


        });
    </script>
{/block}