{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">



        <div class="col-md-6">



            <div class="panel panel-default">
                <div class="panel-body">

                    <form role="form" name="accadd" method="post" action="{$_url}sms/init/new_sms_driver_step_2">

                        <div class="form-group">
                            <label for="dname">Driver Name</label>

                            <input type="text" class="form-control" id="dname" name="dname" value="{$h_name}">


                        </div>


                        {if isset($l['api_key'])}
                            <div class="form-group">
                                <label for="api_key">{$l['api_key']}</label>

                                <input type="text" class="form-control" id="api_key" name="api_key">


                            </div>
                        {/if}



                        <input type="hidden" name="handler" id="handler" value="{$handler}">

                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                    </form>


                </div>

            </div>
        </div>



    </div>

{/block}