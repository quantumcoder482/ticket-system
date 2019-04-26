{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Reorder']} {$ritem} {$_L['Positions']}</h5>

                </div>
                <div class="ibox-content">


                    <span id="resp">{$_L['drag_n_drop_help']}</span>
                    <ol class="rounded-list" id="sorder">


                        {foreach $d as $ds}
                            <li id='recordsArray_{$ds['id']}'><a href="javascript:void(0)">{$ds[$display_name]}</a></li>
                        {/foreach}

                    </ol>

                </div>
            </div>



        </div>



    </div>
{/block}
