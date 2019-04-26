{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Predefined Replies</h5>

                </div>
                <div class="ibox-content">
                    <a data-toggle="modal" href="#modal_add_item" class="btn btn-success mb-md"><i class="fa fa-plus"></i> Add Predefined Reply</a>

                    <a href="{$_url}tickets/admin/predefined_replies_reorder/" class="btn btn-primary mb-md"><i class="fa fa-arrows"></i> Reorder Predefined Replies</a>
                    <br>
                    <table class="table table-bordered table-hover sys_table">
                        <thead>
                        <tr>

                            <th>Title</th>
                            <th class="text-right">{$_L['Manage']}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $replies as $reply}

                            <tr>

                                <td>{$reply['title']}</td>


                                <td class="text-right">

                                    <a href="{$_url}tickets/admin/predefined_reply_edit/{$reply['id']}" class="btn btn-info btn-sm item_edit"><i class="fa fa-pencil-square-o"></i> {$_L['Edit']}</a>
                                    <a href="#" class="btn btn-danger btn-sm cdelete" id="d{$reply['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>

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
            <h4 class="modal-title">Add New Department</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">

                    <form id="ib_modal_form">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>


                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" class="form-control" rows="5"></textarea>
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

{block name="script"}
    <script>
        $(function() {

            var _url = $("#_url").val();

            var $modal_add_item = $("#modal_add_item");

            var $message = $("#message");

            $modal_add_item.on('shown.bs.modal', function() {
                $message.redactor({
                    minHeight: 200,
                    paragraphize: false,
                    replaceDivs: false,
                    linebreaks: true
                });
            });

            var $btn_modal_action = $("#btn_modal_action");


            $btn_modal_action.on('click', function(e) {
                e.preventDefault();

                $modal_add_item.block({ message: block_msg });
                $.post( _url + "tickets/admin/predefined_replies_post/", $("#ib_modal_form").serialize())
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            $modal_add_item.unblock();
                            toastr.error(data);
                        }

                    });

            });


            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm('Are you sure?', function(result) {
                    if(result){

                        window.location.href = _url + "tickets/admin/predefined_replies_delete/" + id + "/";
                    }
                });
            });



        });
    </script>
{/block}