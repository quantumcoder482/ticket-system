{extends file="$layouts_client"}

{block name="content"}


    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header">{$_L['Files']}</h3>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a class="nav-link active show" href="{$_url}client/downloads">{$_L['Downloads']}</a></li>
                    <li><a class="nav-link" href="{$_url}client/uploads">{$_L['Uploads']}</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show">
                        <div class="panel-body panel-body-with-border">



                            <div class="row">
                                <div class="col-lg-12">

                                    {if count($d) > 0}

                                        {foreach $d as $ds}

                                            <div class="file-box">
                                                <div class="file">
                                                    <a href="{$_url}client/dl/{$ds['id']}_{$ds['file_dl_token']}/">
                                                        <span class="corner"></span>

                                                        <div class="icon">
                                                            {if $ds['file_mime_type'] eq 'jpg' || $ds['file_mime_type'] eq 'png' || $ds['file_mime_type'] eq 'gif'}
                                                                <i class="fa fa-file-image-o"></i>
                                                            {elseif $ds['file_mime_type'] eq 'pdf'}
                                                                <i class="fa fa-file-pdf-o"></i>
                                                            {elseif $ds['file_mime_type'] eq 'zip'}
                                                                <i class="fa fa-file-archive-o"></i>
                                                            {else}
                                                                <i class="fa fa-file"></i>
                                                            {/if}
                                                        </div>
                                                        <div class="file-name">
                                                            {$ds['title']}
                                                            <br/>
                                                            <small>
                                                                {if (isset($ds['updated_at']) && ($ds['updated_at']) != '')}
                                                                    {date( $config['df'], strtotime($ds['updated_at']))}
                                                                {else}
                                                                    {date( $config['df'], strtotime($ds['created_at']))}
                                                                {/if}

                                                            </small>
                                                        </div>
                                                    </a>
                                                </div>

                                            </div>

                                        {/foreach}

                                        {else}
                                        {$_L['No Data Available']}
                                    {/if}






                                </div>
                            </div>



                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>




{/block}