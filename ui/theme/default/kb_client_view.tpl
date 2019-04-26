{extends file="$layouts_client"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">


            <div class="panel panel-default">
                <div class="panel-body">

                    <h3>{$article->title}</h3>
                    <em>{$adm->fullname}</em> {if $article->updated_at != ''} | <em>Last update: {$article->updated_at->diffForHumans()}</em> {/if}
                    <hr>

                    {$article->description}

                </div>
            </div>


        </div>
    </div>

{/block}