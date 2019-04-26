{extends file="$layouts_admin"}
{block name="style"}
    <link href="{$app_url}/ui/lib/datatables/light/datatables.min.css" rel="stylesheet" type="text/css">
    <link href="{$app_url}/ui/lib/modal.css" rel="stylesheet" type="text/css">
    <link href="{$app_url}/ui/lib/s2/css/select2.min.css" rel="stylesheet" type="text/css">
    <style>
        select.input-sm {
            line-height: 20px;
        }
    </style>
{/block}
{block name="content"}
    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">
                <div class="panel-body">

                    <a href="#" class="btn btn-primary add_password waves-effect waves-light" id="add_company"><i class="fa fa-plus"></i> {$_L['New Entry']}</a>


                </div>

            </div>
        </div>



    </div>

    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">



                    <div class="table-responsive" id="ib_data_table">
                        <table class="table table-bordered table-hover" id="tableDataTable">
                            <thead>
                            <tr>
                                <th class="bold">{$_L['Name']}</th>
                                <th class="bold">{$_L['Customer']}</th>
                                <th class="bold">{$_L['URL']}</th>
                                <th class="bold">{$_L['Username']}</th>
                                <th class="text-center bold">{$_L['Manage']}</th>
                            </tr>
                            </thead>
                            <tbody>


                            {foreach $passwords as $password}
                                <tr data-id="{$password['id']}">

                                    <td>{$password['name']}</td>
                                    <td>
                                        {if isset($cls[$password['client_id']])}
                                            <a href="{$_url}contacts/view/{$password['client_id']}">{$cls[$password['client_id']]}</a>
                                        {/if}
                                    </td>
                                    <td><a href="{$password['url']}" target="_blank">{$password['url']}</a> </td>
                                    <td>{$password['username']}</td>
                                    <td class="text-right">

                                        {if $password['url'] neq ''}
                                            <a href="{$password['url']}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-globe"></i> </a>
                                        {/if}

                                        {*<a href="javascript:void(0);" id="v_{$password['id']}" class="btn btn-success btn-xs password_view"><i class="fa fa-list"></i> </a>*}

                                        <a href="javascript:void(0);" class="btn btn-sm btn-info copy_to_clipboard" aria-label="{$password->username}"><i class="fa fa-clipboard"></i></a>

                                        <a href="javascript:void(0);" class="btn btn-sm btn-warning copy_to_clipboard" aria-label="{$password->password}"><i class="fa fa-lock"></i></a>

                                        <a href="{$_url}" id="pe_{$password['id']}" class="btn btn-inverse btn-sm edit_password"><i class="fa fa-pencil"></i> </a>


                                        <a href="#" class="btn btn-danger btn-sm cdelete" id="c{$password['id']}" data-toggle="tooltip" title="{$_L['Delete']}"><i class="fa fa-trash"></i> </a>
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
        <a class="md-fab md-fab-primary waves-effect waves-light add_password" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>
{/block}

{block name="script"}

    <script src="{$app_url}ui/lib/datatables/light/datatables.min.js"></script>
    <script src="{$app_url}ui/lib/modal.js"></script>
    <script src="{$app_url}ui/lib/clipboard.min.js"></script>
    <script src="{$app_url}ui/lib/s2/js/select2.min.js"></script>
    <script>
        $(function () {

            var $modal = $('#ajax-modal');



            $('#tableDataTable').DataTable({
                columnDefs: [
                    { orderable: false, targets: -1 }
                ]
            });

            var clipboard = new Clipboard('.copy_to_clipboard', {
                text: function(trigger) {
                    return trigger.getAttribute('aria-label');
                }
            });

            clipboard.on('success', function(e) {
                toastr.success('Text Copied!');
                e.clearSelection();
            });

            $('.add_password').on('click', function(e){

                e.preventDefault();

                $('body').modalmanager('loading');


                $modal.load( base_url + 'password_manager/modal_password/', '', function(){

                    $modal.modal();

                    $modal.css("width", "700px");
                    $modal.css("margin-left", "-349px");

                    $modal.modal();

                    $("#ajax-modal .s2_contacts").select2({
                        theme: "bootstrap",
                        width: '100%'
                    });

                });
            });


            $('.edit_password').on('click', function(e){

                var e_id = this.id;
                e.preventDefault();

                $('body').modalmanager('loading');


                $modal.load( base_url + 'password_manager/modal_password/'+e_id, '', function(){

                    $modal.modal();

                    $modal.css("width", "700px");
                    $modal.css("margin-left", "-349px");

                    $modal.modal();

                    $("#ajax-modal .s2_contacts").select2({
                        theme: "bootstrap",
                        width: '100%'
                    });

                });
            });

            // $('.password_view').on('click', function(e){
            //
            //     var v_id = this.id;
            //
            //     e.preventDefault();
            //
            //     $('body').modalmanager('loading');
            //
            //
            //     $modal.load( base_url + 'password_manager/modal_view_password/'+v_id, '', function(){
            //
            //         $modal.modal();
            //
            //         $modal.css("width", "700px");
            //         $modal.css("margin-left", "-349px");
            //
            //         $modal.modal();
            //
            //         var clipboard = new Clipboard('.copy_to_clipboard', {
            //             text: function(trigger) {
            //                 return trigger.getAttribute('aria-label');
            //             }
            //         });
            //
            //         clipboard.on('success', function(e) {
            //            toastr.success('Text Copied!');
            //             e.clearSelection();
            //         });
            //
            //
            //
            //     });
            // });


            $modal.on('click', '.modal_submit', function(e){

                e.preventDefault();

                $modal.modal('loading');



                $.post( base_url + "password_manager/save/", $("#spForm").serialize())
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
                        }

                    });

            });


            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        var _url = $("#_url").val();
                        window.location.href = _url + "delete/password/" + id + '/';
                    }
                });
            });



        })
    </script>
{/block}
