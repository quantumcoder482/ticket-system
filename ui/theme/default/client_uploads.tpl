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
                    <li><a class="nav-link" href="{$_url}client/downloads">{$_L['Downloads']}</a></li>
                    <li class="active"><a class="nav-link active show" href="{$_url}client/uploads">{$_L['Uploads']}</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show">
                        <div class="panel-body panel-body-with-border">


                            <a data-toggle="modal" href="#modal_add_item" class="btn btn-primary add_document waves-effect waves-light" id="add_document"><i class="fa fa-plus"></i> {$_L['New Document']}</a>

                            <hr>

                            <div class="row">
                                <div class="col-lg-12">

                                    {if count($files) > 0}

                                        {foreach $files as $file}

                                            <div class="file-box">
                                                <div class="file">
                                                    <a href="{$_url}client/dl/{$file->id}_{$file->file_dl_token}/">
                                                        <span class="corner"></span>

                                                        <div class="icon">
                                                            {if $file->file_mime_type eq 'jpg' || $file->file_mime_type eq 'png' || $file->file_mime_type eq 'gif'}
                                                                <i class="fa fa-file-image-o"></i>
                                                            {elseif $file->file_mime_type eq 'pdf'}
                                                                <i class="fa fa-file-pdf-o"></i>
                                                            {elseif $file->file_mime_type eq 'zip'}
                                                                <i class="fa fa-file-archive-o"></i>
                                                            {else}
                                                                <i class="fa fa-file"></i>
                                                            {/if}
                                                        </div>
                                                        <div class="file-name">
                                                            {$file->title}
                                                            <br/>
                                                            <small>
                                                                {if (isset($file->updated_at) && $file->updated_at != '')}
                                                                    {date( $config['df'], strtotime($file->updated_at))}
                                                                {else}
                                                                    {date( $config['df'], strtotime($file->created_at))}
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

{block name="script"}
    <script>
        Dropzone.autoDiscover = false;
        $(function() {

            var _url = $("#_url").val();

            $.fn.modal.defaults.width = '700px';

            var $modal = $('#ajax-modal');

            $('[data-toggle="tooltip"]').tooltip();

            var $btn_add_file = $("#btn_add_file");

            var $file_link = $("#file_link");

            var upload_resp;




            var ib_file = new Dropzone("#upload_container",
                {
                    url: _url + "client/document_upload/",
                    maxFiles: 1
                }
            );


            ib_file.on("sending", function() {

                $btn_add_file.prop('disabled', true);

            });

            ib_file.on("success", function(file,response) {

                $btn_add_file.prop('disabled', false);

                upload_resp = response;

                if(upload_resp.success == 'Yes'){

                    toastr.success(upload_resp.msg);
                    $file_link.val(upload_resp.file);


                }
                else{
                    toastr.error(upload_resp.msg);
                }


            });




            var $doc_title = $("#doc_title");

            var is_global = '0';


            $btn_add_file.on('click', function(e) {
                e.preventDefault();



                $.post( _url + "client/save_upload/", { title: $doc_title.val(), file_link: $file_link.val() })
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            toastr.error(data);
                        }




                    });


            });




        });
    </script>
{/block}