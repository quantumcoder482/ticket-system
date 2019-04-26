{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">


        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Custom Fields']}</h5>

                </div>
                <div class="ibox-content" id="application_ajaxrender">

                    <form class="form-horizontal" id="rform">

                        {foreach $cf as $c}
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="cf{$c['id']}">{$c['fieldname']}</label>
                                {if ($c['fieldtype']) eq 'text'}

                                    <div class="col-lg-4">
                                        <input type="text" id="cf{$c['id']}" name="cf{$c['id']}" class="form-control">
                                        {if ($c['description']) neq ''}
                                            <span class="help-block">{$c['description']}</span>
                                        {/if}
                                    </div>

                                {elseif ($c['fieldtype']) eq 'password'}

                                    <div class="col-lg-4">
                                        <input type="password" id="cf{$c['id']}" name="cf{$c['id']}" class="form-control">
                                        {if ($c['description']) neq ''}
                                            <span class="help-block">{$c['description']}</span>
                                        {/if}
                                    </div>

                                {elseif ($c['fieldtype']) eq 'dropdown'}
                                    <div class="col-lg-4">
                                        <select id="cf{$c['id']}" class="form-control">
                                            {foreach explode(',',$c['fieldoptions']) as $fo}
                                                <option>{$fo}</option>
                                            {/foreach}
                                        </select>
                                        {if ($c['description']) neq ''}
                                            <span class="help-block">{$c['description']}</span>
                                        {/if}
                                    </div>


                                {elseif ($c['fieldtype']) eq 'textarea'}

                                    <div class="col-lg-4">
                                        <textarea id="cf{$c['id']}" name="cf{$c['id']}" class="form-control" rows="3"></textarea>
                                        {if ($c['description']) neq ''}
                                            <span class="help-block">{$c['description']}</span>
                                        {/if}
                                    </div>

                                {else}

                                {/if}
                                <div class="col-lg-4"><a href="#" class="btn btn-primary sys_edit" id="f{$c['id']}"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>

                                    <a href="#" class="btn btn-danger cdelete" id="d{$c['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>


                                </div>
                            </div>
                            {foreachelse}

                            <h4 class="muted text-center">{$_L['Custom Fields Not Available']}</h4>

                        {/foreach}
                        <p class=" text-center"><a href="" class="btn btn-outline btn-success sys_add"><i class="fa fa-plus"></i> {$_L['Add Custom Field']}</a></p>


                    </form>

                </div>
            </div>



        </div>


    </div>
    <input type="hidden" id="_lan_are_you_sure" value="{$_L['are_you_sure']}">

{/block}

{block name="script"}
    <script>
        $(document).ready(function () {


            var $modal = $('#ajax-modal');
            var sysrender = $('#application_ajaxrender');
            sysrender.on('click', '.cdelete', function(e){
                e.preventDefault();
                var id = this.id;
                var lan_msg = $("#_lan_are_you_sure").val();
                bootbox.confirm(lan_msg, function(result) {
                    if(result){
                        var _url = $("#_url").val();
                        window.location.href = _url + "delete/customfield/" + id + '/';
                    }
                });
            });



            sysrender.on('click', '.sys_add', function(e){
                e.preventDefault();
                $('body').modalmanager('loading');
                var _url = $("#_url").val();
                $modal.load(_url + 'settings/customfields-ajax-add/','', function(){
                    $modal.modal(
                        {

                            width: '600'
                        }
                    );
                });
            });


            $modal.on('click', '#add_submit', function(){
                $modal.modal('loading');

                var _url = $("#_url").val();
                $.post(_url + 'settings/customfields-post/', $('#add_form').serialize(), function(data){

                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {

                        location.reload();
                    }
                    else {

                        $modal
                            .modal('loading')
                            .find('.modal-body')
                            .prepend('<div class="alert alert-danger fade in">' + data +

                                '</div>');

                    }
                });

            });


            sysrender.on('click', '.sys_edit', function(e){
                e.preventDefault();
                $('body').modalmanager('loading');
                var _url = $("#_url").val();
                var vid = this.id;
                var id = vid.replace("f", "");
                id = vid.replace("d", "");
                $modal.load(_url + 'settings/customfields-ajax-edit/' + id,'', function(){
                    $modal.modal(
                        {

                            width: '600'
                        }
                    );
                });
            });


            $modal.on('click', '#edit_submit', function(){
                $modal.modal('loading');

                var _url = $("#_url").val();
                $.post(_url + 'settings/customfield-edit-post/', $('#edit_form').serialize(), function(data){

                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {

                        location.reload();
                    }
                    else {

                        $modal
                            .modal('loading')
                            .find('.modal-body')
                            .prepend('<div class="alert alert-danger fade in">' + data +

                                '</div>');

                    }

                });

            });





        });
    </script>
{/block}
