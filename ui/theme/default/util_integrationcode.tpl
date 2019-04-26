{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">

        <div class="col-md-8 col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Integration Code']}</h5>

                </div>
                <div class="ibox-content">
                    <h4>{$_L['Client Login']}</h4>
                    <pre class="line-numbers language-markup"><code>{$form_client_login}</code></pre>
                    <h4>{$_L['Client Registration']}</h4>
                    <pre class="line-numbers language-markup"><code>{$form_client_register}</code></pre>

                </div>
            </div>
        </div>



    </div>
{/block}
