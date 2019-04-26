{extends file="$layouts_admin"}

{block name="style"}
    <link href="{$app_url}ui/lib/file-explorer/file-explore.css" rel="stylesheet">
{/block}

{block name="content"}

    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="file-manager">

                        {*<div class="hr-line-dashed"></div>*}
                        {*<button class="btn btn-primary btn-block">Upload Files</button>*}
                        {*<div class="hr-line-dashed"></div>*}
                        <h5>Folders</h5>

                        {*<ul class="file-tree">*}
                            {*<li><a href="#">US</a>*}
                                {*<ul>*}
                                    {*<li><a href="#">New York</a>*}
                                        {*<ul>*}
                                            {*<li><a href="#">Corporation</a>*}
                                                {*<ul>*}
                                                    {*<li> <a href="#link5">Link 5</a> </li>*}
                                                    {*<li> <a href="#link6">Link 6</a> </li>*}
                                                    {*<li> <a href="#link7">Link 7</a> </li>*}
                                                    {*<li> <a href="#link8">Link 8</a> </li>*}
                                                    {*<li> <a href="#">Deeper</a>*}
                                                        {*<ul>*}
                                                            {*<li><a href="#">Link 1</a> </li>*}
                                                            {*<li><a href="#">Link 2</a> </li>*}
                                                            {*<li><a href="#">Link 3</a> </li>*}
                                                            {*<li><a href="#">Link 4</a> </li>*}
                                                        {*</ul>*}
                                                    {*</li>*}
                                                {*</ul>*}
                                            {*</li>*}
                                            {*<li><a href="#">LLC</a>*}
                                                {*<ul>*}
                                                    {*<li> <a href="#link5">Link 5</a> </li>*}
                                                    {*<li> <a href="#link6">Link 6</a> </li>*}
                                                    {*<li> <a href="#link7">Link 7</a> </li>*}
                                                    {*<li> <a href="#link8">Link 8</a> </li>*}
                                                    {*<li> <a href="#">Deeper</a>*}
                                                        {*<ul>*}
                                                            {*<li><a href="#">Link 1</a> </li>*}
                                                            {*<li><a href="#">Link 2</a> </li>*}
                                                            {*<li><a href="#">Link 3</a> </li>*}
                                                            {*<li><a href="#">Link 4</a> </li>*}
                                                        {*</ul>*}
                                                    {*</li>*}
                                                {*</ul>*}
                                            {*</li>*}
                                        {*</ul>*}
                                    {*</li>*}
                                    {*<li><a href="#link2">Link 2</a> </li>*}
                                    {*<li><a href="#link3">Link 3</a> </li>*}
                                    {*<li><a href="#link4">Link 4</a> </li>*}
                                {*</ul>*}
                            {*</li>*}
                            {*<li><a href="#">Canada</a>*}
                                {*<ul>*}
                                    {*<li><a href="#">Link 1</a> </li>*}
                                    {*<li><a href="#">Link 2</a> </li>*}
                                    {*<li><a href="#">Link 3</a> </li>*}
                                    {*<li><a href="#">Link 4</a> </li>*}
                                {*</ul>*}
                            {*</li>*}
                        {*</ul>*}
                        <ul class="folder-list" style="padding: 0">



                            {foreach $folders as $folder}
                                <li><a href="{$_url}util/media/{$folder}"><i class="fa fa-folder"></i> {$folder}</a></li>
                            {/foreach}
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">

                    {foreach $imgs as $img}
                        <div class="file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <img alt="image" class="img-responsive" src="{$img}">
                                    </div>
                                    <div class="file-name">
                                        <span class="ellipsis" style="max-width: 150px; display:block;">{basename($img)}</span>
                                        <br>
                                        <small>{date ("F d Y H:i:s.", filemtime($img))}</small>
                                    </div>
                                </a>

                            </div>
                        </div>

                        {foreachelse}
                        <h4>No Files in this Folder.</h4>
                    {/foreach}

                </div>
            </div>
        </div>
    </div>

{/block}

{block name=script}

    <script src="{$app_url}ui/lib/file-explorer/file-explore.js?ver={$file_build}"></script>

    <script>
        $(document).ready(function(){

            $(".file-tree").filetree();


            function animationHover(element, animation) {
                element = $(element);
                element.hover(
                    function () {
                        element.addClass('animated ' + animation);
                    },
                    function () {
                        //wait for animation to finish before removing classes
                        window.setTimeout(function () {
                            element.removeClass('animated ' + animation);
                        }, 2000);
                    });
            }
            $('.file-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>



{/block}