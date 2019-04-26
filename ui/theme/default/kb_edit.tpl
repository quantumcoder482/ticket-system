{extends file="$layouts_admin"}

{block name="content"}


    <div class="row kb-page">
        {*<div class="col-md-12">*}
        {*<div class="search-bar ">*}
        {*<div class="input-group">*}
        {*<input type="text" class="form-control" id="article_search" placeholder="Search for..."> </div>*}
        {*</div>*}
        {*</div>*}
        <div class="col-md-8" id="kb_add_area">
            <div class="panel panel-default">
                <h3 class="panel-heading">Add New Article </h3>
                <div class="panel-body">


                    <form id="ib_form" class="form-horizontal push-10-t push-10" method="post">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="title" name="title" value="{$val['title']}" autofocus>
                                    <label for="title">Title</label>

                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="description" name="description" rows="3">{$val['description']}</textarea>
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-xs-12">




                                {*<input type="hidden" name="attachments" id="attachments" value="">*}

                                <input type="hidden" name="kbid" id="kbid" value="{$val['id']}">

                                <button class="btn btn-primary" id="ib_form_submit" type="submit"><i class="fa fa-send push-5-r"></i> Submit</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="panel panel-default">
                <h3 class="panel-heading">Group </h3>

                <div class="panel-body">


                    <form id="ib_add_group" class="form-horizontal push-10-t push-10" method="post">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="gname" name="gname">
                                    <label for="gname">Group Name</label>

                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-xs-12">


                                <button class="btn btn-primary" id="ib_add_group_submit" type="submit"><i class="fa fa-check push-5-r"></i> {$_L['Save']}</button>
                            </div>
                        </div>
                    </form>


                    <div id="div_groups">

                    </div>



                </div>
            </div>

            <div class="panel panel-default">
                <h3 class="panel-heading">Latest Articles </h3>

                <div class="panel-body">


                    <div class="topics-list">
                        <ul>

                            {foreach $kbs as $kb}
                                <li><a href="javascript:void(0)" id="k{$kb['id']}" class="kb_view"> {$kb['title']} </a></li>

                                {foreachelse}
                                <p class="text-center">You do not have any Article</p>
                            {/foreach}

                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>


{/block}