{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">
                <div class="panel-body">

                    <a data-toggle="modal" href="#modal_add_item" class="btn btn-primary add_document waves-effect waves-light" id="add_document"><i class="fa fa-plus"></i> {$_L['New Document']}</a>


                </div>

            </div>
        </div>



    </div>

    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">

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

                    <table class="table table-bordered table-hover sys_table footable" id="footable_tbl"  data-filter="#foo_filter" data-page-size="50">
                        <thead>
                        <tr>

                            <th class="text-right" data-sort-ignore="true" width="20px;">{$_L['Type']}</th>

                            <th>{$_L['Title']}</th>


                            <th class="text-right" data-sort-ignore="true" width="200px;">{$_L['Manage']}</th>

                        </tr>
                        </thead>
                        <tbody>

                        {foreach $d as $ds}

                            <tr>

                                <td>
                                    {if $ds['file_mime_type'] eq 'jpg' || $ds['file_mime_type'] eq 'png' || $ds['file_mime_type'] eq 'gif'}
                                        <i class="fa fa-file-image-o"></i>
                                    {elseif $ds['file_mime_type'] eq 'pdf'}
                                        <i class="fa fa-file-pdf-o"></i>
                                    {elseif $ds['file_mime_type'] eq 'zip'}
                                        <i class="fa fa-file-archive-o"></i>
                                    {else}
                                        <i class="fa fa-file"></i>
                                    {/if}
                                </td>


                                <td>

                                    <a href="{$_url}documents/view/{$ds['id']}/">{$ds['title']}</a>

                                </td>



                                <td class="text-right">

                                    <a href="#" class="btn btn-primary btn-xs c_link" data-token="{$ds['id']}_{$ds['file_dl_token']}"><i class="fa fa-link"></i> </a>
                                    <a href="{$_url}documents/view/{$ds['id']}/" class="btn btn-success btn-xs"><i class="fa fa-search"></i> </a>

                                    <a href="#" class="btn btn-danger btn-xs cdelete" id="did{$ds['id']}"><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>

                        {/foreach}

                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="3">
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

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_document" data-toggle="modal" href="#modal_add_item">
            <i class="fa fa-plus"></i>
        </a>
    </div>

    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="760" style="display: none;">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">{$_L['New Document']}</h4>
        </div>
        <div class="modal-body">
            <div class="row">

                <div class="col-md-12">

                    <form>
                        <div class="form-group">
                            <label for="doc_title">{$_L['Title']}</label>
                            <input type="text" class="form-control" id="doc_title" name="doc_title">

                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="is_global" name="is_global"> {$_L['Available for all Customers']}
                            </label>
                        </div>





                    </form>

                    <hr>

                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  {$_L['Drop File Here']}</h3>
                            <br />
                            <span class="note">{$_L['Click to Upload']}</span>
                        </div>

                    </form>
                    <hr>
                    <h4>{$_L['Server Config']}:</h4>
                    <p>{$_L['Upload Maximum Size']}: {$upload_max_size}</p>
                    <p>{$_L['POST Maximum Size']}: {$post_max_size}</p>

                </div>






            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="file_link" id="file_link" value="">
            <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>
            <button type="button" id="btn_add_file" class="btn btn-primary">{$_L['Submit']}</button>
        </div>

    </div>
{/block}
