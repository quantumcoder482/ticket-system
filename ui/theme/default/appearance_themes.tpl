{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Themes']}</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="accadd" method="post" action="{$_url}appearance/themes_post/">


                        <div class="form-group">
                            <label for="theme">{$_L['Theme']}</label>
                            <select name="theme" id="theme" class="form-control">
                                {*<option value="softhash" {if $config['theme'] eq 'softhash'}selected="selected" {/if}>Softhash</option>*}

                                {* by Max Mendez [ github user Akiracr ] *}

                                {foreach $themes|default:array() as $theme}
                                    <option value="{$theme}"
                                            {if $config['theme'] eq $theme}selected="selected" {/if}>{ucfirst($theme)}</option>
                                {/foreach}

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nstyle">{$_L['Style']}</label>
                            <select name="nstyle" id="nstyle" class="form-control">
                                <option value="light_blue" {if $config['nstyle'] eq 'light_blue'}selected="selected" {/if}>Light blue</option>
                                <option value="purple" {if $config['nstyle'] eq 'purple'}selected="selected" {/if}>Purple</option>
                                <option value="indigo_blue" {if $config['nstyle'] eq 'indigo_blue'}selected="selected" {/if}>Indigo blue</option>
                                <option value="dark" {if $config['nstyle'] eq 'dark'}selected="selected" {/if}>Dark sf</option>

                                <option value="blue_extra" {if $config['nstyle'] eq 'blue_extra'}selected="selected" {/if}>Blue extra</option>

                            </select>
                        </div>




                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>

                </div>
            </div>










        </div>




    </div>
{/block}
